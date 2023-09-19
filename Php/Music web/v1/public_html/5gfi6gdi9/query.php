<?php
// Querys
//---------------------------------------------------------------------------------
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
//---------------------------------------------------------------------------------
switch ($data){
//---------------------------------------------------------------------------------
case strpos($data, 'leoike') !== false:
    $num = str_replace('leoike', null, $data);
	$like_query = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($like_query == true) {
    @$list = file_get_contents("like/$num.user.txt");
    $id = $like_query["id"];
    $emoji = $like_query["emoji"];
    $message = $like_query["message"];
    $nums = $like_query["nums"];
            $bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$chatid&user_id=$fromid"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendQuery($query_id, "Error", 'false');
			}else if (strpos($list, "$fromid") !== false) {
        $answer = "You took your reaction back.";
        SendQuery($query_id, $answer, 'true');
		$newd = str_replace(",$fromid", null, $list);
        file_put_contents("like/$num.user.txt", "$newd");
        $newf = $nums - 1;
        $ky = json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "$emoji $newf", 'callback_data' => "leoike$num"],
                ],
            ]
        ]);
        $connect->query("UPDATE `like` SET `nums` = '$newf' WHERE `id` = '$num' LIMIT 1");
        EditMRP($chatid, $messageid, $ky);
    } else {
        $answer = "You $emoji this.";
        SendQuery($query_id, $answer, 'false');
		$myfile = fopen("like/$num.user.txt", "a") or die("Unable to open file!");
        fwrite($myfile, ",$fromid");
        fclose($myfile);
        $newd = $nums + 1;
        $ky = json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "$emoji $newd", 'callback_data' => "leoike$num"],
                ],
            ]
        ]);
        $connect->query("UPDATE `like` SET `nums` = '$newd' WHERE `id` = '$num' LIMIT 1");
        EditMRP($chatid, $messageid, $ky);
    }
			}else{
				SendQuery($query_id, "Error", 'true');
				exit();
			}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'like') !== false:
    $num = str_replace('like', null, $data);
	$like_query = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($like_query == true) {
    @$list = file_get_contents("like/$num.user.txt");
    $id = $like_query["id"];
    $emoji = $like_query["emoji"];
    $message = $like_query["message"];
    $nums = $like_query["nums"];
    $join = bot('getchatmember', [
        'chat_id' => "$chatid",
        'user_id' => $fromid
    ])->result->status;
			$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$chatid&user_id=$fromid"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendQuery($query_id, "Error", 'false');
				exit();
			}else if ($join == "member" && $join == "administrator" && $join == "creator" && $chatid == "") {
        $answer = "خطا: شما باید عضو کانال باشید
		Error: You must be a member of the channel";
        SendQuery($query_id, $answer, 'true');
    } else if (strpos($list, "$fromid") !== false) {
        $answer = "واکنشت را پس گرفتی
		You took your reaction back";
        SendQuery($query_id, $answer, 'true');
		$newd = str_replace(",$fromid", null, $list);
        file_put_contents("like/$num.user.txt", "$newd");
        $newnums = $nums - 1;
        $ky = json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "$emoji $newnums", 'callback_data' => "like$num"],
                ],
            ]
        ]);
        $connect->query("UPDATE `like` SET `nums` = '$newnums' WHERE `id` = '$num' LIMIT 1");
        EditMRP($chatid, $messageid, $ky);
    } else {
        $answer = "You $emoji this.";
        SendQuery($query_id, $answer, 'false');
		$myfile = fopen("like/$num.user.txt", "a") or die("Unable to open file!");
        fwrite($myfile, ",$fromid");
        fclose($myfile);
        $newnums = $nums + 1;
        $ky = json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "$emoji $newnums", 'callback_data' => "like$num"],
                ],
            ]
        ]);
        $connect->query("UPDATE `like` SET `nums` = '$newnums' WHERE `id` = '$num' LIMIT 1");
        EditMRP($chatid, $messageid, $ky);
    }
	}else{
				SendQuery($query_id, "Error", 'true');
				exit();
			}
break;
//---------------------------------------------------------------------------------
case strpos($data, '~') !== false:
    $info = explode('~', $data);
    $num = $info[0];
    $like = $info[1];
    $nr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($nr == true) {
    $id = $nr["id"];
    $emoji = $nr["emoji"];
    $channel = $nr["channel"];
    $message = $nr["message"];
    $nums = $nr["nums"];
			$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@$channel&user_id=$fromid"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendQuery($query_id, "Error", 'true');
				exit();
			}else{
			if ($like > 0) {
        $like = str_replace('+', null, $like);
        $new = $nums + $like;
    } else {
        $like = str_replace('?', null, $like);
        $new = $nums - $like;
    }
    $ky = json_encode([
        'inline_keyboard' => [
            [
                ['text' => "$emoji $new", 'callback_data' => "leoike$num"],
            ],
        ]
    ]);
    $connect->query("UPDATE `like` SET `nums` = '$new' WHERE `id` = '$num' LIMIT 1");
    EditMRP("@$channel", $message, $ky);
    SendQuery($query_id, languageQuery("✅ با موفقیت انجام شد!
- تعداد لایک جدید : $new","This language is not set"), 'true');
			}
	}else{
		SendQuery($query_id, languageQuery("لایک ساخته شده یافت نشد","No created likes found"), 'false');
exit();
	}
break;
//---------------------------------------------------------------------------------
case strpos($data, '|') !== false:
    $info = explode('|', $data);
    $num = $info[0];
    $like = $info[1];
    $nr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($nr == true) {
    $id = $nr["id"];
    $emoji = $nr["emoji"];
    $channel = $nr["channel"];
    $message = $nr["message"];
    $nums = $nr["nums"];
	$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@$channel&user_id=$fromid"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendQuery($query_id, "Error", 'true');
				exit();
			}else{
    if ($like > 0) {
        $like = str_replace('+', null, $like);
        $new = $nums + $like;
    } else {
        $like = str_replace('=', null, $like);
        $new = $nums - $like;
    }
    $ky = json_encode([
        'inline_keyboard' => [
            [
                ['text' => "$emoji $new", 'callback_data' => "like$num"],
            ],
        ]
    ]);
    $connect->query("UPDATE `like` SET `nums` = '$new' WHERE `id` = '$num' LIMIT 1");
    EditMRP("@$channel", $message, $ky);
    SendQuery($query_id, languageQuery("✅ با موفقیت انجام شد!
- تعداد لایک جدید : $new","This language is not set"), 'true');
}
	}else{
		SendQuery($query_id, languageQuery("لایک ساخته شده یافت نشد","No created likes found"), 'false');
exit();
	}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'infoL') !== false:
	$exdata = explode('-', $data);
    $num = $exdata[2];
    $nr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($nr == true) {
		SendQuery($query_id, "Wait..!", 'false');
		$noedata = $exdata[1];
		@$refresh = $exdata[3];
    $emoji = $nr["emoji"];
    $channel = $nr["channel"];
    $message = $nr["message"];
    $nums = $nr["nums"];
	$list = file_get_contents("like/$num.user.txt");
			$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=@$channel&user_id=$fromid"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
			$boolch_q = "ربات ادمین کانال نیست ❌";
			}else{
			$boolch_q = "ربات ادمین کانال است ✅";
			}
			$exinfo = explode(',', $list);
			$listc_sl = count($exinfo) - 1;
		if ($list != '0') {
			$texcount = "تعداد افراد لایک کننده:(Click)";
			$texcallback = "showusersL-$num";
		}else{
			$texcount = "تعداد افراد لایک کننده:";
			$texcallback = "null";
		}
		$numfakelike = $nums - $listc_sl;
			$ky = json_encode([
                    'inline_keyboard' => [
                        [["text" => "وضعیت کانال شما:", "callback_data" => "null"], ["text" => "$boolch_q", "callback_data" => "null"]],
                        [["text" => "آیدی لایک در ربات:", "callback_data" => "null"], ["text" => "$num", "callback_data" => "null"]],
                        [["text" => "ایموجی:", "callback_data" => "null"], ["text" => "$emoji", "callback_data" => "null"]],
                        [["text" => "آیدی کانال:", "callback_data" => "null"], ["text" => "@$channel", "callback_data" => "null"]],
						[["text" => "آیدی پست:", "callback_data" => "null"], ["text" => "$message", "callback_data" => "null"]],
						[["text" => "$texcount", "callback_data" => "$texcallback"], ["text" => "$listc_sl", "callback_data" => "null"]],
						[["text" => "تعداد لایک های فیک:", "callback_data" => "null"], ["text" => "$numfakelike", "callback_data" => "null"]],
						[["text" => "بروزرسانی", "callback_data" => "infoL-null-$num-refresh"]]
                    ]
                ]);
				if ($refresh != "refresh") {
			SendMessage($fromid, "https://t.me/$channel/$message", 'HTML', $ky);
			if ($noedata == "poes") {
			$ky = json_encode([
                    'inline_keyboard' => [
                        [["text" => "👇 اضافه کردن به تعداد لایک  👇", "callback_data" => "null"]],
                        [["text" => "+1", "callback_data" => "$num~+1"], ["text" => "+5", "callback_data" => "$num~+5"], ["text" => "+10", "callback_data" => "$num~+10"]],
                        [["text" => "+20", "callback_data" => "$num~+20"], ["text" => "+50", "callback_data" => "$num~+50"], ["text" => "+100", "callback_data" => "$num~+100"]],
                        [["text" => "+200", "callback_data" => "$num~+200"], ["text" => "+500", "callback_data" => "$num~+500"]],
                        [["text" => "+1000", "callback_data" => "$num~+1000"]],
                        [["text" => "👇🏻 کم کردن از تعداد لایک 👇🏻", "callback_data" => "null"]],
                        [["text" => "-1", "callback_data" => "$num~?1"], ["text" => "-5", "callback_data" => "$num~?5"], ["text" => "-10", "callback_data" => "$num~?10"]],
                        [["text" => "-20", "callback_data" => "$num~?20"], ["text" => "-50", "callback_data" => "$num~?50"], ["text" => "-100", "callback_data" => "$num~?100"]],
                        [["text" => "-200", "callback_data" => "$num~?200"], ["text" => "-500", "callback_data" => "$num~?500"]],
                        [["text" => "-1000", "callback_data" => "$num~?1000"]]
                    ]
                ]);
		}else if ($noedata == "pos"){
			$ky = json_encode([
                    'inline_keyboard' => [
                        [["text" => "👇 اضافه کردن به تعداد لایک  👇", "callback_data" => "null"]],
                        [["text" => "+1", "callback_data" => "$num|+1"], ["text" => "+5", "callback_data" => "$num|+5"], ["text" => "+10", "callback_data" => "$num|+10"]],
                        [["text" => "+20", "callback_data" => "$num|+20"], ["text" => "+50", "callback_data" => "$num|+50"], ["text" => "+100", "callback_data" => "$num|+100"]],
                        [["text" => "+200", "callback_data" => "$num|+200"], ["text" => "+500", "callback_data" => "$num|+500"]],
                        [["text" => "+1000", "callback_data" => "$num|+1000"]],
                        [["text" => "👇🏻 کم کردن از تعداد لایک 👇🏻", "callback_data" => "null"]],
                        [["text" => "-1", "callback_data" => "$num|=1"], ["text" => "-5", "callback_data" => "$num|=5"], ["text" => "-10", "callback_data" => "$num|=10"]],
                        [["text" => "-20", "callback_data" => "$num|=20"], ["text" => "-50", "callback_data" => "$num|=50"], ["text" => "-100", "callback_data" => "$num|=100"]],
                        [["text" => "-200", "callback_data" => "$num|=200"], ["text" => "-500", "callback_data" => "$num|=500"]],
                        [["text" => "-1000", "callback_data" => "$num|=1000"]]
                    ]
                ]);
		}
		EditMessage($fromid, $messageid, "⚜️ شناسه پست ارسالی: 
https://t.me/$channel/$message
👇🏻 برای افزایش و یا کسر از لایک از دکمه های زیر استفاده کنید 👇🏻", null, $ky);
				}else if ($refresh == "refresh"){
					EditMessage($fromid, $messageid, "https://t.me/$channel/$message", null, $ky);
				}
	}else{
		SendQuery($query_id, languageQuery("لایک ساخته شده یافت نشد","No created likes found"), 'false');
exit();
	}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'showusersL') !== false:
	$num = str_replace('showusersL-', null, $data);
    $nr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($nr == true) {
	$list = file_get_contents("like/$num.user.txt");
	$userlist = str_replace('0,', null, $list);
			SendMessage($fromid, "لیست کاربران:
$userlist", 'HTML', null);
	}else{
		SendQuery($query_id, languageQuery("لایک ساخته شده یافت نشد","No created likes found"), 'false');
exit();
	}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'shareL') !== false:
    $num = str_replace('shareL-', null, $data);
	$likef_q = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num' LIMIT 1"));
	if ($likef_q == true) {
    @$file_q = file_get_contents("like/$num.sf.txt");
    $id = $likef_q["id"];
    $emoji = $likef_q["emoji"];
    $message = $likef_q["message"];
    $nums = $likef_q["nums"];
    if (strpos($file_q, "$fromid") !== false) {
        $answer = "واکنشت را پس گرفتی
		You took your reaction back";
        SendQuery($query_id, $answer, 'true');
		$newd = str_replace(",$fromid", null, $file_q);
        file_put_contents("like/$num.sf.txt", "$newd");
        $newnums = $nums - 1;
        $ky = json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "$emoji $newnums", 'callback_data' => "shareL-$num"],
                ],
            ]
        ]);
        $connect->query("UPDATE `like` SET `nums` = '$newnums' WHERE `id` = '$num' LIMIT 1");
        EditMRPinline($inline_message_id, $ky);
    } else {
        $answer = "You $emoji this.";
        SendQuery($query_id, $answer, 'false');
		$myfile = fopen("like/$num.sf.txt", "a") or die("Unable to open file!");
        fwrite($myfile, ",$fromid");
        fclose($myfile);
        $newnums = $nums + 1;
        $ky = json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "$emoji $newnums", 'callback_data' => "shareL-$num"],
                ],
            ]
        ]);
        $connect->query("UPDATE `like` SET `nums` = '$newnums' WHERE `id` = '$num' LIMIT 1");
        EditMRPinline($inline_message_id, $ky);
    }
	}else{
				SendQuery($query_id, "Error", 'false');
				exit();
			}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'jock') !== false:
if ($fromid == $developer) {
    $jock_a = str_replace('jock-', null, $data);
	$jock_b = explode('-', $jock_a);
    $jock_acc_rad = $jock_b[0];
    $jock_from_id = $jock_b[1];
     if ($jock_acc_rad == "Rad") {
        SendQuery($query_id, languageQuery("رد شد","This language is not set"), 'true');
		SendMessage($jock_from_id, "جوک شما توسط مدیریت رد شد", 'HTML', null);
		DeleteMessage($fromid, $messageid);
    } else if ($jock_acc_rad == "Acc"){
	$sJocks = json_decode(file_get_contents("../service/jocks.json"),true);
		$numjocks = $sJocks["num"];
		$newnum_j = $numjocks + 1;
		$sJocks["num"] = $newnum_j;
		$sJocks["$newnum_j"] = $textquery;
		$outjson = json_encode($sJocks,true);
	file_put_contents("../service/jocks.json",$outjson);
	SendQuery($query_id, languageQuery("تایید شد","This language is not set"), 'true');
		SendMessage($jock_from_id, "جوک شما توسط مدیریت تایید شد و به سرویس اضافه شد.", 'HTML', null);
		DeleteMessage($fromid, $messageid);
    }else{
	SendMessage($developer, "Error data Jock", 'HTML', null);
	exit();
	}
}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'BanUser') !== false:
if ($fromid == $developer) {
    $ban_from = str_replace('BanUser-', null, $data);
	SendQuery($query_id, languageQuery("کاربر بن شد","This language is not set"), 'true');
	SendMessage($ban_from, "شما توسط مدیریت به دلیل جوک خیر اخلاقی از ربات بن شدید", 'HTML', json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
	DeleteMessage($fromid, $messageid);
	$connect->query("UPDATE `user` SET `step` = 'Banned' WHERE id = '$ban_from' LIMIT 1");
	exit();
}
break;
//---------------------------------------------------------------------------------
case strpos($data, 'RaddedBan') !== false:
if ($fromid == $developer) {
	$ban_spam = str_replace('RaddedBan-', null, $data);
	SendQuery($query_id, languageQuery("تایید شد","Done"), 'false');
	DeleteMessage($fromid, $messageid);
				SendMessage($ban_spam, "شما توسط مدیریت آن بن شدید", 'HTML', json_encode(['keyboard' => [
        [['text' => "🔐 ضداسپم/کنترل کانال"], ['text' => "❤️ ساخت لایک/رأی"]],
        [['text' => "👤 حساب کاربری"]],
        [['text' => "💰 انتقال سکه"], ['text' => "💰 خرید سکه"]],
        [['text' => "🆘"], ['text' => "🎁"], ['text' => "⚖️"]]
    ]]));
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$ban_spam' LIMIT 1");
				exit();
}
break;
//---------------------------------------------------------------------------------
	case 'languageEnglish':
	if ($languageQuery != "English") {
	$answer = "Done ✅";
	EditMessage($fromid, $messageid, $answer, null, null);
    $connect->query("UPDATE `user` SET `language` = 'English' WHERE id = '$fromid' LIMIT 1");
	}else{
	$answer = "Your language is English";
	EditMessage($fromid, $messageid, $answer, null, null);
	exit();
	}
	break;
	case 'languagePersian':
	if ($languageQuery != "Persian") {
	$answer = "انجام شد ✅";
	EditMessage($fromid, $messageid, $answer, null, null);
    $connect->query("UPDATE `user` SET `language` = 'Persian' WHERE id = '$fromid' LIMIT 1");
	}else{
	$answer = "زبان شما فارسی است!";
	EditMessage($fromid, $messageid, $answer, null, null);
	exit();
	}
	break;
}