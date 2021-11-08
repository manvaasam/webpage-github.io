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
      border-color: rgb(70, 136, 3);
      outline: none;
      padding: 1px;
      font-size: large;
    }

    button {
      font-size: large;
      background-color: rgb(70, 136, 3);
      color: white;
      border-radius: 25px;
      height: 40px;
      padding: 2px;
      margin-bottom: 0px;
      font-family: Arial, Helvetica, sans-serif;
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
  <div class="container py-5 my-5" style="max-width: 500px;margin: 0 auto">
      <form action="Mlogin.php" method="post" autocomplete="off">
        <input type="text" placeholder="User Name" class="form-control" name="uname" required>
        <input type="password" placeholder="Password" class="form-control" name="password" required >
        <button type="submit" class="btn w-100 btn-success">login</button>
      </form>
  </div>
</body>

</html>