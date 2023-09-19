<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_v.css?v=1.1">
    <link rel="stylesheet" href="style/style_load.css">
    <title>Document</title>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $g = htmlspecialchars($_GET["v"]);
    // $s = ['/', '\\', '\'', '*', '{', '}', '[', ']', '"', '<', '>'];
    // $c = str_replace($s, "", $g);
    if (!empty($g) && strlen($g) >= 2 && strlen($g) <= 50) {
        $get = @json_decode(file_get_contents("music_status/$g.json"), true);
        $link = @$get["link"];
        if($link != null){
            echo music("image/pic_main_mobile/10.png", $g, "Mehrab", "Music/song/$g.mp3");
        }else{
            echo "not found";
            exit();
        }
    }else{
        exit();
    }
}
?>
</body>
</html>

<!-- Siiiiiiiii -->

<?php
function li($image, $name_music, $name_artist, $link)
{
$li = '
<li class="player__song">
    <img class="player__img img" src="'.$image.'" alt="cover">
    <p class="player__context">
      <b class="player__song-name">'.$name_artist.'</b>
      <span class="flex">
        <span class="player__title">'.$name_music.'</span>
        <span class="player__song-time"></span>
      </span>
    </p>
    <audio class="audio" src="'.$link.'"></audio>
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

  '.li($image, $name_music, $name_artist, $link).'

</ul>

</div>
<!-- Partial -->
<script src="style/script_v.js?v=1"></script>
';
return $music;
}


  // Set the maximum execution time to unlimited
  set_time_limit(0);

  // Start the search operation
  $search_result = search_operation();

  function load()
  {
    $load = '<div class="load"><hr /><hr /><hr /><hr /></div>
    ';
    echo $load;
  }
  // Function to perform the search operation

  function search_operation()
  {
    // Initialize the progress bar
    $total_items = 1000;
    $current_item = 0;

    // Loop through the items to be searched
    for ($i = 1; $i <= $total_items; $i++) {
      if ($i == 1) {
        load();
      }
      // Perform the search operation on each item
      $current_item++;
      $percent_complete = round(($current_item / $total_items) * 100);
      if ($percent_complete == 100) {
        echo '<script>document.querySelector(".load").remove();</script>';
        break;
      }
      ob_flush();
      flush();
    }

    // Return the search result
    // return "Search completed successfully.";
  }
  
?>