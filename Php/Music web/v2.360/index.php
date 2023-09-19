<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- MRB  -->

<head>
  <title>Quick - Music</title>
  <link rel="shortcut icon" href="image/Quick-dark.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="keywords" content="Quick Music">
  <meta name="description" content="Advanced and fast search with Quick Music">
  <meta name="author" content="Mehrab">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <!-- style -->
  <link rel="stylesheet" href="style/styleMs.css?v=2.0.2.3">

  <!-- <script>
    //theme
    var theme = localStorage.getItem('bg');
    if (theme != null) {
      const stylesheet = document.styleSheets[1];
      stylesheet.cssRules[2].style.background = theme;
    }

  </script> -->

  <?php include('phpCode/request.php') ?>

  <style>
    <?= $theme ?>#cd-container {
      position: fixed;
      top: 10px;
      right: 10px;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-image: url('image/pic_main_mobile/1.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      cursor: pointer;
      transition: all 0.5s ease;
      box-shadow: 0 0 10px #fff;
      animation: rotate 8s linear infinite;
    }

    #cd-container.open {
      width: 300px;
      height: 300px;
      border-radius: 0;
      background-image: none;
      transition: all 0.5s ease;
      border-color: #fff;
      box-shadow: 0 0 18px #fff, inset 0 0 18px #fff;
      -webkit-animation: box-shadow-animation 3s linear 1.5s infinite;
    }

    .cd-container-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
    }

    #cd-container.open img {
      display: unset;
    }

    #cd-container .text {
      display: none;
    }

    #cd-container.open .text {
      display: block;
    }

    @keyframes box-shadow-animation {
      0% {
        box-shadow: 0 0 18px #fff, inset 0 0 18px #fff;
      }

      50% {
        box-shadow: 0 0 36px #fff, inset 0 0 32px #fff;
      }

      100% {
        box-shadow: 0 0 18px #fff, inset 0 0 18px #fff;
      }
    }

    .marquee-container {
      width: 100%;
      /* Set to desired width */
      overflow: hidden;
    }

    .marquee-text {
      font-size: 20px;
      /* Set to desired size */
      text-align: center;
      animation: marquee 8s linear infinite;
    }

    @keyframes marquee {
      0% {
        transform: translateX(100%);
      }

      100% {
        transform: translateX(-100%);
      }
    }
  </style>

  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style/style-UI-player.css?v=1.0.2">
</head>

<body>
  <div id="app">

    <?php
    // print_r($_COOKIE);
    //default song
    // $songs = json_encode([[
    //   'id'=> 1,
    //   'title'=> "Wow",
    //   'artist'=> "Post Malone",
    //   'album'=> "",
    //   'url'=>
    //   "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882863/audio/Post_Malone_-_Wow._playvk.com.mp3",
    //   'cover_art_url'=>
    //   "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884701/audio/album%20arts/s-l300.jpg" ]]);
    // $text = "This_is_a_test@123";
    // if (preg_match('/^[a-zA-Z0-9_@]+$/', $text)) {
    //     echo "The text is valid";
    // } else {
    //     echo "The text contains invalid characters";
    // }

    ?>
    <div class="load">
      <hr />
      <hr />
      <hr />
      <hr />
    </div>

    <?php

    if ($cookie)
      include('htmlCode/sidenavTrue.php');
    else
      include('htmlCode/modalnavFalse.php')

    ?>

    <div class="container-lg">
      <!-- Navbar -->
      <nav id="navbar" class="navbar navbar-expand-lg navbar-light" style="background-color: var(--nav-color);">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <?php
          if ($cookie)
            include('htmlCode/navbarTrue.php');
          else
            include('htmlCode/navbarFalse.php')
          ?>
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background: var(--nav-color-two);">
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/music?">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="/music?" class="adress-bc">Music</a>
              </li>
              <!-- <li class="breadcrumb-item active" aria-current="page">
          <a href="#">Data</a>
        </li> -->
            </ol>
          </nav>
        </div>
      </nav>
      <!-- Navbar -->
    </div>

    <div class="container-lg">
      <?php
      $adress = null;
      switch ($get_user ?? null) {
          // -------------------------------------------------
        case 'profile':
          $parts = explode("@", $email_user);
          $username = $parts[0];
          $domain = $parts[1];

          $hidden_username = substr_replace($username, str_repeat("*", strlen($username) - 2), 1, -1);
          $hidden_email = $hidden_username . "@" . $domain;

          $img_tr = truncateText($image_user, 40);
          $adress = "Profile";
          include('htmlCode/profileUser.php');
          break;
          // -------------------------------------------------
        case 'language':
          $adress = "Language";
          include('htmlCode/language.php');
          break;
          // -------------------------------------------------
        case 'theme':
          $adress = "Theme";
          include('htmlCode/theme2.php');
          //     $info = json_decode(file_get_contents("data/theme2.json"), true);
          // $info["dark"]["dark"] = array(
          //   'bg' => '#101214',
          //   'border' => '#22272b',
          //   'surface' => '#161a1d',
          //   'text-primary' => '#dee4ea',
          //   'text-secondary' => '#738496',
          //   'primary' => '#1d7afc',
          //   'text-inverse' => '#ffffff'
          // );
          // $info["sunset"]["sunset"] = array(
          //   'bg' => '#151c19',
          //   'border' => '#424f4a',
          //   'surface' => '#2f3834',
          //   'text-primary' => '#ecd2c5',
          //   'text-secondary' => '#c0ab92',
          //   'primary' => '#c0ab92',
          //   'text-inverse' => '#151c19'
          // );
          // $info["sunrise"]["sunrise"] = array(
          //   'bg' => '#ecd2c5',
          //   'border' => '#d7c9c6',
          //   'surface' => '#f3e8e5',
          //   'text-primary' => '#4f2733',
          //   'text-secondary' => '#685844',
          //   'primary' => '#a04d66',
          //   'text-inverse' => '#f3e8e5'
          // );
          // $info["light"]["light"] = array(
          //   'bg' => '#f7f8f9',
          //   'border' => '#f1f2f4',
          //   'surface' => '#ffffff',
          //   'text-primary' => '#091e42',
          //   'text-secondary' => '#626f86',
          //   'primary' => '#1d7afc',
          //   'text-inverse' => '#ffffff'
          // );
          // $outjson = json_encode($info);
          // file_put_contents("data/theme2.json", $outjson);
          break;
          // -------------------------------------------------
        case 'player':
          $adress = "Player";
          $gt = $_GET['player'];
          include('htmlCode/player.php');
          break;
          // -------------------------------------------------
        case 'song':
          $adress = "song";
          $gt = $_GET['song'];
          // include('htmlCode/player.php');//add index
          break;
          // -------------------------------------------------
        case 'channel':
          $adress = "Channel";
          if ($channel != "No Channel") {
            include('htmlCode/channelCard.php');
          } else {
            include('htmlCode/createChannel.php');
          }
          break;
          // -------------------------------------------------
        case 'upload':
          if ($channel != "No Channel") {
            include('htmlCode/uploadFile.php');
          } else {
            include('htmlCode/createChannel.php');
          }
          break;
          // -------------------------------------------------
        case 'logout':
          unset($_COOKIE['user_str_session']);
          setcookie("user_str_session", "", time() - 3600, "/");
          echo "<script>location.href = '?';</script>";
          break;
          // -------------------------------------------------
        case 'username':
          $ch = sql_fetch('channel', 'id', $username);
          // -------------------------------------------------
          // check if the user page exists in the user folder
          if (file_exists("data/ch/$username/") && $ch) {
            // -------------------------------------------------
            $ch_owner = $ch['owner'];
            $ch_name = $ch['name'];
            $ch_bio = $ch['bio'];
            $ch_post = $ch['post'] ?? 0;
            $ch_followers = $ch['followers'] ?? 0;
            $ch_following = $ch['following'] ?? 0;
            $ch_image = $ch['image'];
            $ch_rank = $ch['rank'];
            $rank = "";
            // -------------------------------------------------
            $uz = sql_fetch('user', 'email', $ch_owner);
            if ($uz['cookie'] == $_COOKIE['user_str_session']) {
              echo "your owner";
            }
            // -------------------------------------------------
            if ($ch_image == '') {
              $ch_image = 'Null_Null';
            }
            // -------------------------------------------------
            // var_dump(glob("data/ch/$username/post/*"));
            // Query the database for rows with owner as "Quick"
            $sql = "SELECT * FROM music WHERE owner = '$channel'";
            $result = mysqli_query($connect, $sql);

            if ($ch_rank) {
              $parts = explode(", ", $ch_rank);

              foreach ($parts as $part) {
                $values = explode("-", $part);
                $class = "badge badge-" . $values[0];
                $label = $values[1];
                $rank = "<span class=\"$class\">$label</span>\n";
              }
            }

            // -------------------------------------------------
            // display the user page
            include('htmlCode/userpage.php');
          } else {
            // display an error message
            include('htmlCode/notfound.php');
          }
          break;

        default:
          $adress = "Music";
          include('htmlCode/quickMusic.php');
          break;
      }
      ?>
    </div>


    <section class="">
      <!-- Footer -->
      <footer class="text-center text-white" style="background-color: rgba(0, 0, 0, 0.2);">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: CTA -->
          <section class="">
            <p class="d-flex justify-content-center align-items-center">
              <span class="me-3">Register for free</span>
              <button type="button" class="btn btn-outline-light btn-rounded">
                Sign up!
              </button>
            </p>
          </section>
          <!-- Section: CTA -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          Designed & Developed by T.me/Merab_sp
          2023 © 2022 Copyright:
          <a class="text-white" href="?">Quick-Music.com</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->
    </section>

    <div class="music-player">

      <!-- the playlist -->
      <div class="container">
        <transition name="height">
          <div class="playlist" :class="showPlaylist?'show':'hide'" v-if="showPlaylist">
            <div class="wrap">
              <div class="song-wrap" v-for="song in playlist.songs" @click="play(song)">
                <div class="song-details" style="display: flex; align-content: space-between">
                  <div>
                    <span class="play">

                      <i class="icon ion-ios-pause" v-if="isPlaying && (currentSong.id === song.id )"></i>
                      <i class="icon ion-ios-play" v-else></i>
                    </span> {{song.title}}
                  </div>
                  <div>
                    <span>
                      <img class="music-bars-gif" src="image/animated-sound-bars.gif" v-if="isPlaying && (currentSong.id === song.id )" />
                    </span> {{song.artist}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>
      <!-- end of playlist -->

      <!-- the audio player code starts here -->
      <div class="player" id="player">

        <div class="container">

          <div class="player-contents-wrap">

            <div class="album-art">
              <img :src="currentSong.cover_art_url" class="img" />
            </div>

            <div class="main-controls ">
              <div class="controls">

                <i class="fas fa-step-backward" @click="skip('backward')"></i>

                <i class="fas fa-play" v-if="!isPlaying" @click="playCurrentSong"></i>
                <i class="fas fa-pause" v-else @click="pause"></i>

                <i class="fas fa-step-forward" @click="skip('forward')"></i>

              </div>

              <div class="seek">
                <div class="title-and-time">

                  <div class="title">
                    {{currentSong.title}}: {{currentSong.artist}}
                  </div>

                  <div class="time">
                    {{currentPlayedTime}} / {{duration}}
                  </div>
                </div>

                <div class="progress-container">
                  <div class="progress" id="progress-wrap">

                    <div class="progress-handle" :style="{left:progressPercentageValue}"></div>

                    <div class="transparent-seeker-layer" @click="seek"></div>

                    <div class="bar" :style="{width:progressPercentageValue}">

                    </div>
                  </div>

                </div>

                <div class="extra-controls">

                  <div class="playlist-icon" @click="toggleShowPlaylist">
                    <i class="fas fa-list"></i>
                  </div>

                  <div class="repeat">
                    <div class="repeat-info" v-if="onRepeat">
                      {{loop.value}}
                    </div>
                    <i class="icon ion-ios-repeat" @click="repeat"></i>
                  </div>

                  <div class="shuffle-icon">

                    <i class="icon ion-ios-shuffle" @click="shuffleToggle"></i>
                  </div>



                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
      <!-- the audio player code ends here -->

    </div>

    <audio :loop="innerLoop" ref="audiofile" :src="defaultSong" preload style="display: none" controls></audio>



    <div id="cd-container">
      <div class="bg"></div>
      <img class="cd-container-image" :src="currentSong.cover_art_url" alt="">
      <div class="text">

        <div style="position: absolute; bottom: 0;">

          <div class="marquee-container">
            <div class="marquee-text">{{currentPlayedTime}} / {{duration}} {{currentSong.title}}: {{currentSong.artist}}</div>
          </div>

          <transition name="height">
            <div class="playlist" :class="showPlaylist?'show':'hide'" v-if="showPlaylist">
              <div class="wrap">
                <div class="song-wrap" v-for="song in playlist.songs" @click="play(song)">
                  <div class="song-details" style="display: flex; align-content: space-between">
                    <div>
                      <span class="play">

                        <i class="icon ion-ios-pause" v-if="isPlaying && (currentSong.id === song.id )"></i>
                        <i class="icon ion-ios-play" v-else></i>
                      </span> {{song.title}}
                    </div>
                    <div>
                      <span>
                        <img class="music-bars-gif" src="image/animated-sound-bars.gif" v-if="isPlaying && (currentSong.id === song.id )" />
                      </span> {{song.artist}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </transition>

        </div>

        <div class="bg-dark">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-center" style="height: 60px;">
              <div class="col-auto">
                <i class="fas fa-random text-white order-1 mx-4"></i>
                <i class="fas fa-step-backward text-white fa-lg" @click="skip('backward')"></i>
                <i class="fas fa-play text-white mx-4 fa-lg" v-if="!isPlaying" @click="playCurrentSong"></i>
                <i class="fas fa-pause text-white mx-4 fa-lg" v-else @click="pause"></i>
                <i class="fas fa-step-forward text-white fa-lg" @click="skip('forward')"></i>
                <i class="fas fa-redo text-white order-2 mx-4"></i>
              </div>
              <div class="col-auto">
                <div class="progress" style="height: 2px; position: absolute; top: 0; left: 0; right: 0;">
                  <div class="progress-bar bg-gradient" role="progressbar" :style="{width:progressPercentageValue}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="position-absolute top-0 start-0 bottom-0 end-0" style="background-color: #181818; opacity: 0;"></div>
                <!-- <div class="position-absolute top-0 start-0 bottom-0 end-0 d-flex align-items-center justify-content-center" style="color: #007bff;">
          <i class="fas fa-play-circle"></i>
        </div>  -->
              </div>
              <div class="col-auto ml-auto position-absolute" style="right: 1.5%;">
                <div class="position-relative">
                  <i class="fas fa-list text-white" @click="toggleShowPlaylist"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">1</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

  <!-- Custom scripts -->

  <script type="text/javascript">
    <?php
    if ($adress != null) {
      echo "document.querySelector('.adress-bc').textContent = '$adress';";
    }
    ?>

    function regtr(val) {
      if (val == 'rg') {
        document.getElementById('tab-register').click();
      } else if (val == 'lg') {
        document.getElementById('tab-login').click();
      }
    }
  </script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

  <!-- jquery -->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script id="rendered-js">
    $(document).ready(function() {
      <?php
      if ($get_user == "theme") :
        echo "$('.setlibg').click(function() {
        const bg = this.style.background;
        const stylesheet = document.styleSheets[1];
      stylesheet.cssRules[2].style.background = bg;
        localStorage.setItem('bg', bg);
      });";
      endif;
      ?>
    });
    //# sourceURL=pen.js
  </script>
  <script src="style/script_ms.js?v=2.4.7.5"></script>

  <?php if ($cookie) { ?>
    <!-- Sidenav -->
    <link rel="stylesheet" href="style/sidenav/mdb.min.css?v=2.0.1.1">
    <!-- PRISM -->
    <link rel="stylesheet" href="style/sidenav/new-prism.css">
    <script src="style/sidenav/clipboard.min.js"></script>
    <!-- PRISM -->
    <script type="text/javascript" src="style/sidenav/new-prism.js"></script>
    <!-- MDB SNIPPET -->
    <script type="text/javascript" src="style/sidenav/mdbsnippet.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="style/sidenav/mdb.min.js"></script>

    <!-- Motarjem -->
    <!-- <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'en'
        }, 'google_translate_element');
      }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

  <?php } ?>


  <script src="style/script-UI.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.min.js'></script>
  <script id="rendered-js">
    let vue = new Vue({
      el: "#app",
      data: {
        defaultSong: "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882863/audio/Post_Malone_-_Wow._playvk.com.mp3",
        isPlaying: false,
        isLoaded: false,
        isCurrentlyPlaying: "",
        onRepeat: false,
        shuffle: false,

        loop: {
          state: false,
          value: 1
        },


        durationSeconds: 0,
        currentSeconds: 0,
        audioPlayer: undefined,
        previousVolume: 35,
        volume: 100,
        autoPlay: false,
        progressPercentageValue: "0%",

        songs: [],



        playlist: {
          currentIndex: 0,

          songs: [{
            id: 1,
            title: "Wow",
            artist: "Post Malone",
            album: "",
            url: "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882863/audio/Post_Malone_-_Wow._playvk.com.mp3",
            cover_art_url: "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884701/audio/album%20arts/s-l300.jpg"
          }]
        },



        previousPlaylistIndex: 0,
        hasNext: false,
        originalSongArray: [],

        currentSong: {
          id: "",
          title: "",
          artist: "",
          album: "",
          url: "",
          cover_art_url: ""
        },


        /** ui control variables*/

        showPlaylist: false
      },


      created() {
        this.innerLoop = this.loop.state;
      },

      mounted() {
        this.songs = <?= $songs ?? '[{
            id: 1,
            title: "Wow",
            artist: "Post Malone",
            album: "",
            url: "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882863/audio/Post_Malone_-_Wow._playvk.com.mp3",
            cover_art_url: "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884701/audio/album%20arts/s-l300.jpg"
          }]'; ?>;
        this.audioPlayer = this.$el.querySelectorAll("audio")[0];
        this.initPlayer();
      },

      methods: {
        /** UI control methods
         * these methods are used to control the ui*/

        toggleShowPlaylist() {
          this.showPlaylist = !this.showPlaylist;
        },

        /**Music player methods
         * these methods are used to control the music player*/

        initPlayer() {
          this.audioPlayer.src = this.playlist.songs[0].url;
          this.setCurrentSong(this.playlist.songs[0]);

          this.audioPlayer.addEventListener("timeupdate", this.updateTimer);
          this.audioPlayer.addEventListener("loadeddata", this.load);
          this.audioPlayer.addEventListener("pause", () => {
            this.isPlaying = false;
          });
          this.audioPlayer.addEventListener("play", () => {
            this.isPlaying = true;
          });

          this.audioPlayer.addEventListener("ended", this.playNextSongInPlaylist);
        },

        play(song = {}) {
          if (typeof song === "object") {
            if (this.isLoaded) {
              //check if song exists in playlist

              if (this.currentSong.id === song.id && this.isPlaying) {
                this.pause();
              } else if (this.currentSong.id === song.id && !this.isPlaying) {
                this.playCurrentSong();
              } else if (this.currentSong.id !== song.id) {
                if (!this.containsObjectWithSameId(song, this.playlist.songs)) {
                  this.addToPlaylist(song);
                } else {
                  console.log("playMethod", "song already in playlist");
                }

                this.setAudio(song.url);
                this.setCurrentSong(song);
                this.playlist.currentIndex = this.getObjectIndexFromArray(
                  song,
                  this.playlist.songs);

                this.previousPlaylistIndex = this.playlist.currentIndex;
                this.audioPlayer.play();
              }
            } else {
              this.setAudio(song.url);
              this.audioPlayer.play();
              console.log('test')
            }

            this.isPlaying = true;
          } else {
            throw new Error("Type Error : Song must be an object");
          }
        },

        playCurrentSong() {
          this.audioPlayer.play();
          this.isPlaying = true;
        },

        stop() {
          this.audioPlayer.currentTime = 0;
        },

        pause() {
          this.audioPlayer.pause();
          this.isPlaying = false;
        },

        repeat() {
          if (!this.loop.state && !this.onRepeat) {
            //firstclick
            this.loop.state = true;
            this.loop.value = 1;
            this.onRepeat = true;
          } else if (this.loop.state && this.onRepeat && this.loop.value === 1) {
            //second click
            this.loop.state = true;
            this.loop.value = "all";
            this.onRepeat = true;
          } else if (
            this.loop.state &&
            this.onRepeat &&
            this.loop.value === "all") {
            this.loop.state = false;
            this.loop.value = 1;
            this.onRepeat = false;
          }
        },

        skip(direction) {
          if (direction === "forward") {
            this.playlist.currentIndex += 1;
          } else if (direction === "backward") {
            this.playlist.currentIndex -= 1;
          }

          /**if the current Index of the playlist is greater or equal to the length of the playlist songs (the index is out of range)
           reset the index to 0. It could also mean that the playlist is at its end. */

          if (this.playlist.currentIndex >= this.playlist.songs.length) {
            this.playlist.currentIndex = 0;
          }

          if (this.playlist.currentIndex < 0) {
            this.playlist.currentIndex = this.playlist.songs.length - 1;
          }

          this.audioPlayer.src = this.playlist.songs[
            this.playlist.currentIndex].
          url;
          this.setCurrentSong(this.playlist.songs[this.playlist.currentIndex]);

          //the code below checks if a song is playing so it can go ahead and auto play
          if (this.isPlaying) {
            this.audioPlayer.play();
          }
        },

        mute() {
          //this.muted is a computed variable available down below

          if (this.muted) {
            return this.volume = this.previousVolume;
          } else {
            this.previousVolume = this.volume;
            this.volume = 0;
          }
        },

        updateTimer() {
          this.currentSeconds = parseInt(this.audioPlayer.currentTime);
          this.progressPercentageValue =
            (this.currentSeconds / parseInt(this.audioPlayer.duration) * 100 || 0) +
            "%";
        },

        seek(e) {
          if (this.isLoaded) {
            let el = e.target.getBoundingClientRect();
            let seekPos = (e.clientX - el.left) / el.width;
            let seekPosPercentage = seekPos * 100 + "%";

            /**
             *  calculating the portion of the song based on where the user clicked
             *
             */

            let songPlayTimeAfterSeek = parseInt(
              this.audioPlayer.duration * seekPos);


            this.audioPlayer.currentTime = songPlayTimeAfterSeek;

            this.progressPercentageValue = seekPosPercentage;
            console.log(this.progressPercentageValue);
          } else {
            throw new Error("Song Not Loaded");
          }
        },

        addAndPlayNext() {
          let selectedSong = {
            title: "Song Name 3",
            artist: "Artist Name",
            album: "Album Name",
            url: "./song2.mp3",
            cover_art_url: "/cover/art/url.jpg",
            isPlaying: false
          };


          //add the song to the playlist

          //get the index of the song that is currently being played in the player

          //insert the song at that position

          let indexOfCurrentSong = this.playlist.currentIndex;

          this.playlist.songs.splice(indexOfCurrentSong + 1, 0, selectedSong);
        },

        addToPlaylist(song) {
          this.playlist.songs.unshift(song);
        },

        dragSeek(e) {
          let el = e.target.getBoundingClientRect();
        },

        playNextSongInPlaylist() {
          if (this.onRepeat && this.loop.value === 1) {
            this.audioPlayer.play();
          } else {
            if (this.playlist.songs.length > 1) {
              if (this.random) {
                //generate a random number
                let randomNumber = this.generateRandomNumber(
                  0,
                  this.playlist.songs.length - 1,
                  this.previousPlaylistIndex);


                //set the current index of the playlist
                this.playlist.currentIndex = randomNumber;

                //set the src of the audio player
                this.audioPlayer.src = this.playlist.songs[
                  this.playlist.currentIndex].
                url;
                //set the current song
                this.setCurrentSong(
                  this.playlist.songs[this.playlist.currentIndex]);

                //begin to play
                this.audioPlayer.play();
              } else {
                /**if the current Index of the playlist is equal to the index of the last song played skip that song
                 and add 1*/

                if (this.playlist.currentIndex === this.previousPlaylistIndex) {
                  //increment the current index of the playlist by 1
                  this.playlist.currentIndex += 1;
                }

                /**if the current Index of the playlist is greater or equal to the length of the playlist songs (the index is out of range)
                 reset the index to 0. It could also mean that the playlist is at its end. */

                if (this.playlist.currentIndex >= this.playlist.songs.length) {
                  if (this.onRepeat && this.loop.value === "all") {
                    //if repeat is on then replay from the top
                    this.playlist.currentIndex = 0;
                  } else {
                    return;
                  }
                }

                this.audioPlayer.src = this.playlist.songs[
                  this.playlist.currentIndex].
                url;
                this.setCurrentSong(
                  this.playlist.songs[this.playlist.currentIndex]);

                this.audioPlayer.play();
                this.playlist.currentIndex++;
              }
            } else {}
          }
        },

        shuffleToggle() {
          //shuffle the playlist songs and rearrange
          this.playlist.songs = this.shuffleArray(this.playlist.songs);

          //reset the playlist index when changed and rest the previous playlist index
          this.playlist.currentIndex = this.getObjectIndexFromArray(
            this.currentSong,
            this.playlist.songs);

          this.previousPlaylistIndex = this.playlist.currentIndex;
        },

        /** Helper methods
         * these methods are usually used within other methods*/

        formatTime(secs) {
          var minutes = Math.floor(secs / 60) || 0;
          var seconds = Math.floor(secs - minutes * 60) || 0;
          return minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
        },

        setAudio(song) {
          this.audioPlayer.src = song;
        },

        load() {
          if (this.audioPlayer.readyState >= 2) {
            this.isLoaded = true;
            this.durationSeconds = parseInt(this.audioPlayer.duration);
          } else {
            throw new Error("Failed to load sound file.");
          }
        },

        playlistHelper() {},

        containsObjectWithSameId(obj, list) {
          let i;
          for (i = 0; i < list.length; i++) {
            if (window.CP.shouldStopExecution(0)) break;
            if (list[i].id === obj.id) {
              return true;
            }
          }
          window.CP.exitedLoop(0);
        },

        getObjectIndexFromArray(obj, list) {
          //this function just returns the index of the item with the id
          let i;
          for (i = 0; i < list.length; i++) {
            if (window.CP.shouldStopExecution(1)) break;
            if (list[i].id === obj.id) {
              return i;
            }
          }
          window.CP.exitedLoop(1);
        },

        setCurrentSong(song) {
          this.currentSong.id = song.id;
          this.currentSong.title = song.title;
          this.currentSong.artist = song.artist;
          this.currentSong.album = song.album;
          this.currentSong.url = song.url;
          this.currentSong.cover_art_url = song.cover_art_url;

          this.previousPlaylistIndex = this.playlist.currentIndex;
        },

        generateRandomNumber(min, max, except) {
          let num = null;
          num = Math.floor(Math.random() * (max - min + 1)) + min;
          return num === except ? this.generateRandomNumber(min, max, except) : num;
        },

        shuffleArray(array) {
          let ctr = array.length;
          let temp;
          let index;

          // While there are elements in the array
          while (ctr > 0) {
            if (window.CP.shouldStopExecution(2)) break;
            // Pick a random index
            index = Math.floor(Math.random() * ctr);
            // Decrease ctr by 1
            ctr--;
            // And swap the last element with it
            temp = array[ctr];
            array[ctr] = array[index];
            array[index] = temp;
          }
          window.CP.exitedLoop(2);
          return array;
        }
      },


      computed: {
        currentPlayedTime() {
          return this.formatTime(this.currentSeconds);
        },
        duration() {
          return this.formatTime(this.durationSeconds);
        },
        progressPercentage() {
          return parseInt(this.currentSeconds / this.durationSeconds * 100);
        },
        muted() {
          //this returns true or false
          return this.volume / 100 === 0;
        }
      }
    });
    //# sourceURL=pen.js
  </script>

  <script>
    // Add mousemove event listener to save the div position when moved
    let shouldOpen = false;
    const draggable = document.getElementById('cd-container');
    let isDragging = false;
    let offsetX = 0,
      offsetY = 0;

    // Save the div position to localStorage
    const savePosition = () => {
      const divPos = {
        top: draggable.offsetTop,
        left: draggable.offsetLeft
      };
      localStorage.setItem('divPos', JSON.stringify(divPos));
    };

    // Get the saved div position from localStorage on page load
    const loadPosition = () => {
      const savedPos = JSON.parse(localStorage.getItem('divPos'));
      if (savedPos) {
        draggable.style.top = savedPos.top + 'px';
        draggable.style.left = savedPos.left + 'px';
      }
    };

    // Add click event listener to the document to close the div
    document.addEventListener('click', (e) => {
      if (!draggable.contains(e.target)) {
        draggable.classList.remove('open');
      }
    });

    draggable.addEventListener('mousedown', (event) => {
      isDragging = true;
      offsetX = event.clientX - draggable.offsetLeft;
      offsetY = event.clientY - draggable.offsetTop;
    });

    document.addEventListener('mousemove', (event) => {
      if (isDragging) {
        event.preventDefault();
        const maxX = window.innerWidth - draggable.offsetWidth;
        const maxY = window.innerHeight - draggable.offsetHeight;
        let left = event.clientX - offsetX;
        let top = event.clientY - offsetY;

        // Constrain the element's position within the screen bounds
        left = Math.max(0, Math.min(maxX, left));
        top = Math.max(0, Math.min(maxY, top));

        draggable.style.left = `${left}px`;
        draggable.style.top = `${top}px`;
        shouldOpen = true;
      }
    });

    document.addEventListener('mouseup', (event) => {
      if (isDragging) {
        isDragging = false;
        // add code to calculate throwing direction and speed
        savePosition();
      }
    });

    // Add click event listener to the div
    draggable.addEventListener('click', () => {
      if (!shouldOpen) {
        draggable.classList.add('open');
      } else {
        shouldOpen = false;
      }
    });

    window.addEventListener('resize', (event) => {
      const maxX = window.innerWidth - draggable.offsetWidth;
      const maxY = window.innerHeight - draggable.offsetHeight;
      let left = parseInt(draggable.style.left);
      let top = parseInt(draggable.style.top);

      // Constrain the element's position within the screen bounds
      left = Math.max(0, Math.min(maxX, left));
      top = Math.max(0, Math.min(maxY, top));

      draggable.style.left = `${left}px`;
      draggable.style.top = `${top}px`;
    });

    // Call the loadPosition function on page load
    loadPosition();


    window.onerror = function(message, source, lineno, colno, error) {
      // Display error in popup or log it to console
      alert('An error occurred: ' + message);
    };
  </script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($connect);
ob_end_flush();
?>