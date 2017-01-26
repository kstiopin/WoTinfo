if (localStorage.getItem("defaultAccount") === null) {
  localStorage.setItem('defaultAccount', 20250564);
}
const defaultAccount = localStorage.getItem('defaultAccount'),
      applicationId = '?application_id=f3e7f06d42e6f54f1d63ed6e7734848b',
      tanksWN8 = {};
var userData = false,
    tankData = false,
    activeTab = 'main';

$(document).ready(function() {
  // bind tabs
  $('#nations li').click(function() {
    const id = $(this).data("id");
    $('#nations li.active').removeClass('active');
    $(this).removeClass('click').addClass('active');
    $(`#${activeTab}`).hide();
    if (id === 'main') {
      activeTab = 'main';
      $('.tree_head').hide();
      $('#ntree').hide();
    } else {
      activeTab = `tree-${id}`;
      $('.tree_head').show();
      $('#ntree').show();
    }
    $(`#${activeTab}`).show();
  });

  // Get userData
  $.get(`https://api.worldoftanks.ru/wot/account/info/${applicationId}&account_id=${defaultAccount}`, function(resp) {
    userData = resp.data[defaultAccount];
    $.get(`https://api.worldoftanks.ru/wot/tanks/stats/${applicationId}&account_id=${defaultAccount}`, function(resp) {
      userData.tankData = {};
      resp.data[defaultAccount].forEach((tankStats) => {
        userData.tankData[tankStats.tank_id] = Object.assign({}, tankStats);
      });
      console.log('userData', userData);
      // Get tanks data for trees and wn8 rating from http://stat.modxvm.com/wn8.json
      $.get('../ajax/tanks.php', function(resp) {
        tankData = resp.tanks;
        JSON.parse(resp.wn8).data.forEach((tankWN8) => {
          tanksWN8[tankWN8.IDNum] = Object.assign({}, tankWN8);
        });
        console.log('wn8', tanksWN8);
        fillAccountData(userData);
        buildNationTrees(tankData);
      });
    });
  });
});

/**
 * Fill html with data from WG api
 * @param data {object}
 */
function fillAccountData(data) {
  const { statistics, tankData } = data,
        { battles, wins, xp, damage_dealt, frags, spotted, dropped_capture_points } = statistics.all,
        winrate = wins / battles * 100,
        averageExp = xp / battles,
        averageDmg = damage_dealt / battles,
        averageFrags = frags / battles,
        averageSpotted = spotted / battles,
        averageDef = dropped_capture_points / battles;
  $('#js-profile-name').html(`<a href="http://worldoftanks.ru/community/accounts/${data.account_id}-${data.nickname}/">${data.nickname}</a>`);
  $('#acc_input').val(data.account_id);
  $('#personal_rating').addClass(getColor('wg', data.global_rating)).html(data.global_rating);
  $('#winrate').addClass(getColor('winrate', winrate)).html(`${(winrate).toFixed(2)}%`);
  $('#total_battles').addClass(getColor('battles', battles)).html(battles);
  $('#average_exp').addClass(getColor('exp', averageExp)).html(averageExp.toFixed(2));
  $('#average_dmg').addClass(getColor('dmg', averageDmg)).html(averageDmg.toFixed(2));
  $('#armor_link').html(`<a href="http://armor.kiev.ua/wot/gamerstat/${data.nickname}">${data.nickname}</a>`);
  $('#noobmeter_link').html(`<a href="http://www.noobmeter.com/player/ru/${data.nickname.toLowerCase()}/${data.account_id}/">Noobmeter</a>`);
  $('#wots_link').html(`<a href="http://wots.com.ua/user/stats/${data.nickname.toLowerCase()}">WOTS</a>`);
  // подсчёт WN8
  // считаем средний уровень
  let btl = 0,
      lvlbtl = 0;
  Object.keys(userData.tankData).forEach((tid) => {
    btl += userData.tankData[tid].all.battles;
    lvlbtl += userData.tankData[tid].all.battles * tankData[tid].level;
  });
  const lvl = lvlbtl/btl;
  // считаем WN8
  var efrg = 0,
      edmg = 0,
      espo = 0,
      edef = 0,
      ewin = 0,
      eb   = 0;
  Object.keys(userData.tankData).forEach((tid) => {
    var tb  = userData.tankData[tid].all.battles;
    if (typeof(tanksWN8[tid]) !== "undefined") {
      efrg += tb * tanksWN8[tid].expFrag;
      edmg += tb * tanksWN8[tid].expDamage;
      espo += tb * tanksWN8[tid].expSpot;
      edef += tb * tanksWN8[tid].expDef;
      ewin += tb * tanksWN8[tid].expWinRate;
      eb   += tb;
    }
  });

  var rWin  = Math.max(((winrate * eb / ewin - 0.71) / (1 - 0.71)), 0);
  var rDmg  = Math.max(((averageDmg * eb / edmg - 0.22) / (1 - 0.22)), 0);
  var rFrag = Math.max(Math.min(rDmg + 0.2,(( averageFrags * eb / efrg - 0.12) / (1 - 0.12))), 0);
  var rSpot = Math.max(Math.min(rDmg + 0.1,(( averageSpotted * eb / espo - 0.38) / (1 - 0.38))), 0);
  var rDef  = Math.max(Math.min(rDmg + 0.1,(( averageDef * eb / edef - 0.10) / (1 - 0.10))), 0);

  const wn8  = 980 * rDmg + 210 * rDmg * rFrag + 155 * rFrag * rSpot + 75 * rDef * rFrag + 145 * Math.min(1.8, rWin);
  $('#personal_wn8').addClass(getColor('wn8', wn8)).html(wn8.toFixed(0));
}

/**
 * Build tank trees
 * @param tankData {array}
 */
function buildNationTrees(tankData) {
  tankData.forEach((tank) => {
    const userTankData = userData.tankData[tank.id];
    let tankDiv = `<div class="tblock column${tank.level} row${tank.row}">`;
    tankDiv += `<div class="vicLogo"><img src="${tank.image_small}" /></div>`;
    tankDiv += `<span class="mark" title="${tank.name}">${tank.short_name}</span>`;
    tankDiv += `<span class="level">${tank.level}</span>`;
    tankDiv += `<span class="class">${getTankTypeImg(tank.type)}</span>`;
    if (tank.is_premium == 1) {
      tankDiv += '<span class="golden"><img src="../images/gold.png" title="750" width="12" height="12" /></span>';
    }
    if (userTankData) {
      const { mark_of_mastery, all } = userTankData;
      if (mark_of_mastery > 0) {
        tankDiv += `<span class="mastery"><img src="../images/class${mark_of_mastery}.png" alt=""></span>`;
      }
      const tankWinrate = all.wins / all.battles * 100;
      tankDiv += `<div class="gamerbattles">боёв <span class="ratings ${getColor('winrate', tankWinrate)}">${all.battles} (${tankWinrate.toFixed(0)}%)</span>`;
      const tankWN8 = calcTankWN8(tank.id, tankWinrate, all);
      tankDiv += ` wn8 <span class="ratings ${getColor('wn8', tankWN8)}">${tankWN8}</span></div>`;
    } else {
      tankDiv += '<span style="position: absolute; width: 100%; height: 100%; top: 0px; background-color: rgba(0, 0, 0, 0.5);"></span>';
    }
    if (tank.relations) {
      tankDiv += tank.relations;
    }
    tankDiv += '</div>';
    $(`#tree-${tank.nation}`).append(tankDiv);
  });
}

/**
 * Get specific tank WN8 rating
 * @param id {int} tank ID
 * @param avgWinRate {float} calculated winrate
 * @param data {object} tank battles statistics
 * @returns {number}
 */
function calcTankWN8(id, avgWinRate, data) {
  const rDAMAGE = (data.damage_dealt / data.battles) / tanksWN8[id].expDamage;
  const rSPOT = (data.spotted / data.battles) / tanksWN8[id].expSpot;
  const rFRAG = (data.frags / data.battles) / tanksWN8[id].expFrag;
  const rDEF = (data.dropped_capture_points / data.battles) / tanksWN8[id].expDef;
  const rWIN = avgWinRate / tanksWN8[id].expWinRate;
  // Нормализованное значение =  max(нижняя граница, (взвешенное соотношение – константа ) / (1 – константа))
  const rWINc = Math.max(0, (rWIN - 0.71) / (1 - 0.71));
  const rDAMAGEc= Math.max(0, (rDAMAGE - 0.22) / (1 - 0.22));
  // Нормализованное значение = min(верхняя граница, max(нижняя граница, (взвешенное соотношение – константа ) / (1 – константа)))
  const rFRAGc = Math.min(rDAMAGEc + 0.2, Math.max(0, (rFRAG - 0.12) / (1 - 0.12)));
  const rSPOTc = Math.min(rDAMAGEc + 0.1,  Math.max(0, (rSPOT - 0.38) / (1 - 0.38)));
  const rDEFc = Math.min(rDAMAGEc + 0.1, Math.max(0, (rDEF - 0.10) / (1 - 0.10)));

  return (980 * rDAMAGEc + 210 * rDAMAGEc * rFRAGc + 155 * rFRAGc * rSPOTc + 75 * rDEFc * rFRAGc + 145 * Math.min(1.8, rWINc)).toFixed(0);
}

/**
 * Get color for specific type of stats
 * @param type {string}
 * @param value {int}
 * @return class color {string}
 */
function getColor(type, value) {
  let color = 'red';
  const types = {
    wn8: [2880, 2180, 1470, 900],
    wg: [10175, 8730, 6515, 4435],
    winrate: [65, 58, 53, 49],
    battles: [20000, 14000, 9000, 5000],
    exp: [1200, 1100, 800, 600],
    dmg: [2500, 1800, 1000, 750]
  };
  if (value >= types[type][0]) {
    color = 'violet';
  } else if (value >= types[type][1]) {
    color = 'teal';
  } else if (value >= types[type][2]) {
    color = 'green';
  } else if (value >= types[type][3]) {
    color = 'yellow';
  }

  return color;
}

/**
 * Check for new tanks on WG wiki
 */
function checkNewTanks() {
  $.get(`https://api.worldoftanks.ru/wot/encyclopedia/tanks/${applicationId}`, function(resp) {
    console.log('tanks from wiki', resp);
    addNewTanks(resp.data);
  });
}

/**
 * Add new tanks to our DB from WG wiki
 * @param tanks {object}
 */
function addNewTanks(tanks) {
  for (var key in tanks) {
    if (!tanks.hasOwnProperty(key)) continue;
    const tank = tanks[key];
    $.post('../ajax/add_tank.php', tank, function(resp) {});
  }
}

/**
 * Get tank type img
 * @param type {string}
 * @returns img {<img />}
 */
function getTankTypeImg(type) {
  const labels = { lightTank: 'Лёгкий танк', mediumTank: 'Средний танк', heavyTank: 'Тяжёлый танк', 'AT-SPG': 'ПТ САУ', SPG: 'САУ' };

  return `<img src="../images/type-${type}.png" align="top" alt="${labels[type]}" title="${labels[type]}" />`;
}