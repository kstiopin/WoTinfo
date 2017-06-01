import React from 'react';

export class TopPanel extends React.Component {
  render() {
    const { activeTab, playerTanks, setActiveTab } = this.props;
    const tabsData = [
      { key: 'main', label: 'Статистика'},
      { key: 'ussr', label: 'СССР'},
      { key: 'germany', label: 'Германия'},
      { key: 'usa', label: 'США'},
      { key: 'france', label: 'Франция'},
      { key: 'uk', label: 'Великобритания'},
      { key: 'china', label: 'Китай'},
      { key: 'japan', label: 'Япония'},
      { key: 'czech', label: 'Чехия'},
      { key: 'sweden', label: 'Швеция'},
    ];
    if (playerTanks > 0) {
      tabsData.push({ key: 'angar', label: `Ангар (${playerTanks})`});
    }
    // console.log('TopPanel RENDER', activeTab, playerTanks);

    return (<div id='content'>
      <ul id='nations'>
        { tabsData.map((tab) => (<li key={ tab.key } className={ (tab.key === activeTab) ? 'active' : 'click' } onClick={ () => setActiveTab(tab.key) }>{ tab.label }</li>)) }
      </ul>
    </div>);
  }
}

export default TopPanel;