import React from 'react';

/**
 * Get color for specific type of stats
 * @param type {string}
 * @param value {int}
 * @return class color {string}
 */
export function getColor(type, value) {
  let color = 'red';
  const types = {
    wn8: [2880, 2180, 1470, 900, 400],
    wg: [10175, 8730, 6515, 4435, 3000],
    winrate: [65, 58, 53, 49, 47],
    battles: [20000, 14000, 10000, 7000, 4000],
    exp: [1200, 1100, 800, 600, 450],
    dmg: [2500, 1800, 1000, 750, 500],
    tankDmg: [1.7, 1.4, 1.1, 0.7, 0.5],
  };
  if (value >= types[type][0]) {
    color = 'violet';
  } else if (value >= types[type][1]) {
    color = 'teal';
  } else if (value >= types[type][2]) {
    color = 'green';
  } else if (value >= types[type][3]) {
    color = 'yellow';
  } else if (value >= types[type][4]) {
    color = 'orange';
  }

  return color;
}

/**
 * Get tank type img
 * @param type {string}
 * @returns img {<img />}
 */
export function getTankTypeImg(type) {
  const labels = { lightTank: 'Лёгкий танк', mediumTank: 'Средний танк', heavyTank: 'Тяжёлый танк', 'AT-SPG': 'ПТ САУ', SPG: 'САУ' };

  return <img src={ `../style/type-${type}.png` } alt={ labels[type] } title={ labels[type] } />;
}

/**
 * get params from url
 * @param sParam
 * @returns {boolean|string}
 */
export function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return (sParameterName[1] === undefined) ? true : sParameterName[1];
    }
  }
}

/**
 * Get WN8 rating for user data
 * @param damage
 * @param expDamage
 * @param frags
 * @param expFrags
 * @param spotted
 * @param expSpotted
 * @param def
 * @param expDef
 * @param winrate
 * @param expWinrate
 * @returns {int} WN8 value
 */
export function calcWN8(damage, expDamage, frags, expFrags, spotted, expSpotted, def, expDef, winrate, expWinrate) {
  const rDmg  = Math.max(((damage / expDamage - 0.22) / (1 - 0.22)), 0);
  const rFrag = Math.max(Math.min(rDmg + 0.2,((frags / expFrags - 0.12) / (1 - 0.12))), 0);
  const rSpot = Math.max(Math.min(rDmg + 0.1,(( spotted / expSpotted - 0.38) / (1 - 0.38))), 0);
  const rDef  = Math.max(Math.min(rDmg + 0.1,(( def / expDef - 0.10) / (1 - 0.10))), 0);
  const rWin  = Math.max((winrate / expWinrate - 0.71) / (1 - 0.71), 0);

  return (980 * rDmg + 210 * rDmg * rFrag + 155 * rFrag * rSpot + 75 * rDef * rFrag + 145 * Math.min(1.8, rWin)).toFixed(0);
}