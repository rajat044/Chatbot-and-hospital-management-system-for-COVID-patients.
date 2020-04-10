<?php 
	session_start();
	$_SESSION['message']=" ";
	$server="localhost";
	$user="root";
	$pass="";
	$dbname="accounts";
	$conn=mysqli_connect($server,$user,$pass,$dbname);
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST['password']==$_POST['confirmpassword']){
			$username=$_POST['username'];
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$dob=$_POST['date'];
			$sql="INSERT INTO users(username,email,password,dob) VALUES('$username', '$email', '$password', '$dob')";
			if(mysqli_query($conn, $sql))
			{
			$_SESSION['message']="Registration successful!";
			}
			else{
				$_SESSION['message']="User could not be added to the database";
			}
		}
		else{
		    $_SESSION['message']="Two passwords do not match";
		}	
	}
?>
<html>
<head>
<link rel="stylesheet" href="sign.css">
</head>
<body>
<div class="sign">
		<form id="form" method="POST" action="signin.php" enctype="multipart/form-data" autocomplete="off">
				<h1>Create an account</h1>
				<hr><br><br>
				<div class="input"><?=$_SESSION['message']?></div>
			    <input type="text" placeholder="Username" name="username" class="input" required><br><br>
				<input type="email" placeholder="Email" name="email" class="input" required><br><br>
				<input type="password" placeholder="Password" name="password" class="input" autocomplete="new-password" required><br><br>
				<input type="password" placeholder="Confirm Password" name="confirmpassword" class="input" autocomplete="new-password" required><br><br>
				<div class="date_of_birth">
				<div class="a">Date of Birth</div><br> 
				<input type="date" name="date" class="input" required><br><br>
			    <input type="submit" name="register" value="Register" class="button">
		</form>
</div>
</body>
</html>

