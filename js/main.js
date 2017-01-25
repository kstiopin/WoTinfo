if (localStorage.getItem("defaultAccount") === null) {
  localStorage.setItem('defaultAccount', 20250564);
}
const defaultAccount = localStorage.getItem('defaultAccount');
const applicationId = '?application_id=f3e7f06d42e6f54f1d63ed6e7734848b';
var userData = false;
var activeTab = 'main';

$(document).ready(function() {
  // bind tabs
  $('#nations li').click(function() {
    const id = $(this).data("id");
    if ((id === 'current') || (id === 'final')) {
      listCreate(id);
    }
    $('#nations li.active').removeClass('active');
    $(this).removeClass('click').addClass('active');
    $(`#${activeTab}`).hide();
    if (id === 'main') {
      activeTab = 'main';
      $('#ntree').hide();
    } else {
      activeTab = `tree-${id}`;
      $('#ntree').show();
    }
    $(`#${activeTab}`).show();
  });

  // Get userData
  $.get(`https://api.worldoftanks.ru/wot/account/info/${applicationId}&account_id=${defaultAccount}`, function(resp) {
    userData = resp.data[defaultAccount];
    fillAccountData(userData);
    $.get(`https://api.worldoftanks.ru/wot/account/tanks/${applicationId}&account_id=${defaultAccount}`, function(resp) {
      userData.tankData = {};
      resp.data[defaultAccount].forEach((tankStats) => {
        userData.tankData[tankStats.tank_id] = Object.assign({}, { mastery: tankStats.mark_of_mastery }, tankStats.statistics);
      });
      console.log('userData', userData);
      // Get tanks data for trees
      $.get('../ajax/tanks.php', function(tankData) {
        //console.log('tanks data', { tankData });
        tankData.forEach((tank) => {
          let tankDiv = `<div class="tblock column${tank.level} row${tank.row}">`;
          tankDiv += `<div class="vicLogo"><img src="${tank.image_small}" /></div>`;
          tankDiv += `<span class="mark" title="${tank.name}">${tank.name}</span>`;
          tankDiv += `<span class="level">${tank.level}</span>`;
          tankDiv += `<span class="class">${getTankTypeImg(tank.type)}</span>`;
          if (tank.is_premium == 1) {
            tankDiv += '<span class="golden"><img src="http://armor.kiev.ua/wot/images/gold.png" title="750" width="12" height="12" /></span>';
          }
          if (userData.tankData[tank.id]) {
            tankDiv += `<span class="mastery"><img src="http://armor.kiev.ua/wot/images/awards/class${userData.tankData[tank.id].mastery}.png" alt=""></span>`;
            const tankWinrate = userData.tankData[tank.id].wins / userData.tankData[tank.id].battles * 100;
            tankDiv += `<div class="gamerstats">${userData.tankData[tank.id].battles} боёв<br>${userData.tankData[tank.id].wins} побед<br>${tankWinrate.toFixed(2)} %</div>`;
            tankDiv += `<div class="gamerbattles ${getColor('winrate', tankWinrate)}">${userData.tankData[tank.id].battles}</div>`;
          } else {
            tankDiv += '<span style="position: absolute; width: 100%; height: 100%; top: 0px; background-color: rgba(0, 0, 0, 0.5);"></span>';
          }
          tankDiv += '</div>';
          $(`#tree-${tank.nation}`).append(tankDiv);
        });
      });
    });
  });
});

/**
 * Fill html with data from WG api
 * @param data {object}
 */
function fillAccountData(data) {
  const { statistics } = data;
  $('#js-profile-name').html(`<a href="http://worldoftanks.ru/community/accounts/${data.account_id}-${data.nickname}/">${data.nickname}</a>`);
  $('#acc_input').val(data.account_id);
  $('#personal_rating').addClass(getColor('wg', data.global_rating)).html(data.global_rating);
  $('#personal_wn8').addClass(getColor('wn8', 2035)).html(2035);
  const winrate = statistics.all.wins / statistics.all.battles * 100;
  $('#winrate').addClass(getColor('winrate', winrate)).html(`${(winrate).toFixed(2)}%`);
  $('#total_battles').addClass(getColor('battles', statistics.all.battles)).html(statistics.all.battles);
  const averageExp = statistics.all.xp / statistics.all.battles;
  $('#average_exp').addClass(getColor('exp', averageExp)).html(averageExp.toFixed(2));
  const averageDmg = statistics.all.damage_dealt / statistics.all.battles;
  $('#average_dmg').addClass(getColor('dmg', averageDmg)).html(averageDmg.toFixed(2));
}

/**
 * Get color for specific type of stats
 * @param type {string}
 * @param value {int}
 * @return class color {string}
 */
function getColor(type, value) {
  let color = 'red';
  if (type === 'wn8') {
    if (value >= 2880) {
      color = 'violet';
    } else if (value >= 2180) {
      color = 'teal';
    } else if (value >= 1470) {
      color = 'green';
    } else if (value >= 900) {
      color = 'yellow';
    }
  }
  if (type === 'wg') {
    if (value >= 10175) {
      color = 'violet';
    } else if (value >= 8730) {
      color = 'teal';
    } else if (value >= 6515) {
      color = 'green';
    } else if (value >= 4435) {
      color = 'yellow';
    }
  }
  if (type === 'winrate') {
    if (value >= 65) {
      color = 'violet';
    } else if (value >= 58) {
      color = 'teal';
    } else if (value >= 53) {
      color = 'green';
    } else if (value >= 49) {
      color = 'yellow';
    }
  }
  if (type === 'battles') {
    if (value >= 20000) {
      color = 'violet';
    } else if (value >= 14000) {
      color = 'teal';
    } else if (value >= 9000) {
      color = 'green';
    } else if (value >= 5000) {
      color = 'yellow';
    }
  }
  if (type === 'exp') {
    if (value >= 1200) {
      color = 'violet';
    } else if (value >= 1100) {
      color = 'teal';
    } else if (value >= 800) {
      color = 'green';
    } else if (value >= 600) {
      color = 'yellow';
    }
  }
  if (type === 'dmg') {
    if (value >= 2500) {
      color = 'violet';
    } else if (value >= 1800) {
      color = 'teal';
    } else if (value >= 1000) {
      color = 'green';
    } else if (value >= 750) {
      color = 'yellow';
    }
  }

  return color;
}

/**
 * Show player tanks
 * @param type {string} current or prognosed angar
 */
function listCreate(type) {
  console.log('listCreate', type, 'need data from trees first');
  /*
  $('#ntree div.treeWrapper div#tree').html('');
  var array = (type === 'final') ? wishlist_divs : current_divs;

  for (var i = 1; i < 11; i++) {
    var row = 1;
    if (typeof(array['column' + i]) !== 'undefined') {
      $.each(array['column' + i], function(key, val) {
        $('#ntree div.treeWrapper div#tree').append('<div class="tblock column' + i + ' row' + row + '">' + val + '</div>');
        $('#ntree div.treeWrapper div#tree > div > img').remove();
        row++;
      });
    }
  } */
}

/**
 * Check for new tanks on WG wiki
 */
function checkNweTanks() {
  $.get(`https://api.worldoftanks.ru/wot/encyclopedia/tanks/${applicationId}`, function(resp) {
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

function getTankTypeImg(type) {
  const labels = { lightTank: 'Лёгкий танк', mediumTank: 'Средний танк', heavyTank: 'Тяжёлый танк', 'AT-SPG': 'ПТ САУ', SPG: 'САУ' };

  return `<img src="http://armor.kiev.ua/wot/images/type-${type}.png" align="top" alt="${labels[type]}" title="${labels[type]}" />`;
}