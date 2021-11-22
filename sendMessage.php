<?php
include "./Emp_Login/Mdb_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = mysqli_real_escape_string($conn, htmlentities($_POST["message"]));
    $user_id = mysqli_real_escape_string($conn, htmlentities($_POST["user_id"]));
    $user_name = mysqli_real_escape_string($conn, htmlentities($_POST["user_name"]));
    $user_contact = mysqli_real_escape_string($conn, htmlentities($_POST["user_contact"]));
    $Now = date("Y-m-d H:i:s");
    $type = "you";
    // user_id only conntains numbers using regex
    if (preg_match("/^[0-9]+$/", $user_id)) {
        // check message is not empty
        if (strlen($message) > 0) {
            // check message is not too long
            if (strlen($message) < 1000) {
                // check message is not too short
                if (preg_match("/^[0-9]{10}$/", $user_contact) || preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/", $user_contact)) {
                    $sql = "INSERT INTO messages (message, user_id,uname,email, sender, created_at) VALUES ('$message', '$user_id', '$user_name', '$user_contact', '$type', '$Now')";
                    if ($conn->query($sql) === TRUE) {
                        echo "1";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Contact is not valid";
                }
            } else {
                echo "Message is too long";
            }
        } else {
            echo "Message is empty";
        }
    } else {
        echo "Error: user_id is not numeric";
    }
}
