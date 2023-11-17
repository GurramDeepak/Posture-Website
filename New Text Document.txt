<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>
.loginbox{
background: rgba(0, 0, 0, 0.5);
height:300px;
width:350px;
border-radius: 25px;
position:absolute;
top:30%;
left:35%;

}
body{
  background-image: url('back.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-size: 100% 100%;
}
.buttom7{
	width:80px;
	height:35px;
	border-radius: 25px;
}
.res{
		border-radius: 25px;
}
.username{
	border-radius: 25px;
}
.password{
	border-radius: 25px;
}

</style>
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: homepage.html"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="loginbox">
<div class="form">
<center>
<h1>Login</h1>
<form action="" method="post" name="login">
Username:<input type="text" class="username" name="username" placeholder="Username" required /><br>
Password:<input type="password" class="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" class="buttom7" style="background-color:#2979FF" value="Login" >
</form>
<p style="color:white;font-size:20px;">Not registered yet? <button  class="res" style="background:blue;"><a href='registration.php' style="font-size:15px;color:white;background:blue;text-decoration:none;">Register Here</a></button></p>
</center>
</div>
</div>
<?php } ?>


</body>
</html>