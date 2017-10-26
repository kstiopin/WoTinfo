import React from 'react';

import Tank from './Tank.jsx';

export class TanksTab extends React.Component {
  render() {
    const { activeTab, userData, tanksData, tanksWN8 } = this.props;
    const { account_id, nickname } = userData;

    const tanksToAdd = [];
    const maxRows = {};
    Object.keys(tanksData).forEach(key => {
      const tank = tanksData[key];
      const { id, nation, level, row } = tank,
        userTankData = userData.tankData[id];

      if ((nation === activeTab) || ((activeTab === 'angar') && userTankData && tank.in_angar && (userTankData.all.battles > 0))) {
        const addData = { userTankData: userData.tankData[id] };
        if (activeTab === 'angar') {
          if (!maxRows.hasOwnProperty(level)) {
            maxRows[level] = 1;
          }
          addData.row = maxRows[level]++;
          tanksToAdd.push(Object.assign({}, tank, addData));
        } else if (row > 11) {
          if (!maxRows.hasOwnProperty(level)) {
            maxRows[level] = 12;
          }
          if (userTankData) {
            addData.row = maxRows[level]++;
            tanksToAdd.push(Object.assign({}, tank, addData));
          }
        } else {
          tanksToAdd.push(Object.assign({}, tank, addData));
        }
      }
    });

    return (<div>
      <div className='nationTree' id='ntree'>
        <div className='treeWrapper'>
          <div className='levelLine' style={ { left: '0' } }></div>
          <div className='levelLine' style={ { left: '324px' } }></div>
          <div className='levelLine' style={ { left: '648px' } }></div>
          <div className='levelLine' style={ { left: '972px' } }></div>
          <div className='levelLine' style={ { left: '1296px' } }></div>
          <div id='levels'><div>I</div><div>II</div><div>III</div><div>IV</div><div>V</div><div>VI</div><div>VII</div><div>VIII</div><div>IX</div><div>X</div></div>
          <div className='tree'>
            { tanksToAdd.map(tank => <Tank key={ tank.id } activeTab={ activeTab } tank={ tank } tankWN8={ tanksWN8[tank.id] } />) }
          </div>
        </div>
      </div>
    </div>);
  }
}

export default TanksTab;