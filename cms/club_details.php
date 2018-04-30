<?php
	include "clubsession.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>DETAILS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
	<script src="../jquery/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />
  <style type="text/css">
	body{
		background-color: rgb(230,255,255);
	}
	.main
	{
		border:2px solid black;
		background-color: rgb(255,255,204);
		border-radius: 20px;
		padding: 40px;
	}
</style>
</head>
<?php
if(isset($_POST['submit']))
{
$president=mysqli_real_escape_string($conn,$_POST['president']);
$vice_president=mysqli_real_escape_string($conn,$_POST['vice_president']);
$fac_ad=mysqli_real_escape_string($conn,$_POST['fac_ad']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$facebook=mysqli_real_escape_string($conn,$_POST['facebook']);
$website=mysqli_real_escape_string($conn,$_POST['website']);


$sql="UPDATE club_user SET president='".$president."',vice_president='".$vice_president."',fac_ad='".$fac_ad."',contact='".$contact."',email='".$email."',facebook='".$facebook."',website='".$website."' WHERE clubpage_id=".$rown["clubpage_id"];
$result=mysqli_query($conn,$sql);

if($result)
{
	echo'
		<script>
			alert("Data Updated successfully !!!");
		</script>
	';
}
}
?>

<?php	

$ses_sql1 = mysqli_query($conn,"select * from club_user where  club_id=".$rowm['club_id']);
 $rown=mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
echo'

<body>

	<div class="container">
				<div class="row">
		
					<div class="col-md-4"></div>
					<div class="col-md-6">
					</div>
					<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
						<a href="clubhome.php" type="button" class="btn-warning btn-sm">Home</a>
					</div>
					<div class="col-md-1" style="padding-top: 20px;padding-left: 20px">
						<a href="clublogout.php" type="button" class="btn-danger btn-sm">LogOut</a>
					</div>
	</div>
				<center><h1>CLUB DETAILS</h1></center>
				<div class="col-md-1"></div>

				<div class="col-md-10 main">
				<form action="club_details.php" method="POST" >
				<div>
				<label>President (or Captain)</label>
	 			<textarea type="text"  name="president" class="form-control" style="width: 100%;height: 60px" placeholder="Club President (Captain if GAMES & SPORTS SOCIETY)"required>'.$rown["president"].'</textarea>
	 			</div>

				<div>
				<label>Vice President (or Vice Captain)</label>
	 			<textarea type="text"  name="vice_president"  class="form-control" style="width: 100%;height: 60px" placeholder="Club Vice President (Vice Captain if GAMES & SPORTS SOCIETY )"required>'.$rown["vice_president"].'</textarea>
	 			</div>

				<div>
				<label>Faculty Advisor</label>
	 			<textarea type="text"  name="fac_ad"  class="form-control" style="width: 100%;height: 60px" placeholder="Club Faculty advisor"required>'.$rown['fac_ad'].'</textarea>
	 			</div>

	 			<div>
	 			<label>Contact</label>
	 			<textarea type="text"  name="contact" class="form-control" style="width: 100%;height: 60px" placeholder="Club contact"required>'.$rown["contact"].'</textarea>
	 			</div>

	 			<div>
	 			<label>Email</label>
	 			<textarea type="text"  name="email"  class="form-control" style="width: 100%;height: 60px" placeholder="Club email"required>'.$rown["email"].'</textarea>
	 			</div>

	 			<div>
	 			<label>Facebook Page</label>
	 			<textarea type="text"  name="facebook"  class="form-control" style="width: 100%;height: 60px" placeholder="Facebook">'.$rown["facebook"].'</textarea>
	 			</div>

	 			<div>
	 			<label>Club Website</label>
	 			<textarea type="text"  name="website" class="form-control" style="width: 100%;height: 60px" placeholder="Club Website">'.$rown["website"].'</textarea>
	 			</div>

	 			<button type="submit" name="submit" style="margin-top: 20px" class="btn btn-block btn-info">UPDATE</button>

	            </form>
	       		 </div>
	        
		
	</div>
	<br/>
	<br/>

</body>
';
?>





</html>



