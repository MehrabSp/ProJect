<?php
// inline
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
	$inline_query_id = $inline_query->id;
	$inline_query_from = $inline_query->from->id;
	$inline_query_q = $inline_query->query;
//---------------------------------------------------------------------------------
@$str_q = str_replace('#Like-', null, $inline_query_q);
@$serach_q = json_decode(file_get_contents("like/$str_q.share.json"), true);
if($serach_q != null){
	$num_q = $serach_q["num"];
	$text_q = $serach_q["text"];
	$like_share = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `like` WHERE id = '$num_q' LIMIT 1"));
    $emoji_q = $like_share["emoji"];
	$message_q = $like_share["message"];
	$nums_q = $like_share["nums"];
				   $result_array = [[
              'type' => "article",
              'id' => "$message_q",
              'title' => "Quick Like! $emoji_q",
			  'input_message_content' => [
              'message_text' => "$text_q",
              'parse_mode' => "HTML"
         ],
		 'reply_markup' => [
                    'inline_keyboard'=>[
                        [['text' => "$emoji_q $nums_q",'callback_data' => "shareL-$num_q"]]
                        ]],
              'description' => "$text_q",
			  'thumb_url' => "https://clever.eliyahost.ir/image/Quick.jpg",
			  'url' => "https://t.me/QuickRuBot"
         ]];
				  $results = json_encode($result_array);
						bot('answerInlineQuery',[
						'inline_query_id' => $inline_query_id,
						'results' => $results
            ]);
			exit();
        }