<?php
include_once "session.php";
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from office where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Office delete successfully", "success").then(function() { window.location = "office.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
