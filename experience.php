<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>window.location.href="index.php"</script>';
}
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">
<div class="row">
<div class="col-md-6">
<h2>View Experience</h2>
</div>
<div class="col-md-6">
<a href="add_experience.php"><button class="btn btn-warning float-right">Add New</button></a>
</div>
</div>

<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Title</th>
<th>Duration</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from experience where job_seeker_id='".$job_seeker['id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['duration'];?></td>
<td><?php echo $row['description'];?></td>
<td>
<a href="delete_experience.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Delete</button></a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
<?php 
include_once "footer.php";
?>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>