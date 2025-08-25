<!doctype html>
<html>
<head>
<title>Online Job Portal</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>

<body class="bg-light">
<div class="container">
<div class="row">
<div class="col-md-5 m-auto body-content">
<div class="card">
<div class="card-body">
<h3 class="text-center">Admin Login</h3>
<form method="post">
<label>Email</label>
<input type="email" name="email" class="form-control mb-2" required>
<label>Password</label>
<input type="password" name="password" class="form-control mb-2" required>
<input type="submit" name="submit" value="Login" class="btn btn-warning mt-3">
</form>
</div>
</div>
</div>
</div>
</div>
<?php
include_once "../dbc.php";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from admin where email='$email' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		$_SESSION['admin']=$email;
		echo '<script>swal("Successfully", "Login successfully", "success").then(function() { window.location = "home.php";  });</script>';
	}
	else{
		echo '<script>swal("Warning", "Invalid email or password", "warning");</script>';
		
	}
}
?>