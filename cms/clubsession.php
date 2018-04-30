<?php
	session_start();
   include 'config.php';
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select * from club where username = '$user_check' ");
   $rowm = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $ses_sql1 = mysqli_query($conn,"select * from club_user where  club_id=".$rowm['club_id']);

   $rown=mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
   
   
   
   $login_session = $rowm['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:clublogin.php");
   }
?>