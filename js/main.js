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

  // Check for new tanks
  $.get(`https://api.worldoftanks.ru/wot/encyclopedia/tanks/${applicationId}`, function(resp) {
    for (var key in resp.data) {
      if (!resp.data.hasOwnProperty(key)) continue;
      const tank = resp.data[key];
      $.post('../ajax/add_tank.php', tank, function(resp) {});
    }
  });

  // Get useData
  $.get(`https://api.worldoftanks.ru/wot/account/info/${applicationId}&account_id=${defaultAccount}`, function(resp) {
    userData = resp.data[defaultAccount];
    $.get(`https://api.worldoftanks.ru/wot/account/tanks/${applicationId}&account_id=${defaultAccount}`, function(resp) {
      userData.tankData = resp.data[defaultAccount];
      console.log('userData', userData);
      fillAccountData(userData);
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