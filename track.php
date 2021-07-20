<?php
session_start(); 
include "db_conn1.php";



if(isset($_POST['search'])  )
{
    $id = $_POST['ID'];



	$query = " SELECT * FROM Log WHERE Manvaasam_ID ='$id' ";
        $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      
  	while($row = $query_run->fetch_assoc()) {
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
      
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: white;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(70, 136, 3);
  color: white;
}

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="shortcut icon" href="fav_icon.png" type="image/png">
    <title>Status</title>
    <link rel="stylesheet" href="./WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <h2 style="margin-top:5%;margin: bottom 5% "><b>MANVAASAM LOGISTICS</b></h2>

          </div>
          <div class="collapse navbar-collapse" id="myNavbar">          
              <ul class="nav navbar-nav navbar-right" style="margin-top 1%;margin-left: 20%;padding-left: 5%;padding: auto;">
                  <li><h3 style="margin-top:22px;margin: bottom 20% padding-top:10%; "></h3></li>
                  <li><a href="log.php"> <button  type="button" class="btn btn-success">Back</button></a></li>
              </ul>
          </div>
        </div>
      </nav>

	</div>
   
    </div>
<center>
<h2 style="margin-top:15%"><b>TABLE STATUS</b></h2>
<h2><b>Thanks for choosing manvaasam couriers!!!!</b></h2>


  <table id="customers"class="table table--dark table-hover" style="width:50%; height:100px;font-size:20px;font-family: ">
    <tr class="table-dark">
      <th><b>Tracker-id</b></th><br>
      <th><b>Delivery Status</b></th><br>
      <th><b>Courier Location</b></th><br>
    </tr>
    <tr>
    <td> <?php echo  $row["Manvaasam_ID"]; ?> </td>
    <td> <?php echo  $row["Status"]; ?> </td>
    <td> <?php echo  $row["Current_Location"]; ?> </td>
  </table>
  
 </center>
  </div>
</div>
  </body>
  </html>



<?php    
  }
    }
    else
    {
            
        header("Location: yindex.php");
    }
}
 
?>