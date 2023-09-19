<?php
$type = $_GET['type'];
$json = $_GET['json'];
$list = json_decode(file_get_contents("jocks.json"),true);
$num = $list["num"];
	switch ($type){
	case 'jock':
	$random = rand(1,$num);
	$jock = $list["$random"];
	if ($num == '0'){
		echo '{"ERROR": "404"}';
	} else if ($json == 'true'){
	echo json_encode([
    'jock' => "$jock",
	'shomare_jock' => "$random",
	'nums' => "$num",
	'bot' => "@QuickRuBot",
	'developer' => '@Mehrab_S'
]);
	}else{
	?>
<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"><link rel="stylesheet" href="../css/styleJock.css"></head><body>
    <div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
    T.me/QuickRuBot
  </button>
  <button type="button" class="list-group-item list-group-item-action">Shomare Jock: <?php echo "$random"; ?></button>
  <button type="button" class="list-group-item list-group-item-action">Tedad Jock Hay Sabt Shode: <?php echo "$num"; ?></button>
  <button type="button" class="list-group-item list-group-item-action">Developer: T.me/Mehrab_S</button>
  <button type="button" class="list-group-item list-group-item-action" disabled><?php print "$jock"; ?></button>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body></html>
<?php
	}
	break;
	
	case 'time':
	if ($json == 'true'){
	include 'jdf.php';
	$time = jdate("H:i:s");
	$tarikh = jdate("Y/m/d");
		echo json_encode([
    'time' => "$time",
	'tarikh' => "$tarikh",
	'bot' => "@QuickRuBot",
	'developer' => '@Mehrab_S'
]);
	}else{
	?>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


  <title>Time - Quick</title>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
	<link href="../css/styleTimer.css" rel="stylesheet">
  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >
  <div id="root"></div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

  <script src='https://unpkg.com/react@17/umd/react.development.js'></script>
<script src='https://unpkg.com/react-dom@17/umd/react-dom.development.js'></script>
<script src='https://unpkg.com/browse/@types/react@16.4.14/index.d.ts'></script>
<script src='https://unpkg.com/browse/@types/react-dom@17.0.2/index.d.ts'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/classnames/2.3.1/index.min.js'></script>
<script src='https://kit.fontawesome.com/86933bf68b.js'></script>
      <script id="rendered-js" >
"use strict";
const TimerChar = (props) => {
    const ref = React.useRef(null);
    const colon = props.char === ":";
    if (colon) {
        return (React.createElement("h1", { className: "timer-char colon" }, ":"));
    }
    const number = parseInt(props.char);
    const getCharSlider = () => {
        let options = [];
        for (let i = 0; i <= 9; i++) {
            const classes = classNames("timer-char-slider-option", {
                active: number === i
            });
            options.push(React.createElement("span", { key: i, className: classes }, i));
        }
        const height = ref.current ? ref.current.offsetHeight : 0, top = `${number * height * -1}px`;
        return (React.createElement("div", { className: "timer-char-slider", style: { top } }, options));
    };
    return (React.createElement("div", { ref: ref, className: "timer-char number" }, getCharSlider()));
};
const Timer = () => {
    const [date, setDateTo] = React.useState(new Date());
    React.useEffect(() => {
        const interval = setInterval(() => {
            const update = new Date();
            if (update.getSeconds() !== date.getSeconds()) {
                setDateTo(update);
            }
        }, 100);
        return () => {
            clearInterval(interval);
        };
    }, [date]);
    const formatSegment = (segment) => {
        return segment < 10 ? `0${segment}` : segment;
    };
    const getHours = (hours) => {
        return hours % 12 === 0 ? 12 : hours % 12;
    };
    const getTime = () => {
        const hours = getHours(date.getHours()), minutes = date.getMinutes(), seconds = date.getSeconds();
        return `${formatSegment(hours)}:${formatSegment(minutes)}:${formatSegment(seconds)}`;
    };
    const getChars = () => {
        return getTime().split("").map((char, index) => (React.createElement(TimerChar, { key: index, char: char })));
    };
    return (React.createElement("div", { id: "timer" },
        React.createElement("div", { id: "timer-text" }, getChars())));
};
const App = () => {
    return (React.createElement("div", { id: "app" },
        React.createElement(Timer, null),
        React.createElement("a", { id: "youtube-link", href: "tg://resolve?domain=QuickRuBot", target: "_blank" },
            React.createElement("i", { className: "fa-brands fa-youtube" }),
            React.createElement("h1", null, "Quick"))));
};
ReactDOM.render(React.createElement(App, null), document.getElementById("root"));
    </script>
</body>
</html>
<?php
	}
	break;

	default:
	echo '{"ERROR": "This service does not exist"}';
}
?>