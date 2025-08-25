<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select company.id, company_name, tagline, image, industory, headquarter, founded, size, industory, website, specialties, about from company INNER JOIN company_profile on company.id=company_profile.company_id where company.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="container">
<div class="row body-content">
<div class="col-md-8">
<div class="card">
<img src="image/<?php echo $row['image'];?>" class="card-img-top">
<div class="card-body">
<h4><?php echo $row['company_name'];?></h4>
<p class="line-height" style="font-size:15px;"><?php echo $row['tagline'];?></p>
<p class="text-muted line-height" style="font-size:15px;"><?php echo $row['industory']." . ".$row['headquarter'];?></p>

</div>
<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="jobs-tab" data-toggle="tab" href="#jobs" role="tab" aria-controls="jobs" aria-selected="false">Jobs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="office-tab" data-toggle="tab" href="#office" role="tab" aria-controls="office" aria-selected="false">Offices</a>
  </li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="card">
<div class="card-body">
<h6 class="card-title font-weight-bold pb-3">Companies</h6>
<?php
$sql5="select company.id, company_name, tagline, logo, industory from company INNER JOIN company_profile on company.id=company_profile.company_id where company.id!='$id'";
$result5=mysqli_query($con,$sql5);
if(mysqli_num_rows($result5)>0){
while($row5=mysqli_fetch_array($result5)){
?>
<div class="row">
<div class="col-md-3">
<img src="image/<?php echo $row5['logo'];?>" class="img-fluid">
</div>
<div class="col-md-9">
<h6 class="font-weight-bold"><a href="company_profile.php?id=<?php echo $row5['id'];?>"><?php echo $row5['company_name'];?></a></h6>
<p class="text-muted line-height" style="font-size:15px;"><?php echo $row5['industory'];?></p>
</div>
</div>
<?php 
} 
}
?>


</div>
</div>
</div>

<div class="tab-content py-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="col-md-8 mt-4">
<div class="card">
<div class="card-body">
<h5>Recent Post</h5>
<?php
$sql1="select * from post where company_id='$id'";
$result1=mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($result1)){
?>
<div class="row">
<div class="col-md-4">
<img src="image/<?php echo $row1['image'];?>" class="img-fluid img-thumbnail">
</div>
<div class="col-md-8">
<p class="line-height pt-1" style="font-size:15px;"><?php echo $row1['title'];?></p>
<p class="text-muted text-justify" style="font-size:13px;"><?php echo $row1['description'];?></p>
<hr>
</div>
</div>
<?php } ?>
<p class="line-height invisible">this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.</p>
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
<div class="col-md-8 mt-4">
<div class="card">
<div class="card-body">
<h5>Company Overview</h5>
<p class="text-muted" style="font-size:15px;"><?php echo $row['about'];?></p>
<p class="line-height"><b>Website</b></p>
<p class="text-muted line-height" style="font-size:15px;"><a href="<?php echo $row['website'];?></a>" class="text-muted" target="_blank"><?php echo $row['website'];?></a></p>
<p class="line-height"><b>Industory</b></p>
<p class="text-muted line-height" style="font-size:15px;"><?php echo $row['industory'];?></p>
<p class="line-height"><b>Company Size</b></p>
<p class="text-muted line-height" style="font-size:15px;"><?php echo $row['size'];?></p>
<p class="line-height"><b>Headquarter</b></p>
<p class="text-muted line-height" style="font-size:15px;"><?php echo $row['headquarter'];?></p>
<p class="line-height"><b>Founded</b></p>
<p class="text-muted line-height" style="font-size:15px;"><?php echo $row['founded'];?></p>
<p class="line-height"><b>Specialties</b></p>
<p class="text-muted" style="font-size:15px;"><?php echo $row['specialties'];?></p>
<p class="line-height invisible">this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.</p>
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
<div class="col-md-8 mt-4">
<div class="card">
<div class="card-body">
<h5 class="pb-3">Jobs</h5>
<?php
$sql4="select * from vacancies where company_id='$id' ORDER BY id DESC";
$result4=mysqli_query($con,$sql4);
while($row4=mysqli_fetch_array($result4)){
?>
<p class="line-height"><b><a href="vacancy_detail.php?id=<?php echo $row4['id'];?>"><?php echo $row4['title'];?></a></b> <span class="text-muted float-right" style="font-size:15px;"><?php echo $row4['added_on'];?></span></p>
<p class="text-muted line-height" style="font-size:15px;">Position: <?php echo $row4['position'];?></p>
<p class="text-muted line-height" style="font-size:15px;">Deadline: <?php echo $row4['last_date'];?></p>
<hr class="w-100">
<?php } ?>
<p class="line-height invisible">this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.</p>
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="office" role="tabpanel" aria-labelledby="office-tab">
<div class="col-md-8 mt-4">
<div class="card">
<div class="card-body">
<h5 class="pb-3">Offices</h5>
<?php
$sql6="select * from office where company_id='$id'";
$result6=mysqli_query($con,$sql6);
while($row6=mysqli_fetch_array($result6)){
?>
<p class="line-height"><b><?php echo $row6['city'];?></b></p>
<p class="text-muted line-height" style="font-size:15px;"><i class="fa fa-map-marker"></i> <?php echo $row6['location'];?></p>
<p class="text-muted line-height" style="font-size:15px;"><i class="fa fa-phone"></i> <?php echo $row6['telephone'];?></p>
<hr class="w-100">
<?php } ?>
<p class="line-height invisible">this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.this is the dumy text.</p>
</div>
</div>
</div>

</div>
</div>


<div class="col-md-8 mt-4">
<div class="card">
<div class="card-body">
<h5 class="pb-3">Feedback</h5>
<?php
$sql="select name, rating, review from feedback INNER JOIN job_seeker on job_seeker.id=feedback.job_seeker_id where company_id='$id' AND sent_by='job-seeker'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<p class="line-height"><?php echo $row['name'];?></p>
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
<input type="submit" name="submit" value="Submit" <?php if(!isset($_SESSION['job_seeker'])) { echo "disabled";}?> class="btn btn-warning mt-3 mb-3"><br>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
include_once "footer.php";
if(isset($_POST['submit'])){
	$rating=$_POST['rating'];
	$review=$_POST['review'];
	$date=date('Y-m-d');
	$sql="insert into feedback values('','$id','".$job_seeker['id']."','$rating','$review','$date','job-seeker')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Feedback sent successfully", "success").then(function() { window.location = "company_profile.php?id='.$id.'";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>