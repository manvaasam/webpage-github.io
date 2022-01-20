<?php

session_start();
include("./config.php");
$db = new Database();
$conn = $db->getConnection();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $sql = "UPDATE `leave` SET `leave`.`status` = 'Rejected' WHERE `leave`.`id` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    // ccheck if the leavve is updated
    echo "Leave application is successfully Rejected";
    $to = $email;
    $subject = "Leave Application Rejected";
    $message = "Hi $name,\n\nYour leave application has been not approved.\n\nRegards,\nHR";    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: 	Manvaasam Leave Management <manvaasamtreebank2020@manvaasam.com> ' . "\r\n";
    mail($to, $subject, $message, $headers);
    echo "<script>alert('Leave Rejected');window.location.href='https://manvaasam.com/Emp_Login/leave/all.php'</script>";
}
