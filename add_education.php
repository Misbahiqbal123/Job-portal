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
<h3 class="text-center">Add Education</h3>
<form method="post">
<label>Degree</label>
<input type="text" name="degree" class="form-control mb-2" required>
<label>Institue</label>
<input type="text" name="institute" class="form-control mb-2" required>
<label>Obtained Marks/ CGPA</label>
<input type="text" name="marks_obtained" class="form-control mb-2" required>
<label>Total Marks/ CGPA</label>
<input type="text" name="total_marks" class="form-control mb-2" required>
<label>Passing year</label>
<input type="number" name="passing_year" class="form-control mb-2" required>
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
	$degree=$_POST['degree'];
	$institute=$_POST['institute'];
	$marks_obtained=$_POST['marks_obtained'];
	$total_marks=$_POST['total_marks'];
	$passing_year=$_POST['passing_year'];
	$sql="insert into education values('','".$job_seeker['id']."','$degree','$institute','$marks_obtained','$total_marks','$passing_year')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Education added successfully", "success").then(function() { window.location = "education.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>