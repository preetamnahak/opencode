<?php
	session_start();
   include 'config.php';
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,'select * from user where emailid ="'. $user_check.'"');
   $rowm = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   
   $login_session = $rowm['emailid'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:signin.php");
   }
?>