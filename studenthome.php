
<?php
	include "studentsession.php"
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>OPENCODE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Mina|Quicksand" rel="stylesheet">
		<link rel="shortcut icon" href="http://192.168.43.50/OpenCodeWeb/assetsWeb/favicon/favicon.png">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<style >
			/* Grow */
		.hvr-grow {
		    display: inline-block;
		    vertical-align: middle;
		    transform: translateZ(0);
		    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
		    backface-visibility: hidden;
		    -moz-osx-font-smoothing: grayscale;
		    transition-duration: 0.3s;
		    transition-property: transform;
		}

		.hvr-grow:hover,
		.hvr-grow:focus,
		.hvr-grow:active {
		    transform: scale(1.05);
		}
		</style>
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
					<header id="header" style="position: fixed;z-index: 10000;background-color: black">	
						
					<h1 id="logo"><a style="font-size:1.5em;font-family:Mina;font-weight: bold;">OPENCODE</a></h1>
					
					
					<nav id="nav">
						<ul>
							<li><a href="" style="font-family: Quicksand">Home</a></li>
							<li><a href="" style="font-family: Quicksand">About</a></li>
							<li>
								<a href="" style="font-family: Quicksand">Projects</a>
								<ul>
									<li><a href="#project" class=" scrolly" style="font-family: Quicksand">Projects</a></li>
									<li><a href="ProjectIdeaSubmit.php" style="font-family: Quicksand">Start a project</a></li>
								</ul>
							</li>
						
							<li><a href="studentlogout.php" class="button special" style="font-family: Quicksand">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner" style="">
					<div class="content">
						<header>
							<h2>Let's revolutionize the way we develop</h2>
							<?php
							echo'
							<p style="font-family:Quicksand">Hello '.$rowm['name'].' !!!</p>
							';
							?>
						</header>
						<span class="image"><img src="image/logo2.png" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>



			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="image/land1.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								
								<div class="7u 12u$(medium)">
									<header>
										<h2 style="font-family: Quicksand">OPENCODE - <span style="font-family: Mina">our motive</span></h2>
									</header>
								</div>
								<div class="4u 12u$(medium)">
									<p style="text-align: justify;font-family: Quicksand">OpenCode is an open source community where we work on projects in which any interested person can join or start his project with us.</p>
								</div>

								<!-- <div class="4u$ 12u$(medium)">
									<p>Morbi enim nascetur et placerat lorem sed iaculis neque ante
									adipiscing adipiscing metus massa. Blandit orci porttitor semper.
									Arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer
									mi sed nascetur cep aliquet augue varius tempus. Feugiat lorem
									ipsum dolor nullam.</p>
								</div> -->
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="image/HelloWorld.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2 style="text-align: left;font-family:Quicksand">Whether you have started with the “hello world”, building the next Word Processor or building a product that would change the world…you are welcome to collaborate with us. Login, Start and represent the community!</h2>
						</header>
						<!-- <p>Feugiat accumsan lorem eu ac lorem amet ac arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer mi sed nascetur cep aliquet augue varius tempus lobortis porttitor lorem et accumsan consequat adipiscing lorem.</p> -->
						<!-- <ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul> -->
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

				<section id="three" class="spotlight style4 left">
					<span class="image fit main"><img src="image/Workflow.png" alt="" /></span>
					<div class="content">
						<header>
							<h2 style="text-align: left;font-family:Quicksand">Hey! OpenCode is interdisciplinary… Don’t worry if coding is not fun for you…just send us your idea that can be developed into a product and get started!</h2>
						</header>
						<!-- <ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul> -->
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="four" class="spotlight style3 right">
					<span class="image fit main bottom"><img src="image/Idea.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2 style="text-align: left;;font-family:Quicksand">Join Us and be a part of the rapidly growing Open Source community of software developers, robotolics, product developers and designers!</h2>
						</header>
						<!-- <ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul> -->
					</div>
					<a href="#your_projects" class="goto-next scrolly">Next</a>
				</section>
<!-- Table -->
<!-- for submitted projects -->
			<div class="container" id="your_projects" style="height: 4em"></div>
							<section>
								<div class="container">
								<h2 style="font-family:Mina;padding: 0.5em ">YOUR PROJECTS</h2>
								<!-- <h4>Default</h4> -->
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th style="font-size: 1.3em;font-family: Mina">Title</th>
												<th style="font-size: 1.3em;font-family: Mina">Description</th>
												<th style="font-size: 1.3em;font-family: Mina">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
										$sql="SELECT * FROM student_project_idea WHERE student_id=".$rowm["reg_id"];
										$result=mysqli_query($conn,$sql);
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											$temp="";
											if(strcmp($row["status"], "Approved")==0)
											{
												$temp='<i class="fa fa-check" style="color:green;font-size:1.5em;margin-left:0.5em"></i>';
											}
											elseif (strcmp($row["status"], "Declined")==0) {
												$temp='<i class="fa fa-times" style="color:red;font-size:1.5em;margin-left:0.5em"></i>';
											}
											elseif (strcmp($row["status"], "Pending")==0) {
												$temp='<i class="fa fa-pause" style="color:orange;font-size:1.2em;margin-left:0.5em"></i>';
											}
											echo"<tr><td style='font-family:Quicksand'>".$row["project_title"]."</td><td style='font-family:Quicksand'>".$row["project_desc"]."</td><td style='font-family:Quicksand'>".$row["status"].$temp."</td></tr>";
										}
										?>

										</tbody>
									</table>
								</div>
							</div>
						</section>

			<div class="container" id="project" style="height: 5em"></div>
				<section >
					<div class="container">								
						<div class="box alt">
									<div class="row 50% uniform" style="padding: 1em">
										<div class="12u$"><h2 style="font-family: Mina"><!-- <img src="images/pic07.jpg" alt="" /> -->OUR PROJECTS</h2></div>

										<?php
											$sql="SELECT * FROM club_projects";
											$result=mysqli_query($conn,$sql);
											$row=mysqli_fetch_all($result,MYSQLI_NUM);
											$n=mysqli_num_rows($result);
											$m=$n%3;
											$k=$n-$m;

											for($i=0;$i<$k;$i++)
											{
												echo'

												<div class="4u  12u(xsmall)" style="text-align:justify;font-family:Quicksand"><a class="hvr-grow"><span class="image fit"><img src="image/project.jpg" alt="" /></a><h3 style="margin-top:0.4em;font-family:Mina">'.$row[$i][1].'</h3></span>'.$row[$i][2].'</div>

												';
											}
											if($m==1)
											{
												echo'
												<div class="4u  12u(xsmall)" style="text-align:justify;font-family:Quicksand"><a class="hvr-grow"><span class="image fit"><img src="image/project.jpg" alt="" /></a><h3 style="margin-top:0.4em;font-family:Mina">'.$row[$n-1][1].'</h3></span>'.$row[$n-1][2].'</div>

												';
											}
											elseif($m==2)
											{
												echo'
												
												<div class="4u  12u(xsmall)" style="text-align:justify;font-family:Quicksand"><a class="hvr-grow"><span class="image fit"><img src="image/project.jpg" alt="" /></a><h3 style="margin-top:0.4em;font-family:Mina">'.$row[$n-2][1].'</h3></span>'.$row[$n-2][2].'</div>
												
												<div class="4u  12u(xsmall)" style="text-align:justify;font-family:Quicksand"><a class="hvr-grow"><span class="image fit"><img src="image/project.jpg" alt="" /></a><h3 style="margin-top:0.4em;font-family:Mina">'.$row[$n-1][1].'</h3></span>'.$row[$n-1][2].'</div>

												';
											}
										
										?>
									</div>
								</div></div>
			
				</section>


			<!-- Four -->
				<section id="five" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2 style="font-family: Mina">OUR DOMAIN</h2>
						</header>
						<div class="box alt">
							<div class="row uniform">
								<section class="4u 6u(medium) 6u(xsmall)">
									<span class="icon alt major fa-android"></span>
									<h3 style="font-family: Mina">App</h3>
									<p style="font-family: Quicksand">We have some really interesting apps to get your hands dirty, dive in!</p>
								</section>
								<section class="4u 6u$(medium) 6u$(xsmall)">
									<span class="icon alt major fa-code"></span>
									<h3 style="font-family: Mina">Web</h3>
									<p style="font-family: Quicksand">Join us and build apps that speak to the world</p>
								</section>
								<section class="4u$ 6u(medium) 6u(xsmall)">
									<span class="icon alt major fa-cogs"></span>
									<h3 style="font-family: Mina">Robotics</h3>
									<p style="font-family: Quicksand">AI, Brain Compter Interface, Internet Of things? What do you want to create?</p>
								</section>
								<section class="4u 6u$(medium) 6u$(xsmall)">
									<span class="icon alt major fa-paper-plane"></span>
									<h3 style="font-family: Mina">Create</h3>
									<p style="font-family: Quicksand">Join the Force now! Pitch in your awesome ideas in the community and start coding with us!</p>
								</section>
								<section class="4u 6u(medium) 6u(xsmall)">
									<span class="icon alt major fa-users"></span>
									<h3 style="font-family: Mina">Collaborate</h3>
									<p style="font-family: Quicksand">We are a collaborative society, we'll make sure you are not coding alone in a corner :P</p>
								</section>
								<section class="4u$ 6u$(medium) 6u$(xsmall)">
									<span class="icon alt major fa-bolt"></span>
									<h3 style="font-family: Mina">Deploy</h3>
									<p style="font-family: Quicksand">Publish and document your product and make a change in the world!</p>
								</section>
							</div>
						</div>
					</div>
				</section>
			
			<!-- PROJECTS -->
				

			<!-- Five -->
				<section id="five" class="wrapper style2 special fade">
					<div class="container">
						<header>
							<h2>GIVE YOUR INNOVATION A PLATFORM</h2>
							<p>Come Up with your own project idea !!!</p>
						</header>
						<form method="post" action="#" class="container 50%">
							<div class="row uniform 50%">
								<div class="4u"></div>
								<div class="4u$ 12u$(xsmall)"><a class="button special fit" href="ProjectIdeaSubmit.php">Get Started</a></div>
								<div class="4u"></div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>©Copyright 2017 OpenCode. All Rights Reserved.</li>
					</ul>
				</footer>

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