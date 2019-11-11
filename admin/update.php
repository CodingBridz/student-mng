<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
}
?>
<?php
$conn=mysqli_connect("localhost","root","","form_db") or die("connection Failed");
     
     if (isset($_GET['upd'])) {
     	$id = $_GET['upd'];
     $query ="SELECT * FROM students WHERE id = $id";
     $fire = mysqli_query($conn,$query) or die("Cannot Fetch ".mysqli_error($conn));
     if ($fire) {
     	$data = mysqli_fetch_assoc($fire);

     }
     }

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Update</title>
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
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
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
				<form method="post">
						<div class="row">
							<div class="col-sm-12">
								<h1>Update</h1>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
									<div class="inputText">Student Name</div>
									<input value="<?php echo $data['name'] ?>" type="text" name="name" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Roll No</div>
									<input value="<?php echo $data['roll_no'] ?>" type="text" name="rollno" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
									<div class="inputText">Email</div>
									<input value="<?php echo $data['email'] ?>"type="text" name="email" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
									<div  class="inputText">Mobile</div>
									<input value="<?php echo $data['mobile'] ?>" type="text" name="mobile" class="input">
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
								<input type="submit" name="update" class="button btn-info" value="Update">
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<!-- Update Query -->
<?php
$conn=mysqli_connect("localhost","root","","form_db") or die("connection Failed");
if (isset($_POST['update'])){
		$name=$_POST['name'];
		$rollno = $_POST['rollno'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];

		$query="UPDATE `students` SET `name`='$name',`email`='$email',`roll_no`='$rollno',`mobile`='$mobile' WHERE id = $id";
		if(mysqli_query($conn,$query))
		{
			header('location:home.php');
		}
		else{
			echo "Succes";
		}
		}


?>