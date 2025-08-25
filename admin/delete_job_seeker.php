<?php
include_once "session.php";
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from certification where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from education where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from experience where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from hobby where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from job_listing where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from language where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from post_applied where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from skill where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from job_seeker_profile where job_seeker_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from job_seeker where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Job seeker deleted successfully", "success").then(function() { window.location = "job_seeker.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
