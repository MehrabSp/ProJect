<?php
//---------------------------------------------------------------------------------
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], // literally 149.154.160.0/20
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    // literally 91.108.4.0/22
];

$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;

foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    // Make sure the IP is valid.
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("No Spam");
//---------------------------------------------------------------------------------
include("jdf.php");
define('API',"1269732109:AAEcpJMbeyIuwKvb_yCPY5fICAVYOOVq6WE");
function Send($ci, $textmessage){
	$data  = "https://api.telegram.org/bot".API."/SendMessage?";
	$data .= "chat_id=".$ci."&text=".urlencode($textmessage);
	file_get_contents($data);
}
$time = jdate("H:i:s");
$tarkh = jdate("Y/m/d");
$pay = $_GET['pay'];
$from = $_GET['from'];
$MerchantID = '';//مرچند ایدی
$bot = "QuickRuBot";//ایدی ربات بدون@
$Amount = $pay; //Amount will be based on Toman
$Authority = $_GET['Authority'];
$datuas =  json_decode(file_get_contents("data/$from.json"),true);
if ($_GET['Status'] == 'OK') {

$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount,
]
);

if ($result->Status == 100) {
$cotin = $datuas["invite"];
 $newgold = $cotin + $pay;
$datuas["invite"] = "$newgold";
$outjson = json_encode($datuas,true);
file_put_contents("data/$from.json",$outjson);
$me = ($pay / 50);
Send($from, "🌹پرداخت انجام شد . به مبلغ $pay تومان حساب شما   شارژ گردید💵\n معادل $me سکه\n کد پیگیری: ".$result->RefID);
$codpayt = .$result->RefID;
$txtmyass = "
واریز $pay معادل $me سکه خریداری شد
تاریخ $tarkh و ساعت $time
";
file_put_contents("store/$codpayt.txt",$txtmyass);
  ?>
    <html>
	<head>
		<title>افزایش موجودی | <?php echo $botname;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="description" content="صفحه افزایش موجودیِ حساب">
		<link rel="stylesheet" href="source/css/main.css" />
		<link rel="stylesheet" href="source/css/rtl.css" />
		<link rel="icon" type="image/png" href="images/fav.png">
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header" class="alt">
						<h1>ربات <?php echobots_saz;?></h1>
						<p>صفحه افزایش موجودیِ حساب</p>
					</header>
				<!-- Main -->
					<div id="main">
					<!-- First Section -->
										<section id="intro" class="main">
								<div class="spotlight">
							        <div class="content">
										<header class="major">
											<h2 style= "color:green;">پرداخت شما با موفقیت انجام شد</h2><h2>
											و موجودی خریداری شده به حساب شما افزوده شد , برای ادامه به ربات مراجعه کنید .
											<br>	کد پیگیری <?php echo $result->RefID; ?></h2>
										</header>
										<ul class="actions">
											<li><a href="<?php echo "https://t.me/$bot";?>" class="button">برگشت به ربات</a></li>
										</ul>
									</div>
								</div>
							</section>
					</div>		
			</div>
		<!-- Scripts -->
			<script src="source/javascrip/jquery.min.js"></script>
			<script src="source/javascrip/jquery.scrollex.min.js"></script>
			<script src="source/javascrip/jquery.scrolly.min.js"></script>
			<script src="source/javascrip/skel.min.js"></script>
			<script src="source/javascrip/util.js"></script>
			<script src="source/javascrip/main.js"></script>
	</body>
</html>
<?php
} else {
Send($from, 'خرید انجام نشد :'.$result->Status);
?>
    <html>
	<head>
		<title>افزایش موجودی | <?php echo $botname;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="description" content="صفحه افزایش موجودیِ حساب">
		<link rel="stylesheet" href="source/css/main.css" />
		<link rel="stylesheet" href="source/css/rtl.css" />
		<link rel="icon" type="image/png" href="images/fav.png">
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header" class="alt">
						<h1>ربات <?php echobots_saz;?></h1>
						<p>صفحه افزایش موجودیِ حساب</p>
					</header>
				<!-- Main -->
					<div id="main">
					<!-- First Section -->
										<section id="intro" class="main">
								<div class="spotlight">
							        <div class="content">
										<header class="major">
											<h2 style= "color:red;">پرداخت شما با موفقیت انجام نشد ❌ </h2><h2>
								به ربات برگشته و مجدد اقدام به خرید کنید
								</h2>
										</header>
										<ul class="actions">
											<li><a href="<?php echo "https://t.me/$bot";?>" class="button">برگشت به ربات</a></li>
										</ul>
									</div>
								</div>
							</section>
					</div>		
			</div>
		<!-- Scripts -->
			<script src="source/javascrip/jquery.min.js"></script>
			<script src="source/javascrip/jquery.scrollex.min.js"></script>
			<script src="source/javascrip/jquery.scrolly.min.js"></script>
			<script src="source/javascrip/skel.min.js"></script>
			<script src="source/javascrip/util.js"></script>
			<script src="source/javascrip/main.js"></script>
	</body>
</html>
<?php
}
} else {
?>
    <html>
	<head>
		<title>افزایش موجودی | <?php echo $botname;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="description" content="صفحه افزایش موجودیِ حساب">
		<link rel="stylesheet" href="source/css/main.css" />
		<link rel="stylesheet" href="source/css/rtl.css" />
		<link rel="icon" type="image/png" href="images/fav.png">
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header" class="alt">
						<h1>ربات <?php echobots_saz;?></h1>
						<p>صفحه افزایش موجودیِ حساب</p>
					</header>
				<!-- Main -->
					<div id="main">
					<!-- First Section -->
										<section id="intro" class="main">
								<div class="spotlight">
							        <div class="content">
										<header class="major">
											<h2 style= "color:#808080;">خرید کنسل شد...</h2>
										</header>
										<ul class="actions">
											<li><a href="<?php echo "https://t.me/$bot";?>" class="button">برگشت به ربات</a></li>
										</ul>
									</div>
								</div>
							</section>
					</div>		
			</div>
		<!-- Scripts -->
			<script src="source/javascrip/jquery.min.js"></script>
			<script src="source/javascrip/jquery.scrollex.min.js"></script>
			<script src="source/javascrip/jquery.scrolly.min.js"></script>
			<script src="source/javascrip/skel.min.js"></script>
			<script src="source/javascrip/util.js"></script>
			<script src="source/javascrip/main.js"></script>
	</body>
</html>
<?php
Send($from, "خرید انجام نشد کنسل شد");
header('location: https://t.me/$bot');
}

?>