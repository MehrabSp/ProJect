<?php
//--------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
if (isset($update)) {
    $telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], ['lower' => '91.108.4.0', 'upper' => '91.108.7.255'],];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok = false;
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
define('APIKEYE', "1650473371:AAFxFA6J8ossskBCSHXuEbSxlv9pYSejIs8");
//---------------------------------------------------------------------------------
function Messege($cic, $textmessage)
{
    $datac  = "https://api.telegram.org/bot" . APIKEYE . "/SendMessage?";
    $datac .= "chat_id=" . $cic . "&text=" . urlencode($textmessage);
    file_get_contents($datac);
}
//---------------------------------------------------------------------------------
$connect = mysqli_connect('localhost', 'mehrab_quick', '3ZS#keHumzjX', 'mehrab_quick');
//---------------------------------------------------------------------------------
$s = $_GET['p'];
$order_id = $_POST['order_id'];
$trans_id = $_POST['trans_id'];
$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `pari` WHERE id = '$s' LIMIT 1"));
$id = $user["id"];
$stepe = $user["mab"];
$stepg = $user["time"];
$stepr = $user["from"];
$stept = $user["text"];
$stepk = $user["ok"];
//---------------------------------------------------------------------------------
if (file_exists("5gfi6gdi9/pari/$s.json")) {
    $users = json_decode(file_get_contents("5gfi6gdi9/pari/$s.json"), true);
    $stepe = $users["mab"];
    $stepg = $users["time"];
    $stepr = $users["from"];
    $stept = $users["text"];
    $client = new SoapClient('http://api.nextpay.org/gateway/verify.wsdl');
    $verify_obj = $client->PaymentVerification(array("api_key" => "8d006089-9c7d-44b7-b809-dfe568aa6ee7", "order_id" => $order_id, "amount" => $stepe, "trans_id" => $trans_id));
    $code = $verify_obj->PaymentVerificationResult->code;

    if ($code == "0") {
        $asw = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id` = '$stepr' LIMIT 1"));
        $newgold = $asw["invite"] + $stept;
        $newtedad = $asw["mkharid"] + $stepe;
        Messege($stepr, "✅ با تشکر از خرید شما، موجودی حسابتان به مقدار $stept سکه شارژ شد.
🔎 شماره پیگیری: $s");
        $connect->query("UPDATE `user` SET `invite` = '$newgold' , `mkharid` = '$newtedad' WHERE `id` = '$stepr' LIMIT 1");
?>
        <meta charset="utf-8">
        <html dir='rtl'>

        <head>
            <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
            <title>TM Quick</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='https://tm-quick.ir/css/stylr.css?version=1.7'>
            <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        </head>

        <body>
            <div class='success'><i class='fa fa-check'></i>پرداخت موفقیت آمیز بود.<br />کد پیگیری: <?php echo "$s"; ?></div>
        <?php
    } else {
        ?>
            <meta charset="utf-8">
            <html dir='rtl'>

            <head>
                <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
                <title>TM Quick</title>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' href='https://tm-quick.ir/css/stylr.css?version=1.7'>
                <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
            </head>

            <body>
                <div class='warning'><i class='fa fa-warning'></i>خطا! خرید با موفقیت انجام نشد.</div>
            <?php
        }
    } else {
            ?>
            <meta charset="utf-8">
            <html dir='rtl'>

            <head>
                <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
                <title>TM Quick</title>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' href='https://tm-quick.ir/css/stylr.css?version=1.7'>
                <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
            </head>

            <body>
                <div class='warning'><i class='fa fa-warning'></i>خطا! شماره فاکتور یافت نشد.</div>
            <?php
        }
            ?>