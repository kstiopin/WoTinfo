import React from 'react';

import { getColor } from '../helpers';

import { apiUrl, applicationId } from '../config/config';

export class MainTab extends React.Component {
  constructor(props) {
    super(props);
    this.state = { showAccounts: false };
  }

  toggleAccounts = () => this.setState(prevState => ({ showAccounts: !prevState.showAccounts }))

  render() {
    const { userData, getUser } = this.props;
    const { showAccounts } = this.state;
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
            <a href='http://vk.com/wotleaks' target='_blank'>Wot leaks</a>
            <div id='update_stats'>
              <input type='text' id='acc_input' name='acc' ref={ (input) => { this.accInput = input; } }/>
              <input type='button' className='button red' value='Найти игрока' onClick={ () => getUser(this.accInput.val()) } />
              <a id='authorize' href={ `${apiUrl}auth/login/${applicationId}&redirect_uri=http://wot.kstiopin.in.ua/` }>Авторизироваться для обновления техники в ангаре</a>
            </div>
          </div>

          <div className='b-userblock-wrpr'>
            <div id='js-glory-points-block'></div>
            <div className='b-user-block b-user-block__sparks'>
              <div className='b-personal-data'>
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
              <th>Name</th>
              <th>Battles</th>
              <th>WR</th>
              <th>WG</th>
              <th>WN8</th>
              <th>Tanks in angar</th>
            </tr>
            </thead>
            <tbody></tbody>
          </table> }
        </div>
      </div>
      <div className='clear'></div>
    </div>);
  }
}

export default MainTab;