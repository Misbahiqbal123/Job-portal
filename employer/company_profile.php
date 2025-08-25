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
  <a class="navbar-brand" href="home.php">Post</a>
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
<?php
$sql="select * from company_profile where company_id='".$company['id']."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
?>
<form method="post">
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<label>About</label>
<textarea name="about" placeholder="Write about your company in briefly" rows="5" class="form-control mb-2" required><?php echo $row['about'];?></textarea>
<label>Specialties</label>
<textarea name="specialties" placeholder="Specialties" rows="3" class="form-control mb-2" required><?php echo $row['specialties'];?></textarea>
<label>Website</label>
<input type="url" name="website" value="<?php echo $row['website'];?>" placeholder="Website URL" class="form-control mb-2" required>
<label>Industory</label>
<input type="text" name="industory" value="<?php echo $row['industory'];?>" placeholder="Industory" class="form-control mb-2" required>
<label>Company Size</label>
<input type="text" name="size" value="<?php echo $row['size'];?>" placeholder="101-500 Employees" class="form-control mb-2" required>
<label>Headquarter</label>
<input type="text" name="headquarter" value="<?php echo $row['headquarter'];?>" placeholder="Headquarter" class="form-control mb-2" required>
<label>Founded</label>
<input type="number" name="founded" value="<?php echo $row['founded'];?>" placeholder="Found in Year" class="form-control mb-2" required>
<input type="submit" name="update" value="Update" class="btn btn-warning mt-3">
</form>
<?php 
}
else{
	?>
<form method="post">
<label>About</label>
<textarea name="about" placeholder="Write about your company in briefly" rows="5" class="form-control mb-2" required></textarea>
<label>Specialties</label>
<textarea name="specialties" placeholder="Specialties" rows="3" class="form-control mb-2" required></textarea>
<label>Website</label>
<input type="url" name="website" placeholder="Website URL" class="form-control mb-2" required>
<label>Industory</label>
<input type="text" name="industory" placeholder="Industory" class="form-control mb-2" required>
<label>Company Size</label>
<input type="text" name="size" placeholder="101-500 Employees" class="form-control mb-2" required>
<label>Headquarter</label>
<input type="text" name="headquarter" placeholder="Headquarter" class="form-control mb-2" required>
<label>Founded</label>
<input type="number" name="founded" placeholder="Found in Year" class="form-control mb-2" required>
<input type="submit" name="submit" value="Add" class="btn btn-warning mt-3">
</form>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
	$about=$_POST['about'];
	$specialties=$_POST['specialties'];
	$website=$_POST['website'];
	$industory=$_POST['industory'];
	$size=$_POST['size'];
	$headquarter=$_POST['headquarter'];
	$founded=$_POST['founded'];

	$sql="insert into company_profile values('','".$company['id']."','$founded','$headquarter','$size','$industory','$website','$specialties','$about')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Company profile added successfully", "success").then(function() { window.location = "company_profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
if(isset($_POST['update'])){
	$id=$_POST['id'];
	$about=$_POST['about'];
	$specialties=$_POST['specialties'];
	$website=$_POST['website'];
	$industory=$_POST['industory'];
	$size=$_POST['size'];
	$headquarter=$_POST['headquarter'];
	$founded=$_POST['founded'];

	$sql="update company_profile set founded='$founded', headquarter='$headquarter', size='$size', industory='$industory', website='$website', specialties='$specialties', about='$about' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Company profile updated successfully", "success").then(function() { window.location = "company_profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>