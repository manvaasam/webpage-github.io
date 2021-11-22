<?php

include "./Emp_Login/Mdb_conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, htmlentities($_POST["name"]));
    $contact = mysqli_real_escape_string($conn, htmlentities($_POST["contact"]));
    $user_id = mysqli_real_escape_string($conn, htmlentities($_POST["user_id"]));
    $Now = date("Y-m-d H:i:s");
    if (preg_match("/^[0-9]+$/", $user_id)) {
        // contact is a 10 digit number or email
        if (preg_match("/^[0-9]{10}$/", $contact) || preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/", $contact)) {
            setcookie("user_name", $name, time() + (86400 * 365), "/");
            setcookie("user_id", $user_id, time() + (86400 * 365), "/");
            setcookie("user_contact", $contact, time() + (86400 * 365), "/");
            $_SESSION["user_name"] = $name;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_contact"] = $contact;
            echo "success";    
        } else {
            echo "Contact is not valid";
        }
    } else {
        echo "Error: user_id is not numeric";
    }
}