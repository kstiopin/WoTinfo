import React from 'react';

import { getColor } from '../helpers';

import { apiUrl, applicationId, defaultStatsTab } from '../config/config';

export class MainTab extends React.Component {
  state = { showAccounts: false, activeTab: defaultStatsTab }

  toggleAccounts = () => this.setState(prevState => ({ showAccounts: !prevState.showAccounts }))

  setTab = (activeTab) => {
    localStorage.setItem('defaultStatsTab', activeTab);
    this.setState({ activeTab });
  }

  render() {
    const { userData, accounts, getUser, sortAccounts } = this.props;
    const { showAccounts, activeTab } = this.state;
    const { statistics, account_id, nickname, global_rating, wn8 } = userData,
      { battles, wins, xp, damage_dealt } = statistics.all,
      winrate = wins / battles * 100,
      averageExp = xp / battles,
      averageDmg = damage_dealt / battles;

    return (<div className='l-page nationTree' id='main'>
      <div className='l-body-content'>
        <div className='l-content'>
          <div className='b-profile-name js-profile-clan js-profile-name'>
            <h1 className='b-header-h1__profile js-tooltip' id='js-profile-name'>
              <a href={ `http://worldoftanks.ru/community/accounts/${account_id}-${nickname}/` }>{ nickname }</a>
            </h1>
            <a href='http://worldoftanks.ru/' target='_blank'>сайт WoT</a>,&nbsp;
            <a href='http://knowly.ru/asja' target='_blank'>Ася шарит</a>,&nbsp;
            <a href='http://vk.com/wotleaks' target='_blank'>Wot leaks</a>,&nbsp;
            <a href='https://wgmods.net/WOT/ru/' target='_blank'>Модпаки</a>,&nbsp;
            <a href='http://modxvm.com' target='_blank'>ModXVM</a>
            <br/>
            <a href={ `http://www.noobmeter.com/player/ru/${nickname.toLowerCase()}/${account_id}/` }>Noobmeter</a>,&nbsp;
            <a href={ `http://wots.com.ua/user/stats/${nickname.toLowerCase()}` }>WOTS</a>,&nbsp;
            <a href={ `https://kttc.ru/wot/ru/user/${nickname.toLowerCase()}/` }>KTTC</a>,&nbsp;
            <div id='update_stats'>
              <input type='text' id='acc_input' name='acc' ref={ (input) => { this.accInput = input; } }/>
              <input type='button' className='button red' value='Найти игрока' onClick={ () => getUser(this.accInput.value) } />
              <a id='authorize' href={ `${apiUrl}auth/login/${applicationId}&redirect_uri=http://wot.kstiopin.in.ua/` }>Авторизироваться для обновления техники в ангаре</a>
            </div>
          </div>

          <div className='b-userblock-wrpr'>
            <div className='b-user-block b-user-block__sparks'>
              <div className='b-personal-data'>
                <span id="random-link" className={ (activeTab === 'random') ? 'active' : '' } onClick={ () => this.setTab('random') }>Random</span>
                <span id="ranked-link" className={ (activeTab === 'ranked') ? 'active' : '' } onClick={ () => this.setTab('ranked') }>Ranked</span>
                <table className='t-personal-data'>
                  <tbody>
                    <tr>
                      <th className='t-personal-data_ico t-personal-data_ico__win'>Процент побед</th>
                      <th className='t-personal-data_ico t-personal-data_ico__fight'>Количество боёв</th>
                      <th rowSpan='2' className='t-personal-data_pr'>
                        <div className='t-personal-data_rel'>
                          <div className='t-personal-data_abs'>
                            Личный рейтинг
                            <p className={ `t-personal-data_value t-personal-data_value__pr ${getColor('wg', global_rating)}` } id='personal_rating'>{ global_rating }</p>
                            WN8
                            <p className={ `t-personal-data_value t-personal-data_value__pr ${getColor('wn8', wn8)}` } id='personal_wn8'>{ wn8 }</p>
                          </div>
                        </div>
                      </th>
                      <th className='t-personal-data_ico t-personal-data_ico__exp'>Средний опыт за бой</th>
                      <th className='t-personal-data_ico t-personal-data_ico__dmg'>Средний нанесённый урон за бой</th>
                    </tr>
                    <tr>
                      <td className={ `t-personal-data_value ${getColor('winrate', winrate)}` } id='winrate'>{ `${(winrate).toFixed(2)}%` }</td>
                      <td className={ `t-personal-data_value ${getColor('battles', battles)}` } id='total_battles'>{ battles }</td>
                      <td className={ `t-personal-data_value ${getColor('exp', averageExp)}` } id='average_exp'>{ averageExp.toFixed(2) }</td>
                      <td className={ `t-personal-data_value ${getColor('dmg', averageDmg)}` } id='average_dmg'>{ averageDmg.toFixed(2) }</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id='other_requests'>
          <span onClick={ this.toggleAccounts }>Другие игроки</span>
          { showAccounts && <table>
            <thead>
            <tr>
              <th className='pointer' onClick={ () => sortAccounts('nickname') }>Name</th>
              <th className='pointer' onClick={ () => sortAccounts('battles') }>Battles</th>
              <th className='pointer' onClick={ () => sortAccounts('winrate') }>WR</th>
              <th className='pointer' onClick={ () => sortAccounts('wg') }>WG</th>
              <th className='pointer' onClick={ () => sortAccounts('wn8') }>WN8</th>
              <th>Tanks in angar</th>
            </tr>
            </thead>
            <tbody>
              { accounts.map((account) => (<tr key={ account.account_id }>
                <td><span onClick={ () => { this.toggleAccounts(); getUser(account.account_id); } }>{ account.nickname }</span></td>
                <td className={ getColor('battles', account.battles) }>{ account.battles }</td>
                <td className={ getColor('winrate', account.winrate) }>{ account.winrate }</td>
                <td className={ getColor('wg', account.wg) }>{ account.wg }</td>
                <td className={ getColor('wn8', account.wn8) }>{ account.wn8 }</td>
                <td className="green">{ account.angar ? account.angar.split(',').length : '' }</td>
              </tr>)) }
            </tbody>
          </table> }
        </div>
      </div>
      <div className='clear'></div>
    </div>);
  }
}

export default MainTab;