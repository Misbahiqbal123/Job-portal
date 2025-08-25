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
  <a class="navbar-brand" href="home.php">Candidate Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="vacancies.php">View Candidate</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="card mt-5">
<div class="card-body">

<h4>View Candidates</h4>
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
$sql="select job_seeker.id, post_applied.id as post_id, name, contact, email, resume, apply_date, last_date from post_applied INNER JOIN job_seeker on job_seeker.id=post_applied.job_seeker_id INNER JOIN job_seeker_profile on job_seeker.id=job_seeker_profile.job_seeker_id INNER JOIN vacancies on vacancies.id=post_applied.vacancy_id where vacancy_id='$id' AND post_applied.shortlist=0";
$result=mysqli_query($con,$sql);
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
 <?php } ?>
</tbody>
</table>
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
$sql="update post_applied set status='1' where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
?>