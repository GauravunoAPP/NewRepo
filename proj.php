<?php

	$con=mysqli_connect("localhost","root","","register");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form</title>
</head>
<link href="style.css" rel="stylesheet" type="text/css" />
<body>
<?php
	
	if(isset($_POST['submit']))
		{			
			$username = $_POST['username'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$contact = $_POST['contact'];
			
			$sql="SELECT COUNT(*) as count FROM admin WHERE email ='$email'";
			$result=mysqli_query($con,$sql);
			$data=mysqli_fetch_array($result);
			$emailexist=$data['count'];
			
			if($username == "" || $email == ""|| $pass == "")
				{
					echo"Enter all fields";	
				}
			elseif($emailexist>=1)
				{
					echo"Email Already Exists !!";
					die();
				}
			else
				{
					mysqli_query($con,"INSERT INTO `admin` (`username`, `email`, `password`, `contact`) VALUES ('$username', '$email', MD5('$pass'), '$contact')");
					echo("Data inserted successfully");
					die();
				}
		}
?>
	<div id="frm">
		<form method="post">
			<h2>Registration Form</h2>
        	<p>
			<label class="label">User Name :</label>
			<input type="text" name="username" required />
        	</p>
        	<p>
			<label class="label">Email-Id :</label>
			<input type="email" name="email" required />
        	</p>
        	<p>
			<label class="label">Password :</label>
			<input type="password" name="pass" required />
        	</p>
        	<p>
        		<label class="label">Confirm Password :</label>
        	    <input type="password" name="rpass" required />
        	</p>
        	<p>
			<label class="label">Contact No. :</label>
			<input type="text" name="contact" />
        	</p>
        	<p>
        		<input type="submit" name="submit" value="Submit" id="btn" />
        	</p>
		</form>
	</div>
</body>
</html>