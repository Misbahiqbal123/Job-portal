<?php
include_once "header.php";
?>
<div class="container">
<div class="row">
<div class="col-md-6 m-auto body-content">
<div class="card">
<div class="card-body">
<h3 class="text-center">Employer Login</h3>
<form method="post">
<label>Email</label>
<input type="email" name="email" class="form-control mb-2" required>
<label>Password</label>
<input type="password" name="password" class="form-control mb-2" required>
<a href="reset_password.php">Forgot Password?</a><br>
<input type="submit" name="submit" value="Login" class="btn btn-warning mt-3 mb-3"><br>
Don't have an account? <a href="employer_register.php">Register</a>
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once "footer.php";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from company where email='$email' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		$_SESSION['company']=$email;
		echo '<script>swal("Successfully", "Login successfully", "success").then(function() { window.location = "employer/home.php";  });</script>';
	}
	else{
		echo '<script>swal("Warning", "Invalid email or password", "warning");</script>';
		
	}
}
?>