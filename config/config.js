if (localStorage.getItem('defaultAccount') === null) {
  localStorage.setItem('defaultAccount', 20250564);
}

import { getUrlParameter } from '../helpers';

export const accountId = getUrlParameter('account_id') ? getUrlParameter('account_id') : localStorage.getItem('defaultAccount');
export const accessToken = getUrlParameter('access_token') ? `&access_token=${getUrlParameter('access_token')}` : '';

export const apiUrl = 'https://api.worldoftanks.ru/wot/';
export const applicationId = '?application_id=f3e7f06d42e6f54f1d63ed6e7734848b';

if (localStorage.getItem('defaultStatsTab') === null) {
  localStorage.setItem('defaultStatsTab', 'random');
}
export const defaultStatsTab = localStorage.getItem('defaultStatsTab');

export const fetchHeaders = {
  method: 'GET',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
  }
};

export const colorScales = {
  wn8: [2980, 2232, 1490, 915, 398],
  wg: [10175, 8730, 6515, 4435, 3000],
  winrate: [64.20, 57.91, 52.46, 49.11, 46.37],
  battles: [20000, 14000, 10000, 7000, 4000],
  exp: [1200, 1100, 800, 600, 450],
  dmg: [2500, 1800, 1000, 750, 500],
  tankDmg: [1.7, 1.4, 1.1, 0.7, 0.5],
};

export const scaleColors = ['violet', 'teal', 'green', 'yellow', 'orange', 'red'];