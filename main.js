import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import TopPanel from './components/TopPanel.jsx';
import MainTab from './components/MainTab.jsx';
import TanksTree from './components/TanksTree.jsx';

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
          resp.data.data[accountId].forEach((tankStats) => {
            userData.tankData[tankStats.tank_id] = Object.assign({}, tankStats);
          });
          console.log(`getAccData(${accountId}) userData`, userData);
          // Get tanks data for trees and wn8 rating from http://stat.modxvm.com/wn8.json
          axios.get(`../api/tanks.php?account_id=${accountId}`).then(resp => {
            const tankData = resp.data.tanks;
            const tanksWN8 = {};
            if (resp.data.wn8) {
              JSON.parse(resp.data.wn8).data.forEach((tankWN8) => {
                tanksWN8[tankWN8.IDNum] = Object.assign({}, tankWN8);
              });
              // Add missing wn8 tanks
              if (!tanksWN8.hasOwnProperty(19473)) { // data for Pz.Kpfw. VII from VK 72.01 K
                tanksWN8[19473] = tanksWN8[58641];
              }
              if (!tanksWN8.hasOwnProperty(48641)) { // data for Защитник from Объект 252У
                tanksWN8[48641] = tanksWN8[49665];
              }
              if (!tanksWN8.hasOwnProperty(19729)) { // data for VK 100.01 (P) from VK 45.02 A
                tanksWN8[19729] = tanksWN8[10513];
              }
              if (!tanksWN8.hasOwnProperty(18705)) { // data for Mäuschen from VK 45.02 B
                tanksWN8[18705] = tanksWN8[7441];
              }
              if (!tanksWN8.hasOwnProperty(52097)) { // data for Strv S1 from UDES 03
                tanksWN8[52097] = tanksWN8[4225];
              }
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
            console.log(userData, tankData, tanksWN8);
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