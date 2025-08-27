<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="update job_seeker set status='1' where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
    echo '<script>swal("Successfully", "Account verified successfully", "success").then(function() { window.location = "index.php";  });</script>';
}
else{
    echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
    }
?>