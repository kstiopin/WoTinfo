import React from 'react';

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

/**
 * fill wn8 array with data for tanks and set empty values
 * @param wn8jsonData {array}
 * @returns wn8data {array}
 */
export function setWN8data(wn8jsonData) {
  const tanksWN8 = {};
  wn8jsonData.forEach((tankWN8) => {
    tanksWN8[tankWN8.IDNum] = Object.assign({}, tankWN8);
  });
  // Add missing wn8 tanks
  const canMissWN8 = [ // TODO: move this into the DB or even do this stuff on the BE
    { target: 19473, source: 58641, type: '=', msg: 'Pz.Kpfw. VII from VK 72.01 K' },
    { target: 48641, source: 49665, type: '=', msg: 'Защитник from Объект 252У' },
    { target: 19729, source: 10513, type: '=', msg: 'VK 100.01 (P) from VK 45.02 A' },
    { target: 18705, source: 7441, type: '=', msg: 'Mäuschen from VK 45.02 B' },
    { target: 52097, source: 4225, type: '=', msg: 'Strv S1 from UDES 03' },
    { target: 58657, source: 58913, type: '=', msg: 'Chrysler K from T26E5' },
    { target: 17473, previous: 5185, next: 4929, type: 'avg', msg: 'B-C 12 t from avg between AMX 13 75 and AMX 13 90' },
    { target: 17217, previous: 4929, next: 17473, type: 'diff', msg: 'AMX 13 105 based on difference between B-C 12 t and AMX 13 90' },
    { target: 19457, previous: 16641, next: 18433, type: 'avg', msg: 'ЛТГ from avg between МТ-25 and ЛТТБ' },
    { target: 19201, previous: 18433, next: 18177, type: 'diff', msg: 'Т-100 ЛТ based on difference between ЛТТБ and Т-54 обл.' },
    { target: 20241, previous: 18961, next: 18449, type: 'avg', msg: 'HWK 12 from avg between SP 1C and Ru 251' },
    { target: 19985, previous: 20241, next: 18449, type: 'diff', msg: 'Rhm. Pzwg based on difference between HWK 12 and Ru 251' },
    { target: 19489, previous: 17953, next: 18209, type: 'diff', msg: 'Sheridan based on difference between T49 and M41 Bulldog' },
    { target: 5681, previous: 3377, next: 3889, type: 'diff', msg: 'WZ-132A based on difference between WZ-132 and WZ-131' },
    { target: 5937, previous: 3889, next: 5681, type: 'diff', msg: 'WZ-132-1 based on difference between WZ-132A and WZ-132' },
    { target: 6193, source: 58913, type: '=', msg: 'WZ-111-5A from 113' },
    { target: 49169, source: 52321, type: '=', msg: 'Tiger 131 from HT No. VI' },
    { target: 145, source: 15889, type: '=', msg: 'Pudel from VK 30.02 M' },
    { target: 6449, source: 5121, type: '=', msg: 'T-26G FT from AT-1' },
    { target: 6705, source: 6401, type: '=', msg: 'M3G FT from СУ-76М' },
    { target: 6961, source: 6913, type: '=', msg: 'SU-76G FT from СУ-85Б' },
    { target: 7217, source: 257, type: '=', msg: '60G FT from СУ-85' },
    { target: 7473, source: 3585, type: '=', msg: 'WZ-131G FT from СУ-100' },
    { target: 7729, source: 10241, type: '=', msg: 'T-34-2G FT from СУ-100М1' },
    { target: 7985, source: 9985, type: '=', msg: 'WZ-111-1G FT from СУ-101' },
    { target: 8241, source: 8193, type: '=', msg: 'WZ-111G FT from Об. 704' },
    { target: 8497, source: 13569, type: '=', msg: 'WZ-113G FT from Об. 268' },
    { target: 63281, source: 11537, type: '=', msg: 'WZ-120-1G FT from JPanther II' }
  ];
  canMissWN8.forEach(item => {
    const { target, type, previous, next } = item;
    if (!tanksWN8.hasOwnProperty(target)) {
      if (type === '=') {
        tanksWN8[target] = tanksWN8[item.source];
      } else if (type === 'avg') {
        tanksWN8[target] = {
          expFrag: (tanksWN8[previous].expFrag + tanksWN8[next].expFrag) / 2,
          expDamage: (tanksWN8[previous].expDamage + tanksWN8[next].expDamage) / 2,
          expSpot: (tanksWN8[previous].expSpot + tanksWN8[next].expSpot) / 2,
          expDef: (tanksWN8[previous].expDef + tanksWN8[next].expDef) / 2,
          expWinRate: (tanksWN8[previous].expWinRate + tanksWN8[next].expWinRate) / 2,
        };
      } else if (type === 'diff') {
        tanksWN8[target] = {
          expFrag: tanksWN8[next].expFrag * tanksWN8[next].expFrag / tanksWN8[previous].expFrag,
          expDamage: tanksWN8[next].expDamage * tanksWN8[next].expDamage / tanksWN8[previous].expDamage,
          expSpot: tanksWN8[next].expSpot * tanksWN8[next].expSpot / tanksWN8[previous].expSpot,
          expDef: tanksWN8[next].expDef * tanksWN8[next].expDef / tanksWN8[previous].expDef,
          expWinRate: tanksWN8[next].expWinRate * tanksWN8[next].expWinRate / tanksWN8[previous].expWinRate,
        };
      }
      console.log(`added wn8 data for ${item.msg}`, { target: tanksWN8[target] });
    }
  });

  return tanksWN8;
}