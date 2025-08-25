<?php
include_once "session.php";
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select * from vacancies where company_id='$id'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$sql1="delete from post_applied where vacancy_id='".$row['id']."'";
	$result1=mysqli_query($con,$sql1);
	$sql1="delete from job_listing where vacancy_id='".$row['id']."'";
	$result1=mysqli_query($con,$sql1);
}
$sql="delete from vacancies where company_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from office where company_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from company_profile where company_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from company where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Company deleted successfully", "success").then(function() { window.location = "company.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
