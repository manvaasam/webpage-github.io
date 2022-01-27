<?php
include("../config.php");

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['email']) && isset($_POST['whatyoudo'])) {
            $name = $_POST['name'];
            $id = $_POST['id'];
            $email = $_POST['email'];
            $whatyoudo = $_POST['whatyoudo'];
            $dateTime = date("Y-m-d H:i:s");
            $conn = new Database();
            $db = $conn->getConnection();
            $sql = "INSERT INTO `activity`  (`name`, `user_name`, `email`, `whatyoudo`, `created_at`) VALUES (:name, :id, :email, :whatyoudo, :dateTime)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':whatyoudo', $whatyoudo);
            $stmt->bindParam(':dateTime', $dateTime);
            $stmt->execute();
            $last_id = $db->lastInsertId();
            $stmt = null;
            // logout
            session_destroy();
            header('Location: ../index.php');
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Something went wrong'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Something went wrong'));
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
function changeDateFormat($date)
{
    $date = explode('/', $date);
    $date = $date[2] . '-' . $date[1] . '-' . $date[0];
    return $date;
}
