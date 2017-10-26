<?php
header('Content-Type: application/json');
session_start();
require_once '../config/config.php';

$result = [];
/** GET USER ACCOUNT DATA **/
$wot_data = mysql_query("SELECT * FROM wot_data WHERE account_id = ".$_GET['account_id']) or die(mysql_error());
$accountData = mysql_fetch_assoc($wot_data);
$angar = (($accountData['angar'] !== NULL) && ($accountData['angar'] !== '')) ? explode(',', $accountData['angar']) : [];
$result['angarTanks'] = count($angar);
/** GET THE TANKS DATA FROM THE BE **/
$result['tanks'] = [];
$tankNames = [];
$wiki_tanks = mysql_query("SELECT * FROM wiki_tanks") or die(mysql_error());
while ($tank = mysql_fetch_assoc($wiki_tanks)) {
    $tank['in_angar'] = in_array($tank['id'], $angar);
    $result['tanks'][] = $tank;
    $tankNames[$tank['id']] = $tank['short_name'];
}
/** GET THE WN8 DATA **/
$ch = curl_init();
// set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, 'http://stat.modxvm.com/wn8.json');
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// execute post
$data = json_decode(curl_exec($ch))->data; // TODO: check if we have json here, otherwise get data from local file
//close connection
curl_close($ch);
foreach ($data as $tank) {
    $result['wn8'][$tank->IDNum] = [ 'expDamage' => $tank->expDamage, 'expDef' => $tank->expDef, 'expFrag' => $tank->expFrag, 'expSpot' => $tank->expSpot, 'expWinRate' => $tank->expWinRate ];
}
/** GET TANKS MISSING WN8 **/
$result['log'] = [];
$r = mysql_query("SELECT * FROM wn8_tanks") or die(mysql_error());
while ($f = mysql_fetch_assoc($r)) {
    if ($f['type'] === '=') {
        $result['wn8'][$f['target']] = $result['wn8'][$f['source']];
        $msg = $tankNames[$f['target']]." from ".$tankNames[$f['source']];
    } else if ($f['type'] === 'avg') {
        $result['wn8'][$f['target']] = [
            'expFrag' => ($result['wn8'][$f['prev']]['expFrag'] + $result['wn8'][$f['next']]['expFrag']) / 2,
            'expDamage' => ($result['wn8'][$f['prev']]['expDamage'] + $result['wn8'][$f['next']]['expDamage']) / 2,
            'expSpot' => ($result['wn8'][$f['prev']]['expSpot'] + $result['wn8'][$f['next']]['expSpot']) / 2,
            'expDef' => ($result['wn8'][$f['prev']]['expDef'] + $result['wn8'][$f['next']]['expDef']) / 2,
            'expWinRate' => ($result['wn8'][$f['prev']]['expWinRate'] + $result['wn8'][$f['next']]['expWinRate']) / 2,
        ];
        $msg = $tankNames[$f['target']]." from avg between ".$tankNames[$f['prev']]." and ".$tankNames[$f['next']];
    } else if ($f['type'] === 'diff') {
        $result['wn8'][$f['target']] = [
            'expFrag' => $result['wn8'][$f['next']]['expFrag'] * $result['wn8'][$f['next']]['expFrag'] / $result['wn8'][$f['prev']]['expFrag'],
            'expDamage' => $result['wn8'][$f['next']]['expDamage'] * $result['wn8'][$f['next']]['expDamage'] / $result['wn8'][$f['prev']]['expDamage'],
            'expSpot' => $result['wn8'][$f['next']]['expSpot'] * $result['wn8'][$f['next']]['expSpot'] / $result['wn8'][$f['prev']]['expSpot'],
            'expDef' => $result['wn8'][$f['next']]['expDef'] * $result['wn8'][$f['next']]['expDef'] / $result['wn8'][$f['prev']]['expDef'],
            'expWinRate' => $result['wn8'][$f['next']]['expWinRate'] * $result['wn8'][$f['next']]['expWinRate'] / $result['wn8'][$f['prev']]['expWinRate'],
        ];
        $msg = $tankNames[$f['target']]." based on difference between ".$tankNames[$f['prev']]." and ".$tankNames[$f['next']];
    }
    $result['log'][$f['target']] = ["added wn8 data (".$f['type'].") for ".$msg, $result['wn8'][$f['target']]];
}

die(json_encode($result));