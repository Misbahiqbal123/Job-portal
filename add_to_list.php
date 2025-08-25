<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>swal("Warning", "Please login into the system", "warning").then(function() { window.location = "index.php";  });</script>';
}
else{
	$id=$_REQUEST['id'];
	$sql="insert into job_listing values('','".$job_seeker['id']."','$id')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Add to list successfully", "success").then(function() { window.location = "index.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}

?>