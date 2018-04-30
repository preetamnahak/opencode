<?php
	include ('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>GALLERY</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
	<script src="../jquery/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />
	<style type="text/css">

		.message{
			font-size: 17px;
			color: black;
			font-weight: bold;

		}
		body{
			background-color: rgb(255,255,204);
			font-weight: bold;
		}
		#dishead{
			margin: 4px;
			margin-top: 30px;
			border:2px solid black;
			background-color: powderblue;
			color: black;
			font-size: 20px;
			font-weight: bold;
		}
		#disbody{
			margin: 4px;
			padding: 2px;
			margin-top: 10px;
			border:1px solid black;
			font-size: 15px;
			font-weight: bold;
			background-color: white;
		}

	</style>
</head>
<?php
if(isset($_POST["submit"]))
{
$idesc=mysqli_real_escape_string($conn,$_POST['idesc']);
$img_id=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);

$sql="INSERT INTO gallery(img_desc ) VALUES('".$idesc."')";
if(mysqli_query($conn,$sql))
{
	
	$sql8="SELECT * FROM gallery ORDER BY img_id DESC LIMIT 1";
		$result8=mysqli_query($conn,$sql8);
		$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);

	$target_dir = "../images/gallery/";
	$target_file = $target_dir.$row8['img_id'].".jpg";

//fetching form data for society and category

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "<span class='message'>File is not an image.</span>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "<span class='message'>Sorry, file already exists !!!</span>";
    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg") {
    echo "<span class='message'>Sorry, only jpg or JPG files are allowed !!!</span>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
		$sql1="SELECT * FROM gallery ORDER BY img_id DESC LIMIT 1";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
if ($uploadOk == 0) {
    echo "<span class='message'> Data could not be saved.</span>";

    $sql2="DELETE FROM gallery WHERE img_id=".$row1["img_id"];
    $result2=mysqli_query($conn,$sql2);
    	



// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    	

		$sql3="UPDATE gallery SET img_name='".$row1["img_id"].".jpg' WHERE img_id=".$row1["img_id"];
		$result3=mysqli_query($conn,$sql3);
        echo "<span class='message'>Data Successfully added</span>";
    }

   else {

        echo "<span class='message'>Sorry, there was an error uploading your file.</span>";
         $sql2="DELETE FROM gallery WHERE img_id=".$row1["img_id"];
   		 $result2=mysqli_query($conn,$sql2);
    }
}

}




}


?>

<?php
	if(isset($_POST['delete']))
	{
		$GT = $_POST['id'];
		$sql= "DELETE FROM `gallery` WHERE `img_id`= ".$GT;
		if(mysqli_query($conn, $sql)){
			unlink("../images/gallery/".$GT.".jpg");
			echo '
			<script>
				alert("Image   Deleted!");
			</script>
			';
		}
	}
?>
<body>
<div class="container" >
	<div class="row">
		
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1>SAC GALLERY</h1>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="home.php" type="button" class="btn-warning btn-sm">Home</a>
		</div>
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="logout.php" type="button" class="btn-danger btn-sm">LogOut</a>
		</div>
	</div>
	<div class="container-fluid " style="border-top:2px solid black;border-bottom: 2px solid black;border-radius: 10px; padding: 5px">
	<table class="table">
		<thead>
			<tr class="info">
				<th width="25%"></th>
				<th width="45%">Image Desription</th>
				<th width="40%">Choose Image</th>
			</tr>
		</thead>
	 </table>
				<div class="row" >
				<form action="gallery.php" method="POST" enctype="multipart/form-data">
				<div class="col-md-2"></div>
	        	<div class="col-md-4" style="padding: 10px">
	            <input type="text" name="idesc" placeholder="Enter short description" style="width:100%;height: 40px"required>
	        	</div>
	        	<div class="col-md-2"></div>
	        	<div class="col-md-4" style="padding: 10px">
	            <input type="file" name="image"required>
	        	</div>
	        	<button type="submit" name="submit" class="btn btn-info" style="margin-top: 3%;margin-left: 40%">Submit</button>
	        	</form>
	        </div>
	    </div>
		</div>
	    <div class="row" style="margin-top: 20px">
	    	<div class="col-md-1"></div>
	    		<div class="col-md-11">
	    	<form  action="gallery.php" method="POST">
	    		<label>All Images</label>
	    		
	    		<input type="submit" name="choice" value="View ALL">
	    	</form>
	    	</div>
	    </div>
	    <div class="row" id="dishead">
	    	<div class="col-md-1"></div>
	    	<div class="col-md-4"> Img Description</div>
	    	<div class="col-md-4"> Image</div>
	    	<div class="col-md-2"> Delete</div>
	    	<div class="col-md-1"></div>
	    	
	    </div>
	    <?php
	    $i=0;
		//cheeeeeeeeeeeeeeeeeeeeeeecccccccccccckkkkkkkkkkkkkkkkk
		if(isset($_POST['choice']))
		{
			$sql1 = "SELECT  * FROM  gallery";
			$result1=mysqli_query($conn,$sql1);

			
			
			
			while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC))
			{
				
				echo '


	     <div class="row" id="disbody">
	     	<div class="col-md-1"></div>
	    	<div class="col-md-4">'.$row['img_desc'].'</div>
	    	<div class="col-md-4"><img src="../images/gallery/'.$row['img_name'].'" width="100px" height="100px"></div>
	    	<div class="col-md-2">
	    		<form action="" method="POST">
          			<input type="hidden" value="'.$row['img_id'].'" name="id">
          			<input type="submit" class="btn btn-danger btn-sm" value="Delete" name="delete" style="margin-top:30px">
          		</form>
          	</div>
          	<div class="col-md-1"></div>
	    	
	    </div>

	    		



					';
				}
				
			
			
		}

?>
	   
</body>
</html>