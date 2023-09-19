<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];
$sl = strlen($q);
if ($sl <= 1 || $sl >= 20) {
	exit();
}
$hint = "";
$none = "0";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
		$hint = "<li><div class=\"text_adv_se\"><a href='#' target='_blank'><h3 class=\"lato_font\">" .
          $name . "</h3></a><div class=\"genres\">تتلو</div></div><div class=\"search-cover\">
					<a title=\"دانلود اهنگ " . $name . "\" href=\"#\" target='_blank'>
						<img width=\"150\" height=\"150\" src=\"image/jangale-tarik.jpg\" loading=\"lazy\"></a></div><div class=\"rate_container lato_font\">
					<svg class=\"icon icon_emptystar\"><use xlink:href=\"#emptystar\"></use></svg>
					<span title=\"7.2/10\">7.2</span>
				</div></li>";
      } else {
		  $none = $none + 1;
		if ($none <= 4) {
		$hint = $hint . "<li><div class=\"text_adv_se\"><a href='#' target='_blank'><h3 class=\"lato_font\">" .
          $name . "</h3></a><div class=\"genres\">تتلو</div></div><div class=\"search-cover\">
					<a title=\"دانلود اهنگ " . $name . "\" href=\"#\" target='_blank'>
						<img width=\"150\" height=\"150\" src=\"image/jangale-tarik.jpg\" loading=\"lazy\"></a></div><div class=\"rate_container lato_font\">
					<svg class=\"icon icon_emptystar\"><use xlink:href=\"#emptystar\"></use></svg>
					<span title=\"7.2/10\">7.2</span>
				</div></li>";
				}else{
			break;
		}
      }
		
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<div class=\"nores\">جستجوی شما با نتیجه ای همراه نبود.</div>" : "<ul>" . $hint . "</ul><a class=\"btnShowAllResult\" title=\"مشاهده خواننده ها\" href=\"#\">مشاهده خواننده ها</a>";
?>