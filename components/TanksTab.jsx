import React from 'react';

import Tank from './Tank.jsx';

export class TanksTab extends React.Component {
  render() {
    const { activeTab, userData, tanksData, tanksWN8 } = this.props;
    const { account_id, nickname } = userData;

    const tanksToAdd = [];
    tanksData.forEach((tank) => {
      const { id, nation } = tank,
        userTankData = userData.tankData[id];

      if ((nation === activeTab) || ((activeTab === 'angar') && userTankData && userTankData.in_garage && (userTankData.all.battles > 0))) {
        tanksToAdd.push(Object.assign({}, tank, { userTankData: userData.tankData[id] }));
      }
    });

    return (<div>
      <div className='tree_head'>
        <h1 style={ { display: 'inline' } }>
          WoT :: <span id='noobmeter_link'>
            <a href={ `http://www.noobmeter.com/player/ru/${nickname.toLowerCase()}/${account_id}/` }>Noobmeter</a>
          </span>, <span id='wots_link'>
            <a href={ `http://wots.com.ua/user/stats/${nickname.toLowerCase()}` }>WOTS</a>
          </span>, <span id='kttc_link'>
            <a href={ `https://kttc.ru/wot/ru/user/${nickname.toLowerCase()}/` }>KTTC</a>
          </span> — техника игрока в дереве развития
        </h1>
      </div>
      <div className='nationTree' id='ntree'>
        <div className='treeWrapper'>
          <div className='levelLine' style={ { left: '0' } }></div>
          <div className='levelLine' style={ { left: '324px' } }></div>
          <div className='levelLine' style={ { left: '648px' } }></div>
          <div className='levelLine' style={ { left: '972px' } }></div>
          <div className='levelLine' style={ { left: '1296px' } }></div>
          <div id='levels'><div>I</div><div>II</div><div>III</div><div>IV</div><div>V</div><div>VI</div><div>VII</div><div>VIII</div><div>IX</div><div>X</div></div>
          <div className='tree'>
            { tanksToAdd.map(tank => <Tank key={ tank.id } tank={ tank } tankWN8={ tanksWN8[tank.id] } />) }
          </div>
        </div>
      </div>
    </div>);
  }
}

export default TanksTab;