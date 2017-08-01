import React from 'react';

import { calcWN8, getColor, getTankTypeImg } from '../helpers';

import { accessToken } from '../config/config';

export class Tank extends React.Component {
  render() {
    const { activeTab, tank } = this.props,
      { id, row, image_small, name, short_name, level, type, in_angar, is_premium, relations, userTankData } = tank;
    let tankWN8 = { expDamage: 0, expFrag: 0, expSpot: 0, expDef: 0, expWinRate: 0 };
    if (this.props.tankWN8) {
      tankWN8 = this.props.tankWN8;
    }
    let hasUserData = false,
      battles,
      tankWinrate,
      avgDmg,
      expDmg,
      wn8,
      in_garage = false;
    if (userTankData && (userTankData.all.battles > 0)) {
      hasUserData = true;
      const { all } = userTankData,
        { wins, damage_dealt, frags, spotted, dropped_capture_points } = all,
        { expDamage, expFrag, expSpot, expDef, expWinRate } = tankWN8;
      if (userTankData.in_garage || ((accessToken === '') && in_angar)) {
        in_garage = true;
      }
      battles = all.battles;
      tankWinrate = wins / battles * 100;
      avgDmg = damage_dealt / battles;
      expDmg = expDamage;
      wn8 = calcWN8(avgDmg, expDamage, frags / battles, expFrag, spotted / battles, expSpot, dropped_capture_points / battles, expDef, tankWinrate, expWinRate);
    }
    const relationsArray = [];
    if ((activeTab !== 'angar') && relations) {
      relations.split('<img').forEach((relation) => {
        if (relation !== '') {
          let _class = relation.substr(relation.indexOf('class="') + 7);
          _class = _class.substr(0, _class.indexOf('"'));
          let img = relation.substr(relation.indexOf('images/') + 7);
          img = img.substr(0, img.indexOf('"'));
          let width = '';
          let height = '';
          if (relation.indexOf('width="') > 0) {
            width = relation.substr(relation.indexOf('width="') + 7);
            width = width.substr(0, width.indexOf('"'));
          }
          if (relation.indexOf('height="') > 0) {
            height = relation.substr(relation.indexOf('height="') + 8);
            height = height.substr(0, height.indexOf('"'));
          }
          relationsArray.push({ class: _class, img, width, height });
        }
      });
    }
    // console.log(`Tank ${id} RENDER`, name, hasUserData, tank);

    return (<div className={ `tblock column${level} row${row}${in_garage ? ' in_angar' : ''}` } id={ `tank${id}` }>
      <div className="vicLogo"><img src={ `../data/images/${image_small}` } /></div>
      <span className="mark">{ (short_name.length <= name.length) ? short_name : name }</span>
      <span className="level">{ level }</span>
      <span className="class">{ getTankTypeImg(type) }</span>
      { (is_premium == 1) && <span className="golden"><img src="../data/images/gold.png" /></span> }
      { hasUserData && (userTankData.mark_of_mastery > 0) && <span className="mastery"><img src={ `../data/images/class${userTankData.mark_of_mastery}.png` } /></span> }
      { hasUserData && !!userTankData.marksOnGun && <div className={ `marksOnGun${userTankData.marksOnGun}` }></div> }
      { hasUserData && <div className="gamerbattles">
        боёв <span className={ `ratings ${getColor('winrate', tankWinrate)}` }>{ battles }({ tankWinrate.toFixed(0) }%)</span>
        wn8 <span className={ `ratings ${getColor('wn8', wn8)}` }>{ wn8 }</span>
        dmg <span className={ `ratings ${getColor('tankDmg', avgDmg / expDmg)}` } title={ `Expected: ${expDmg.toFixed(0)}` }>{ avgDmg.toFixed(0) }</span>
      </div> }
      { !hasUserData && <span className='regularTank'></span> }
      { relationsArray.map((relation, key) => <img key={ key} className={ relation.class } src={ `../data/images/${relation.img}` } width={ relation.width } height={ relation.height } />) }
    </div>);
  }
}

export default Tank;