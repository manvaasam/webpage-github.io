<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./img.css">
    <link rel="shortcut icon" href=".\image\fav_icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manvaasam Dashboard</title>
    
<style>
  body {
    background-image: url("img/Cover\ Image.png");
    background-repeat: repeat-x;
    background-position: center;
    height: 30%; 
    background-size: cover;
  }
</style> 
    


</head>
<body>
  
  
<span style="font-size:30px;cursor:pointer;color: rgb(255, 255, 255);" onclick="openNav()">&#9776; Manvaasam Login</span><a href="Mlogout.php"><button  type="button" class="btn btn-success">Logout</button></a>
<style>
button{
  font-size:large;
  background-color: rgb(70, 136, 3);
  color:white;
  border-radius: 25px;
  height: 40px;
  width: 100px;
  outline: none;
  padding: 2px;
  margin-bottom: 0px;
  margin-left: 900px;
  font-family: Arial, Helvetica, sans-serif;
  }
</style>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <img src="img/manvaasam.jpg" alt="manvaasam logo" style="height: 150px; width: 150px; margin-left: 60px;"><br>
    <a href="https://drive.google.com/file/d/1uFunFq8GkvYiXXqzf_2FaMHGaZsbXKhP/view?usp=sharing"><img src="img/Dashboard.png" height="16px" width="16px">   Dashboard</a>
    <a href="https://drive.google.com/file/d/1RZGkxP_B3jA7nHKPNCdkcMzhJx0Zs-md/view?usp=sharing"><img src="img/Organisational .png" height="18px" width="18px">   Organization Structure</a>
    <a href="https://mail.google.com/mail/"><img src="img/Gmail.png" style= "height: 16px; width: 16px;"  >   Check Email</a>

    <a href="https://chat.google.com/"><img src="img/Connect with Team.png" height="20px" width="20px">   Connect with Team</a>
    
    <a href="payroll.html"><img src="img/Payroll.png" height="15px" width="15px">   Payroll</a>
  
    <a href="https://forms.gle/L8VQ4TvXZNEfXr5s8"><img src="img/Reimburement.png" height="20px" width="20px">   Reimbursement</a>
    <a href="https://docs.google.com/forms/d/e/1FAIpQLSef0n9w-amHH_JpQOfTjtpyNmOA7Azv-pvKIzADA1N6tdoS2w/viewform"><img src="img/Apply Leave.png" height="18px" width="18px">  Apply Leave</a>
  </div>
  <br>
<br>
<br>


  <h2 style="color: white;">Lets root for each other</h2>
  <h2 style="color: white;">and watch each other grow!</h2>

  <br>

<h2 class="ml10" style="color:white;">
  <span class="text-wrapper">
    <span class="letters">WELCOME <b><?php echo $_SESSION['name']; ?></b></span>
  </span>
</h2>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  
 <style>
 .ml10 {
  position: relative;
  font-weight: 500;
  font-size: 2em;
}

.ml10 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.2em;
  padding-right: 0.05em;
  padding-bottom: 0.1em;
  
}

.ml10 .letter {
  display: inline-block;
  line-height: 1em;
  transform-origin: 0 0;
}
 </style>
 <script>
 // Wrap every letter in a span
var textWrapper = document.querySelector('.ml10 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml10 .letter',
    rotateY: [-90, 0],
    duration: 1000,
    delay: (el, i) => 45 * i
  }).add({
    targets: '.ml10',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
 </script>
</body>
</html>


<?php
} else {
  header("Location: loginindex.php");
  exit();
}
?>