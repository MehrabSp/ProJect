<?php

ini_set('error_logs','off');
error_reporting(0);

$ctx = stream_context_create(array('http'=>array('timeout' => 0.06,)));

$type = $_GET['type'];

// start bot
if($type == "start"){
$idbot = $_GET['userbot'];
$textstart = $_GET['userid'];
$i = 'bots';
$scan = scandir($i);
$scan = array_diff($scan, ['.','..']);
foreach($scan as $value){
file_get_contents('https://'.$_SERVER['SERVER_NAME']."/bots/$value/index.php?type=start&a2=".$textstart."&a1=".$idbot, false, $ctx);
}
}


?>
