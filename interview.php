<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>window.location.href="index.php"</script>';
}
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">
<h2>View Interview</h2>
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Time</th>
<th>Date</th>
<th>Contact</th>
<th>Address</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$id=$_REQUEST['id'];
$sql="select * from interview where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo date('h:i A',strtotime($row['time']));?></td>
<td><?php echo date('d M Y',strtotime($row['date']));?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['address'];?></td>
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