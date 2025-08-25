<?php
include_once "header.php";
?>
<div class="container">
<div class="row">
<div class="col-md-8 m-auto body-content">
<div class="card">
<div class="card-body">
<h3 class="text-center">Employer Register</h3>
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" placeholder="Company Name" class="form-control mb-2" required>
<label>Tagline</label>
<input type="text" name="tagline" placeholder="Ex: An information services firm" class="form-control mb-2" required>
<label>Email</label>
<input type="email" name="email" placeholder="Company Email" class="form-control mb-2" required>
<label>Password</label>
<input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
<label>Contact</label>
<input type="text" name="contact" placeholder="Contact" class="form-control mb-2" required>
<label>City</label>
<input type="text" name="city" placeholder="City" class="form-control mb-2" required>
<label>Location</label>
<input type="text" name="location" placeholder="Location" class="form-control mb-2" required>
<label>Logo</label>
<input type="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control mb-2" required>
<label>Image</label>
<input type="file" name="img" accept=".jpg, .jpeg, .png" class="form-control mb-2" required>
<input type="submit" name="submit" value="Register" class="btn btn-warning mt-3 mb-3"><br>
Already have an account? <a href="employer.php">Login</a>
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once "footer.php";
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$tagline=$_POST['tagline'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$city=$_POST['city'];
	$location=$_POST['location'];
	move_uploaded_file($_FILES['logo']['tmp_name'],"image/".$_FILES['logo']['name']);
	$logo=$_FILES['logo']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into company values('','$name','$tagline','$email','$password','$contact','$city','$location','$logo','$img')";
	$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Account created successfully", "success").then(function() { window.location = "employer.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>