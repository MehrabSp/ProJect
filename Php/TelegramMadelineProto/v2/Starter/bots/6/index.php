<?php

$gp = 'https://t.me/joinchat/Pixnbli5HewiNspZdmQtkw'; // لینک گروه

$id_gp = -1488526828; // ایدی عددی گروه

$type = $_GET['type'];

if(!file_exists('madeline.php')){copy('https://phar.madelineproto.xyz/madeline.php','madeline.php');}
ini_set('error_logs','off');
error_reporting(0);
define('MADELINE_BRANCH', 'deprecated');
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
echo 'ok!';
if(!file_exists('id.txt')){
file_put_contents('id.txt','');
$MadelineProto->channels->joinChannel(['channel' => "@Tm_Quick"]);
$MadelineProto->channels->joinChannel(['channel' => "$gp"]);
 $MadelineProto->messages->sendMessage(['peer' => $id_gp, 'message' =>'ران شد !']);
}

// استارت بات
if($type == "start"){
$idbot = $_GET['a1'];
$textstart = $_GET['a2'];
$MadelineProto->messages->sendMessage(['peer' => "@".$idbot,'message' => "/start ".$textstart,'parse_mode' => 'MarkDown']);
echo "استارت زدم";
}

unlink('MadelineProto.log');
 
?>
