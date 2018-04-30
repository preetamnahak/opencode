<?php
	include "clubsession.php"
?>

<!DOCTYPE html>
<html>
<head>
	<title>ACHIEVEMENTS</title>
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
$achieve=mysqli_real_escape_string($conn,$_POST['achieve']);
$image=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);

$sql4="SELECT * FROM club_user WHERE club_id=".$rowm["club_id"];
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
$sql="INSERT INTO achievement(achieve,clubpage_id) VALUES('".$achieve."',".$row4["clubpage_id"].")";


if($image==NULL)
{

$result=mysqli_query($conn,$sql);
echo "<span class='message'>Data Successfully added</span>";

}

else
{


if(mysqli_query($conn,$sql))
{
	
	$sql8="SELECT * FROM achievement ORDER BY achievement_id DESC LIMIT 1";
		$result8=mysqli_query($conn,$sql8);
		$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);

	$target_dir = "../images/achievement/";
	$target_file = $target_dir.$row8['achievement_id'].".jpg";

//fetching form data for society and category

$uploadOk = 1;
$imageFileType = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
// $check = getimagesize($_FILES["image"]["tmp_name"]);
//     if($check !== false) {
        
//         $uploadOk = 1;
//     } else {
//         echo "<span class='message'>File is not an image.</span>";
//         $uploadOk = 0;
//     }

// Check if file already exists
// if (file_exists($target_file)) {
//     echo "<span class='message'>Sorry, file already exists !!!</span>";
//     $uploadOk = 0;
// }
// Check file size

// Allow certain file formats
if($imageFileType != "jpg") {
    echo "<span class='message'>Sorry, only jpg or JPG files are allowed !!!</span>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
		$sql1="SELECT * FROM achievement ORDER BY achievement_id DESC LIMIT 1";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
if ($uploadOk == 0) {
    echo "<span class='message'> Data could not be saved.</span>";

    $sql2="DELETE FROM achievement WHERE achievement_id=".$row1["achievement_id"];
    $result2=mysqli_query($conn,$sql2);
    	



// if everything is ok, try to upload file
} else {

	$source = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
	list($width, $height) = getimagesize($_FILES["image"]["tmp_name"]);
	$newwidth = 1500;
	$newheight = 800;
	$destination = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg($destination,$_FILES["image"]["tmp_name"],100 );
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    	

		$sql3="UPDATE achievement SET image='".$row1["achievement_id"].".jpg' WHERE achievement_id=".$row1["achievement_id"];
		$result3=mysqli_query($conn,$sql3);
        echo "<span class='message'>Data Successfully added</span>";
    }

   else {

        echo "<span class='message'>Sorry, there was an error uploading your file.</span>";
         $sql2="DELETE FROM achievement WHERE achievement_id=".$row1["achievement_id"];
   		 $result2=mysqli_query($conn,$sql2);
    }
}

}




}

}
?>

<?php
	if(isset($_POST['delete']))
	{
		$GT = $_POST['id'];
		$sql2="SELECT * FROM `achievement` WHERE `achievement_id`=".$GT;
		$result2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);

		
		$sql= "DELETE FROM `achievement` WHERE `achievement_id`= ".$GT;
		if(mysqli_query($conn, $sql)){

			if($row2['image']!=NULL)
			{
			unlink("../images/achievement/".$GT.".jpg");
			}
			echo '
			<script>
				alert("Achievement Details  Deleted!");
			</script>
			';
		}
	}
?>
<body>
<div class="container" >
	<div class="row">
		
		<div class="col-md-4"></div>
		<div class="col-md-6">
			<h1>CLUB ACHIEVEMENTS</h1>
		</div>
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="clubhome.php" type="button" class="btn-warning btn-sm">Home</a>
		</div>
		<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
			<a href="clublogout.php" type="button" class="btn-danger btn-sm">LogOut</a>
		</div>
	</div>
	<div class="container-fluid " style="border-top:2px solid black;border-bottom: 2px solid black;border-radius: 10px; padding: 5px">
	<table class="table">
		<thead>
			<tr class="info">
				<th width="15%"></th>
				<th width="45%">Achievement</th>
				<th width="30%">Choose a photo</th>
			</tr>
		</thead>
	 </table>
				<div class="row" >
				<form action="club_achievements.php" method="POST" enctype="multipart/form-data">
				<div class="col-md-8" style="padding: 10px">
	 			<textarea type="text"  name="achieve" style="width: 70%;height: 150px" placeholder="Enter Acheivement"required></textarea>
	        	</div>
	        	<div class="col-md-4" style="padding: 10px">
	            <input type="file" name="image">
	        	</div>
	        	
	        	<button type="submit" name="submit" class="btn btn-info" style="margin-top: 10%;margin-left: 5%">Submit</button>
	        	</form>
	        </div>
	    </div>
		</div>
	    <div class="row" style="margin-top: 20px">
	    	<div class="col-md-1"></div>
	    	<div class="col-md-11">
	    	<form  action="club_achievements.php" method="POST">
	    		
	    		<input type="submit" name="choice" value="View All">
	    	</form>
	    	</div>
	    </div>
	    <div class="row" id="dishead">
	    	<div class="col-md-7"> Achievement</div>
	    	<div class="col-md-3"> Image</div>
	    	<div class="col-md-2"> Delete</div>
	    	
	    </div>
	    <?php
	    $i=0;
		//cheeeeeeeeeeeeeeeeeeeeeeecccccccccccckkkkkkkkkkkkkkkkk
		if(isset($_POST['choice']))
		{
			$sql1 = "SELECT  * FROM achievement";
			$result=mysqli_query($conn,$sql1);

			
			
			
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$str="";
				if($row['image']!=NULL){
					$str='<img src="../images/achievement/'.$row['image'].'" width="100px" height="100px">';
				}
				
				echo '


	     <div class="row" id="disbody">
	    	<div class="col-md-7">'.$row['achieve'].'</div>
	    	<div class="col-md-3">'.$str.'</div>
	    	<div class="col-md-2">
	    		<form action="" method="POST">
          			<input type="hidden" value="'.$row['achievement_id'].'" name="id">
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