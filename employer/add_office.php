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
  <a class="navbar-brand" href="home.php">Office</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="office.php">View Office</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>City</label>
<input type="text" name="city" class="form-control mb-2" required>
<label>Location</label>
<input type="text" name="location" class="form-control mb-2" required>
<label>Telephone</label>
<input type="text" name="telephone" class="form-control mb-2" required>
<input type="submit" name="submit" value="Save" class="btn btn-warning mt-3">
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
	$city=$_POST['city'];
	$location=$_POST['location'];
	$telephone=$_POST['telephone'];
	$sql="insert into office values('','".$company['id']."','$city','$location','$telephone')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Office added successfully", "success").then(function() { window.location = "office.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>