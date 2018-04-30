<?php
	include "clubsession.php"
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
  	<link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />

	<title>CLUB HOME</title>
	<style type="text/css">
		body{
			background-color: rgb(255, 255, 153);
		}
		#row1{
			padding: 10px;
			margin-top: 2%;
		}
		.thumbnail{
			height : 200px;
			width : 200px;
		}
		#row3{
			position: relative;
			margin-top: 2%;
		}
		table{
			width: 100%;
			border-top: 2px solid black;
			border-bottom: 2px solid black;
		}
		td{
			padding: 10px;
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}
		@media only screen and (max-width: 767px){
			.thumbnail{
				height: 150px;
				width: 150px;
			}
			#row3{
				margin-top: 15%;
			}
		}
	</style>
</head>
<body>
	<?php

	echo'
	<div class="row" id="row1">
		<center><img class="thumbnail" src="../images/club/'.$rowm["logo"].'"></center>
	</div>
	<div class="row" id="row2">
		<center><h1>'.$rowm["club_name"].'</h1></center>
	</div>

		';
	?>
	<div class="row" id="row3">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th width="60%">Information</th>
						<th width="20%"></th>
						<th width="20%">Option</th>
					</tr>
				</thead>
				<tbody>
					<tr class="info">
						<td width="60%">Club's general details</td>
						<td width="20%"></td>
						<td width="20%"><a href="club_details.php"><button class="btn btn-info btn-sm">Edit</button></a></td>
					</tr>
					<tr class="danger">
						<td width="60%">Achievements</td>
						<td width="20%"></td>
						<td width="20%"><a href="club_achievements.php"><button class="btn btn-info btn-sm"> View</button></a></td>
					</tr>
					<tr class="info">
						<td width="60%">Blogs</td>
						<td width="20%"></td>
						<td width="20%"><a href="club_blogs.php"><button class="btn btn-info btn-sm"> View</button></a></td>
					</tr>
					<tr class="danger">
						<td width="60%">Events</td>
						<td width="20%"></td>
						<td width="20%"><a href="club_events.php"><button class="btn btn-info btn-sm"> View</button></a></td>
					</tr>
				</tbody>
			</table>
			<a href="clublogout.php"><button class="btn btn-info">Logout</button></a>
		</div>
	</div>








	</body>
	</html>