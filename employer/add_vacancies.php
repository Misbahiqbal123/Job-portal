<?php
include_once "session.php";
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
<?php
include_once "sidebar.php";
$sql="select * from company_profile where company_id='".$company['id']."'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)<1){
echo '<script>swal("Warning", "Please upload your company profile information", "warning").then(function() { window.location = "company_profile.php";  });</script>';
}
?>
</div>
<div class="col-md-10">
<nav class="row navbar navbar-expand-lg navbar-dark" style="background-color: #FFD862;">
  <a class="navbar-brand" href="home.php">Vacancies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="vacancies.php">View Vacancies</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post">
<label>Job Title</label>
<input type="text" name="title" class="form-control mb-2" required>
<label>Job Type</label>
<select name="job_type" class="form-control mb-2" required>
<option value="">- Select -</option>
<option value="Permanent">Permanent</option>
<option value="Contractual">Contractual</option>
<option value="Full Time">Full Time</option>
<option value="Part Time">Part Time</option>
</select>
<label>No. of Position</label>
<input type="text" name="position" class="form-control mb-2" required>
<label>Qualification</label>
<input type="text" name="qualification" class="form-control mb-2">
<label>Skills</label>
<input type="text" name="skills" class="form-control mb-2">
<label>Experience</label>
<input type="text" name="experience" class="form-control mb-2">
<label>Salary Package</label>
<input type="text" name="salary" class="form-control mb-2">
<label>Location</label>
<input type="text" name="location" class="form-control mb-2" required>
<label>Last Date</label>
<input type="date" name="last_date" class="form-control mb-2">
<label>Job Description</label>
<textarea name="description" class="form-control mb-2" rows="4" required></textarea>
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
if(isset($_POST['submit'])){
	$title=$_POST['title'];
	$job_type=$_POST['job_type'];
	$position=$_POST['position'];
	$qualification=$_POST['qualification'];
	$skills=$_POST['skills'];
	$experience=$_POST['experience'];
	$location=$_POST['location'];
	$salary=$_POST['salary'];
	$last_date=$_POST['last_date'];
	$description=$_POST['description'];
	$date=date('Y-m-d');
	
	$sql="select * from job_seeker";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result)){
		$subject= 'Online Job Portal';
		$body= 'Hello '.$row['name'].' new job application posted. Job title: $title <br> No of Position: $position <br> Skills: $skills <br> Experience: $experience <br> Salary: $salary <br> Last Date: $last_date <br> Best regards, <br>Online Job Portal';
		sendEmail($row['email'],$row['name'],$subject,$body);
	}
	$sql="insert into vacancies values('','".$company['id']."','$title','$job_type','$position','$qualification','$skills','$experience','$location','$salary','$last_date','$description','$date','0')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Vacancies added successfully", "success").then(function() { window.location = "vacancies.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>