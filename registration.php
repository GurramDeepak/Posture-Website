<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
.loginbox{
background: rgba(0, 0, 0, 0.5);
height:300px;
width:350px;
border-radius: 25px;
position:absolute;
top:20%;
left:55%;

}
body{
  background-image: url('back2.jpg');
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
.email{
	border-radius: 25px;
}
h3{
	background-color:orange;
	width:40%;
	border-radius: 25px;
}
h2{
	background-color:green;
	width:40%;
	border-radius: 25px;
}
button:hover {background-color: #00FFFF}

</style>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><h2>Click here to------><button><a href='login.php'>Login</a></button></h2></div>";
        }
    }else{
?>
<div class="loginbox">
<div class="form">
<h1 style="color:violet;font-size:30px;">Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" class="username" placeholder="Username" required />
<input type="email" name="email" class="email" placeholder="Email" required />
<input type="password" name="password" class="password" placeholder="Password" required />
<input type="submit" name="submit" style="background-color:#2979FF; font-size:20px; value="Register" class="res"/>
<p style="color:violet;font-size:30px;">Already  registered<button class="res"  style="background:blue;"><a href='login.php' style="font-size:25px;color:white;background:blue;text-decoration:none;">Login</a></button></p>
</form>
</div>
</div>
<?php } ?>
</body>
</html>