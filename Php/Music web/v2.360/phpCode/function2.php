<?php
include('cookie.php');
// function 2 :>

function create_hash_code($val, $hashcode = "sha512")
{
  $hash = hash($hashcode, $val . time());
  return $hash;
}

function post($var)
{
  $pos = test_input($_POST[$var] ?? null);
  return $pos;
}

function extractHashtags($text)
{
  $regex = '/#([a-zA-Z0-9_]+)/';
  preg_match_all($regex, $text, $matches);
  $hashtags = $matches[1];
  return $hashtags;
}

function base64_encode_image($filename = "", $filetype = "")
{
  if (file_exists($filename) && $filename) {
    $imgbinary = fread(fopen($filename, "r"), filesize($filename));
    return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
  } else {
    return 'image/member/member.png';
  }
}

//function for setcookie And Error cookie
function set_cookie($value, $name = 'user_str_session')
{
  $set = setcookie(
    $name,
    $value,
    time() + 60 * 60 * 24 * 30,
    "/",
    "",
    true,
    true
  );
  return $set;
}


// Function written and tested December, 2018
function get_browser_name($user_agent)
{
  // Make case insensitive.
  $t = strtolower($user_agent);

  // If the string *starts* with the string, strpos returns 0 (i.e., FALSE). Do a ghetto hack and start with a space.
  // "[strpos()] may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE."
  //     http://php.net/manual/en/function.strpos.php
  $t = " " . $t;

  // Humans / Regular Users      
  if (strpos($t, 'opera') || strpos($t, 'opr/')) return 'Opera';
  elseif (strpos($t, 'edge')) return 'Edge';
  elseif (strpos($t, 'chrome')) return 'Chrome';
  elseif (strpos($t, 'safari')) return 'Safari';
  elseif (strpos($t, 'firefox')) return 'Firefox';
  elseif (strpos($t, 'msie') || strpos($t, 'trident/7')) return 'Internet Explorer';

  // Search Engines  
  elseif (strpos($t, 'google')) return '[Bot] Googlebot';
  elseif (strpos($t, 'bing')) return '[Bot] Bingbot';
  elseif (strpos($t, 'slurp')) return '[Bot] Yahoo! Slurp';
  elseif (strpos($t, 'duckduckgo')) return '[Bot] DuckDuckBot';
  elseif (strpos($t, 'baidu')) return '[Bot] Baidu';
  elseif (strpos($t, 'yandex')) return '[Bot] Yandex';
  elseif (strpos($t, 'sogou')) return '[Bot] Sogou';
  elseif (strpos($t, 'exabot')) return '[Bot] Exabot';
  elseif (strpos($t, 'msn')) return '[Bot] MSN';

  // Common Tools and Bots
  elseif (strpos($t, 'mj12bot')) return '[Bot] Majestic';
  elseif (strpos($t, 'ahrefs')) return '[Bot] Ahrefs';
  elseif (strpos($t, 'semrush')) return '[Bot] SEMRush';
  elseif (strpos($t, 'rogerbot') || strpos($t, 'dotbot')) return '[Bot] Moz or OpenSiteExplorer';
  elseif (strpos($t, 'frog') || strpos($t, 'screaming')) return '[Bot] Screaming Frog';

  // Miscellaneous 
  elseif (strpos($t, 'facebook')) return '[Bot] Facebook';
  elseif (strpos($t, 'pinterest')) return '[Bot] Pinterest';

  // Check for strings commonly used in bot user agents   
  elseif (
    strpos($t, 'crawler') || strpos($t, 'api') ||
    strpos($t, 'spider') || strpos($t, 'http') ||
    strpos($t, 'bot') || strpos($t, 'archive') ||
    strpos($t, 'info') || strpos($t, 'data')
  ) return '[Bot] Other';

  return 'Other (Unknown)';
}

function get_browser_icon($user_agent)
{
  $browser = get_browser_name($user_agent);
  //<i class="fab fa-edge"></i><i class="fab fa-firefox-browser"></i><i class="fab fa-chrome"></i><i class="fab fa-opera"></i>
  //<i class="fab fa-safari"></i><i class="fab fa-internet-explorer"></i><i class="fas fa-robot"></i><i class="fab fa-bots"></i>
  $name = "";
  if ($browser == 'Opera' || $browser == 'Edge' || $browser == 'Chrome' || $browser == 'Safari') {
    $name = strtolower($browser);
  } else if ($browser == 'Internet Explorer') {
    $name = 'internet-explorer';
  } else if ($browser == 'Firefox') {
    $name = 'firefox-browser';
  } else {
    $name = 'robot';
  }
  return $name;
}
// echo get_browser_name($_SERVER['HTTP_USER_AGENT']);

// for save Song in databass
function cleanSongName($songName)
{

  // Remove words starting with http, https, or www
  $songName = preg_replace('/\b(?:https?|www)\S*\b/', '', $songName);

  // Remove words with a domain at the end
  $songName = preg_replace('/\b\w+\.(?:com|org|net|edu|gov|biz|info|io|ir)\b/', '', $songName);

  // Remove any characters that aren't letters, numbers, or spaces
  $rmv_name = array('[128]', '[320]', '[', ']', '{', '}', '320', '128', 'demo', 'Demo', '_', '=', '+', '*', '$', '#', '(', ')', '.ir', '.com');
  $songName = str_replace($rmv_name, ' ', $songName);

  // Remove extra spaces
  $songName = preg_replace('/\s+/', ' ', trim($songName));

  // Get the file format (assuming it's at the end of the string)
  $fileFormat = pathinfo($songName, PATHINFO_EXTENSION);

  // Remove the file format from the string
  $songName = str_replace('.' . $fileFormat, '', $songName);

  // Split the song name and artist name by the last "-"
  $splitIndex = strrpos($songName, '-');
  if ($splitIndex !== false) {
    $artistName = trim(substr($songName, $splitIndex + 1));
    $songName = trim(substr($songName, 0, $splitIndex));
  } else {
    $artistName = '';
  }

  // Return an array with the cleaned up song name, artist name, and file format
  return array(
    'songName' => $songName,
    'artistName' => $artistName,
    'fileFormat' => $fileFormat
  );
}

// function base64url_encode($data) {
//   return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
// }

// function base64url_decode($data) {
//   return base64_decode(strtr($data, '-_', '+/'));
// }

function truncateText($text, $length)
{
  if (strlen($text) > $length) {
    $text = substr($text, 0, $length) . "...";
  }
  return $text;
}

//music player
function li($image, $name_music, $name_artist, $link)
{
  $li = '
<li class="player__song">
    <img class="player__img img" src="' . $image . '" alt="cover">
    <p class="player__context">
      <b class="player__song-name">' . $name_artist . '</b>
      <span class="flex">
        <span class="player__title">' . $name_music . '</span>
        <span class="player__song-time"></span>
      </span>
    </p>
    <audio class="audio" src="' . $link . '"></audio>
  </li>
';
  return $li;
}

function music($image, $name_music, $name_artist, $link)
{
  $music = '
<!-- Player -->
<div class="player">

<div class="player__header">

  <div class="player__img player__img--absolute slider">

    <button class="player__button player__button--absolute--nw playlist">

      <img src="image/svg/playlist.svg" alt="playlist-icon">

    </button>

    <button class="player__button player__button--absolute--center play">

      <img src="image/svg/play.svg" alt="play-icon">
      <img src="image/svg/pause.svg" alt="pause-icon">

    </button>

    <div class="slider__content">

      <img class="img slider__img" src="image/pic_main_mobile/10.png" alt="cover">
    </div>

  </div>

  <div class="player__controls">

    <button class="player__button back">

      <img class="img" src="image/svg/back.svg" alt="back-icon">

    </button>
    
    <p class="player__context slider__context">

      <strong class="slider__name"></strong>
      <span class="player__title slider__title"></span>

    </p>


    <button class="player__button next">

      <img class="img" src="image/svg/next.svg" alt="next-icon">

    </button>

    <div class="progres">

      <div class="progres__filled"></div>

    </div>

  </div>

</div>

<ul class="player__playlist list">

  ' . li($image, $name_music, $name_artist, $link) . '

</ul>

</div>
';
  return $music;
}

function info_music_ID3($adress_file, $a)
{
  // Include the getID3 library
  if ($a) {
    require_once('../../Path/getID3-1.9.22/getid3/getid3.php');
  } else {
    require_once('Path/getID3-1.9.22/getid3/getid3.php');
  }

  // Initialize getID3
  $getID3 = new getID3;

  // Analyze the audio file and extract metadata
  $file_info = $getID3->analyze($adress_file);

  //photo #long
  // $picture = 'data:image/jpeg;base64,' . $file_info['comments']['picture'][0]['data'];

  //about
  $getid3_meta = $file_info['tags'];

// Get the metadata
$artist = isset($getid3_meta['id3v2']['artist'][0]) ? $getid3_meta['id3v2']['artist'][0] : '';
$title = isset($getid3_meta['id3v2']['title'][0]) ? $getid3_meta['id3v2']['title'][0] : '';
$album = isset($getid3_meta['id3v2']['album'][0]) ? $getid3_meta['id3v2']['album'][0] : '';
$genre = isset($getid3_meta['id3v2']['genre'][0]) ? $getid3_meta['id3v2']['genre'][0] : '';
$year = isset($getid3_meta['id3v2']['year'][0]) ? $getid3_meta['id3v2']['year'][0] : '';
$track_number = isset($getid3_meta['id3v2']['track_number'][0]) ? $getid3_meta['id3v2']['track_number'][0] : '';

// Get the album art
if (isset($fileinfo['comments']['picture'][0]['data'])) {
    $picture = $fileinfo['comments']['picture'][0]['data'];
}


  return array(
    'artist' => $artist,
    'title' => $title,
    'album' => $album,
    // 'picture' => $picture
  );
}

