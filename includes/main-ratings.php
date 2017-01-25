                        <div class="b-hr-layoutfix b-hr-layoutfix__small-indent-bottom clearfix">
                            <div class="b-hr-block"> <span>&nbsp;</span> </div>
                        </div>
                        <script type="text/javascript">
                            var AUTHORIZED_ACCOUNT_ID = "",
                                VIEWED_ACCOUNT_NICKNAME = "<?=$def_nick;?>",
                                VIEWED_ACCOUNT_ID = "<?=$def_acc;?>",
                                START_RATING_TIMESTAMP = '1427846400.0',
                                LEADERBOARD_URL = '/leaderboard/',
                                GET_TOMORROW_BATTLES_LEFT_URL = '/leaderboard/get_user_battles_left/',
                                ACCOUNT_RATING_URL = '/community/accounts/<?=$def_acc;?>-/account_ratings/',
                                TIME_RANGE_I18N = { 'all': 'Всё время', '28': '4 недели', '7': '7 дней', '1': '1 день' },
                                SOCIAL_GROUP_I18N = { 'all': 'Все игроки', 'friends': 'Мои друзья', 'clan': 'Мой клан'},
                                MONTH_NAMES_GENETIVE = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                        </script>
                        <script type="text/javascript" src="http://worldoftanks.ru/static/3.26.0.2/portal/js/plugins/knockout-3.0.0.js"></script>
                        <script type="text/javascript" src="http://worldoftanks.ru/static/3.26.0.2/challenge/accounts/js/ratings.js"></script>
                        <div class="b-composite-heading clearfix">
                            <ul class="b-profile-ratings-date">
                                <li class="b-profile-ratings-date_item">
                                    <a class="b-profile-ratings-date_link js-timerange-link" href="#" data-bind="click: toggleTimeRangePopup">
                                    <span class="b-profile-ratings-date_text" data-bind="text: visibleTimeRangeText">Всё время</span>
                                    </a>
                                </li>
                                <li class="b-profile-ratings-date_item">
                                    <a class="b-profile-ratings-date_link js-socialgroup-link" href="#" data-bind="click: toggleSocialGroupPopup, visible: isAuthorizedUserIsViewed()" style="display: none;">
                                    <span class="b-profile-ratings-date_text" data-bind="text: visibleSocialGroupText">Все игроки</span>
                                    </a>
                                    <span data-bind="visible: !isAuthorizedUserIsViewed(), text: visibleSocialGroupText">Все игроки</span>
                                </li>
                                <li class="b-profile-ratings-date_item">
                                    Данные на <!-- <a class="b-profile-ratings-date_link" href="#"><span class="b-profile-ratings-date_text">--><span data-bind="text: formattedDate">01.04.2015</span> <!--</span></a> -->
                                </li>
                            </ul>
                            <h3 class="b-composite-heading_title">Рейтинги</h3>
                            <a href="/leaderboard/#wot&amp;lb_tr=all&amp;lb_sg=all&amp;lb_nick=<?=$def_nick;?>" data-bind="attr: { href: getLeaderboardLink() }" class="b-orange-arrow b-orange-arrow__heading">Зал славы</a>
                            <div class="l-choose-dropdown js-timerange-popup">
                                <ul class="b-choose-dropdown">
                                    <li class="b-choose-dropdown_item js-date-popup-li b-choose-dropdown_item__active" data-bind="css: { 'b-choose-dropdown_item__active': searchTimeRange() === 'all'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickTimeRange.bind($data, 'all'), text: getTimeRangeTextById('all')">Всё время</a>
                                    </li>
                                    <li class="b-choose-dropdown_item js-date-popup-li" data-bind="css: { 'b-choose-dropdown_item__active': searchTimeRange() === '28'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickTimeRange.bind($data, '28'), text: getTimeRangeTextById('28')">4 недели</a>
                                    </li>
                                    <li class="b-choose-dropdown_item js-date-popup-li" data-bind="css: { 'b-choose-dropdown_item__active': searchTimeRange() === '7'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickTimeRange.bind($data, '7'), text: getTimeRangeTextById('7')">7 дней</a>
                                    </li>
                                    <li class="b-choose-dropdown_item js-date-popup-li" data-bind="css: { 'b-choose-dropdown_item__active': searchTimeRange() === '1'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickTimeRange.bind($data, '1'), text: getTimeRangeTextById('1')">1 день</a>
                                    </li>
                                </ul>
                                <div class="b-choose-dropdown_arrow"></div>
                            </div>
                            <div class="l-choose-dropdown js-socialgroup-popup">
                                <ul class="b-choose-dropdown">
                                    <li class="b-choose-dropdown_item js-date-popup-li b-choose-dropdown_item__active" data-bind="css: { 'b-choose-dropdown_item__active': searchSocialGroup() === 'all'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickSocialGroup.bind($data, 'all'), text: getSocialGroupTextById('all')">Все игроки</a>
                                    </li>
                                    <li class="b-choose-dropdown_item js-date-popup-li" data-bind="css: { 'b-choose-dropdown_item__active': searchSocialGroup() === 'friends'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickSocialGroup.bind($data, 'friends'), text: getSocialGroupTextById('friends')">Мои друзья</a>
                                    </li>
                                    <li class="b-choose-dropdown_item js-date-popup-li" data-bind="css: { 'b-choose-dropdown_item__active': searchSocialGroup() === 'clan'}">
                                        <a href="" class="b-choose-dropdown_link" data-bind="click: clickSocialGroup.bind($data, 'clan'), text: getSocialGroupTextById('clan')">Мой клан</a>
                                    </li>
                                </ul>
                                <div class="b-choose-dropdown_arrow"></div>
                            </div>
                        </div>
                        <p class="b-leadership-info" data-bind="visible: error() &amp;&amp; errorCode() === 401" style="display:none">Чтобы увидеть выбранный рейтинг, <a class="js-auth-openid-link" data-next-url="/leaderboard/" href="/auth/oid/new/?next=/leaderboard/"><span>войдите на сайт</span></a>.</p>
                        <h4 data-bind="visible: error() &amp;&amp; errorCode() === 100" style="display:none">Информация о кланах временно недоступна.</h4>
                        <h4 data-bind="visible: error() &amp;&amp; errorCode() === 200" style="display:none">Ошибка формирования запроса.</h4>
                        <h4 data-bind="visible: error() &amp;&amp; errorCode() === 999" style="display:none">Ошибка получения данных.</h4>
                        <table cellpadding="0" cellspacing="0" class="t-profile" data-bind="visible: currentUser() !== false &amp;&amp; getMinimumBattlesCount() <= currentUser().battles_count &amp;&amp; !error() &amp;&amp; currentUser().is_banned !== true">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="">Рейтинги</th>
                                    <th class="t-profile_right">Значение</th>
                                    <th class="t-profile_right">Место</th>
                                </tr>
                                <tr>
                                    <td colspan="4" data-bind="visible: isLoading" style="display: none;">
                                        <div id="container_registration" class="b-death-wheel"></div>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('global_rating') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__pr">pr</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Личный рейтинг</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().global_rating)  ">7 267</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().global_rating_rank), visible: currentUser().global_rating_rank !== null">253 101</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('battles_count') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__gpl">gpl</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Количество проведённых боёв</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().battles_count)  ">6 814</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().battles_count_rank), visible: currentUser().battles_count_rank !== null">3 027 793</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('xp_amount') &amp;&amp; !isLoading()" style="display:none">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__exp">exp</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Общий опыт</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().xp_amount)  "></td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().xp_amount_rank), visible: currentUser().xp_amount_rank !== null"></span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('frags_count') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__frg">frg</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Количество уничтоженной техники</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().frags_count)  ">7 912</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().frags_count_rank), visible: currentUser().frags_count_rank !== null">1 858 252</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('damage_dealt') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__dmg">dmg</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Общий нанесённый урон</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().damage_dealt)  ">5 727 486</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().damage_dealt_rank), visible: currentUser().damage_dealt_rank !== null">2 262 315</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('xp_max') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__mxp">mxp</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Максимальный опыт за бой</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().xp_max)  ">2 737</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().xp_max_rank), visible: currentUser().xp_max_rank !== null">165 995</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('spotted_count') &amp;&amp; !isLoading()" style="display:none">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__spt">spt</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Количество обнаруженной техники</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().spotted_count)  "></td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().spotted_count_rank), visible: currentUser().spotted_count_rank !== null"></span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('wins_ratio') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__wb">wb</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Процент побед</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().wins_ratio)  + '%'  ">60,45%</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().wins_ratio_rank), visible: currentUser().wins_ratio_rank !== null">23 347</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('hits_ratio') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__hr">hr</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Процент попаданий</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().hits_ratio)  + '%'  ">61,09%</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().hits_ratio_rank), visible: currentUser().hits_ratio_rank !== null">2 061 855</span>
                                        <!-- ko if: (currentUser().hits_ratio_rank === null) --><!-- /ko -->
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('xp_avg') &amp;&amp; !isLoading()">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__eb">eb</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Средний опыт за бой</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().xp_avg)  ">548,55</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().xp_avg_rank), visible: currentUser().xp_avg_rank !== null">657 722</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('damage_avg') &amp;&amp; !isLoading()" style="display:none">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__db">db</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Средний нанесённый урон за бой</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().damage_avg)  "></td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().damage_avg_rank), visible: currentUser().damage_avg_rank !== null"></span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('survived_ratio') &amp;&amp; !isLoading()" style="display:none">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__sr">sr</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Процент выживаемости</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().survived_ratio)  + '%'  ">36,03%</td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().survived_ratio_rank), visible: currentUser().survived_ratio_rank !== null">174 168</span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('frags_avg') &amp;&amp; !isLoading()" style="display:none">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__fb">fb</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Среднее количество уничтоженной техники за бой</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().frags_avg)  "></td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().frags_avg_rank), visible: currentUser().frags_avg_rank !== null"></span>
                                    </td>
                                </tr>
                                <tr class="t-profile_rating" data-bind="visible: isRatingVisible('spotted_avg') &amp;&amp; !isLoading()" style="display:none">
                                    <td class="t-profile_rate-ico">
                                        <div class="b-leadership-type">
                                            <span class="b-leadership-type_ico b-leadership-type_ico__sb">sb</span>
                                        </div>
                                    </td>
                                    <td class="t-profile_headminor">Среднее количество обнаруженной техники за бой</td>
                                    <td class="t-profile_right" data-bind="text: thousands(currentUser().spotted_avg)  "></td>
                                    <td class="t-profile_right">
                                        <span data-bind="text: thousands(currentUser().spotted_avg_rank), visible: currentUser().spotted_avg_rank !== null"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="b-profile-link" href="/ru/content/hof_guide/" data-bind="visible: currentUser() !== false &amp;&amp; getMinimumBattlesCount() <= currentUser().battles_count &amp;&amp; !error() &amp;&amp; currentUser().is_banned === false">
                        <span class="b-profile-link_ico-info">Подробнее о рейтингах</span>
                        </a>
                        <p data-bind="visible: currentUser() !== false &amp;&amp; tomorrowBattlesLeft() > 0 &amp;&amp; !error() &amp;&amp; getMinimumBattlesCount() <= currentUser().battles_count &amp;&amp; currentUser().is_banned !== true" class="b-msg-important b-msg-important__rating" style="display: none;">
                            <span data-bind="html: tomorrowBattlesLeftMessage">Чтобы попасть в этот рейтинг завтра, сыграйте <span class="b-ratings-hlight">0 боёв</span>.</span>
                        </p>
                        <div data-bind="visible: currentUser().is_banned === true" style="display:none">
                            <p class="b-leadership-rating-text" data-bind="visible: isAuthorizedUserIsViewed()" style="display: none;">
                                Вы не попали в рейтинг из-за нарушения правил игры. Обратитесь в <a href="https://ru.wargaming.net/support/">Центр поддержки</a> за дополнительной информацией.
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: !isAuthorizedUserIsViewed()">
                                Игрок <span data-bind="text: viewedUserNickname()" class="b-leadership-rating-text_fights"><?=$def_nick;?></span> не попал в рейтинг из-за нарушения правил игры. Обратитесь в <a href="https://ru.wargaming.net/support/">Центр поддержки</a> за дополнительной информацией.
                            </p>
                            <a href="/ru/content/hof_guide/" class="b-orange-arrow b-orange-arrow__leadership">Подробнее о рейтингах</a>
                        </div>
                        <div data-bind="visible: currentUser() !== false &amp;&amp; getMinimumBattlesCount() > currentUser().battles_count &amp;&amp; !error() &amp;&amp; !isLoading() &amp;&amp; currentUser().is_banned !== true" style="display:none">
                            <!-- all rating -->
                            <div class="b-rating-dial b-rating-dial__user" data-bind="visible: searchTimeRange() === 'all'">
                                <span class="b-rating-dial_txt b-rating-dial_txt__start">0</span>
                                <div class="b-rating-dial_wrpr" data-bind="if: currentUser() !== false">
                                    <div class="b-rating-dial_line" data-bind="style: {width: (currentUser().battles_count / getMinimumBattlesCount() * 100) + '%' }" style="width: 681.4%;">
                                        <span class="b-rating-dial_value" data-bind="text: currentUser().battles_count">6814</span>
                                    </div>
                                </div>
                                <span class="b-rating-dial_txt b-rating-dial_txt__end" data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span>
                            </div>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === 'all' &amp;&amp; isAuthorizedUserIsViewed()" style="display: none;">
                                Вы не попали в рейтинг <span class="b-leadership-rating-text_fights"> за всё время</span>.
                                Вам осталось сыграть боёв: <span class="b-leadership-rating-text_fights" data-bind="text: wgsdk.thousands(getMinimumBattlesCount() - currentUser().battles_count)">-5 814</span>. <br/>
                                Выберите другой промежуток времени.
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === '1' &amp;&amp; isAuthorizedUserIsViewed()" style="display: none;">
                                Вы не попали в рейтинг <span class="b-leadership-rating-text_fights"> за <span data-bind="text: formattedDateDayNumber">1</span> <span data-bind="text: formattedDateMonthNameGenetive">апреля</span></span>, так как сыграли менее <span class="b-leadership-rating-text_fights"> <span data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span> боёв </span> за этот день. <br/>
                                <span data-bind="if: tomorrowBattlesLeft() > 0"></span><br/>
                                Выберите другой промежуток времени.
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === '7' &amp;&amp; isAuthorizedUserIsViewed()" style="display: none;">
                                Вы не попали в рейтинг <span class="b-leadership-rating-text_fights"> за 7 дней</span>, так как сыграли менее <span class="b-leadership-rating-text_fights"> <span data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span> боёв </span> за этот период. <br/>
                                <span data-bind="if: tomorrowBattlesLeft() > 0"></span><br/>
                                Выберите другой промежуток времени.
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === '28' &amp;&amp; isAuthorizedUserIsViewed()" style="display: none;">
                                Вы не попали в рейтинг <span class="b-leadership-rating-text_fights"> за 4 недели</span>, так как cыграли менее <span class="b-leadership-rating-text_fights"> <span data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span> боёв </span> за этот период. <br/>
                                <span data-bind="if: tomorrowBattlesLeft() > 0"></span><br/>
                                Выберите другой промежуток времени.
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === 'all' &amp;&amp; !isAuthorizedUserIsViewed()">
                                Игрок <span class="b-leadership-rating-text_fights"> <span data-bind="text: viewedUserNickname()"><?=$def_nick;?></span> </span> не попал в рейтинг <span class="b-leadership-rating-text_fights"> за всё время</span>. Осталось сыграть боёв: <span class="b-leadership-rating-text_fights" data-bind="text: wgsdk.thousands(getMinimumBattlesCount() - currentUser().battles_count)">-5 814</span>. <br/>
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === '1' &amp;&amp; !isAuthorizedUserIsViewed()" style="display: none;">
                                Игрок <span class="b-leadership-rating-text_fights"> <span data-bind="text: viewedUserNickname()"><?=$def_nick;?></span> </span> не попал в рейтинг <span class="b-leadership-rating-text_fights"> за <span data-bind="text: formattedDateDayNumber">1</span> <span data-bind="text: formattedDateMonthNameGenetive">апреля</span></span>, так как сыграл менее <span class="b-leadership-rating-text_fights"> <span data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span> боёв </span> за этот день. <br/>
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === '7' &amp;&amp; !isAuthorizedUserIsViewed()" style="display: none;">
                                Игрок <span class="b-leadership-rating-text_fights"> <span data-bind="text: viewedUserNickname()"><?=$def_nick;?></span> </span> не попал в рейтинг <span class="b-leadership-rating-text_fights"> за 7 дней</span>, так как сыграл менее <span class="b-leadership-rating-text_fights"> <span data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span> боёв </span> за этот период. <br/>
                            </p>
                            <p class="b-leadership-rating-text" data-bind="visible: searchTimeRange() === '28' &amp;&amp; !isAuthorizedUserIsViewed()" style="display: none;">
                                Игрок <span class="b-leadership-rating-text_fights"> <span data-bind="text: viewedUserNickname()"><?=$def_nick;?></span> </span> не попал в рейтинг <span class="b-leadership-rating-text_fights"> за 4 недели</span>, так как сыграл менее <span class="b-leadership-rating-text_fights"> <span data-bind="text: wgsdk.thousands(getMinimumBattlesCount())">1 000</span> боёв </span> за этот период. <br/>
                            </p>
                            <!-- all rating -->
                            <a href="/ru/content/hof_guide/" class="b-orange-arrow b-orange-arrow__leadership">Подробнее о рейтингах</a>
                            <!-- end all rating -->
                        </div>
                        <div data-bind="visible: error() &amp;&amp; errorCode() === 301" style="display:none">
                            <p class="b-leadership-info">Нет данных: вы пока не состоите в клане.</p>
                            <div class="l-leadership-info-alignment">
                                <p>О том, как вступить в клан, читайте в <a href="/ru/content/clanwars_guide/">Руководстве по «Глобальной карте»</a>.</p>
                            </div>
                        </div>
                        <div data-bind="visible: error() &amp;&amp; errorCode() === 302" style="display:none">
                            <p class="b-leadership-info">Нет данных: у вас пока нет друзей в списке контактов.</p>
                            <div class="l-leadership-info-alignment">
                                <p>Подробнее о добавлении друзей читайте в <a href="/ru/content/guide/Pdf/">Руководстве по игре</a>.</p>
                            </div>
                        </div>