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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
  <link rel="stylesheet" href="/WOW-master/css/libs/animate.css">
  <script>
    new WOW().init();
  </script>
  <style>
    body {
      background-image: url('head.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
      overflow: hidden;
    }
    .containers {
      position: relative;
      width: 50%;
    }
    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 100%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }
    .dealer{
      height:17%;
      width:30%;
      margin-left: 55%;
      top:60%;
      border-radius: 22px;
      position: absolute;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      margin-top: 5%;
    }
    .dealer button{
      left:35%;
      position: relative;
    font-size:large;
    background-color: #4CAF50;
    color:white;
    border-radius: 25px;
    height: 40px;
    width: 100px;
    border: none;
    padding: 2px;
    margin-bottom: 10px;
    font-family: Arial, Helvetica, sans-serif;
    
    }
    .social:hover {
      transform: scale(1.1);
      -webkit-transform: scale(1.1);
      -moz-transform: scale(1.1);
      -o-transform: scale(1.1);
    }

    .social {
      transform: scale(0.8);
      -webkit-transform: scale(0.8);
      -moz-transform: scale(0.8);
      -o-transform: scale(0.8);
      transition-duration: 0.5s;
      -webkit-transition-duration: 0.5s;
      -moz-transition-duration: 0.5s;
      -o-transition-duration: 0.5s;
    }


    #social-fb:hover {
      color: #3B5998;
    }

    #social-tw:hover {
      color: #4099FF;
    }

    #social-gp:hover {
      color: #d34836;
    }

    #social-em:hover {
      color: #f39c12;
    }

    .containers:hover .image {
      opacity: 0.3;
    }

    .containers:hover .middle {
      opacity: 1;
    }

    .text {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
    }

    .container .text-animation {
      width: 100px;
      height: 100px;
      animation-name: example;
      animation-duration: 4s;
    }

    @keyframes example {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .index {
      background-color: white;
      margin-left: 100px;
      margin-right: 500px;
      background-image: url('.png');
      background-position: top;
      background-size: 100% 250px;
      background-repeat: no-repeat;
    }

    p {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;

    }

    a:visited {
      color: rgb(70, 136, 3);
    }

    a:hover {
      color: rgb(70, 136, 3);
    }

    a:active {
      color: rgb(70, 136, 3);
    }

    .inner1 {
      margin-left: 10%;
      margin-right: 700px;
    }




    .form1 {
      padding-top: 10px;
      padding-bottom: 30px;
      width: 200px;
      float: left;
      margin: 20px;
      border-right: 1px solid white;
    }



    @media only screen and (max-width: 600px) {
      .loginbox {
        width: 80%;
        top: 20%;
        left: 9%;
        position: left;

      }
      .dealer{
        top:75%;
        left:2%;
        width:96%;
        height: max-content;
      }
    }
  </style>

</head>

<body class="index">
  <?php 
      include_once "../backend/header.php";
    ?>

<div class="col-sm-6 flex-center">
    <img src="log.jpeg" class="img-fluid" style="width: 500px; height:500px;margin-top:100px; margin-left:100px" />
  </div>
  <div style="height:250px; width:400px; background-color: white; top:28%; left:63%; position:absolute; border-radius: 30px; box-sizing:border-box;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
    <div style="    margin-left: 5%; margin-right: 5%;">
      <center>
        <h2>Track your couriers</h2>
      </center>
      <form style="padding-top: 10px; padding-bottom: 30px;" action="track.php" method="post">
        <center>
          <input style="    margin-bottom: 30px; width: 100%; height:40px; border-radius: 25px; border-color:rgb(70, 136, 3) ; outline:none; padding:5px;font-size:large;" type="text" placeholder="Tracker-id " name="ID" required>
        </center>
        <button style="    font-size:large;background-color: rgb(70, 136, 3);color:white; border-radius: 25px; margin-left: 35%;height: 40px;width: 100px;outline: none;padding: 2px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif;" name="search" type="submit" class="btn btn-success">TRACK</button>
        <p>Manvaasam logistics started in the focus of connecting small village around tamilnadu</p>
      </form>
    </div>
  </div>
  <div class="dealer">
    <p style="padding-top: 25px;padding-left: 10px;padding-right: 10px;">Want to become a dealer in Manvaasam logistics..</p>
    <a href="https://forms.gle/kanHYMLLnMPuFkLa9"><button>Click me!</button></a>
  </div>
</body>

</html>
