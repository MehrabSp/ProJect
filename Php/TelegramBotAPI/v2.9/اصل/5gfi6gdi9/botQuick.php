<?php
ob_start();
//--------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$channel_gh = $update->channel_post;
if (!isset($channel_gh)) {
    $telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], ['lower' => '91.108.4.0', 'upper' => '91.108.7.255'],];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok = false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
        $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
        $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
        if ($ip_dec >= $lower_dec && $ip_dec <= $upper_dec) $ok = true;
    }
    if (!$ok) die("<center>
<p>دسترسی شما به این صفحه توسط سازنده محدود شده</p>
</center>");
}
/*//--------------------------------------------------------------------
if (!is_dir('data')) {
    mkdir('data');
}
//--------------------------------------------------------------------
if (!is_dir('pari')) {
    mkdir('pari');
}
//--------------------------------------------------------------------
if (!is_dir('like')) {
    mkdir('like');
}
//--------------------------------------------------------------------*/
$token = "1650473371:AAFVLI7jhvrUUd1i76CY6NcdckspL-b7bKo";
define('API_KEY', $token);
//--------------------------------------------------------------------
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
//--------------------------------------------------------------------
function SendMessage($from_id, $answer, $parsmode, $keyboard)
{
    bot('sendMessage', [
        'chat_id' => $from_id,
        'text' => $answer,
        'parse_mode' => $parsmode,
        'reply_markup' => $keyboard
    ]);
}
//--------------------------------------------------------------------
function SendMessageLike($from_id, $answer, $parsmode, $keyboard)
{
    $post = bot('sendMessage', [
        'chat_id' => $from_id,
        'text' => $answer,
        'parse_mode' => $parsmode,
        'reply_markup' => $keyboard
    ]);
	return $post;
}
//--------------------------------------------------------------------
function EditMessage($chat_id, $message_id, $textmessage, $parsmode, $keyboard)
{
 bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$textmessage,
'parse_mode'=>$parsmode,
'reply_markup'=>$keyboard,
]);    
}
//--------------------------------------------------------------------
function DeleteMessage($chat_id, $message_id)
{
 bot('deletemessage', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
}
//--------------------------------------------------------------------
function SendSticker($channel, $sticker_id, $keyboard)
{
    $post = bot('SendSticker', [
        'chat_id' => $channel,
        'sticker' => $sticker_id,
        'reply_markup' => $keyboard
    ]);
	return $post;
}
//--------------------------------------------------------------------
function SendVoice($channel, $voice_id, $caption, $parsmode, $keyboard)
{
    $post = bot('SendVoice', [
        'chat_id' => $channel,
        'voice' => $voice_id,
		'caption' => $caption,
        'parse_mode' => $parsmode,
        'reply_markup' => $keyboard
    ]);
	return $post;
}
//--------------------------------------------------------------------
function SendDocument($channel, $file_id, $caption, $parsmode, $keyboard)
{
    $post = bot('SendDocument', [
        'chat_id' => $channel,
        'document' => $file_id,
		'caption' => $caption,
        'parse_mode' => $parsmode,
        'reply_markup' => $keyboard
    ]);
	return $post;
}
//--------------------------------------------------------------------
function SendAudio($channel, $music_id, $caption, $parsmode, $keyboard)
{
    $post = bot('SendAudio', [
        'chat_id' => $channel,
        'audio' => $music_id,
		'caption' => $caption,
        'parse_mode' => $parsmode,
        'reply_markup' => $keyboard
    ]);
	return $post;
}
//--------------------------------------------------------------------
function SendPhoto($channel, $photo_id, $caption, $parsmode, $keyboard)
{
    $post = bot('SendPhoto', [
        'chat_id' => $channel,
        'photo' => $photo_id,
		'caption' => $caption,
        'parse_mode' => $parsmode,
        'reply_markup' => $keyboard
    ]);
	return $post;
}
//--------------------------------------------------------------------
function SendQuery($query, $answer, $parsmde)
{
    bot('AnswerCallbackQuery', [
        'callback_query_id' => $query,
        'text' => $answer,
        'show_alert' => $parsmde
    ]);
}
//--------------------------------------------------------------------
function EditMRP($chatid, $messageid, $keyboard)
{
    bot('EditMessageReplyMarkup', [
        'chat_id' => $chatid,
        'message_id' => $messageid,
        'reply_markup' => $keyboard
    ]);
}
//--------------------------------------------------------------------
function EditMRPinline($imi, $keyboard)
{
    bot('EditMessageReplyMarkup', [
        'inline_message_id' => $imi,
        'reply_markup' => $keyboard
    ]);
}
//--------------------------------------------------------------------
function language($answerPersian, $answerEnglish)
{
    $GLOBAL = $GLOBALS['language'];
  switch ($GLOBAL){
	  case 'Persian':
	  $languageAnswer = $answerPersian;
	  break;
	  case 'English':
	  $languageAnswer = $answerEnglish;
	  break;
	  default:
	  $languageAnswer = "Your language does not exist";
  }
  return $languageAnswer;
}
//--------------------------------------------------------------------
function languageQuery($answerPersian2, $answerEnglish2)
{
    $GLOBALQuery = $GLOBALS['languageQuery'];
  switch ($GLOBALQuery){
	  case 'Persian':
	  $languageAnswerQ = $answerPersian2;
	  break;
	  case 'English':
	  $languageAnswerQ = $answerEnglish2;
	  break;
	  default:
	  $languageAnswerQ = "Your language does not exist";
  }
  return $languageAnswerQ;
}
//--------------------------------------------------------------------
$message = $update->message;
$callback_query = $update->callback_query;
$inline_query = $update->inline_query;
$developer = '1549584936';
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$tc = $message->chat->type;
$fromid = $callback_query->from->id;
//--------------------------------------------------------------------
	$turnBot = json_decode(file_get_contents("data/turnBot.json"), true);
	$turnall = $turnBot["all"];
	$turnGroup = $turnBot["group"];
//--------------------------------------------------------------------
	$turnif = ($from_id != null)?"$from_id":"$fromid";
	if ($turnall == 'off' && $turnif != $developer){
		exit();
	}
//---------------------------------------------------------------------------------
if ($turnGroup == "on" && ($tc == "supergroup" || $tc == "group")){
	bot('LeaveChat', [
'chat_id'=>$chat_id,
]);
exit();
}
//--------------------------------------------------------------------
$connect = mysqli_connect('localhost', 'clevere1_Clever', 'LEX&r)}x{@GP', 'clevere1_Clever');
//--------------------------------------------------------------------
$update_s = ($inline_query != null) ? "inline_query" : null;
$update_s = ($callback_query != null) ? "callback_query" : "$update_s";
$update_s = ($channel_gh != null) ? "channel_post" : "$update_s";
$update_s = ($message != null) ? "message" : "$update_s";
//--------------------------------------------------------------------
	$s_times = json_decode(file_get_contents("https://clever.eliyahost.ir/service/service.php?type=time&json=true"), true);
	$time = $s_times["time"];
	$tarikh = $s_times["tarikh"];
	$timer = time();
//--------------------------------------------------------------------
switch ($update_s) {
//--------------------------------------------------------------------
	case 'callback_query':
    $chatid = $callback_query->message->chat->id;
    $query_id = $callback_query->id;
    $data = $callback_query->data;
    $messageid = $callback_query->message->message_id;
	$textquery = $callback_query->message->text;
	$inline_message_id = $callback_query->inline_message_id;
	@$query = json_decode(file_get_contents("data/$fromid.json"), true);
	$userQuery = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$fromid' LIMIT 1"));
	$languageQuery = $userQuery["language"];

	if ($query["TedadPmQ"] != null) {
		$newTpm = $query["TedadPmQ"] + 1;
		$query["TedadPmQ"] = $newTpm;
		$outjson = json_encode($query,true);
		file_put_contents("data/$fromid.json",$outjson);
		}else{
		$query["TedadPmQ"] = "1";
		$outjson = json_encode($query,true);
		file_put_contents("data/$fromid.json",$outjson);
		}
		if ($query["spamQ"] == null) {
        $query["spamQ"] = "$timer";
        $outjson = json_encode($query, true);
        file_put_contents("data/$fromid.json", $outjson);
    }else{
    $a1 = $timer - $query["spamQ"];
    if ($a1 <= 2) {
        exit();
    }
	}
    if ($a1 >= 2) {
        $query["spamQ"] = "$timer";
        $outjson = json_encode($query, true);
        file_put_contents("data/$fromid.json", $outjson);
    }

	include 'query.php';

	break;
//--------------------------------------------------------------------
	case 'message':
    $message_id = $message->message_id;
    $textmessage = $message->text;
    $firstname = $message->from->first_name;
    $username = $message->from->username;
    //--------------------------------------------------------------------
    $photo = $message->photo;
    $file_id = $message->document->file_id;
    @$photo_id = $photo[count($photo) - 1]->file_id;
    $voice_id = $message->voice->file_id;
    $sticker_id = $message->sticker->file_id;
    $music_id = $message->audio->file_id;
    $caption = $message->caption;
    //--------------------------------------------------------------------
    $truechannel = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@Tm_Quick&user_id=" . $from_id));
    $tch = $truechannel->result->status;
    //--------------------------------------------------------------------
	@$userdata = json_decode(file_get_contents("data/$from_id.json"), true);
    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$from_id' LIMIT 1"));
    $id = $user["id"];
    $step = $user["step"];
    $gold = $user["gold"];
    $tedad = $user["tedad"];
    $sHistory = $user["sHistory"];
	$gHistory = $user["gHistory"];
	$language = $user["language"];
    $buygold = $user["buygold"];
    $inviter = $user["inviter"];
    $invited = $user["invited"];
    $givegold = $user["givegold"];
    $channel = $user["channel"];
	$stepLike = $user["stepLike"];
	$asChannel = $user["asChannel"];
    $mEmoji = $user["emoji"];
	$aVip = $user["aVip"];
	//--------------------------------------------------------------------
	if($asChannel != null){
	$dateCH = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `channels` WHERE id = '$asChannel' LIMIT 1"));
    $idCH = $dateCH["id"];
    $ownerCH = $dateCH["owner"];
    $AntispamCH = $dateCH["Antispam"];
    $timeASCH = $dateCH["timeAS"];
    $GallCH = $dateCH["Gall"];
	$GtimeAllCH = $dateCH["GtimeAll"];
	$GgifCH = $dateCH["Ggif"];
    $GnumberCH = $dateCH["Gnumber"];
    $GstickersCH = $dateCH["Gstickers"];
	$GvideoCH = $dateCH["Gvideo"];
    $GphotoCH = $dateCH["Gphoto"];
    $GforwardCH = $dateCH["Gforward"];
    $GtextCH = $dateCH["Gtext"];
	$GvideoMCH = $dateCH["GvideoM"];
    $GdocumentCH = $dateCH["Gdocument"];
	$GreplayCH = $dateCH["Greplay"];
	}
//---------------------------------------------------------------------------------
if ($tc == "private") {
	//--------------------------------------------------------------------
	if ($step == "Banned"){
		exit();
	}
//--------------------------------------------------------------------
	switch ($language){
		case 'Persian':
//---------------------------------------------------------------------------------
    $backer = '👈🏻 به منوی اصلی بازگشتید!';

    $starter = 'سلام، خوش آمدید🌹

🌺 در کنار شما هستیم، تا به صورت تخصصی برای شما خدمت کنیم.';
//---------------------------------------------------------------------------------
    $button_panel = json_encode(['keyboard' => [
        [['text' => "خاموش/روشن کل ربات"]],
		[['text' => "پاکسازی گروه ها"]],
		[['text' => "بن کردن کاربر"],['text' => "آن بن کردن کاربر"]],
		[['text' => "پاکسازی کانال ها"],['text' => "پاکسازی تمام لایک ها"]],
		[['text' => "ریست کل دیتا های کاربران"]],
		[['text' => "افزایش گلد کاربر"],['text' => "کسر گلد کاربر"]],
        [['text' => "انصراف"]]
    ], 'resize_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_first = json_encode(['keyboard' => [
        [['text' => "🔐 ضداسپم/کنترل کانال"], ['text' => "❤️ ساخت لایک/رأی"]],
        [['text' => "👤 حساب کاربری"]],
        [['text' => "💰 انتقال سکه"], ['text' => "💰 خرید سکه"]],
        [['text' => "🆘"], ['text' => "🎁"], ['text' => "⚖️"]]
    ], 'resize_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_back = json_encode(['keyboard' => [
        [['text' => "انصراف"]]
    ], 'resize_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_dkchnnel = json_encode(['keyboard' => [
        [['text' => "$channel"]],
        [['text' => "ساخت لایک [اشتراک گذاری]"],['text' => "انصراف"]]
    ], 'resize_keyboard' => false]);
	//---------------------------------------------------------------------------------
    $button_emoji = json_encode(['keyboard' => [
        [['text' => "$mEmoji"]],
        [['text' => "انصراف"]]
    ], 'resize_keyboard' => false]);
	//---------------------------------------------------------------------------------
    $button_emojish = json_encode(['keyboard' => [
        [['text' => "$mEmoji"]],
        [['text' => "ساخت لایک [اصلی]"],['text' => "انصراف"]]
    ], 'resize_keyboard' => false]);
	//---------------------------------------------------------------------------------
    $button_asChannel = json_encode(['keyboard' => [
        [['text' => "ثبت کانال"]],
        [['text' => "انصراف"]]
    ], 'resize_keyboard' => false]);
	//---------------------------------------------------------------------------------
    $button_maschannel = json_encode(['keyboard' => [
	    [['text' => "قفل کانال"]],
        [['text' => "🔐 ضداسپم"], ['text' => "افزودن ادمین"]],
        [['text' => "حذف ادمین"],['text' => "حذف کانال"]],
		[['text' => "انصراف"]]
    ], 'resize_keyboard' => true]);
	//---------------------------------------------------------------------------------
    $button_ghofleCh = json_encode(['keyboard' => [
        [['text' => "قفل کامل کانال"], ['text' => "قفل زمان دار"]],
		[['text' => "قفل گیف"], ['text' => "قفل ارسال شماره"]],
		[['text' => "قفل استیکر"], ['text' => "قفل فیلم"]],
		[['text' => "قفل عکس"], ['text' => "قفل فوروارد"]],
		[['text' => "قفل متن"], ['text' => "قفل ویدیو مسیج"]],
        [['text' => "قفل فایل"]],
		[['text' => "انصراف"]]
    ], 'resize_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_buttnfal = json_encode(['keyboard' => [
        [['text' => "✅"], ['text' => "❌"]],
        [['text' => "انصراف"]]
    ], 'resize_keyboard' => false]);
    //---------------------------------------------------------------------------------
    $button_office = json_encode(['keyboard' => [
        [['text' => "👤 زیرمجموعه گیری"], ['text' => "Vip"]],
        [['text' => "انصراف"]]
    ], 'resize_keyboard' => true, 'one_time_keyboard' => true]);
	break;
	case 'English':
	//---------------------------------------------------------------------------------
    $backer = 'Main menu';

    $starter = 'Hi, Welcome to Quick Bot

We are at your service with Quick Bot to serve you professionally.
Change language: /language

Select a section to continue:';
//---------------------------------------------------------------------------------
    $button_panel = json_encode(['keyboard' => [
        [['text' => "Turn the robot on/off"]],
        [['text' => "Turn the inline buttons on/off"], ['text' => "Turn the buttons on/off"]],
        [['text' => "Cancel"]],
    ], 'resize_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_first = json_encode(['keyboard' => [
        [['text' => "🔐 Anti Spam Channel"], ['text' => "❤️ Create Like"]],
        [['text' => "👤 Info"]],
        [['text' => "💰 Gold transfer"], ['text' => "💰 Buy Gold"]],
        [['text' => "🆘"], ['text' => "🎁"], ['text' => "⚖️"]],
    ], 'resize_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_back = json_encode(['keyboard' => [
        [['text' => "Cancel"]],
    ], 'resize_keyboard' => true, 'one_time_keyboard' => true]);
    //---------------------------------------------------------------------------------
    $button_dkchnnel = json_encode(['keyboard' => [
        [['text' => "$channel"]],
        [['text' => "Cancel"]],
    ], 'resize_keyboard' => false]);
    //---------------------------------------------------------------------------------
    $button_buttnfal = json_encode(['keyboard' => [
        [['text' => "✅"], ['text' => "❌"]],
        [['text' => "Cancel"]],
    ], 'resize_keyboard' => false]);
    //---------------------------------------------------------------------------------
    $button_office = json_encode(['keyboard' => [
        [['text' => "👤 Subcategory"], ['text' => "Vip"]],
        [['text' => "Cancel"]],
    ], 'resize_keyboard' => true]);
	break;
	}
	//---------------------------------------------------------------------------------
    if (strpos($textmessage, "/start") !== false) {
        $numss = str_replace("/start ", "", $textmessage);
        $uz = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$numss' LIMIT 1"));
        $pid = $uz["id"];
        if ($id != true && $from_id != $numss) {
            if ($pid == true) {
                $connect->query("INSERT INTO `user` (`id`, `step`,`gold`,`tedad`,`sHistory`,`gHistory`,`buygold`,`inviter`,`invited`,`language`) VALUES ('$from_id', 'none','0','0','$tarikh','$time','0','$numss','faal','Persian')");
            } else {
                $connect->query("INSERT INTO `user` (`id`, `step`,`gold`,`tedad`,`sHistory`,`gHistory`,`buygold`,`language`) VALUES ('$from_id', 'none','0','0','$tarikh','$time','0','Persian')");
            }
        }
    }

    if ($id != true) {
        $connect->query("INSERT INTO `user` (`id`, `step`,`gold`,`tedad`,`sHistory`,`gHistory`,`buygold`,`language`) VALUES ('$from_id', 'none','0','0','$tarikh','$time','0','Persian')");
    }
    //---------------------------------------------------------------------------------
    if (isset($textmessage)) {
		if ($userdata["TedadPm"] != null) {
		$newTpm = $userdata["TedadPm"] + 1;
		$userdata["TedadPm"] = $newTpm;
		$outjson = json_encode($userdata,true);
		file_put_contents("data/$from_id.json",$outjson);
		}else{
		$userdata["TedadPm"] = "1";
		$outjson = json_encode($userdata,true);
		file_put_contents("data/$from_id.json",$outjson);
		}
		if ($userdata["PmSpam"] != null) {
		$newpmT = $userdata["PmSpam"] + 1;
		$userdata["PmSpam"] = $newpmT;
		$outjson = json_encode($userdata,true);
		file_put_contents("data/$from_id.json",$outjson);
		}else{
		$userdata["PmSpam"] = "1";
		$outjson = json_encode($userdata,true);
		file_put_contents("data/$from_id.json",$outjson);
		}
		if ($userdata["PmSpam"] != null) {
		$a1 = $timer - $userdata["spam"];
		if ($a1 >= 2){
		$userdata["PmSpam"] = "0";
		$outjson = json_encode($userdata,true);
		file_put_contents("data/$from_id.json",$outjson);
		}
		}
		if($userdata["PmSpam"] >= "30"){
			$ky = json_encode([
            'inline_keyboard' => [
				[["text" => "ازاد کردن", "callback_data" => "RaddedBan-$from_id"]]
            ],
        ]);
        SendMessage($developer, "⚠️ هشدار ! حجم پیام بیش از حد مجاز

👈 کاربر: <a href ='tg://user?id=$from_id'>$from_id</a>
		تعداد پیام های ارسالی: {$userdata['PmSpam']}
		تعداد کل پیام های ارسالی کاربر به ربات: {$userdata['TedadPm']}

کاربر از ربات محروم شد!
", 'HTML', $ky);
	SendMessage($from_id, "⚠️ شما به دلیل حجم پیام بیش از حد مجاز از ربات محروم شدید!
برای ازاد سازی میتوانید با پشتیبانی در ارتباط باشید: @MehraB_S
", 'HTML', json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
	$connect->query("UPDATE `user` SET `step` = 'Banned' WHERE id = '$from_id' LIMIT 1");
		}
		if ($userdata["spam"] != null) {
			$a1 = $timer - $userdata["spam"];
            if ($a1 <= 0.5) {
                exit();
            }
        } else {
            $userdata["spam"] = "$timer";
            $outjson = json_encode($userdata, true);
            file_put_contents("data/$from_id.json", $outjson);
        }
        if ($a1 >= 0.5) {
            $userdata["spam"] = "$timer";
            $outjson = json_encode($userdata, true);
            file_put_contents("data/$from_id.json", $outjson);
        }
    }
    //---------------------------------------------------------------------------------
    if ($tch != 'member' && $tch != 'creator' && $tch != 'administrator') {
		$ky = json_encode([
            'inline_keyboard' => [
                [["text" => "🌐 Tm Quick", "url" => "https://t.me/TM_Quick"]],
            ],
        ]);
		if($language != null){
        SendMessage($from_id, language("⚠️  جهت ادامه کار نیاز است در کانال ما عضو شوید.

👈 بعد از عضویت مجددا /start را ارسال نمایید.","You must be a member of our channel to continue.

 After joining, restart the robot /start."), 'HTML', $ky);
        exit();
		}else{
        SendMessage($from_id, "⚠️  جهت ادامه کار نیاز است در کانال ما عضو شوید.

👈 بعد از عضویت مجددا /start را ارسال نمایید.", 'HTML', $ky);
		exit();
		}
    }
    //---------------------------------------------------------------------------------
    if ($textmessage == "/start" || strpos($textmessage, "/start") !== false) {
		if($language != null){
        SendMessage($from_id, language("سلام، خوش آمدید🌹

🌺 در کنار شما هستیم، تا به صورت تخصصی برای شما خدمت کنیم.","Hi, Welcome to Quick Bot

We are at your service with Quick Bot to serve you professionally.
Change language: /language

Select a section to continue:"), 'HTML', $button_first);
        $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
        exit();
		}else{
			SendMessage($from_id, "سلام، خوش آمدید🌹

🌺 در کنار شما هستیم، تا به صورت تخصصی برای شما خدمت کنیم.
تغییر زبان: /language", 'HTML', json_encode(['keyboard' => [
        [['text' => "🔐 ضداسپم/کنترل کانال"], ['text' => "❤️ ساخت لایک/رأی"]],
        [['text' => "👤 حساب کاربری"]],
        [['text' => "💰 انتقال سکه"], ['text' => "💰 خرید سکه"]],
        [['text' => "🆘"], ['text' => "🎁"], ['text' => "⚖️"]]
    ], 'resize_keyboard' => true]));
        $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
        exit();
		}
    }
	//---------------------------------------------------------------------------------
	if($language == null){
		SendMessage($from_id, "ربات اپدیت شد لطفا یک بار دیگه امتحان کنید باتشکر", 'HTML', null);
        exit();
	}
	//---------------------------------------------------------------------------------
    if ($textmessage == "انصراف" || $textmessage == "Cancel") {
        SendMessage($from_id, $backer, 'HTML', $button_first);
        $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
        exit();
    }
	//---------------------------------------------------------------------------------
    if ($textmessage == "/likefhelp" && ($step == "shareLike" || $step == "plikePos")) {
        SendMessage($from_id, "این قسمت برا خلاف قسمت اصلی (لایک) دارای محدودیت هایی است از جمله:
		- شما نمیتوانید به صورت دستی لایک ها را افزایش دهید
		- شما نمیتوانید لایک, عکس, فیلم و ... بسازید. فقط میتوانید متن (لایک) بسازید
		- شما نمیتوانید برای کاربری که پست را لایک میکند جوین اجباری در نظر بگرید!
		- بعد ساخت پست لایک شما نمیتوانید پست را ادیت کنید!
		باتشکر از انتخاب شما.", 'HTML', null);
        exit();
    }
//---------------------------------------------------------------------------------
	if ($step == "none"){

    include 'none.php';

	}else{

	include 'step.php';

	}
//---------------------------------------------------------------------------------
}
	break;
//--------------------------------------------------------------------
	case 'inline_query':
	include 'inline.php';
	break;
//--------------------------------------------------------------------
	case 'channel_post':
	$channel_username = $channel_gh->chat->username;
	$dateCH2 = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `channels` WHERE id = '@$channel_username' LIMIT 1"));
//--------------------------------------------------------------------
	if ($dateCH2 == true){
	include 'asChannel.php';
	}

	break;
//--------------------------------------------------------------------
}

?>