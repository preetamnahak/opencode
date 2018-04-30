<?php
	include ('session.php');
?>

<!DOCTYPE html>
<html>
<head>

	<title>PROJECT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
	<script src="../jquery/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="http://192.168.43.50/OpenCodeWeb/assetsWeb/favicon/favicon.png">
	<style type="text/css">
		.box{
			border:2px solid black;
			margin: 40px;
			padding: 8px;
			background-color: white;
		}
		#box1{
			margin-bottom:4px;
			margin-left: 0px;
			margin-top: 10px;
			text-align: right;

		}
		
		body{
			background-color: rgb(255,255,204);
		}
	</style>
</head>
<?php
	if(isset($_POST['decline']))
	{
		$sql="UPDATE student_project_idea SET status='Declined' WHERE `project_id`= ".$_POST['id'];
		if(mysqli_query($conn, $sql)){
			echo '
			<script>
				alert("Project Entry Declined !");
			</script>
			';
		}
	}
?>
<?php
	if(isset($_POST['approve']))
	{
		$sql="UPDATE student_project_idea SET status='Approved' WHERE `project_id`= ".$_POST['id'];
		if(mysqli_query($conn, $sql)){
			echo '
			<script>
				alert("Project Entry Approved!");
			</script>
			';
		}
	}
?>
<body>

	<div class="row">
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="admin_home.php" type="button" class="btn-warning btn-sm">Home</a>
		</div>
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="adminlogout.php" type="button" class="btn-danger btn-sm">LogOut</a>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>|| PROJECT ENTRIES PANEL ||</h2>
		</div>
		<div class="col-md-1" style="padding-top: 20px;">
		</div>
	</div>
	<?php

		$sql="SELECT * FROM student_project_idea AS spi,student_registration AS sr WHERE spi.student_id=sr.reg_id ORDER BY spi.project_id DESC";
		$result = mysqli_query( $conn,$sql);
	    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		
		if(strcmp($row["status"], "Pending")==0)
		{
	    	echo '
	    		<div class="continer-fluid" >
          		
          		<div class="row box">
          			<div class="col-md-10">
          				<h3>Project Id:
		          		<span>'.$row['project_id'].'</span></h3>
		          		<h4>Submitted By :'.$row["name"].'</h4>
		          		<h4>Date :'.$row['date_of_sub'].'</h4>
		          		<b><h3>'.$row['project_title'].'</h3></b><br/>
		          		<h4>'.$row['project_desc'].'</h4>
          				
          			</div>
          			<div class="col-md-1">
          			<form action="" method="POST">
          				<input type="hidden" value="'.$row['project_id'].'" name="id">
          				 <input type="submit" class="btn btn-info" value="Approve" name="approve">
          			</form>
          			</div>
          			<div class="col-md-1">
          			<form action="" method="POST">
          				<input type="hidden" value="'.$row['project_id'].'" name="id">
          				 <input type="submit" class="btn btn-danger" value="Decline" name="decline">
          			</form>
          			</div>
          		</div>
		}
    </div>
	    	';

	    }
	    else
	    {
	    	echo '
	    		<div class="continer-fluid" >
          		
          		<div class="row box">
          			<div class="col-md-10">
          				<h3>Project Id:
		          		<span>'.$row['project_id'].'</span></h3>
		          		<h4>Submitted By :'.$row["name"].'</h4>
		          		<h4>Date :'.$row['date_of_sub'].'</h4>
		          		<b><h3>'.$row['project_title'].'</h3></b><br/>
		          		<h4>'.$row['project_desc'].'</h4>
          				
          			</div>
          			<div class="col-md-2">
          				<h4 style="font-weight:bold;text-align:center">'.$row["status"].'</h4>
          			</div>
          		</div>
		}
    </div>
	    	';

	    }


	
    }

    if(mysqli_num_rows($result)==0){
	    	echo '
	    		<h1>Project Entries Panel Empty</h1>

	    	';
	    }

?>

</body>
</html>