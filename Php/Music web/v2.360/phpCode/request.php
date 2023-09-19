<?php

error_reporting(E_ALL);


include('function2.php');
//---------------------------------------------
$agent = $_SERVER['HTTP_USER_AGENT'];
//---------------------------------------------
switch ($_SERVER["REQUEST_METHOD"]) {
    //---------------------------------------------
  case 'GET':
    $get_user = null;
    if ($cookie) {
      if (isset($_GET['user'])) :
        $get_user = "profile";
      elseif (isset($_GET['language'])) :
        $get_user = "language";
      elseif (isset($_GET['theme'])) :
        $get_user = "theme";
      elseif (isset($_GET['channel'])) :
        $get_user = "channel";
      elseif (isset($_GET['upload'])) :
        $get_user = "upload";
      elseif (isset($_GET['username'])) :
        $get_user = "username";
        $username = $_GET['username'];
      elseif (isset($_GET['logout'])) :
        $get_user = "logout";
      elseif (isset($_GET['player'])) :
        $get_user = "player";
      elseif (isset($_GET['song'])) :
        $get_user = "song";
      endif;
    }

    break;
    //---------------------------------------------
  case 'POST':
    // setcookie => <head>
    //---------------------------------------------
    if (post("email_log")) {
      //log in
      //check cookie
      if ($cookie == true) {
        exit('Error!');
      }
      //---------------------------------------------
      // define variables and set to empty values
      $emailErr = $passErr = ""; // Error
      $email = $password = ""; // Value
      //---------------------------------------------
      if (!empty(post("email_log")) && !empty(post("password_log"))) {
        $email = post("email_log");
        $password = post("password_log");
        $userEmail_check = sql_fetch('user', 'email', $email);
        if (!$userEmail_check) {
          $emailErr = "*The email entered is incorrect";
        } else {
          if ($password != $userEmail_check['password']) {
            $passErr = "*Password is wrong";
          }
        }
      } else {
        echo "*";
      }
      //---------------------------------------------
      if ($emailErr == "" && $passErr == "") {
        if (!set_cookie($userEmail_check['cookie'])) {
          exit("Error Cookie");
        }
        echo "Success";
      } else {
        echo $emailErr . $passErr;
      }
    } else if (post("name_up")) {
      // sign up

      if ($cookie == true) {
        exit('Error!');
      }
      //---------------------------------------------
      // define variables and set to empty values
      $nameErr = $emailErr = $passErr = ""; // Error
      $name = $email = $password = ""; // Value
      //---------------------------------------------
      if (!empty(post("name_up")) && strlen(post("name_up")) <= 50) {
        $name = post("name_up");
      } else {
        $nameErr = "*Name is too long";
      }
      //---------------------------------------------
      if (!empty(post("email_up")) && filter_var(post("email_up"), FILTER_VALIDATE_EMAIL)) {
        $email = post("email_up");
        $userEmail_check = sql_fetch('user', 'email', $email);
        if ($userEmail_check) {
          $emailErr = "*This email has already been registered by someone else";
        }
      } else {
        $emailErr = "*This is not a valid email address";
      }
      //---------------------------------------------
      if (!empty(post("password_up")) && strlen(post("password_up")) >= 5) {
        $password = post("password_up");
      } else {
        $passErr = "*Your password must be more than 5 characters";
      }
      //---------------------------------------------
      if ($nameErr == "" && $emailErr == "" && $passErr == "") {
        $today = date("Ymd");
        $login_string = create_hash_code($email . $agent);
        if (!set_cookie($login_string)) {
          exit('Error Cookie');
        }
        $connect->query("INSERT INTO `cookie` (`cookie`, `browser_agent`,`date`) VALUES ('$login_string', '$agent','$today')");
        $connect->query("INSERT INTO `user` (`email`, `name`, `password`, `cookie`) VALUES ('$email', '$name', '$password', '$login_string')");
        echo "Success";
      } else {
        echo $nameErr . $emailErr . $passErr;
      }
      //---------------------------------------------
    } else if (post("officName")) {
      if ($cookie) {
        //---------------------------------------------
        $officNameErr = $bioErr = $channelIDerr = ""; // Error
        $officName = $bio = $channelID = ""; // Value
        //---------------------------------------------
        if (!empty(post("officName")) && strlen(post("officName")) <= 50) {
          $officName = post("officName");
        } else {
          $officNameErr = "*Name is too long";
        }
        //---------------------------------------------
        if (strlen(post("bio")) <= 50) {
          $bio = post("bio");
        } else {
          $bioErr = "*Error";
        }
        //---------------------------------------------
        if (empty(post("channelID"))) {
          $channelIDerr = "*channel id is required";
        } else {
          if (preg_match('/^[a-zA-Z0-9_]+$/', post("channelID"))) {
            $channelID = post("channelID");
            $uz = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE channel = '$channelID'"));
            if (file_exists("../data/ch/" . post("channelID")) || $uz) {
              $channelIDerr = "*This ID has already been used";
            }
          } else {
            $channelIDerr = "*channel id contains invalid characters";
          }
        }
        //---------------------------------------------
        if ($officNameErr == "" && $channelIDerr == "" && $bioErr == "") {
          $hash = create_hash_code($channelID);
          $target_dir = "../data/ch/$channelID/";
          if (mkdir($target_dir) == 1) {
            mkdir($target_dir . 'post');
            mkdir($target_dir . 'trash');
          } else {
            exit('Error To Create Channel');
          }

          //-------------------------------------------------------
          // Create HTML file
          // $html = "<html><head><title>My Page</title></head><body><h1>Hello World!</h1></body></html>";
          // $file = fopen($target_dir . "index.html", "w");
          // fwrite($file, $html);
          // fclose($file);
          $imgfil = basename($_FILES["image_file"]["name"]) ?? null;
          $connect->query("INSERT INTO `channel` (`id`, `name`, `bio`, `image`, `rank`, `owner`) VALUES ('$channelID', '$officName', '$bio', '$imgfil', 'primary-member', '$email_user')");
          $connect->query("UPDATE `user` SET `channel` = '$channelID' WHERE email = '$email_user' LIMIT 1");
          // Create JSON file
          // $data = array("bio" => $bio, "image" => $imgfil, "post" => 0, "followers" => 0, "following" => 0, "rank" => "", "star" => "", "theme" => "");
          // $json = json_encode($data);
          // $file = fopen($target_dir . "my-data.json", "w");
          // fwrite($file, $json);
          // fclose($file);
          //-------------------------------------------------------
          if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
            $target_file = $target_dir . basename($_FILES["image_file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image_file"]["tmp_name"]);
            if ($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image_file"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }

            // Allow certain file formats
            if (
              $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            ) {
              echo "Sorry, only JPG, JPEG, PNG files are allowed.";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "ُSorry, Your photo could not be uploaded";
              // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
                // echo "The file " . htmlspecialchars(basename($_FILES["image_file"]["name"])) . " has been uploaded.";
                echo "OK";
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
            }
          }
        } else {
          echo "*" . $officNameErr . $channelIDerr;
        }
      }
      //---------------------------------------------
    } else if (post("descriptPost")) {

      if ($cookie) {
        //---------------------------------------------
        $descriptPosterr = ""; // Error
        $descriptPost = ""; // Value
        //---------------------------------------------
        if (!empty(post("descriptPost")) && strlen(post("descriptPost")) <= 150) {
          $descriptPost = post("descriptPost");
        } else {
          $descriptPosterr = "*Error";
        }
        //---------------------------------------------
        if ($descriptPosterr == "") {

          // $hashtags = extractHashtags($descriptPost);

          // print_r($hashtags);
          //-------------------------------------------------------
          if (isset($_FILES['filePost']) && $_FILES['filePost']['error'] == UPLOAD_ERR_OK) {

            $file = $_FILES['filePost'];
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_tmp = $file['tmp_name'];
            $file_type = $file['type'];
            $allowed_ext = array('zip', 'png', 'gif', 'jpg', 'jpeg', 'mp3');

            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed_ext)) {
              echo "This file type is not supported";
              exit;
            }
            //---------------------------------------------
            // Handle zip/rar files
            if ($ext == 'zip') {

              $zip_file = $file_tmp;
              $temp_dir = "../data/ch/$channel/post/";

              // Extract all files from zip archive to temporary directory
              $zip = new ZipArchive;
              if ($zip->open($zip_file) === TRUE) {
                $zip->extractTo($temp_dir);
                $zip->close();
              } else {
                die("Unable to extract zip file");
              }

              // Loop through each file in temporary directory
              if ($dir_handle = opendir($temp_dir)) {
                while (($file = readdir($dir_handle)) !== false) {
                  if ($file != "." && $file != "..") {
                    // Check if file is a photo or song
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "mp3") {
                      // File is a photo or song, do nothing
                    } else {
                      // File is not a photo or song, move it to another folder
                      rename($temp_dir . $file, "../data/ch/$channel/trash/" . $file);
                    }
                  }
                }
                closedir($dir_handle);
              }
            }

            // Handle individual files
            else {
              $target_dir = "../data/ch/$channel/post/";
              $target_file = $target_dir . htmlspecialchars(basename($file["name"]));
              if (($file['type'] == 'image/jpeg' || $file['type'] == 'image/png') && getimagesize($file['tmp_name']) !== FALSE) {

                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                  // echo "The file " . htmlspecialchars(basename($_FILES["image_file"]["name"])) . " has been uploaded.";
                  echo "OK";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
              } else if ($file['type'] == 'audio/mpeg') {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                  // echo "The file " . htmlspecialchars(basename($_FILES["image_file"]["name"])) . " has been uploaded.";
                  // $connect->query("INSERT INTO `music` (`name`, `singer`,`link`,`owner`) VALUES ('$login_string', '$agent','$today', '')");
                  if(!file_exists($target_file)){
                    exit("error 404");
                  }
                  $songName = htmlspecialchars(basename($file["name"]));
                  print_r(info_music_ID3($target_file, true));
                  exit;

                  // $cleanedSongName = cleanSongName($songName);
                  // $singer = $cleanedSongName["songName"];
                  // $name = $cleanedSongName["artistName"];
                  // $format = $cleanedSongName["fileFormat"];

// $fileExtension = pathinfo($songName, PATHINFO_EXTENSION);
// $songName = str_replace("." . $fileExtension, "", $songName);

                  $connect->query("INSERT INTO `music` (`name`, `singer`,`album`,`link`,`owner`) VALUES ('$name', '$singer','$songName','$format','$channel')");

                  // print_r($cleanedSongName);
                  // echo $songName;

                  echo "OK";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
              } else {
                echo "Invalid file type 2";
                exit;
              }
            }
          } else {
            echo "Error Uploading!";
          }
        } else {
          echo $channelIDerr;
        }
      }
    }
    break;
}
