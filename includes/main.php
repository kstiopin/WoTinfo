<div class="l-page nationTree" id="ntree-main">
    <div class="l-body-content">
            <div class="l-content">
                <div class="b-profile-name js-profile-clan js-profile-name">
                    <h1 class="b-header-h1__profile js-tooltip" id="js-profile-name">
                        <a href="http://worldoftanks.ru/community/accounts/<?=$def_acc;?>-<?=$def_nick;?>/"><?=$def_nick;?></a>
                    </h1>
                    <a href="http://worldoftanks.ru/" target="_blank">сайт WoT</a>,&nbsp;
                    <a href="http://knowly.ru/asja" target="_blank">Ася шарит</a>,&nbsp;
                    <a href="http://vk.com/wotleaks" target="_blank">Wot leaks</a>

                    <form action="" method="post" id="update_stats">
                        <input type="text" value="<?=$def_acc;?>" name="acc"/>
                        <input type="submit" class="button red" value="Обновить статистику"/>
                    </form>
                </div>

                <div class="b-userblock-wrpr">
                    <div id="js-glory-points-block"></div>
                    <div class="b-user-block b-user-block__sparks">
                        <div class="b-personal-data">
                            <table class="t-personal-data">
                                <tbody>
                                <tr>
                                    <th class="t-personal-data_ico t-personal-data_ico__win">
                                        Процент побед
                                    </th>
                                    <th class="t-personal-data_ico t-personal-data_ico__fight">
                                        Количество боёв
                                    </th>
                                    <th rowspan="2" class="t-personal-data_pr">
                                        <div class="t-personal-data_rel">
                                            <div class="t-personal-data_abs">
                                                Личный рейтинг
                                                <p class="t-personal-data_value t-personal-data_value__pr"><?=number_format($stats->global_rating, 0, ',', ' ');?></p>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="t-personal-data_ico t-personal-data_ico__exp">
                                        Средний опыт за бой
                                    </th>
                                    <th class="t-personal-data_ico t-personal-data_ico__dmg">
                                        Средний нанесённый урон за бой
                                    </th>
                                </tr>
                                <tr>
                                    <td class="t-personal-data_value">
                                        <?=number_format($stats->statistics->all->wins / $stats->statistics->all->battles * 100, 2);?>%
                                    </td>
                                    <td class="t-personal-data_value">
                                        <?=number_format($stats->statistics->all->battles, 0, ',', ' ');?>
                                    </td>
                                    <!--rowspan-->
                                    <td class="t-personal-data_value">
                                        <?=number_format($stats->statistics->all->xp / $stats->statistics->all->battles, 2);?>
                                    </td>
                                    <td class="t-personal-data_value">
                                        <?=number_format($stats->statistics->all->damage_dealt / $stats->statistics->all->battles, 2);?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <? /*include('main-achievements.php'); ?>

                <? include('main-masteries.php'); ?>

                <? include('main-diagrams.php'); ?>

                <? include('main-ratings.php'); ?>

                <? include('main-tanks.php'); */?>
                <?
                $r = mysql_query("SELECT * FROM wot_data WHERE account_id != ".$def_acc) or die(mysql_error());
                while($f = mysql_fetch_assoc($r)) {
                    ?>
                <form action="" method="post">
                    <input type="hidden" value="<?=$f['account_id'];?>" name="acc"/>
                    <input class="button blue" type="submit" value="<?=$f['nickname'];?>"/>
                </form>
                    <?
                }
                ?>
        </div>
    </div>
    <div class="clear"></div>
</div>