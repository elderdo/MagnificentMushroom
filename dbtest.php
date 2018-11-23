<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  
  $dbc = mysqli_connect("localhost","root","sesame");
  if (!$dbc) {
    echo "<p>Unable to connect to MySQL</p>";
  } elseif (!mysqli_select_db($dbc,"magnificent_mushroom")) {
    echo "<p>in MySQL, but no henry books db connection.</p>";
  } /*else {
    echo "<p>Gregory Elder is Connected to Magnificent Mushroom!</p>";
  }*/
?>