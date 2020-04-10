<?php

	$first = $_POST['fname'];
	$last = $_POST['lname'];
	$mail = $_POST['email'];
	$num = $_POST['contact'];
	$mess = $_POST['feedback'];
	
	$con = mysqli_connect('localhost','root');
	
	if(!$con)
		echo "Connection Failed";
	
	mysqli_select_db( $con ,'feedback');
	$q = "INSERT INTO feed(First_Name , Last_Name , Email , Contact_Number , Feedback) VALUES ( '$first' , '$last' , '$mail' , $num , '$mess')";
	
	$result = mysqli_query($con,$q);
	
	echo "<script>alert('Feedback submitted successfully!!');
		window.open('index.html','_self');
	</script>";
	
	mysqli_close($con);
?>