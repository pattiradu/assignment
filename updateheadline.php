<?php

include('conn.php');

   // GET INPUTED DATA
   
   $headline = $_POST['headline'];
   

   // prepare update query
   $sql = "UPDATE `headline` SET `headline`='$headline' ";
   // execute mysqli query

   if (mysqli_query($conn,$sql)) {
      header('location:home.php');
   } else {
      print "update failed";
   }