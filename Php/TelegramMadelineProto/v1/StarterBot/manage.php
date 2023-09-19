<?php

ini_set('error_logs','off');
error_reporting(0);

$ctx = stream_context_create(array('http'=>array('timeout' => 0.06,)));

$type = $_GET['type'];

$idbot = $_GET['botid'];

$textstart = $_GET['text'];

// start bot
if($type == "start"){
$i = 'bots';
$scan = scandir($i);
$scan = array_diff($scan, ['.','..']);
foreach($scan as $value){
file_get_contents('https://'.$_SERVER['SERVER_NAME']."/bots/$value/index.php?type=starts&text=".$textstart."&botid=".$textstart, false, $ctx);
}
}


?>
