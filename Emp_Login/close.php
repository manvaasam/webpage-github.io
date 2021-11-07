<?php
session_start();
include_once "./Mdb_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["user_id"]) && isset($_POST["user_name"])) {
        $id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $username = mysqli_real_escape_string($conn, $_POST['user_name']);
        $sql = "SELECT * FROM messages WHERE user_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $text = "The Conversation Closed By :: $username \n\n";
        while ($row = mysqli_fetch_assoc($result)) {
            $text .= $row['created_at'] . "\n";
            if ($row['sender'] == 'you') {
                $text .= "u_" . $username . " :- " . $row['message'] . "\n";
            } else {
                $text .= $row['sender'] . " :- " . $row['message'] . "\n";
            }
        }
        $dateTime = date("Y-m-d H_i_s");
        $file = fopen("backup/" . $dateTime . " " . $id . " " . $username . ".txt", "w");
        fwrite($file, $text);
        fclose($file);
        $sql = "DELETE FROM messages WHERE user_id = '$id'";
        mysqli_query($conn, $sql);
        echo "<script>alert('The Conversation success fully closed');</script>";
        echo "<script>window.location.href='adminChat.php';</script>";
    }
} else {
    echo "Only POST request is allowed";
}
} else{
    echo "Not Authenticated";
}