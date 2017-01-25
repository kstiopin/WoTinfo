<?php
$ch = curl_init();
// set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, 'http://armor.kiev.ua/wot/gamertrees/'.$_GET['nick']);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);

$data = str_replace('images/', 'http://armor.kiev.ua/wot/images/', $result);
$data = substr($data, strpos($data, '</ul>') + 5, -6);
$data = substr($data, strpos($data, '<div'));
$data = substr($data, 0, strpos($data, 'h_counters'));
// что за беда у них с 704 объектом?
$data = str_replace('title=""></span>', 'title="Об. 704">Об. 704</span>', $data);
$data = str_replace('<span class="level"></span>', '<span class="level">IX</span>', $data);
$data = str_replace('images/type-.png', 'images/type-AT-SPG.png', $data);

echo str_replace('<div id="ntree-ussr" class="nationTree">', '<div id="ntree-ussr" class="nationTree" style="display: none;">', $data);
?>