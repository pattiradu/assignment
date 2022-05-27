<?php
session_start();

include"conn.php";

$email = $_SESSION['vmail'];
// user id
$data = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'");
$user = mysqli_fetch_object($data);
// store id in vars
$id = $user->userid;


  

	$current=$_POST['cp'];
	$new=$_POST['np'];

       $update=("UPDATE users SET password='$new' WHERE `userid`='$id' ");

       
   // execute mysqli query

   if (mysqli_query($conn,$update)) {
   
      header('location:home.php');
   } else {
      print "update failed";
   }

	

?>