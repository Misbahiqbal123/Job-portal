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
        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post">
<label>Name</label>
<input type="text" name="name" value="<?php echo $admin['name'];?>" class="form-control mb-2" required>
<label>Email</label>
<input type="email" name="email" value="<?php echo $admin['email'];?>" class="form-control mb-2" required>
<label>Password</label>
<input type="password" name="password" value="<?php echo $admin['password'];?>" class="form-control mb-2" required>
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
	$email=$_POST['email'];
	$password=$_POST['password'];
	$_SESSION['admin']=$email;
	$sql="update admin set name='$name', email='$email', password='$password' where id='".$admin['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='profile.php'
		alert('Data update successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>