if (localStorage.getItem("defaultAccount") === null) {
  localStorage.setItem('defaultAccount', 20250564);
}
const defaultAccount = localStorage.getItem('defaultAccount'),
      applicationId  = '?application_id=f3e7f06d42e6f54f1d63ed6e7734848b',
      tanksWN8       = {};
var userData     = false,
    accountsData = [],
    tankData     = false,
    activeTab    = 'main';

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

  getUser(defaultAccount);
});

/**
 * Load data for an account
 * @param accountId {int}
 */
function getUser(accountId) {
  $('#other_requests').hide();
  // Get userData
  $.get(`https://api.worldoftanks.ru/wot/account/info/${applicationId}&account_id=${accountId}`, function(resp) {
    userData = resp.data[accountId];
    $.get(`https://api.worldoftanks.ru/wot/tanks/stats/${applicationId}&account_id=${accountId}`, function(resp) {
      userData.tankData = {};
      resp.data[accountId].forEach((tankStats) => {
        userData.tankData[tankStats.tank_id] = Object.assign({}, tankStats);
      });
      console.log('userData', userData);
      // Get tanks data for trees and wn8 rating from http://stat.modxvm.com/wn8.json
      $.get('../ajax/tanks.php', function(resp) {
        tankData = resp.tanks;
        if (resp.wn8) {
          JSON.parse(resp.wn8).data.forEach((tankWN8) => {
            tanksWN8[tankWN8.IDNum] = Object.assign({}, tankWN8);
          });
        }
        fillAccountData(userData);
        buildNationTrees(tankData);
      });
    });
  });
  localStorage.setItem('defaultAccount', accountId);
}

/**
 * Fill html with data from WG api
 * @param data {object}
 */
function fillAccountData(data) {
  const { statistics, tankData, account_id, nickname, global_rating } = data,
        { battles, wins, xp, damage_dealt, frags, spotted, dropped_capture_points } = statistics.all,
        winrate = wins / battles * 100,
        averageExp = xp / battles,
        averageDmg = damage_dealt / battles,
        averageFrags = frags / battles,
        averageSpotted = spotted / battles,
        averageDef = dropped_capture_points / battles;
  $('#js-profile-name').html(`<a href="http://worldoftanks.ru/community/accounts/${account_id}-${nickname}/">${nickname}</a>`);
  $('#acc_input').val(data.account_id);
  $('#personal_rating').removeClass('red orange green teal violet').addClass(getColor('wg', global_rating)).html(global_rating);
  $('#winrate').removeClass('red orange green teal violet').addClass(getColor('winrate', winrate)).html(`${(winrate).toFixed(2)}%`);
  $('#total_battles').removeClass('red orange green teal violet').addClass(getColor('battles', battles)).html(battles);
  $('#average_exp').removeClass('red orange green teal violet').addClass(getColor('exp', averageExp)).html(averageExp.toFixed(2));
  $('#average_dmg').removeClass('red orange green teal violet').addClass(getColor('dmg', averageDmg)).html(averageDmg.toFixed(2));
  $('#noobmeter_link').html(`<a href="http://www.noobmeter.com/player/ru/${nickname.toLowerCase()}/${account_id}/">Noobmeter</a>`);
  $('#wots_link').html(`<a href="http://wots.com.ua/user/stats/${nickname.toLowerCase()}">WOTS</a>`);
  $('#kttc_link').html(`<a href="https://kttc.ru/wot/ru/user/${nickname.toLowerCase()}/">KTTC</a>`);
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

  const wn8  = calcWN8(averageDmg * eb, edmg, averageFrags * eb, efrg, averageSpotted * eb, espo, averageDef * eb, edef, winrate * eb, ewin);
  $('#personal_wn8').removeClass('red orange green teal violet').addClass(getColor('wn8', wn8)).html(wn8);
  $.post('../ajax/accounts.php', { account_id, nickname, battles, winrate, wg: global_rating, wn8 }, function(resp) {
    console.log(`account ${data.account_id} updated`, resp);
  });
}

/**
 * Build tank trees
 * @param tankData {array}
 */
function buildNationTrees(tankData) {
  $('.tree').html('');
  const lastExtraRow = {};
  tankData.forEach((tank) => {
    const { id, row, image_small, name, short_name, level, type, is_premium, nation, relations } = tank,
          userTankData = userData.tankData[id];
    if ((row < 12) || userTankData) {
      let tankRow = row;
      if (row > 11) {
        if (lastExtraRow[`${nation}${level}`]) {
          lastExtraRow[`${nation}${level}`]++;
        } else {
          lastExtraRow[`${nation}${level}`] = 12;
        }
        tankRow = lastExtraRow[`${nation}${level}`];
      }
      let tankDiv = `<div class="vicLogo"><img src="${image_small}" /></div>`;
      tankDiv += `<span class="mark" title="${name}">${(short_name.length < name.length) ? short_name : name}</span>`;
      tankDiv += `<span class="level">${level}</span>`;
      tankDiv += `<span class="class">${getTankTypeImg(type)}</span>`;
      if (is_premium == 1) {
        tankDiv += '<span class="golden"><img src="../images/gold.png" title="750" width="12" height="12" /></span>';
      }
      if (userTankData) {
        const { mark_of_mastery, all } = userTankData,
              { wins, battles, damage_dealt, frags, spotted, dropped_capture_points } = all,
              tankWinrate = wins / battles * 100;
        if (mark_of_mastery > 0) {
          tankDiv += `<span class="mastery"><img src="../images/class${mark_of_mastery}.png" alt=""></span>`;
        }
        tankDiv += `<div class="gamerbattles">боёв <span class="ratings ${getColor('winrate', tankWinrate)}">${battles}(${tankWinrate.toFixed(0)}%)</span>`;
        if (tanksWN8[tank.id]) {
          const { expDamage, expFrag, expSpot, expDef, expWinRate } = tanksWN8[tank.id],
                avgDmg = damage_dealt / battles,
                tankWN8 = calcWN8(avgDmg, expDamage, frags / battles, expFrag, spotted / battles, expSpot, dropped_capture_points / battles, expDef, tankWinrate, expWinRate);
          tankDiv += ` wn8 <span class="ratings ${getColor('wn8', tankWN8)}">${tankWN8}</span>`;
          tankDiv += ` dmg <span class="ratings ${getColor('tankDmg', avgDmg / expDamage)}" title="Expected: ${expDamage.toFixed(0)}">${avgDmg.toFixed(0)}</span>`;
        }
        tankDiv += '</div>';
      } else {
        tankDiv += '<span style="position: absolute; width: 100%; height: 100%; top: 0px; background-color: rgba(0, 0, 0, 0.5);"></span>';
      }
      if (relations) {
        tankDiv += relations;
      }
      $(`#tree-${nation}`).append(`<div class="tblock column${level} row${tankRow}">${tankDiv}</div>`);
    }
  });
  $('#other_requests').show();
}

/**
 * Get saved accounts from DB
 */
function showAccounts() {
  // TODO: remove excess calls to BE
  $.get('../ajax/accounts.php', function(accounts) {
    accountsData = [];
    Object.keys(accounts).forEach((account_id) => {
      const { nickname, battles, winrate, wg, wn8 } = accounts[account_id];
      let tr = `<td><span onclick="getUser(${account_id})">${nickname}</span></td>`;
      tr += `<td class="${getColor('battles',battles)}">${battles}</td>`;
      tr += `<td class="${getColor('winrate', winrate)}">${winrate}</td>`;
      tr += `<td class="${getColor('wg', wg)}">${wg}</td>`;
      tr += `<td class="${getColor('wn8', wn8)}">${wn8}</td>`;
      accountsData.push(Object.assign({}, accounts[account_id], { tr }));
    });
    accountsData.sort(function(a, b) {
      const aWN8 = a.wn8 * 1,
            bWN8 = b.wn8 * 1;
      return (aWN8 < bWN8) ? 1 : ((aWN8 > bWN8) ? -1 : 0);
    });
    console.log('accountsData', accountsData);
    $('#other_requests > table > tbody').html('');
    accountsData.forEach((account) => {
      $('#other_requests > table > tbody').append(`<tr>${account.tr}</tr>`);
    })
    $('#other_requests > table').toggle();
  });
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
function calcWN8(damage, expDamage, frags, expFrags, spotted, expSpotted, def, expDef, winrate, expWinrate) {
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
function getColor(type, value) {
  let color = 'red';
  const types = {
    wn8: [2880, 2180, 1470, 900],
    wg: [10175, 8730, 6515, 4435],
    winrate: [65, 58, 53, 49],
    battles: [20000, 14000, 9000, 5000],
    exp: [1200, 1100, 800, 600],
    dmg: [2500, 1800, 1000, 750],
    tankDmg: [1.8, 1.5, 1, 0.6],
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