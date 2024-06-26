<?php 
 
 $conn = mysqli_connect('localhost','root','','homework_management_bdd');

 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

 ?>
