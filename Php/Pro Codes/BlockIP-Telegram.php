<?php

//IP Telegram for botAPI
$ip1lower = '149.154.160.0';
$ip2lower = '91.108.4.0';
$ip1upper = '149.154.175.255';
$ip2upper = '91.108.7.255';
//--------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$channel_gh = $update->channel_post;
if (!isset($channel_gh)) {
    $telegram_ip_ranges = [['lower' => $ip1lower, 'upper' => $ip1upper], ['lower' => $ip2lower, 'upper' => $ip2upper],];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok = false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
        $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
        $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
        if ($ip_dec >= $lower_dec && $ip_dec <= $upper_dec) $ok = true;
    }
    if (!$ok) die("<center>
<p>You do not have permission to access this page</p>
</center>");
}
//--------------------------------------------------------------------