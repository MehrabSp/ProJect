<?php
// AntiSpam Channel
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
	$contact = $channel_gh->contact; // قفل شماره
	$file_channel = $channel_gh->document; // قفل فایل
	$author_signature=$channel_gh->author_signature; // ادمین
	$sticker_channel=$channel_gh->sticker;
	$gif_channel=$channel_gh->animation;
	$video_note_channel=$channel_gh->video_note;
	$forward_channel=$channel_gh->forward_signature;
	$video_channel=$channel_gh->video;
	$photo_channel = $channel_gh->photo;
	$text_channel=$channel_gh->text;
	$channel_id=$channel_gh->chat->id;
	$channel_message_id=$channel_gh->message_id;
	$channelmessage_id=$channel_gh->reply_to_message->message_id;
	//--------------------------------------------------------------------
    $idCH2 = $dateCH2["id"];
    $ownerCH2 = $dateCH2["owner"];
    $AntispamCH2 = $dateCH2["Antispam"];
    $timeASCH2 = $dateCH2["timeAS"];
    $GallCH2 = $dateCH2["Gall"];
	$GtimeAllCH2 = $dateCH2["GtimeAll"];
	$GgifCH2 = $dateCH2["Ggif"];
    $GnumberCH2 = $dateCH2["Gnumber"];
    $GstickersCH2 = $dateCH2["Gstickers"];
	$GvideoCH2 = $dateCH2["Gvideo"];
    $GphotoCH2 = $dateCH2["Gphoto"];
    $GforwardCH2 = $dateCH2["Gforward"];
    $GtextCH2 = $dateCH2["Gtext"];
	$GvideoMCH2 = $dateCH2["GvideoM"];
    $GdocumentCH2 = $dateCH2["Gdocument"];
	$GreplayCH2 = $dateCH2["Greplay"];
//---------------------------------------------------------------------------------
if ($GallCH2 == "✅" || ($GgifCH2 == "✅" && $gif_channel) || ($GnumberCH2 == "✅" && $contact) || ($GstickersCH2 == "✅" && $sticker_channel) || ($GvideoCH2 == "✅" && $video_channel) || ($GphotoCH2 == "✅" && $photo_channel) || ($GforwardCH2 == "✅" && $forward_channel) || ($GtextCH2 == "✅" && $text_channel) || ($GvideoMCH2 == "✅" && $video_note_channel) || ($GdocumentCH2 == "✅" && $file_channel) || ($GreplayCH2 == "✅" && $channelmessage_id)){
	DeleteMessage($channel_id, $channel_message_id);
exit();
}