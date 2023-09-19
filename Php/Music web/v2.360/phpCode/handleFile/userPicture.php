<?php
include('function2.php');
if ($cookie) {
    if (isset($_FILES['file'])) {
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $tmp = explode('.', $file_name);
$file_ext = end($tmp);

        $extensions = array("png", "jpg", "jpeg");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose an MP3 file.";
        }

        if ($file_size > 10 * 1024 * 1024) {
            $errors[] = 'File size must be less than 10 MB';
        }

        if (empty($errors) == true) {
            $hash_img = create_hash_code($file_name, 'sha256') . "." . $file_ext;
            if($user_info_check['image'] != null){
              unlink("../../image/member/" . $user_info_check['image']);
            }
            move_uploaded_file($file_tmp, "../image/member/" . $hash_img);
            $connect->query("UPDATE `user` SET `image` = '$hash_img' WHERE `cookie` = '$user_str_session' LIMIT 1");
            echo "Success";
        } else {
            echo implode(", ", $errors);
        }
    }
}
