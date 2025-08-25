<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from skill where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Result deleted successfully", "success").then(function() { window.location = "result.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
