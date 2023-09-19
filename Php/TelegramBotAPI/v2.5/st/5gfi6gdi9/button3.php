<?php 
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], // literally 149.154.160.0:20
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    // literally 91.108.4.0:22
];

$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;

foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    // Make sure the IP is valid.
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("T.me/Tm_Quick");
//---------------------------------------------------
$ds = file_get_contents("vooote/$id.dok.txt");
$s = explode('|',$ds);
$d = file_get_contents("vooote/$id.post.txt");
if($s[21] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"],["text"=>"$s[7] $s[6]","callback_data"=>"vooote3<$id<$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vooote4<$id<$s[11]"],["text"=>"$s[13] $s[12]","callback_data"=>"vooote5<$id<$s[14]"],["text"=>"$s[16] $s[15]","callback_data"=>"vooote6<$id<$s[17]"]],
[["text"=>"$s[19] $s[18]","callback_data"=>"vooote7<$id<$s[20]"],["text"=>"$s[22] $s[21]","callback_data"=>"vooote8<$id<$s[23]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 3👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 4👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 5👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 6👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 7👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 8👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:+1"],["text"=>"+10","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:+10"],["text"=>"+100","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:+100"],["text"=>"+500","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"8:$s[23]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[18] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"],["text"=>"$s[7] $s[6]","callback_data"=>"vooote3<$id<$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vooote4<$id<$s[11]"],["text"=>"$s[13] $s[12]","callback_data"=>"vooote5<$id<$s[14]"],["text"=>"$s[16] $s[15]","callback_data"=>"vooote6<$id<$s[17]"]],
[["text"=>"$s[19] $s[18]","callback_data"=>"vooote7<$id<$s[20]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 3👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 4👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 5👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 6👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 7👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"7:$s[20]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[15] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"],["text"=>"$s[7] $s[6]","callback_data"=>"vooote3<$id<$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vooote4<$id<$s[11]"],["text"=>"$s[13] $s[12]","callback_data"=>"vooote5<$id<$s[14]"],["text"=>"$s[16] $s[15]","callback_data"=>"vooote6<$id<$s[17]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 3👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 4👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 5👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 6👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"6:$s[17]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[12] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"],["text"=>"$s[7] $s[6]","callback_data"=>"vooote3<$id<$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vooote4<$id<$s[11]"],["text"=>"$s[13] $s[12]","callback_data"=>"vooote5<$id<$s[14]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 3👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 4👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 5👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"5:$s[14]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[9] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"],["text"=>"$s[7] $s[6]","callback_data"=>"vooote3<$id<$s[8]"]],
[["text"=>"$s[10] $s[9]","callback_data"=>"vooote4<$id<$s[11]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 3👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 4👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"4:$s[11]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[6] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"],["text"=>"$s[7] $s[6]","callback_data"=>"vooote3<$id<$s[8]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 3👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"3:$s[8]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[3] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"],["text"=>"$s[4] $s[3]","callback_data"=>"vooote2<$id<$s[5]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
[["text"=>"👇 اضافه کردن به گزینه 2👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"2:$s[5]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else if($s[0] != null){
$post = bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$d",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"$s[1] $s[0]","callback_data"=>"vooote1<$id<$s[2]"]],
],
])
]);
$post_id = $post->result->message_id;
$post_user = $post->result->chat->username;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب پست شما ارسال شد✅
برای زدن رای فیک بر روی این پست از دکمه های زیر استفاده کنید👇",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"👇 اضافه کردن به گزینه 1👇","callback_data"=>"null"]],
[["text"=>"+1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+1"],["text"=>"+2","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+2"],["text"=>"+5","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+5"],["text"=>"+10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+10"]],
[["text"=>"+50","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+50"],["text"=>"+100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+100"],["text"=>"+200","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+200"],["text"=>"+500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:+500"]],
[["text"=>"-1","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-1"],["text"=>"-10","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-10"],["text"=>"-100","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-100"],["text"=>"-500","callback_data"=>"1:$s[2]:$id:$post_user:$post_id:-500"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
?>