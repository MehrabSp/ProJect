<?php
// steps
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
switch ($step) {
case 'panelAdmin':
            switch ($textmessage){
				case 'Turn the robot on/off':
				case 'خاموش/روشن کل ربات':
				if ($turnall == "on"){
			$turnjson["all"] = "off";
			$turnjson["group"] = "$turnGroup";
            $outjson = json_encode($turnjson, true);
            file_put_contents("data/turnBot.json", $outjson);
				SendMessage($from_id, "Robot Off Shod !", 'HTML', null);
				}else{
			$turnjson["all"] = "on";
			$turnjson["group"] = "$turnGroup";
            $outjson = json_encode($turnjson, true);
            file_put_contents("data/turnBot.json", $outjson);
				SendMessage($from_id, "Robot on Shod !", 'HTML', null);
				}
				break;
				case 'پاکسازی گروه ها':
				if ($turnGroup == "on"){
			$turnjson["all"] = "$turnall";
			$turnjson["group"] = "off";
            $outjson = json_encode($turnjson, true);
            file_put_contents("data/turnBot.json", $outjson);
				SendMessage($from_id, "Cleaner Gap Off Shod !", 'HTML', null);
				}else{
			$turnjson["all"] = "$turnall";
			$turnjson["group"] = "on";
            $outjson = json_encode($turnjson, true);
            file_put_contents("data/turnBot.json", $outjson);
				SendMessage($from_id, "Cleaner Gap on Shod !", 'HTML', null);
				}
				break;
				case 'بن کردن کاربر':
				SendMessage($from_id, "ایدی عددی کاربر را ارسال کنید", 'HTML', $button_back);
				$connect->query("UPDATE `user` SET `step` = 'stepBan' WHERE id = '$from_id' LIMIT 1");
				break;
				case 'آن بن کردن کاربر':
				SendMessage($from_id, "ایدی عددی کاربر را ارسال کنید", 'HTML', $button_back);
				$connect->query("UPDATE `user` SET `step` = 'stepUnBan' WHERE id = '$from_id' LIMIT 1");
				break;
				case 'پاکسازی کانال ها':
				$tedadch = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `channels`"));
				if ($tedadch != "0"){
				SendMessage($from_id, "در حال پاکسازی", 'HTML', json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
				for ($x = 1; $x <= $tedadch; $x++) {
				$forchannel = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `channels`"));
				$idfch = $forchannel["0"]["0"];
				$ownerfch = $forchannel["0"]["1"];
				$bev = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$idfch&user_id=$ownerfch"), true);
				$xez = $bev['result']['status'];
				if ($xez != "administrator" && $xez != "creator") {
					$connect->query("DELETE FROM `channels` WHERE id = '$idfch' LIMIT 1");
					SendMessage($ownerfch, "کانال شما با آیدی: $idfch
					به دلیل ادمین نبودن ربات از دیتا ( بخش ضداسپم ) حذف شد
					شما میتوانید دوباره از طریق دکمه '🔐 ضداسپم/کنترل کانال' کانال خود را ثبت کنید. باتشکر", 'HTML', null);
					SendMessage($from_id, "کانال: $idfch
					به دلیل ادمین نبودن ربات از دیتا ( بخش ضداسپم ) حذف شد", 'HTML', null);
				}else{
					SendMessage($from_id, "کانال: $idfch مدیر: $ownerfch
					حذف نشد", 'HTML', null);
				}
				if ($x >= $tedadch) {
						SendMessage($from_id, "عملیات حذف تمام شد!", 'HTML', $button_panel);
				}
				}
				}else{
				SendMessage($from_id, "چنلی ثبت نشده", 'HTML', null);
				}
				break;
				case 'پاکسازی تمام لایک ها':
				$tedadlike = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `like`"));
				if ($tedadlike != "0"){
				SendMessage($from_id, "در حال پاکسازی", 'HTML', json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
				for ($x = 1; $x <= $tedadlike; $x++) {
					@$x_c = file_get_contents("like/$x.user.txt");
					$connect->query("DELETE FROM `like` WHERE id = '$x' LIMIT 1");
					if ($x_c != null) {
						unlink("like/$x.user.txt");
					}else{
						unlink("like/$x.sf.txt");
					}
					SendMessage($from_id, "لایک شماره $x حذف شد", 'HTML', null);
					if ($x >= $tedadlike) {
						foreach (glob("like/*.json") as $filename) {
						unlink ("$filename");
						}
						file_put_contents("ted.txt", "0");
						SendMessage($from_id, "عملیات حذف تمام شد!", 'HTML', $button_panel);
					}
				}
				}else{
				SendMessage($from_id, "لایکی ساخته نشده", 'HTML', null);
				}
				break;
				case 'ریست کل دیتا های کاربران':
				$tedaduser = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `user`"));
				if ($tedaduser != "0"){
				SendMessage($from_id, "در حال پاکسازی", 'HTML', json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
				for ($x = 1; $x <= $tedaduser; $x++) {
					$foruser = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `user`"));
					$iduser = $foruser["0"]["0"];
					SendMessage($from_id, "اطلاعات کاربر $iduser حذف شد", 'HTML', null);
					if ($x >= $tedaduser) {
						SendMessage($from_id, "عملیات پاکسازی تمام شد !", 'HTML', $button_panel);
					}
					$connect->query("DELETE FROM `user` WHERE id = '$iduser' LIMIT 1");
				}
				}else{
				SendMessage($from_id, "کاربری در ربات وجود ندارد", 'HTML', null);
				}
				break;
				case 'افزایش گلد کاربر':
					SendMessage($from_id, "ایدی عددی کاربر مورد نظر را ارسال کنید", 'HTML', $button_back);
					$connect->query("UPDATE `user` SET `step` = 'givegolduser' WHERE id = '$from_id' LIMIT 1");
				break;
				case 'کسر گلد کاربر':
					SendMessage($from_id, "ایدی عددی کاربر مورد نظر را ارسال کنید", 'HTML', $button_back);
					$connect->query("UPDATE `user` SET `step` = 'backgolduser' WHERE id = '$from_id' LIMIT 1");
				break;
			}
            break;
			//---------------------------------------------------------------------------------
        case 'givegolduser':
		if (preg_match('/^\d+$/', $textmessage)) {
		$usertext = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$textmessage' LIMIT 1"));
                $idtextm = $usertext["id"];
                if ($idtextm == true) {
				SendMessage($from_id, "مقدار گلد را وارد کنید", 'HTML', $button_back);
				$connect->query("UPDATE `user` SET `step` = 'tggold$textmessage' WHERE id = '$from_id' LIMIT 1");
				}else{
					SendMessage($from_id, "کاربر مورد نظر یافت نشد", 'HTML', null);
				}
		}else{
			SendMessage($from_id, "لطفا عدد وارد کنید", 'HTML', null);
		}
            break;
			//---------------------------------------------------------------------------------
        case 'backgolduser':
		if (preg_match('/^\d+$/', $textmessage)) {
		$usertext = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$textmessage' LIMIT 1"));
                $idtextm = $usertext["id"];
                if ($idtextm == true) {
				SendMessage($from_id, "مقدار گلد را وارد کنید", 'HTML', $button_back);
				$connect->query("UPDATE `user` SET `step` = 'tbgold$textmessage' WHERE id = '$from_id' LIMIT 1");
				}else{
					SendMessage($from_id, "کاربر مورد نظر یافت نشد", 'HTML', null);
				}
		}else{
			SendMessage($from_id, "لطفا عدد وارد کنید", 'HTML', null);
		}
            break;
			//---------------------------------------------------------------------------------
        case strpos($step, 'tggold') !== false:
		$stepuser = str_replace('tggold', null, $step);
		if (preg_match('/^\d+$/', $textmessage)) {
			if ($textmessage >= 10 && $textmessage <= 9223372036854775807){
			$userstept = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$stepuser' LIMIT 1"));
			$goldstep = $userstept["gold"];
			settype($textmessage, "int");
				if ($goldstep + $textmessage <= 9223372036854775807) {
				$newgoldstep = $goldstep + $textmessage;
				SendMessage($from_id, "مقدار $textmessage گلد برای کاربر $stepuser داده شد", 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `user` SET `gold` = '$newgoldstep' WHERE id = '$stepuser' LIMIT 1");
				}else{
					SendMessage($from_id, "خطا! گلدی که به دست کاربر میرسد نباید بیشتر از 9223372036854775807 شود
					سکه های کاربر: $goldstep", 'HTML', null);
				}
			}else{
				SendMessage($from_id, "حداقل 10 گلد و حداکثر 9223372036854775807 گلد قابل افزایش است", 'HTML', null);
			}
		}else{
			SendMessage($from_id, "لطفا عدد وارد کنید", 'HTML', null);
		}
            break;
			//---------------------------------------------------------------------------------
        case strpos($step, 'tbgold') !== false:
		$stepuser = str_replace('tbgold', null, $step);
		if (preg_match('/^\d+$/', $textmessage)) {
			if ($textmessage >= 10 && $textmessage <= 9223372036854775807){
				$userstept = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$stepuser' LIMIT 1"));
			$goldstep = $userstept["gold"];
			settype($textmessage, "int");
				if ($goldstep - $textmessage >= 10) {
				$newgoldstep = $goldstep - $textmessage;
				SendMessage($from_id, "مقدار $textmessage گلد برای کاربر $stepuser کسر شد", 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `user` SET `gold` = '$newgoldstep' WHERE id = '$stepuser' LIMIT 1");
				}else{
					SendMessage($from_id, "خطا! باید حداقل 10 سکه برای کاربر باقی بماند
					سکه های کاربر: $goldstep", 'HTML', null);
				}
			}else{
				SendMessage($from_id, "حداقل 10 گلد و حداکثر 9223372036854775807 گلد قابل کسر است", 'HTML', null);
			}
		}else{
			SendMessage($from_id, "لطفا عدد وارد کنید", 'HTML', null);
		}
            break;
			//---------------------------------------------------------------------------------
        case 'stepBan':
		$userBan = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$textmessage' LIMIT 1"));
		$idBan = $userBan["id"];
		$stepBan = $userBan["step"];
            if ($textmessage && $idBan == true && $stepBan != "Banned"){
				SendMessage($from_id, language("بن شد","This language is not set"), 'HTML', $button_first);
				SendMessage($textmessage, "شما توسط مدیریت بن شدید", 'HTML', json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `user` SET `step` = 'Banned' WHERE id = '$textmessage' LIMIT 1");
			}else{
				SendMessage($from_id, language("لطفا یک متن ارسال کنید\nایدی عددی کاربر پیدا نشد\nطرف بن بود","This language is not set"), 'HTML', null);
			}
            break;
			//---------------------------------------------------------------------------------
        case 'stepUnBan':
		$userBan = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$textmessage' LIMIT 1"));
		$idBan = $userBan["id"];
		$stepBan = $userBan["step"];
            if ($textmessage && $idBan == true && $stepBan == "Banned"){
				SendMessage($from_id, language("ازاد شد","This language is not set"), 'HTML', $button_first);
				SendMessage($textmessage, "شما توسط مدیریت آن بن شدید", 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$textmessage' LIMIT 1");
			}else{
				SendMessage($from_id, language("لطفا یک متن ارسال کنید\nایدی عددی کاربر پیدا نشد\nطرف بن نیست","This language is not set"), 'HTML', null);
			}
            break;
			//---------------------------------------------------------------------------------
        case 'idasChannel':
            $bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$textmessage&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
			$dateCHas = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `channels` WHERE id = '$textmessage' LIMIT 1"));
			$idCHas = $dateCHas["id"];
            if (strlen($textmessage) <= 32 && strpos($textmessage, "@") != false && strpos($textmessage, "-") == false && $xz != "administrator" && $xz != "creator") {
                SendMessage($from_id, language("⚠️ خطا، موارد زیر را بررسی کنید و دوباره تلاش کنید:

- ربات ادمین کانال نیست!

- شما ادمین کانال نیستید!

- ایدی و یا شناسه عددی کانال اشتباه است!","Error"), 'HTML', $button_dkchnnel);
            } else {
				if ($idCHas != true){
                SendMessage($from_id, language("کانال شما با موفقیت در ربات ثبت شد. برای مدیریت کانال یک قسمت را انتخاب کنید","This language is not set"), 'HTML', $button_maschannel);
                $connect->query("UPDATE `user` SET `step` = 'manageCh' , `asChannel` = '$textmessage' WHERE `id` = '$from_id' LIMIT 1");
				$connect->query("INSERT INTO `channels` (`id`, `owner`) VALUES ('$textmessage', '$from_id')");
				}else{
					SendMessage($from_id, language("خطا! این کانال قبلا در ربات توسط یک کاربر دیگه ثبت شده.","This language is not set"), 'HTML', $button_first);
                $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");
				}
			}
            break;
			//---------------------------------------------------------------------------------
        case 'manageCh':
            switch ($textmessage){
				case '🔐 ضداسپم':
				break;
				case 'افزودن ادمین':
				SendMessage($from_id, language("آیدی یا آیدی عددی فرد مورد نظر را ارسال کنید.","tanazim nashode"), 'HTML', $button_back);
				$connect->query("UPDATE `user` SET `step` = 'addmin' WHERE id = '$from_id' LIMIT 1");
				break;
				case 'حذف ادمین':
				SendMessage($from_id, language("آیدی یا آیدی عددی فرد مورد نظر را ارسال کنید.","tanazim nashode"), 'HTML', $button_back);
				$connect->query("UPDATE `user` SET `step` = 'deladmin' WHERE id = '$from_id' LIMIT 1");
				break;
				case 'قفل کانال':
				SendMessage($from_id, language("مدیریت قفل ها","manage lock channel"), 'HTML', $button_ghofleCh);
				$connect->query("UPDATE `user` SET `step` = 'ghofleCh' WHERE id = '$from_id' LIMIT 1");
				break;
				case 'حذف کانال':
				SendMessage($from_id, language("آیا مطمعن هستید ؟ با حذف کانال میتوانید کانال جدیدی در ربات ثبت کنید","This language is not set"), 'HTML', $button_buttnfal);
				$connect->query("UPDATE `user` SET `step` = 'dltchannel' WHERE id = '$from_id' LIMIT 1");
				break;
			}
            break;
			//---------------------------------------------------------------------------------
        case 'ghofleCh':
            switch ($textmessage){
				case 'قفل کامل کانال':
				$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GallCH == "✅"){
				SendMessage($from_id, language("قفل کانال خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gall` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل کانال روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gall` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل زمان دار':
				SendMessage($from_id, language("بزودی","Soon..."), 'HTML', null);
				break;
				case 'قفل گیف':
				$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GgifCH == "✅"){
				SendMessage($from_id, language("قفل گیف خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Ggif` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل گیف روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Ggif` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل ارسال شماره':
$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GnumberCH == "✅"){
				SendMessage($from_id, language("قفل ارسال شماره خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gnumber` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل ارسال شماره روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gnumber` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل استیکر':
	$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GstickersCH == "✅"){
				SendMessage($from_id, language("قفل استیکر خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gstickers` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل استیکر روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gstickers` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل فیلم':
$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GvideoCH == "✅"){
				SendMessage($from_id, language("قفل فیلم خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gvideo` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل فیلم روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gvideo` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل عکس':
	$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GphotoCH == "✅"){
				SendMessage($from_id, language("قفل عکس خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gphoto` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل عکس روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gphoto` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل فوروارد':
$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GforwardCH == "✅"){
				SendMessage($from_id, language("قفل فوروارد خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gforward` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل فوروارد روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gforward` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل متن':
	$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GtextCH == "✅"){
				SendMessage($from_id, language("قفل متن خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gtext` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل متن روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gtext` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل ویدیو مسیج':
$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GvideoMCH == "✅"){
				SendMessage($from_id, language("قفل ویدیو مسیج خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `GvideoM` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل ویدیو مسیج روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `GvideoM` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل فایل':
	$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GdocumentCH == "✅"){
				SendMessage($from_id, language("قفل فایل خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gdocument` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل فایل روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Gdocument` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
				case 'قفل ریپلای':
	$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else if ($GreplayCH == "✅"){
				SendMessage($from_id, language("قفل ریپلای خاموش شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Greplay` = '❌' WHERE id = '$asChannel' LIMIT 1");
			}else{
				SendMessage($from_id, language("قفل ریپلای روشن شد","test"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$connect->query("UPDATE `channels` SET `Greplay` = '✅' WHERE id = '$asChannel' LIMIT 1");
			}
				break;
			}
            break;
			//---------------------------------------------------------------------------------
        case 'sendjock':
            if ($textmessage){
				SendMessage($from_id, language("باتشکر از حمایت شما. متن بعد از تایید مدیر داخل سرویس ثبت و به شما به صورت رندوم سکه هدیه داده میشود","This language is not set"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
				$ky = json_encode([
                            'inline_keyboard' => [
                                [["text" => "تایید جوک", "callback_data" => "jock-Acc-$from_id"]],
                                [["text" => "بن کردن کاربر", "callback_data" => "BanUser-$from_id"],["text" => "رد جوک", "callback_data" => "jock-Rad-$from_id"]]
                            ]
                        ]);
                        SendMessage($developer, "$textmessage", 'HTML', $ky);
			}else{
			SendMessage($from_id, language("لطفا یک متن ارسال کنید","This language is not set"), 'HTML', $button_back);
			}
            break;
			//---------------------------------------------------------------------------------
        case 'dltchannel':
            if ($textmessage == "✅"){
				SendMessage($from_id, language("کانال شما حذف شد. میتوانید مجدد کانال جدیدی در ربات ثبت کنید","This language is not set"), 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' , `asChannel` = '' WHERE id = '$from_id' LIMIT 1");
				$connect->query("DELETE FROM `channels` WHERE id = '$asChannel' LIMIT 1");
			}else if ($textmessage == "❌"){
			SendMessage($from_id, language("لغو شد","This language is not set"), 'HTML', $button_first);
			$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
			}
            break;
			//---------------------------------------------------------------------------------
        case 'addmin':
		$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else{
            if ($textmessage){
	$pcm = bot('promoteChatMember',[
    'chat_id'=>$asChannel,
    'user_id'=>$textmessage,
    'can_change_info'=>true,
    'can_post_messages'=>true,
    'can_edit_messages'=>true,
    'can_delete_messages'=>true,
    'can_invite_users'=>true,
    'can_restrict_members'=>true,
    'can_pin_messages'=>false,
    'can_promote_members'=>true,
    ]);
	if($pcm->ok == 'true'){
		SendMessage($from_id, language("کاربر مورد نظر ادمین شد","Tanzim Nashode"), 'HTML', $button_maschannel);
		$connect->query("UPDATE `user` SET `step` = 'manageCh' WHERE id = '$from_id' LIMIT 1");
	}else{
		SendMessage($from_id, language("خطا! {$pcm->description}","Tanzim Nashode"), 'HTML', $button_maschannel);
		$connect->query("UPDATE `user` SET `step` = 'manageCh' WHERE id = '$from_id' LIMIT 1");
	}
				
			}
			}
            break;
			//---------------------------------------------------------------------------------
        case 'deladmin':
		$bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$asChannel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
				SendMessage($from_id, language("خطا ربات ادمین کانال نیست","error"), 'HTML', null);
			}else{
            if ($textmessage){
	$pcm = bot('promoteChatMember',[
    'chat_id'=>$asChannel,
    'user_id'=>$textmessage,
    'can_change_info'=>false,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>false,
    'can_invite_users'=>false,
    'can_restrict_members'=>false,
    'can_pin_messages'=>false,
    'can_promote_members'=>false,
    ]);
	if($pcm->ok == 'true'){
		SendMessage($from_id, language("کاربر مورد نظر عزل شد","Tanzim Nashode"), 'HTML', $button_maschannel);
		$connect->query("UPDATE `user` SET `step` = 'manageCh' WHERE id = '$from_id' LIMIT 1");
	}else{
		SendMessage($from_id, language("خطا! {$pcm->description}","Tanzim Nashode"), 'HTML', $button_maschannel);
		$connect->query("UPDATE `user` SET `step` = 'manageCh' WHERE id = '$from_id' LIMIT 1");
	}
				
			}
			}
            break;
        //---------------------------------------------------------------------------------
        case 'entg':
            if (preg_match('/^\d+$/', $textmessage)) {
                if ($gold - $textmessage >= 100) {
                    if ($textmessage >= 30) {
                        settype($textmessage, "int");
                        SendMessage($from_id, language("⚠️ توجه: عملیات انتقال سکه غیرقابل انصراف است!

👈 درصورتی که درخواست انتقال $textmessage سکه مورد تاییدتان است، شناسه کاربری مقصد را ارسال کنید.","This language is not set"), 'HTML', $button_back);
                        $connect->query("UPDATE `user` SET `step` = 'hmtd' , `givegold` = '$textmessage' WHERE `id` = '$from_id' LIMIT 1");
                    } else {
                        SendMessage($from_id, language("❌ حداقل 30 سکه قابل انتقال است.","This language is not set"), 'HTML', $button_back);
                    }
                } else {
                    SendMessage($from_id, language("❌ این انتقال قابل انجام نیست! برای انتقال نیاز است که 100 سکه داخل حساب خودتان باقی بماند.","This language is not set"), 'HTML', $button_back);
                }
            } else {
                SendMessage($from_id, language("❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.","This language is not set"), 'HTML', $button_back);
            }
            break;
            //---------------------------------------------------------------------------------
        case 'hmtd':
            if (preg_match('/^\d+$/', $textmessage)) {
                $us = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE id = '$textmessage' LIMIT 1"));
                $prd = $us["id"];
                if ($prd == true) {
                    if ($textmessage != $from_id) {
                        $asw = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id` = '$from_id' LIMIT 1"));
                        $newgold = $asw["gold"] - $asw["givegold"];
                        $txw = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id` = '$textmessage' LIMIT 1"));
                        $tewgold = $txw["gold"] + $asw["givegold"];
                        SendMessage($from_id, language("✅ تراکنش موفق ( ارسال )

‏👈 تعداد $givegold سکه در تاریخ $tarikh ساعت $time به کاربر $textmessage انتقال داده شد.
#تراکنش_موفق","This language is not set"), 'HTML', $button_first);
                        SendMessage($textmessage, language("✅ تراکنش موفق ( دریافت )

👈 تعداد $givegold سکه در تاریخ $tarikh ساعت $time از کاربر $from_id دریافت شد.
#تراکنش_موفق","This language is not set"), 'HTML', null);
                        $connect->query("UPDATE `user` SET `step` = 'none' , `gold` = '$newgold' WHERE `id` = '$from_id' LIMIT 1");
                        $connect->query("UPDATE `user` SET `gold` = '$tewgold' WHERE `id` = '$textmessage' LIMIT 1");
                    } else {
                        SendMessage($from_id, language("❌ ارسال سکه به خودتان امکان پذیر نیست!","This language is not set"), 'HTML', $button_back);
                    }
                } else {
                    SendMessage($from_id, language("❌ کاربر مورد نظر در ربات یافت نشد!","This language is not set"), 'HTML', $button_back);
                }
            } else {
                SendMessage($from_id, language("❗️ عدد ورودی اشتباه است، مجددا ارسال نمایید.","This language is not set"), 'HTML', $button_back);
            }
            break;
            //---------------------------------------------------------------------------------
        case 'ziri':
		switch ($textmessage){
			case '👤 Subcategory':
            case '👤 زیرمجموعه گیری':
                $caption = "🔗 https://t.me/QuickRuBot?start=$from_id";
                bot('SendPhoto', [
                    'chat_id' => $from_id,
                    'photo' => new CURLFile('../image/Quick.jpg'),
                    'caption' => $caption,
                    'parse_mode' => "HTML",
                ]);
                SendMessage($from_id, language("لینک بالا","This language is not set"), 'HTML', $button_first);
                $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
            break;

            case 'Vip':
                SendMessage($from_id, language("@MehraB_S","This language is not set"), 'HTML', $button_first);
                $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
            break;
		}
            break;
            //---------------------------------------------------------------------------------
        case 'like':
		if ($textmessage != "ساخت لایک [اشتراک گذاری]") {
            $bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$textmessage&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if (strlen($textmessage) <= 32 && strpos($textmessage, "@") == false && strpos($textmessage, "-") == false && $xz != "administrator" && $xz != "creator") {
                SendMessage($from_id, language("⚠️ خطا، موارد زیر را بررسی کنید و دوباره تلاش کنید:

- ربات ادمین کانال نیست!

- شما ادمین کانال نیستید!

- ایدی و یا شناسه عددی کانال اشتباه است!","This language is not set"), 'HTML', $button_dkchnnel);
            } else {
                SendMessage($from_id, language("👈 ایموجی دلخواه خود را ارسال کنید!","This language is not set"), 'HTML', $button_emoji);
                $connect->query("UPDATE `user` SET `step` = 'poss' , `channel` = '$textmessage' WHERE `id` = '$from_id' LIMIT 1");
            }
		}else{
			SendMessage($from_id, language("این قسمت دارای محدودیت هایی است /likefhelp
				
- ایموجی دلخواه خود را ارسال کنید","This language is not set"), 'HTML', $button_emoji);
                $connect->query("UPDATE `user` SET `step` = 'shareLike' , `stepLike` = 'true' WHERE `id` = '$from_id' LIMIT 1");
		}
            break;
            //---------------------------------------------------------------------------------
        case 'poss':
            if (mb_strlen($textmessage) <= 2) {
                SendMessage($from_id, language("❓تنظیم عضویت اجباری برای کسی که پست شما را لایک میکند!

💠 یکی از وارد زیر را انتخاب کنید:","This language is not set"), 'HTML', $button_buttnfal);
                $connect->query("UPDATE `user` SET `step` = 'poees' , `emoji` = '$textmessage' WHERE `id` = '$from_id' LIMIT 1");
            } else {
                SendMessage($from_id, language("⚠️ خطا, لطفا یک ایموجی ارسال کنید!","This language is not set"), 'HTML', $button_back);
            }
            break;
            //---------------------------------------------------------------------------------
        case 'poees':
            if ($textmessage == "✅") {
                SendMessage($from_id, language("✅  تایید شد!
- پست خود را ارسال کنید ( پست شما میتواند عکس-گیف-استیکر-فایل-موزیک-فیلم-ویس و یا متن باشد )

💢 در صورت اشتباه تایپی و یا هر چیز دیگر شما میتوانید پستی که در کانال توسط ربات قرار داده شده را ادیت کنید!","This language is not set"), 'HTML', $button_back);
                $connect->query("UPDATE `user` SET `step` = 'pos' WHERE `id` = '$from_id' LIMIT 1");
            }
            if ($textmessage == "❌") {
                SendMessage($from_id, language("✅  تایید شد!
- پست خود را ارسال کنید ( پست شما میتواند عکس-گیف-استیکر-فایل-موزیک-فیلم-ویس و یا متن باشد )

💢 در صورت اشتباه تایپی و یا هر چیز دیگر شما میتوانید پستی که در کانال توسط ربات قرار داده شده را ادیت کنید!","This language is not set"), 'HTML', $button_back);
                $connect->query("UPDATE `user` SET `step` = 'poes' WHERE `id` = '$from_id' LIMIT 1");
            }
            break;
            //---------------------------------------------------------------------------------
        case 'poes':
            $bev = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$channel&user_id=$from_id"), true);
            $xez = $bev['result']['status'];
            if ($xez != "administrator" && $xez != "creator") {
                SendMessage($from_id, language("⚠️ خطا, ربات داخل کانال ادمین نمیباشد!","This language is not set"), 'HTML', $button_first);
                $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
            } else {
                $getted = file_get_contents("ted.txt");
                $num = $getted + 1;
                file_put_contents("ted.txt", $num);
				$ky = json_encode([
                            'inline_keyboard' => [
                                [["text" => "$mEmoji", "callback_data" => "leoike$num"]],
                            ]
                    ]);
                if ($sticker_id != null) {
					$post = SendSticker($channel, $sticker_id, $ky);
                } else if ($voice_id != null) {
					$post = SendVoice($channel, $voice_id, $caption, 'HTML', $ky);
                } else if ($file_id != null) {
					$post = SendDocument($channel, $file_id, $caption, 'HTML', $ky);
                } else if ($music_id != null) {
					$post = SendAudio($channel, $music_id, $caption, 'HTML', $ky);
                } else if ($photo_id != null) {
						$post = SendPhoto($channel, $photo_id, $caption, 'HTML', $ky);
                } else if ($textmessage != null) {
					$post = SendMessageLike($channel, $textmessage, 'HTML', $ky);
                } else {
                    SendMessage($from_id, language("⚠️ خطا, ربات این نوع فایل را پشتیبانی نمیکند!","This language is not set"), 'HTML', $button_back);
                }
                $post_id = $post->result->message_id;
                $post_user = $post->result->chat->username;
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
                        [["text" => "-1000", "callback_data" => "$num~?1000"]],
						[["text" => "مشاهده کاربرانی که این پست را لایک کردن", "callback_data" => "infoL-poes-$num"]]
                    ]
                ]);
                SendMessage($from_id, language("✅ پست شما با موفقیت ارسال شد!
⚜️ شناسه پست ارسالی: 
http://t.me/$post_user/$post_id
👇🏻 برای افزایش و یا کسر از لایک از دکمه های زیر استفاده کنید 👇🏻","This language is not set"), 'HTML', $ky);
 SendMessage($from_id, language("10 گلد از حساب شما کسر شد","This language is not set"), 'HTML', null);
                SendMessage($from_id, $backer, 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
                $connect->query("INSERT INTO `like` (`id`, `emoji`,`channel`,`message`,`nums`) VALUES ('$num', '$mEmoji','$post_user','$post_id','0')");
				$lnewgold = $gold - 10;
				$connect->query("UPDATE `user` SET `gold` = '$lnewgold' WHERE id = '$from_id' LIMIT 1");
				file_put_contents("like/$num.user.txt", '0');
            }
            break;
            //---------------------------------------------------------------------------------
        case 'pos':
            $bv = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$channel&user_id=$from_id"), true);
            $xz = $bv['result']['status'];
            if ($xz != "administrator" && $xz != "creator") {
                SendMessage($from_id, language("⚠️ خطا, ربات داخل کانال ادمین نمیباشد!","This language is not set"), 'HTML', $button_first);
                $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
            } else {
                $getted = file_get_contents("ted.txt");
                $num = $getted + 1;
                file_put_contents("ted.txt", $num);
                $ky = json_encode([
                            'inline_keyboard' => [
                                [["text" => "$mEmoji", "callback_data" => "like$num"]],
                            ]
                    ]);
                if ($sticker_id != null) {
					$post = SendSticker($channel, $sticker_id, $ky);
                } else if ($voice_id != null) {
					$post = SendVoice($channel, $voice_id, $caption, 'HTML', $ky);
                } else if ($file_id != null) {
					$post = SendDocument($channel, $file_id, $caption, 'HTML', $ky);
                } else if ($music_id != null) {
					$post = SendAudio($channel, $music_id, $caption, 'HTML', $ky);
                } else if ($photo_id != null) {
					$post = SendPhoto($channel, $photo_id, $caption, 'HTML', $ky);
                } else if ($textmessage != null) {
					$post = SendMessageLike($channel, $textmessage, 'HTML', $ky);
                } else {
                    SendMessage($from_id, language("⚠️ خطا, ربات این نوع فایل را پشتیبانی نمیکند!","This language is not set"), 'HTML', $button_back);
                }
                $post_id = $post->result->message_id;
                $post_user = $post->result->chat->username;
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
                        [["text" => "-1000", "callback_data" => "$num|=1000"]],
						[["text" => "مشاهده کاربرانی که این پست را لایک کردن", "callback_data" => "infoL-pos-$num"]]
                    ]
                ]);
                SendMessage($from_id, language("✅ پست شما با موفقیت ارسال شد!
⚜️ شناسه پست ارسالی: 
http://t.me/$post_user/$post_id
👇🏻 برای افزایش و یا کسر از لایک از دکمه های زیر استفاده کنید 👇🏻","This language is not set"), 'HTML', $ky);
 SendMessage($from_id, language("10 گلد از حساب شما کسر شد","This language is not set"), 'HTML', null);
                SendMessage($from_id, $backer, 'HTML', $button_first);
				$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
                $connect->query("INSERT INTO `like` (`id`, `emoji`,`channel`,`message`,`nums`) VALUES ('$num', '$mEmoji','$post_user','$post_id','0')");
				$lnewgold = $gold - 10;
				$connect->query("UPDATE `user` SET `gold` = '$lnewgold' WHERE id = '$from_id' LIMIT 1");
				file_put_contents("like/$num.user.txt", '0');
            }
            break;
			//---------------------------------------------------------------------------------
        case 'shareLike':
		if ($textmessage != "ساخت لایک [اصلی]") {
            if (mb_strlen($textmessage) <= 2) {
                SendMessage($from_id, language("✅  تایید شد!
❓ متن خود را ارسال کنید

💢 شما نمیتوانید عکس-گیف-استیکر-فایل-موزیک-فیلم-ویس ارسال کنید !","This language is not set"), 'HTML', $button_back);
                $connect->query("UPDATE `user` SET `step` = 'plikePos' , `emoji` = '$textmessage' WHERE `id` = '$from_id' LIMIT 1");
            } else {
                SendMessage($from_id, language("⚠️ خطا, لطفا یک ایموجی ارسال کنید!","This language is not set"), 'HTML', $button_back);
            }
		}else{
			SendMessage($from_id, language("👈 <a href ='https://t.me/QuickRuBot?startchannel=start&admin=invite_users'>ربات را ادمین کانال خود کنید</a> و آیدی کانال خود را به صورت کامل بفرستید.

📣 اگر کانال شما خصوصی است میتوانید شناسه عددی آن را ارسال کنید (توصیه نمیشود).

 برای مدیریت کامل لایک لازم است ربات ادمین کانال باشد تا شما بتوانید لایک خود را افزایش و یا از آن کسر کنید.
@Tm_Quick
-1001429953692","Let's create a message with emoji buttons. Submit your channel ID first.
@Tm_Quick
-1001429953692"), 'HTML', $button_dkchnnel);
                $connect->query("UPDATE `user` SET `step` = 'like' , `stepLike` = '' WHERE id = '$from_id' LIMIT 1");
		}
            break;
			//---------------------------------------------------------------------------------
        case 'plikePos':
            if ($textmessage) {
				$getted = file_get_contents("ted.txt");
                $num = $getted + 1;
                file_put_contents("ted.txt", $num);
			$rand_q = rand(40,960);
			$rand_q2 = rand(11,2222);
			$jambandi = $rand_q.$num.$rand_q2;
			$textshare["text"] = $textmessage;
			$textshare["num"] = $num;
			$outjson = json_encode($textshare,true);
			file_put_contents("like/$jambandi.share.json",$outjson);
			file_put_contents("like/$num.sf.txt", '0');
				$ky = json_encode([
                    'inline_keyboard' => [
                        [["text" => "$mEmoji", "callback_data" => "shareL-$num"]],
                        [["text" => "Publish", "switch_inline_query" => "#Like-$jambandi"]]
                    ]
                ]);
				SendMessage($from_id, language('👍 پست ایجاد شد. اکنون از دکمه "انتشار" برای ارسال آن به دوستان خود استفاده کنید.','👍 Post created. Now use the ‘Publish’ button to send it to your friends.'), 'HTML', $button_first);
                SendMessage($from_id, $textmessage, 'HTML', $ky);
                $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");
				$connect->query("INSERT INTO `like` (`id`, `emoji`,`message`,`nums`) VALUES ('$num', '$mEmoji','$jambandi','0')");
            }
            break;
            //---------------------------------------------------------------------------------
        /*case 'seke':
            if (preg_match('/^\d+$/', $textmessage)) {
                if ($textmessage >= 100 && $textmessage <= 500000) {
                    $pari = 300 / 1000 * $textmessage;
                    $random = rand('10000000', '9999999999');
                    $uzz = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `pari` WHERE id = '$random' LIMIT 1"));
                    $pd = $uzz["id"];
                    if ($pd != true) {
                        $ky = json_encode([
                            'inline_keyboard' => [
                                [["text" => "Next Pay", "url" => "https://tm-quick.ir/ver.php?p=$random&d=np"]],
                                [["text" => "ID Pay", "url" => "https://tm-quick.ir/ver.php?p=$random&d=id"]],
                            ]
                        ]);
                        SendMessage($from_id, language(" 💳 فاکتور خرید $textmessage سکه به مبلغ $pari تومان صادر گردید.

شماره فاکتور: `$random`

درصورت #تایید پرداخت کنید 👇","This language is not set"), 'MarkDown', $ky);
                        SendMessage($from_id, $backer, 'HTML', $button_first);
                        $connect->query("INSERT INTO `pari` (`id`, `mab`,`text`,`time`,`ok`,`from`) VALUES ('$random', '$pari','$textmessage','$timer','not','$from_id')");
                        $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
                    } else {
                        SendMessage($from_id, language("خطای سیستم لطفا دوباره امتحان کنید","This language is not set"), 'HTML', $button_first);
                        $connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
                    }
                } else {
                    SendMessage($from_id, language("حداقل 100 و حداکثر 500000 سکه قابل خرید است","This language is not set"), 'HTML', $button_back);
                }
            } else {
                SendMessage($from_id, language("عدد ورودی اشتباه است","This language is not set"), 'HTML', $button_back);
            }
            break;*/
}

#Mehrab ==);