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
    width: auto;
    outline: none;
    padding: 2px;
    margin-bottom: 0px;
    font-family: Arial, Helvetica, sans-serif;
    align:center
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
    
    <link rel="shortcut icon" href="./image/fav_icon.png" type="image/png">
    <title>Certificate</title>
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
            <h2 style="margin-top:5%;margin: bottom 5% "><b>Certificates</b></h2>
            

          </div>
          <div class="collapse navbar-collapse" id="myNavbar">          
              <ul class="nav navbar-nav navbar-right" style="margin: top 1%;margin-left: 20%;padding: auto;">
                  
                     <li> <svg xmlns="http://www.w3.org/2000/svg"style="margin-top: 17%;margin-right:5%; padding: 5px;"width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg></li>
                 
                  <li><h4 style="margin-top:30%;margin: bottom 30% padding-left:2%; "><b><?php echo $_SESSION['name']; ?></b></h4></li>
                  <li><a href="logout.php"> <button  type="button" class="btn btn-success">Logout</button></a></li>
                  <li><a href="loginhome.php"><button type="button" class="btn btn-success">Back</button></a></li>

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
                        <img src="./image/courses/tnpc.jpg" class="img-fluid" alt="Responsive image" style="width:60%;height:60%; margin-top:10%; margin-bottom:10%" />
                        </center>
                    </div>
                   <div class="container wow animate__pulse">
                 <h1 style="margin-left: 30%;"><b>COURSE DETAILS </b></h1>
                    <h3 style="margin-top:5% ; margin-bottom:1% ;margin-left:1%;:10%text-align-last: center;"><b>Course Name:</b>TNPSC GROUP-2</h3>
                    <h3 style="margin-top:1% ; margin-bottom:1% ;margin-left:1%;:10%text-align-last: center;"><b>Trainer Name:</b>Nithya</h3>             
                    <h3 style="margin-top:1% ; margin-bottom:10% ;margin-left:1%;:10%text-align-last: center;"><b>Course Duration:</b>5 months </h3> </div>
                    
                                             <script>
                             let button=document.querySelector("body a");
                             button.addEventListener("click",()=>{
                                 const span = document.querySelector("a span");
                                 button.style.paddingRight ="50px";
                                 span.style.visibility="visible";
                                 setTimeout(() => {
                                     span.style.visibility="hidden";
                                     button.style.transition="Is ease in-out";
                                     button.style.paddingRight="10px";
                                 }, 3000);
                             })                          
                       </script>
                       
                  
                  </div>
                  </div> 
                  </div> 
                  <center>
                   <div class="container-fluid">  
                        <h3>YOUR COURSE COMPLETION CERTIFICATE</h3>   <br>
                        <img src="./image/cert/<?php echo $_SESSION['name']?>.jpg" width="800px" height="570px"/><br><br>
			
                        <a href='./image/cert/<?php echo $_SESSION['name']?>.pdf'target="_blank" download><button type="button" class="btn btn-success"style=" padding: 5px;margin-bottom:10px">CERTIFICATE DOWNLOAD</button><span></span></a> 
			
                        </div>
                        </center>
                  </body>
                  </html>
<?php
} else {
  header("Location: loginindex.php");
  exit();
}
?>  