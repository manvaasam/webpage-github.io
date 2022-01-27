<?php


if ($_SERVER['SERVER_NAME'] == 'localhost') {
  $hostname= "localhost";
  $db_name="manvaasa_login";
  $uname= "root";
  $password = "";  
} else {
  $hostname= "localhost";
  $db_name="manvaasa_login";
  $uname= "manvaasa_login";
  $password = "Iron_Man@#10";
}


$conn = mysqli_connect($hostname,  $uname, $password, $db_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

