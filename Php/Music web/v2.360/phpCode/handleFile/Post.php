<?php

ini_set('upload_max_filesize', '100M');
ini_set('post_max_size', '100M');

header('Content-Type: text/plain; charset=utf-8');

try {

    include('../function2.php');

    if(!$cookie || $channel == 'No Channel'){
        throw new RuntimeException('Error!');
    }
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['file']['error']) ||
        is_array($_FILES['file']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['file']['error'] value.
    switch ($_FILES['file']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    $max_size = 100 * 1024 * 1024; // maximum size in bytes (39 MB)
    // You should also check filesize here. 
    if ($_FILES['file']['size'] > $max_size) {
        throw new RuntimeException('Exceeded filesize limit. (39MB)');
    }

    // DO NOT TRUST $_FILES['file']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['file']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'mp3' => 'audio/mpeg',
            'octet-stream' => 'application/octet-stream',
            'zip' => 'application/zip'
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format this:'. $finfo->file($_FILES['file']['tmp_name']));
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['file']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if($ext == 'zip'){
        // Extract all files from zip archive to temporary directory
        $temp_dir = "../../data/ch/$channel/post/archive";
        if(!file_exists("../../data/ch/$channel/post/archive")){
            mkdir("../../data/ch/$channel/post/archive");
        }
        $zip = new ZipArchive;
        if ($zip->open($_FILES['file']['tmp_name']) === TRUE) {
          $zip->extractTo($temp_dir);
          $zip->close();
        } else {
        throw new RuntimeException('Unable to extract zip file.');
        }

        // Loop through each file in temporary directory
        if ($dir_handle = opendir($temp_dir)) {
          while (($file = readdir($dir_handle)) !== false) {
            if ($file != "." && $file != "..") {
              // Check if file is a photo or song
            //   if(filesize($file) >= 40000000){
            //     die('size!' . $file);
            //   }
              $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
              if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "mp3") {
                // File is a photo or song, do nothing
              } else {
                // File is not a photo or song, move it to another folder
                rename($temp_dir . $file, "../../data/ch/$channel/trash/" . $file);
              }
            }
          }
          closedir($dir_handle);
        }
    }else{
        $target_move = sprintf('../../data/ch/'.$channel.'/post/%s.%s',
    sha1_file($_FILES['file']['tmp_name']), $ext);
    if (!move_uploaded_file(
        $_FILES['file']['tmp_name'],
        $target_move
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    }
    

    function display_filesize($filesize){
    
        if(is_numeric($filesize)){
        $decr = 1024; $step = 0;
        $prefix = array('Byte','KB','MB','GB','TB','PB');
            
        while(($filesize / $decr) > 0.9){
            $filesize = $filesize / $decr;
            $step++;
        } 
        return round($filesize,2).' '.$prefix[$step];
        } else {
    
        return 'NaN';
        }
        
    }
    
    $inf_id3 = info_music_ID3($target_move, true);
    $name = $inf_id3['title'];
    $singer = $inf_id3['artist'];
    $album = $inf_id3['album'];
$target_move = str_replace('../../', '', $target_move);
    $connect->query("INSERT INTO `music` (`name`, `singer`,`album`,`link`,`owner`) VALUES ('$name', '$singer','$album','$target_move','$channel')");

    $echo = array(
        'size' => display_filesize($_FILES['file']['size']),
        'message' => 'Success',
        'format' => $ext
    );
    echo json_encode($echo);

} catch (RuntimeException $e) {

    echo $e->getMessage();

}

?>