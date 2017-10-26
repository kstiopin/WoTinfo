<?php
header('Content-Type: application/json');

require_once '../config/config.php';

$result = [];
$r = mysql_query('SELECT * FROM links ORDER BY `order`, id') or die(mysql_error());
while ($f = mysql_fetch_assoc($r)) {
    $result[] = $f;
}

die(json_encode($result));