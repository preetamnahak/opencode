<?php
	 session_start();
	 include 'config.php';
   //$conn=mysqli_connect("localhost","root","","sac");
  
   
   $user_check = $_SESSION['login_user'];
    if(!isset($_SESSION['login_user'])){
      header("location:admin.php");
   }
?>