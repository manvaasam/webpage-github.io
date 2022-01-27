<?php

session_start();
if (isset($_SESSION['user_name'])){
  header("Location: ./dashboard.php");
  exit();
}
include("./config.php");
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
      $_SESSION['email'] = $row['email'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['about'] = $row['about'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['id'] = $row['id'];
      $dateTime = date("Y-m-d H:i:s");
      $sql  = "INSERT INTO `time` (emp_id,`name`, time_in) VALUES (:emp_id,:name, :time_in)";
      $stmt = $conn2->prepare($sql);
      $stmt->bindParam(':emp_id', $_SESSION['user_name']);
      $stmt->bindParam(':name', $_SESSION['name']);
      $stmt->bindParam(':time_in', $dateTime);
      $stmt->execute();

      header("Location: dashboard.php");
      exit();
    } else {
      header("Location: index.php?error=Incorect User name or password $sql");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/image/fav_icon.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
  <title>Manvaasam Login</title>
  <style>
    html,
    body {
      min-height: 100%;
    }

    .form-control:focus {
      box-shadow: 0 0 0 .25rem #90d156aa;
      border-color: #90d156;
    }
    .btn:focus {
      box-shadow: 0 0 0 .25rem #90d156aa;
    }
    body {
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    header {
      text-align: center;
    }


    p {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;

    }

    form {
      padding-top: 300px;
      padding-bottom: 100px;
    }

    input {
      margin-bottom: 10px;
      height: 40px;
      border-color: #90d156;
      outline: none;
      padding: 1px;
      font-size: large;
    }

    button {
      font-size: large;
      background-color: #90d156;
      color: white;
      border-radius: 25px;
      height: 40px;
      padding: 2px;
      margin-bottom: 0px;
      font-family: Arial, Helvetica, sans-serif;
      border-color: #90d156;
    }

    @media (max-width: 480px) {
      body {
        background-image: url(../img/background.png);
      }
    }

    @media (min-width: 481px) and (max-width: 1024px) {
      body {
        background-image: url(../img/background.png);
      }
    }

    @media (min-width: 1025px) {
      body {
        background-image: url(../img/background.png);
      }
    }
  </style>
</head>

<body>
  <?php
  if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger m-4" role="alert">
        <strong>Error!</strong> Invalid Username or Password.
      </div>';
  }
  ?>
  <div class="container py-5 my-5" style="max-width: 400px;margin: 0 auto">
    <form action="?" method="post">
      <input type="text" placeholder="User Name" class="form-control" name="uname" required>
      <input type="password" placeholder="Password" class="form-control" name="password" required>
      <button type="submit" class="btn w-100 btn-success" style="background-color: #90d156">LOGIN</button>
    </form>
  </div>
</body>

</html>