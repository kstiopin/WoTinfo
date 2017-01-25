<div class="b-hr-layoutfix b-hr-layoutfix__small-indent-bottom clearfix">
                            <div class="b-hr-block"> <span>&nbsp;</span> </div>
                        </div>
                        <script>
                            var VEHICLE_DETAILED_STATISTICS_URL = "/community/accounts/<?=$def_acc;?>/vehicle_details/";
                        </script>
                        <h3>Техника</h3>
                        <div id="js-vehicle-details-template" style="display:none">
                            <div class="js-slide-animate">
                                <div class="b-vehicle-detail clearfix">
                                    <div class="b-death-wheel js-wheel-death"></div>
                                    <div class="js-error-data" style="display:none">
                                        Ошибка получения данных.
                                    </div>
                                    <p class="b-msg-error js-error-no-data" style="display:none">
                                        Данные вашего профиля ещё не обновлены в базе данных.  Войдите в игру или повторите попытку через несколько минут.
                                    </p>
                                    <div class="js-loaded-data" style="display:none">
                                        <p class="b-vehicle-detail_txt js-data" data-field="vehicle_description" data-type="text"></p>
                                        <div class="b-vehicle-detail_link js-vehicle-description-link" style="display:none">
                                            <a href="" class="b-orange-arrow js-vehicle-url">Описание техники</a>
                                        </div>
                                        <div class="b-vehicle-slider js-achievement_slider">
                                            <div class="b-vehicle-slider_inner">
                                                <ul class="b-vehicle-slider_list clearfix js-minislider_list">
                                                    <li class="b-vehicle-slider_item js-minislider_item js-tooltip">
                                                        <img data-prefix="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/achievement/" data-postfix=".png">
                                                        <div class="b-achivements_wrpr js-count-wrapper" style="display:none">
                                                            <span class="b-achivements_num">
                                                            <span class="js-count"></span>
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="" class="b-vehicle-slider_prev js-minislider_prev">Назад</a>
                                            <a href="" class="b-vehicle-slider_next js-minislider_next">Вперёд</a>
                                        </div>
                                        <div class="b-vehicle-minitable b-vehicle-minitable__right">
                                            <table cellspacing="0" cellpadding="0" class="t-dotted t-dotted__vehicle">
                                                <tbody>
                                                    <tr>
                                                        <td>Отношение уничтожил/убит</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="frags_killed_ratio" data-type="float"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Отношение нанесённого/полученного урона</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="damage_dealt_received_ratio" data-type="float"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Среднее количество уничтоженной техники</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="frags_per_battle" data-type="float"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Средний нанесённый урон за бой</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="damage_per_battle"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="b-vehicle-minitable">
                                            <table cellspacing="0" cellpadding="0" class="t-dotted t-dotted__vehicle">
                                                <tbody>
                                                    <tr>
                                                        <td>Уничтоженная техника</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="frags_count"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Суммарный опыт</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="xp_amount"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Максимальный опыт за бой</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="xp_max"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Процент попаданий</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="hits_percent" data-postfix="%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Нанесённый урон</td>
                                                        <td class="t-dotted_value t-dotted_value__important js-data" data-field="damage_dealt"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" class="t-profile t-profile__vehicle js-vehicle-table">
                            <thead>
                                <tr class="">
                                    <th width="388" class="" tabindex="0" unselectable="on" style="-webkit-user-select: none;">
                                        <span class="t-profile_vehicle-head">Танки</span>
                                    </th>
                                    <th class="t-profile_right" tabindex="0" unselectable="on" style="-webkit-user-select: none;">
                                        <span class="t-profile_vehicle-head">Бои</span>
                                    </th>
                                    <th class="t-profile_center" tabindex="0" unselectable="on" style="-webkit-user-select: none;">
                                        <span class="t-profile_vehicle-head">Победы</span>
                                    </th>
                                    <th class="t-profile_center" width="105" tabindex="0" unselectable="on" style="-webkit-user-select: none;">
                                        <span class="t-profile_vehicle-head t-profile_vehicle-head__fix"><span id="vehicle-head-tooltip" class="">Знаки классности</span></span>
                                        <div class="b-tooltip-main" id="vehicle-head-tooltip_tooltip">
                                            Знаки классности
                                        </div>
                                    </th>
                                    <th width="31" class="t-profile_dropdown-ico sorter-false" tabindex="0" unselectable="on" style="-webkit-user-select: none;">
                                        <span class="t-profile_dropdown-link js-table-dropdown-all" title="Показать/скрыть всю технику"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tablesorter-no-sort">
                                <tr class="t-profile_tankstype js-table-dropdown-link">
                                    <td class="t-profile_head" width="388">
                                        <span class="b-tankstype-ico b-tankstype-ico__lighttank"></span>
                                        <span class="b-tankstype-text">Лёгкие танки
                                        <span class="b-armory-col">33</span>
                                        </span>
                                    </td>
                                    <td class="t-profile_right">784</td>
                                    <td class="t-profile_center">57%</td>
                                    <td class="t-profile_center">32 </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="" class="t-profile_dropdown-link" title="Показать/скрыть технику"></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="sortable" style="display: none;">
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-t-46.png" alt="T-46">
                                        </div>
                                        <span class="b-name-vehicle">Т-46</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="217">217</td>
                                    <td class="t-profile_center">64%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3073" data-vehicle-url="/encyclopedia/vehicles/ussr/t-46/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-elc_amx.png" alt="ELC_AMX">
                                        </div>
                                        <span class="b-name-vehicle">ELC AMX</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="134">134</td>
                                    <td class="t-profile_center">47%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="14145" data-vehicle-url="/encyclopedia/vehicles/france/elc_amx/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m22_locust.png" alt="M22_Locust">
                                        </div>
                                        <span class="b-name-vehicle">M22 Locust</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="66">66</td>
                                    <td class="t-profile_center">62%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="52769" data-vehicle-url="/encyclopedia/vehicles/usa/m22_locust/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m5_stuart.png" alt="M5_Stuart">
                                        </div>
                                        <span class="b-name-vehicle">M5 Stuart</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="56">56</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5153" data-vehicle-url="/encyclopedia/vehicles/usa/m5_stuart/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch09_m5.png" alt="Ch09_M5">
                                        </div>
                                        <span class="b-name-vehicle">M5A1 Stuart</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="49">49</td>
                                    <td class="t-profile_center">59%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3121" data-vehicle-url="/encyclopedia/vehicles/china/ch09_m5/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-ms-1.png" alt="MS-1">
                                        </div>
                                        <span class="b-name-vehicle">МС-1</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="33">33</td>
                                    <td class="t-profile_center">70%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3329" data-vehicle-url="/encyclopedia/vehicles/ussr/ms-1/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-amx38.png" alt="AMX38">
                                        </div>
                                        <span class="b-name-vehicle">AMX 38</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="28">28</td>
                                    <td class="t-profile_center">36%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5953" data-vehicle-url="/encyclopedia/vehicles/france/amx38/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-pz35t.png" alt="Pz35t">
                                        </div>
                                        <span class="b-name-vehicle">Pz.Kpfw. 35 (t)</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="21">21</td>
                                    <td class="t-profile_center">48%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="785" data-vehicle-url="/encyclopedia/vehicles/germany/pz35t/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-bt-7.png" alt="BT-7">
                                        </div>
                                        <span class="b-name-vehicle">БТ-7</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="18">18</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="769" data-vehicle-url="/encyclopedia/vehicles/ussr/bt-7/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-a-20.png" alt="A-20">
                                        </div>
                                        <span class="b-name-vehicle">А-20</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="18">18</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2049" data-vehicle-url="/encyclopedia/vehicles/ussr/a-20/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-amx40.png" alt="AMX40">
                                        </div>
                                        <span class="b-name-vehicle">AMX 40</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="18">18</td>
                                    <td class="t-profile_center">44%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2881" data-vehicle-url="/encyclopedia/vehicles/france/amx40/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-t-26.png" alt="T-26">
                                        </div>
                                        <span class="b-name-vehicle">Т-26</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="14">14</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4609" data-vehicle-url="/encyclopedia/vehicles/ussr/t-26/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-ltp.png" alt="LTP">
                                        </div>
                                        <span class="b-name-vehicle">ЛТП</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="13">13</td>
                                    <td class="t-profile_center">38%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="56577" data-vehicle-url="/encyclopedia/vehicles/ussr/ltp/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m24_chaffee.png" alt="M24_Chaffee">
                                        </div>
                                        <span class="b-name-vehicle">M24 Chaffee</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="12">12</td>
                                    <td class="t-profile_center">75%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="9761" data-vehicle-url="/encyclopedia/vehicles/usa/m24_chaffee/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-pzii.png" alt="PzII">
                                        </div>
                                        <span class="b-name-vehicle">Pz.Kpfw. II</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="10">10</td>
                                    <td class="t-profile_center">60%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2065" data-vehicle-url="/encyclopedia/vehicles/germany/pzii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-pziii_a.png" alt="PzIII_A">
                                        </div>
                                        <span class="b-name-vehicle">Pz.Kpfw. III Ausf. A</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="8">8</td>
                                    <td class="t-profile_center">75%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4881" data-vehicle-url="/encyclopedia/vehicles/germany/pziii_a/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch08_type97_chi_ha.png" alt="Ch08_Type97_Chi_Ha">
                                        </div>
                                        <span class="b-name-vehicle">Type 2597 Chi-Ha</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="8">8</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4401" data-vehicle-url="/encyclopedia/vehicles/china/ch08_type97_chi_ha/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-ltraktor.png" alt="Ltraktor">
                                        </div>
                                        <span class="b-name-vehicle">Leichttraktor</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="8">8</td>
                                    <td class="t-profile_center">62%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3089" data-vehicle-url="/encyclopedia/vehicles/germany/ltraktor/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m3_stuart.png" alt="M3_Stuart">
                                        </div>
                                        <span class="b-name-vehicle">M3 Stuart</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="6">6</td>
                                    <td class="t-profile_center">83%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="289" data-vehicle-url="/encyclopedia/vehicles/usa/m3_stuart/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-g108_pzkpfwii_ausfd.png" alt="G108_PzKpfwII_AusfD">
                                        </div>
                                        <span class="b-name-vehicle">Pz.Kpfw. II Ausf. D</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="6">6</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="60433" data-vehicle-url="/encyclopedia/vehicles/germany/g108_pzkpfwii_ausfd/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-pzi.png" alt="PzI">
                                        </div>
                                        <span class="b-name-vehicle">Pz.Kpfw. I</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="6">6</td>
                                    <td class="t-profile_center">33%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="12817" data-vehicle-url="/encyclopedia/vehicles/germany/pzi/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t1_cunningham.png" alt="T1_Cunningham">
                                        </div>
                                        <span class="b-name-vehicle">T1 Cunningham</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="5">5</td>
                                    <td class="t-profile_center">40%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="545" data-vehicle-url="/encyclopedia/vehicles/usa/t1_cunningham/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m2_lt.png" alt="M2_lt">
                                        </div>
                                        <span class="b-name-vehicle">M2 Light Tank</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="5">5</td>
                                    <td class="t-profile_center">60%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1825" data-vehicle-url="/encyclopedia/vehicles/usa/m2_lt/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch07_vickers_mke_type_bt26.png" alt="Ch07_Vickers_MkE_Type_BT26">
                                        </div>
                                        <span class="b-name-vehicle">Vickers Mk. E Type B</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="5">5</td>
                                    <td class="t-profile_center">80%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2353" data-vehicle-url="/encyclopedia/vehicles/china/ch07_vickers_mke_type_bt26/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-d1.png" alt="D1">
                                        </div>
                                        <span class="b-name-vehicle">D1</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="5">5</td>
                                    <td class="t-profile_center">40%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1601" data-vehicle-url="/encyclopedia/vehicles/france/d1/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-bt-2.png" alt="BT-2">
                                        </div>
                                        <span class="b-name-vehicle">БТ-2</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="3">3</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1025" data-vehicle-url="/encyclopedia/vehicles/ussr/bt-2/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t7_combat_car.png" alt="T7_Combat_Car">
                                        </div>
                                        <span class="b-name-vehicle">T7 Combat Car</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="3">3</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="55073" data-vehicle-url="/encyclopedia/vehicles/usa/t7_combat_car/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch06_renault_nc31.png" alt="Ch06_Renault_NC31">
                                        </div>
                                        <span class="b-name-vehicle">Renault NC-31</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="2">2</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1329" data-vehicle-url="/encyclopedia/vehicles/china/ch06_renault_nc31/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__japan">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/japan-te_ke.png" alt="Te_Ke">
                                        </div>
                                        <span class="b-name-vehicle">Type 97 Te-Ke</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="2">2</td>
                                    <td class="t-profile_center">0%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3169" data-vehicle-url="/encyclopedia/vehicles/japan/te_ke/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__japan">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/japan-nc27.png" alt="NC27">
                                        </div>
                                        <span class="b-name-vehicle">Renault Otsu</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="2">2</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="609" data-vehicle-url="/encyclopedia/vehicles/japan/nc27/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-renaultft.png" alt="RenaultFT">
                                        </div>
                                        <span class="b-name-vehicle">Renault FT</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="1">1</td>
                                    <td class="t-profile_center">100%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="577" data-vehicle-url="/encyclopedia/vehicles/france/renaultft/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-hotchkiss_h35.png" alt="Hotchkiss_H35">
                                        </div>
                                        <span class="b-name-vehicle">Hotchkiss H35</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="1">1</td>
                                    <td class="t-profile_center">100%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1345" data-vehicle-url="/encyclopedia/vehicles/france/hotchkiss_h35/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb76_mk_vic.png" alt="GB76_Mk_VIC">
                                        </div>
                                        <span class="b-name-vehicle">Light Mk. VIC</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="1">1</td>
                                    <td class="t-profile_center">100%</td>
                                    <td class="t-profile_center">–</td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="54865" data-vehicle-url="/encyclopedia/vehicles/uk/gb76_mk_vic/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="tablesorter-no-sort">
                                <tr class="t-profile_tankstype js-table-dropdown-link">
                                    <td class="t-profile_head" width="388">
                                        <span class="b-tankstype-ico b-tankstype-ico__mediumtank"></span>
                                        <span class="b-tankstype-text">Средние танки
                                        <span class="b-armory-col">17</span>
                                        </span>
                                    </td>
                                    <td class="t-profile_right">787</td>
                                    <td class="t-profile_center">60%</td>
                                    <td class="t-profile_center">17 </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="" class="t-profile_dropdown-link" title="Показать/скрыть технику"></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="sortable" style="display: none;">
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch20_type58.png" alt="Ch20_Type58">
                                        </div>
                                        <span class="b-name-vehicle">Type 58</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="115">115</td>
                                    <td class="t-profile_center">63%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5169" data-vehicle-url="/encyclopedia/vehicles/china/ch20_type58/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-t-43.png" alt="T-43">
                                        </div>
                                        <span class="b-name-vehicle">Т-43</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="114">114</td>
                                    <td class="t-profile_center">70%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6657" data-vehicle-url="/encyclopedia/vehicles/ussr/t-43/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-r04_t-34.png" alt="R04_T-34">
                                        </div>
                                        <span class="b-name-vehicle">Т-34</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="96">96</td>
                                    <td class="t-profile_center">69%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1" data-vehicle-url="/encyclopedia/vehicles/ussr/r04_t-34/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch21_t34.png" alt="Ch21_T34">
                                        </div>
                                        <span class="b-name-vehicle">Type T-34</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="81">81</td>
                                    <td class="t-profile_center">52%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4657" data-vehicle-url="/encyclopedia/vehicles/china/ch21_t34/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m4_sherman.png" alt="M4_Sherman">
                                        </div>
                                        <span class="b-name-vehicle">M4 Sherman</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="73">73</td>
                                    <td class="t-profile_center">60%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1057" data-vehicle-url="/encyclopedia/vehicles/usa/m4_sherman/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb07_matilda.png" alt="GB07_Matilda">
                                        </div>
                                        <span class="b-name-vehicle">Matilda</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="65">65</td>
                                    <td class="t-profile_center">57%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="849" data-vehicle-url="/encyclopedia/vehicles/uk/gb07_matilda/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-t-28.png" alt="T-28">
                                        </div>
                                        <span class="b-name-vehicle">Т-28</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="59">59</td>
                                    <td class="t-profile_center">47%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1537" data-vehicle-url="/encyclopedia/vehicles/ussr/t-28/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-t-34-85.png" alt="T-34-85">
                                        </div>
                                        <span class="b-name-vehicle">Т-34-85</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="58">58</td>
                                    <td class="t-profile_center">62%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2561" data-vehicle-url="/encyclopedia/vehicles/ussr/t-34-85/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m3_grant.png" alt="M3_Grant">
                                        </div>
                                        <span class="b-name-vehicle">M3 Lee</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="47">47</td>
                                    <td class="t-profile_center">47%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3105" data-vehicle-url="/encyclopedia/vehicles/usa/m3_grant/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-d2.png" alt="D2">
                                        </div>
                                        <span class="b-name-vehicle">D2</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="17">17</td>
                                    <td class="t-profile_center">65%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="321" data-vehicle-url="/encyclopedia/vehicles/france/d2/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m2_med.png" alt="M2_med">
                                        </div>
                                        <span class="b-name-vehicle">M2 Medium Tank</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="14">14</td>
                                    <td class="t-profile_center">64%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4897" data-vehicle-url="/encyclopedia/vehicles/usa/m2_med/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb06_vickers_medium_mk_iii.png" alt="GB06_Vickers_Medium_Mk_III">
                                        </div>
                                        <span class="b-name-vehicle">Vickers Medium Mk. III</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="10">10</td>
                                    <td class="t-profile_center">60%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2385" data-vehicle-url="/encyclopedia/vehicles/uk/gb06_vickers_medium_mk_iii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__japan">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/japan-chi_ha.png" alt="Chi_Ha">
                                        </div>
                                        <span class="b-name-vehicle">Type 97 Chi-Ha</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="9">9</td>
                                    <td class="t-profile_center">56%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2145" data-vehicle-url="/encyclopedia/vehicles/japan/chi_ha/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb05_vickers_medium_mk_ii.png" alt="GB05_Vickers_Medium_Mk_II">
                                        </div>
                                        <span class="b-name-vehicle">Vickers Medium Mk. II</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="9">9</td>
                                    <td class="t-profile_center">22%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="337" data-vehicle-url="/encyclopedia/vehicles/uk/gb05_vickers_medium_mk_ii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t2_med.png" alt="T2_med">
                                        </div>
                                        <span class="b-name-vehicle">T2 Medium Tank</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="8">8</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5665" data-vehicle-url="/encyclopedia/vehicles/usa/t2_med/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__japan">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/japan-chi_ni.png" alt="Chi_Ni">
                                        </div>
                                        <span class="b-name-vehicle">Chi-Ni</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="8">8</td>
                                    <td class="t-profile_center">62%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="353" data-vehicle-url="/encyclopedia/vehicles/japan/chi_ni/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="1">I</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb01_medium_mark_i.png" alt="GB01_Medium_Mark_I">
                                        </div>
                                        <span class="b-name-vehicle">Vickers Medium Mk. I</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="4">4</td>
                                    <td class="t-profile_center">75%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="81" data-vehicle-url="/encyclopedia/vehicles/uk/gb01_medium_mark_i/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="tablesorter-no-sort">
                                <tr class="t-profile_tankstype js-table-dropdown-link">
                                    <td class="t-profile_head" width="388">
                                        <span class="b-tankstype-ico b-tankstype-ico__heavytank"></span>
                                        <span class="b-tankstype-text">Тяжёлые танки
                                        <span class="b-armory-col">22</span>
                                        </span>
                                    </td>
                                    <td class="t-profile_right">3 436</td>
                                    <td class="t-profile_center">61%</td>
                                    <td class="t-profile_center">22 </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="" class="t-profile_dropdown-link" title="Показать/скрыть технику"></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="sortable" style="display: none;">
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-r106_kv85.png" alt="R106_KV85">
                                        </div>
                                        <span class="b-name-vehicle">КВ-85</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="728">728</td>
                                    <td class="t-profile_center">59%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2817" data-vehicle-url="/encyclopedia/vehicles/ussr/r106_kv85/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="8">VIII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-is-3.png" alt="IS-3">
                                        </div>
                                        <span class="b-name-vehicle">ИС-3</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="510">510</td>
                                    <td class="t-profile_center">56%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5377" data-vehicle-url="/encyclopedia/vehicles/ussr/is-3/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t29.png" alt="T29">
                                        </div>
                                        <span class="b-name-vehicle">T29</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="291">291</td>
                                    <td class="t-profile_center">68%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3873" data-vehicle-url="/encyclopedia/vehicles/usa/t29/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-churchill_ll.png" alt="Churchill_LL">
                                        </div>
                                        <span class="b-name-vehicle">Черчилль III</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="270">270</td>
                                    <td class="t-profile_center">59%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="51713" data-vehicle-url="/encyclopedia/vehicles/ussr/churchill_ll/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-kv1.png" alt="KV1">
                                        </div>
                                        <span class="b-name-vehicle">КВ-1</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="228">228</td>
                                    <td class="t-profile_center">57%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="11777" data-vehicle-url="/encyclopedia/vehicles/ussr/kv1/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-is.png" alt="IS">
                                        </div>
                                        <span class="b-name-vehicle">ИС</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="228">228</td>
                                    <td class="t-profile_center">66%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="513" data-vehicle-url="/encyclopedia/vehicles/ussr/is/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="8">VIII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t32.png" alt="T32">
                                        </div>
                                        <span class="b-name-vehicle">T32</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="160">160</td>
                                    <td class="t-profile_center">63%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4385" data-vehicle-url="/encyclopedia/vehicles/usa/t32/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="8">VIII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-amx_50_100.png" alt="AMX_50_100">
                                        </div>
                                        <span class="b-name-vehicle">AMX 50 100</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="151">151</td>
                                    <td class="t-profile_center">66%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3137" data-vehicle-url="/encyclopedia/vehicles/france/amx_50_100/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-arl_44.png" alt="ARL_44">
                                        </div>
                                        <span class="b-name-vehicle">ARL 44</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="143">143</td>
                                    <td class="t-profile_center">62%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2625" data-vehicle-url="/encyclopedia/vehicles/france/arl_44/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="9">IX</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-is8.png" alt="IS8">
                                        </div>
                                        <span class="b-name-vehicle">ИС-8</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="132">132</td>
                                    <td class="t-profile_center">65%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="11521" data-vehicle-url="/encyclopedia/vehicles/ussr/is8/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m6.png" alt="M6">
                                        </div>
                                        <span class="b-name-vehicle">M6</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="96">96</td>
                                    <td class="t-profile_center">58%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="801" data-vehicle-url="/encyclopedia/vehicles/usa/m6/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-pzvi.png" alt="PzVI">
                                        </div>
                                        <span class="b-name-vehicle">Tiger I</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="91">91</td>
                                    <td class="t-profile_center">68%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="529" data-vehicle-url="/encyclopedia/vehicles/germany/pzvi/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t1_hvy.png" alt="T1_hvy">
                                        </div>
                                        <span class="b-name-vehicle">T1 Heavy Tank</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="88">88</td>
                                    <td class="t-profile_center">64%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3361" data-vehicle-url="/encyclopedia/vehicles/usa/t1_hvy/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-vk3001h.png" alt="VK3001H">
                                        </div>
                                        <span class="b-name-vehicle">VK 30.01 (H)</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="86">86</td>
                                    <td class="t-profile_center">50%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2577" data-vehicle-url="/encyclopedia/vehicles/germany/vk3001h/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-bdr_g1b.png" alt="BDR_G1B">
                                        </div>
                                        <span class="b-name-vehicle">BDR G1 B</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="54">54</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6721" data-vehicle-url="/encyclopedia/vehicles/france/bdr_g1b/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-amx_m4_1945.png" alt="AMX_M4_1945">
                                        </div>
                                        <span class="b-name-vehicle">AMX M4 mle. 45</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="40">40</td>
                                    <td class="t-profile_center">70%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6977" data-vehicle-url="/encyclopedia/vehicles/france/amx_m4_1945/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-vk3601h.png" alt="VK3601H">
                                        </div>
                                        <span class="b-name-vehicle">VK 36.01 (H)</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="34">34</td>
                                    <td class="t-profile_center">59%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2321" data-vehicle-url="/encyclopedia/vehicles/germany/vk3601h/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-dw_ii.png" alt="DW_II">
                                        </div>
                                        <span class="b-name-vehicle">Durchbruchswagen 2</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="31">31</td>
                                    <td class="t-profile_center">58%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="13329" data-vehicle-url="/encyclopedia/vehicles/germany/dw_ii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-kv2.png" alt="KV2">
                                        </div>
                                        <span class="b-name-vehicle">КВ-2</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="26">26</td>
                                    <td class="t-profile_center">69%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="10497" data-vehicle-url="/encyclopedia/vehicles/ussr/kv2/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__china">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/china-ch10_is2.png" alt="Ch10_IS2">
                                        </div>
                                        <span class="b-name-vehicle">IS-2</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="25">25</td>
                                    <td class="t-profile_center">44%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3633" data-vehicle-url="/encyclopedia/vehicles/china/ch10_is2/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-b1.png" alt="B1">
                                        </div>
                                        <span class="b-name-vehicle">B1</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="13">13</td>
                                    <td class="t-profile_center">31%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1089" data-vehicle-url="/encyclopedia/vehicles/france/b1/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-kv-1s.png" alt="KV-1s">
                                        </div>
                                        <span class="b-name-vehicle">КВ-1С</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="11">11</td>
                                    <td class="t-profile_center">100%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="18689" data-vehicle-url="/encyclopedia/vehicles/ussr/kv-1s/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="tablesorter-no-sort">
                                <tr class="t-profile_tankstype js-table-dropdown-link">
                                    <td class="t-profile_head" width="388">
                                        <span class="b-tankstype-ico b-tankstype-ico__at-spg"></span>
                                        <span class="b-tankstype-text">ПТ-САУ
                                        <span class="b-armory-col">24</span>
                                        </span>
                                    </td>
                                    <td class="t-profile_right">1 616</td>
                                    <td class="t-profile_center">62%</td>
                                    <td class="t-profile_center">24 </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="" class="t-profile_dropdown-link" title="Показать/скрыть технику"></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="sortable" style="display: none;">
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-hetzer.png" alt="Hetzer">
                                        </div>
                                        <span class="b-name-vehicle">Hetzer</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="267">267</td>
                                    <td class="t-profile_center">57%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1809" data-vehicle-url="/encyclopedia/vehicles/germany/hetzer/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t67.png" alt="T67">
                                        </div>
                                        <span class="b-name-vehicle">T67</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="210">210</td>
                                    <td class="t-profile_center">76%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="10529" data-vehicle-url="/encyclopedia/vehicles/usa/t67/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-pz_sfl_ivc.png" alt="Pz_Sfl_IVc">
                                        </div>
                                        <span class="b-name-vehicle">Pz.Sfl. IVc</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="148">148</td>
                                    <td class="t-profile_center">59%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="16145" data-vehicle-url="/encyclopedia/vehicles/germany/pz_sfl_ivc/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m18_hellcat.png" alt="M18_Hellcat">
                                        </div>
                                        <span class="b-name-vehicle">M18 Hellcat</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="144">144</td>
                                    <td class="t-profile_center">68%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="11553" data-vehicle-url="/encyclopedia/vehicles/usa/m18_hellcat/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-stug_40_ausfg.png" alt="StuG_40_AusfG">
                                        </div>
                                        <span class="b-name-vehicle">StuG III Ausf. G</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="114">114</td>
                                    <td class="t-profile_center">61%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1041" data-vehicle-url="/encyclopedia/vehicles/germany/stug_40_ausfg/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-e-25.png" alt="E-25">
                                        </div>
                                        <span class="b-name-vehicle">E 25</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="111">111</td>
                                    <td class="t-profile_center">52%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="55569" data-vehicle-url="/encyclopedia/vehicles/germany/e-25/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-nashorn.png" alt="Nashorn">
                                        </div>
                                        <span class="b-name-vehicle">Nashorn</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="87">87</td>
                                    <td class="t-profile_center">70%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="11793" data-vehicle-url="/encyclopedia/vehicles/germany/nashorn/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-sturer_emil.png" alt="Sturer_Emil">
                                        </div>
                                        <span class="b-name-vehicle">Sturer Emil</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="75">75</td>
                                    <td class="t-profile_center">55%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="11025" data-vehicle-url="/encyclopedia/vehicles/germany/sturer_emil/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-su-100.png" alt="SU-100">
                                        </div>
                                        <span class="b-name-vehicle">СУ-100</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="71">71</td>
                                    <td class="t-profile_center">65%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3585" data-vehicle-url="/encyclopedia/vehicles/ussr/su-100/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-su-85.png" alt="SU-85">
                                        </div>
                                        <span class="b-name-vehicle">СУ-85</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="65">65</td>
                                    <td class="t-profile_center">63%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="257" data-vehicle-url="/encyclopedia/vehicles/ussr/su-85/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-g20_marder_ii.png" alt="G20_Marder_II">
                                        </div>
                                        <span class="b-name-vehicle">Marder II</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="60">60</td>
                                    <td class="t-profile_center">52%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6673" data-vehicle-url="/encyclopedia/vehicles/germany/g20_marder_ii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-jagdpziv.png" alt="JagdPzIV">
                                        </div>
                                        <span class="b-name-vehicle">Jagdpanzer IV</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="47">47</td>
                                    <td class="t-profile_center">55%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="1553" data-vehicle-url="/encyclopedia/vehicles/germany/jagdpziv/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-marder_iii.png" alt="Marder_III">
                                        </div>
                                        <span class="b-name-vehicle">Marder 38T</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="34">34</td>
                                    <td class="t-profile_center">53%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="11281" data-vehicle-url="/encyclopedia/vehicles/germany/marder_iii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m8a1.png" alt="M8A1">
                                        </div>
                                        <span class="b-name-vehicle">M8A1</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="34">34</td>
                                    <td class="t-profile_center">71%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="10273" data-vehicle-url="/encyclopedia/vehicles/usa/m8a1/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-m10_wolverine.png" alt="M10_Wolverine">
                                        </div>
                                        <span class="b-name-vehicle">M10 Wolverine</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="29">29</td>
                                    <td class="t-profile_center">59%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6945" data-vehicle-url="/encyclopedia/vehicles/usa/m10_wolverine/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t40.png" alt="T40">
                                        </div>
                                        <span class="b-name-vehicle">T40</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="25">25</td>
                                    <td class="t-profile_center">60%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="7713" data-vehicle-url="/encyclopedia/vehicles/usa/t40/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t18.png" alt="T18">
                                        </div>
                                        <span class="b-name-vehicle">T18</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="21">21</td>
                                    <td class="t-profile_center">33%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6177" data-vehicle-url="/encyclopedia/vehicles/usa/t18/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-su-76.png" alt="SU-76">
                                        </div>
                                        <span class="b-name-vehicle">СУ-76</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="17">17</td>
                                    <td class="t-profile_center">41%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6401" data-vehicle-url="/encyclopedia/vehicles/ussr/su-76/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-panzerjager_i.png" alt="PanzerJager_I">
                                        </div>
                                        <span class="b-name-vehicle">Panzerjäger I</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="16">16</td>
                                    <td class="t-profile_center">75%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3601" data-vehicle-url="/encyclopedia/vehicles/germany/panzerjager_i/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t82.png" alt="T82">
                                        </div>
                                        <span class="b-name-vehicle">T82</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="15">15</td>
                                    <td class="t-profile_center">40%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="6433" data-vehicle-url="/encyclopedia/vehicles/usa/t82/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-at-1.png" alt="AT-1">
                                        </div>
                                        <span class="b-name-vehicle">АТ-1</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="10">10</td>
                                    <td class="t-profile_center">40%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5121" data-vehicle-url="/encyclopedia/vehicles/ussr/at-1/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb39_universal_carrierqf2.png" alt="GB39_Universal_CarrierQF2">
                                        </div>
                                        <span class="b-name-vehicle">Universal Carrier 2-pdr</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="7">7</td>
                                    <td class="t-profile_center">86%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="8273" data-vehicle-url="/encyclopedia/vehicles/uk/gb39_universal_carrierqf2/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__ussr">
                                            <span class="b-armory-level" data-veh_level="7">VII</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/ussr-su-152.png" alt="SU-152">
                                        </div>
                                        <span class="b-name-vehicle">СУ-152</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="6">6</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="1" id="j-vehicle-badge-1" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-3.png" alt="3 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-1_tooltip">
                                            <h4>
                                                <p>Знак классности «3 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 50% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2305" data-vehicle-url="/encyclopedia/vehicles/ussr/su-152/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__france">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/france-renaultft_ac.png" alt="RenaultFT_AC">
                                        </div>
                                        <span class="b-name-vehicle">Renault FT AC</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="3">3</td>
                                    <td class="t-profile_center">67%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="7745" data-vehicle-url="/encyclopedia/vehicles/france/renaultft_ac/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="tablesorter-no-sort">
                                <tr class="t-profile_tankstype js-table-dropdown-link">
                                    <td class="t-profile_head" width="388">
                                        <span class="b-tankstype-ico b-tankstype-ico__spg"></span>
                                        <span class="b-tankstype-text">САУ
                                        <span class="b-armory-col">7</span>
                                        </span>
                                    </td>
                                    <td class="t-profile_right">204</td>
                                    <td class="t-profile_center">61%</td>
                                    <td class="t-profile_center">7 </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="" class="t-profile_dropdown-link" title="Показать/скрыть технику"></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="sortable" style="display: none;">
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="5">V</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-grille.png" alt="Grille">
                                        </div>
                                        <span class="b-name-vehicle">Grille</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="65">65</td>
                                    <td class="t-profile_center">68%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="5649" data-vehicle-url="/encyclopedia/vehicles/germany/grille/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="6">VI</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-hummel.png" alt="Hummel">
                                        </div>
                                        <span class="b-name-vehicle">Hummel</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="48">48</td>
                                    <td class="t-profile_center">65%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="273" data-vehicle-url="/encyclopedia/vehicles/germany/hummel/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__germany">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/germany-sturmpanzer_ii.png" alt="Sturmpanzer_II">
                                        </div>
                                        <span class="b-name-vehicle">Sturmpanzer II</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="37">37</td>
                                    <td class="t-profile_center">43%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="4" id="j-vehicle-badge-4" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-ace.png" alt="Мастер">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-4_tooltip">
                                            <h4>
                                                <p>Знак классности «Мастер»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 99% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="4625" data-vehicle-url="/encyclopedia/vehicles/germany/sturmpanzer_ii/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="4">IV</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb26_birch_gun.png" alt="GB26_Birch_Gun">
                                        </div>
                                        <span class="b-name-vehicle">Birch Gun</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="28">28</td>
                                    <td class="t-profile_center">71%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="10833" data-vehicle-url="/encyclopedia/vehicles/uk/gb26_birch_gun/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="3">III</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb27_sexton.png" alt="GB27_Sexton">
                                        </div>
                                        <span class="b-name-vehicle">Sexton II</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="13">13</td>
                                    <td class="t-profile_center">54%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="3409" data-vehicle-url="/encyclopedia/vehicles/uk/gb27_sexton/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__uk">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/uk-gb25_loyd_carrier.png" alt="GB25_Loyd_Carrier">
                                        </div>
                                        <span class="b-name-vehicle">Loyd Gun Carriage</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="9">9</td>
                                    <td class="t-profile_center">56%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="3" id="j-vehicle-badge-3" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-1.png" alt="1 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-3_tooltip">
                                            <h4>
                                                <p>Знак классности «1 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 95% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="10577" data-vehicle-url="/encyclopedia/vehicles/uk/gb25_loyd_carrier/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                                <tr class="t-profile_tankstype t-profile_tankstype__item js-vehicle-dropdown-link">
                                    <td class="t-profile_armory-icon">
                                        <div class="b-armory-wrapper b-armory-wrapper__usa">
                                            <span class="b-armory-level" data-veh_level="2">II</span>
                                            <img class="png" src="http://worldoftanks.ru/static/3.26.0.2/encyclopedia/tankopedia/vehicle/small/usa-t57.png" alt="T57">
                                        </div>
                                        <span class="b-name-vehicle">T57</span>
                                    </td>
                                    <td class="t-profile_right" data-battle_count="4">4</td>
                                    <td class="t-profile_center">25%</td>
                                    <td class="t-profile_ico-class">
                                        <img data-badge_code="2" id="j-vehicle-badge-2" class="js-tooltip" src="http://worldoftanks.ru/static/3.26.0.2/common/img/classes/class-2.png" alt="2 степень">
                                        <div class="b-tooltip-main" id="j-vehicle-badge-2_tooltip">
                                            <h4>
                                                <p>Знак классности «2 степень»</p>
                                            </h4>
                                            <p></p>
                                            <p>Присваивается игроку за мастерство владения<br/>боевой машиной. Для присвоения необходимо<br/>заработать больше опыта за бой, чем средний<br/>максимальный опыт за предыдущие 7 дней<br/>у 80% игроков на данной машине.</p>
                                            <p></p>
                                        </div>
                                    </td>
                                    <td class="t-profile_dropdown-ico">
                                        <a href="javascript:void 0;" class="t-profile_dropdown-link" title="Показать/скрыть статистику"></a>
                                    </td>
                                </tr>
                                <tr class="t-profile_slidedown tablesorter-childRow" data-vehicle-cd="2081" data-vehicle-url="/encyclopedia/vehicles/usa/t57/" style="">
                                    <td colspan="5" class="t-profile_detail js-details">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                var el = $('#vehicle-head-tooltip');
                                if (el.length && el.innerWidth() > el.parent().width()) {
                                    el.parent().addClass('t-profile_vehicle-head__ellipsis');
                                    el.addClass('js-tooltip');
                                }
                            });

                        </script>