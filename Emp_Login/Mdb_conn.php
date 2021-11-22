<?php

$hostname= "localhost";
$db_name="manvaasa_login";
$unmae= "manvaasa_login";
$password = "Iron_Man@#10";

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  $hostname= "localhost";
  $db_name="manvaasam";
  $unmae= "root";
  $password = "";  
}


$conn = mysqli_connect($hostname , $unmae, $password, $db_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

