<?php
session_start();

$conn=mysqli_connect("localhost","root","","form_db") or die("connection Failed");


		$email=$_POST['email'];
		$password=$_POST['password'];
		$s ="select * from userdata where email = '$email' && password = '$password'";
		$result= mysqli_query($conn,$s);
		$num = mysqli_num_rows($result);

		if($num ==1){
			$_SESSION['username'] = $email;
			header('location:admin/home.php');
		}

		else{
			header('location:login.php');
		}
		
$conn->close();

?>