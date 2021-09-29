<?php

include "./Emp_Login/Mdb_conn.php";

header("Content-Type: application/json");
session_start();

if (isset($_POST["id"])) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM `messages` WHERE `user_id` = '$id' ORDER BY `id` ASC";
        $result = $conn->query($sql);
        // fetch all
        $messages = array();
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $messages[$i]["message"] = $row["message"];
            $messages[$i]["sender"] = $row["sender"];
            $i = $i + 1;
        }
        echo json_encode($messages);
    }
} else {
    echo "Error";
}
