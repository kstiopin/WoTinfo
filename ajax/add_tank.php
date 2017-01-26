<?php
require_once '../config/config.php';

if ($_POST['tank_id']) {
    $r = mysql_query("SELECT id FROM wiki_tanks WHERE id = " . $_POST['tank_id']) or die(mysql_error());
    if (mysql_fetch_assoc($r)) {
        $r = mysql_query("
          UPDATE wiki_tanks SET
            `is_premium` = ".$_POST['is_premium'].",
            `name` = '".$_POST['name_i18n']."',
            `short_name` = '".$_POST['short_name_i18n']."',
            `level` = ".$_POST['level']."
          WHERE id = " . $_POST['tank_id']) or die(mysql_error());
        die('Tank ' . $_POST['name'] . ' updated');
    } else {
        $r = mysql_query("
          INSERT INTO wiki_tanks (`id`, `image`, `image_small`, `is_premium`, `name`, `short_name`, `level`, `nation`, `type`)
          VALUES (
            ".$_POST['tank_id'].",
            '".$_POST['image']."',
            '".$_POST['image_small']."',
            ".$_POST['is_premium'].",
            '".$_POST['name_i18n']."',
            '".$_POST['short_name_i18n']."',
            ".$_POST['level'].",
            '".$_POST['nation']."',
            '".$_POST['type']."')") or die(mysql_error());
        die('Tank ' . $_POST['name'] . ' added');
    }
}