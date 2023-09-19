<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <!-- روی زمپ کار میکند -->
    <!-- Run on Xampp -->

    <title>equalizer - MRB</title>
    <link
      rel="stylesheet"
      href="style.css"
    />
  </head>

  <body translate="no">
    <center>
      <div>
        <h2 style="font-family: 'Times New Roman', Times, serif">MRB</h2>
      </div>
    </center>

    <label>
      <input type="checkbox" id="effectCheckbox" /> Beats equalizer
    </label>

    <br />
    <br />

    <!-- replace link -->
    <audio
      controls
      src="EXample.mp3"
    ></audio>

    <div class="audio-controls__play-toggle">
      <div class="visualizer-bar"></div>
    </div>

    <div class="equalizer">
      <div class="section">
        <div class="title">HF</div>
        <div class="sliders">
          <div class="range-slider">
            <span class="scope">22</span>
            <input
              type="range"
              class="vertical"
              min="4700"
              max="22000"
              step="100"
              value="4700"
              data-filter="highShelf"
              data-param="frequency"
            />
            <span class="scope scope-min">4.7</span>
            <span class="param">kHz</span>
          </div>
          <div class="range-slider">
            <span class="scope">50</span>
            <input
              type="range"
              class="vertical"
              min="-50"
              max="50"
              value="50"
              data-filter="highShelf"
              data-param="gain"
            />
            <span class="scope scope-min">-50</span>
            <span class="param">dB</span>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="title">LF</div>
        <div class="sliders">
          <div class="range-slider">
            <span class="scope">220</span>
            <input
              type="range"
              class="vertical"
              min="35"
              max="220"
              step="1"
              value="100"
              data-filter="lowShelf"
              data-param="frequency"
            />
            <span class="scope scope-min">35</span>
            <span class="param">Hz</span>
          </div>
          <div class="range-slider">
            <span class="scope">50</span>
            <input
              type="range"
              class="vertical"
              min="-50"
              max="50"
              value="50"
              data-filter="lowShelf"
              data-param="gain"
            />
            <span class="scope scope-min">-50</span>
            <span class="param">dB</span>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="title">HMF</div>
        <div class="sliders">
          <div class="range-slider">
            <span class="scope">5.9</span>
            <input
              type="range"
              class="vertical"
              min="800"
              max="5900"
              step="100"
              value="800"
              data-filter="highPass"
              data-param="frequency"
            />
            <span class="scope scope-min">0.8</span>
            <span class="param">kHz</span>
          </div>
          <div class="range-slider">
            <span class="scope">12</span>
            <input
              type="range"
              class="vertical"
              min="0.7"
              max="12"
              step="0.1"
              value="0.7"
              data-filter="highPass"
              data-param="Q"
            />
            <span class="scope scope-min">0.7</span>
            <span class="param">Q</span>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="title">LMF</div>
        <div class="sliders">
          <div class="range-slider">
            <span class="scope">1600</span>
            <input
              type="range"
              class="vertical"
              min="80"
              max="1600"
              step="10"
              value="150"
              data-filter="lowPass"
              data-param="frequency"
            />
            <span class="scope scope-min">80</span>
            <span class="param">Hz</span>
          </div>
          <div class="range-slider">
            <span class="scope">12</span>
            <input
              type="range"
              class="vertical"
              min="0.7"
              max="12"
              step="0.1"
              value="0.7"
              data-filter="lowPass"
              data-param="Q"
            />
            <span class="scope scope-min">0.7</span>
            <span class="param">Q</span>
          </div>
        </div>
      </div>
    </div>
    <h3 id="music_s">Play?</h3>

    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="./script.js"></script>
  </body>
</html>
