<?php
	session_start();
   include 'config.php';
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,'select * from student_registration where roll_no ="'. $user_check.'"');
   $rowm = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   
   $login_session = $rowm['roll_no'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:signin.php");
   }
?>