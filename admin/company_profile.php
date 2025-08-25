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
  <a class="navbar-brand" href="home.php">Company</a>
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
<?php
$id=$_REQUEST['id'];
$sql="select company.id, company_name, tagline, image, industory, headquarter, founded, size, industory, website, specialties, about from company INNER JOIN company_profile on company.id=company_profile.company_id where company.id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_array($result);
?>
<div class="row mt-5">
<div class="col-md-12">
<div class="card">
<img src="../image/<?php echo $row['image'];?>" class="card-img-top">
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

<div class="tab-content py-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="col-md-10 mt-4">
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
<img src="../image/<?php echo $row1['image'];?>" class="img-fluid img-thumbnail">
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
<div class="col-md-10 mt-4">
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
<div class="col-md-10 mt-4">
<div class="card">
<div class="card-body">
<h5 class="pb-3">Jobs</h5>
<?php
$sql4="select * from vacancies where company_id='$id' ORDER BY id DESC";
$result4=mysqli_query($con,$sql4);
while($row4=mysqli_fetch_array($result4)){
?>
<p class="line-height"><b><a href="vacancies_detail.php?id=<?php echo $row4['id'];?>"><?php echo $row4['title'];?></a></b> <span class="text-muted float-right" style="font-size:15px;"><?php echo $row4['added_on'];?></span></p>
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
<div class="col-md-10 mt-4">
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


</div>
<?php
}
else{
	echo "<p>Company profile information not available</p>";
}
?>
</div>
</div>
</div>