<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from language where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Language deleted successfully", "success").then(function() { window.location = "language.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
