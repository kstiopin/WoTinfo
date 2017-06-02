<?php
header('Content-Type: application/json');

require_once '../config/config.php';

if (isset($_POST['account_id'])) {
    $r = mysql_query('SELECT * FROM wot_data WHERE account_id = '.$_POST['account_id']) or die(mysql_error());
    if (mysql_fetch_assoc($r)) {
        $r = mysql_query('UPDATE wot_data SET
          battles = ' . $_POST['battles'] . ',
          winrate = ' . number_format($_POST['winrate'], 2, '.', '') . ',
          wg      = ' . $_POST['wg'] . ',
          wn8     = ' . $_POST['wn8'] . ',
          '.(($_POST['angar'] !== '') ? "angar = '".$_POST['angar']."'," : '').'
          updated = NOW() WHERE account_id = ' . $_POST['account_id']) or die(mysql_error());
    } else {
        $values = "(".$_POST['account_id'].", '".$_POST['nickname']."', ".$_POST['battles'].", ".number_format($_POST['winrate'], 2, '.', '').", ".$_POST['wg'].", ".$_POST['wn8'].", NOW(), NULL, NULL)";
        $r = mysql_query('INSERT INTO wot_data VALUES ' . $values) or die(mysql_error());
    }

    die($_POST['account_id']);
} else {
    $result = [];
    $r = mysql_query('SELECT * FROM wot_data') or die(mysql_error());
    while ($f = mysql_fetch_assoc($r)) {
        $result[$f['account_id']] = $f;
    }

    die(json_encode($result));
}