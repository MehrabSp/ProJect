<?php
//--------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
if(isset($update)){
    $telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0','upper' => '91.108.7.255'],];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR'])); $ok = false;
        foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
            $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
            $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
                if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok = true;
        }
    if (!$ok) die("<center>
<p>دسترسی شما به این صفحه مجاز نیست</p>
</center>"); 
}
//---------------------------------------------------------------------------------
define('APIKEYE','1650473371:AAFxFA6J8ossskBCSHXuEbSxlv9pYSejIs8');
//---------------------------------------------------------------------------------
function Messege($cic, $textmessage){
	$datac  = "https://api.telegram.org/bot".APIKEYE."/SendMessage?";
	$datac .= "chat_id=".$cic."&text=".urlencode($textmessage);
	file_get_contents($datac);
}
//---------------------------------------------------------------------------------
$connect = mysqli_connect('localhost', 'mehrab_quick', '3ZS#keHumzjX', 'mehrab_quick');
//---------------------------------------------------------------------------------
$id = $_POST['id'];
$order_id = $_POST['order_id'];
$s = $_GET['p'];
$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `pari` WHERE id = '$s' LIMIT 1"));
$id = $user["id"];
$stepe = $user["mab"];
$stepg = $user["time"];
$stepr = $user["from"];
$stept = $user["text"];
//---------------------------------------------------------------------------------
if($id == true){
//---------------------------------------------------------------------------------
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('id' => $id,  'order_id' => "$order_id",)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"X-API-KEY: 4f092c64-9270-4de1-8bbf-1938efd6674f",));
$result = json_decode(curl_exec($ch));
curl_close($ch);
//---------------------------------------------------------------------------------
if($result->status == 100){
$usercs = json_decode(file_get_contents("5gfi6gdi9/data/$stepr.json"),true);
$gdryss = $usercs["invite"];
$hgjgkd = $usercs["mkharid"];
$user = json_decode(file_get_contents("5gfi6gdi9/data/$stepr.json"),true);
$user["invite"] = $gdryss + $stept;
$user["mkharid"] = $hgjgkd + $stepe;
$outjson = json_encode($user,true);
file_put_contents("5gfi6gdi9/data/$stepr.json",$outjson);
Messege($stepr, "✅ با تشکر از خرید شما، موجودی حسابتان به مقدار $stept سکه شارژ شد.
🔎 شماره پیگیری: $s");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tm Quick</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <link rel="stylesheet" href="css/style.css?v=4.2">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="screen un">
        <div class="border-top">
        </div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>

        <svg width="166" height="150" id="topIcon"><g id="Shot" fill="none" fill-rule="evenodd"><g id="shot2" transform="translate(-135 -157)"><g id="success-card" transform="translate(48 120)"><g id="Top-Icon" transform="translate(99.9 47.7)"><g id="Bubbles" fill="#5AE9BA"><g id="bottom-bubbles" transform="translate(0 76)"><ellipse id="Oval-Copy-3" cx="12.8571429" cy="13.2605405" rx="12.8571429" ry="12.8432432"/><ellipse id="Oval-Copy-4" cx="25.0714286" cy="34.4518919" rx="8.35714286" ry="8.34810811"/><ellipse id="Oval-Copy-6" cx="42.4285714" cy="31.2410811" rx="7.71428571" ry="7.70594595"/></g><g id="top-bubbles" transform="translate(92)"><ellipse id="Oval" cx="13.4285714" cy="23.76" rx="12.8571429" ry="12.8432432"/><ellipse id="Oval-Copy" cx="37.8571429" cy="25.0443243" rx="5.14285714" ry="5.1372973"/><ellipse id="Oval-Copy-2" cx="30.1428571" cy="7.70594595" rx="7.71428571" ry="7.70594595"/></g></g><g id="Circle" transform="translate(18.9 11.7)"><ellipse id="blue-color" cx="56.341267" cy="54.0791109" fill="#5AE9BA" rx="51.2193336" ry="51.5039151"/><ellipse id="border" cx="51.2283287" cy="51.5039151" stroke="#3C474D" stroke-width="5" rx="51.2193336" ry="51.5039151"/><path id="bluetooth" fill="#FFF" fill-rule="nonzero" d="M51.2028096 52.9593352l12.1775292-9.6235055c.3644184-.2872475.5941296-.714554.6368262-1.1784596.0426967-.4637471-.111547-.924167-.4168832-1.2724131l-13.444407-15.2100186c-.4628885-.5249041-1.201336-.7047309-1.8545476-.4570927-.6532117.2492225-1.0831718.8780617-1.0831718 1.5794653v22.4403228l-7.2604808-6.778123c-.6729057-.6321664-1.739692-.5957257-2.3732097.0874576-.6335176.6849262-.5941295 1.7543806.0887019 2.3881314l8.3601956 7.8097108-8.2551082 6.5239889c-.7319878.575921-.8567692 1.6388795-.2856422 2.3732382.5744355.7361016 1.6379132.8598414 2.3599753.2839204L47.2181554 56.1067v21.3906731c0 .663537.3841124 1.2641743.9847016 1.5381131.2232516.1023508.4595799.1517833.6959083.1517833.4004979 0 .7943785-.1435445 1.1061744-.4174833l13.444407-11.8300673c.3578012-.315291.5678183-.7690566.5744355-1.2476968.0066172-.4786403-.1871721-.9374759-.538356-1.26259L51.2028096 52.9593352zM50.579092 31.546148l9.603625 10.6136051-9.603625 7.4127652V31.546148zm0 42.49073V57.2981056l8.9633833 8.6179286-8.9633833 8.1208438z"/></g></g></g></g></g></svg>

        <div class="text-box">
            <h3 id='title-holder'></h3>
            <p id='message-holder'></p>
        </div>


        <a href="tg://resolve?domain=seenrubot">
            <button id="btnClick" class='backButton'>برگشت به ربات</button>
        </a>

    </div>

    <script>
        const invert = true;
        const title = 'تبریک'
        const message = 'خرید با موفقیت انجام شد'
    </script>

    <script src="js/script.js?v=4.2"></script>

</body>

</html>
<?php
}else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tm Quick</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <link rel="stylesheet" href="css/style.css?v=4.2">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="screen un">
        <div class="border-top">
        </div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>

        <svg width="166" height="150" id="topIcon"><g id="Shot" fill="none" fill-rule="evenodd"><g id="shot2" transform="translate(-135 -157)"><g id="success-card" transform="translate(48 120)"><g id="Top-Icon" transform="translate(99.9 47.7)"><g id="Bubbles" fill="#5AE9BA"><g id="bottom-bubbles" transform="translate(0 76)"><ellipse id="Oval-Copy-3" cx="12.8571429" cy="13.2605405" rx="12.8571429" ry="12.8432432"/><ellipse id="Oval-Copy-4" cx="25.0714286" cy="34.4518919" rx="8.35714286" ry="8.34810811"/><ellipse id="Oval-Copy-6" cx="42.4285714" cy="31.2410811" rx="7.71428571" ry="7.70594595"/></g><g id="top-bubbles" transform="translate(92)"><ellipse id="Oval" cx="13.4285714" cy="23.76" rx="12.8571429" ry="12.8432432"/><ellipse id="Oval-Copy" cx="37.8571429" cy="25.0443243" rx="5.14285714" ry="5.1372973"/><ellipse id="Oval-Copy-2" cx="30.1428571" cy="7.70594595" rx="7.71428571" ry="7.70594595"/></g></g><g id="Circle" transform="translate(18.9 11.7)"><ellipse id="blue-color" cx="56.341267" cy="54.0791109" fill="#5AE9BA" rx="51.2193336" ry="51.5039151"/><ellipse id="border" cx="51.2283287" cy="51.5039151" stroke="#3C474D" stroke-width="5" rx="51.2193336" ry="51.5039151"/><path id="bluetooth" fill="#FFF" fill-rule="nonzero" d="M51.2028096 52.9593352l12.1775292-9.6235055c.3644184-.2872475.5941296-.714554.6368262-1.1784596.0426967-.4637471-.111547-.924167-.4168832-1.2724131l-13.444407-15.2100186c-.4628885-.5249041-1.201336-.7047309-1.8545476-.4570927-.6532117.2492225-1.0831718.8780617-1.0831718 1.5794653v22.4403228l-7.2604808-6.778123c-.6729057-.6321664-1.739692-.5957257-2.3732097.0874576-.6335176.6849262-.5941295 1.7543806.0887019 2.3881314l8.3601956 7.8097108-8.2551082 6.5239889c-.7319878.575921-.8567692 1.6388795-.2856422 2.3732382.5744355.7361016 1.6379132.8598414 2.3599753.2839204L47.2181554 56.1067v21.3906731c0 .663537.3841124 1.2641743.9847016 1.5381131.2232516.1023508.4595799.1517833.6959083.1517833.4004979 0 .7943785-.1435445 1.1061744-.4174833l13.444407-11.8300673c.3578012-.315291.5678183-.7690566.5744355-1.2476968.0066172-.4786403-.1871721-.9374759-.538356-1.26259L51.2028096 52.9593352zM50.579092 31.546148l9.603625 10.6136051-9.603625 7.4127652V31.546148zm0 42.49073V57.2981056l8.9633833 8.6179286-8.9633833 8.1208438z"/></g></g></g></g></g></svg>

        <div class="text-box">
            <h3 id='title-holder'></h3>
            <p id='message-holder'></p>
        </div>


        <a href="tg://resolve?domain=mehrab_s">
            <button id="btnClick" class='backButton'>ارتباط با پشتیبانی</button>
        </a>

    </div>

    <script>
        const invert = true;
        const title = 'خطا'
        const message = 'خرید با مشکل رو به رو شد'
    </script>

    <script src="js/script.js?v=4.2"></script>

</body>

</html>
<?php
}

}else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tm Quick</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <link rel="stylesheet" href="css/style.css?v=4.2">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="screen un">
        <div class="border-top">
        </div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>

        <svg width="166" height="150" id="topIcon"><g id="Shot" fill="none" fill-rule="evenodd"><g id="shot2" transform="translate(-135 -157)"><g id="success-card" transform="translate(48 120)"><g id="Top-Icon" transform="translate(99.9 47.7)"><g id="Bubbles" fill="#5AE9BA"><g id="bottom-bubbles" transform="translate(0 76)"><ellipse id="Oval-Copy-3" cx="12.8571429" cy="13.2605405" rx="12.8571429" ry="12.8432432"/><ellipse id="Oval-Copy-4" cx="25.0714286" cy="34.4518919" rx="8.35714286" ry="8.34810811"/><ellipse id="Oval-Copy-6" cx="42.4285714" cy="31.2410811" rx="7.71428571" ry="7.70594595"/></g><g id="top-bubbles" transform="translate(92)"><ellipse id="Oval" cx="13.4285714" cy="23.76" rx="12.8571429" ry="12.8432432"/><ellipse id="Oval-Copy" cx="37.8571429" cy="25.0443243" rx="5.14285714" ry="5.1372973"/><ellipse id="Oval-Copy-2" cx="30.1428571" cy="7.70594595" rx="7.71428571" ry="7.70594595"/></g></g><g id="Circle" transform="translate(18.9 11.7)"><ellipse id="blue-color" cx="56.341267" cy="54.0791109" fill="#5AE9BA" rx="51.2193336" ry="51.5039151"/><ellipse id="border" cx="51.2283287" cy="51.5039151" stroke="#3C474D" stroke-width="5" rx="51.2193336" ry="51.5039151"/><path id="bluetooth" fill="#FFF" fill-rule="nonzero" d="M51.2028096 52.9593352l12.1775292-9.6235055c.3644184-.2872475.5941296-.714554.6368262-1.1784596.0426967-.4637471-.111547-.924167-.4168832-1.2724131l-13.444407-15.2100186c-.4628885-.5249041-1.201336-.7047309-1.8545476-.4570927-.6532117.2492225-1.0831718.8780617-1.0831718 1.5794653v22.4403228l-7.2604808-6.778123c-.6729057-.6321664-1.739692-.5957257-2.3732097.0874576-.6335176.6849262-.5941295 1.7543806.0887019 2.3881314l8.3601956 7.8097108-8.2551082 6.5239889c-.7319878.575921-.8567692 1.6388795-.2856422 2.3732382.5744355.7361016 1.6379132.8598414 2.3599753.2839204L47.2181554 56.1067v21.3906731c0 .663537.3841124 1.2641743.9847016 1.5381131.2232516.1023508.4595799.1517833.6959083.1517833.4004979 0 .7943785-.1435445 1.1061744-.4174833l13.444407-11.8300673c.3578012-.315291.5678183-.7690566.5744355-1.2476968.0066172-.4786403-.1871721-.9374759-.538356-1.26259L51.2028096 52.9593352zM50.579092 31.546148l9.603625 10.6136051-9.603625 7.4127652V31.546148zm0 42.49073V57.2981056l8.9633833 8.6179286-8.9633833 8.1208438z"/></g></g></g></g></g></svg>

        <div class="text-box">
            <h3 id='title-holder'></h3>
            <p id='message-holder'></p>
        </div>


        <a href="tg://resolve?domain=mehrab_s">
            <button id="btnClick" class='backButton'>ارتباط با پشتیبانی</button>
        </a>

    </div>

    <script>
        const invert = true;
        const title = 'خطا'
        const message = 'شماره فاکتور یافت نشد'
    </script>

    <script src="js/script.js?v=4.2"></script>

</body>

</html>
<?php
}
?>