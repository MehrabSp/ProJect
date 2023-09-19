<?php
//cookie
include('function1.php');
//---------------------------------------------
$cookie = null;
$user_str_session = test_input($_COOKIE['user_str_session'] ?? null);
$user_theme = test_input($_COOKIE['theme'] ?? null);
//---------------------------------------------
if ($user_str_session != null && isset($user_str_session)) {
  //---------------------------------------------
  $cookie_check = sql_fetch('cookie', 'cookie', $user_str_session);
  $user_info_check = sql_fetch('user', 'cookie', $user_str_session);
  //---------------------------------------------
  if ($cookie_check && $user_info_check) {
    //---------------------------------------------
    include('trueCookie.php');
    //---------------------------------------------
  }
}
//---------------------------------------------
if ($user_theme != null && isset($user_theme)) {

  $user_theme_check = sql_fetch('theme', 'id', $user_theme);
  $type = $user_theme_check['type'];
  $bg = $user_theme_check['bg'];
  if (strpos($bg, '-') !== false) {
    $words = explode('-', $bg);
    $dir = trim($words[0]);
    $bg = trim($words[1]);
  }
  $border = $user_theme_check['border'];
  $surface = $user_theme_check['surface'];
  $text_primary = $user_theme_check['text-primary'];
  $text_secondary = $user_theme_check['text-secondary'];
  $primary = $user_theme_check['primary'];
  $text_inverse = $user_theme_check['text-inverse'];
  if ($type == "linear") {
    $dir = $dir ?? null;
    $nonNullVariables = array_filter([$dir, $bg, $border, $surface, $text_primary, $text_secondary, $primary, $text_inverse]); // remove null values
    $cama = implode(", ", $nonNullVariables); // concatenate with separator
    $cama = str_replace('^', ' ', $cama);

    $bg = "linear-gradient($cama)";
  }
  if ($user_theme_check) {
    $theme = ":root {
        --bg: $bg;
        --border: $border;
        --surface: $surface;
        --text-primary: $text_primary;
        --text-secondary: $text_secondary;
        --primary: $primary;
        --text-inverse: $text_inverse;
      }";
  } else {

    $theme = ':root {
        --bg: #101214;
        --border: #22272b;
        --surface: #161a1d;
        --text-primary: #dee4ea;
        --text-secondary: #738496;
        --primary: #1d7afc;
        --text-inverse: #ffffff;
      }';
  }
} else {
  $theme = ':root {
        --bg: #101214;
        --border: #22272b;
        --surface: #161a1d;
        --text-primary: #dee4ea;
        --text-secondary: #738496;
        --primary: #1d7afc;
        --text-inverse: #ffffff;
      }';
}
