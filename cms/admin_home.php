<?php
include 'session.php'
?>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
  <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- <link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" /> -->
	<title>HOME</title>
	<style type="text/css">
		
	/*	*{
			background: rgb(0,0,0) !important;
			color: rgb(0,255,0) !important;
			outline: 1px solid rgb(255,0,0) !important;
		}*/

		table{
			margin-top: 10px;
		}
		body{
			background-color: rgb(255,255,204);
		}


	.modal{
        top: 25%;
    }
    .modal-content {
        background: url(images/md_bg.jpg);
        width:100%;
        color:white;
    }
    .modal-content .modal-header button{
        color: white;
    }
    .modal-content .modal-body h2{
        color: white;
        font-family: 'Katibeh', cursive;
    }
    .modal-content .modal-body p{
        font-family: 'Bellefair', serif;
        font-size: 18px;
    }
    .modal-body{
    	background-color: beige;
    }  
    .modal-header ,.modal-footer{
    	background-color:powderblue; 
    }
    label{
    	color: black;
    }
    .modal-title{
    	color: black;
    	text-align: center;
    }
	</style>
</head>
<body>
<div class="container" >
  <center><h2 style="margin-top: 180px">ADD DETAILS</h2></center>
	<table class="table">
		<thead>
			<tr class="danger">
				<th>Information</th>
				<th>Add</th>
				<th>View All</th>
			</tr>
		</thead>
		<tbody>
			<tr class="success">
				<td>Add Projects</td>
				<td><button type="button" class="btn-info btn-sm" data-toggle="modal" data-target="#project">Add</button></td>
				<td><a href="projects.php" type="button" class="btn-success btn-sm">View All</a></td>
			</tr>
			<tr class="info">
				<td>Review Student Projects</td>
				<td><p>-----------</p></td>
				<td><a href="review_projects.php" type="button" class="btn-success btn-sm">View All</a></td>
			</tr>
		</tbody>		
	</table>
</div>

<!-- create two php files -->
<div class="container-fluid">
	<h3 style="display: inline-block;text-align: right;margin-right: 100px;float: right;"><a href = "adminlogout.php" style="color: red;font-weight: bold;text-decoration: none;"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></h3>
</div>

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
<!-- <script type="text/javascript" src="javascr.js"></script> -->

</body>
</html>