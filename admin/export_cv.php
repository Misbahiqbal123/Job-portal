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
$sql="select name, contact, email, profile_img, city, address, about, cnic, dob, gender, city from job_seeker INNER JOIN job_seeker_profile on job_seeker.id=job_seeker_profile.job_seeker_id where job_seeker.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
</div>
<div class="col-md-10">
<nav class="row navbar navbar-expand-lg navbar-dark" style="background-color: #FFD862;">
  <a class="navbar-brand" href="home.php">Export CV</a>
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
<button class="btn btn-warning float-right" onClick="printdata('print_data')">Export PDF</button>

<div id="print_data">
<div class="row">
<div class="col-md-3 text-center cv-sidebar pr-4">
<img src="../image/<?php echo $row['profile_img'];?>" class="m-auto" height="160">
</div>
<div class="col-md-9">
<h2><?php echo $row['name'];?></h2>
<p><i class="fa fa-map-marker"></i> &nbsp;&nbsp;&nbsp;<?php echo $row['address'];?></p>
<p><i class="fa fa-envelope"></i> &nbsp;&nbsp;&nbsp;<?php echo $row['email'];?></p>
<p><i class="fa fa-phone"></i> &nbsp;&nbsp;&nbsp;<?php echo $row['contact'];?></p>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-3 text-right cv-sidebar pr-4">
<h3>About me</h3>
</div>
<div class="col-md-9">
<p class="text-justify pt-1"><?php echo $row['about'];?></p>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-3 text-right cv-sidebar pr-4">
<h3>Experience</h3>
</div>
<div class="col-md-9 pt-2">
<?php
$sql1="select * from experience where job_seeker_id='$id'";
$result1=mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($result1)){
?>
<p class="text-justify line-height"><b><?php echo $row1['title'];?></b><span class="float-right"><?php echo $row1['duration'];?></span></p>
<p class="text-muted"><?php echo $row1['description'];?></p>
<?php } ?>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-3 text-right cv-sidebar pr-4">
<h3>Education</h3>
</div>
<div class="col-md-9 pt-2">
<?php
$sql2="select * from education where job_seeker_id='$id'";
$result2=mysqli_query($con,$sql2);
while($row2=mysqli_fetch_array($result2)){
?>
<div class="row">
<div class="col-md-5">
<p class="text-justify line-height"><b><?php echo $row2['degree'];?></b></p>
</div>
<div class="col-md-4">
<p class="text-justify line-height"><?php echo $row2['institute'];?></p>
</div>
<div class="col-md-3">
<p class="text-justify line-height"><span class="float-right"><?php echo $row2['passing_year'];?></span></p>
</div>
</div>
<?php } ?>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-3 text-right cv-sidebar pr-4">
<h3>Skills</h3>
</div>
<div class="col-md-9 pt-2">
<?php
$sql1="select * from skill where job_seeker_id='$id'";
$result1=mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($result1)){
?>
<p><b><?php echo $row1['skill_name'];?></b><span class="float-right"><?php echo $row1['expert_knowledge'];?></span></p>
<?php } ?>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-3 text-right cv-sidebar pr-4">
<h3>Certification</h3>
</div>
<div class="col-md-9 pt-2">
<?php
$sql1="select * from certification where job_seeker_id='$id'";
$result1=mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($result1)){
?>
<p><b><?php echo $row1['title'];?></b><span class="float-right"><?php echo $row1['year'];?></span></p>
<?php } ?>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-3 text-right cv-sidebar pr-4">
<h3>Profile</h3>
</div>
<div class="col-md-9 pt-2">
<div class="row">
<div class="col-md-5">
<p class="text-justify line-height"><b>Date of Birth</b></p>
</div>
<div class="col-md-7">
<p class="text-justify line-height"><?php echo $row['dob'];?></p>
</div>
<div class="col-md-5">
<p class="text-justify line-height"><b>CNIC</b></p>
</div>
<div class="col-md-7">
<p class="text-justify line-height"><?php echo $row['cnic'];?></p>
</div>
<div class="col-md-5">
<p class="text-justify line-height"><b>Gender</b></p>
</div>
<div class="col-md-7">
<p class="text-justify line-height"><?php echo $row['gender'];?></p>
</div>
<div class="col-md-5">
<p class="text-justify line-height"><b>Languages</b></p>
</div>
<div class="col-md-7">
<p class="text-justify line-height">
<?php
$txt="";
$sql2="select * from language where job_seeker_id='$id'";
$result2=mysqli_query($con,$sql2);
while($row2=mysqli_fetch_array($result2)){
?>
<?php
echo $txt."".$row2['language'];
$txt=", ";
?>
<?php } ?>
</p>
</div>
<div class="col-md-5">
<p class="text-justify line-height"><b>Hobbies</b></p>
</div>
<div class="col-md-7">
<p class="text-justify line-height">
<?php
$txt="";
$sql2="select * from hobby where job_seeker_id='$id'";
$result2=mysqli_query($con,$sql2);
while($row2=mysqli_fetch_array($result2)){
?>
<?php
echo $txt."".$row2['hobby_name'];
$txt=", ";
?>
<?php } ?>
</p>
</div>
</div>


</div>
</div>


</div>
</div>
</div>
</div>
</div>
</div>
<script>
function printdata(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML=restorepage;
}

</script>