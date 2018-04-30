<?php
	
//	$db=mysqli_connect("localhost","root","","sac");
	include 'config.php';
	session_start();

	if(isset($_POST['submit'])){
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['psw']);

		$sql= "SELECT * from cmsadmin WHERE username='$username' AND password='$password' ";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if(mysqli_num_rows($result)==1){

			
         	$_SESSION['login_user'] = $username;
         	echo'<script>alert("HIIII");</script>';
			header("location:admin_home.php");

		}else{

			echo '<script>alert("Invalid Credentials");window.open("admin.php","_self");</script>';

		}
	}
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
	<script src="../jquery/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="http://192.168.43.50/OpenCodeWeb/assetsWeb/favicon/favicon.png">
	<title>OPENCODE | ADMIN</title>
	<style type="text/css">
	body{
		background-color: beige;
	}
	#cnt1{
		padding:20px;
		width:33%;
		border:2px solid cyan;
		margin-top:15%;
		background-color:powderblue;
		border-radius:5px;
	}
	@media only screen and (min-width:360px){
		#cnt1{
			width:90%;
		}
		input{
			width:200px;
		}
	}
	@media only screen and (min-width:768px){
		#cnt1{
			width:33%;
		}
		input{
			width:300px;
		}
	}
		
	/*	*{
			background: rgb(0,0,0) !important;
			color: rgb(0,255,0) !important;
			outline: 1px solid rgb(255,0,0) !important;
		}*/
	</style>
</head>
<body>
<div class="container" id="cnt1">
	
		<h2 style="color:black;position:relative;text-align:center">LOGIN FORM</h2><br/>
		<form role="form" action="admin.php" method="POST" name="vform">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Username:</label>
              <input type="text" id="username" name="username"  placeholder="Enter Username"required>
            </div>
            <div>
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Password:</label>
              <input type="password" id="psw" name="psw"  placeholder="Enter password"required>
            </div>
            <br/>
            <button type="submit" name="submit"   style="width: 20%;margin-left: 75%" class="btn btn-success btn-block"> Login</button>
           
            <br/>
          </form>
        </div>
</div>
</html>
</body>