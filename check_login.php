<html>
<head>
	<title>ADMIN</title>
	<style>
		a
		{
			text-decoration:none;
			color:lightgreen;
		}	
	</style>
</head>
<body>
<?php
	session_start();
	$Username = $_POST['USERNAME'];
	$Password = $_POST['PASSWORD'];
	
	$con = mysqli_connect('localhost','root');
	
	if(!$con)
		echo "Connection failed" ;
	
	mysqli_select_db($con , 'admin');
	
	$q = "SELECT * FROM login";
	$result = mysqli_query($con , $q);
	$num = mysqli_num_rows($result);
	
	for($i=1;$i<=$num;$i++)
	{
		$row = mysqli_fetch_array($result);
		
			if($row['Username']==$Username && $row['Password']==$Password)
			{

				header('location: web/indexofdash.html');
			}	
					else
					{
							echo "<script>var res = confirm('Email or password is incorrect!');
									if(res==true)
										window.open('admin_login.php','_self');
									else
										window.open('index.html','_self');
							</script>";
							
					}

					mysqli_close($con);
	
	}
				?>	
			</body>
		</html>