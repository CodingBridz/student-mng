<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student managemenet</title>
  <link href="../css/style1.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
      <li class="nav-item">
        <a class="nav-link" href="../index.php">SignIn</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<br/>
<br/>
<br/>
<br/>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Roll No</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Images</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 <?php

$conn=mysqli_connect("localhost","root","","form_db") or die("connection Failed");

if (!empty($_GET['del'])) {
  $id=$_GET['del'];
  $qry="delete from students where id=$id";
  if (mysqli_query($conn,$qry)) {
    
  }
  else{
    echo "check the code";
  }

}

$limit=2;
if(empty($_GET['p'])) 
{
  $start=0;
}
else
{
    $pi=$_GET['p'];
    $end=$pi*$limit;
    $start=$end-$limit;
    
}

if(!empty($_GET['search'])){
      $ss=$_GET['search'];
      $query="select * from students where name like '%$ss%'";
    }else{
      $query = "SELECT * FROM students limit $start,$limit";
    }

      $fire = mysqli_query($conn,$query) or die("Can not Fetch Data".mysqli_error($conn));
           if(mysqli_num_rows($fire)>0){  
          while ($result = mysqli_fetch_assoc($fire)) {?>
    <tr>
      <td><?php echo $result['id']; ?></td>
      <td><?php echo $result['name']; ?></td>
      <td><?php echo $result['roll_no']; ?></td>
      <td><?php echo $result['email']; ?></td>
      <td><?php echo $result['mobile'];?></td>
      <td><img src="<?php echo $result['images'];?>" height="50px;" width="50px;"></td>
      <td><a href="home.php?del=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a> | 
      <a href="update.php?upd=<?php echo $result['id']; 
      ?>" class="btn btn-info" name>Update</a></td>
    </tr>

<?php }
}?>
      <tr>
      <td colspan="5">
        <?php 
          $query="select * from students";
          $result=mysqli_query($conn,$query);  
          $count=mysqli_num_rows($result);
          $pages=ceil($count/3);
          for($i=1;$i<=$pages;$i++)
          {
            ?>
              <a href="home.php?p=<?php echo $i;?>"><?php echo $i;?></a>
            <?php
          }
        ?>
      </td>
    </tr>
  </tbody>
</table>


</body>
</html>