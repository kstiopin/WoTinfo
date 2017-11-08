import React, { Component } from 'react';

const TopPanel = ({ activeTab, playerTanks, setActiveTab }) => (<div id='navigationWrapper'>
  <ul id='navigation'>
    { [
      { key: 'main', label: 'Статистика' },
      { key: 'tanks', label: `Техника${(playerTanks > 0) ? ` (${playerTanks})` : ''}` },
      { key: 'links', label: 'Полезные ссылки' }
    ].map((tab) => <li key={ tab.key } className={ (tab.key === activeTab) ? 'active' : 'click' } onClick={ () => setActiveTab(tab.key) }>
      { tab.label }
    </li>) }
  </ul>
</div>);

export default TopPanel;