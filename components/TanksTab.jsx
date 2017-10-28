import React, { Component } from 'react';

import Tank from './Tank.jsx';

export class TanksTab extends Component {
  state = { activeNation: 'ussr' }

  componentWillMount() {
    const { playerTanks } = this.props;
    if (playerTanks > 0) {
      this.setState({ activeNation: 'angar' });
    }
  }

  setNation = (activeNation) => this.setState({ activeNation })

  sortByDamage = (tanksArray) => tanksArray.sort((tankA, tankB) => {
    const tankAavgDmg = tankA.userTankData.all.damage_dealt / tankA.userTankData.all.battles;
    const tankBavgDmg = tankB.userTankData.all.damage_dealt / tankB.userTankData.all.battles;

    return (tankAavgDmg > tankBavgDmg) ? -1 : ((tankAavgDmg < tankBavgDmg) ? 1 : 0);
  })

  render() {
    const { tanksData,  playerTanks, tanksWN8, userData } = this.props;
    const { activeNation } = this.state;

    const levels = { 10: 'X', 9: 'IX', 8: 'VIII', 7: 'VII', 6: 'VI', 5: 'V', 4: 'IV', 3: 'III', 2: 'II', 1: 'I' };
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
    let tanksToAdd = [];
    const angarTanks = {};
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
    if (activeNation === 'angar') {
      tanksToAdd.forEach(tank => {
        if (!angarTanks.hasOwnProperty(tank.level)) {
          angarTanks[tank.level] = [];
        }
        angarTanks[tank.level].push(tank);
      });
      // console.log('Browsing angar, tanks: ', angarTanks);
      tanksToAdd = [];
    }

    return (
      <div id={ (activeNation === 'angar') ? 'tanksWrapper' : '' }>
        <div id='nations'>
          { (playerTanks > 0) && <div className={ `angar${(activeNation === 'angar') ? ' active' : ''}` } onClick={ () => this.setNation('angar') } title={ 'Ангар' }></div> }
          { nations.map(nation => <div className={ `${nation.key}${(nation.key === activeNation) ? ' active' : ''}` } key={ nation.key } onClick={ () => this.setNation(nation.key) } title={ nation.label }></div>) }
        </div>
        { (activeNation === 'angar') ? <div id='angar'>
          { Object.keys(levels).reverse().map(level => angarTanks.hasOwnProperty(level) && <div key={ level } className='levelRow'>
            <h3>{ levels[level] }</h3>
            <div className='tanks'>
              { this.sortByDamage(angarTanks[level]).map(tank => <Tank key={ tank.id } activeNation={ activeNation } tank={ tank } tankWN8={ tanksWN8[tank.id] } />) }
            </div>
          </div> ) }
        </div> : <div className='nationTree' id='ntree'>
          <div className='treeWrapper'>
            <div className='levelLine' style={ { left: '0' } }></div>
            <div className='levelLine' style={ { left: '324px' } }></div>
            <div className='levelLine' style={ { left: '648px' } }></div>
            <div className='levelLine' style={ { left: '972px' } }></div>
            <div className='levelLine' style={ { left: '1296px' } }></div>
            <div id='levels'>
              { Object.keys(levels).map(level => <div key={ level }>{ levels[level] }</div>) }
            </div>
            <div className='tree'>
              { tanksToAdd.map(tank => <Tank key={ tank.id } activeNation={ activeNation } tank={ tank } tankWN8={ tanksWN8[tank.id] } />) }
            </div>
          </div>
        </div> }
      </div>);
  }
}

export default TanksTab;