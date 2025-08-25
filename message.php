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
<div class="col-md-12">
<h2>View Message</h2>
</div>
</div>
<div id="print_data">
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Company Name</th>
<th>Contact</th>
<th>Email</th>
<th>Message</th>
<th>Reply</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select message.id, company_name, email, contact, message, reply from message INNER JOIN company on company.id=message.employer_id where job_seeker_id='".$job_seeker['id']."' ORDER BY message.id DESC";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo $row['company_name'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['message'];?></td>
<td>
<?php 
if($row['reply']==""){
	echo '<form method="post">
		<input type="hidden" name="id" value="'.$row['id'].'">
		<textarea name="reply" class="form-control mb-2" rows="4" placeholder="Enter your reply here" required></textarea>
		<button type="submit" name="submit" class="btn btn-warning btn-sm">Add</button>
		
	</form>';
}
else{
	echo $row['reply'];	
}
?>
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
</div>
<?php 
include_once "footer.php";
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$reply=$_POST['reply'];
	$sql="update message set reply='$reply' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Reply sent successfully", "success").then(function() { window.location = "message.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>