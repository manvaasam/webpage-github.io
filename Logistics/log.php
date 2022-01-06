<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="fav_icon.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Logistics Tracker</title>
  <link rel="shortcut icon" href="/image/fav_icon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.001.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3/dist/js/bootstrap.min.js"></script>
</head>

<body class="index">
  <?php
  include_once "../backend/header.php";
  ?>
  <div class="row">
    <div class="p-5"></div>
    <div class="col-md-6 text-center">
      <img src="log.jpeg" class="img-fluid" style="width: 500px; height:500px;" />
    </div>
    <div class="col-md-6 text-center">
      <div class="p-5"></div>
      <div style="width:80%;margin: 0 auto; background-color: white; border-radius: 30px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); " class="p-3">
        <div style="margin-left: 5%; margin-right: 5%;">
          <center>
            <h2>Track your couriers</h2>
          </center>
          <form style="padding-top: 10px; padding-bottom: 30px;" action="track.php" method="post">
            <center>
              <input style="    margin-bottom: 30px; width: 100%; height:40px; border-radius: 25px; border-color:rgb(70, 136, 3) ; outline:none; padding:5px;font-size:large;" type="text" placeholder="Tracker-id " name="ID" required>
            </center>
            <button style="    font-size:large;background-color: rgb(70, 136, 3);color:white; border-radius: 25px;height: 40px;width: 100px;outline: none;padding: 2px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif;" name="search" type="submit" class="btn btn-success">TRACK</button>
            <p>Manvaasam logistics started in the focus of connecting small village around tamilnadu</p>
          </form>
        </div>
      </div>
      <div class="p-3"></div>
      <div class="dealer text-center">
        <p style="padding-top: 25px;padding-left: 10px;padding-right: 10px;">Want to become a dealer in Manvaasam logistics..</p>
        <a href="https://forms.gle/kanHYMLLnMPuFkLa9"><button style="font-size:large;background-color: rgb(70, 136, 3);color:white; border-radius: 25px;height: 40px;width: 100px;outline: none;padding: 2px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif;">Click me!</button></a>
      </div>
    </div>
  </div>
  <style>
    .dealer {
      border-radius: 22px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      padding: 10px;
      text-align: center;
      width: 70%;
      margin: 0 auto;
    }
  </style>
</body>

</html>