<?php
	
	$db=mysqli_connect("localhost","root","","sac");

	session_start();

	if(isset($_POST['username'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['psw']);

		$sql= "SELECT * from admin WHERE username='$username' AND password='$password' ";
		$result=mysqli_query($db,$sql);
		$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

		if(mysqli_num_rows($result)==1){

			
         	$_SESSION['login_user'] = $username;
			header("location:logged.php");

		}else{

			header("location:logfail.php");

		}
	}
?>