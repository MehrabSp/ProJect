<?php

$image_user = $user_info_check['image'] ?? null;
if($image_user) $image_user = "image/member/" . $image_user;
      $name_user = $user_info_check['name'];
      $email_user = $user_info_check['email'];
      $rank_user = $user_info_check['rank'] ?? null;
      $channel = $user_info_check['channel'] ?? "No Channel";
      //---------------------------------------------
      if($channel != "No Channel"){
          $channel_inf = sql_fetch('channel', 'id', $channel);
          $name_ch = $channel_inf['name'];
      }
      //---------------------------------------------
      $cookie = true;
      // remove remember in signup (auto remember and => logout)
      // setcookie("user_str_session", "", time() - 3600, "/");