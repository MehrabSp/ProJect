<!-- Theme -->
<div class="c-card">
  <button class="c-theme" id="themePicker"></button>
  <h1 class="c-card__title">Variable Themes</h1>
  <p class="c-card__description">
    Cycle through 4 themes, from darkest to lightest.
  </p>
  <div class="c-theme-grid" id="themeGrid">
    <?php
    // Query the table and fetch all rows
    $sql = "SELECT * FROM `theme`";
    $result = mysqli_query($connect, $sql);

    // Loop through each row and display the values of each field
    while ($row = mysqli_fetch_assoc($result)) {

      // id type bg border surface text-primary text-secondary primary text-inverse creator
      $id = $row['id'];
      $type = $row['type'];

      if (strpos($row['bg'], '-') !== false) {
        $words = explode('-', $row['bg']);
        $dir = trim($words[0]);
        $_bg = $bg = trim($words[1]);
      } else {
        $_bg = $bg = $row['bg'];
      }

      $border = $row['border'];
      $surface = $row['surface'];
      $text_primary = $row['text-primary'];
      $text_secondary = $row['text-secondary'];
      $primary = $row['primary'];
      $text_inverse = $row['text-inverse'];

      // Define Icons
      $darkIcon = '<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Dark"><path d="M10 2c-1.82 0-3.53.5-5 1.35C7.99 5.08 10 8.3 10 12s-2.01 6.92-5 8.65C6.47 21.5 8.18 22 10 22c5.52 0 10-4.48 10-10S15.52 2 10 2z"></path></svg>';

      $sunsetIcon = '<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Sunset"><path d="M20 8.69V4h-4.69L12 .69 8.69 4H4v4.69L.69 12 4 15.31V20h4.69L12 23.31 15.31 20H20v-4.69L23.31 12 20 8.69zM12 18c-.89 0-1.74-.2-2.5-.55C11.56 16.5 13 14.42 13 12s-1.44-4.5-3.5-5.45C10.26 6.2 11.11 6 12 6c3.31 0 6 2.69 6 6s-2.69 6-6 6z"></path></svg>';

      $sunriseIcon = '<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Sunrise"><path d="M20 15.31 23.31 12 20 8.69V4h-4.69L12 .69 8.69 4H4v4.69L.69 12 4 15.31V20h4.69L12 23.31 15.31 20H20v-4.69zM12 18V6c3.31 0 6 2.69 6 6s-2.69 6-6 6z"></path></svg>';

      $lightIcon = '<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Light"><path d="M20 8.69V4h-4.69L12 .69 8.69 4H4v4.69L.69 12 4 15.31V20h4.69L12 23.31 15.31 20H20v-4.69L23.31 12 20 8.69zM12 18c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm0-10c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"></path></svg>';

      $linearIcon = '<i class="fas fa-circle-half-stroke"></i>';

      // - Word separator
      // ^ Grade and percentage separator for color

      switch ($type) {
        case 'dark':
          $icon = $darkIcon;
          break;
        case 'sunset':
          $icon = $sunsetIcon;
          break;
        case 'sunrise':
          $icon = $sunriseIcon;
          break;
        case 'light':
          $icon = $lightIcon;
          break;
        case 'linear':
          $icon = $linearIcon;
          $nonNullVariables = array_filter([$dir, $bg, $border, $surface, $text_primary, $text_secondary, $primary, $text_inverse]); // remove null values
          $cama = implode(", ", $nonNullVariables); // concatenate with separator
          $cama = str_replace('^', ' ', $cama);

          $bg = "linear-gradient($cama)";
          break;

        default:
          exit("Error");
          break;
      }

      $arr = [$_bg, $border, $surface, $text_primary, $text_secondary, $primary, $text_inverse];

      //span
      $span = "";
      foreach ($arr as &$value) {
        if ($value != NULL) {
          if (strpos($value, '^') !== false) {
            $parts = explode('^', $value);
            $value = $parts[0];
          }

          $span = $span . '<span class="c-swatch" style="background: ' . $value . '" title="bg"></span>';
        }
      }
      unset($value); // unset the reference to avoid unexpected behavior

      // Now the original variables have been updated with the new values
      $_bg = $arr[0];
      $border = $arr[1];
      $surface = $arr[2];
      $text_primary = $arr[3];
      $text_secondary = $arr[4];
      $primary = $arr[5];
      $text_inverse = $arr[6];

      // You can now use these variables with their updated values

      echo '
      <button data-theme="' . $id . '" class="themeChanghe c-box" style="--bg: ' . $bg . '; --border: ' . $border . '; --surface: ' . $surface . '; --text-primary: ' . $text_primary . '; --text-secondary: ' . $text_secondary . '; --primary: ' . $primary . '; --text-inverse: ' . $text_inverse . ';">

      <div class="c-box__title">
			<span class="c-box__icon">
        ' . $icon . '
			</span>
			<label>' . $type . '</label>
		</div>
		<div class="c-box__swatches">
			' . $span . '
		</div>
    </button>
    ';
    }
    ?>
  </div>
  <a class="c-button" id="button">Default Theme</a>
</div>

<script id="rendered-js">
  const themePicker = document.getElementById("themePicker");
  const themeList = document.getElementById("themeGrid");

  // Change the CSS variables on the root element, depending on the curent theme
  const them = () => {

    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${'theme'}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    
  }

  const updateTheme = (styles) => {

    const root = document.documentElement; // Get reference to :root element

styles.split(';').forEach(style => {
  if (style.trim()) {
// Change the CSS variable values
    const [property, value] = style.trim().split(':');
root.style.setProperty(property, value);

  }
});

  }

  const changeTheme = (theme) => {

    const themeGrid = themePicker.querySelector(".c-theme__grid");

    if (themeList.querySelector(".c-box--active")) {
      themeList
        .querySelector(".c-box--active")
        .classList.remove("c-box--active");
    }

    themeList.querySelectorAll(".c-box").forEach((item) => {
      if (item.dataset.theme === theme) {
        item.classList.add("c-box--active");
      }
    });

    switch (theme) {
      case '1':
        themeGrid.style.top = "0";
        break;
      case '2':
        themeGrid.style.top = "-3.6rem";
        break;
      case '3':
        themeGrid.style.top = "-7.1rem";
        break;
      case '4':
        themeGrid.style.top = "-10.7rem";
        break;
      default:
        themeGrid.style.top = "-14rem";
        break;
    }
  };

  // Define Icons
  const darkIcon = `<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Dark"><path d="M10 2c-1.82 0-3.53.5-5 1.35C7.99 5.08 10 8.3 10 12s-2.01 6.92-5 8.65C6.47 21.5 8.18 22 10 22c5.52 0 10-4.48 10-10S15.52 2 10 2z"></path></svg>`;

  const sunsetIcon = `<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Sunset"><path d="M20 8.69V4h-4.69L12 .69 8.69 4H4v4.69L.69 12 4 15.31V20h4.69L12 23.31 15.31 20H20v-4.69L23.31 12 20 8.69zM12 18c-.89 0-1.74-.2-2.5-.55C11.56 16.5 13 14.42 13 12s-1.44-4.5-3.5-5.45C10.26 6.2 11.11 6 12 6c3.31 0 6 2.69 6 6s-2.69 6-6 6z"></path></svg>`;

  const sunriseIcon = `<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Sunrise"><path d="M20 15.31 23.31 12 20 8.69V4h-4.69L12 .69 8.69 4H4v4.69L.69 12 4 15.31V20h4.69L12 23.31 15.31 20H20v-4.69zM12 18V6c3.31 0 6 2.69 6 6s-2.69 6-6 6z"></path></svg>`;

  const lightIcon = `<svg fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" title="Light"><path d="M20 8.69V4h-4.69L12 .69 8.69 4H4v4.69L.69 12 4 15.31V20h4.69L12 23.31 15.31 20H20v-4.69L23.31 12 20 8.69zM12 18c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm0-10c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"></path></svg>`;

  const linearIcon = `<i class="fas fa-circle-half-stroke fa-2x m-2"></i>`;

  // Content and click function for the theme picker
  themePicker.innerHTML = `
	<div class="c-theme__grid">
		${darkIcon}
		${sunsetIcon}
		${sunriseIcon}
		${lightIcon}
		${linearIcon}
	</div>
`;

  //icon
  themePicker.onclick = () => {
    changeTheme('4');
    updateTheme('--bg: #f7f8f9; --border: #f1f2f4; --surface: #ffffff; --text-primary: #091e42; --text-secondary: #626f86; --primary: #1d7afc; --text-inverse: #ffffff;');
  };
  //defualt button
  document.getElementById('button').onclick = () => {
    changeTheme('4');
    updateTheme('--bg: #f7f8f9; --border: #f1f2f4; --surface: #ffffff; --text-primary: #091e42; --text-secondary: #626f86; --primary: #1d7afc; --text-inverse: #ffffff;');
  };

  const capitalized = (word) => {
    return word.charAt(0).toUpperCase() + word.slice(1);
  };

  // Get all the keys
  var keys = document.querySelectorAll(".themeChanghe");

  // Loop through all the keys
  keys.forEach(function(key) {
    // Add a click event listener to each key
    key.addEventListener("click", function() {
      // Get the value of the "data-theme" attribute for this key
      var theme = key.getAttribute("data-theme");
      var styles = key.getAttribute("style");
      updateTheme(styles);

      // Do whatever you need with the value (e.g. log it to the console)
      changeTheme(theme);
      document.cookie = "theme=" + theme;
      // location.reload();
    });
  });

  changeTheme(them());
  
  // he boy \ M
</script>