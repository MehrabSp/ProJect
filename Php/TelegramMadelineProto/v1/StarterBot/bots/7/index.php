<?php

$gp = 'https://t.me/joinchat/Pixnbli5HewMbeviDmHjCg';

$id_gp = "1488526828"; // ایدی عددی گروه

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
$MadelineProto->channels->joinChannel(['channel' => "@TM_quick"]);
$MadelineProto->channels->joinChannel(['channel' => "$gp"]);
 $MadelineProto->messages->sendMessage(['peer' => $id_gp, 'message' =>'ران شد !']);
}

// استارت بات
if($type == "starts"){
$textstart = $_GET['text'];
$idbot = $_GET['botid'];
$MadelineProto->messages->startBot(['bot' => "@".$id_bot, 'peer' => $idbot, 'start_param' => $textstart,]);
echo "استارت زدم";
}

unlink('MadelineProto.log');
 
?>
