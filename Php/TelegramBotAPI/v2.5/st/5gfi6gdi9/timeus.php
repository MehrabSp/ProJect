<?php 
include("ezez2.php");
$trttr = jdate("H:i:s");
if ($trttr == "16:55:00") {
bot('SendMessage',[
'chat_id'=>$admins,
'text'=>"test555",
'parse_mode'=>"HTML",
	 ]);  
}
?>