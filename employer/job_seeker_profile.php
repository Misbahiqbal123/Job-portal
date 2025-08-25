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
  <a class="navbar-brand" href="home.php">Job Seeker</a>
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

<div class="card mt-5">
<div class="card-body">

<?php
$id=$_REQUEST['id'];
$sql="select job_seeker.id, name, contact, email, city, address, profile_img, cnic, dob, gender, resume, about from job_seeker_profile INNER JOIN job_seeker on job_seeker.id=job_seeker_profile.job_seeker_id where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_array($result);
?>
<img src="../image/<?php echo $row['profile_img'];?>" height="200">
<h2><?php echo $row['name'];?></h2>
<p class="line-height">CNIC: <?php echo $row['cnic'];?></p>
<p class="line-height">Contact: <?php echo $row['contact'];?></p>
<p class="line-height">Email: <?php echo $row['email'];?></p>
<p class="line-height">City: <?php echo $row['city'];?></p>
<p class="line-height">Address: <?php echo $row['address'];?></p>
<p class="line-height">Gender: <?php echo $row['gender'];?></p>
<p class="line-height">About:</p>
<p class="w-50 text-justify"><?php echo $row['about'];?></p>
<a href="../resume/<?php echo $row['resume'];?>" download>Download</a> ||
<a href="export_cv.php?id=<?php echo $row['id'];?>">Export CV</a>

<h5 class="pb-3 pt-4">Feedback</h5>
<?php
$sql="select company_name, rating, review from feedback INNER JOIN company on company.id=feedback.company_id where job_seeker_id='$id' AND sent_by='company'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<p class="line-height"><?php echo $row['company_name'];?></p>
<?php
	for($j=1;$j<=$row['rating'];$j++){
		echo '<i class="fa fa-star pr-1 text-warning"></i>';
	}
	for($k=1;$k<=(5-$row['rating']);$k++){
		echo '<i class="fa fa-star pr-1"></i>';
	}
?>
<p class="pt-2 pb-1"><?php echo $row['review'];?></p>
<hr>
<?php }
}
 ?>



<form method="post">
<label>Rating</label>
<select name="rating" class="form-control mb-2" required>
<option value="">- Select -</option>
<option value="1">1 Star</option>
<option value="2">2 Star</option>
<option value="3">3 Star</option>
<option value="4">4 Star</option>
<option value="5">5 Star</option>
</select>
<label>Review</label>
<textarea name="review" class="form-control mb-2" required rows="4"></textarea>
<input type="submit" name="submit" v alue="Submit" class="btn btn-warning mt-3 mb-3"><br>
</form>

<?php
}
else{
	echo "<p>Profile information not found</p>";
}
?>

</div>
</div>

</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
	$rating=$_POST['rating'];
	$review=$_POST['review'];
	$date=date('Y-m-d');
	$sql="insert into feedback values('','".$company['id']."','$id','$rating','$review','$date','company')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Feedback sent successfully", "success").then(function() { window.location = "job_seeker_profile.php?id='.$id.'";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>