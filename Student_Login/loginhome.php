<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>


  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      * {
        box-sizing: border-box;
      }

      .slogin {
        margin: 0;
      }
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
    font-family: Arial, Helvetica, sans-serif;
    }

      p {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
      }

      .header {
        
        width: 100%;
        height: 100%;
      }

      .header img {
        width: 100%;
        height: 100%;
      }

      .column {
        float: left;
        width: 33.33%;
        padding: 15px;
        text-align: center;
      }

      .banner {
        padding: 10px;
        font-size: 250%;
      }

      @media screen and (max-width:650px) {
        .column {
          width: 100%;
        }
        .header{
            height:100%;
        }
      }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="shortcut icon" href="/image/fav_icon.png" type="image/png">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <h2 style="margin-top:5%;margin: bottom 5% "><b>MANVAASAM STUDENT LOGIN</b></h2>

          </div>
          <div class="collapse navbar-collapse" id="myNavbar">          
              <ul class="nav navbar-nav navbar-right" style="margin-top 1%;margin-left: 20%;padding-left: 5%;padding: auto;">
                  <li> <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 17%;margin-right:5%; padding: 5px;"width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg></li>
                  <li><h3 style="margin-top:22px;margin: bottom 20% padding-top:10%; "><b><?php echo $_SESSION['name']; ?></b></h3></li>
                  <li><a href="logout.php"> <button  type="button" class="btn btn-success">Logout</button></a></li>
              </ul>
          </div>
        </div>
      </nav>

	<div class="header"style="margin: top :50px"><br><br><br>
	<img src="/image/login/head.png">
	</div>
    <div class="banner" style="text-align:center">
      <h1>Welcome <?php echo $_SESSION['name']; ?></h1>    
    </div>
    <div class="row">
      <div class="column 1">
        <a href="./Course/<?php echo $_SESSION['course']?>/coursematerials.php" target="_self"><img src="/image/login/img1.png" alt="#"></a>
        <h3>Course materials</h3>
      </div>

      <div class="column 2">
        <a href="./Course/<?php echo $_SESSION['course']?>/recordings.php" target="_self"><img src="/image/login/img2.png" alt="Responsive image"></a>
        <h3>Course recordings</h3>
      </div>
      <div class="column 3">
        <a href="Course/<?php echo $_SESSION['course']?>/Certificate.php" target="_self"><img src="/image/login/img3.png" alt="#"></a>
        <h3>Certificate</h3>
      </div>
    </div>
  </body>
  </html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>