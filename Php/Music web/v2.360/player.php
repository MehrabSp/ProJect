<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">

  
  <title>Vue Js Audio Player with playlist</title>
    <link rel="canonical" href="https://codepen.io/maxwelladapoe/pen/aXpbby" />
  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  
  
  
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat");
html, body {
  padding: 0;
  margin: 0;
  font-family: "Montserrat", sans-serif;
}

#app {
  width: 100%;
  margin-top: 50px;
}

.song .wrapper {
  position: relative;
  width: 100%;
  height: auto;
}
.song .wrapper .overlay-play {
  cursor: pointer;
  position: absolute;
  width: 40px;
  height: 40px;
  background-color: #FD6A02;
  bottom: 5px;
  right: 5px;
  border-radius: 50%;
}
.song .wrapper .overlay-play i {
  font-size: 1.8em;
  line-height: 40px;
  color: #fff;
}
.song .song-title {
  font-weight: 700;
  margin-bottom: 0;
  line-height: auto;
}
.song .song-artiste {
  line-height: auto;
}

.music-player {
  width: 100%;
  bottom: 0;
  position: fixed;
}
.music-player .playlist {
  width: auto;
  max-width: 400px;
  background-color: rgba(255, 80, 0, 0.71);
  position: relative;
  margin-left: auto;
  z-index: 1;
}
.music-player .playlist .show {
  overflow: auto;
}
.music-player .playlist .wrap {
  max-height: 75px;
  overflow: auto;
  scrollbar-width: 5px;
}
.music-player .playlist .wrap .song-wrap {
  height: 25px;
  width: 100%;
  color: white;
  cursor: pointer;
}
.music-player .playlist .wrap .song-wrap:hover {
  background-color: rgba(255, 255, 255, 0.3);
}
.music-player .playlist .wrap .song-wrap:not(:last-child) {
  border-bottom: 0.05em solid #cdcdcd;
}
.music-player .playlist .wrap .song-wrap .song-details {
  font-size: 0.8em;
  line-height: 25px;
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding-right: 10px;
  padding-left: 10px;
}
.music-player .playlist .wrap .song-wrap .song-details span {
  line-height: 15px;
}
.music-player .playlist .wrap .song-wrap .song-details span.play {
  display: inline-block;
  margin-right: 10px;
  border: 1px solid #fff;
  border-radius: 10px;
  height: 17px;
  width: 17px;
  text-align: center;
}
.music-player .playlist .wrap .song-wrap .song-details span.play i {
  text-align: center;
}
.music-player .playlist .wrap .song-wrap .song-details .music-bars-gif {
  height: 10px;
}
.music-player .playlist .wrap::-webkit-scrollbar {
  width: 5px;
}
.music-player .playlist .wrap::-webkit-scrollbar-track {
  background-color: #CCC;
  -webkit-box-shadow: inset 0 0 6px #919191;
  border-radius: 0;
}
.music-player .playlist .wrap::-webkit-scrollbar-thumb {
  border-radius: 0;
  background-color: #d2d2d2;
  -webkit-box-shadow: inset 0 0 6px rgba(238, 238, 238, 0.5);
}
.music-player .player {
  position: relative;
  z-index: 2;
  width: 100%;
  height: 60px;
  background-color: #6f6f6f;
}
.music-player .player .player-contents-wrap {
  position: relative;
  width: 100%;
  height: 60px;
}
.music-player .player .player-contents-wrap .album-art {
  background-color: white;
  width: 60px;
  height: 60px;
}
.music-player .player .player-contents-wrap .album-art .img {
  width: 60px;
  height: 60px;
}
.music-player .player .player-contents-wrap .main-controls {
  position: absolute;
  right: 0;
  width: calc(100% - 60px);
  height: 60px;
  top: 0;
}
.music-player .player .player-contents-wrap .main-controls i {
  cursor: pointer;
}
.music-player .player .player-contents-wrap .main-controls .controls {
  width: 15%;
  height: 60px;
  display: flex;
  justify-content: space-around;
  text-align: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.05);
}
.music-player .player .player-contents-wrap .main-controls .controls i {
  font-size: 1.8em;
  color: white;
}
.music-player .player .player-contents-wrap .main-controls .controls .play {
  text-align: center;
  border-radius: 25px;
  width: 40px;
  height: 40px;
  border: 1px solid #fff;
}
.music-player .player .player-contents-wrap .main-controls .controls .play i {
  line-height: 40px;
  text-align: center;
}
.music-player .player .player-contents-wrap .main-controls .seek {
  padding-left: 20px;
  padding-top: 0;
  position: absolute;
  height: 60px;
  width: 85%;
  top: 0;
  left: unset;
  right: 0;
}
.music-player .player .player-contents-wrap .main-controls .seek .title-and-time {
  height: 25px;
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}
.music-player .player .player-contents-wrap .main-controls .seek .progress-container {
  position: relative;
  height: 10px;
  width: auto;
  display: flex;
  align-items: center;
}
.music-player .player .player-contents-wrap .main-controls .seek .progress-container .progress {
  background-color: rgba(0, 0, 0, 0.05);
  height: 4px;
  width: 100%;
  margin: 0;
  padding: 0 2px;
  border-radius: 0;
  display: flex;
  align-items: center;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.music-player .player .player-contents-wrap .main-controls .seek .progress-container .progress .progress-handle {
  display: block;
  position: absolute;
  z-index: 6;
  margin-top: 0;
  margin-left: -2px;
  width: 8px;
  height: 8px;
  border-radius: 100%;
  background-color: #fff;
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}
.music-player .player .player-contents-wrap .main-controls .seek .progress-container .progress .progress-handle:hover {
  background-color: #000;
}
.music-player .player .player-contents-wrap .main-controls .seek .progress-container .progress .transparent-seeker-layer {
  width: 100%;
  height: 6px;
  background-color: transparent;
  position: absolute;
  cursor: pointer;
  z-index: 5;
}
.music-player .player .player-contents-wrap .main-controls .seek .progress-container .progress .bar {
  width: 0;
  background-color: #fff;
  height: 4px;
  position: absolute;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls {
  height: 25px;
  width: 100%;
  display: flex;
  flex-direction: row-reverse;
  align-items: center;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .like {
  padding-left: 8px;
  height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .like i {
  font-size: 1em;
  line-height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .download {
  padding-left: 8px;
  height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .download i {
  font-size: 1em;
  line-height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .shuffle-icon {
  padding-left: 8px;
  height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .shuffle-icon i {
  font-size: 1.2em;
  line-height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .repeat {
  position: relative;
  padding-left: 8px;
  height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .repeat .repeat-info {
  background-color: red;
  width: 13px;
  height: 13px;
  border-radius: 8px;
  position: absolute;
  font-size: 7px;
  line-height: 12px;
  text-align: center;
  right: -12px;
  top: 5px;
  color: #fff;
  text-transform: capitalize;
  letter-spacing: 1px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .repeat i {
  font-size: 1.2em;
  line-height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .playlist-icon {
  margin-left: 30px;
  height: 25px;
}
.music-player .player .player-contents-wrap .main-controls .seek .extra-controls .playlist-icon i {
  font-size: 1.2em;
  line-height: 25px;
}
.height-enter-active {
  animation: bounce-in 0.5s;
}

.height-leave-active {
  animation: bounce-in 0.5s reverse;
}

@keyframes bounce-in {
  0% {
    max-height: 0;
  }
  100% {
    max-height: 75px;
  }
}
</style>
  
  
</head>

<body translate="no">
  
  <div id="app">

  <div class="container">
    <div class='row'>

      <template v-for='song in songs'>
         <div class="col-4 col-md-3 col-lg-2 song" >
           
           <div class='wrapper'>
             
              
            <div class="overlay-play text-center" v-if="isPlaying && (currentSong.id === song.id )" @click='pause'>
               <i class="icon ion-ios-pause"></i>   
           </div>
             
            <div class="overlay-play text-center" @click='play(song)'v-else>

              <i class="icon ion-ios-play"></i>
                                 
             
           </div>
             
              <img :src="song.cover_art_url" alt="" class='img-fluid rounded'>
           </div>
          
           
           
           <p class='song-title mt-2'>{{song.title}}</p>
           <p class='song-artiste' >{{song.artist}}</p>
          
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

                                        <i class="icon ion-ios-pause"
                                           v-if="isPlaying && (currentSong.id === song.id )"></i>
                                        <i class="icon ion-ios-play" v-else></i>
                                    </span> {{song.title}}
                </div>
                <div>
                  <span>
                                        <img class="music-bars-gif" src="https://res.cloudinary.com/dmf10fesn/image/upload/v1548886976/audio/assets/animated-sound-bars.gif"
                                             v-if="isPlaying && (currentSong.id === song.id )"/>
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
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.min.js'></script>
      <script id="rendered-js" >
let vue = new Vue({
  el: "#app",
  data: {
    defaultSong:
    "data/ch/Quick/post/Blackpink-Boombayah.mp3",
    isPlaying: false,
    isLoaded: false,
    isCurrentlyPlaying: "",
    onRepeat: false,
    shuffle: false,

    loop: {
      state: false,
      value: 1 },


    durationSeconds: 0,
    currentSeconds: 0,
    audioPlayer: undefined,
    previousVolume: 35,
    volume: 100,
    autoPlay: false,
    progressPercentageValue: "0%",

    songs: [
    {
      id: 1,
      title: "Wow",
      artist: "Post Malone",
      album: "Mehrab",
      url:
      "data/ch/Quick/post/Blackpink-Boombayah.mp3",
      cover_art_url:
      "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884701/audio/album%20arts/s-l300.jpg" },

    {
      id: 3,
      title: "Gods Plan",
      artist: "Drake",
      album: "",
      url:
      "data/ch/Quick/post/Changbin  - Mirror Mirror ( GandomMusic.ir ).mp3",
      cover_art_url:
      "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884622/audio/album%20arts/a2497580059_10.jpg" },


    {
      id: 6,
      title: "Hamble",
      artist: "Kendrick Lamar",
      album: "",
      url:
      "https://res.cloudinary.com/dmf10fesn/video/upload/v1548884988/audio/Kendrick-Lamar-HUMBLE.mp3",
      cover_art_url:
      "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884891/audio/album%20arts/FwqM2g6.png" },

    {
      id: 5,
      title: "Chilling",
      artist: "Kwesi Arthur",
      album: "",
      url:
      "https://res.cloudinary.com/dmf10fesn/video/upload/v1548887340/audio/Kwesi-Arthur-Chill-Prod-by-Dannyedtracks.mp3",
      cover_art_url:
      "https://res.cloudinary.com/dmf10fesn/image/upload/v1548887458/audio/album%20arts/Kwesi-Arthur-Chill-Prod.-By-Dannyedtrackswww.Ghanasongs.com_.jpg" },

    {
      id: 2,
      title: "Better Now",
      artist: "Post Malone",
      album: "",
      url:
      "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882769/audio/Post_Malone_-_Better_Now_playvk.com.mp3",
      cover_art_url:
      "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884701/audio/album%20arts/s-l300.jpg" },


    {
      id: 4,
      title: "Dont Kill My Vibe",
      artist: "Kendrick Lamar",
      album: "",
      url:
      "https://res.cloudinary.com/dmf10fesn/video/upload/v1548884972/audio/Kendrick-Lamar-Bitch-Dont-Kill-My-Vibe.mp3",
      cover_art_url:
      "https://res.cloudinary.com/dmf10fesn/image/upload/v1548885857/audio/album%20arts/ae8e88aa099173dbee78d904f035e459bfb69f5a.jpg" }],



    playlist: {
      currentIndex: 0,

      songs: [
      {
        id: 1,
        title: "Wow",
        artist: "Post Malone",
        album: "",
        url:
        "data/ch/Quick/post/Blackpink-Boombayah.mp3",
        cover_art_url:
        "https://res.cloudinary.com/dmf10fesn/image/upload/v1548884701/audio/album%20arts/s-l300.jpg" }] },



    previousPlaylistIndex: 0,
    hasNext: false,
    originalSongArray: [],

    currentSong: {
      id: "",
      title: "",
      artist: "",
      album: "",
      url: "",
      cover_art_url: "" },


    /** ui control variables*/

    showPlaylist: false },


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
      this.loop.value === "all")
      {
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
        isPlaying: false };


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
        } else {
        }
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
      for (i = 0; i < list.length; i++) {if (window.CP.shouldStopExecution(0)) break;
        if (list[i].id === obj.id) {
          return true;
        }
      }window.CP.exitedLoop(0);
    },

    getObjectIndexFromArray(obj, list) {
      //this function just returns the index of the item with the id
      let i;
      for (i = 0; i < list.length; i++) {if (window.CP.shouldStopExecution(1)) break;
        if (list[i].id === obj.id) {
          return i;
        }
      }window.CP.exitedLoop(1);
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
      while (ctr > 0) {if (window.CP.shouldStopExecution(2)) break;
        // Pick a random index
        index = Math.floor(Math.random() * ctr);
        // Decrease ctr by 1
        ctr--;
        // And swap the last element with it
        temp = array[ctr];
        array[ctr] = array[index];
        array[index] = temp;
      }window.CP.exitedLoop(2);
      return array;
    } },


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
    } } });
//# sourceURL=pen.js
    </script>

  
</body>

</html>
