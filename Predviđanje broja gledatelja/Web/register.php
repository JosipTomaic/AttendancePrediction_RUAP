<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$fname = mysql_real_escape_string($_POST['fname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$fname = trim($fname);
	$lname = trim($lname);
	
	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		$insert=mysql_query("INSERT INTO users(user_name,user_email,user_pass,user_firstn,user_lastn) VALUES('$uname', '$email', '$upass', '$fname', '$lname')") or die(mysql_error());
		
		if($insert)
		{
			?>
			<script>alert('Registration succesfull');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('Registration not succesfull');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Email already registered! ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body id="regbody">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0" ><legend style="color: white;font-weight: bold;">Register</legend>
<tr>
<td><input type="text" name="uname" placeholder="Username" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Password" required /></td>
</tr>
<tr>
<td><input type="text" name="fname" placeholder="First name" required /></td>
</tr>
<tr>
<td><input type="text" name="lname" placeholder="Last name" required /></td>
</tr>

<tr>
<td><button type="submit" name="btn-signup">Register</button></td>
</tr>
<tr>
<td><a href="index.php">Login</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>