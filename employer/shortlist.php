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
  <a class="navbar-brand" href="home.php">Shotlist</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="post.php">Shortlist Candidate</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post">
<label>Shortlist</label>
<select name="shortlist" class="form-control mb-2" required>
<option value="">- Select -</option>
<option value="1">Yes</option>
<option value="-1">No</option>
</select>
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
include_once "../function.php";
$id=$_REQUEST['id'];
if(isset($_POST['submit'])){
	$shortlist=$_POST['shortlist'];
	
	$sql="select post_applied.id, job_seeker.name, job_seeker.email, vacancy_id from post_applied INNER JOIN job_seeker on job_seeker.id=post_applied.job_seeker_id where post_applied.id='$id'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$subject= 'Online Job Portal';
	$body= 'Hello '.$row['name'].' you job application status updated successfully. Please login into the system to view the application status';
	sendEmail($row['email'],$row['name'],$subject,$body);

	$sql1="update post_applied set shortlist='$shortlist' where id='$id'";
	$result1=mysqli_query($con,$sql1);
	if($result1){
		echo '<script>swal("Successfully", "Status updated successfully", "success").then(function() { window.location = "vacancies.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>