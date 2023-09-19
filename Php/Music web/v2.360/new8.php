<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <title>CodePen - Internal Video Platform UI</title>

  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style/style-UI-player.css">

</head>

<body translate="no">
  <div id="app">

    <div class="app-wrapper">
      <div class="right-area">
        <div class="page-right-content">
          <div class="content-line content-line-hero">
            <div class="line-header">
              <span class="header-text">New Uploads</span>
            </div>
            <div class="slider-wrapper owl-carousel owl-theme" id="owl-slider-1">
              <div class="item hero-img-wrapper img-1">
                <div class="upload-text-wrapper">
                  <p class="upload-text-header">The </p>
                  <p class="upload-text-info">By Pravin <span> 20 minutes ago</span></p>
                </div>
                <img src="image/imgs/Hip-Hop.png" alt="SlideShow">
              </div>
              <div class="item hero-img-wrapper img-2">
                <div class="upload-text-wrapper">
                  <p class="upload-text-header">History of Art</p>
                  <p class="upload-text-info">By Pravin <span> 10 minutes ago</span></p>
                </div>
                <img src="image/imgs/Hip-Hop.png" alt="SlideShow">
              </div>
              <div class="item hero-img-wrapper img-3">
                <div class="upload-text-wrapper">
                  <p class="upload-text-header">Van Life</p>
                  <p class="upload-text-info">By Tess <span> 3 days ago</span></p>
                </div>
                <img src="image/imgs/Hip-Hop.png" alt="SlideShow">
              </div>
            </div>
          </div>
          <div class="content-line content-line-list">
            <div class="line-header">
              <span class="header-text">Trending</span>
            </div>
            <div id="owl-slider-2" class="slider-wrapper owl-carousel">
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Minimal Photography</p>
                  <p class="video-description-subheader">By July</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Puppet Theatre</p>
                  <p class="video-description-subheader">By July</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Road Trip</p>
                  <p class="video-description-subheader">By Wallace</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Young Folks</p>
                  <p class="video-description-subheader">By Peter</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Minimal Photography</p>
                  <p class="video-description-subheader">By July</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Puppet Theatre</p>
                  <p class="video-description-subheader">By July</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Road Trip</p>
                  <p class="video-description-subheader">By Wallace</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>
              <div class="item video-box-wrapper">
                <div class="img-preview">
                  <img src="image/imgs/Hip-Hop.png" alt="music">
                </div>
                <div class="video-description-wrapper">
                  <p class="video-description-header">Young Folks</p>
                  <p class="video-description-subheader">By Peter</p>
                  <p class="video-description-info">116K views <span>1 hour ago</span></p>
                  <button class="btn-play"></button>
                </div>
              </div>

            </div>
          </div>
          <div class="content-line content-line-list">
            <div class="line-header">
              <span class="header-text">Public</span>
            </div>
            <div id="owl-slider-3" class="slider-wrapper owl-carousel">
              <template v-for='song in songs'>
                <div class="item video-box-wrapper song">
                  <div class="img-preview">
                    <img src="image/imgs/Hip-Hop.png" alt="music">
                  </div>
                  <div class="video-description-wrapper">
                    <p class="video-description-header">{{song.title}}</p>
                    <p class="video-description-subheader">{{song.artist}}</p>
                    <p class="video-description-info">116K views <span>1 hour ago</span></p>

                    <button class="btn-pause" v-if="isPlaying && (currentSong.id === song.id )" @click='pause'></button>
                    <button class="btn-play" @click='play(song)' v-else></button>




                  </div>
                </div>

              </template>
            </div>
          </div>

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
                            <img class="music-bars-gif" src="https://res.cloudinary.com/dmf10fesn/image/upload/v1548886976/audio/assets/animated-sound-bars.gif" v-if="isPlaying && (currentSong.id === song.id )" />
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

                      <div class="skip-backward">
                        <i class="icon ion-ios-skip-backward" @click="skip('backward')"></i>
                      </div>

                      <div class="play">
                        <i class="icon ion-ios-play" v-if="!isPlaying" @click="playCurrentSong"></i>
                        <i class="icon ion-ios-pause" v-else @click="pause"></i>
                      </div>

                      <div class="skip-forward">
                        <i class="icon ion-ios-skip-forward" @click="skip('forward')"></i>
                      </div>

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
                          <i class="icon ion-md-list"></i>
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
        </div>
      </div>
    </div>
  </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

    <script src="style/script-UI.js"></script>


    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.min.js'></script>
    <script id="rendered-js">
      let vue = new Vue({
        el: "#app",
        data: {
          defaultSong: "data/ch/Quick/post/Blackpink-Boombayah.mp3",
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

          songs: [{
              id: 1,
              title: "Wow",
              artist: "Post Malone",
              album: "Mehrab",
              url: "data/ch/Quick/post/Blackpink-Boombayah.mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
            },

            {
              id: 3,
              title: "Gods Plan",
              artist: "Drake",
              album: "",
              url: "data/ch/Quick/post/Changbin  - Mirror Mirror ( GandomMusic.ir ).mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
            },


            {
              id: 6,
              title: "Hamble",
              artist: "Kendrick Lamar",
              album: "",
              url: "data/ch/QQQ/post/Kendrick-Lamar-HUMBLE.mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
            },

            {
              id: 5,
              title: "Chilling",
              artist: "Kwesi Arthur",
              album: "",
              url: "data/ch/QQQ/post/Kwesi-Arthur-Chill-Prod-by-Dannyedtracks.mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
            },

            {
              id: 2,
              title: "Better Now",
              artist: "Post Malone",
              album: "",
              url: "data/ch/QQQ/post/Post_Malone_-_Better_Now_playvk.com.mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
            },


            {
              id: 4,
              title: "Dont Kill My Vibe",
              artist: "Kendrick Lamar",
              album: "",
              url: "data/ch/QQQ/post/Kendrick-Lamar-Bitch-Dont-Kill-My-Vibe.mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
            }
          ],



          playlist: {
            currentIndex: 0,

            songs: [{
              id: 1,
              title: "Wow",
              artist: "Post Malone",
              album: "",
              url: "data/ch/Quick/post/Blackpink-Boombayah.mp3",
              cover_art_url: "image/pic_main_mobile/24.png"
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



</body>

</html>