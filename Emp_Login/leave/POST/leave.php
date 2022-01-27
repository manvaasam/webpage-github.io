<?php 
include('../../config.php');
// Server post request
try {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['email']) && isset($_POST['typeOfLeave']) && isset($_POST['fromDate']) && isset($_POST['toDate']) && isset($_POST['reason'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $typeOfLeave = $_POST['typeOfLeave'];
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $status = "Pending";
        $reason = $_POST['reason'];
        $fromDate = changeDateFormat($fromDate);
        $toDate = changeDateFormat($toDate);
        $dateTime = date("Y-m-d H:i:s");
        $conn = new Database();
        $db = $conn->getConnection();
        $sql = "INSERT INTO `leave` 
    (`name`, `user_name`, `email`, `typeOfLeave`, `fromDate`, `toDate`, `status`, `reason`, `created_at`)
                VALUES
    (:name, :id, :email, :typeOfLeave, :fromDate, :toDate, :status, :reason, :dateTime)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':typeOfLeave', $typeOfLeave);
        $stmt->bindParam(':fromDate', $fromDate);
        $stmt->bindParam(':toDate', $toDate);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':dateTime', $dateTime);
        $stmt->execute();
        $last_id = $db->lastInsertId();
        if ($stmt->rowCount() > 0) {
            // Send the mail
            $to = $email;
            $subject = "Leave Request";
            $message = "Dear $name,<br><br>
            Your leave request has been submitted successfully. <br><br>
            Your leave request details are as follows: <br><br>
            <b>Name:</b> $name <br>
            <b>User Name:</b> $id <br>
            <b>Email:</b> $email <br>
            <b>Type Of Leave:</b> $typeOfLeave <br>
            <b>From Date:</b> $fromDate <br>
            <b>To Date:</b> $toDate <br>
            <b>Reason:</b> $reason <br><br>
            Thanks,<br>
            Leave Management System";
 
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: 	Manvaasam Leave Management <manvaasamtreebank2020@manvaasam.com> ' . "\r\n";
            mail($email,$subject, $message, $headers);



            // Send the mail to admin
            $message = "Dear Admin,<br><br>
            A new leave request has been submitted. <br><br>
            The details are as follows: <br><br>
            <b>Name:</b> $name <br>
            <b>User Name:</b> $id <br>
            <b>Email:</b> $email <br>
            <b>Type Of Leave:</b> $typeOfLeave <br>
            <b>From Date:</b> $fromDate <br>
            <b>To Date:</b> $toDate <br>
            <b>Reason:</b> $reason <br><br>";
            // Create Track and Approve Button
            $message .= "<a href='https://manvaasam.com/Emp_Login/leave/approve.php?id=$last_id&name=$name&email=$email'>Approve</a>";
            $message .= "&nbsp;&nbsp; . &nbsp;&nbsp;";
            $message .= "<a href='https://manvaasam.com/Emp_Login/leave/reject.php?id=$last_id&name=$name&email=$email'>Reject</a>";
            $message .= "&nbsp;&nbsp; . &nbsp;&nbsp;";
            $message .= "<a href='https://manvaasam.com/Emp_Login/leave/leave_details.php?id=$last_id'>Track</a>";
            $message .= "<br><br>Thanks,<br>Leave Management System";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: 	Manvaasam Leave Management <manvaasamtreebank2020@manvaasam.com> ' . "\r\n";
            mail("manvaasamhr@gmail.com,manvaasamtreebank2020@gmail.com,lakshmanan.manvaasam@gmail.com",$subject, $message, $headers);

            echo json_encode(array('status' => 'success', 'message' => 'Leave request submitted successfully'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Something went wrong'));
        }
    }
}
} catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
function changeDateFormat($date) {
    $date = explode('/', $date);
    $date = $date[2].'-'.$date[1].'-'.$date[0];
    return $date;
}
?>