<?php
header('Content-Type: application/json');
session_start();
require_once '../config/config.php';

$result = [];
if (isset($_GET['account_id'])) {
    $r = mysql_query("SELECT * FROM wot_data WHERE account_id = " . $_GET['account_id']) or die(mysql_error());
    $accountData = mysql_fetch_assoc($r);
    $angar = (($accountData['angar'] !== NULL) && ($accountData['angar'] !== '')) ? explode(',', $accountData['angar']) : [];
    $result['angarTanks'] = count($angar);
    foreach ($_SESSION['tanks'] as $tank) {
        $tank['in_angar'] = in_array($tank['id'], $angar);
        $result[] = $tank;
    }
} else {
    /** GET THE TANKS DATA FROM THE BE **/
    $_SESSION['tanks'] = [];
    $r = mysql_query("SELECT * FROM wiki_tanks") or die(mysql_error());
    while ($f = mysql_fetch_assoc($r)) {
        $_SESSION['tanks'][] = $f;
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
            $msg = "Pz.Kpfw. VII from VK 72.01 K"; // TODO: get tank names from $_SESSION['tanks']
        } else if ($f['type'] === 'avg') {
            $result['wn8'][] = [
                'expFrag' => ($result['wn8'][$f['previous']]->expFrag + $result['wn8'][$f['next']]->expFrag) / 2,
                'expDamage' => ($result['wn8'][$f['previous']]->expDamage + $result['wn8'][$f['next']]->expDamage) / 2,
                'expSpot' => ($result['wn8'][$f['previous']]->expSpot + $result['wn8'][$f['next']]->expSpot) / 2,
                'expDef' => ($result['wn8'][$f['previous']]->expDef + $result['wn8'][$f['next']]->expDef) / 2,
                'expWinRate' => ($result['wn8'][$f['previous']]->expWinRate + $result['wn8'][$f['next']]->expWinRate) / 2,
            ];
            $msg = "B-C 12 t from avg between AMX 13 75 and AMX 13 90"; // TODO: get tank names from $_SESSION['tanks']
        } else if ($f['type'] === 'diff') {
            $result['wn8'][] = [
                'expFrag' => $result['wn8'][$f['next']]->expFrag * $result['wn8'][$f['next']]->expFrag / $result['wn8'][$f['previous']]->expFrag,
                'expDamage' => $result['wn8'][$f['next']]->expDamage * $result['wn8'][$f['next']]->expDamage / $result['wn8'][$f['previous']]->expDamage,
                'expSpot' => $result['wn8'][$f['next']]->expSpot * $result['wn8'][$f['next']]->expSpot / $result['wn8'][$f['previous']]->expSpot,
                'expDef' => $result['wn8'][$f['next']]->expDef * $result['wn8'][$f['next']]->expDef / $result['wn8'][$f['previous']]->expDef,
                'expWinRate' => $result['wn8'][$f['next']]->expWinRate * $result['wn8'][$f['next']]->expWinRate / $result['wn8'][$f['previous']]->expWinRate,
            ];
            $msg = "AMX 13 105 based on difference between B-C 12 t and AMX 13 90"; // TODO: get tank names from $_SESSION['tanks']
        }
        $result['log'][$f['target']] = ["added wn8 data for ".$msg, $result['wn8'][$f['target']]];
    }
    $result['tanks'] = $_SESSION['tanks']; // TODO: use this on the FE so that we don't load this data twice
}

die(json_encode($result));