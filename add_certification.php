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
<h3 class="text-center">Add Certification</h3>
<form method="post">
<label>Title</label>
<input type="text" name="title" class="form-control mb-2" required>
<label>Year</label>
<input type="number" name="year" placeholder="2019" class="form-control mb-2" required>
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
	$year=$_POST['year'];
	$sql="insert into certification values('','".$job_seeker['id']."','$title','$year')";
	$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Certification delete successfully", "success").then(function() { window.location = "certification.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>