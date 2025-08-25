<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>window.location.href="index.php"</script>';
}
?>
<div class="container">
<div class="row">
<div class="col-md-6 m-auto body-content">
<div class="card">
<div class="card-body">
<h3 class="text-center">Add Experience</h3>
<form method="post">
<label>Title</label>
<input type="text" name="title" class="form-control mb-2" required>
<label>Duration</label>
<input type="text" name="duration" placeholder="e.g 2014-2018" class="form-control mb-2" required>
<label>Description</label>
<textarea name="description" class="form-control mb-2" rows="3" required></textarea>
<input type="submit" name="submit" value="Submit" class="btn btn-warning mt-3 mb-3">
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once "footer.php";
if(isset($_POST['submit'])){
	$title=$_POST['title'];
	$duration=$_POST['duration'];
	$description=$_POST['description'];
	$sql="insert into experience values('','".$job_seeker['id']."','$title','$duration','$description')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Experience deleted successfully", "success").then(function() { window.location = "experience.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>