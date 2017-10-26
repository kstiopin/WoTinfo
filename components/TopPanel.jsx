import React, { Component } from 'react';

export class TopPanel extends Component {
  render() {
    const { activeTab, playerTanks, setActiveTab } = this.props;
    const tabs = [
      { key: 'main', label: 'Статистика' },
      { key: 'tanks', label: `Техника${(playerTanks > 0) ? ` (${playerTanks})` : ''}` },
      { key: 'links', label: 'Полезные ссылки' }
    ];

    return (
      <div id='content'>
        <ul id='navigation'>{ tabs.map((tab) =>
          <li key={ tab.key } className={ (tab.key === activeTab) ? 'active' : 'click' } onClick={ () => setActiveTab(tab.key) }>{ tab.label }</li>
        ) }</ul>
      </div>);
  }
}

export default TopPanel;