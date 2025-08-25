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
  <a class="navbar-brand" href="home.php">Vacanies</a>
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
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>Sr.</th>
<th>Company</th>
<th>Title</th>
<th>Job Type</th>
<th>Position</th>
<th>Salary</th>
<th>Last Date</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select vacancies.id, company_name, job_type, title, position, salary, status, last_date from vacancies INNER JOIN company on company.id=vacancies.company_id";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['company_name'];?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['job_type'];?></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['salary'];?></td>
<td><?php echo date('d M Y',strtotime($row['last_date']));?></td>
<td><?php 
if($row['status']==0)
{
	echo 'Pending';
	echo '<form method="post">
			<input type="hidden" name="id" value="'.$row['id'].'">
			<button type="submit" name="status" value="1" class="btn btn-info btn-sm mb-2">Approve</button>
			<button type="submit" name="status" value="-1" class="btn btn-danger btn-sm">Reject</button>
	</form>';	
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
</tr>
<?php
}
 }
 else{ ?>
 
  <tr>
<td class="text-center" colspan="8">No Record Found</td>
</tr>
 <?php } ?>
</tbody>
</table>
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
if(isset($_POST['status'])){
	$status=$_POST['status'];
	$id=$_POST['id'];
	$sql="update vacancies set status='$status' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Status updated successfully", "success").then(function() { window.location = "vacancies.php";  });</script>';	
	}
	else{
		echo '<script>swal("Error", "Something went wrong", "error");</script>';	
		
	}
}
?>