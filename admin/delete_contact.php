<?php
include_once "session.php";
include_once "header.php";
$id=$_REQUEST['id'];
$sql="delete from contact where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Message deleted successfully", "success").then(function() { window.location = "contact.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
?>
