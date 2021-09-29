<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>


  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="img.css">
    <link rel="shortcut icon" href="../image/fav_icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manvaasam Dashboard</title>

    <style>
      body {
        background-image: url("../img/Cover Image.png");
        background-repeat: repeat-x;
        background-position: center;
        height: 30%;
        background-size: cover;
      }
    </style>



  </head>

  <body>


    <span style="font-size:30px;cursor:pointer;color: rgb(255, 255, 255);" onclick="openNav()">&#9776; Manvaasam Login</span><a href="Mlogout.php"><button type="button" class="btn btn-success">Logout</button></a>
    <style>
      button {
        font-size: large;
        background-color: rgb(70, 136, 3);
        color: white;
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
      <img src="../img/manvaasam.jpg" alt="manvaasam logo" style="height: 150px; width: 150px; margin-left: 60px;"><br>
      <a href="https://drive.google.com/file/d/1uFunFq8GkvYiXXqzf_2FaMHGaZsbXKhP/view?usp=sharing"><img src="../img/Dashboard.png" height="16px" width="16px"> Dashboard</a>
      <a href="https://drive.google.com/file/d/1RZGkxP_B3jA7nHKPNCdkcMzhJx0Zs-md/view?usp=sharing"><img src="../img/Organisational .png" height="18px" width="18px"> Organization Structure</a>
      <a href="https://mail.google.com/mail/"><img src="../img/Gmail.png" style="height: 16px; width: 16px;"> Check Email</a>
      <a href="https://chat.google.com/"><img src="../img/Connect with Team.png" height="20px" width="20px"> Connect with Team</a>
      <a href="payroll.html"><img src="../img/Payroll.png" height="15px" width="15px">Payroll</a>
      <a href="documentCenter.php">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <g fill="none">
            <path d="M7 12.25a.75.75 0 1 1 1.5 0a.75.75 0 0 1-1.5 0zm.75 2.25a.75.75 0 1 0 0 1.5a.75.75 0 0 0 0-1.5zM7 18.25a.75.75 0 1 1 1.5 0a.75.75 0 0 1-1.5 0zm3.75-6.75a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5zM10 15.25a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75zm.75 2.25a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5zm8.664-9.086l-5.829-5.828a.493.493 0 0 0-.049-.04a.626.626 0 0 1-.036-.03a2.072 2.072 0 0 0-.219-.18a.652.652 0 0 0-.08-.044l-.048-.024l-.05-.029c-.054-.031-.109-.063-.166-.087a1.977 1.977 0 0 0-.624-.138c-.02-.001-.04-.004-.059-.007A.605.605 0 0 0 12.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.828a2 2 0 0 0-.586-1.414zM18.5 20a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5V4a.5.5 0 0 1 .5-.5h6V8a2 2 0 0 0 2 2h4.5v10zm-5-15.379L17.378 8.5H14a.5.5 0 0 1-.5-.5V4.621z" fill="currentColor" />
          </g>
        </svg>
        Document Center
      </a>
      <a href="adminChat.php">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
          <g fill="currentColor">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm7.194 2.766a1.688 1.688 0 0 0-.227-.272a1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 4C4.776 4 4 4.746 4 5.667c0 .92.776 1.666 1.734 1.666c.343 0 .662-.095.931-.26c-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01c1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 7.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01c1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4a1.686 1.686 0 0 0-.227-.273a1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 4c-.957 0-1.734.746-1.734 1.667c0 .92.777 1.666 1.734 1.666c.343 0 .662-.095.931-.26z" />
          </g>
        </svg>
        Chat</a>
      <a href="https://forms.gle/L8VQ4TvXZNEfXr5s8"><img src="../img/Reimburement.png" height="20px" width="20px"> Reimbursement</a>
      <a href="https://docs.google.com/forms/d/e/1FAIpQLSef0n9w-amHH_JpQOfTjtpyNmOA7Azv-pvKIzADA1N6tdoS2w/viewform"><img src="../img/Apply Leave.png" height="18px" width="18px"> Apply Leave</a>
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

      anime.timeline({
          loop: true
        })
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
  header("Location: Mindex.php");
  exit();
}
?>