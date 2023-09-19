<?php
//===========================
flush();
ob_start();
//===========================
include("jdf.php");
$token = "1298751037:AAH0Df0s33uwxdRyT5EJeoJ1N-0eBuismUc";
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
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG,
    ]);
}

function sendphoto($chat_id, $photo, $caption){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption,
	]);
	}
	
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
$file_id = $update->message->document->file_id;
$photo = $update->message->photo;
$musicid = $update->message->audio->file_id;
$voice_id = $update->message->voice->file_id;
$sticker_id = $update->message->sticker->file_id;
$video_id = $update->message->video->file_id;
$music_id = $update->message->audio->file_id;
$caption = $update->message->caption;
$time = jdate("H:i");
$tarkh = jdate("Y/m/d");
$rpto = $update->message->reply_to_message->forward_from->id;
//===========================
$first = json_encode(['keyboard'=>[
[['text'=>"☎️ پشتیبانی"]],
],'resize_keyboard'=>true]);

$back = json_encode(['keyboard'=>[
[['text'=>"🔙"]],
],'resize_keyboard'=>true]);
//===========================
if(strpos($textmessage,"/start") !== false  && $textmessage !="/start"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام، خوش آمدید🌹
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
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}}
if (!file_exists("data/$from_id.json")) {
        $myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
		 $user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    }
//===========================
if($textmessage == "/start" or $textmessage == "/Start"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام، خوش آمدید🌹
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$first,
]);
}
//===========================
	if($textmessage == "🔙"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
👈🏻 به منوی اصلی بازگشتید.
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$first,
 ]);
 }
 
 elseif($time = "20:50"){
  $captiooon = "
🔥صــبــحــتــون بــخــیــر!

📒- با اخبار رسمی و اختصاصی تمامی بازی ها و گیمینگ ما همراه باشید! 😉

 ‌ ‌ ‌ ‌🔺🔻 join 🔻🔺

 🆔--> @MrGameNewsW
";
       bot('sendphoto',[
 'chat_id'=>"@tm_quick",
 'photo'=>new CURLFile('mooom.jpg'),
 'caption'=>$captiooon,
 'parse_mode'=>"html",
 ]);
}
 //-------------
 if($time = "9:00:00"){
  $captiooon = "
🔥صــبــحــتــون بــخــیــر!

📒- با اخبار رسمی و اختصاصی تمامی بازی ها و گیمینگ ما همراه باشید! 😉

 ‌ ‌ ‌ ‌🔺🔻 join 🔻🔺

 🆔--> @MrGameNewsW
";
       bot('sendphoto',[
 'chat_id'=>"@tm_quick",
 'photo'=>new CURLFile('moom.jpg'),
 'caption'=>$captiooon,
 'parse_mode'=>"html",
 ]);
  exit();
}
//-------------------
if($time = "00:00:00"){
  $captioon = "
‌ ‌ ‌ ‌هرگاه حس کردی که ناامیدی و ترس بر ‌وجودت غلبه کرده با تمام قدرت و ‌ایمان  ‌ ‌کامل با خودت تکرار کن من در احاطه  ‌قدرت الهی هستم.

من در پناه عشق الهی هستم

شب بخیر!

🆔--> @MrGameNewsW
";
       bot('sendphoto',[
 'chat_id'=>"@tm_quick",
 'photo'=>new CURLFile('mom.jpg'),
 'caption'=>$captioon,
 'parse_mode'=>"html",
 ]);
  exit();
}
//===========================
if($textmessage == "☎️ پشتیبانی"){
$user["step"] = "posh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👮🏻 همکاران ما در خدمت شما هستن !
 
🔘 در صورت وجود نظر , ایده , گزارش مشکل , پیشنهاد , ایراد سوال , یا انتقاد میتوانید با ما در ارتباط باشید .
💬 لطفا پیام خود را به صورت فارسی و روان ارسال کنید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
	 ]);  
}
if($step == "posh" && $textmessage != "🔙"){
bot('ForwardMessage', [
'chat_id' => $admin,
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
'parse_mode'=>"MARKDOWN",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
}

   elseif($rpto != "" && $chat_id == $admin){
     bot('sendMessage',[
 'chat_id'=>$rpto,
 'text'=>"
📩 Support:

$textmessage
",
'parse_mode'=>"HTML",
	 ]);
	      bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"پیام شما به فرد ارسال شد✔️",
 'parse_mode'=>"HTML",
	 ]);
    }