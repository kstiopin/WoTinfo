import React from 'react';

import Tank from './Tank.jsx';

export class TanksTab extends React.Component {
  state = { activeNation: 'ussr' }

  setNation = (activeNation) => this.setState({ activeNation })

  render() {
    const { tanksData, tanksWN8, userData } = this.props;
    const { activeNation } = this.state;

    const nations = [
      { key: 'ussr', label: 'СССР'},
      { key: 'germany', label: 'Германия'},
      { key: 'usa', label: 'США'},
      { key: 'france', label: 'Франция'},
      { key: 'uk', label: 'Великобритания'},
      { key: 'china', label: 'Китай'},
      { key: 'japan', label: 'Япония'},
      { key: 'czech', label: 'Чехия'},
      { key: 'poland', label: 'Польша'},
      { key: 'sweden', label: 'Швеция'}
    ];
    const tanksToAdd = [];
    const maxRows = {};
    Object.keys(tanksData).forEach(key => {
      const tank = tanksData[key];
      const { id, nation, level, row } = tank,
        userTankData = userData.tankData[id];

      if ((nation === activeNation) || ((activeNation === 'angar') && userTankData && tank.in_angar && (userTankData.all.battles > 0))) {
        const addData = { userTankData: userData.tankData[id] };
        if (activeNation === 'angar') {
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
      <div id='nations'>{ nations.map(nation =>
        <div className={ `${nation.key}${(nation.key === activeNation) ? ' active' : ''}` } key={ nation.key } onClick={ () => this.setNation(nation.key) } title={ nation.label }></div>
      )}</div>
      <div className='nationTree' id='ntree'>
        <div className='treeWrapper'>
          <div className='levelLine' style={ { left: '0' } }></div>
          <div className='levelLine' style={ { left: '324px' } }></div>
          <div className='levelLine' style={ { left: '648px' } }></div>
          <div className='levelLine' style={ { left: '972px' } }></div>
          <div className='levelLine' style={ { left: '1296px' } }></div>
          <div id='levels'><div>I</div><div>II</div><div>III</div><div>IV</div><div>V</div><div>VI</div><div>VII</div><div>VIII</div><div>IX</div><div>X</div></div>
          <div className='tree'>
            { tanksToAdd.map(tank => <Tank key={ tank.id } activeNation={ activeNation } tank={ tank } tankWN8={ tanksWN8[tank.id] } />) }
          </div>
        </div>
      </div>
    </div>);
  }
}

export default TanksTab;