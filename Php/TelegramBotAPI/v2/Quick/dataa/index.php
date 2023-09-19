<?php
ob_start();
//---------------------------------------------------------------------------------
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
];

$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;

foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {

    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("Api Filter Bye");
//---------------------------------------------------------------------------------
error_reporting(0);
unlink(error_log);
include("ezez2.php");
$token = "1431820650:AAEmrtvacEX87m5YKcZNkctRaocTrpBcJ0E";
define('API_KEY',$token);
//---------------------------------------------------------------------------------
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

function EditMessage($chat_id,$message_id,$textmessage,$mode,$keyboard){
 bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$textmessage,
'parse_mode'=>$mode,
'reply_markup'=>$keyboard,
]);    
}

function AnswerCallbackQuery($callback_query_id,$textmessage,$show_alert){
	bot('AnswerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$textmessage,
		'show_alert'=>$show_alert,
    ]);
	}

function SendMessage($chatid, $textmessage, $parsmde, $disable_web_page_preview, $keyboard){
	bot('SendMessage', [
	'chat_id' => $chatid,
	'text' => $textmessage,
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

function SendPhoto($chat_id, $photo, $caption){
	bot('SendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption,
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

function SendGif($chatid,$voice,$keyboard,$caption){
	bot('SendGif',[
	'chat_id'=>$chatid,
	'gif'=>$gif,
	'caption'=>$caption,
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
//---------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$rpto = $update->message->reply_to_message->forward_from->id;
$messageid = $update->callback_query->message->message_id;
$chat_id = $message->chat->id;
$contact = $message->contact;
$message_id = $message->message_id;
$from_id = $message->from->id;
$textmessage = $message->text;
$firstname = $message->from->first_name;
$username = $message->from->username;

$user = json_decode(file_get_contents("data/$from_id.json"),true);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$step = $user["step"];
$invite = $user["invite"];
$tartm = $user["tartm"];
$tedad = $user["tedad"];
$id = $user["id"];
$ied = $user["ied"];
$channel = $user["channel"];
$view0 = $user["view0"];
$period = $user["period"];
$speed = $user["speed"];
$time = jdate("H:i:s");
$tarkh = jdate("Y/m/d");
$tdlikee = $user["tdlike"];

$admin = array("1043097454","00000000");
$admins = "1043097454";

$channnnel = "tm_quick";
$fromm_id = $update->message->from->id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channnnel."&user_id=".$fromm_id));
$tch = $truechannel->result->status;

$photo = $update->message->photo;
$photo_id = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$voice_id = $update->message->voice->file_id;
$gif_id = $update->message->gif->file_id;
$sticker_id = $update->message->sticker->file_id;
$video_id = $update->message->video->file_id;
$music_id = $update->message->audio->file_id;

$caption = $update->message->caption;

$backer = "
🖥 صفحه اصلی

یک بخش را انتخاب کنید:
";
$starter = "سلام، خوش آمدید🌹

🌺 در کنار شما هستیم، تا به صورت تخصصی برای شما خدمت کنیم.
";
//---------------------------------------------------------------------------------
$panel = json_encode(['keyboard'=>[
[['text'=>"بازگشت"]],
[['text'=>"🎗دریافت شماره کاربر🎗"],['text'=>"📊 آمار ربات"]],
[['text'=>"📭 پیام همگانی"],['text'=>"📮 فوروارد همگانی"]],
[['text'=>"💸 افزایش الماس کاربر"],['text'=>"💸 کسر الماس کاربر"]],
[['text'=>"🚫 رفع بلاک"],['text'=>"🔰 دریافت اطلاعات کاربر"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$first = json_encode(['keyboard'=>[
[['text'=>"👁‍🗨 درخواست بازدید"],['text'=>"❤️ ساخت لایک"]],
[['text'=>"👤 حساب کاربری"]],
[['text'=>"💰 انتقال سکه"],['text'=>"➕ افزایش سکه"]],
[['text'=>"🔎"],['text'=>"☎️ پشتیبانی"],['text'=>"⚖️"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$button_like = json_encode(['keyboard'=>[
[['text'=>"♥️ ساخت لایک"],['text'=>"☘ ساخت نظرسنجی"]],
 [['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$button_office = json_encode(['keyboard'=>[
 [['text'=>"👥 زیرمجموعه"],['text'=>"💰 خرید سکه"]],
 [['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$bar = json_encode(['keyboard'=>[
[['text'=>"برگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$back = json_encode(['keyboard'=>[
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$siingg = json_encode(['keyboard'=>[
[['text'=>"بازگشت"]],
 [['text'=>"تنظیم سرعت"],['text'=>"حداکثر"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$enseraf = json_encode(['keyboard'=>[
[['text'=>"انصراف"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$eddlikr = json_encode(['keyboard'=>[
[['text'=>"1"],['text'=>"2"],['text'=>"3"],['text'=>"4"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$dkchnnel = json_encode(['keyboard'=>[
[['text'=>"$channel"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$buttnfal = json_encode(['keyboard'=>[
[['text'=>"✅ فعال باشد"],['text'=>"❌ فعال نباشد"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);

$ghtvbdrh = json_encode(['keyboard'=>[
[['text'=>"✅ تایید"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
if(strpos($textmessage,"/start") !== false  &&  $textmessage !="/start"){
$id=str_replace("/start ","",$textmessage);
if(file_exists("data/$id.json")){
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$starter
",
'parse_mode'=>"HTML",

'reply_markup'=>$first,
]);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$user["number"] = "تایید نشده";
$user["tedad"] = "0";
$user["tartm"] = "$tarkh";
$user["speed"] = "0";
$user["period"] = "0";
$user["serach"] = "5";
$user["mkharid"] = "0";
$user["davati"] = "$id";
$user["davati2"] = "No";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
}else{
$myfillllllllle2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfillllllllle2, "$from_id\n");
fclose($myfillllllllle2);
$useeeeer = json_decode(file_get_contents("data/$from_id.json"),true);
$useeeeer["step"] = "none";
$useeeeer["invite"] = "0";
$useeeeer["number"] = "تایید نشده";
$useeeeer["tedad"] = "0";
$useeeeer["tartm"] = "$tarkh";
$useeeeer["speed"] = "0";
$useeeeer["period"] = "0";
$useeeeer["serach"] = "5";
$useeeeer["mkharid"] = "0";
$useeeeer["davati2"] = "Oky";
$outjson = json_encode($useeeeer,true);
file_put_contents("data/$from_id.json",$outjson);
}
}
if (!file_exists("data/$from_id.json")){
$myfileo2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfileo2, "$from_id\n");
fclose($myfileo2);
$user["step"] = "none";
$user["invite"] = "0";
$user["tedad"] = "0";
$user["number"] = "تایید نشده";
$user["tartm"] = "$tarkh";
$user["speed"] = "0";
$user["period"] = "0";
$user["serach"] = "5";
$user["mkharid"] = "0";
$user["davati2"] = "Oky";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
//---------------------------------------------------------------------------------
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
		if($user['_spam_num']++ > 2){
			$user['_spam_warn']++;
			$user['_spam_block'] = time() + 600;
			$_wt = "- شما بدلیل پیام بیش از حد مجاز 10 دقیقه از کار کردن با ربات محروم میشوید.\n";
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
//---------------------------------------------------------------------------------
if($textmessage == "بازگشت"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$backer
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}
if($textmessage == "/start"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$starter
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}
//---------------------------------------------------------------------------------
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "eiqntg"){
if($textmessage == "♥️ ساخت لایک"){
$user["step"] = "like";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👈 ربات را ادمین کانال خود کنید و آیدی کانال خود را به صورت کامل بفرستید.

📣 اگر کانال شما خصوصی است میتوانید شناسه عددی آن را ارسال کنید.

 برای مدیریت کامل لایک لازم است ربات ادمین کانال باشد تا شما بتوانید لایک خود را افزایش و یا از آن کسر کنید.
@Tm_Quick
-1001429953692
",
'parse_mode'=>"HTML",

'reply_markup'=>$dkchnnel,
]);
}
if($textmessage == "☘ ساخت نظرسنجی"){
$user["step"] = "vote";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👈 ربات را ادمین کانال خود کنید و آیدی کانال خود را به صورت کامل بفرستید.

📣 اگر کانال شما خصوصی است میتوانید شناسه عددی آن را ارسال کنید.

 برای مدیریت کامل لایک لازم است ربات ادمین کانال باشد تا شما بتوانید لایک خود را افزایش و یا از آن کسر کنید.
@Tm_Quick
-1001429953692
",
'parse_mode'=>"HTML",

'reply_markup'=>$dkchnnel,
]);
}}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "like"){
$adminbot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$textmessage&user_id=$from_id"),true);
$botadmin = $adminbot['result']['status'];
$bv = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$textmessage&user_id=$from_id"),true);
$xz = $bv['result']['status'];
if(strpos($textmessage,"@") == false and strpos($textmessage,"-") ==false and $botadmin != "administrator" and $xz != "administrator" and $xz != "creator"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ خطا، موارد زیر را بررسی کنید:

- ربات ادمین کانال نیست.

- شما ادمین کانال نیستید.

- ایدی و یا شناسه عددی کانال اشتباه است.

♻️ دوباره امتحان کنید...",
'parse_mode'=>"HTML",

'reply_markup'=>$dkchnnel,
]);
}else{
$user["channel"] = "$textmessage";
$user["step"] = "poss";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👈 ایموجی دلخواه خود را ارسال کنید!",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
]);
}
}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "poss"){
	if(mb_strlen($textmessage)==1){
$user["step"] = "poees";
$user["tdlike"] = "$textmessage";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
آیا لایک شما جوین اجباری داشته باشد
کاربری که پست شما لایک میکند باید در کانال عضو باشد یا میتواند عضو نباشد
لطفا از دکمه زیر استفاده کنید
",
'parse_mode'=>"HTML",

'reply_markup'=>$buttnfal,
]);
}else{
	$user["step"] = "poss";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا یک ایموجی ارسال کنید!",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
]);
}
}
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "poees" && $textmessage == "✅ فعال باشد" or $textmessage == "❌ فعال نباشد"){
	if($textmessage == "✅ فعال باشد"){
$user["step"] = "pos";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
✅  پست خود را ارسال کنید ( پست شما میتواند عکس-گیف-استیکر-فایل-موزیک-فیلم-ویس و یا متن باشد ).

💢 در صورت اشتباه تایپی و یا هر چیز دیگر شما میتوانید پستی که در کانال توسط ربات قرار داده شده را ادیت کنید.
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
 ]);
 }
 if($textmessage == "❌ فعال نباشد"){
$user["step"] = "poes";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅  پست خود را ارسال کنید ( پست شما میتواند عکس-گیف-استیکر-فایل-موزیک-فیلم-ویس و یا متن باشد ).

💢 در صورت اشتباه تایپی و یا هر چیز دیگر شما میتوانید پستی که در کانال توسط ربات قرار داده شده را ادیت کنید.
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
]);
}
}
//--------------njnn---------
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "poes"){
$admneeeeebot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$botadssssssmin = $admneeeeebot['result']['status'];
$beeeev = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$xeeeeeez = $beeeev['result']['status'];
if($botadssssssmin != "administrator" and $xeeeeeez != "administrator" and $xeeeeeez != "creator"){
		$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات داخل کانال ادمین نمیباشد
لطفا دوباره امتحان کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}else{
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$tdlikee = $user["tdlike"];
$num = 0;
while(true){
++$num;
if(!file_exists("like/$num.txt")){
file_put_contents("like/$num.txt","0.$tdlikee");
touch("like/$num.user.txt");
break;
}
}
if($sticker_id != null){
	$post = bot('SendSticker',[
	'chat_id'=>$channel,
	'sticker'=>$sticker_id,
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif($video_id != null){
	$post = bot('SendVideo',[
	'chat_id'=>$channel,
	'video'=>$video_id,
        'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif($gif_id != null){
	$post = bot('SendGif',[
	'chat_id'=>$channel,
	'gif'=>$gif,
        'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif($voice_id != null){
	$post = bot('SendVoice',[
	'chat_id'=>$channel,
	'voice'=>$voice_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif($file_id != null){
	$post = bot('SendDocument',[
	'chat_id'=>$channel,
	'document'=>$file_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif($music_id != null){
	$post = bot('SendAudio',[
	'chat_id'=>$channel,
	'audio'=>$music_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif($photo_id != null){
	$post = bot('SendPhoto',[
	'chat_id'=>$channel,
	'photo'=>$photo_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
			elseif( $textmessage != null){
	$post = bot('SendMessage',[
	'chat_id' =>$channel,
	'text' =>$textmessage,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"leoike$num"]],
],
])
]);
			}
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ پست شما ارسال شد.
برای افزایش و یا کسر از لایک از دکمه های زیر استفاده کنید 👇",
'parse_mode'=>"HTML",

'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به تعداد لایک 👇️","callback_data"=>"null"]],
[["text"=>"+1$tdlikee","callback_data"=>"$num~$post_user~$post_id~+1"],["text"=>"+5$tdlikee","callback_data"=>"$num~$post_user~$post_id~+5"],["text"=>"+10$tdlikee","callback_data"=>"$num~$post_user~$post_id~+10"]],
[["text"=>"+20$tdlikee","callback_data"=>"$num~$post_user~$post_id~+20"],["text"=>"+50$tdlikee","callback_data"=>"$num~$post_user~$post_id~+50"],["text"=>"+100$tdlikee","callback_data"=>"$num~$post_user~$post_id~+100"]],
[["text"=>"+200$tdlikee","callback_data"=>"$num~$post_user~$post_id~+200"],["text"=>"+500$tdlikee","callback_data"=>"$num~$post_user~$post_id~+500"]],
[["text"=>"+1000$tdlikee","callback_data"=>"$num~$post_user~$post_id~+1000"]],
[["text"=>"👇کم کردن از تعداد لایک 👇","callback_data"=>"null"]],
[["text"=>"-1$tdlikee","callback_data"=>"$num~$post_user~$post_id~-1"],["text"=>"-5$tdlikee","callback_data"=>"$num~$post_user~$post_id~-5"],["text"=>"-10$tdlikee","callback_data"=>"$num~$post_user~$post_id~-10"]],
[["text"=>"-20$tdlikee","callback_data"=>"$num~$post_user~$post_id~-20"],["text"=>"-50$tdlikee","callback_data"=>"$num~$post_user~$post_id~-50"],["text"=>"-100$tdlikee","callback_data"=>"$num~$post_user~$post_id~-100"]],
[["text"=>"-200$tdlikee","callback_data"=>"$num~$post_user~$post_id~-200"],["text"=>"-500$tdlikee","callback_data"=>"$num~$post_user~$post_id~-500"]],
[["text"=>"-1000$tdlikee","callback_data"=>"$num~$post_user~$post_id~-1000"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$first,
]);
}
}

if(strpos($data, '~') !== false){
	$uefser = json_decode(file_get_contents("data/$fromid.json"),true);
$tdlikee = $uefser["tdlike"];
$info = explode('~',$data);
$num = $info[0]; $channel = $info[1]; $id = $info[2]; $like = $info[3];
if($like>0){
$like = str_replace('+',null,$like);
$new = file_get_contents("like/$num.txt") + $like;
}else{
$like = str_replace('-',null,$like);
$new = file_get_contents("like/$num.txt") - $like;
}
$gfjd = file_get_contents("like/$num.txt");
$ex000 = explode(".", $gfjd);
$a111 = $ex000[1];
file_put_contents("like/$num.txt","$new.$a111");
bot('EditMessageReplyMarkup',[
'chat_id'=>"@$channel",
'message_id'=>$id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$new - $a111",'callback_data'=>"leoike$num"],
],
],
])
]);
bot('SendMessage',[
'chat_id'=>$chatid,
'text'=>"با موفقیت انجام شد✅ تعداد لایک جدید : $new",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$messageid,
]);
}
if(strpos($data, 'leoike') !== false){
$num = str_replace('leoike',null,$data);
$list = file_get_contents("like/$num.user.txt");
if(strpos($list,"$fromid") !== false){
$newd = str_replace("$fromid",null,$list);
file_put_contents("like/$num.user.txt","$newd");
$gfdfjd = file_get_contents("like/$num.txt");
$ex06000 = explode(".", $gfdfjd);
$z = $ex06000[0];
$newf = $z - 1;
$gfjd = file_get_contents("like/$num.txt");
$ex000 = explode(".", $gfjd);
$a111 = $ex000[1];
file_put_contents("like/$num.txt","$newf.$a111");
bot('AnswerCallbackQuery', [
'callback_query_id' => $update->callback_query->id,
'text' => "☑️ شما لایک خود را پس گرفتید.",
'show_alert' => false
]);
bot('EditMessageReplyMarkup',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$newf - $a111",'callback_data'=>"leoike$num"],
],
],
])
]);

}else{
$myfile = fopen("like/$num.user.txt", "a") or die("Unable to open file!");
fwrite($myfile, "\n$fromid");
fclose($myfile);
$gfdfjd = file_get_contents("like/$num.txt");
$ex06000 = explode(".", $gfdfjd);
$z = $ex06000[0];
$newd = $z + 1;
$gfjd = file_get_contents("like/$num.txt");
$ex000 = explode(".", $gfjd);
$a111 = $ex000[1];
file_put_contents("like/$num.txt","$newd.$a111");
bot('AnswerCallbackQuery', [
'callback_query_id' => $update->callback_query->id,
'text' => "☑️ لایک شما ثبت شد.",
'show_alert' => false
]);
bot('EditMessageReplyMarkup',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$newd - $a111",'callback_data'=>"leoike$num"],
],
],
])
]);

}
}
//-----------------njnnn----------
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "pos"){
$admineeeeebot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$botadsssssssmin = $admineeeeebot['result']['status'];
$beeeeeev = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$xeeeeeeez = $beeeeeev['result']['status'];
if($botadsssssssmin != "administrator" and $xeeeeeeez != "administrator" and $xeeeeeeez != "creator"){
		$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ربات داخل کانال ادمین نمیباشد
لطفا دوباره امتحان کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}else{
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$tdlikee = $user["tdlike"];
$chowhhdhg = $user["channel"];
$num = 0;
while(true){
++$num;
if(!file_exists("like/$num.txt")){
file_put_contents("like/$num.txt","0.$tdlikee.$chowhhdhg");
touch("like/$num.user.txt");
break;
}
}
if($sticker_id != null){
	$post = bot('SendSticker',[
	'chat_id'=>$channel,
	'sticker'=>$sticker_id,
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif($video_id != null){
	$post = bot('SendVideo',[
	'chat_id'=>$channel,
	'video'=>$video_id,
        'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif($gif_id != null){
	$post = bot('SendGif',[
	'chat_id'=>$channel,
	'gif'=>$gif,
        'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif($voice_id != null){
	$post = bot('SendVoice',[
	'chat_id'=>$channel,
	'voice'=>$voice_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif($file_id != null){
	$post = bot('SendDocument',[
	'chat_id'=>$channel,
	'document'=>$file_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif($music_id != null){
	$post = bot('SendAudio',[
	'chat_id'=>$channel,
	'audio'=>$music_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif($photo_id != null){
	$post = bot('SendPhoto',[
	'chat_id'=>$channel,
	'photo'=>$photo_id,
	'caption'=>$caption,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
			elseif( $textmessage != null){
	$post = bot('SendMessage',[
	'chat_id' =>$channel,
	'text' =>$textmessage,
	'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"0 - $tdlikee","callback_data"=>"like$num"]],
],
])
]);
			}
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ پست شما ارسال شد.
برای افزایش و یا کسر از لایک از دکمه های زیر استفاده کنید 👇",
'parse_mode'=>"HTML",

'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به تعداد لایک 👇️","callback_data"=>"null"]],
[["text"=>"+1$tdlikee","callback_data"=>"$num|$post_user|$post_id|+1"],["text"=>"+5$tdlikee","callback_data"=>"$num|$post_user|$post_id|+5"],["text"=>"+10$tdlikee","callback_data"=>"$num|$post_user|$post_id|+10"]],
[["text"=>"+20$tdlikee","callback_data"=>"$num|$post_user|$post_id|+20"],["text"=>"+50$tdlikee","callback_data"=>"$num|$post_user|$post_id|+50"],["text"=>"+100$tdlikee","callback_data"=>"$num|$post_user|$post_id|+100"]],
[["text"=>"+200$tdlikee","callback_data"=>"$num|$post_user|$post_id|+200"],["text"=>"+500$tdlikee","callback_data"=>"$num|$post_user|$post_id|+500"]],
[["text"=>"+1000$tdlikee","callback_data"=>"$num|$post_user|$post_id|+1000"]],
[["text"=>"👇کم کردن از تعداد لایک 👇","callback_data"=>"null"]],
[["text"=>"-1$tdlikee","callback_data"=>"$num|$post_user|$post_id|-1"],["text"=>"-5$tdlikee","callback_data"=>"$num|$post_user|$post_id|-5"],["text"=>"-10$tdlikee","callback_data"=>"$num|$post_user|$post_id|-10"]],
[["text"=>"-20$tdlikee","callback_data"=>"$num|$post_user|$post_id|-20"],["text"=>"-50$tdlikee","callback_data"=>"$num|$post_user|$post_id|-50"],["text"=>"-100$tdlikee","callback_data"=>"$num|$post_user|$post_id|-100"]],
[["text"=>"-200$tdlikee","callback_data"=>"$num|$post_user|$post_id|-200"],["text"=>"-500$tdlikee","callback_data"=>"$num|$post_user|$post_id|-500"]],
[["text"=>"-1000$tdlikee","callback_data"=>"$num|$post_user|$post_id|-1000"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$first,
]);
}
}

if(strpos($data, '|') !== false){
	$uefser = json_decode(file_get_contents("data/$fromid.json"),true);
$tdlikee = $uefser["tdlike"];
$info = explode('|',$data);
$num = $info[0]; $channel = $info[1]; $id = $info[2]; $like = $info[3];
if($like>0){
$like = str_replace('+',null,$like);
$new = file_get_contents("like/$num.txt") + $like;
}else{
$like = str_replace('-',null,$like);
$new = file_get_contents("like/$num.txt") - $like;
}
$gfjd = file_get_contents("like/$num.txt");
$ex000 = explode(".", $gfjd);
$a111 = $ex000[1];
$chowhhdhg = $ex000[2];
file_put_contents("like/$num.txt","$new.$a111.$chowhhdhg");
bot('EditMessageReplyMarkup',[
'chat_id'=>"@$channel",
'message_id'=>$id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$new - $a111",'callback_data'=>"like$num"],
],
],
])
]);
bot('SendMessage',[
'chat_id'=>$chatid,
'text'=>"با موفقیت انجام شد✅ تعداد لایک جدید : $new",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$messageid,
]);
}
if(strpos($data, 'like') !== false){
$num = str_replace('like',null,$data);
$list = file_get_contents("like/$num.user.txt");
$gfythjd = file_get_contents("like/$num.txt");
$exyh000 = explode(".", $gfythjd);
$chowhhdffhg = $exyh000[2];
$join = bot('getchatmember',[
'chat_id'=>"$chowhhdffhg",
'user_id'=>$fromid])->result->status;
if($join!="member" && $join!="administrator" && $join!="creator" && $chowhhdffhg!=""){
	bot('AnswerCallbackQuery', [
'callback_query_id' => $update->callback_query->id,
'text' => "ابتدا باید داخل کانال عضو شوید",
'show_alert' => true
]);

}else if(strpos($list,"$fromid") !== false){
$newd = str_replace("$fromid",null,$list);
file_put_contents("like/$num.user.txt","$newd");
$gfdfjd = file_get_contents("like/$num.txt");
$ex06000 = explode(".", $gfdfjd);
$z = $ex06000[0];
$newf = $z - 1;
$gfjd = file_get_contents("like/$num.txt");
$ex000 = explode(".", $gfjd);
$a111 = $ex000[1];
$chowhhdhg = $ex000[2];
file_put_contents("like/$num.txt","$newf.$a111.$chowhhdhg");
bot('AnswerCallbackQuery', [
'callback_query_id' => $update->callback_query->id,
'text' => "☑️ شما لایک خود را پس گرفتید.",
'show_alert' => false
]);
bot('EditMessageReplyMarkup',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$newf - $a111",'callback_data'=>"like$num"],
],
],
])
]);

}else{
$myfile = fopen("like/$num.user.txt", "a") or die("Unable to open file!");
fwrite($myfile, "\n$fromid");
fclose($myfile);
$gfdfjd = file_get_contents("like/$num.txt");
$ex06000 = explode(".", $gfdfjd);
$z = $ex06000[0];
$newd = $z + 1;
$gfjd = file_get_contents("like/$num.txt");
$ex000 = explode(".", $gfjd);
$a111 = $ex000[1];
$chowhhdhg = $ex000[2];
file_put_contents("like/$num.txt","$newd.$a111.$chowhhdhg");
bot('AnswerCallbackQuery', [
'callback_query_id' => $update->callback_query->id,
'text' => "☑️ لایک شما ثبت شد.",
'show_alert' => false
]);
bot('EditMessageReplyMarkup',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$newd - $a111",'callback_data'=>"like$num"],
],
],
])
]);

}
}
//---nazar----
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "vote"){
$adminbot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$textmessage&user_id=776760396"),true);
$botadmin = $adminbot['result']['status'];
$bv = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$textmessage&user_id=$from_id"),true);
$xz = $bv['result']['status'];
if(strpos($textmessage,"@") == false and strpos($textmessage,"-") ==false and $botadmin != "administrator" and $xz != "administrator" and $xz != "creator"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ خطا، موارد زیر را بررسی کنید:

- ربات ادمین کانال نیست.

- شما ادمین کانال نیستید.

- ایدی و یا شناسه عددی کانال اشتباه است.

♻️ دوباره امتحان کنید...",
'parse_mode'=>"HTML",

'reply_markup'=>$dkchnnel,
]);
}else{
$user["channel"] = "$textmessage";
$user["step"] = "posts";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ حالا پست ( متن ) خود را که قرار است لایک شود ارسال کنید.

• پست شما نباید عکس، گیف، استیکر و ... باشد.

💢 در صورت اشتباه تایپی و یا هر چیز دیگر شما میتوانید پستی که در کانال توسط ربات درست شده است را ادیت کنید.",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
]);
}}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "posts"){
	if ( $textmessage ) {
$num = 0;
while(true){
++$num;
if(!file_exists("vote/$num.post.txt")){
file_put_contents("vote/$num.post.txt","$textmessage");
break;
}
}
$user["id"] = "$num";
$user["step"] = "dokm";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب اولین گزینه ی نظرسنجی رو بفرست✅",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}else{
	$user["step"] = "posts";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا فقط متن وارد کنید",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "dokm"){
	if ( $textmessage ) {
$myfile = fopen("vote/$id.dok.txt", "a") or die("Unable to open file!");
fwrite($myfile, "$textmessage|0");
fclose($myfile);
while(true){
$add = rand(23213,23423423523);
if(!file_exists("dok1/$add.txt")){
touch("dok1/$add.txt");
$myfile = fopen("vote/$id.dok.txt", "a") or die("Unable to open file!");
fwrite($myfile, "|$add");
fclose($myfile);
break;
}
}
$user["step"] = "dokms";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب گزینه ی بعدی نظرسنجی رو بفرست✅
هر وقت تموم شد روی ✅ تایید بزن✅",
'parse_mode'=>"HTML",
'reply_markup'=>$ghtvbdrh,
]);
}else{
	$user["step"] = "dokm";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفا فقط متن وارد کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "dokms" && $textmessage == "✅ تایید"){
if($textmessage == "✅ تایید"){
	$user["step"] = "jadide";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
گذینه شما به چه صورت باشد
",
'parse_mode'=>"HTML",
'reply_markup'=>$eddlikr
]);
}
}
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "dokms"){
	if ( $textmessage ) {
	$ghbbjyl = file_get_contents("vote/$id.dok.txt");
$evzx0 = explode("|", $ghbbjyl);
if(count($evzx0)==24){
$myfile = fopen("vote/$id.dok.txt", "a") or die("Unable to open file!");
fwrite($myfile, "|$textmessage|0");
fclose($myfile);
while(true){
$add = rand(23213,23423423523);
if(!file_exists("dok1/$add.txt")){
$myfile = fopen("vote/$id.dok.txt", "a") or die("Unable to open file!");
fwrite($myfile, "|$add");
fclose($myfile);
break;
}
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب گزینه ی بعدی نظرسنجی رو بفرست✅
هر وقت تموم شد روی ✅ تایید بزن✅",
'parse_mode'=>"HTML",

'reply_markup'=>$ghtvbdrh
]);
}else{
		$user["step"] = "dokms";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
لطفا فقط متن وارد کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}else{
		$user["step"] = "dokms";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد گذینه ها بیشتر از 8 تا نمیشود
برای تایید ✅ تایید بفرستید در غیر این صورت میتوانید به منوی اصلی بازگردید
",
'parse_mode'=>"HTML",
'reply_markup'=>$ghtvbdrh,
]);
}
}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "jadide" && $textmessage == "1" && $textmessage == "2" && $textmessage == "3" && $textmessage == "4"){
if($textmessage == "4"){
$admineeeeebot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$botadsssssssmin = $admineeeeebot['result']['status'];
$beeeeeev = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$xeeeeeeez = $beeeeeev['result']['status'];
if($botadsssssssmin != "administrator" and $xeeeeeeez != "administrator" and $xeeeeeeez != "creator"){
			$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید نشد
ربات ادمین کانال شما نیست
دوباره امتحان کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید شد
لایک شما در چنل قرار گرفت
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
include 'button4.php';
}
}

if($textmessage == "3"){
$admineeeeebot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$botadsssssssmin = $admineeeeebot['result']['status'];
$beeeeeev = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$xeeeeeeez = $beeeeeev['result']['status'];
if($botadsssssssmin != "administrator" and $xeeeeeeez != "administrator" and $xeeeeeeez != "creator"){
			$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید نشد
ربات ادمین کانال شما نیست
دوباره امتحان کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید شد
لایک شما در چنل قرار گرفت
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
include 'button3.php';
}
}

if($textmessage == "2"){
$admineeeeebot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$botadsssssssmin = $admineeeeebot['result']['status'];
$beeeeeev = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$xeeeeeeez = $beeeeeev['result']['status'];
if($botadsssssssmin != "administrator" and $xeeeeeeez != "administrator" and $xeeeeeeez != "creator"){
			$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید نشد
ربات ادمین کانال شما نیست
دوباره امتحان کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید شد
لایک شما در چنل قرار گرفت
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
include 'button2.php';
}
}

if($textmessage == "1"){
$admineeeeebot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$botadsssssssmin = $admineeeeebot['result']['status'];
$beeeeeev = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id"),true);
$xeeeeeeez = $beeeeeev['result']['status'];
if($botadsssssssmin != "administrator" and $xeeeeeeez != "administrator" and $xeeeeeeez != "creator"){
			$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید نشد
ربات ادمین کانال شما نیست
دوباره امتحان کنید
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تایید شد
لایک شما در چنل قرار گرفت
",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]);
include 'button1.php';
}
}

}


if(strpos($data, "-") !== false){
$z = explode('-',$data);
$dok = str_replace('vote',null,$z[0]);
$id = $z[1];
$ran = $z[2];
$list = file_get_contents("vote/$id.user.txt");
if(strpos($list, "$fromid") !== false){
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "شما رای خود را داده اید:)",
'show_alert' => false
]);
}else{
$ds = file_get_contents("vote/$id.dok.txt");
$s = explode('|',$ds);
if($dok == "1"){
    $txt = $s[0];
    $vote = $s[1];
}else if ($dok == "2"){
    $txt = $s[3];
    $vote = $s[4];
}else if ($dok == "3"){
    $txt = $s[6];
    $vote = $s[7];
}else if ($dok == "4"){
    $txt = $s[9];
    $vote = $s[10];
}else if ($dok == "5"){
    $txt = $s[12];
    $vote = $s[13];
}else if ($dok == "6"){
    $txt = $s[15];
    $vote = $s[16];
}else if ($dok == "7"){
    $txt = $s[18];
    $vote = $s[19];
}else if ($dok == "8"){
    $txt = $s[21];
    $vote = $s[22];
}
$myfile2 = fopen("vote/$id.user.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$fromid\n");
fclose($myfile2);
$x = $vote + 1;
$z = str_replace("$txt|$vote","$txt|$x",$ds);
file_put_contents("vote/$id.dok.txt","$z");
$ds = file_get_contents("vote/$id.dok.txt");
$s = explode('|',$ds);
if($s[21] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
[["text"=>"$s[16] $s[15]","callback_data"=>"vote6-$id-$s[17]"]],
[["text"=>"$s[19] $s[18]","callback_data"=>"vote7-$id-$s[20]"]],
[["text"=>"$s[22] $s[21]","callback_data"=>"vote8-$id-$s[23]"]],
],
]);
}else if($s[18] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
[["text"=>"$s[16] $s[15]","callback_data"=>"vote6-$id-$s[17]"]],
[["text"=>"$s[19] $s[18]","callback_data"=>"vote7-$id-$s[20]"]],
],
]);
}else if($s[15] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
[["text"=>"$s[16] $s[15]","callback_data"=>"vote6-$id-$s[17]"]],
],
]);
}else if($s[12] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
],
]);
}else if($s[9] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
],
]);
}else if($s[6] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
],
]);
}else if($s[3] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
],
]);
}else if($s[0] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
],
]);
}
bot('EditMessageReplyMarkup',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'reply_markup'=>$key
]);
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "رای شما به موفقیت ثبت شد:)",
'show_alert' => false
]);
}
}
if(strpos($data, '@') !== false){
$info = explode('@',$data);
$dok = $info[0]; $ran = $info[1]; $id = $info[2]; $ch = $info[3]; $idmsg= $info[4];
$add = $info[5];
$ds = file_get_contents("vote/$id.dok.txt");
$s = explode('|',$ds);
if($dok == "1"){
    $txt = $s[0];
    $vote = $s[1];
}else if ($dok == "2"){
    $txt = $s[3];
    $vote = $s[4];
}else if ($dok == "3"){
    $txt = $s[6];
    $vote = $s[7];
}else if ($dok == "4"){
    $txt = $s[9];
    $vote = $s[10];
}else if ($dok == "5"){
    $txt = $s[12];
    $vote = $s[13];
}else if ($dok == "6"){
    $txt = $s[15];
    $vote = $s[16];
}else if ($dok == "7"){
    $txt = $s[18];
    $vote = $s[19];
}else if ($dok == "8"){
    $txt = $s[21];
    $vote = $s[22];
}
if($add>0){
$ad = str_replace('+',null,$add);
$new = $vote + $ad;
$z = str_replace("$txt|$vote","$txt|$new",$ds);
file_put_contents("vote/$id.dok.txt","$z");
}else{
$ad = str_replace('-',null,$add);
$new = $vote - $ad;
$z = str_replace("$txt|$vote","$txt|$new",$ds);
file_put_contents("vote/$id.dok.txt","$z");
}
$ds = file_get_contents("vote/$id.dok.txt");
$s = explode('|',$ds);
if($s[21] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
[["text"=>"$s[16] $s[15]","callback_data"=>"vote6-$id-$s[17]"]],
[["text"=>"$s[19] $s[18]","callback_data"=>"vote7-$id-$s[20]"]],
[["text"=>"$s[22] $s[21]","callback_data"=>"vote8-$id-$s[23]"]],
],
]);
}else if($s[18] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
[["text"=>"$s[16] $s[15]","callback_data"=>"vote6-$id-$s[17]"]],
[["text"=>"$s[19] $s[18]","callback_data"=>"vote7-$id-$s[20]"]],
],
]);
}else if($s[15] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
[["text"=>"$s[16] $s[15]","callback_data"=>"vote6-$id-$s[17]"]],
],
]);
}else if($s[12] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
[["text"=>"$s[13] $s[12]","callback_data"=>"vote5-$id-$s[14]"]],
],
]);
}else if($s[9] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vote4-$id-$s[11]"]],
],
]);
}else if($s[6] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
[["text"=>"$s[7] $s[6]","callback_data"=>"vote3-$id-$s[8]"]],
],
]);
}else if($s[3] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
[["text"=>"$s[4] $s[3]","callback_data"=>"vote2-$id-$s[5]"]],
],
]);
}else if($s[0] != null){
$key = json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vote1-$id-$s[2]"]],
],
]);
}
bot('EditMessageReplyMarkup',[
'chat_id'=>"@$ch",
'message_id'=>$idmsg,
'reply_markup'=>$key
]);
bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"با موفقیت انجام شد✅ تعداد رای جدید : $new",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$messageid,
]);
}
//------------pn--
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "none"){
//---------------------------------------------------------------------------------
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	  bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️  جهت ادامه کار نیاز است در کانال ما عضو شوید.

👈 بعد از عضویت مجددا /start را ارسال نمایید.
",
'parse_mode'=>"HTML",

'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"🌐 Tm Quick","url"=>"https://t.me/tm_quick"]],
],
])
]);
}else{
//-----------------
if($textmessage){
$davati3 = $user["davati2"];
$davati4 = $user["davati"];
if($davati3 == "No"){
$user500 = json_decode(file_get_contents("data/$davati4.json"),true);
$indvite = $user500["invite"];
settype($indvite,"integer");
$golggran = rand("100","120");
$newwidnvite = $indvite + $golggran;
$user500["invite"] = $newwidnvite;
$tedaad = $user500["tedad"];
$newwtd = $tedaad + 1;
$user500["tedad"] = $newwtd;
$outjson = json_encode($user500,true);
file_put_contents("data/$davati4.json",$outjson);
$user["davati2"] = "Ok";
$outjdson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjdson);
bot('SendMessage',[
'chat_id'=>$davati4,
'text'=>"🎈 تبریک، $golggran سکه بابت زیرمجموعه جدید دریافت کردید.",
'parse_mode'=>"MARKDOWN",
]);
}
}
//---------------------------------------------------------------------------------
if($textmessage == "☎️ پشتیبانی"){
$user["step"] = "posh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"👨‍💻 همکاران ما در خدمت شما هستن !
 
🔘 در صورت وجود نظر , ایده , گزارش مشکل , پیشنهاد , ایراد سوال , یا انتقاد میتوانید با ما در ارتباط باشید .
💬 لطفا پیام خود را به صورت فارسی و روان ارسال کنید
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
	 ]);  
}
//---------------------------------------------------------------------------------
if($textmessage == "👁‍🗨 درخواست بازدید"){
$user["step"] = "view2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❓تعداد بازدید دلخواه خود را به صورت عددی بین 10 الی 30000 ارسال نمایید.

 موجودی شما: $invite سکه",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage and file_exists("cmd/$textmessage.txt")){
	$texrewtcmd = file_get_contents("cmd/$textmessage.txt");
	bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$texrewtcmd,
 'parse_mode'=>"HTML",
]); 
}
//---------------------------------------------------------------------------------
if($textmessage == "💰 انتقال سکه"){
$user["step"] = "entg";
$invite = $user["invite"];
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❓ تعداد سکه موردنظر جهت انتقال را وارد نمایید:

 موجودی شما: $invite سکه",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
//---------------------------------------------------------------------------------
if($textmessage == "➕ افزایش سکه"){
	$user["step"] = "eiqntyg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
💠 گذینه مورد نظر خود را انتخاب کنید!",'parse_mode'=>"HTML",

        	'reply_markup'=>$button_office,
	]);
	}
//---------------------------------------------------------------------------------
if($textmessage == "👤 حساب کاربری"){
	   $user["step"] = "none";
	$tartm = $user["tartm"];
	$invite = $user["invite"];
	$tedad = $user["tedad"];
	$mkharid = $user["mkharid"];
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	 bot('sendmessage', [
  'chat_id' =>$chat_id,
  'text' =>"
👤 شناسه شما: `$chat_id`
📅 تاریخ عضویت: $tartm
💰 موجودی شما: $invite سکه
👥 زیرمجموعه: $tedad نفر

‏🧮 مجموع خرید شما: $mkharid تومان
🔸 سطح کاربری: ( 🌟 )

`Tm Quick $tarkh $time`",
'parse_mode'=>"MARKDOWN",
	]);
}
//---------------------------------------------------------------------------------
if($textmessage == "⚖️"){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
⚖️ <b>استفاده از ربات کوییک به منزله‌ی قبول شرایط و قوانین زیر است:</b>

1- پستهای ارسالی شما برای افزایش بازدید، توسط هیچ فرد واقعی‌ای دیده نمیشود بنابراین مناسب کارهای <u>تبلیغاتی</u> نیست.

2- خرید و فروش موجودی ربات توسط کاربران <u>بلامانع</u> است اما شرکت کوییک هیچ گونه تعهدی برای پیگیری تخلفات مربوطه ندارد و فقط در صورت صلاح دید پیگیری انجام میشود.

3- درصورتی که قصد خرید سکه انبوه را دارید قبل از آن با پشتیبانی در ارتباط باشید. ( اگر منبع سکه های بدست آمده از طریق باگ ربات و یا خرید با کارت‌های هک شده باشد حساب آن کاربر بدون تذکر مسدود دائم خواهد شد)

4- دریافت لینک پرداخت از ربات و ارسال آن به سایر افراد جهت واریز وجه تخلف محسوب میشود و درصورت مشاهده حساب کاربر مسدود دائم خواهد شد.

5- در صورت مشاهده پیام بیش از حد  (Spam) و یا هر گونه تخلف دیگر در ربات حساب آن کاربر مسدود دائم میشود. ( ربات دارای آنتی Spam است و در صورتی که کاربر سه اخطار را دریافت کند حساب آن کاربر توسط ربات مسدود دائم خواهد شد و غیر قابل بخشش است)

6- در صورت مشاهده زیرمجموعه گیری فیک حساب آن کاربر یک هفته مسدود میشود.

<i>آخرین ویرایش قوانین: 15 آبان 1399</i>
",
'parse_mode'=>"HTML",
]);
}
//---------------------------------------------------------------------------------
if($textmessage == "🔎"){
$serach = $user["serach"];
if ($serach != "5"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$ggbazdd = file_get_contents("set/$chat_id.txt");
$seeend = bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
درحال بارگذاری...
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"🚫","callback_data"=>"null"],["text"=>"🚫","callback_data"=>"null"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
$nop = "1";
while($nop >= 1){
sleep(1);
$nop--;
$idddddddd = $seeend->result->message_id;
  bot('editmessagetext',[
 'chat_id'=>$chat_id,
'message_id'=>$idddddddd,
'text'=>"
🗄 لیست سفارشات بازدید شما:

$ggbazdd

`Tm Quick $tarkh $time`
",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"🚫","callback_data"=>"null"],["text"=>"🚫","callback_data"=>"null"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
شما تاکنون بازدیدی ثبت نکرده اید.
",
'parse_mode'=>"HTML",
	 ]);  
}
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "pnl"){
	$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" سلام مدیر گرامی به پنل خوش آمدید!",
'parse_mode'=>"HTML",
'reply_markup'=>$panel,
]); 
}
//---------------------------------------------------------------------------------
if($textmessage == "❤️ ساخت لایک"){
	$user["step"] = "eiqntg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
💠 گذینه مورد نظر خود را انتخاب کنید!",
'parse_mode'=>"HTML",

'reply_markup'=>$button_like,
]);
}
}
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $step == "panelg"){
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
 //---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "📊 آمار ربات"){	
$alluser = file_get_contents("data/members.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki)-1;
$num = 0;
while(true){
++$num;
if(!file_exists("like/$num.txt")){
break;
}
}
$num = $num -1;
$load = sys_getloadavg();
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌐 آمار ربات: ->

👥 تعداد کاربران ربات شما: $allusers
 تعداد لایک های ساخته شده: $num
🗄 سرعت سرور: $load[0]
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
]); 
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "📭 پیام همگانی"){	
$user["step"] = "send2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"?? پیام خودت رو بفرست.",
'parse_mode'=>"MarkDown",

'reply_markup'=>$bar,
]); 
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "📮 فوروارد همگانی"){
$user["step"] = "f2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"?? پیام خودت رو فور کن اینجا.",
'parse_mode'=>"MarkDown",

'reply_markup'=>$bar,
]); 
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "🎗دریافت شماره کاربر🎗"){	
$user["step"] = "getnumber";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"?? ایدی عددی کاربر:",
 'parse_mode'=>"HTML",
  
'reply_markup'=>$bar,
]); 
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "🚫 رفع بلاک"){
$user["step"] = "rafnol";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی :/؟",
'parse_mode'=>"MarkDown",

'reply_markup'=>$bar,
]); 
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "💸 افزایش الماس کاربر"){
$user["step"] = "charge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"?? آیدی عددی فرد را وارد نمایید.",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]);
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "💸 کسر الماس کاربر"){
$user["step"] = "charrge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"?? آیدی عددی فرد را وارد نمایید.",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]);
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "🔰 دریافت اطلاعات کاربر"){
$user["step"] = "settingies";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"?? آیدی عددی فرد را وارد نمایید.",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]);
}
}
//-----------------------------------------------------------------------------------------------------------------------------
	if($step == "send2all" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) && $step == "send2all"){ 
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$all_member = fopen( "data/members.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
			if($sticker_id != null){
	bot('SendSticker',[
	'chat_id'=>$user,
	'sticker'=>$sticker_id,
	]);
			}
			elseif($video_id != null){
	bot('SendVideo',[
	'chat_id'=>$user,
	'video'=>$video_id,
        'caption'=>$caption,
	]);
			}
			elseif($voice_id != null){
	bot('SendVoice',[
	'chat_id'=>$user,
	'voice'=>$voice_id,
	'caption'=>$caption,
	]);
			}
			elseif($file_id != null){
	bot('SendDocument',[
	'chat_id'=>$user,
	'document'=>$file_id,
	'caption'=>$caption,
	]);
			}
			elseif($music_id != null){
	bot('SendAudio',[
	'chat_id'=>$user,
	'audio'=>$music_id,
	'caption'=>$caption,
	]);
			}
			elseif($photo_id != null){
	bot('SendPhoto',[
	'chat_id'=>$user,
	'photo'=>$photo_id,
	'caption'=>$caption,
	]);
			}
			elseif( $textmessage != null){
	bot('SendMessage',[
	'chat_id' =>$user,
	'text' =>$textmessage,
	'parse_mode'=>"HTML",
	]);
			}
}
	bot('SendMessage',[
	'chat_id' =>$chat_id,
	'text' =>"حله",
	'parse_mode'=>"HTML",
	'reply_markup'=>$panel,
	]);
	
		}
		
			if($step == "f2all" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
		if(in_array($chat_id,$admin) && $step == "f2all"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$all_member = fopen( "data/members.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
}
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ فوروارد همگانی به همه اعضای ربات فوروارد شد.",
'parse_mode'=>"MarkDown",

'reply_markup'=>$panel,
]); 

}

	if($step == "getnumber" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) and $step == "getnumber"){
	$useroo1 = json_decode(file_get_contents("data/$textmessage.json"),true);
	$nuuum = $useroo1["number"];
if(preg_match('/^\d+$/', $textmessage)){
	if(file_exists("data/$textmessage.json")){
if($nuuum != "تایید نشده"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendContact',[
 'chat_id'=>$chat_id,
 'phone_number'=>$number1,
 'first_name'=>"شماره کاربر!",
  
]); 
bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
√ شماره فرد ارسال شد!
 شناسه فرد:
$textmessage",
 'parse_mode'=>"HTML",
  'reply_markup'=>$panel,
]);
}else{
	$user["step"] = "getnumber";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 کاربر مورد نظر تایید شماره نکرده است!
",
 'parse_mode'=>"HTML",
 'reply_markup'=>$bar,
]);
}
}else{
	$user["step"] = "getnumber";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
		bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 کاربر یافت نشد!
",
 'parse_mode'=>"HTML",
  'reply_markup'=>$bar,
]);
}
}else{
$user["step"] = "getnumber";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
		bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 عدد ورودی اشتباه است!
",
 'parse_mode'=>"HTML",
  'reply_markup'=>$bar,
]);
}}

	if($step == "rafnol" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) && $step == "rafnol"){
	if(preg_match('/^\d+$/', $textmessage)){
	if(file_exists("data/$textmessage.json")){
			$usedroo1 = json_decode(file_get_contents("data/$textmessage.json"),true);
	$nuuyum = $usedroo1["_spam_block"];
if($nuuyum != false){
$usman = json_decode(file_get_contents("data/$textmessage.json"),true);
$usman['_spam_block'] = false;
$usman['_spam_warn'] = 1;
$usman["step"] = "panelg";
$out = json_encode($usman,true);
file_put_contents("data/$textmessage.json",$out);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ کاربر از بلاک در اومد!",
'parse_mode'=>"MarkDown",

'reply_markup'=>$panel,
]); 
}else{
	$user["step"] = "rafnol";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" کاربر اصلا بلاک نیست :|",
'parse_mode'=>"MarkDown",

'reply_markup'=>$bar,
]); 
}
}else{
	$user["step"] = "rafnol";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 کاربر مورد نظر یافت نشد!",
'parse_mode'=>"MarkDown",

'reply_markup'=>$bar,
]); 
}
}else{
$user["step"] = "rafnol";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",

'reply_markup'=>$bar,
]); 
}}

	if($step == "charge" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) and  $step == "charge"){
	if(preg_match('/^\d+$/', $textmessage)){
if(file_exists("data/$textmessage.json")){
file_put_contents("set/add.txt", "$textmessage");
$user["step"] = "chahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"حالا تعداد سکه؟",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}else{
$user["step"] = "charge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" کاربر مورد نظر یافت نشد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}
}else{
$user["step"] = "charge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}}

	if($step == "chahr" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) and $step == "chahr"){
if(preg_match('/^\d+$/', $textmessage)){
	if ($textmessage >= 10 and $textmessage <= 10000) {
	    $buy = file_get_contents("set/add.txt");
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$use = json_decode(file_get_contents("data/$buy.json"),true);
$endbots2 = $use["invite"];
$new2 = $endbots2 + $textmessage;
$use["invite"] = $new2;
$outjson2 = json_encode($use,true);
file_put_contents("data/$buy.json",$outjson2);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" تعداد $textmessage سکه دادمش!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$panel
]); 
}else{
$user["step"] = "chahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" حداقل 10 و حداکثر 10000 سکه قابل انتقال است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}
}else{
$user["step"] = "chahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}}

	if($step == "charrge" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) and $step == "charrge"){
	if(preg_match('/^\d+$/', $textmessage)){
if(file_exists("data/$textmessage.json")){
file_put_contents("set/add.txt", "$textmessage");
$user["step"] = "chaahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$nany = json_decode(file_get_contents("data/$textmessage.json"),true);
$goytr = $nany["invite"];
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 تعداد سکه کاربر مورد نظر: $goytr
 تعداد سکه برای کسر کردن از کاربر را وارد کنید!
",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}else{
$user["step"] = "charrge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 کاربر مورد نظر یافت نشد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}
}else{
$user["step"] = "charrge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}}

	if($step == "chaahr" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) and $step == "chaahr"){
	    $buyy = file_get_contents("set/add.txt");
	$naany = json_decode(file_get_contents("data/$buyy.json"),true);
$gooytr = $naany["invite"];
if(preg_match('/^\d+$/', $textmessage)){
	if ($textmessage >= 1 and $textmessage <= $gooytr) {
	    $buy = file_get_contents("set/add.txt");
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$use = json_decode(file_get_contents("data/$buy.json"),true);
$endbots2 = $use["invite"];
$new2 = $endbots2 - $textmessage;
$use["invite"] = $new2;
$outjson2 = json_encode($use,true);
file_put_contents("data/$buy.json",$outjson2);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"√ تعداد $textmessage سکه کم شد.",
'parse_mode'=>"MarkDown",
'reply_markup'=>$panel
]);
}else{
$user["step"] = "chaahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" حداقل 0 و حداکثر $gooytr سکه قابل کم کردن است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}
}else{
$user["step"] = "chaahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}}

	if($step == "settingies" && $textmessage == "برگشت"){
if(in_array($chat_id,$admin) and $textmessage == "برگشت"){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
$backer
",
'parse_mode'=>"HTML",

'reply_markup'=>$panel,
 ]);
 
 }
	}
if(in_array($chat_id,$admin) and  $step == "settingies"){
	if(preg_match('/^\d+$/', $textmessage)){
if(file_exists("data/$textmessage.json")){
$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$nayny = json_decode(file_get_contents("data/$textmessage.json"),true);
$gooytr = $nayny["invite"];
$gooyytr = $nayny["number"];
$taartm = $nayny["tartm"];
$tedaad = $nayny["tedad"];
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سکه کاربر: $gooytr
شماره کاربر: $gooyytr
شناسه کاربر: $textmessage
 تاریخ عضویت: $taartm
تعداد زیرمجموعه: $tedaad
",
'parse_mode'=>"MarkDown",
'reply_markup'=>$panel,
]); 
}else{
$user["step"] = "settingies";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 کاربر مورد نظر یافت نشد!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}
}else{
$user["step"] = "settingies";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>" عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}}

//--------------------------------------------------------------------------------------------------------------
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "eiqntyg"){
if($textmessage == "👥 زیرمجموعه"){
	$user["step"] = "eiqntyg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	   $caption = "
👁‍🗨 افزایش بازدید پستهای تلگرامی
❤️ ساخت و افزایش لایک تلگرام
💯 سریع، رایگان و بدون آفلاینی 
🔐 پرداخت مطمئن و 100% امن
🎊 همراه با کلی امکانات پیشرفته...

همین حالا امتحان کنید 👇👇👇

🔗 https://t.me/SeenRuBot?start=$chat_id";
       bot('SendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('mem.jpg'),
 'caption'=>$caption,
 'parse_mode'=>"HTML",
 ]);
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "🗣 به ازای هر شخصی که برای اولین بار با لینک شما عضو ربات شود بین 100 تا 150 سکه دریافت خواهید کرد.
👥 برای شروع بنر بالا را به دوستان و آشنایان خود ارسال کنید.
",

        ]);
		
	}

	if($textmessage == "💰 خرید سکه"){
		$user["step"] = "eiqntyg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
جهت خرید سکه به پشتیبانی مراجعه کنید
@Mehrab_S
یا در قسمت پشتیبانی در ربات با ما در ارتباط باشید
",
'parse_mode'=>"HTML",
	 ]); 
	}
}
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "posh"){
bot('ForwardMessage', [
'chat_id' => $admins,
'from_chat_id' => $from_id,
'message_id' => $message_id,
]);
$user["step"] = "posh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ پیام شما دریافت شد، لطفا تا زمان دریافت پاسخ صبور باشید.
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
]);
}
   elseif($rpto != "" && in_array($chat_id,$admin)){
	bot('SendMessage',[
	'chat_id' =>$rpto,
	'text' =>"📩 Support Message:

$textmessage",
	'parse_mode'=>"HTML",
	]);
			bot('SendMessage',[
	'chat_id' =>$chat_id,
	'text' =>"پیام شما به فرد ارسال شد✔️",
	'parse_mode'=>"HTML",
	]);
}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "view2"){
if(preg_match('/^\d+$/', $textmessage)){
if($textmessage >= 10 and $textmessage <= 30000){
if($invite >= $textmessage){
settype($textmessage, "int");
$user["step"] = "vinne3";
$user["view0"] = "$textmessage";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$period = $user["period"];
$speed = $user["speed"];
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👈  پست خود را از یک کانال فوروارد کنید.

  بازدید درخواستی: $textmessage بازدید
 سرعت تکمیل: هر $period دقیقه $speed بازدید

⏱ جهت تنظیم سرعت و زمان استارت سفارش از دکمه های زیر استفاده کنید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$siingg,
]);
	}else{
$user["step"] = "view2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❗️موجودی شما کافی نیست!
👈 هزینه هر یک بازدید، 1 سکه است",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}else{	
$user["step"] = "view2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❗️ تعداد بازدید انتخابی باید بین 10 الی 30000 باشد.
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}else{
	$user["step"] = "view2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}
//------------------------------------------
if($step == "vinne3" && $textmessage == "حداکثر" && $textmessage == "تنظیم سرعت"){
if($textmessage == "تنظیم سرعت"){
$user["step"] = "tanzim";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔸 در این بخش می‌توانید سرعت دلخواه خود را تنظیم کنید.

برای این کار، باید دقیقاً مانند الگوی زیر دو عدد در ربات بفرستید (<i>دونقطه‌ها</i> فراموش نشود).

5:8
🔺 مثال بالا به این معنی است که:

🔹 سفارش من هر 5 دقیقه 8 بازدید بخورد، تا زمانی که تعداد بازدید درخواستی‌ام کامل شود.
-(0 Max)-",
'parse_mode'=>"HTML",
'reply_markup'=>$enseraf
]);
}
if($textmessage == "حداکثر"){
$user["step"] = "vinne3";
$user["period"] = "0";
$user["speed"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$view0 = $user["view0"];
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👈 پست خود را فوروارد کنید.

 درخواستی: $view0 بازدید
 سرعت تکمیل: حداکثر سرعت
 استارت سفارش: فوری

⏱ جهت تنظیم سرعت و زمان استارت سفارش از دکمه های زیر استفاده کنید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
}
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "vinne3"){
if($update->message->forward_from_chat->type == "channel"){
if($message->audio != true){
$view0 = $user["view0"];
$period = $user["period"];
$speed = $user["speed"];
$iddd = bot('ForwardMessage', [
'chat_id' => "@qvieo",
'from_chat_id' => $from_id,
'message_id' => $message_id,
  ])->result->message_id;
  $res2euelt = file_get_contents("https://senatorseen.com/api/api.php?apikey=d945f6b75b52ca3d8f20&type=view&count=$view0&speed=$speed&period=$period&channel=qvieo&id=$iddd");
  if($res2euelt->result == 'ok'){
$reseuelt = json_decode($res2euelt, true);
$alpha = $reseuelt["order"];
$alpha1 = $reseuelt["count"];
$alpha2 = $reseuelt["amount"];
$alpha3 = $reseuelt["seenstart"];
$alpha4 = $reseuelt["seenend"];
$m3 = json_decode(file_get_contents("data/$from_id.json"),true);
$newhginf = $m3["invite"];
$nedwtr = $newhginf - $view0;
$m3["invite"] = $nedwtr;
$m3["step"] = "none";
$m3["serach"] = "0";
$m2 = json_encode($m3,true);
file_put_contents("data/$from_id.json",$m2);
$masdtt8 = "
شماره پیگیری سایت: $alpha
تعداد درخواستی: $view0 بازدید
تعداد درخواستی سایت: $alpha1
سکه کم شده از سایت: $alpha2
شروع از سایت: $alpha3
تموم شده در سایت: $alpha4
فرد درخواستی: $chat_id
پست: t.me/qvieo/$idey
سرعت: $speed
پرناد: $period
تاریخ: $tarkh
زمان: $time";
file_put_contents("cmd/$alpha.txt",$masdtt8);
$testggh = "👈 سفارش شماره $alpha
درخواستی: $view0 بازدید ✔️
زمان: $tarkh $time
‌‏————————————";
$mygg = fopen("set/$chat_id.txt", "a") or die("Unable to open file!");
fwrite($mygg, "$testggh\n");
fclose($mygg);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ سفارش بازدید با شماره پیگیری `$alpha` ثبت شد.

 تعداد درخواست: $view0 بازدید
 شروع از: $alpha3 بازدید
 سکه کم شده: $view0
",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>$first,
]);
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
‼️متاسفانه مشکلی پیش آمده است موارد زیر را بررسی کنید

- مقدار بازدید انتخابی از مقدار ویو ربات بیشتر است
- شارژ ربات تمام شده است

جهت اطلاعات بیشتر با پشتیبانی در تماس باشید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}
}else{
			$user["step"] = "vinne3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠ پشت شما نمیتواند اهنگ باشد.",
'parse_mode'=>"HTML",
]);
}
}else{
		$user["step"] = "vinne3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ پست ارسالی شما باید فوروارد شده از یک کانال باشد.",
'parse_mode'=>"HTML",
]);
}
}
//---------------------
if($step == "tanzim" && $textmessage == "انصراف"){
if($textmessage == "انصراف"){
$user["step"] = "vinne3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
👈  پست خود را از یک کانال فوروارد کنید.

  بازدید درخواستی: $view0 بازدید
 سرعت تکمیل: هر $period دقیقه $speed بازدید

⏱ جهت تنظیم سرعت و زمان استارت سفارش از دکمه های زیر استفاده کنید.
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
 ]);
 }
}
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "tanzim"){
$ex0 = explode(":", $textmessage);
if(count($ex0)==2){
$a1 = $ex0[0];
$b2 = $ex0[1];
if(preg_match('/^\d+$/', $a1) and $a1 >= 0 and $a1 <= 30000){
if(preg_match('/^\d+$/', $b2) and $b2 >= 0 and $b2 <= 60){
settype($a1, "int");
settype($b2, "int");
$user["step"] = "vinne3";
$user["speed"] = "$a1";
$user["period"] = "$b2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$view0 = $user["view0"];
$period = $user["period"];
$speed = $user["speed"];
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
👈  پست خود را از یک کانال فوروارد کنید.

  بازدید درخواستی: $view0 بازدید
 سرعت تکمیل: هر $period دقیقه $speed بازدید

⏱ جهت تنظیم سرعت و زمان استارت سفارش از دکمه های زیر استفاده کنید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$siingg,
]);
}else{
	$user["step"] = "tanzim";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مقدار ورودی باید بین 0 الی 60 باشد!
$a1:❌
",
'parse_mode'=>"HTML",
'reply_markup'=>$enseraf
]);
}
}else{
	$user["step"] = "tanzim";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مقدار ورودی باید بین 0 الی 30000 باشد!
❌:$b2
",
'parse_mode'=>"HTML",
'reply_markup'=>$enseraf
]);
}
}else{
	$user["step"] = "tanzim";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ مقدار ورودی اشتباه است!
",
'parse_mode'=>"HTML",
'reply_markup'=>$enseraf
]);
}
}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "entg"){
if(preg_match('/^\d+$/', $textmessage)){
	if($invite - $textmessage >= 100){
	if ($textmessage >= 30) {
$uqp = json_decode(file_get_contents("data/$from_id.json"),true);
settype($textmessage, "int");
	$uqp["ied"] = "$textmessage";
	$uqp["step"] = "hmtd";
$nuns = json_encode($uqp,true);
file_put_contents("data/$from_id.json",$nuns);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"?? توجه: عملیات انتقال سکه غیرقابل بازگشت است!

👈 درصورتی که درخواست انتقال $textmessage سکه مورد تاییدتان است، شناسه کاربری مقصد را ارسال کنید.",
'parse_mode'=>"HTML",
'reply_markup'=>$back
]); 
}else{
	$user["step"] = "entg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ حداقل 30 سکه قابل انتقال است.

",
'parse_mode'=>"HTML",
'reply_markup'=>$back
]); 
}}else{
	$user["step"] = "entg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ این انتقال قابل انجام نیست! برای انتقال نیاز است که 100 سکه داخل حساب خودتان باقی بماند.

",
'parse_mode'=>"HTML",
'reply_markup'=>$back
]); 
}}else{
		$user["step"] = "entg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$back
]); 
}}

if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "hmtd"){
if(preg_match('/^\d+$/', $textmessage)){
	if(file_exists("data/$textmessage.json")){
	if( $textmessage != $chat_id) {
$ied = $user["ied"];
$usmn = json_decode(file_get_contents("data/$from_id.json"),true);
$newinf = $usmn["invite"];
$newtr = $newinf - $ied;
$usmn["invite"] = $newtr;
$usmn["step"] = "none";
$mour = json_encode($usmn,true);
file_put_contents("data/$from_id.json",$mour);
$un = json_decode(file_get_contents("data/$textmessage.json"),true);
$nwum = $un["invite"];
$newun = $nwum + $ied;
$un["invite"] = $newun;
$mut = json_encode($un,true);
file_put_contents("data/$textmessage.json",$mut);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تراکنش موفق ( ارسال )

‏👈 تعداد $ied سکه در تاریخ $tarkh ساعت $time به کاربر $textmessage انتقال داده شد.
#تراکنش_موفق",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]); 
bot('SendMessage',[
'chat_id'=>$textmessage,
'text'=>"✅ تراکنش موفق ( دریافت )

👈 تعداد $ied سکه در تاریخ $tarkh ساعت $time از کاربر $chat_id دریافت شد.
#تراکنش_موفق",
'parse_mode'=>"HTML",
]); 
}else{
	$user["step"] = "hmtd";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ ارسال سکه به خودتان امکان پذیر نیست!

",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]); 
}
}else{
	$user["step"] = "hmtd";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ کاربر مورد نظر در ربات یافت نشد!
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]); 
}
}else{
		$user["step"] = "hmtd";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]); 
}
}
?>