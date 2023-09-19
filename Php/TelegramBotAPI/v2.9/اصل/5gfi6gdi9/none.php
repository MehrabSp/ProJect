<?php
// step none
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
if ($invited == "faal") {
            $asw = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id` = '$inviter' LIMIT 1"));
            $newgold = $asw["gold"] + 100;
            $newtedad = $asw["tedad"] + 1;
            SendMessage($inviter, language("🎈 تبریک، 100 سکه بابت زیرمجموعه جدید دریافت کردید.","Congratulations, you received +100 coins for the new subset."), 'MARKDOWN', null);
            $connect->query("UPDATE `user` SET `gold` = '$newgold' , `tedad` = '$newtedad' WHERE `id` = '$inviter' LIMIT 1");
            $connect->query("UPDATE `user` SET `invited` = 'Ok' WHERE `id` = '$from_id' LIMIT 1");
        }
switch ($textmessage) {
//---------------------------------------------------------------------------------
case '🆘':
            SendMessage($from_id, language("☎️ جهت ارتباط با بخش پشتیبانی پیام خود را با رعایت موارد زیر به نشانی @MehraB_S ارسال نمایید.

• لطفا پیام، سوال، پیشنهاد و یا انتقاد خود را در قالب یک پیام واحد به طور کامل ارسال کنید (از پاسخگویی به پیامهای جداگانه، ناقص و احوالپرسی معذوریم)
• اگر پیامتان در رابطه با سفارش خاصی است حتما پیام 'ثبت سفارش' و پست موردنظر را نیز ارسال کنید.
• درصورتی که میخواهید گزارش تخلفی را بدهید، مدارک مربوطه و شناسه های کاربری مرتبط را حتما ارسال کنید.

👈🏻 سعی بخش پشتیبانی بر این است که تمامی پیام های دریافتی در کمتر از ۱۲ ساعت پاسخ داده شوند، بنابراین تا زمان دریافت پاسخ صبور باشید!","Support: @MehraB_S"), 'HTML', $button_first);
            break;
            //---------------------------------------------------------------------------------
        case '⚖️':
            SendMessage($from_id, language("⚖️ <b>استفاده از ربات کوییک به منزله‌ی قبول شرایط و قوانین زیر است:</b>

1- پستهای ارسالی شما برای افزایش بازدید، توسط هیچ فرد واقعی‌ای دیده نمیشود بنابراین مناسب کارهای <u>تبلیغاتی</u> نیست.

2- خرید و فروش موجودی ربات توسط کاربران <u>بلامانع</u> است اما شرکت کوییک هیچ گونه تعهدی برای پیگیری تخلفات مربوطه ندارد و فقط در صورت صلاح دید پیگیری انجام میشود.

3- درصورتی که قصد خرید سکه انبوه را دارید قبل از آن با پشتیبانی در ارتباط باشید. ( اگر منبع سکه های بدست آمده از طریق باگ ربات و یا خرید با کارت‌های هک شده باشد حساب آن کاربر بدون تذکر مسدود دائم خواهد شد)

4- دریافت لینک پرداخت از ربات و ارسال آن به سایر افراد جهت واریز وجه تخلف محسوب میشود و درصورت مشاهده حساب کاربر مسدود دائم خواهد شد.

5- در صورت مشاهده پیام بیش از حد  (Spam) و یا هر گونه تخلف دیگر در ربات حساب آن کاربر مسدود دائم میشود. ( ربات دارای آنتی Spam است و در صورتی که کاربر سه اخطار را دریافت کند حساب آن کاربر توسط ربات مسدود دائم خواهد شد و غیر قابل بخشش است)

6- در صورت مشاهده زیرمجموعه گیری فیک حساب آن کاربر یک هفته مسدود میشود.

<i>آخرین ویرایش قوانین: 15 آبان 1399</i>","Unregulated rules"), 'HTML', $button_first);
            break;
            //---------------------------------------------------------------------------------
		case '💰 Buy Gold':
        case '💰 خرید سکه':
            SendMessage($from_id, language("
			بسته شد
			❓تعداد #سکه موردنظر خود را وارد نمایید. (هر 1000 سکه 300 تومان)

مجموع خرید شما: $buygold تومان","is Closed"), 'HTML', $button_first);
			$connect->query("UPDATE `user` SET `step` = 'none' WHERE id = '$from_id' LIMIT 1");
            //$connect->query("UPDATE `user` SET `step` = 'seke' WHERE id = '$from_id' LIMIT 1");
            break;
            //---------------------------------------------------------------------------------
        case '🎁':
            SendMessage($from_id, language("👈🏻 برای دریافت سکه رایگان یکی از بخش های زیر را انتخاب کنید.","Free Gold :"), 'HTML', $button_office);
            $connect->query("UPDATE `user` SET `step` = 'ziri' WHERE id = '$from_id' LIMIT 1");
            break;
            //---------------------------------------------------------------------------------
		case '🔐 Anti Spam Channel':
        case '🔐 ضداسپم/کنترل کانال':
		if ($idCH != null){
            SendMessage($from_id, language("مدیریت کانال شما","manage channel"), 'HTML', $button_maschannel);
			$connect->query("UPDATE `user` SET `step` = 'manageCh' WHERE id = '$from_id' LIMIT 1");
		}else{
			SendMessage($from_id, language("شما کانالی در ربات ثبت نکردید","This language is not set"), 'HTML', $button_asChannel);
			$connect->query("UPDATE `user` SET `step` = 'setasChannel' WHERE id = '$from_id' LIMIT 1");
		}
            break;
            //---------------------------------------------------------------------------------
		case '💰 Gold transfer':
        case '💰 انتقال سکه':
            SendMessage($from_id, language("❓ تعداد سکه مورد نظر جهت انتقال را ارسال نمایید:

 موجودی شما: $gold سکه","Enter the number of transfer golds
 You Gold: $gold"), 'HTML', $button_back);
            $connect->query("UPDATE `user` SET `step` = 'entg' WHERE id = '$from_id' LIMIT 1");
            break;
            //---------------------------------------------------------------------------------
		case '👤 Info':
        case '👤 حساب کاربری':
            SendMessage($from_id, language("👤 شناسه شما: `$from_id`
📅 تاریخ عضویت شما: $sHistory
💰 موجودی شما: $gold سکه
👤 زیرمجموعه های شما: $tedad نفر

‏🧮 مجموع خرید های شما: $buygold تومان

`Tm Quick $tarikh $time`","👤 ID: `$from_id`
📅 History Again: $sHistory
💰 You gold: $gold
👤 sub: $tedad

Yoy Buy Gold: $buygold Toman

`Tm Quick $tarikh $time`"), 'MarkDown', $button_first);
            break;
            //---------------------------------------------------------------------------------
		case '❤️ Create Like':
		case '❤️ ساخت لایک/رأی':
        case '/like':
		if ($gold >= '10') {
			if ($stepLike == null) {
                SendMessage($from_id, language("👈 ربات را ادمین کانال خود کنید و آیدی کانال خود را به صورت کامل بفرستید.

📣 اگر کانال شما خصوصی است میتوانید شناسه عددی آن را ارسال کنید (توصیه نمیشود).

 برای مدیریت کامل لایک لازم است ربات ادمین کانال باشد تا شما بتوانید لایک خود را افزایش و یا از آن کسر کنید.
@Tm_Quick
-1001429953692","Let's create a message with emoji buttons. Submit your channel ID first.
@Tm_Quick
-1001429953692"), 'HTML', $button_dkchnnel);
                $connect->query("UPDATE `user` SET `step` = 'like' WHERE id = '$from_id' LIMIT 1");
			}else{
				SendMessage($from_id, language("این قسمت دارای محدودیت هایی است /likefhelp
				
- ایموجی دلخواه خود را ارسال کنید","This language is not set"), 'HTML', $button_emojish);
                $connect->query("UPDATE `user` SET `step` = 'shareLike' WHERE id = '$from_id' LIMIT 1");
			}
		}else{
			SendMessage($from_id, language("برای ساخت لایک حداقل نیاز به 10 گلد دارید","This language is not set"), 'HTML', null);
		}
            break;
				//---------------------------------------------------------------------------------
		case '/language':
		if ($language != null){
		$answer = "زبان مورد نظر خود را انتخاب کنید
		Select your preferred language";
		$ky = json_encode([
                    'inline_keyboard' => [
                        [["text" => "🇺🇸English", "callback_data" => "languageEnglish"]],
                        [["text" => "🇮🇷Persian", "callback_data" => "languagePersian"]],
                    ]
                ]);
                SendMessage($from_id, $answer, 'HTML', $ky);
    }
	break;
	//---------------------------------------------------------------------------------
        case '/panel':
		if ($from_id == $developer){
                SendMessage($from_id, language("پنل مدیریتی.","Panel Admin."), 'HTML', $button_panel);
                $connect->query("UPDATE `user` SET `step` = 'panelAdmin' WHERE id = '$from_id' LIMIT 1");
		}
            break;
	//---------------------------------------------------------------------------------
        case 'ثبت جوک':
		if ($aVip == "accepted"){
                SendMessage($from_id, language("حساب شما تایید شده است.
				متن جوک خود را ارسال کنید توجه کنید که متن شما بعد تایید شدن توسط مدیر در سرویس ثبت میشود باتشکر.","This language is not set"), 'HTML', $button_back);
                $connect->query("UPDATE `user` SET `step` = 'sendjock' WHERE id = '$from_id' LIMIT 1");
		}else{
		SendMessage($from_id, language("حساب شما تایید نشده است","This language is not set"), 'HTML', $button_first);
		}
            break;
}