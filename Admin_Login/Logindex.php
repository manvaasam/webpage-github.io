<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
 background-image:url('head.png');
 background-repeat: no-repeat;
 background-attachment:fixed;
 background-size:100% 100%;

}

.logo
{
width:100px;
}

.navbar-brand{
    position: relative;
    width: 170px;
    left: 15px;
}
.containers {
  position: relative;
  width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
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

.social:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 .social {
     -webkit-transform: scale(0.8);
     /* Browser Variations: */

     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }

/*
    Multicoloured Hover Variations
*/

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
  from {opacity:0;}
  to {opacity:1;}
}
.index
{
    background-color:rgb(255, 255, 255);
    margin-left: 10px;
    margin-right: 10px;
    background-image: url('banner.png');
    background-position: top;
    background-size:100% 250px;
    background-repeat: no-repeat;
}
.loginbox
{
    height:900px;
    width:650px;
    background-color: white;
    top:28%;
    left:25%;
    position:absolute;
    border-radius: 30px;
    box-sizing:border-box;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
p{
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
   
}
a:visited {
    color:rgb(70, 136, 3) ;
  }
  a:hover {
    color: rgb(70, 136, 3);
  }
  a:active {
    color: rgb(70, 136, 3);
  }
.inner
{
    margin-left: 10%;
    margin-right: 55px;

}

img{
    top:5%;
    left:35%;
    position:relative;
    margin-top: 20px;
    margin-bottom: 20px;
    height:150px;
    width:150px;
}
form{
   
   padding-top: 10px;
   padding-bottom: 30px;
}


input{
    margin-bottom: 30px;
    width: 100%;
    height:40px;
    border-radius: 25px;
    border-color:rgb(70, 136, 3) ;
    outline:none;
    padding:5px;
    font-size:large;
}
button{
    font-size:large;
    background-color: rgb(70, 136, 3);
    color:white;
    border-radius: 25px;
    margin-left: 35%;
    height: 40px;
    width: 100px;
    outline: none;
    padding: 8px;
    margin-bottom: 5px;
    font-family: Arial, Helvetica, sans-serif;
}
@media only screen and (max-width: 600px) {
    .loginbox{
        width:80%;
     top:20%;
     left:9%;
     position: absolute;
     
    }
    
}
    

</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/image/fav_icon.png" type="image/png">	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tracker Form</title>

</head>
<body class="index">


    <nav class="navbar navbar-default navbar-fixed-top">
   

          <div class="collapse navbar-collapse" id="myNavbar">          
              <ul class="nav navbar-nav navbar-right" style="margin-top 1%;margin-left: 80%;padding-left: 5%;padding: auto;">

                  <a href="admin.php"> <button  type="button" class="btn btn-success">Back</button></a>
              </ul>
          </div>
     
      </nav>



<div class="loginbox">
    <div class="inner">
   <div><img src="/image/avatar.png" alt="#"></div> 


  
 <form action="Llogin.php" method="post">
   <input type="text" placeholder="Manvaasam ID" name="ID" required>
   <input type="text" placeholder="Status" name="status" required>
   <input type="text" placeholder="To Address" name="Address" >
   <input type="text" placeholder="Sender Contact No" name="Contact" >
   <input type="text" placeholder="Courier Partner" name="Courier" >
   <input type="text" placeholder="Courier ID" name="CID" >
   <input type="text" placeholder="Current Location" name="Location" required>
   <button type="submit" name="add">add</button>
	
   <button type="submit" name="update">update</button>

</form>

</div>
</div> 
</body>
</html>