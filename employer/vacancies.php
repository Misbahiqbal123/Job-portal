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
  <a class="navbar-brand" href="home.php">Vacancies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <a href="add_vacancies.php"><button class="btn btn-warning btn-sm">Add New</button></a>
    </ul>
  </div>
</nav>

<div class="card mt-5">
<div class="card-body">
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>Sr.</th>
<th>Title</th>
<th>Job Type</th>
<th>Position</th>
<th>Experience</th>
<th>Salary</th>
<th>Last Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from vacancies where company_id='".$company['id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['job_type'];?></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['experience'];?></td>
<td><?php echo $row['salary'];?></td>
<td><?php echo date('d M Y',strtotime($row['last_date']));?></td>
<td><?php 
if($row['status']==0)
{
	echo 'Pending';
}
else if($row['status']==1)
{
	echo 'Approved';	
}
else
{
	echo 'Rejected';	
}
?></td>
<td>
<a href="candidate.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Candidate</button></a>
<a href="shortlisted.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm mt-2">Shortlist</button></a>
<a href="delete_vacancies.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm mt-2">Delete</button></a>
</td>
</tr>
 <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>