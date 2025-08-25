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
<h3 class="text-center">Add Hobby</h3>
<form method="post">
<label>Hobby Name</label>
<input type="text" name="hobby" class="form-control mb-2" required>
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
	$hobby=$_POST['hobby'];
	$sql="insert into hobby values('','".$job_seeker['id']."','$hobby')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Hobby added successfully", "success").then(function() { window.location = "hobby.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>