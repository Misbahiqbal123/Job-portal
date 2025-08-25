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
<h3 class="text-center">Add Skill</h3>
<form method="post">
<label>Skill</label>
<input type="text" name="skill" class="form-control mb-2" required>
<label>Expert Knowledge</label>
<select name="expert_knowledge" class="form-control mb-2" required>
<option value="">- Select -</option>
<option value="Beginner">Beginner</option>
<option value="Intermediate">Intermediate</option>
<option value="Expert">Expert</option>
</select>
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
	$skill=$_POST['skill'];
	$expert_knowledge=$_POST['expert_knowledge'];
	$sql="insert into skill values('','".$job_seeker['id']."','$skill','$expert_knowledge')";
	$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Skill added successfully", "success").then(function() { window.location = "skill.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>