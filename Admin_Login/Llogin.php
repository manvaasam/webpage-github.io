<?php 
session_start(); 
include "db_conn2.php";

if(isset($_POST['add']) )
{
    $id = $_POST['ID'];

    $status = $_POST['status'];

    $address = $_POST['Address'];

    $contact = $_POST['Contact'];

    $courier = $_POST['Courier'];

    $cid = $_POST['CID'];

    $location = $_POST['Location'];



	$query = "insert into Log (Manvaasam_ID, Status, To_Address, Sender_Contact_No, Courier_Partner, Courier_ID, Current_Location) values ('$id', '$status', '$address', '$contact' , '$courier', '$cid', '$location')";
        $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      
        header("Location: Logindex.php");
    }
    else
    {
            
        header("Location: index.php");
    }
}
 

if(isset($_POST['update'])  )
{
    $id = $_POST['ID'];

    $status = $_POST['status'];


    $address = $_POST['Address'];

    $contact = $_POST['Contact'];

    $courier = $_POST['Courier'];

    $cid = $_POST['CID'];

    $location = $_POST['Location'];



	$query = "UPDATE Log SET  Status='$status' , Current_Location='$location' WHERE Manvaasam_ID ='$id' ";
        $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      
        header("Location: Logindex.php");
    }
    else
    {
            
        header("Location: index.php");
    }
}
 
