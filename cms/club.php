<?php
	include ('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>CLUB DETAILS</title>
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
$cname=mysqli_real_escape_string($conn,$_POST['cname']);
$cdesc=mysqli_real_escape_string($conn,$_POST['cdesc']);
$clink=mysqli_real_escape_string($conn,$_POST['clink']);
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$cimage=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);

$sql="INSERT INTO club (club_name, soc_id ,exter_link ,descrip ,username ,password ) VALUES('".$cname."','".$socid."','".$clink."','".$cdesc."','".$username."','".$password."')";
if(mysqli_query($conn,$sql))
{
	
	$sql5 ="SELECT * FROM club ORDER BY club_id DESC LIMIT 1";
	$result5 =mysqli_query($conn,$sql5);
	$row5 =mysqli_fetch_array($result5,MYSQLI_ASSOC);

	$sql6="INSERT INTO club_user(club_id) VALUES('".$row5["club_id"]."')";
	$result6 =mysqli_query($conn,$sql6);

	$sql4 ="SELECT * FROM club ORDER BY club_id DESC LIMIT 1";
	$result4 =mysqli_query($conn,$sql4);
	$row4 =mysqli_fetch_array($result4,MYSQLI_ASSOC);

	$target_dir = "../images/club/";
	$target_file = $target_dir.$row4['club_id'].".jpg";

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
		$sql1="SELECT * FROM club ORDER BY club_id DESC LIMIT 1";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
if ($uploadOk == 0) {
    echo "<span class='message'> Data could not be saved.</span>";

    $sql2="DELETE FROM club WHERE club_id=".$row1["club_id"];
    $result2=mysqli_query($conn,$sql2);
    	



// if everything is ok, try to upload file
} else {
	$source = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
	list($width, $height) = getimagesize($_FILES["image"]["tmp_name"]);
	$newwidth = 200;
	$newheight = 200;
	$destination = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg($destination,$_FILES["image"]["tmp_name"],100 );
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    	

		$sql3="UPDATE club SET logo ='".$row1["club_id"].".jpg' WHERE club_id=".$row1["club_id"];
		$result3=mysqli_query($conn,$sql3);
        echo "<span class='message'>Data Successfully added</span>";
    }

   else {
        echo "<span class='message'>Sorry, there was an error uploading your file.</span>";
        $sql2="DELETE FROM club WHERE club_id=".$row1["club_id"];
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
		$sql= "DELETE FROM `club` WHERE `club_id`= ".$GT;
		$sql5="SELECT * FROM `club_user` WHERE `club_id`=".$GT;
		$result5=mysqli_query($conn,$sql5);
		$row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);

		if(mysqli_query($conn, $sql)){
			

			
			$sql22= "SELECT * FROM `achievement` WHERE `clubpage_id`= ".$row5['clubpage_id'];
			$result22=mysqli_query($conn,$sql22);
			

			$sql33= "SELECT * FROM `blog` WHERE `clubpage_id`= ".$row5['clubpage_id'];
			$result33=mysqli_query($conn,$sql33);
			

			$sql44= "SELECT * FROM `event` WHERE `clubpage_id`= ".$row5['clubpage_id'];
			$result44=mysqli_query($conn,$sql44);
			
			$R1 = mysqli_fetch_all($result22,MYSQLI_NUM);
			$R2 = mysqli_fetch_all($result33,MYSQLI_NUM);
			$R3 = mysqli_fetch_all($result44,MYSQLI_NUM);
			

			$sql1= "DELETE FROM `club_user` WHERE `club_id`= ".$GT;
			if(mysqli_query($conn,$sql1))
			{
				unlink("../images/club/".$GT.".jpg");
			

			
				// while ($row22) {
				// 	unlink("../images/achievement/".$row22['achievement_id'].".jpg");
				// }
				
				while($row22=mysqli_fetch_array($result22,MYSQLI_ASSOC)){
					unlink("../images/achievement/".$row22['achievement_id'].".jpg");
				}
				$sql2= "DELETE FROM `achievement` WHERE `clubpage_id`= ".$row5['clubpage_id'];
				mysqli_query($conn,$sql2);

			
			
				// while ($row33) {
				// 	unlink("../images/blogs/".$row33['blog_id'].".jpg");
				// }

				while($row33=mysqli_fetch_array($result33,MYSQLI_ASSOC)){
					unlink("../images/blogs/".$row33['blog_id'].".jpg");
				}
				$sql3= "DELETE FROM `blog` WHERE `clubpage_id`= ".$row5['clubpage_id'];
				mysqli_query($conn,$sql3);
			

			
				// while ($row44) {
				// 	unlink("../images/event/".$row44['event_id'].".jpg");

				// }

				while($row44=mysqli_fetch_array($result44,MYSQLI_ASSOC)){
					unlink("../images/event/".$row44['event_id'].".jpg");
				}
				$sql4= "DELETE FROM `event` WHERE `clubpage_id`= ".$row5['clubpage_id'];
				mysqli_query($conn,$sql4);
			}
			



			echo '
			<script>
				alert("Club\'s Details  Deleted!");
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
			<h1>CLUB DETAILS</h1>
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
				<th width="12%">Select Society</th>
				<th width="14%">Club Name</th>
				<th width="15%">Club Decription</th>
				<th width="18%">External Link</th>
				<th width="16%">Choose Logo</th>
				<th width="14%">Enter Username</th>
				<th width="11%">Enter Password</th>
			</tr>
		</thead>
	 </table>
				<div class="row" >
				<form action="club.php" method="POST" enctype="multipart/form-data">
				<div class="col-md-1" style="padding: 10px">
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
	            <input type="text" name="cname" placeholder="Enter Name" style="width:100%;height: 40px"required>
	        	</div>
	        	<div class="col-md-2" style="padding: 10px">
	            <textarea type="text" name="cdesc" placeholder="Enter Club Description" style="width:100%;height: 100px"required></textarea>
	        	</div>
	        	<div class="col-md-2" style="padding: 10px">
	            <input type="text" name="clink" placeholder="Enter Club link(if any)" style="width:100%;height: 40px">
	        	</div>
	        	<div class="col-md-1" style="padding: 10px">
	            <input type="file" name="image"required>
	        	</div>
	        	<div class="col-md-2">
	        		<input type="text" name="username" placeholder="Enter Username" style="width: 100%;height: 40px;margin-left: 90px;"required>
	        	</div>
	        	<div class="col-md-2">
	        		<input type="password" name="password" placeholder="Enter Password" style="width: 100%;height: 40px;margin-left: 65px;"required>
	        	</div>
	        	<button type="submit" name="submit" class="btn btn-info" style="margin-top: 8%;margin-left: 25%">Submit</button>
	        	</form>
	        </div>
	    </div>
		</div>
	    <div class="row" style="margin-top: 20px">
	    	<div class="col-md-1"></div>
	    		<div class="col-md-11">
	    	<form  action="" method="POST">
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
	    	<div class="col-md-2"> Society Name</div>
	    	<div class="col-md-2"> Club Name</div>
	    	<div class="col-md-3"> Description</div>
	    	<div class="col-md-2"> External Link</div>
	    	<div class="col-md-2"> Photo</div>
	    	<div class="col-md-1"> Delete</div>
	    	
	    </div>
	     <?php
		//cheeeeeeeeeeeeeeeeeeeeeeecccccccccccckkkkkkkkkkkkkkkkk
		if(isset($_POST['choice']))
		{

			$sql1 = "SELECT c.club_name,c.descrip,c.exter_link,c.club_id,c.logo,s.soc_name FROM club AS c,society AS s WHERE c.soc_id=s.soc_id AND  c.soc_id='".$_POST['society1']."' ORDER BY c.club_id DESC";
			$result1=mysqli_query($conn,$sql1);
			while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC))
			{

				echo '


	     <div class="row" id="disbody">
	     	<div class="col-md-2">'.$row['soc_name'].'</div>
	    	<div class="col-md-2">'.$row['club_name'].'</div>
	    	<div class="col-md-3">'.$row['descrip'].'</div>
	    	<div class="col-md-2" style="overflow:auto">'.$row['exter_link'].'</div>
	    	<div class="col-md-2"><img src="../images/club/'.$row['logo'].'" width="100px" height="100px"></div>
	    	<div class="col-md-1">
	    		<form action="" method="POST">
          			<input type="hidden" value="'.$row['club_id'].'" name="id">
          			<input type="submit" class="btn btn-danger btn-sm" value="Delete" name="delete">
          		</form>
          	</div>
	    	
	    </div>




				';
			}
			
		   
		}

?>
	   
</body>
</html>