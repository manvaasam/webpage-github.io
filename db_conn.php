<?php

$hostname= "localhost";
$db_name="manvaasa_slogin";
$unmae= "manvaasa_123";
$password = "123456789";


$conn = mysqli_connect($hostname , $unmae, $password, $db_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

