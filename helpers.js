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

  return `<img src="../images/type-${type}.png" align="top" alt="${labels[type]}" title="${labels[type]}" />`;
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
  if (!tanksWN8.hasOwnProperty(19473)) {
    tanksWN8[19473] = tanksWN8[58641];
    console.log('added wn8 data for Pz.Kpfw. VII from VK 72.01 K', tanksWN8[19473]);
  }
  if (!tanksWN8.hasOwnProperty(48641)) {
    tanksWN8[48641] = tanksWN8[49665];
    console.log('added wn8 data for Защитник from Объект 252У', tanksWN8[48641]);
  }
  if (!tanksWN8.hasOwnProperty(19729)) {
    tanksWN8[19729] = tanksWN8[10513];
    console.log('added wn8 data for VK 100.01 (P) from VK 45.02 A', tanksWN8[19729]);
  }
  if (!tanksWN8.hasOwnProperty(18705)) {
    tanksWN8[18705] = tanksWN8[7441];
    console.log('added wn8 data for Mäuschen from VK 45.02 B', tanksWN8[18705]);
  }
  if (!tanksWN8.hasOwnProperty(52097)) {
    tanksWN8[52097] = tanksWN8[4225];
    console.log('added wn8 data for Strv S1 from UDES 03', tanksWN8[52097]);
  }
  if (!tanksWN8.hasOwnProperty(58657)) {
    tanksWN8[58657] = tanksWN8[58913];
    console.log('added wn8 data for Chrysler K from T26E5', tanksWN8[58657]);
  }
  if (!tanksWN8.hasOwnProperty(17473)) {
    tanksWN8[17473] = {
      expFrag: (tanksWN8[5185].expFrag + tanksWN8[4929].expFrag) / 2,
      expDamage: (tanksWN8[5185].expDamage + tanksWN8[4929].expDamage) / 2,
      expSpot: (tanksWN8[5185].expSpot + tanksWN8[4929].expSpot) / 2,
      expDef: (tanksWN8[5185].expDef + tanksWN8[4929].expDef) / 2,
      expWinRate: (tanksWN8[5185].expWinRate + tanksWN8[4929].expWinRate) / 2,
    };
    console.log('added wn8 data for B-C 12 t from avg between AMX 13 75 and AMX 13 90', tanksWN8[17473]);
  }
  if (!tanksWN8.hasOwnProperty(17217)) {
    tanksWN8[17217] = {
      expFrag: tanksWN8[4929].expFrag * tanksWN8[4929].expFrag / tanksWN8[17473].expFrag,
      expDamage: tanksWN8[4929].expDamage * tanksWN8[4929].expDamage / tanksWN8[17473].expDamage,
      expSpot: tanksWN8[4929].expSpot * tanksWN8[4929].expSpot / tanksWN8[17473].expSpot,
      expDef: tanksWN8[4929].expDef * tanksWN8[4929].expDef / tanksWN8[17473].expDef,
      expWinRate: tanksWN8[4929].expWinRate * tanksWN8[4929].expWinRate / tanksWN8[17473].expWinRate,
    };
    console.log('added wn8 data for AMX 13 105 based on difference between B-C 12 t and AMX 13 90', tanksWN8[17217]);
  }
  if (!tanksWN8.hasOwnProperty(19457)) {
    tanksWN8[19457] = {
      expFrag: (tanksWN8[16641].expFrag + tanksWN8[18433].expFrag) / 2,
      expDamage: (tanksWN8[16641].expDamage + tanksWN8[18433].expDamage) / 2,
      expSpot: (tanksWN8[16641].expSpot + tanksWN8[18433].expSpot) / 2,
      expDef: (tanksWN8[16641].expDef + tanksWN8[18433].expDef) / 2,
      expWinRate: (tanksWN8[16641].expWinRate + tanksWN8[18433].expWinRate) / 2,
    };
    console.log('added wn8 data for ЛТГ from avg between МТ-25 and ЛТТБ', tanksWN8[19457]);
  }
  if (!tanksWN8.hasOwnProperty(19201)) {
    tanksWN8[19201] = {
      expFrag: tanksWN8[18177].expFrag * tanksWN8[18177].expFrag / tanksWN8[18433].expFrag,
      expDamage: tanksWN8[18177].expDamage * tanksWN8[18177].expDamage / tanksWN8[18433].expDamage,
      expSpot: tanksWN8[18177].expSpot * tanksWN8[18177].expSpot / tanksWN8[18433].expSpot,
      expDef: tanksWN8[18177].expDef * tanksWN8[18177].expDef / tanksWN8[18433].expDef,
      expWinRate: tanksWN8[18177].expWinRate * tanksWN8[18177].expWinRate / tanksWN8[18433].expWinRate,
    };
    console.log('added wn8 data for Т-100 ЛТ based on difference between ЛТТБ and Т-54 обл.', tanksWN8[19201]);
  }
  if (!tanksWN8.hasOwnProperty(20241)) {
    tanksWN8[20241] = {
      expFrag: (tanksWN8[18961].expFrag + tanksWN8[18449].expFrag) / 2,
      expDamage: (tanksWN8[18961].expDamage + tanksWN8[18449].expDamage) / 2,
      expSpot: (tanksWN8[18961].expSpot + tanksWN8[18449].expSpot) / 2,
      expDef: (tanksWN8[18961].expDef + tanksWN8[18449].expDef) / 2,
      expWinRate: (tanksWN8[18961].expWinRate + tanksWN8[18449].expWinRate) / 2,
    };
    console.log('added wn8 data for HWK 12 from avg between SP 1C and Ru 251', tanksWN8[20241]);
  }
  if (!tanksWN8.hasOwnProperty(19985)) {
    tanksWN8[19985] = {
      expFrag: tanksWN8[18449].expFrag * tanksWN8[18449].expFrag / tanksWN8[20241].expFrag,
      expDamage: tanksWN8[18449].expDamage * tanksWN8[18449].expDamage / tanksWN8[20241].expDamage,
      expSpot: tanksWN8[18449].expSpot * tanksWN8[18449].expSpot / tanksWN8[20241].expSpot,
      expDef: tanksWN8[18449].expDef * tanksWN8[18449].expDef / tanksWN8[20241].expDef,
      expWinRate: tanksWN8[18449].expWinRate * tanksWN8[18449].expWinRate / tanksWN8[20241].expWinRate,
    };
    console.log('added wn8 data for Rhm. Pzwg based on difference between HWK 12 and Ru 251', tanksWN8[19985]);
  }
  if (!tanksWN8.hasOwnProperty(19489)) {
    tanksWN8[19489] = {
      expFrag: tanksWN8[18209].expFrag * tanksWN8[18209].expFrag / tanksWN8[17953].expFrag,
      expDamage: tanksWN8[18209].expDamage * tanksWN8[18209].expDamage / tanksWN8[17953].expDamage,
      expSpot: tanksWN8[18209].expSpot * tanksWN8[18209].expSpot / tanksWN8[17953].expSpot,
      expDef: tanksWN8[18209].expDef * tanksWN8[18209].expDef / tanksWN8[17953].expDef,
      expWinRate: tanksWN8[18209].expWinRate * tanksWN8[18209].expWinRate / tanksWN8[17953].expWinRate,
    };
    console.log('added wn8 data for Sheridan based on difference between T49 and M41 Bulldog', tanksWN8[19489]);
  }
  if (!tanksWN8.hasOwnProperty(5681)) {
    tanksWN8[5681] = {
      expFrag: tanksWN8[3889].expFrag * tanksWN8[3889].expFrag / tanksWN8[3377].expFrag,
      expDamage: tanksWN8[3889].expDamage * tanksWN8[3889].expDamage / tanksWN8[3377].expDamage,
      expSpot: tanksWN8[3889].expSpot * tanksWN8[3889].expSpot / tanksWN8[3377].expSpot,
      expDef: tanksWN8[3889].expDef * tanksWN8[3889].expDef / tanksWN8[3377].expDef,
      expWinRate: tanksWN8[3889].expWinRate * tanksWN8[3889].expWinRate / tanksWN8[3377].expWinRate,
    };
    console.log('added wn8 data for WZ-132A based on difference between WZ-132 and WZ-131', tanksWN8[5681]);
  }
  if (!tanksWN8.hasOwnProperty(5937)) {
    tanksWN8[5937] = {
      expFrag: tanksWN8[5681].expFrag * tanksWN8[5681].expFrag / tanksWN8[3889].expFrag,
      expDamage: tanksWN8[5681].expDamage * tanksWN8[5681].expDamage / tanksWN8[3889].expDamage,
      expSpot: tanksWN8[5681].expSpot * tanksWN8[5681].expSpot / tanksWN8[3889].expSpot,
      expDef: tanksWN8[5681].expDef * tanksWN8[5681].expDef / tanksWN8[3889].expDef,
      expWinRate: tanksWN8[5681].expWinRate * tanksWN8[5681].expWinRate / tanksWN8[3889].expWinRate,
    };
    console.log('added wn8 data for WZ-132-1 based on difference between WZ-132A and WZ-132', tanksWN8[5937]);
  }

  return tanksWN8;
}