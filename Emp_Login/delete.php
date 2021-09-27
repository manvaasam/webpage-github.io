<?php

session_start();
if ($_SESSION['user_name'] == 'MT0001') {
    if (isset($_GET['id'])) {
        include "Mdb_conn.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM `docscenter` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: documentCenter.php");
        }
    } else {
        header("location: documentCenter.php");
    }
}else {
    header("location: documentCenter.php");
}
