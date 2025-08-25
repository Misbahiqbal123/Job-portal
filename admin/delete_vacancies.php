<?php
include_once "session.php";
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from post_applied where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from job_listing where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from vacancies where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Vacancy deleted successfully", "success").then(function() { window.location = "vacancies.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
