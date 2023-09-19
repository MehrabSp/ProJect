
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
  <link rel="stylesheet" href="style/styleMiniPlayer.css">

<!-- Tracks used in this music/audio player application are free to use. I downloaded them from Soundcloud and NCS websites. I am not the owner of these tracks. -->
  <nav>
    <div id="app-cover">
      <div id="player">
        <div id="player-track">
          <div id="album-name"></div>
          <div id="track-name"></div>
          <div id="track-time">
            <div id="current-time"></div>
            <div id="track-length"></div>
          </div>
          <div id="s-area">
            <div id="ins-time"></div>
            <div id="s-hover"></div>
            <div id="seek-bar"></div>
          </div>
        </div>
        <div id="player-content">
          <div id="album-art">
            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_1.jpg" class="active" id="_1">
            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_2.jpg" id="_2">
            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_3.jpg" id="_3">
            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_4.jpg" id="_4">
            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_5.jpg" id="_5">
            <div id="buffer-box">Buffering ...</div>
          </div>
          <div id="player-controls">
            <div class="control">
              <div class="button" id="play-previous">
                <i class="fas fa-backward"></i>
              </div>
            </div>
            <div class="control">
              <div class="button" id="play-pause-button">
                <i class="fas fa-play"></i>
              </div>
            </div>
            <div class="control">
              <div class="button" id="play-next">
                <i class="fas fa-forward"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script id="rendered-js" src="style/styleMiniPlayer.js"></script>
