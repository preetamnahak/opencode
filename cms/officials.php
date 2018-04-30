<?php
	include ('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>OFFICIALS</title>
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
$socid=mysqli_real_escape_string($conn,$_POST['society']);
$postid=mysqli_real_escape_string($conn,$_POST['category']);
$pname=mysqli_real_escape_string($conn,$_POST['pname']);
$plink=mysqli_real_escape_string($conn,$_POST['plink']);
$pimage=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);

$sql="INSERT INTO post_holder(pers_name,pers_link ,soc_id ,post_id ) VALUES('".$pname."','".$plink."','".$socid."','".$postid."')";
if(mysqli_query($conn,$sql))
{
	
	$sql8="SELECT * FROM post_holder ORDER BY pers_id DESC LIMIT 1";
		$result8=mysqli_query($conn,$sql8);
		$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);

	$target_dir = "../images/off/";
	$target_file = $target_dir.$row8['pers_id'].".jpg";

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
		$sql1="SELECT * FROM post_holder ORDER BY pers_id DESC LIMIT 1";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
if ($uploadOk == 0) {
    echo "<span class='message'> Data could not be saved.</span>";

    $sql2="DELETE FROM post_holder WHERE pers_id=".$row1["pers_id"];
    $result2=mysqli_query($conn,$sql2);
    	



// if everything is ok, try to upload file
} else {
	$source = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
	list($width, $height) = getimagesize($_FILES["image"]["tmp_name"]);
	$newwidth = 400;
	$newheight = 300;
	$destination = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg($destination,$_FILES["image"]["tmp_name"],100 );
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    	

		$sql3="UPDATE post_holder SET pers_img='".$row1["pers_id"].".jpg' WHERE pers_id=".$row1["pers_id"];
		$result3=mysqli_query($conn,$sql3);
        echo "<span class='message'>Data Successfully added</span>";
    }

   else {

        echo "<span class='message'>Sorry, there was an error uploading your file.</span>";
         $sql2="DELETE FROM post_holder WHERE pers_id=".$row1["pers_id"];
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
		$sql= "DELETE FROM `post_holder` WHERE `pers_id`= ".$GT;
		if(mysqli_query($conn, $sql)){
			unlink("../images/off/".$GT.".jpg");
			echo '
			<script>
				alert("Official\'s Details  Deleted!");
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
			<h1>SAC OFFICIALS</h1>
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
				<th width="17%">Select Society</th>
				<th width="17%">Select Post</th>
				<th width="25%">Enter Name</th>
				<th width="25%">External Link</th>
				<th width="16%">Choose Image</th>
			</tr>
		</thead>
	 </table>
				<div class="row" >
				<form action="officials.php" method="POST" enctype="multipart/form-data">
				<div class="col-md-2" style="padding: 10px">
	 			<select name="society" style="color: black;width:100%;height: 40px;border-radius: 3px">
	 				<?php
	 				$str1 = '<option value="';
	 				$str2 = '">';
	 				$str3 = '</option>';
	 				$sql = "SELECT * FROM society";

	 				$result = mysqli_query($conn,$sql);
	 				while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC))
	 				{
	 					echo $str1.$row1['soc_id'].$str2.$row1['soc_name'].$str3;
	 				}
	 				?>
	 			  <!--<option value="ge">General</option>
	    	      <option value="ts">Technical</option>
	    		  <option value="cs">Cultural</option>
	              <option value="ls">Literary</option>
	              <option value="ss">Sports</option>
	              <option value="fe">Fest</option>-->
	            </select>
	        	</div>
	        	<div class="col-md-2" style="padding: 10px">
	            <select name="category" style="color: black;width:100%;height: 40px;border-radius: 3px">
	            	<?php
	 				$str1 = '<option value="';
	 				$str2 = '">';
	 				$str3 = '</option>';
	 				$sql = "SELECT * FROM post ORDER BY pid ASC";

	 				$result = mysqli_query($conn,$sql);
	 				while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC))
	 				{
	 					echo $str1.$row1['post_id'].$str2.$row1['post_name'].$str3;
	 				}
	 				?>
	              <!--<option value="pr">President</option>
	    	      <option value="vp">Vice President</option>
	    		  <option value="cv">Convenor</option>
	    		  <option value="se">Secretary</option>-->
	            </select>
	        	</div>
	        	<div class="col-md-3" style="padding: 10px">
	            <input type="text" name="pname" placeholder="Enter Name" style="width:100%;height: 40px"required>
	        	</div>
	        	<div class="col-md-3" style="padding: 10px">
	            <input type="text" name="plink" placeholder="Enter link(if any)" style="width:100%;height: 40px">
	        	</div>
	        	<div class="col-md-2" style="padding: 10px">
	            <input type="file" name="image"required>
	        	</div>
	        	<button type="submit" name="submit" class="btn btn-info" style="margin-top: 3%;margin-left: 5%">Submit</button>
	        	</form>
	        </div>
	    </div>
		</div>
	    <div class="row" style="margin-top: 20px">
	    	<div class="col-md-1"></div>
	    		<div class="col-md-11">
	    	<form  action="officials.php" method="POST">
	    		<label>Choose Society</label>
	    		<select name="society1">
	    			<?php
	 				$str1 = '<option value="';
	 				$str2 = '">';
	 				$str3 = '</option>';
	 				$sql = "SELECT * FROM society";

	 				$result = mysqli_query($conn,$sql);
	 				while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC))
	 				{
	 					echo $str1.$row1['soc_id'].$str2.$row1['soc_name'].$str3;
	 				}
	 				?>
	    			<!--<option value="ge">General</option>
	    			<option value="ts">Technical</option>
	    			<option value="cs">Cultural</option>
	    			<option value="ls">Literary</option>
	    			<option value="ss">Sports</option>
	    			<option value="fe">Fest</option>-->
	    		</select>
	    		<input type="submit" name="choice">
	    	</form>
	    	</div>
	    </div>
	    <div class="row" id="dishead">
	    	<div class="col-md-1"> Society</div>
	    	<div class="col-md-1"> Post</div>
	    	<div class="col-md-4"> Name</div>
	    	<div class="col-md-3"> External Link</div>
	    	<div class="col-md-2"> Photo</div>
	    	<div class="col-md-1"> Delete</div>
	    	
	    </div>
	    <?php
	    $i=0;
		//cheeeeeeeeeeeeeeeeeeeeeeecccccccccccckkkkkkkkkkkkkkkkk
		if(isset($_POST['choice']))
		{
			$sql1 = "SELECT  ph.pers_id,ph.pers_name,ph.pers_link,ph.pers_img,ph.soc_id,p.post_name,s.soc_name FROM post_holder AS ph,post AS p,society AS s WHERE ph.post_id=p.post_id AND s.soc_id=ph.soc_id AND ph.soc_id='".$_POST['society1']."' ORDER BY ph.post_id DESC";
			$result=mysqli_query($conn,$sql1);

			
			
			
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				
				echo '


	     <div class="row" id="disbody">
	     	<div class="col-md-1">'.$row['soc_name'].'</div>
	    	<div class="col-md-1">'.$row['post_name'].'</div>
	    	<div class="col-md-4">'.$row['pers_name'].'</div>
	    	<div class="col-md-3">'.$row['pers_link'].'</div>
	    	<div class="col-md-2"><img src="../images/off/'.$row['pers_img'].'" width="100px" height="100px"></div>
	    	<div class="col-md-1">
	    		<form action="" method="POST">
          			<input type="hidden" value="'.$row['pers_id'].'" name="id">
          			<input type="submit" class="btn btn-danger btn-sm" value="Delete" name="delete" style="margin-top:30px">
          		</form>
          	</div>
	    	
	    </div>

	    		



					';
				}
				
			
			
		}

?>
	   
</body>
</html>