<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from job_listing where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Job listing deleted successfully", "success").then(function() { window.location = "listing.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
