<?php
		include 'config.php';
		session_start();

		if(isset($_POST['submit'])){
			$username = mysqli_real_escape_string($conn,$_POST['un']);
			$password = mysqli_real_escape_string($conn,$_POST['pw']);

			$sql= "SELECT * from student_registration WHERE roll_no='$username' AND password='$password' ";
			$result=mysqli_query($conn,$sql);
			$str="";
			if(mysqli_num_rows($result)==1){

	         	$_SESSION['login_user'] = $username;
				header("location:studenthome.php");
				echo'<script>alert("WELCOME");</script>';
			}
			else{
				echo '<script>alert("Invalid Credentials");window.open("clublogin.php","_self");</script>';		}
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
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Vollkorn+SC" rel="stylesheet">
  	<link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />

	<title>CLUB LOGIN</title>
	<style type="text/css">
	body{
		background-color : rgb(255, 255, 153);
	}
	.container{
		width:33%;
		margin-left:33%;
		margin-top:7%;
		padding:20px;
		background-color: blue;
		border:1px solid cyan;
		border-radius:10px;
		box-shadow: 0px 0px 20px black;
		position: absolute;
	}
	button{
		box-shadow:0px 0px 30px black;
	}
	label{
		color: white ;
		font-size: 18px ;
		font-family: 'Source Sans Pro', sans-serif;
	}
	.login{
		padding: 10px;
	}
	.button{
		padding: 10px;
	}
	.heading{
		margin-top: 5%;
		position: relative;
		font-family: 'Vollkorn SC', serif;
		border-top: 2px solid black;
		border-bottom: 2px solid black;
	}
	@media only screen and (max-width: 767px){
		.container{
			width: 80%;
			margin-left: 10%;
			margin-top: 20%;
		}
		.heading{
			margin-top: 15%;
		}
	}
	</style>
</head>
<body>
	<a type="button" class="btn  fa fa-home"  href="../index.php"  style="position:fixed;top:0;left:0;height:8vh;z-index: 4;font-size:35px;color:black"></a>
	<div class="heading">
		<center><h1><b>STUDENT ACTIVITY CENTER</b></h1></center>
	</div>
	<div class="container">
		<form action="" method="POST">
			<div class="login">
				<label><span class="glyphicon glyphicon-user"></span> Username</label>
				<input class="form-control" type="text" name="un" id="un" placeholder="Enter Username"required>
			</div>
			<div class="login">
				<label><span class="glyphicon glyphicon-eye-open"></span> Password</label>
				<input class="form-control" type="password" name="pw" id="pw" placeholder="Enter Password"required>
			</div>
			<div class="button">
				<button type="submit" name="submit" class="btn btn-info btn-block">Login</button>
			</div>
		</form>
	</div>
</body>
</html>