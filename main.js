import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import TanksTab from './components/TanksTab';
import TopPanel from './components/TopPanel';
import Links from './components/Links';
import MainTab from './components/MainTab';

import { calcWN8 } from './helpers';

import { accountId, accessToken, apiUrl, applicationId, fetchHeaders } from './config/config';

class App extends Component {
  state = {
    activeTab: 'main',
    playerTanks: 0,
    userData: false,
    accountsData: [],
    tanksData: false,
    tanksWN8: [],
  }

  componentWillMount() {
    const { accountId } = this.props;
    console.log(`request acc data for ${accountId}`);
    this.getAccData(accountId);
  }

  /**
   * Load data for an account
   * @param account {int|string} if not account_id, will try search by name
   */
  getAccData = (account) => {
    if (/^[0-9]+$/.test(account)) { // if we have an ID -> get the data
      localStorage.setItem('defaultAccount', account);
      fetch(`${apiUrl}account/info/${applicationId}&account_id=${account}${accessToken}`).then(resp => resp.json()).then(resp => {
        this.getTankStats(account, resp.data[account]);
      });
    } else {
      this.searchAccount(account);
    }
  }

  searchAccount = (accountName) => {
    fetch(`${apiUrl}account/list/${applicationId}&search=${accountName}`).then(resp => resp.json()).then(data => {
      if (data.data.length > 0) {
        let userIsFound = false;
        data.data.forEach((userFound) => {
          if (userFound.nickname === accountName) {
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

  getTankStats = (accountId, userData) => {
    fetch(`${apiUrl}tanks/stats/${applicationId}&account_id=${accountId}${accessToken}`).then(resp => resp.json()).then(resp => {
      userData.tankData = {};
      if (resp.hasOwnProperty('data')) {
        resp.data[accountId].forEach((tankStats) => {
          userData.tankData[tankStats.tank_id] = Object.assign({}, tankStats);
        });
        this.getAchievements(accountId, userData);
      } else {
        this.getTankStats(accountId, userData);
      }
    });
  }

  getAchievements = (accountId, userData) => {
    fetch(`${apiUrl}tanks/achievements/${applicationId}&account_id=${accountId}${accessToken}`).then(resp => resp.json()).then(resp => {
      if (resp.hasOwnProperty('data')) {
        resp.data[accountId].forEach((tankAchievements) => {
          userData.tankData[tankAchievements.tank_id].marksOnGun = tankAchievements.achievements.marksOnGun;
        });
        console.log(`getAccData(${accountId}) userData`, userData);
        this.getTanksData(accountId, userData);
      } else {
        this.getAchievements(accountId, userData);
      }
    });
  }

  getTanksData = (accountId, userData) => {
    // Get tanks data for trees and wn8 rating from https://stat.modxvm.com/wn8-data-exp/json/wn8exp.json
    fetch(`../api/tanks.php?account_id=${accountId}`, fetchHeaders).then(resp => resp.json()).then(resp => {
      console.log(`fetch api/tanks for account ${accountId}`, resp);
      const tanksData = resp.tanks;
      const tanksWN8 = resp.wn8;
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

      this.setState({ userData, playerTanks: (playerTanks > 0) ? playerTanks : resp.angarTanks, tanksData, tanksWN8 });
    });
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
    fetch('../api/accounts.php', { method: 'POST', body: params }).then(resp => resp.json()).then(data => {
      console.log(`account ${data} updated`);
    });
  }

  /**
   * Get links from the DB
   */
  getLinks = () => {
    fetch('../api/links.php', fetchHeaders).then(resp => resp.json()).then(links => this.setState({ links }));
  }

  setActiveTab = (activeTab) => this.setState({ activeTab })

  render() {
    const { accountsData, activeTab, links, playerTanks, tanksData, tanksWN8, userData } = this.state;
    if (!userData) {
      return null;
    }

    return (
      <div>
        <TopPanel activeTab={ activeTab } playerTanks={ playerTanks } setActiveTab={ this.setActiveTab } />
        { (activeTab === 'main') && <MainTab accounts={ accountsData } getAccounts={ this.getAccounts } getUser={ this.getAccData } sortAccounts={ this.sortAccounts } userData={ userData } /> }
        { (activeTab === 'tanks') && <TanksTab activeTab={ activeTab } playerTanks={ playerTanks } tanksData={ tanksData } tanksWN8={ tanksWN8 } userData={ userData } /> }
        { (activeTab === 'links') && <Links getLinks={ this.getLinks } links={ links } userData={ userData } /> }
      </div>);
  }
}

ReactDOM.render(<App accountId={ accountId } accessToken={ accessToken } />, document.getElementById('app'));