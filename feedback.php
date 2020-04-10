<!DOCTYPE html>
<html>
	<head>
		<title>Feedback form</title>
		<link rel="stylesheet" href="humanestyle.css">
	</head>
	<body>
		<div class="form">
			<form id="feedback" method="POST" action="store.php">
				<span>*</span> <input type="text" name="fname" class="b" placeholder="Enter your first name" title="First name" required><br><br>
				<span>*</span> <input type="text" name="lname" class="b" placeholder="Enter your last name"title="Last name"required><br><br>
				<span>*</span> <input type="email" name="email" class="b" placeholder="Enter your email" required ><br><br>
				<span>*</span> <input type="text" name="contact" class="b" placeholder="Enter your contact no."><br><br>
				 <div class="para">Feedback<span>*</span>:</div><br><textarea name="feedback" class="b" rows="5"required></textarea><br><br>
				 <input type="submit" value="Submit" id="button">
				 <p>(<span>*</span>) marked fields are required.</p>
		    </form>
		</div>
	</body>			
</html>
				