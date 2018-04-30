
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font_awe/css/font-awesome.min.css">
	<script src="../jquery/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="jquery-ui.js"></script>
  	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
  	<link rel="shortcut icon" href="../nitlogo1.png" type="image/x-icon" />

	<title>LOGIN FORM</title>
	<style type="text/css">
		
	/*	*{
			background: rgb(0,0,0) !important;
			color: rgb(0,255,0) !important;
			outline: 1px solid rgb(255,0,0) !important;
		}*/
	</style>
</head>
<body>
<div class="container" id="cnt1" style="padding:20px;width:33%;border:2px solid cyan;margin-top:15%;background-color:powderblue;border-radius:5px;">
		<font color="red">Login failed ! Try again.</font>
		<h2 style="color:black;position:relative;text-align:center">LOGIN FORM</h2><br/>
		<form role="form" action="index.php" method="POST" name="vform">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Username:</label>
              <input type="text" id="username" name="username" pattern="(?=.*\d)(?=.*[a-zA-Z]).{10,15}" style="width:300px;" placeholder="Enter Username"required>
            </div>
            <div>
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Password:</label>
              <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="width:300px;" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter password"required>
            </div>
            <br/>
            <button type="submit" class="btn btn-success" style="width:15%;margin-left: 75%"> Login</button>
            <br/>
          </form>
        </div>
</div>

<hr>
<footer></footer>

</body>
</html>