<?php
	include ('session.php');
?>

<!DOCTYPE html>
<html>
<head>

	<title>NEWS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
	<script src="../jquery/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />
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
		a{
			text-decoration: none;
		}
		body{
			background-color: rgb(255,255,204);
		}
	</style>
</head>
<?php
	if(isset($_POST['delete']))
	{
		$sql= "DELETE FROM `news` WHERE `news_id`= ".$_POST['id'];
		if(mysqli_query($conn, $sql)){
			echo '
			<script>
				alert("News Deleted!");
			</script>
			';
		}
	}
?>
<body>

	<div class="row">
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="home.php" type="button" class="btn-warning btn-sm">Home</a>
		</div>
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="logout.php" type="button" class="btn-danger btn-sm">LogOut</a>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>|| NEWS PANEL ||</h2>
		</div>
		<div class="col-md-1" style="padding-top: 20px;">
	<button type="button" class="btn-info btn-sm" data-toggle="modal" data-target="#news">Add News</button>
		</div>
	</div>
	<?php
	
	if(isset($_POST['sub2'])){
    $nehyper=mysqli_real_escape_string($conn,$_POST['nehyper']);
    $nedesc=mysqli_real_escape_string($conn,$_POST['nedesc']);
    $nehead=mysqli_real_escape_string($conn,$_POST['nehead']);
   
	
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
	<?php

		$sql="SELECT * FROM `news` ORDER BY `news_id` DESC";
		$result = mysqli_query( $conn,$sql);
	    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

	    	$h = "";
	    	if($row['hyperlink']!=""){
	    		$h = '<a href="'.$row['hyperlink'].'" target="_blank">View More</a>';
	    	}
		
		
	    	echo '
	    		<div class="continer-fluid" >
          		
          		<div class="row box">
          			<div class="col-md-11">
          				<h3>News Id:
		          		<span>'.$row['news_id'].'</span>
		          		</h3><h5>'.$row['news_date'].'</h5><br/>
		          		<b><h3>'.$row['headline'].'</h3></b><br/>
		          		<h4>'.$row['descrip'].'</h4>
		          		'.$h.'
          				<br/>
		          		
          				
          			</div>
          			<div class="col-md-1">
          			<form action="" method="POST">
          				<input type="hidden" value="'.$row['news_id'].'" name="id">
          				 <input type="submit" class="btn btn-success" value="Delete" name="delete">
          			</form>
          			</div>
          		</div>
    </div>
	    	';


	
    }

    if(mysqli_num_rows($result)==0){
	    	echo '
	    		<h1>News Panel Empty</h1>

	    	';
	    }

?>

 <div class="modal fade" id="news" role="dialog">
     <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">NEWS</h3>
        </div>

            <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="news.php" method="POST"  name="vform">
            
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
              <input type="text" class="form-control" name="nehyper"  placeholder="Enter external link (if any)" >
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
</body>
</html>