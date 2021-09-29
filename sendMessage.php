<?php
include "./Emp_Login/Mdb_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = mysqli_real_escape_string($conn,htmlentities($_POST["message"]));
    $user_id = mysqli_real_escape_string($conn,htmlentities($_POST["user_id"]));
    $Now = date("Y-m-d H:i:s");
    $type = "you";
    // user_id only conntains numbers using regex
    if (preg_match("/^[0-9]+$/", $user_id)) {
        // check message is not empty
        if (strlen($message) > 0) {
            // check message is not too long
            if (strlen($message) < 1000) {
                // check message is not too short
                if (strlen($message) >= 5) {
                    $sql = "INSERT INTO messages (message, user_id, sender, created_at) VALUES ('$message', '$user_id', '$type', '$Now')";
                    if ($conn->query($sql) === TRUE) {
                        echo "1";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Message is too short";
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
