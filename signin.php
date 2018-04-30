<?php
		include 'config.php';
		session_start();

		if(isset($_POST['submit'])){
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);

			$sql= "SELECT * from student_registration WHERE roll_no='$username' AND password='$password' ";
			$result=mysqli_query($conn,$sql);
			$str="";
			if(mysqli_num_rows($result)==1){

	         	$_SESSION['login_user'] = $username;
				header("location:studenthome.php");
			}
			else{
			echo '<script>alert("Invalid Credentials !!!");window.open("signin.php","_self");</script>';		
			}
		}
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign-In</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Mina|Quicksand" rel="stylesheet">
		<link rel="shortcut icon" href="http://192.168.43.50/OpenCodeWeb/assetsWeb/favicon/favicon.png">
		<!-- <link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" /> -->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" style="position: fixed;z-index: 10000;background-color: black">
					
					<h1 id="logo"><a href="index.php" style="font-size:1.5em;font-family:Mina;font-weight: bold">OPENCODE</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php" style="font-family: Quicksand">Home</a></li>
							<li><a href="" style="font-family: Quicksand">About</a></li>
							<li>
								<a href="" style="font-family: Quicksand">Sign-in/up</a>
								<ul>
									<li><a href="" style="font-family: Quicksand">Sign-In</a></li>
									<li><a href="signup.php" style="font-family: Quicksand">Sign-Up</a></li>
								</ul>
							</li>
							<!-- <li><a href="#" class="button special">Sign Up</a></li> -->
						</ul>
					</nav>
				</header>



			<!-- Banner -->
			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row uniform">
								<!-- Form -->
								<section  class="3u 4u(medium) 12u$(xsmall)"></section>
								<section  class="6u 4u(medium) 12u$(xsmall)">
								<h3 style="font-family: Quicksand">Sign-In</h3>

								<form role="form" method="POST" action="">
									<div class="row uniform 50%">

										<div class="10u$ 12u$(xsmall)">
											<input type="text" name="username" id="username" value="" placeholder="Enter Your Username (Your Roll No.)" />
										</div>
										<div class="10u$ 12u$(xsmall)">
											<input type="password" name="password" id="password" value="" placeholder="Enter Your password" />
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" name="submit" value="Sign-in" class="button special"/></li>
												<li style="font-family: Quicksand">Don't  have an account ? <a href="signup.php">Sign-up Here</a></li>
											</ul>
										</div>
										<div class="12u$" style="height: 13.5em">
											<!-- <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea> -->
											<!-- <input type="text" name="name" id="name" value="" placeholder="Enter Your Name" /> -->
										</div>
										
									</div>
								</form>
								</section>
								<section  class="3u 4u(medium) 12u$(xsmall)"></section>
							</div>
						</div>
					</div>
				</section>

			<!-- Two -->
				

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>


	</body>
</html>