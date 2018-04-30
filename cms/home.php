<?php
	include ('session.php');
?>


<?php 

    

    if(isset($_POST['sub1'])){
    $notitle=mysqli_real_escape_string($conn,$_POST['notitle']);
    $nodesc=mysqli_real_escape_string($conn,$_POST['nodesc']);
    //$nodate=$_POST['nodate'];
	
	$sql = "INSERT INTO notice(note_date,title,descrip)VALUES (NOW(),'".$notitle."','".$nodesc."')";

	if (mysqli_query($conn,$sql)) 
	{
    	echo "<center><h1>!!! Notice Succesfully Added !!!</h1></center>";
	}		 	
	else 
	{
   	     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


    }


    elseif(isset($_POST['sub2'])){
    $nehyper=$_POST['nehyper'];
    $nedesc=$_POST['nedesc'];
    $nehead=$_POST['nehead'];
   
	
	$sql = "INSERT INTO news(news_date,headline,descrip,hyperlink)VALUES (NOW(),'".$nehead."','".$nedesc."','".$nehyper."')";

	if (mysqli_query($conn,$sql)) 
	{
    	echo "<center><h1>!!! News Succesfully Added !!!</h1></center>";
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
    <link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />
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
				<td>Add New Notice</td>
				<td><button type="button" class="btn-info btn-sm" data-toggle="modal" data-target="#notice">Add</button></td>
				<td><a href="notice.php" type="button" class="btn-success btn-sm">View All</a></td>
			</tr>
			<tr class="info">
				<td>Add New News</td>
				<td><button type="button" class="btn-info btn-sm" data-toggle="modal" data-target="#news">Add</button></td>
				<td><a href="news.php" type="button" class="btn-success btn-sm">View All</a></td>
			</tr>
			<tr class="success">
				<td>Post Holders & SAC officials</td>
				<td><button type="button" class="btn btn-info btn-sm disabled">Add</button></td>
				<td><a href="officials.php" type="button" class="btn-success btn-sm">View All</a></td>
			</tr>
			<tr class="info">
				<td>Add Club Details</td>
				<td><button type="button" class="btn btn-info btn-sm disabled" >Add</button></td>
				<td><a href="club.php" type="button" class="btn-success btn-sm">View All</a></td>
			</tr>
      <tr class="success">
        <td>Add Gallery Images</td>
        <td><button type="button" class="btn btn-info btn-sm disabled" >Add</button></td>
        <td><a href="gallery.php" type="button" class="btn-success btn-sm">View All</a></td>
      </tr>
		</tbody>		
	</table>
</div>
<div class="container-fluid">
	<h3 style="display: inline-block;text-align: right;margin-right: 100px;float: right;"><a href = "logout.php" style="color: red;font-weight: bold;text-decoration: none;"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></h3>
</div>

 <div class="modal fade" id="notice" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">NOTICE</h3>
        </div>
            <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="logged.php" method="POST"  name="vform">
            <div class="form-group">
              <label><span class="glyphicon glyphicon-"></span>Notice Title</label>
              <input type="text" class="form-control" name="notitle"  placeholder="Enter Notice Title"required>
            </div>
           
            <div class="form-group">
              <label ><span class="glyphicon glyphicon-envelope"></span>Notice Description</label>
              <textarea type="text" class="form-control" name="nodesc" style="height: 200px" placeholder="Enter Notice Description"required ></textarea>
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

   <div class="modal fade" id="news" role="dialog">
     <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">NEWS</h3>
        </div>

            <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="logged.php" method="POST"  name="vform">
            
            <div class="form-group">
              <label ><span class="glyphicon glyphicon-envelope"></span>News Headline</label>
              <textarea type="text" class="form-control" name="nehead" style="height: 100px" placeholder="Enter News Description"required ></textarea>
            </div>

              <div class="form-group">
              <label ><span class="glyphicon glyphicon-envelope"></span>News Description</label>
              <textarea type="text" class="form-control" name="nedesc" style="height: 200px" placeholder="Enter News Description"required ></textarea>
            </div>

            <div class="form-group">
              <label><span class="glyphicon glyphicon-"></span>Hyperlink</label>
              <input type="text" class="form-control" name="nehyper"  placeholder="Enter hyperlink (if any)">
            </div>
   
            <button type="submit" name="sub2" class="btn btn-info btn-block"> Submit</button>
          </form>
      	</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
	</div>
  	</div>








   <div class="modal fade" id="demo2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript" src="javascr.js"></script>

</body>
</html>