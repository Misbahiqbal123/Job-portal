<?php
include_once "session.php";
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
<?php
include_once "sidebar.php";
?>
</div>
<div class="col-md-10">
<nav class="row navbar navbar-expand-lg navbar-dark" style="background-color: #FFD862;">
  <a class="navbar-brand" href="home.php">Profile</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" value="<?php echo $company['company_name'];?>" placeholder="Company Name" class="form-control mb-2" required>
<label>Tagline</label>
<input type="text" name="tagline" value="<?php echo $company['tagline'];?>" placeholder="Company Tagline" class="form-control mb-2" required>
<label>Email</label>
<input type="email" name="email" value="<?php echo $company['email'];?>" placeholder="Company Email" class="form-control mb-2" required>
<label>Password</label>
<input type="password" name="password" value="<?php echo $company['password'];?>" placeholder="Password" class="form-control mb-2" required>
<label>Contact</label>
<input type="text" name="contact" value="<?php echo $company['contact'];?>" placeholder="Contact" class="form-control mb-2" required>
<label>City</label>
<input type="text" name="city" value="<?php echo $company['city'];?>" placeholder="City" class="form-control mb-2" required>
<label>Location</label>
<input type="text" name="location" value="<?php echo $company['location'];?>" placeholder="Location" class="form-control mb-2" required>
<label>Logo</label>
<input type="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control mb-2">
<img src="../image/<?php echo $company['logo'];?>" height="60" width="70"><br><br>
<label>Image</label>
<input type="file" name="img" accept=".jpg, .jpeg, .png" class="form-control mb-2">
<img src="../image/<?php echo $company['image'];?>" height="80" width="100%"><br><br>
<input type="submit" name="submit" value="Update" class="btn btn-warning mt-3">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$tagline=$_POST['tagline'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$city=$_POST['city'];
	$location=$_POST['location'];
	$_SESSION['company']=$email;
	if(!empty($_FILES['logo']['name'])){
		move_uploaded_file($_FILES['logo']['tmp_name'],"../image/".$_FILES['logo']['name']);
		$logo=$_FILES['logo']['name'];
	}
	else{
		$logo=$company['logo'];
	}
	if(!empty($_FILES['img']['name'])){
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$company['image'];
	}
	$sql="update company set company_name='$name', tagline='$tagline', email='$email', password='$password', contact='$contact', city='$city', location='$location', logo='$logo', image='$img' where id='".$company['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Profile added successfully", "success").then(function() { window.location = "profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>