<?php

$hostname= "localhost";
$db_name="manvaasa_Logistics";
$unmae= "manvaasa_Log";
$password = "LogPassword";


$conn = mysqli_connect($hostname , $unmae, $password, $db_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

