<?php
	include "studentsession.php"
?>
<?php
	
	if(isset($_POST['submit'])){
	$stud_id=$rowm['reg_id'];
    $title=mysqli_real_escape_string($conn,$_POST['project_title']);
    $desc=mysqli_real_escape_string($conn,$_POST['project_desc']);

    if(strcmp($pwd,$cpwd)==0)
    {

	$sql = "INSERT INTO student_project_idea(student_id,project_title,project_desc,date_of_sub)VALUES ('".$stud_id."','".$title."','".$desc."',NOW())";

		if (mysqli_query($conn,$sql)) 
		{
	
	    	header("location:studenthome.php#your_projects");
		}		 	
		else 
		{
	   	     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

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
		<title>Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Mina|Quicksand" rel="stylesheet">
		<link rel="shortcut icon" href="http://192.168.43.50/OpenCodeWeb/assetsWeb/favicon/favicon.png">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" style="position: fixed;z-index: 10000;background-color: black">
					<h1 id="logo"><a href="studenthome.php" style="font-size:1.5em;font-family:Mina;font-weight: bold;">OPENCODE</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="studenthome.php" style="font-family: Quicksand">Home</a></li>
							<!-- <li>
								<a href="">Projects</a>
								<ul>
									<li><a href="#project" class=" scrolly">Projects</a></li>
									<li><a href="project_idea.html">Start a project</a></li>
								</ul>
							</li> -->
							<li><a href="" style="font-family: Quicksand">About</a></li>
							<li><a href="studentlogout.php" class="button special" style="font-family: Quicksand">Sign Out</a></li>
						</ul>
					</nav>
				</header>


			<!-- Banner -->
			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<div class="content">
						<div class="container">
							<div class="row uniform">
								<!-- Form -->
								<section  class="3u 4u(medium) 12u$(xsmall)"></section>
								<section  class="6u 4u(medium) 12u$(xsmall)">
								<h3 style="font-family: Quicksand">Your Innovation Here</h3>

								<form method="post" action="#">
									<div class="row uniform 50%">
										<div class="12u$ 12u$(xsmall)">
											<input type="text" name="project_title" id="title" value="" placeholder="Enter Your Project Title" />
										</div>
										<!-- <div class="12u$">
											<div class="select-wrapper">
												<select name="project_domain" id="project_domain">
													<option value="">- Project Domain -</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option>
												</select>
											</div>
										</div> -->
										<div class="12u$">
											<textarea name="project_desc" id="project_desc" placeholder="Enter Project Description" rows="7" style="resize: none;overflow: auto;"></textarea>
											<!-- <input type="text" name="name" id="name" value="" placeholder="Enter Your Name" /> -->
										</div>

										<!-- <div class="12u$">
											<div class="select-wrapper">
												<select name="category" id="category">
													<option value="">- Category -</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option>
												</select>
											</div>
										</div> -->
										<!-- <div class="4u 12u$(medium)">
											<input type="radio" id="priority-low" name="priority" checked>
											<label for="priority-low">Low Priority</label>
										</div>
										<div class="4u 12u$(medium)">
											<input type="radio" id="priority-normal" name="priority">
											<label for="priority-normal">Normal Priority</label>
										</div>
										<div class="4u$ 12u$(medium)">
											<input type="radio" id="priority-high" name="priority">
											<label for="priority-high">High Priority</label>
										</div>
										<div class="6u 12u$(medium)">
											<input type="checkbox" id="copy" name="copy">
											<label for="copy">Email me a copy of this message</label>
										</div>
										<div class="6u$ 12u$(medium)">
											<input type="checkbox" id="human" name="human" checked>
											<label for="human">I am a human and not a robot</label>
										</div> -->
										
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" name="submit" value="Submit" class="special" /></li>	
											</ul>
										</div>
										<div class="12u$" style="height: 2.7em">
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