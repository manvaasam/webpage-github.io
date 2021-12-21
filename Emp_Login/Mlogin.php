<?php

session_start();
include("./time/config.php");
$db2 = new Database();
$conn2 = $db2->getConnection();
date_default_timezone_set('Asia/Kolkata');

include "Mdb_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {
		$sql = "SELECT * FROM employees WHERE user_name='$uname' AND password='$pass'";
        
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
			$dateTime = date("Y-m-d H:i:s");
			$sql  = "INSERT INTO time (emp_id,name, time_in) VALUES (:emp_id,:name, :time_in)";
			$stmt = $conn2->prepare($sql);
			$stmt->bindParam(':emp_id', $_SESSION['user_name']);
			$stmt->bindParam(':name', $_SESSION['name']);
			$stmt->bindParam(':time_in', $dateTime);
			$stmt->execute();

			header("Location: img.php");
			exit();
		} else {
			header("Location: index.php?error=Incorect User name or password $sql");
			exit();
		}
	}
} else {
	header("Location: index.php");
	exit();
}
