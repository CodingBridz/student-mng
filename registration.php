<?php
session_start();
header('location:index.php');

$conn=mysqli_connect("localhost","root","","form_db") or die("connection Failed");


		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		$s ="select * from userdata where name = '$name'";
		$result= mysqli_query($conn,$s);
		$num = mysqli_num_rows($result);

		if($num ==1){
			echo "username already Taken";
		}

		else{
		$query="insert into userdata(name,email,password,images) values('$name','$email','$password','$imagename')";
		mysqli_query($conn,$query);
		echo "registration successful";
		}
		
$conn->close();

?>