<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8"/>
    <title>WoT info: <?=$def_nick;?></title>
    <link rel="stylesheet" type="text/css" href="../style/style.css" media="screen" id="screenview"/>
    <link rel="stylesheet" type="text/css" href="../style/main.css" media="screen" id="screenview"/>
    <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
<!--    <script type="text/javascript" src="../js/aces_draws.js"></script>-->
    <script type="text/javascript">
        /** Constants */
        var angar = [<?=$f['angar'];?>];
        var wishlist = [<?=$f['wishlist'];?>];
        var wishlist_divs = [];
        var current_divs = [];
        var counters_shown = false;
        /** Init */
        $(document).ready(function() {
            $('.b-link-fake').click(function(e) {
                e.preventDefault();
            });

            $("#nations li.click").click(function() {
                nationClick($(this));
            });

            $.get('../get_tree.php?nick=<?=$def_nick;?>', function(resp) { /** Вытягивание деревьев */
                $('body').append(resp);
                $('#ntree-usa #tree .column8.row6 a').remove();
                /** Добавление техники, которой нету на бронесайте */
<?
$r = mysql_query("SELECT * FROM tanks LEFT JOIN tank_stats ON tank_stats.tank = tanks.name AND tank_stats.account_id = ".$f['account_id']) or die(mysql_error());
while ($tank = mysql_fetch_assoc($r)) {
    $tank_line = '<a href="tank/'.$tank['name'].'" target="_top"><div class="vicLogo"><img src="'.$tank['img'].'"></div>'; // start, img
    $tank_line .= '<span class="mark" title="'.$tank['title'].'">'.$tank['title'].'</span><span class="level">'.$tank['level'].'</span>'; // name, level
    $type = array();
    if ($tank['class'] == 'лт') {
        $type[] = 'lightTank';
        $type[] = 'Лёгкий танк';
    } elseif ($tank['class'] == 'ст') {
        $type[] = 'mediumTank';
        $type[] = 'Средний танк';
    } elseif ($tank['class'] == 'тт') {
        $type[] = 'heavyTank';
        $type[] = 'Тяжелый танк';
    } elseif ($tank['class'] == 'птсау') {
        $type[] = 'AT-SPG';
        $type[] = 'ПТ САУ';
    } else {
        $type[] = 'SPG';
        $type[] = 'САУ';
    }
    $tank_line .= '<span class="class"><img src="http://armor.kiev.ua/wot/images/type-'.$type[0].'.png" align="top" alt="'.$type[1].'" title="'.$type[1].'"></span></a>'; // class
    if ($tank['premium'] == 1) {
        $tank_line .= '<span class="golden"><img src="http://armor.kiev.ua/wot/images/gold.png" title="1000" width="12" height="12"></span>'; // premium
    }
    if ($tank['account_id'] > 0) {
        $tank_line .= '<span class="mastery"><img src="http://armor.kiev.ua/wot/images/awards/class'.$tank['mastery'].'.png" alt=""></span>'; // mastery
        $tank_line .= '<div class="gamerstats" style="z-index:190;">'.$tank['battles'].' боёв<br/>'.$tank['wins'].' побед<br/>'.str_replace('.', ',', round($tank['wins'] / $tank['battles'] * 100, 2)).' %</div>';
        $tank_line .= '<div class="gamerbattles" style="z-index: 191; display: none;">'.$tank['battles'].'</div>'; // stats
    } else {
        $tank_line .= '<span style="position: absolute; width: 100%; height: 100%; top: 0px; background-color: rgba(0, 0, 0, 0.5);"></span>'; // overlay
    }
    ?>
                $('#ntree-<?=$tank['nation'];?> #tree').append('<div class="tblock column<?=$tank['col'];?> row<?=$tank['row'];?>"><?=$tank_line;?></div>');
    <?
}
?>
                /** Стилизация вкладок */
                $('.tblock > a').each(function() {
                    var tank = $(this).prop('href');
                    var tier = $(this).parent().prop('class');
                    tank = tank.split('/');
                    tier = tier.split(' ');
                    tank = tank[tank.length - 1];
                    tier = tier[1];
                    if ($.inArray(tank, angar) > 0) {
                        $(this).find('span.mark').addClass('in_angar');
                        $(this).parent().addClass('in_angar');
                        if (typeof(current_divs[tier]) == 'undefined') {
                            current_divs[tier] = new Array();
                        }
                        current_divs[tier].push($(this).parent().html());
                    }
                    if ($.inArray(tank, wishlist) > 0) {
                        $(this).parent().addClass('wishlist');
                        if (typeof(wishlist_divs[tier]) == 'undefined') {
                            wishlist_divs[tier] = new Array();
                        }
                        wishlist_divs[tier].push($(this).parent().html());
                    }
                });

                $('.gamerbattles').hover(function() {
                    $(this).parent(".tblock").find(".gamerstats").show();
                }, function() {
                    $(this).parent(".tblock").find(".gamerstats").hide();
                });
            });

            $.get('http://wots.com.ua/user/stats/Insomnex', function() {
               console.log('ok');
            });
        });

        function nationClick(e) { // tabs
            $(".nationTree").hide();
            if (e.attr('id') == 'main') {
                $('.tree_head').hide();
            } else {
                $('.tree_head').show();
            }
            $("#ntree-" + e.attr("id")).show();
            old = e.parent().find("li.active");
            old.attr('class', 'click');
            old.click(function() { nationClick($(this)); });
            e.attr('class', 'active');
            e.unbind('click');
        };

        function list_create(div) { /** особые вкладки */
            $('#ntree-' + div + ' div.treeWrapper div#tree').html('');
            var array = (div == 'final') ? wishlist_divs : current_divs;

            for (var i = 1; i < 11; i++) {
                var row = 1;
                if (typeof(array['column' + i]) !== 'undefined') {
                    $.each(array['column' + i], function(key, val) {
                        $('#ntree-' + div + ' div.treeWrapper div#tree').append('<div class="tblock column' + i + ' row' + row + '">' + val + '</div>');
                        $('#ntree-' + div + ' div.treeWrapper div#tree > div > img').remove();
                        row++;
                    });
                }
            }
            show_percents();
        }

        function show_counters() { /** Показать / скрыть бои */
            if (counters_shown) {
                $('.gamerbattles').hide();
                counters_shown = false;
            } else {
                $('.gamerbattles').show();
                show_percents();
                counters_shown = true;
            }
        }

        function show_percents() { /** Стилизация боев в зависимости от % побед */
            $('.gamerbattles').each(function() {
                var stats = $(this).parent().find('.gamerstats').html().split('<br>');
                stats = parseFloat(stats[2].replace(',', '.'), 2);
                if (stats < 47) {
                    $(this).addClass('red');
                } else if (stats < 49) {
                    $(this).addClass('orange');
                } else if (stats < 52) {
                    $(this).addClass('yellow');
                } else if (stats < 57) {
                    $(this).addClass('green');
                } else if (stats < 65) {
                    $(this).addClass('cyan');
                } else {
                    $(this).addClass('violet');
                }
            });
        }
    </script>
</head>