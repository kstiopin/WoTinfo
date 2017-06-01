import React from 'react';

export class TanksTree extends React.Component {
  render() {
    const { activeTab, userData } = this.props;
    const { account_id, nickname } = userData;
    console.log('TopPanel RENDER', activeTab);

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
          <div id='tree-ussr' className='tree'></div>
          <div id='tree-germany' className='tree'></div>
          <div id='tree-usa' className='tree'></div>
          <div id='tree-france' className='tree'></div>
          <div id='tree-uk' className='tree'></div>
          <div id='tree-china' className='tree'></div>
          <div id='tree-japan' className='tree'></div>
          <div id='tree-czech' className='tree'></div>
          <div id='tree-sweden' className='tree'></div>
          <div id='angar' className='tree'></div>
        </div>
      </div>
    </div>);
  }
}

export default TanksTree;