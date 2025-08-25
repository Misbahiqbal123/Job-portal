<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from education where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Education deleted successfully", "success").then(function() { window.location = "education.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
