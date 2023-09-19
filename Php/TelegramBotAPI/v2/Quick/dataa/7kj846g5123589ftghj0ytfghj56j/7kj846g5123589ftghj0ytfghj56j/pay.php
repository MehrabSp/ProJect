<?php
			 	$dir=dirname($_SERVER['SCRIPT_URI']);

define('URL_CALLBACK', 'ddd');// ادرس برگشت که باید حتما با ادرسی که هنگام گرفتن مرچنت کد زدید یکی باشن 
define('URL_PAYMENT', 'https://api.idpay.ir/v1/payment');
define('URL_INQUIRY', 'https://api.idpay.ir/v1/payment/inquiry');
define('APIKEY', 'ab574c63-b765-4039-9d1f-9ee346b6664e');//مرچنت کد ایدی پی شما
define('SANDBOX', FALSE);// در صورت تغییر به true به صورت sandbox (تستی) لینک پرداخت شما ساخته خواهد شد
$user = $_GET['fromm'];
$CallbackURL = "$dir/payed.php?id=$user&amount=$amount";// Required
$header = array(
  'Content-Type: application/json',
  'X-API-KEY:' . APIKEY,
  'X-SANDBOX:' . SANDBOX,
);

$params = array(
  'order_id' => '1',
  'amount' => 10000,// مبلغ تراکنش
  'phone' => '09382198592',// شماره کاربر
  'desc' => 'توضیحات پرداخت کننده',//توضیحات تراکنش
  'callback' => URL_CALLBACK,//dont touch
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL_PAYMENT);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$result = curl_exec($ch);
curl_close($ch);

$result = json_decode($result);

if (empty($result) ||
    empty($result->link)) {

  print 'Error handeling';
  return FALSE;
}
$link = $result->link;









