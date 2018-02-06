<?php

session_start();

$email= $_POST['email'];
$pass= $_POST['pass'];

$email= stripslashes("$email");
$pass= stripslashes("$pass");

 $con=mysqli_connect("localhost","root","");
 mysqli_select_db($con,"register");
 
 $result = mysqli_query($con,"SELECT * FROM admin WHERE email='$email' AND password=md5('$pass')") 
 						or die("Failed");
 
 $row = mysqli_fetch_array($result);
 	if ($row>=1)
		{
			echo "Login Success " .$row['email'];
		}
	else
		{
			echo ("Failed. Please try again.");
		}
	
?>