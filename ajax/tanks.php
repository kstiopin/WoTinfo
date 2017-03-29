<?php
header('Content-Type: application/json');

require_once '../config/config.php';

$result = [ tanks => [], wn8 => '' ];
$r = mysql_query("SELECT * FROM wot_data WHERE account_id = ".$_GET['account_id']) or die(mysql_error());
$accountData = mysql_fetch_assoc($r);
$angar = explode(',', $accountData['angar']);
$result['angarTanks'] = count($angar);
$r = mysql_query("SELECT * FROM wiki_tanks") or die(mysql_error());
while ($f = mysql_fetch_assoc($r)) {
    $f['in_angar'] = in_array($f['id'], $angar);
    $result['tanks'][] = $f;
}

$ch = curl_init();
// set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, 'http://stat.modxvm.com/wn8.json');
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// execute post
$result['wn8'] = curl_exec($ch);
//close connection
curl_close($ch);

die(json_encode($result));