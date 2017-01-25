<?
require_once 'config/config.php';

include_once('./includes/FirePHPCore/fb.php');

if (isset($_POST['acc'])) {
    $def_acc = $_POST['acc'];
    // open connection
    $ch = curl_init();
    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, 'https://api.worldoftanks.ru/wot/account/info/');
    curl_setopt($ch, CURLOPT_POST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'application_id=bb7f0024d45a4ecbf591bfea8eb0d8ca&account_id='.$def_acc);
    // execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);

    $result = json_decode($result);
    $data = $result->data->$def_acc;
     FB::dump('data from curl', $data);
    $r = mysql_query("SELECT * FROM wot_data WHERE account_id = ".$def_acc) or die(mysql_error());
    if ($f = mysql_fetch_assoc($r)) {
        $angar = $f['angar'];
        $wishlist = $f['wishlist'];
        $r = mysql_query("DELETE FROM wot_data WHERE account_id = ".$def_acc) or die(mysql_error());
    } else {
        $angar = $wishlist = '';
    }
    $r = mysql_query("INSERT INTO wot_data VALUES (".$def_acc.", '".$data->nickname."', '".serialize($data)."', '".mysql_real_escape_string($angar)."', '".mysql_real_escape_string($wishlist)."')") or die(mysql_error());
} else {
    $def_acc = '20250564';
}
$r = mysql_query("SELECT * FROM wot_data WHERE account_id = ".$def_acc) or die(mysql_error());
if ($f = mysql_fetch_assoc($r)) {
    FB::dump('data from db', $f);
    $def_nick = $f['nickname'];
    $stats = unserialize($f['data']);
    FB::dump('stats', $stats);
} else {
    $def_nick = 'Insomnex';
    $stats = array();
}
include('includes/header.php');
?>
<body>
    <div id="content">
        <ul id="nations" style="margin-top: 13px;">
            <li id="main" class="active" data-i="0">Статистика</li>
            <li id="current" class="click" data-i="1" onclick="list_create('current');">Текущий ангар</li>
            <li id="final" class="click" data-i="2" onclick="list_create('final');">Целевой ангар</li>
            <li id="ussr" class="click" data-i="3">СССР</li>
            <li id="germany" class="click" data-i="4">Германия</li>
            <li id="usa" class="click" data-i="5">США</li>
            <li id="france" class="click" data-i="6">Франция</li>
            <li id="uk" class="click" data-i="7">Великобритания</li>
            <li id="china" class="click" data-i="8">Китай</li>
            <li id="japan" class="click" data-i="9">Япония</li>
            <li id="czech" class="click" data-i="10">Чехия</li>
        </ul>
    </div>
<?
include('./includes/main.php');
include('./includes/trees.php');
?>
</body>