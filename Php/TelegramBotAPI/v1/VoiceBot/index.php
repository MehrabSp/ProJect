<?php
//===========================
flush();
error_reporting(0);
unlink(error_log);
$load = sys_getloadavg();
ob_start();
//===========================

//===========================
include("jdf.php");
$token = "1214348786:AAEG-4Kdsiy1pElBT7AlawwpptH3sxo7auM";
define('API_KEY',$token);
//===========================
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
//===========================


//===========================

//===========================
function EditMessage($chat_id,$message_id,$text,$mode,$keyboard){
 bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$mode,
'reply_markup'=>$keyboard,
]);    
}

function DeleteMessage($chat_id,$message_id){
 bot('deletemessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
}

function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard,
	]);
	}
	
	function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard,
	]);
	}
	
	function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard,
	]);
	}
	
	function SendVideo($chatid,$video,$caption,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
        'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard,
	]);
	}
	
	function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard,
	]);
	}
	
	function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard,
	]);
	}
	
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id,
	]);
	}
	
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert,
    ]);
	}
	
function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $keyboard){
	bot('sendMessage', [
	'chat_id' => $chatid,
	'text' => $text,
	'parse_mode' => $parsmde,
	'disable_web_page_preview' => $disable_web_page_preview,
	'reply_markup' => $keyboard,
	]);
	}
	
	function Forward($KojaShe,$AzKoja,$KodomMSG){
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG,
    ]);
}
//===========================
function generatePassword($length = 10) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  return substr(str_shuffle($chars), 0, $length);
}

function Password($length = 10) {
    $chars = '@&-*~0123456789+abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@-*~/&';
  return substr(str_shuffle($chars), 0, $length);
}
//===========================
function sendphoto($chat_id, $photo, $caption){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption,
	]);
	}
	//===========================
	function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
//===========================
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$textmessage = $message->text;
$firstname = $message->from->first_name;
$username = $message->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$admin = "1043097454";
$rpto = $update->message->reply_to_message->forward_from->id;
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$step = $user["step"];
$invite = $user["invite"];
$tartm = $user["tartm"];
$tedad = $user["tedad"];
$id = $user["id"];
$ied = $user["ied"];
$channel = $user["channel"];
//===========================
// Spam check
// $user['_spam_block'] => زمانی که کاربر آزاد میشه(در صورت آزاد بودن کاربر فالس یا خالیه)
// $user['_spam_last'] => زمان اخرین پیام
// $user['_spam_num'] => تعداد پیام های ارسالی در یک ثانیه
// $user['_spam_warn'] => اخطار ها
if(isset($update->message)){
	if($user['_spam_block']){
		if($user['_spam_block'] != 1 && $user['_spam_block'] <= time())
			$user['_spam_block'] = false;
		else die();
	}
	elseif($user['_spam_last'] == time()){
		if($user['_spam_num']++ > 3){
			$user['_spam_warn']++;
			$user['_spam_block'] = time() + 600;
			$_wt = "🔓 شما بدلیل پیام بیش از حد مجاز 10 دقیقه از کار کردن با ربات محروم میشوید.\n";
			switch($user['_spam_warn']){
				case 1:
					$_wt .= "1⃣ این اولین اخطار شماست.";
					break;
				case 2:
					$_wt .= "2⃣ این دومین اخطار شماست، اخطار بعدی به معنی اخراج همیشگی از ربات است.";
					break;
				default:
					$_wt = "🔰 بدلیل ارسال بیش از حد پیام و دریافت سومین اخطار از ربات اخراج شدید.";
					$user['_spam_block'] = 1;
					break;
			}
			bot('sendmessage', [
				'chat_id'=>$chat_id,
				'text'=>$_wt
			]);
			file_put_contents("data/$from_id.json", json_encode($user));
			die();
		}
	}
	else{
		$user['_spam_last'] = time();
		$user['_spam_num'] = 1;
	}
}
file_put_contents("data/$from_id.json", json_encode($user));
//===========================
$caption = $update->message->caption;
$on = file_get_contents("on.txt");
$time = jdate("H:i:s");
$tarkh = jdate("Y/m/d");
$rpto = $update->message->reply_to_message->forward_from->id;
$contact = $message->contact;
$contactid = $contact->user_id;
$contactnum = $contact->phone_number;
$pass =  generatePassword(10);
$passs = Password(15);
$allvip = fopen( "data/vip.txt", 'r');
$vips = fgets( $allvip);
$photo_id = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$voice_id = $update->message->voice->file_id;
$sticker_id = $update->message->sticker->file_id;
$video_id = $update->message->video->file_id;
$music_id = $update->message->audio->file_id;
//===========================
$panel_admin = json_encode(['keyboard'=>[
[['text'=>"🎗دریافت شماره کاربر🎗"]],
[['text'=>"❇️ روشن کردن"],['text'=>"💤 خاموش کردن"]],
[['text'=>"📊 آمار ربات"]],
[['text'=>"📭 پیام همگانی"],['text'=>"📮 فوروارد همگانی"]],
[['text'=>"💸 افزایش الماس کاربر"],['text'=>"💸 کسر الماس کاربر"]],
[['text'=>"vip"]],
[['text'=>"🚫 رفع بلاک"],['text'=>"➕ افزودن vip"]],
[['text'=>"🔙"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$first = json_encode(['keyboard'=>[
[['text'=>"👁‍🗨 سفارش بازدید"],['text'=>"❤️ ساخت لایک"]],
[['text'=>"👤 حساب کاربری"]],
[['text'=>"💰 انتقال سکه"],['text'=>"➕ افزایش سکه"]],
[['text'=>"☎️ پشتیبانی"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$button_like = json_encode(['keyboard'=>[
[['text'=>"♥️ ساخت لایک"],['text'=>"☘ ساخت نظرسنجی"]],
 [['text'=>"🔙"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$button_office = json_encode(['keyboard'=>[
 [['text'=>"👥 زیرمجموعه"],['text'=>"💰 خرید سکه"]],
 [['text'=>"🔙"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$girl = json_encode(['keyboard'=>[
 [['text'=>"🙋‍♀ سلام"]],
 [['text'=>"🙇‍♀ خوبی"],['text'=>"🤷‍♀ چند سالته"]],
 [['text'=>"💁‍♀ اصل میدی"],['text'=>"🙍‍♀ دوست دارم"],['text'=>"🙆‍♀ عزیزم"]],
 [['text'=>"🙎‍♀ عزیزی"],['text'=>"18 👸"]],
[['text'=>"🙇‍♀ قربونت"]],
 [['text'=>"↩️ منوی اصلی"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$buttonvip = json_encode(['keyboard'=>[
[['text'=>"🔍 پیوی یاب"],['text'=>"💠 ساخت پسورد"]],
 [['text'=>"🎗Vᴏɪᴄᴇ"]],
  [['text'=>"🔗 فونت"]],
    [['text'=>"💲 دریافت سکه"]],
 [['text'=>"🔙"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$back = json_encode([
'keyboard'=>[
[['text'=>'🔙']],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$bock = json_encode([
'keyboard'=>[
[['text'=>'↩️ منوی اصلی']],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$beck = json_encode([
'keyboard'=>[
[['text'=>'انصراف']],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$taeed = json_encode(['keyboard'=>[
 [['text'=>'💠 تـایـیـد شـمـاره' , 'request_contact' => true]],
 [['text'=>"🔙"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//===========================
if(strpos($textmessage,"/start") !== false  && $textmessage !="/start"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام، خوش آمدید🌹

🌺 با Quick در کنار شما هستیم، تا به صورت رایگان برای شما خدمت کنیم.

",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$first,
]);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$user["tedad"] = "0";
$user["tartm"] = "$tarkh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$invite = $user1["invite"];
settype($invite,"integer");
$golran = rand("100","200");
$newinvite = $invite + $golran;
$user1["invite"] = $newinvite;
$tedad = $user1["tedad"];
$newtd = $tedad + 1;
$user1["tedad"] = $newtd;
$outjson = json_encode($user1,true);
file_put_contents("data/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"🎈 تبریک،  $golran سکه بابت زیرمجموعه جدید دریافت کردید.",
'parse_mode'=>"MARKDOWN",
]);
}
}
if (!file_exists("data/$from_id.json")) {
        $myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
		 $user["step"] = "none";
		 $user["invite"] = "0";
		$user["tedad"] = "0";
		$user["tartm"] = "$tarkh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    }
//===========================
$timeeeeee = jdate("H:i:s");
$channdddel = "@TM_Quick";

if ($timeeeeee != "15:25:00"){
 bot('sendmessage',[
 'chat_id'=>$channdddel,
 'text'=>"
هع
",
'parse_mode'=>"HTML",
]);
}
?>