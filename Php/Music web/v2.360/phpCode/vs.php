<?php
include('function1.php');
$search_query = test_input($_POST["q"] ?? null);

if (isset($search_query) && !empty($search_query)) {
  $type = $search_query[0];
  switch ($type) {
    case '#':
      echo "soon";
      break;
    case '@':
      echo "soon";
      break;

    default:
      // $start_time = microtime(true);
      $num = 0;
      // Query the database for rows that match the search query, including misspellings
      $sql = "SELECT * FROM music WHERE name LIKE '%" . mysqli_real_escape_string($connect, $search_query) . "%' OR singer LIKE '%" . mysqli_real_escape_string($connect, $search_query) . "%' OR SOUNDEX(name) = SOUNDEX('" . mysqli_real_escape_string($connect, $search_query) . "') OR SOUNDEX(singer) = SOUNDEX('" . mysqli_real_escape_string($connect, $search_query) . "')";
      $result = mysqli_query($connect, $sql);

      // Display the rows in a table
      if (mysqli_num_rows($result) > 0) {
        // <!-- active -->
        if(mysqli_num_rows($result) == 1){ $active = ' active'; }
        while ($row = mysqli_fetch_assoc($result)) {
?>
          <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold"><?= $row["singer"] ?></div>
              <?= $row["name"] ?>
            </div>
            <span class="badge badge- rounded-pill">Quick</span>
          </li> -->
          <a href="#" class="list-group-item list-group-item-action px-3 border-0 ripple<?=$active??null?>"
    aria-current="true"><i class="fas fa-play fa-lg"></i>
    <?= $row["singer"] . ' - ' . $row["name"] ?>
  <span class="badge badge-primary rounded-pill"><?=$row["id"]?></span></a>
<?php
          $num++;
          if ($num > 10) {
            break;
          }
        }
      } else {
        ?>
<a href="#" class="list-group-item list-group-item-action px-3 border-0 active ripple"
    aria-current="true">No results found.</a>
  <?php
      }

      // Close the database connection
      mysqli_close($connect);

      //       $end_time = microtime(true);

      //       // Calculate the time taken in seconds
      //       $time_taken = $end_time - $start_time;

      //       // Calculate the time taken in hundredths of a second
      //       $time_taken_hundredths = round($time_taken * 1000, 2);

      //       $speed = $num . ' results in ' . $time_taken_hundredths . ' seconds';

      // <h6 style="position: absolute; opacity: 0.5"><?=$speed</h6>

      break;
  }
}else{
  ?>
<a href="#" class="list-group-item list-group-item-action px-3 border-0 active ripple"
    aria-current="true">No results found.</a>
  <?php
}
