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