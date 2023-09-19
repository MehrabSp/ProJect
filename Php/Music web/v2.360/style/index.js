let checkbox_mf = () => {
  let ss = (getItem("saveMode") == 'true') ? true :
(getItem("saveMode") == 'false') ? false :
'What!';
  return ss
}
let check_box = document.getElementById("checkBox");

window.addEventListener("load", function() {
    window.location.hash = "#";
    check_box.checked = checkbox_mf();
  });

function setItem(params, params2) {
  localStorage.setItem(params, params2);
}
function getItem(ch) {
  const ch2 = localStorage.getItem(ch);
  return ch2;
}

function goto(params) {
  // -header main search end
  const hash = window.location.hash
  if(hash == "#header" || hash == ""){
    window.location.hash = "main"
  }else if(hash == "#main"){
    window.location.hash = "search"
  }else if(hash == "#search"){
    window.location.hash = "end"
    params.classList.add("arrow-back");
  }else if(hash == "#end"){
    window.location.hash = "header"
    params.classList.remove("arrow-back");
  }
}

function gotoSearch(params){
  window.location.hash = "search";
}

// search
/*const canvas = document.getElementById("particles");
const ctx = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const particlesArray = [];

class Particle {
constructor() {
this.x = Math.random() * canvas.width;
this.y = Math.random() * canvas.height;
this.size = Math.random() * 5 + 1;
this.speedX = Math.random() * 3 - 1.5;
this.speedY = Math.random() * 3 - 1.5;
this.color = `hsl(${Math.random() * 360}, 100%, 50%)`;
}

update() {
this.x += this.speedX;
this.y += this.speedY;

if (this.size > 0.2) this.size -= 0.1;
if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
}

draw() {
ctx.fillStyle = this.color;
ctx.beginPath();
ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
ctx.closePath();
ctx.fill();
}}


function handleParticles() {
for (let i = 0; i < particlesArray.length; i++) {
particlesArray[i].update();
particlesArray[i].draw();

if (particlesArray[i].size <= 0.2) {
  particlesArray.splice(i, 1);
  i--;
}
}
}

function createParticles() {
if (particlesArray.length < 1) {
particlesArray.push(new Particle());
}
}

let reqAnimation;
function animateParticles() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  handleParticles();
  createParticles();
  reqAnimation = requestAnimationFrame(animateParticles);
  console.log("ani ")
}

  if (!checkbox_mf()) {
    animateParticles();
    
    window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    });
  }*/

function reset(){
document.getElementById('text-search').value = null;
}


// ---------Responsive-navbar-active-animation-----------
function test() {
  var tabsNewAnim = $('#navbarSupportedContent');
  var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
  var activeItemNewAnim = tabsNewAnim.find('.active');
  var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
  var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
  var itemPosNewAnimTop = activeItemNewAnim.position();
  var itemPosNewAnimLeft = activeItemNewAnim.position();
  $(".hori-selector").css({
    "top": itemPosNewAnimTop.top + "px",
    "left": itemPosNewAnimLeft.left + "px",
    "height": activeWidthNewAnimHeight + "px",
    "width": activeWidthNewAnimWidth + "px" });

  $("#navbarSupportedContent").on("click", "li", function (e) {
    $('#navbarSupportedContent ul li').removeClass("active");
    $(this).addClass('active');
    var activeWidthNewAnimHeight = $(this).innerHeight();
    var activeWidthNewAnimWidth = $(this).innerWidth();
    var itemPosNewAnimTop = $(this).position();
    var itemPosNewAnimLeft = $(this).position();
    $(".hori-selector").css({
      "top": itemPosNewAnimTop.top + "px",
      "left": itemPosNewAnimLeft.left + "px",
      "height": activeWidthNewAnimHeight + "px",
      "width": activeWidthNewAnimWidth + "px" });

  });
}
$(document).ready(function () {
  setTimeout(function () {test();});
});
$(window).on('resize', function () {
  setTimeout(function () {test();}, 500);
});
$(".navbar-toggler").click(function () {
  $(".navbar-collapse").slideToggle(300);
  setTimeout(function () {test();});
});



// --------------add active class-on another-page move----------
jQuery(document).ready(function ($) {
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();

  // Account for home page with empty path
  if (path == '') {
    path = 'index.html';
  }

  var target = $('#navbarSupportedContent ul li a[href="' + path + '"]');
  // Add active class to target link
  target.parent().addClass('active');
});




// Add active class on another page linked
// ==========================================
// $(window).on('load',function () {
//     var current = location.pathname;
//     console.log(current);
//     $('#navbarSupportedContent ul li a').each(function(){
//         var $this = $(this);
//         // if the current path is like this link, make it active
//         if($this.attr('href').indexOf(current) !== -1){
//             $this.parent().addClass('active');
//             $this.parents('.menu-submenu').addClass('show-dropdown');
//             $this.parents('.menu-submenu').parent().addClass('active');
//         }else{
//             $this.parent().removeClass('active');
//         }
//     })
// });

//Mehrab_S          (")-:")
