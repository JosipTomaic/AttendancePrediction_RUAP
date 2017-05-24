<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$uname = trim($uname);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT * FROM users WHERE user_name='$uname'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Username /Password failure!');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bundesliga Attendance Prediction</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body id="logbody">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0"><legend style="color: white;font-weight: bold;">Login</legend>
<tr>
<td><input type="text" name="uname" placeholder="UserName" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Login</button></td>
</tr>
<tr>
<td><a href="register.php">Register</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>