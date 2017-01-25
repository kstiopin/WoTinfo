<?php
require_once '../config/config.php';

if ($_POST['tank_id']) {
    $r = mysql_query("SELECT id FROM wiki_tanks WHERE id = " . $_POST['tank_id']) or die(mysql_error);
    if (mysql_fetch_assoc($r)) {
        die('Tank ' . $_POST['name'] . ' already present');
    } else {
        $r = mysql_query("INSERT INTO wiki_tanks (`id`, `image`, `image_small`, `is_premium`, `name`, `level`, `nation`, `type`) VALUES (
          ".$_POST['tank_id'].",
          '".$_POST['image']."',
          '".$_POST['image_small']."',
          ".$_POST['is_premium'].",
          '".$_POST['name_i18n']."',
          ".$_POST['level'].",
          '".$_POST['nation']."',
          '".$_POST['type']."'
        )") or die(mysql_error);
        die('Tank ' . $_POST['name'] . ' added');
    }
}