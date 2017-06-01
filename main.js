import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import TopPanel from './components/TopPanel.jsx';
import MainTab from './components/MainTab.jsx';
import TanksTree from './components/TanksTree.jsx';

import { setWN8data } from './helpers';

import { accountId, accessToken, apiUrl, applicationId } from './config/config';

class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      activeTab: 'main',
      playerTanks: 0,
      tanksWN8: {},
      userData: false,
      accountsData: [],
      tankData: false,
    };
  }

  componentWillMount() {
    const { accountId } = this.props;
    console.log(`request acc data for ${accountId}`);
    this.getAccData(accountId);
  }

  // this should be a saga
  getAccData = (accountId) => {
    if (/^[0-9]+$/.test(accountId)) {
      // if we have an ID -> get the data
      localStorage.setItem('defaultAccount', accountId);
      axios.get(`${apiUrl}account/info/${applicationId}&account_id=${accountId}${accessToken}`).then(resp => {
        const userData = resp.data.data[accountId];
        axios.get(`${apiUrl}tanks/stats/${applicationId}&account_id=${accountId}${accessToken}`).then(resp => {
          userData.tankData = {};
          let tankData, tanksWN8;
          resp.data.data[accountId].forEach((tankStats) => {
            userData.tankData[tankStats.tank_id] = Object.assign({}, tankStats);
          });
          axios.get(`${apiUrl}tanks/achievements/${applicationId}&account_id=${accountId}${accessToken}`).then(resp => {
            resp.data.data[accountId].forEach((tankAchievements) => {
              userData.tankData[tankAchievements.tank_id].marksOnGun = tankAchievements.achievements.marksOnGun;
            });
            console.log(`getAccData(${accountId}) userData`, userData);
            // Get tanks data for trees and wn8 rating from http://stat.modxvm.com/wn8.json
            axios.get(`../api/tanks.php?account_id=${accountId}`).then(resp => {
              tankData = resp.data.tanks;
              if (resp.data.wn8) {
                tanksWN8 = setWN8data(JSON.parse(resp.data.wn8).data);
              }
              /* fillAccountData(userData);
              buildNationTrees(tankData);
              if (resp.angarTanks > 0) {
                $('#angar-tab span').html(resp.angarTanks);
                $('#angar-tab').removeClass('hidden');
              } else {
                $('#angar-tab span').html(0);
                $('#angar-tab').addClass('hidden');
              } */
              this.setState({ userData, tankData, tanksWN8 });
            });
          });
        });
      });
    } else {
      // search for user
    }
  }

  setActiveTab = (activeTab) => this.setState({ activeTab })

  render() {
    const { activeTab, playerTanks } = this.state;

    return (<div>
      <TopPanel activeTab={ activeTab } playerTanks={ playerTanks } setActiveTab={ this.setActiveTab } />
      { (activeTab === 'main') && <MainTab /> }
      { (activeTab !== 'main') && <TanksTree /> }
    </div>);
  }
}

ReactDOM.render(<App accountId={ accountId } accessToken={ accessToken } />, document.getElementById('app'));