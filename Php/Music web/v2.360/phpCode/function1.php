<?php
// Databass

$connect = mysqli_connect('localhost', 'Quick', 'rAsH(TE6m@HMvsv8', 'Quick');

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

// function
function test_input($data)
{
  if ($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
}

function sql_fetch($table, $fild, $val)
{
  global $connect;
  $fetch = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `$table` WHERE $fild = '$val' LIMIT 1"));
  return $fetch;
}
