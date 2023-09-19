<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>Paper Stack</title>
    <link rel="stylesheet" type="text/css" href="../css/css_table.css" />
</head>

<body>
    <div class="container">
        <section id="content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h1>Login Form</h1>
                <div>
                    <input type="text" placeholder="Username" required="" id="username" name="UserQ" />
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" id="password" name="PassQ" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form>
            <!-- form -->

        </section>
        <!-- content -->
    </div>
    <!-- container -->
	</body>

</html>
	<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['UserQ'];
	$pass = $_POST['PassQ'];
    if ($user == "Clever" and $pass == "0088") {
$connect = mysqli_connect('localhost', 'quickeli_Clever', '}ylsGJjM^jLr', 'quickeli_Clever');
mysqli_multi_query($connect, "CREATE TABLE `user` (
    `id` bigint(30) PRIMARY KEY,
	`step` varchar(30) NOT NULL,
	`gold` bigint(20) NOT NULL,
	`tedad` bigint(20) NOT NULL,
	`sHistory` varchar(20) NOT NULL,
	`gHistory` varchar(20) NOT NULL,
	`buygold` bigint(20) NOT NULL,
	`inviter` bigint(30) NULL,
	`invited` varchar(10) NULL,
	`channel` varchar(33) NULL,
	`stepLike` varchar(30) NULL,
	`emoji` varchar(200) NULL,
	`givegold` bigint(30) NULL,
	`language` varchar(20) NOT NULL,
	`group` varchar(33) NULL,
	`asChannel` varchar(33) NULL
  );
  CREATE TABLE `pari` (
    `id` bigint(30) PRIMARY KEY,
    `mab` int(20) NOT NULL,
    `text` int(20) NOT NULL,
	`time` bigint(50) NOT NULL,
	`ok` varchar(10) NOT NULL,
	`from` bigint(30) NOT NULL
  );
  CREATE TABLE `channels` (
    `id` varchar(35) PRIMARY KEY,
    `owner` int(20) NOT NULL,
	`Antispam` varchar(20) NULL,
	`timeAS` varchar(20) NULL,
	`Gall` varchar(20) NULL,
	`GtimeAll` varchar(20) NULL,
	`Ggif` varchar(20) NULL,
	`Gnumber` varchar(20) NULL,
	`Gstickers` varchar(20) NULL,
	`Gvideo` varchar(20) NULL,
	`Gphoto` varchar(20) NULL,
	`Gforward` varchar(20) NULL,
	`Gtext` varchar(20) NULL,
	`GvideoM` varchar(20) NULL,
	`Gdocument` varchar(20) NULL,
	`Greplay` varchar(20) NULL
  );
CREATE TABLE `like` (
    `id` bigint(200) PRIMARY KEY,
    `emoji` varchar(200) NULL,
    `channel` varchar(33) NULL,
	`message` bigint(200) NULL,
    `nums` bigint(200) NULL
  )");
if ($connect->connect_error) {
	die("Error : " . $connect->connect_error);
}
?>
<meta http-equiv=refresh
      content="1; URL=../demo/eTable.html">
<?php
    } else {
?>
<meta http-equiv=refresh
      content="1; URL=../demo/eTable.html">
<?php
exit();
    }
}
?>