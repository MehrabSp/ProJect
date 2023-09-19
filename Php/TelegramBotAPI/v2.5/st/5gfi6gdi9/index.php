<?php
ob_start();
//=====================filter ip======================//
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
if (!$ok) die('good like @Mehrab_S');
//=====================token======================//
include('ezez2.php');
$token = '1431820650:AAE6PSupcuSlFFipDpEMPuk6ionLjsKYOP0';
define('API_KEY',$token);
//=====================function======================//
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
//===================================//
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
$tdlikee = $user["tdlike"];
$speed = $user["speed"];
$time = jdate("H:i:s");
$tarkh = jdate("Y/m/d");
$admin = array("1043097454","000000000");
$admins = '1043097454';
$channnnel = 'Tm_Quick';
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channnnel."&user_id=".$from_id));
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
$tc = $update->message->chat->type;

$backer = '🖥 صفحه اصلی

یک بخش را انتخاب کنید:';

$starter = 'سلام، خوش آمدید🌹

🌺 در کنار شما هستیم، تا به صورت تخصصی برای شما خدمت کنیم.';
//======================button=====================//
$panel = json_encode(['keyboard'=>[
[['text'=>"بازگشت"]],
[['text'=>"🎗دریافت شماره کاربر🎗"],['text'=>"📊 آمار ربات"]],
[['text'=>"📭 پیام همگانی"],['text'=>"📮 فوروارد همگانی"]],
[['text'=>"💸 افزایش الماس کاربر"],['text'=>"💸 کسر الماس کاربر"]],
[['text'=>"🚫 رفع بلاک"],['text'=>"🔰 دریافت اطلاعات کاربر"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$first = json_encode(['keyboard'=>[
[['text'=>"👁‍🗨 درخواست بازدید"],['text'=>"❤️ ساخت لایک"]],
[['text'=>"👤 حساب کاربری"]],
[['text'=>"💰 انتقال سکه"],['text'=>"💰 خرید سکه"]],
[['text'=>"🔎"],['text'=>"🆘"],['text'=>"⚖️"],['text'=>"🎁"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$button_like = json_encode(['keyboard'=>[
[['text'=>"♥️ ساخت لایک"],['text'=>"☘ ساخت نظرسنجی"]],
 [['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$button_office = json_encode(['keyboard'=>[
 [['text'=>"👤 زیرمجموعه گیری"],['text'=>"📥 ارسال اکانت"]],
 [['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$bar = json_encode(['keyboard'=>[
[['text'=>"برگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$back = json_encode(['keyboard'=>[
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$siingg = json_encode(['keyboard'=>[
[['text'=>"بازگشت"]],
 [['text'=>"تنظیم سرعت"],['text'=>"حداکثر"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$enseraf = json_encode(['keyboard'=>[
[['text'=>"انصراف"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$eddlikr = json_encode(['keyboard'=>[
[['text'=>"1"],['text'=>"2"],['text'=>"3"],['text'=>"4"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$dkchnnel = json_encode(['keyboard'=>[
[['text'=>"$channel"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$buttnfal = json_encode(['keyboard'=>[
[['text'=>"✅ فعال باشد"],['text'=>"❌ فعال نباشد"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//---------------------------------------------------------------------------------
$ghtvbdrh = json_encode(['keyboard'=>[
[['text'=>"✅ تایید"]],
[['text'=>"بازگشت"]],
],'resize_keyboard'=>true,'one_time_keyboard' => true,]);
//======================start=====================//
if(strpos($textmessage,"/start") !== false  &&  $textmessage !="/start" && $tc == "private"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$starter
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
if(file_exists("data/$id.json")){
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
$user["adbash"] = "عادی";
$user["mkharid"] = "0";
$user["davati"] = "$id";
$user["davati2"] = "No";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
}else{
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
$user["adbash"] = "عادی";
$user["serach"] = "5";
$user["mkharid"] = "0";
$user["davati2"] = "Oky";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
}
if (!file_exists("data/$from_id.json") && $tc == "private"){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$user["tedad"] = "0";
$user["number"] = "تایید نشده";
$user["tartm"] = "$tarkh";
$user["speed"] = "0";
$user["period"] = "0";
$user["serach"] = "5";
$user["adbash"] = "عادی";
$user["mkharid"] = "0";
$user["davati2"] = "Oky";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
//======================spam=====================//

//======================back=====================//
if($textmessage == 'بازگشت' && $tc == "private"){
if($step != "none"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$backer
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}
}

if($textmessage == '/start' && $tc == "private"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$starter
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
]);
}

//======================step none=====================//
if($step == "none" && $tc == "private"){
//======================join channel=====================//
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	  bot('sendMessage',[
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
//======================Zir Majmoee=====================//
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
bot('sendMessage',[
'chat_id'=>$davati4,
'text'=>"🎈 تبریک، $golggran سکه بابت زیرمجموعه جدید دریافت کردید.",
'parse_mode'=>"MARKDOWN",
]);
}
}
//---------------------------------------------------------------------------------
if($textmessage == "🆘"){
$user["step"] = "posh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👨‍💻 همکاران ما در خدمت شما هستن!
 
🔰 درصورت وجود نظر, ایده, گزارش مشکل, پیشنهاد, ایراد سوال, یا انتقاد میتوانید با ما در ارتباط باشید.
💬 لطفا پیام خود را به صورت فارسی و روان ارسال کنید.
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
	 ]);  
}
//---------------------------------------------------------------------------------
if($textmessage == "💰 خرید سکه"){
$user["step"] = "posh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
درگاه idpay به ربات متصل نشده است
",
'parse_mode'=>"HTML",
'reply_markup'=>$first,
	 ]);  
}
//---------------------------------------------------------------------------------
if($textmessage == "👁‍🗨 درخواست بازدید"){
$user["step"] = "view2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
	bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❓ تعداد سکه مورد نظر جهت انتقال را ارسال نمایید:

 موجودی شما: $invite سکه",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]);
}
//---------------------------------------------------------------------------------
if($textmessage == "🎁"){
	$user["step"] = "eiqntyg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
💠 گذینه مورد نظر خود را انتخاب کنید!",
'parse_mode'=>"HTML",
'reply_markup'=>$button_office
	]);
	}
//---------------------------------------------------------------------------------
if($textmessage == "👤 حساب کاربری"){
	 $user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$tartm = $user["tartm"];
$invite = $user["invite"];
$tedad = $user["tedad"];
$mkharid = $user["mkharid"];
$adbash = $user["adbash"];
	
bot('sendmessage', [
 'chat_id' =>$chat_id,
 'text' =>"
👤 شناسه شما: `$chat_id`
📅 تاریخ عضویت شما: $tartm
💰 موجودی شما: $invite سکه
👤 زیرمجموعه های شما: $tedad نفر

‏🧮 مجموع خرید های شما: $mkharid تومان
🔸 سطح کاربری: [ $adbash ]

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
⚖️ <strong>استفاده از ربات کوییک به منزله‌ی قبول شرایط و قوانین زیر است:</strong>

1- پستهای ارسالی شما برای افزایش بازدید، توسط هیچ فرد واقعی‌ای دیده نمیشود بنابراین مناسب کارهای <u>تبلیغاتی</u> نیست.

2- خرید و فروش موجودی ربات توسط کاربران <u>بلامانع</u> است اما شرکت کوییک هیچ گونه تعهدی برای پیگیری تخلفات مربوطه ندارد و فقط در صورت صلاح دید پیگیری انجام میشود.

3- درصورتی که قصد خرید سکه انبوه را دارید قبل از آن با پشتیبانی در ارتباط باشید. ( اگر منبع سکه های بدست آمده از طریق باگ ربات و یا خرید با کارت‌های هک شده باشد حساب آن کاربر بدون تذکر مسدود دائم خواهد شد)

4- دریافت لینک پرداخت از ربات و ارسال آن به سایر افراد جهت واریز وجه تخلف محسوب میشود و درصورت مشاهده حساب کاربر مسدود دائم خواهد شد.

<i>آخرین ویرایش قوانین: 15 آبان 1399</i>
",
'parse_mode'=>"HTML"
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
bot('sendMessage',[
'chat_id'=>$chat_id,
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
}else{
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
شما تاکنون بازدیدی ثبت نکرده اید.
",
'parse_mode'=>"HTML"
	 ]);  
}
}
//---------------------------------------------------------------------------------
if(in_array($chat_id,$admin) and $textmessage == "pnl"){
	$user["step"] = "panelg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" سلام مدیر گرامی به پنل خوش آمدید!",
'parse_mode'=>"HTML",
'reply_markup'=>$panel
]); 
}
//---------------------------------------------------------------------------------
if($textmessage == "❤️ ساخت لایک"){
	$user["step"] = "eiqntg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
if(in_array($chat_id,$admin) and $step == "panelg" && $tc == "private"){
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
	bot('sendMessage',[
	'chat_id' =>$user,
	'text' =>$textmessage,
	'parse_mode'=>"HTML",
	]);
			}
}
	bot('sendMessage',[
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
bot('sendMessage',[
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
 'phone_number'=>$nuuum,
 'first_name'=>"شماره کاربر!",
  
]); 
bot('sendMessage',[
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
	bot('sendMessage',[
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
		bot('sendMessage',[
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
		bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ کاربر از بلاک در اومد!",
'parse_mode'=>"MarkDown",

'reply_markup'=>$panel,
]); 
}else{
	$user["step"] = "rafnol";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendMessage',[
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
	bot('sendMessage',[
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
	bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حالا تعداد سکه؟",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}else{
$user["step"] = "charge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" تعداد $textmessage سکه دادمش!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$panel
]); 
}else{
$user["step"] = "chahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"√ تعداد $textmessage سکه کم شد.",
'parse_mode'=>"MarkDown",
'reply_markup'=>$panel
]);
}else{
$user["step"] = "chaahr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>" عدد ورودی اشتباه است!",
'parse_mode'=>"MarkDown",
'reply_markup'=>$bar,
]); 
}}

//--------------------------------------------------------------------------------------------------------------
if($textmessage != "بازگشت" && $textmessage != "/start" && $step == "eiqntyg"){
if($textmessage == "👤 زیرمجموعه گیری"){
	$user["step"] = "eiqntyg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	   $caption = "	   
⚡️ با سین ربات به راحتی بازدید بگیرید!

👁‍🗨 افزایش بازدید پستهای تلگرامی
❤️ ساخت و افزایش لایک تلگرام
💯 سریع، رایگان و بدون آفلاینی 
🔐 پرداخت مطمئن و 100% امن
🎊 همراه با کلی امکانات پیشرفته...

👇👇 همین حالا امتحان کنید 👇 👇

🔗 https://t.me/SeenRuBot?start=$chat_id";
       bot('SendPhoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('mem.png'),
 'caption'=>$caption,
 'parse_mode'=>"HTML",
 ]);
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "🗣 به ازای هر شخصی که برای اولین بار با لینک شما عضو ربات شود 100 سکه دریافت خواهید کرد.
👥 برای شروع بنر بالا را به دوستان و آشنایان خود ارسال کنید.",

        ]);
		
	}

	if($textmessage == "📥 ارسال اکانت"){
		$user["step"] = "eiqntyg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🎉 اکانت مجازی ارسال کنید؛ سکه بگیرید!

جهت ارسال اکانت پشتیبانی @QuickSup رفته و مراحل گفته شده را طی کنید.
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ پیام شما دریافت شد، لطفا تا زمان دریافت پاسخ صبور باشید.
",
'parse_mode'=>"HTML",

'reply_markup'=>$back,
]);
}
   elseif($rpto != "" && in_array($chat_id,$admin)){
	bot('sendMessage',[
	'chat_id' =>$rpto,
	'text' =>"📩 Support Message:

$textmessage",
	'parse_mode'=>"HTML",
	]);
			bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
if($textmessage == "حداکثر"){
	if ($step == "vinne3"){
$user["step"] = "vinne3";
$user["period"] = "0";
$user["speed"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$view0 = $user["view0"];
bot('sendMessage',[
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
	if($textmessage == "تنظیم سرعت"){
		if ($step == "vinne3"){
$user["step"] = "tanzim";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
	}
if($textmessage != "حداکثر" && $textmessage != "تنظیم سرعت" && $textmessage != "بازگشت" && $textmessage != "/start" && $step == "vinne3"){
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
bot('sendMessage',[
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
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
‼️متاسفانه مشکلی پیش آمده است موارد زیر را بررسی کنید

- شارژ ربات تمام شده است
- درگاه پرداخت به ربات وصل نشده

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
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠ پشت شما نمیتواند اهنگ باشد.",
'parse_mode'=>"HTML",
]);
}
}else{
		$user["step"] = "vinne3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ پست ارسالی شما باید فوروارد شده از یک کانال باشد.",
'parse_mode'=>"HTML",
]);
}
}
//---------------------
if($textmessage == "انصراف"){
	if ( $step == "tanzim"){
$user["step"] = "vinne3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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

if($textmessage != "انصراف" && $textmessage != "بازگشت" && $textmessage != "/start" && $step == "tanzim"){
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
bot('sendMessage',[
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
	bot('sendMessage',[
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
	bot('sendMessage',[
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
	bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️ توجه: عملیات انتقال سکه غیرقابل بازگشت است!

👈 درصورتی که درخواست انتقال $textmessage سکه مورد تاییدتان است، شناسه کاربری مقصد را ارسال کنید.",
'parse_mode'=>"HTML",
'reply_markup'=>$back
]); 
}else{
	$user["step"] = "entg";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تراکنش موفق ( ارسال )

‏👈 تعداد $ied سکه در تاریخ $tarkh ساعت $time به کاربر $textmessage انتقال داده شد.
#تراکنش_موفق",
'parse_mode'=>"HTML",
'reply_markup'=>$first
]); 
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
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
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.
",
'parse_mode'=>"HTML",
'reply_markup'=>$back,
]); 
}
}



unlink('error_log');
?>