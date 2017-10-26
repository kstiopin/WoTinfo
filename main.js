import React from 'react';
import ReactDOM from 'react-dom';

import TopPanel from './components/TopPanel.jsx';
import MainTab from './components/MainTab.jsx';
import TanksTab from './components/TanksTab.jsx';

import { calcWN8 } from './helpers';

import { accountId, accessToken, apiUrl, applicationId, fetchHeaders } from './config/config';

class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      activeTab: 'main',
      playerTanks: 0,
      userData: false,
      accountsData: [],
      tanksData: false,
      tanksWN8: [],
    };
  }

  componentWillMount() {
    fetch('../api/tanks.php', fetchHeaders).then(resp => resp.json()).then(data => {
      this.setState({ tanksData: data.tanks, tanksWN8: data.wn8 });
      const { accountId } = this.props;
      console.log(`request acc data for ${accountId}`);
      this.getAccData(accountId);
      this.getAccounts();
    });
  }

  /**
   * Load data for an account / this should be a saga
   * @param account {int|string} if not account_id, will try search by name
   */
  getAccData = (account) => {
    if (/^[0-9]+$/.test(account)) {
      // if we have an ID -> get the data
      localStorage.setItem('defaultAccount', account);
      fetch(`${apiUrl}account/info/${applicationId}&account_id=${account}${accessToken}`).then(resp => resp.json()).then(resp => {
        const userData = resp.data[account];
        fetch(`${apiUrl}tanks/stats/${applicationId}&account_id=${account}${accessToken}`).then(resp => resp.json()).then(resp => {
          userData.tankData = {};
          resp.data[account].forEach((tankStats) => {
            userData.tankData[tankStats.tank_id] = Object.assign({}, tankStats);
          });
          fetch(`${apiUrl}tanks/achievements/${applicationId}&account_id=${account}${accessToken}`).then(resp => resp.json()).then(resp => {
            resp.data[account].forEach((tankAchievements) => {
              userData.tankData[tankAchievements.tank_id].marksOnGun = tankAchievements.achievements.marksOnGun;
            });
            console.log(`getAccData(${account}) userData`, userData);
            // Get tanks data for trees and wn8 rating from http://stat.modxvm.com/wn8.json
            fetch(`../api/tanks.php?account_id=${account}`, fetchHeaders).then(resp => resp.json()).then(resp => {
              console.log('fetch api/tanks', account, resp);
              const { tanksWN8 } = this.state;
              let playerTanks = 0;
              const { statistics, tankData, account_id, nickname, global_rating } = userData,
                { battles, wins, damage_dealt, frags, spotted, dropped_capture_points } = statistics.all,
                winrate = wins / battles * 100,
                averageDmg = damage_dealt / battles,
                averageFrags = frags / battles,
                averageSpotted = spotted / battles,
                averageDef = dropped_capture_points / battles,
                angar = [];
              // подсчёт WN8
              const expected = { frg: 0, dmg: 0, spo: 0, def: 0, win: 0, battles: 0 };
              Object.keys(tankData).forEach((tid) => {
                let tb = tankData[tid].all.battles;
                if (tankData[tid].in_garage) { // if no token will always be null
                  angar.push(tid);
                  playerTanks++;
                }
                if (typeof(tanksWN8[tid]) !== "undefined") {
                  expected['frg'] += tb * tanksWN8[tid].expFrag;
                  expected['dmg'] += tb * tanksWN8[tid].expDamage;
                  expected['spo'] += tb * tanksWN8[tid].expSpot;
                  expected['def'] += tb * tanksWN8[tid].expDef;
                  expected['win'] += tb * tanksWN8[tid].expWinRate;
                  expected['battles'] += tb;
                }
              });
              const wn8  = calcWN8( // TODO: send expected array to have less params
                averageDmg * expected['battles'],
                expected['dmg'],
                averageFrags * expected['battles'],
                expected['frg'],
                averageSpotted * expected['battles'],
                expected['spo'],
                averageDef * expected['battles'],
                expected['def'],
                winrate * expected['battles'],
                expected['win']
              );
              userData.wn8 = wn8;
              // обновление данных по аккаунту в базе
              this.fillAccountData({ account_id, nickname, battles, winrate, wg: global_rating, wn8, angar });

              this.setState({ userData, playerTanks: (playerTanks > 0) ? playerTanks : resp.angarTanks });
            });
          });
        });
      });
    } else {
      fetch(`${apiUrl}account/list/${applicationId}&search=${account}`).then(resp => resp.json()).then(data => {
        if (data.data.length > 0) {
          let userIsFound = false;
          data.data.forEach((userFound) => {
            if (userFound.nickname === account) {
              userIsFound = true;
              this.getAccData(userFound.account_id);
            }
          });
          if (!userIsFound) {
            alert('No 100% match found! Please try again or contaсt skype: salvation131');
          }
        } else {
          alert('No players found! Please contact skype: salvation131');
        }
      });
    }
  }

  /**
   * Get accounts that we have in the DB
   */
  getAccounts = () => {
    fetch('../api/accounts.php', fetchHeaders).then(resp => resp.json()).then(data => {
      const accountsData = [];
      Object.keys(data).forEach((account) => {
        accountsData.push(data[account]);
      });
      this.sortAccounts('wn8', accountsData);
    });
  }

  /**
   * Sort accounts array
   * @param field {string} sorting criteria
   * @param data {array} accounts
   */
  sortAccounts = (field, data = false) => {
    let { accountsData} = this.state;
    if (data) {
      accountsData = data;
    }
    accountsData.sort(function(a, b) {
      let aField = a[field],
        bField = b[field];
      if (field !== 'nickname') {
        aField *= 1;
        bField *= 1;
      }
      return (aField < bField) ? 1 : ((aField > bField) ? -1 : 0);
    });

    this.setState({ accountsData });
  }

  /**
   * Update DB with data from WG api
   * @param data {object}
   */
  fillAccountData = (data) => {
    var params = new URLSearchParams();
    Object.keys(data).forEach((key) => {
      params.append(key, data[key]);
    });
    fetch('../api/accounts.php', { method: 'POST', body: params }).then((resp) => {
      console.log(`account ${resp} updated`);
    });
  }

  setActiveTab = (activeTab) => this.setState({ activeTab })

  render() {
    const { activeTab, accountsData, userData, tanksData, playerTanks, tanksWN8 } = this.state;

    return (<div>
      { userData && <TopPanel
        activeTab={ activeTab }
        playerTanks={ playerTanks }
        setActiveTab={ this.setActiveTab } /> }
      { (activeTab === 'main') && userData && <MainTab
        userData={ userData }
        accounts={ accountsData }
        getUser={ this.getAccData }
        sortAccounts={ this.sortAccounts } /> }
      { (activeTab !== 'main') && userData && <TanksTab
        activeTab={ activeTab }
        userData={ userData }
        tanksData={ tanksData }
        tanksWN8={ tanksWN8 } /> }
    </div>);
  }
}

ReactDOM.render(<App accountId={ accountId } accessToken={ accessToken } />, document.getElementById('app'));