<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>insert form</title>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="../css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Student mangement</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insert.php">Insert</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	<div class="container-fluid">
		<div class="container">
			<div class="formBox">
				<form>
						<div class="row">
							<div class="col-sm-12">
								<h1>Insert form</h1>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">Student Name</div>
									<input type="text" name="name" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Roll No</div>
									<input type="text" name="rollno" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Email</div>
									<input type="text" name="email" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Mobile</div>
									<input type="text" name="mobile" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Address</div>
									<textarea class="input" name="address"></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<input type="submit" name="save" class="button btn-info" value="Send Message">
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
<?php
$conn=mysqli_connect("localhost","root","","form_db") or die("connection Failed");


		$name=$_POST['name'];
		$rollno = $_POST['rollno']
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];

		$query="insert into students(name,email,roll_no,mobile,address) values('$name','$email','$rollno','$mobile','$address')";
		mysqli_query($conn,$query);
		echo "registration successful";
		}
		
$conn->close();
?>

</body>
</html>