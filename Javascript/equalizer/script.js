/**
 * @MehrabSp
 * @description 
 * @author MehrabSp
 */

// Get the checkboxes and input ranges
// Get the effect checkbox and add a change event listener
const effectCheckbox = document.getElementById("effectCheckbox");
// Get the stored state of the checkbox from local storage
const isChecked = localStorage.getItem("effectCheckbox") === "true";
// Set the initial state of the checkbox and input range
effectCheckbox.checked = isChecked;

var context = new (window.AudioContext || window.webkitAudioContext)();
var mediaElement = document.querySelector("audio");
var source = context.createMediaElementSource(mediaElement);

//Filters
var highShelf = context.createBiquadFilter();
var lowShelf = context.createBiquadFilter();
var highPass = context.createBiquadFilter();
var lowPass = context.createBiquadFilter();

let firstPlay = true;
let isPlaying = false;

let analyser;
let bufferLength;
let dataArray;

mediaElement.addEventListener("pause", function () {
  console.log("Audio pause");
  gsap.to(".visualizer-bar", {
    scaleY: 0,
    duration: 0.2,
    ease: "power4.inOut",
  });
  isPlaying = false;
});

mediaElement.addEventListener("ended", function () {
  console.log("Audio ended");
  isPlaying = false;
});

// connect!
source.connect(highShelf);
highShelf.connect(lowShelf);
lowShelf.connect(highPass);
highPass.connect(lowPass);
lowPass.connect(context.destination);

// فیلتر ها
// اعداد به دلخواه خود تغییر داده شود
highShelf.type = "highshelf";
highShelf.frequency.value = 4700;
highShelf.gain.value = 50;

lowShelf.type = "lowshelf";
lowShelf.frequency.value = 100;
lowShelf.gain.value = 50;

highPass.type = "highpass";
highPass.frequency.value = 800;
highPass.Q.value = 0.7;

lowPass.type = "lowpass";
lowPass.frequency.value = 150;
lowPass.Q.value = 0.7;

// 1. Flanger/Chorus effect:

var flanger = context.createDelay();
var chorus = context.createGain();
// console.log(flanger)
// console.log(chorus)

flanger.delayTime.value = 0.005;
chorus.gain.value = 0.5;

source.connect(flanger);
flanger.connect(chorus);
chorus.connect(context.destination);

// 2. Reverb effect:

// var convolver = context.createConvolver();
// var reverbGain = context.createGain();

// reverbGain.gain.value = 0.5;

// source.connect(convolver);
// convolver.connect(reverbGain);
// reverbGain.connect(context.destination);

// 3. Boost/Cut EQ effect:

var eq = context.createBiquadFilter();

eq.type = "peaking";
eq.frequency.value = 100;
eq.Q.value = 1;
eq.gain.value = 6;

source.connect(eq);
eq.connect(context.destination);

// 4. Band-pass filter effect:

var bandpassFilter = context.createBiquadFilter();

// the frequencies from 300Hz to 3kHz.
var from = 300;
var to = 30000;
var geometricMean = Math.sqrt(from * to);

bandpassFilter.type = "bandpass";
bandpassFilter.frequency.value = geometricMean;
bandpassFilter.Q.value = geometricMean / (to - from);

source.connect(bandpassFilter);
bandpassFilter.connect(context.destination);

// To add Delay effect:
// echo */
// var delay = context.createDelay();
// delay.delayTime.value = 0.5; // set delay time to half a second
// source.connect(delay);
// delay.connect(context.destination);

// To add Compression effect:

// var compressor = context.createDynamicsCompressor();
// compressor.threshold.value = -24; // set threshold to -24 dB
// compressor.knee.value = 30; // set knee to 30 dB
// compressor.ratio.value = 12; // set ratio to 12:1
// compressor.attack.value = 0.003; // set attack time to 3 ms
// compressor.release.value = 0.25; // set release time to 250 ms
// source.connect(compressor);
// compressor.connect(context.destination);

// To add Distortion effect:

// var distortion = context.createWaveShaper();
// distortion.curve = makeDistortionCurve(400); // create a custom distortion curve
// source.connect(distortion);
// distortion.connect(context.destination);

// function makeDistortionCurve(amount) {
//     var k = typeof amount === 'number' ? amount : 50,
//         n_samples = 44100,
//         curve = new Float32Array(n_samples),
//         deg = Math.PI / 180,
//         i, x;
//     for (i = 0; i < n_samples; ++i) {
//         x = i * 2 / n_samples - 1;
//         curve[i] = (3 + k) * x * 20 * deg / (Math.PI + k * Math.abs(x));
//     }
//     return curve;
// }

// To add Notch filter effect:

// var notchFilter1 = context.createBiquadFilter();
// notchFilter1.type = "notch";
// notchFilter1.frequency.value = 1000;
// notchFilter1.Q.value=10;
// source.connect(notchFilter1);
// notchFilter1.connect(context.destination);

effectCheckbox.addEventListener("change", () => {
  // Store the state of the checkbox in local storage
  localStorage.setItem("effectCheckbox", effectCheckbox.checked);
  // Enable/disable the effect based on the checkbox state
  if (effectCheckbox.checked) {
    source.connect(eq);
    eq.connect(context.destination);
    source.connect(flanger);
    flanger.connect(chorus);
    chorus.connect(context.destination);
  } else {
    source.disconnect(eq);
    eq.disconnect(context.destination);
    source.disconnect(flanger);
    flanger.disconnect(chorus);
    chorus.disconnect(context.destination);
  }
});
//range
var ranges = document.querySelectorAll("input[type=range]");
ranges.forEach(function (range) {
  range.addEventListener("input", function () {
    window[this.dataset.filter][this.dataset.param].value = this.value;
  });
});

mediaElement.addEventListener("play", function () {
  context.resume().then(() => {
    console.log("AudioContext resumed");
  });
  console.log("Audio played");
  toggleAudio();

  // فانکشن مدیریت انیمیشن
  // تنظیم فریم و محدودیت برای نمایش انیمیشن
  // limit -> 16,32,64, ...
  //The lower the frame rate, the faster the animation
  function throttle(func, limit) {
    let lastFunc;
    let lastRan;
    return function () {
      const context = this;
      const args = arguments;
      if (!lastRan) {
        func.apply(context, args);
        lastRan = Date.now();
      } else {
        clearTimeout(lastFunc);
        lastFunc = setTimeout(function () {
          if (Date.now() - lastRan >= limit) {
            func.apply(context, args);
            lastRan = Date.now();
          }
        }, limit - (Date.now() - lastRan));
      }
    };
  }

  function toggleAudio() {
    if (isPlaying === true) {
      document.getElementById("music_s").textContent = "Paus:|!";
      gsap.to(".visualizer-bar", {
        scaleY: 0,
        duration: 0.2,
        ease: "power4.inOut",
      });
      return;
    }

    document.getElementById("music_s").textContent = "Play!";
    isPlaying = true;

    if (firstPlay) {
      analyser = context.createAnalyser();

      source.connect(analyser);
      analyser.connect(context.destination);
      console.log(analyser);

      analyser.fftSize = 32;

      bufferLength = analyser.frequencyBinCount;

      dataArray = new Uint8Array(bufferLength);

      firstPlay = false;
    }

    //#Frame!
    //<!-- The lower the number, the better the frame from Js -> #Frame -->
    const throttledAnimation = throttle(animationFunction, 16); // Limit to 60 frames per second


    // فانکشن مدیریت بیت برای نمایش ان روی scale Y
    function animationFunction() {
      // Feed Data into Analyser
      analyser.getByteFrequencyData(dataArray);

      // Average the soundform data coming in
      const average = (arr) => arr.reduce((p, c) => p + c, 0) / arr.length;
      const dataArrayAverage = average(dataArray);

      // Normalize Data Between 0-1
      let normalizeData = gsap.utils.normalize(0, 255);

      // Bar height is set to average of soundforms
      barHeight = normalizeData(dataArrayAverage) * 0.85;
      gsap.set(".visualizer-bar", {
        scaleY: barHeight,
      });
      //Speed animation in console
      console.log("Animeted");
    }

    // فانکشن مدیریت فریم انیمیشن برای مرورگر هایی با سرعت پایین
    function checkAnimationCapability() {
      var lastTime = 0;
      var vendors = ["ms", "moz", "webkit", "o"];

      for (
        var i = 0;
        i < vendors.length && !window.requestAnimationFrame;
        ++i
      ) {
        window.requestAnimationFrame =
          window[vendors[i] + "RequestAnimationFrame"];
        window.cancelAnimationFrame =
          window[vendors[i] + "CancelAnimationFrame"] ||
          window[vendors[i] + "CancelRequestAnimationFrame"];
      }

      if (!window.requestAnimationFrame) {
        alert("Your browser does not support animations.");
        return false;
      }

      function animate(timestamp) {
        if (isPlaying) {
          // if (timestamp - lastTime >= (1000 / 60)) { // check if we're running at least at 60 fps
          throttledAnimation();
          lastTime = timestamp;
          // }

          requestAnimationFrame(animate);
        }
      }

      requestAnimationFrame(animate);
    }
    checkAnimationCapability();
  }
});

//# sourceURL=pen.js
