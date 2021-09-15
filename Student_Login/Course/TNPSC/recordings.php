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
    <title>Recordings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./image/fav_icon.png" type="image/png">
    <title>Recordings</title>
    <link rel="stylesheet" href="./WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  </head>
<script>
  function download(url) {
  const a = document.createElement('a')
  a.href = url
  a.download = url.split('/').pop()
  document.body.appendChild(a)
  a.click()
  document.body.removeChild(a)
}
</script>  

  <body >

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <h2 style="margin-top:5%;margin: bottom 5% "><b>Course Recordings</b></h2>

          </div>
          <div class="collapse navbar-collapse" id="myNavbar">          
              <ul class="nav navbar-nav navbar-right" style="margin: top 1%;margin-left: 20%;padding-left: 5%;padding: auto;">
                  
                     <li> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" style="margin-top:13px;" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg></li>
                 
                  <li><h3 style="margin-top:22px;margin: bottom 20% padding-top:10%; "><b><?php echo $_SESSION['name']; ?></b></h3></li>
                  <li><a href="logout.php"> <button  type="button" class="btn btn-success">Logout</button></a></li>
              </ul>
          </div>
        </div>
      </nav><br><br><br><br>
      <div class="container">
            <div class="row wow animate__fadeIn animate__slower" style="margin-top:1%;background-color:#90d156;margin-bottom:8%;border-radius: 60px 5px;box-shadow: 0 4px 8px 0 rgba(68, 67, 67, 0.2), 0 6px 20px 0 rgba(80, 79, 79, 0.19);">
                <div class="container">
                <div class="row container">
                   <div  class="col-sm-5 wow animate__fadeInLeft">
                        <center>
                        <img src="image/cybersec.jpg" class="img-fluid" alt="Responsive image" style="width:60%;height:60%; margin-top:10%; margin-bottom:10%" />
                        </center>
                    </div>                  
                   <div class="container wow animate__pulse">
                 <h1 style="margin-left: 30%;"><b>COURSE DETAILS </b></h1>
                    <h3 style="margin-top:5% ; margin-bottom:1% ;margin-left:1%;:10%text-align-last: center;"><b>Course Name:</b>Cyber Security</h3>
                    <h3 style="margin-top:1% ; margin-bottom:1% ;margin-left:1%;:10%text-align-last: center;"><b>Trainer Name:</b>Mr.Karthick</h3>             
                    <h3 style="margin-top:1% ; margin-bottom:10% ;margin-left:1%;:10%text-align-last: center;"><b>Course Duration:</b>14.08.2021 - 05.09.2021</h3>   
                  </div>
                  </div></div></div>
                    </div>
                  <div class="container-fluid">                   
     <center>
     <div class="text-animation">
       <h1><b> CLASS RECORDINGS</b> </h1> 
            </div>
     </center>
     <br><br>
     <div class="row">
        <div class="col-sm-4"><h3>DAY 3</h3></div>
        <div class="col-sm-4"><h3>DAY 4</h3></div>
        <div class="col-sm-4"><h3>DAY 5</h3></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_3.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_4.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_5.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
     </div>
        <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><h3>DAY 6</h3></div>
        <div class="col-sm-4"><h3>DAY 7</h3></div>
        <div class="col-sm-4"><h3>DAY 8</h3></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_6.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_7.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_8.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
     </div>
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><h3>DAY 9</h3></div>
        <div class="col-sm-4"><h3>DAY 18</h3></div>
        <div class="col-sm-4"><h3>DAY 19</h3></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_9.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_18.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_19.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
     </div>
     
    <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><h3>DAY 20</h3></div>
        <div class="col-sm-4"><h3>DAY 21</h3></div>
        <div class="col-sm-4"><h3>DAY 22</h3></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_20" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_21" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        <div class="col-sm-4"><iframe  style="border-radius:30px 10px;"width="400" height="300" src="video/day_22" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
     </div><br>
     
    <!-- <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><h3>DAY 13</h3></div>
        <div class="col-sm-4"><h3>DAY 14</h3></div>
        <div class="col-sm-4"><h3>DAY 15</h3></div>
        <div class="col-sm-4"><img src="./image/gallery/34.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/3.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/35.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
     </div>
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/44.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/27.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/43.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
     </div>

     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/13.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/14.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/15.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
     </div>
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/16.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/17.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/18.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
     </div>
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/19_.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower"  style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/20.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/21.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
     </div>
     
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/4.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/5.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/6.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
     </div>
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/7.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/8.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/9.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
     </div>
     
     <div class="row" style="margin-top:3%">
        <div class="col-sm-4"><img src="./image/gallery/24.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/22.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:10px 50px;" /></div>
        <div class="col-sm-4"><img src="./image/gallery/23.jpg" class="img-thumbnail wow animate__jackInTheBox animate__slower" style="border-radius:50px 10px;" /></div>
     </div>-->
     
</div>
</body>
</html>


<?php
} else {
  header("Location: loginindex.php");
  exit();
}
?>  
