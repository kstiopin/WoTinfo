<?php
header('Content-Type: application/json');

require_once '../config/config.php';

$tanks = [];
$r = mysql_query("SELECT * FROM wiki_tanks") or die(mysql_error);
while ($f = mysql_fetch_assoc($r)) {
    $tanks[] = $f;
}

die(json_encode($tanks));