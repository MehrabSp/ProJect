<?php

// session_start(); toy Xampp Faal Shode

// old
function json($list, $length = "length", $adress = "music_status/list.json")
{
    $b = json_decode(file_get_contents($adress), true);
    $d = $b[$list][$length];
    return $d;
}
function finder($file_name, $type = "Music")
{
    $list = json($type, "list");
    $rez = "nbod";
    foreach ($list as $res) {
        if ($file_name == $res) {
            return "bod";
            break;
        }
    }
    return $rez;
}
function saver($file_name)
{
    $info = json_decode(file_get_contents("music_status/list.json"), true);
    $info["Music"]["length"] = $info["Music"]["length"] + 1;
    $info["Music"]["list"][] = $file_name;
    $outjson = json_encode($info);
    file_put_contents("music_status/list.json", $outjson);
}
#IFB
function upload_music($song = "Music")
{
    if ($song != "Music" && $song != "Remix") {
        return "Not Match";
        exit();
    }
    //------------------------------------------------------------
    $c = glob("Music/song/*.mp3");
    $find = ['Music/song/', '.mp3'];
    $c = str_replace($find, "", $c);
    $numberOfglob = count($c);
    //------------------------------------------------------------
    if ($numberOfglob == "0") {
        return "دراگ زدی ؟ اهنگی نری اصن";
        exit();
    }
    //------------------------------------------------------------
    if ($numberOfglob == json("Music") && $numberOfglob >= json("Music")) {
        return "";
        exit();
    }
    //------------------------------------------------------------

    foreach ($c as $key => $lists) {
        $iamvar = finder($lists);
        if ($iamvar == "nbod") {
            //------------------------------------------------------------
            $info["link"] = $lists . ".mp3";
            $info["demo"] = "";
            $info["image"] = "";
            $outjson = json_encode($info, true);
            file_put_contents("music_status/$lists.json", $outjson);
            saver($lists);
        }
    }
    #End
}

// Function for encryption using AES with shared secret key 'Mehrab'
function encrypt_data($data)
{
    // Convert data to JSON format
    $json_data = json_encode($data);

    // Generate a random initialization vector
    $iv = openssl_random_pseudo_bytes(16);

    // Encrypt the data using AES-256-CBC algorithm and shared secret key 'Mehrab'
    $encrypted_data = openssl_encrypt($json_data, 'AES-256-CBC', 'Mehrab', OPENSSL_RAW_DATA, $iv);

    // Generate a SHA-256 HMAC for the encrypted data using shared secret key 'Mehrab'
    $hmac = hash_hmac('sha256', $encrypted_data, 'Mehrab');

    // Combine the encrypted data, initialization vector, and HMAC into a single string
    $output = base64_encode($encrypted_data . $iv . $hmac);

    return $output;
}

// Function for decryption using AES with shared secret key 'Mehrab'
function decrypt_data($encrypted_data)
{
    // Decode the input string from base64 format
    $decoded_data = base64_decode($encrypted_data);

    // Extract the encrypted data, initialization vector, and HMAC from the input string
    $iv_length = 16;
    $hmac_length = 64;
    $encrypted_length = strlen($decoded_data) - $iv_length - $hmac_length;
    $encrypted_data = substr($decoded_data, 0, $encrypted_length);
    $iv = substr($decoded_data, $encrypted_length, $iv_length);
    $hmac = substr($decoded_data, $encrypted_length + $iv_length, $hmac_length);

    // Verify the HMAC to ensure data integrity
    $computed_hmac = hash_hmac('sha256', $encrypted_data, 'Mehrab');
    if ($computed_hmac !== $hmac) {
        throw new Exception('HMAC verification failed. The data may have been tampered with.');
    }

    // Decrypt the data using AES-256-CBC algorithm and shared secret key 'Mehrab'
    $json_data = openssl_decrypt($encrypted_data, 'AES-256-CBC', 'Mehrab', OPENSSL_RAW_DATA, $iv);

    // Convert the decrypted JSON data back to its original format
    $data = json_decode($json_data, true);

    return $data;
}

/*
$test = array('mehrab' => 'test AES');
$oh = encrypt_data($test);
echo $oh . "\n";
var_dump(decrypt_data($oh));
*/