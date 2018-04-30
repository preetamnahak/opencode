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
	if(isset($_POST['delete']))
	{
		$sql="DELETE FROM `club_projects` WHERE `pro_id`= ".$_POST['id'];
		if(mysqli_query($conn, $sql)){
			echo '
			<script>
				alert("Project Deleted!");
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
		<div class="col-md-2" style="padding-top: 20px;padding-left: 20px">
			<a href="adminlogout.php" type="button" class="btn-danger btn-sm">LogOut</a>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-5">
			<h2>|| PROJECT PANEL ||</h2>
		</div>
		<div class="col-md-2" style="padding-top: 20px;">
	<button type="button" class="btn-info btn-sm" data-toggle="modal" data-target="#project">Add Project</button>
		</div>
	</div>
	<?php
  
  if(isset($_POST['sub1'])){
    $p_title=mysqli_real_escape_string($conn,$_POST['ptitle']);
    $p_desc=mysqli_real_escape_string($conn,$_POST['pdesc']);


  $sql = "INSERT INTO club_projects(pro_title,pro_desc)VALUES ('".$p_title."','".$p_desc."')";

    if (mysqli_query($conn,$sql)) 
    {
        echo "<center><h1>!!! Project Succesfully Added !!!</h1></center>";
    }     
    else 
    {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    }
  


?>
	<?php

		$sql="SELECT * FROM club_projects ORDER BY pro_id DESC";
		$result = mysqli_query( $conn,$sql);
	    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		
		
	    	echo '
	    		<div class="continer-fluid" >
          		
          		<div class="row box">
          			<div class="col-md-11">
          				<h3>Project Id:
		          		<span>'.$row['pro_id'].'</span>
		          		<b><h3>'.$row['pro_title'].'</h3></b><br/>
		          		<h4>'.$row['pro_desc'].'</h4>
          				
          			</div>
          			<div class="col-md-1">
          			<form action="" method="POST">
          				<input type="hidden" value="'.$row['pro_id'].'" name="id">
          				 <input type="submit" class="btn btn-danger" value="Delete" name="delete">
          			</form>
          			</div>
          		</div>
    </div>
	    	';


	
    }

    if(mysqli_num_rows($result)==0){
	    	echo '
	    		<h1>Project Panel Empty</h1>

	    	';
	    }

?>
<div class="modal fade" id="project" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">PROJECT</h3>
        </div>
            <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="" method="POST"  name="vform">
            <div class="form-group">
              <label><span class="glyphicon glyphicon-"></span>Project Title</label>
              <input type="text" class="form-control" name="ptitle"  placeholder="Enter Project Title"required>
            </div>
           
            <div class="form-group">
              <label ><span class="glyphicon glyphicon-envelope"></span>Project Description</label>
              <textarea type="text" class="form-control" name="pdesc" style="height: 200px" placeholder="Enter Project Description"required ></textarea>
            </div>

            
            
            <button type="submit" name="sub1"    class="btn btn-info btn-block"> Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>