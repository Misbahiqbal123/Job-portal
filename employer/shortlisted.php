<?php
include_once "session.php";
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
<?php
include_once "sidebar.php";
$id=$_REQUEST['id'];
?>
</div>
<div class="col-md-10">
<nav class="row navbar navbar-expand-lg navbar-dark" style="background-color: #FFD862;">
  <a class="navbar-brand" href="home.php">Candidate</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="vacancies.php">View Shortlisted Candidate</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="card mt-5">
<div class="card-body">

<h4>View Shortlisted Candidates</h4>
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>Sr.</th>
<th>Name</th>
<th>Contact</th>
<th>Email</th>
<th>Apply Date</th>
<th>Last Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select job_seeker.id, post_applied.id as post_id, name, contact, email, resume, apply_date, last_date from post_applied INNER JOIN job_seeker on job_seeker.id=post_applied.job_seeker_id INNER JOIN job_seeker_profile on job_seeker.id=job_seeker_profile.job_seeker_id INNER JOIN vacancies on vacancies.id=post_applied.vacancy_id where vacancy_id='$id' AND post_applied.shortlist=1";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['apply_date'];?></td>
<td><?php echo $row['last_date'];?></td>
<td>
<a href="shortlist.php?id=<?php echo $row['post_id'];?>">Shortlist</a> | 
<a href="../resume/<?php echo $row['resume'];?>" download>Download</a> | 
<a href="export_cv.php?id=<?php echo $row['id'];?>">Export CV</a>
</td>
</tr>
<?php
}
 }
 else{ ?>
 
  <tr>
<td class="text-center" colspan="7">No Record Found</td>
</tr>
 <?php } ?>
</tbody>
</table>
</div>
</div>
<div class="row">
<div class="col-md-12 mt-4 mb-5">
<div class="card">
<div class="card-body w-50">
<h4>Schedule Interviews</h4>
<?php
$sql="select * from interview where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_array($result);
?>
<form method="post">
<input type="hidden" name="interview_id" value="<?php echo $row['id'];?>">
<label>Date</label>
<input type="date" name="date" value="<?php echo $row['date'];?>" class="form-control mb-2" required>
<label>Time</label>
<input type="time" name="time" value="<?php echo $row['time'];?>" class="form-control mb-2" required>
<label>Contact</label>
<input type="text" name="contact" value="<?php echo $row['contact'];?>" class="form-control mb-2" required>
<label>Office Address</label>
<input type="text" name="address" value="<?php echo $row['address'];?>" class="form-control mb-2" required>
<input type="submit" name="update" value="Update" class="btn btn-warning mt-3">
</form>
<?php
}
else{
?>
<form method="post">
<input type="hidden" name="id" value="<?php echo $id;?>">
<label>Date</label>
<input type="date" name="date" class="form-control mb-2" required>
<label>Time</label>
<input type="time" name="time" class="form-control mb-2" required>
<label>Contact</label>
<input type="text" name="contact" class="form-control mb-2" required>
<label>Office Address</label>
<input type="text" name="address" class="form-control mb-2" required>
<input type="submit" name="submit" value="Save" class="btn btn-warning mt-3">
</form>
<?php } ?>
</div>
</div>
</div>
</div>



</div>
</div>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<?php
include_once "../function.php";
$sql="update post_applied set status='1' where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	
	
	$sql="select post_applied.id, job_seeker.name, job_seeker.email from post_applied INNER JOIN job_seeker on job_seeker.id=post_applied.job_seeker_id where vacancy_id='$id' AND shortlist=1";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result)){
		$subject= 'Modern Work Opportunity Platform';
		$body= 'Hello '.$row['name'].' an interview has been scheduled. Please login into the system and view the date & time.';
		sendEmail($row['email'],$row['name'],$subject,$body);
	}
	$sql="insert into interview values('','$id','$date','$time','$contact','$address')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Data added successfully", "success").then(function() { window.location = "shortlisted.php?id='.$id.'";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
if(isset($_POST['update'])){
	$interview_id=$_POST['interview_id'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	
	
	$sql="select post_applied.id, job_seeker.name, job_seeker.email from post_applied INNER JOIN job_seeker on job_seeker.id=post_applied.job_seeker_id where vacancy_id='$id' AND shortlist=1";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result)){
		$subject= 'Modern Work Opportunity Platform';
		$body= 'Hello '.$row['name'].' an interview schedule has been updated. Please login into the system and view the new date & time.';
		sendEmail($row['email'],$row['name'],$subject,$body);
	}
	$sql="update interview set date='$date', time='$time', contact='$contact', address='$address' where id='$interview_id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Data updated successfully", "success").then(function() { window.location = "shortlisted.php?id='.$id.'";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>