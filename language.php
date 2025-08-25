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
<h2>View Language</h2>
</div>
<div class="col-md-6">
<a href="add_language.php"><button class="btn btn-warning float-right">Add New</button></a>
</div>
</div>

<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Language</th>
<th style="width:10%;">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from language where job_seeker_id='".$job_seeker['id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo $row['language'];?></td>
<td>
<a href="delete_language.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Delete</button></a>
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