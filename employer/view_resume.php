<?php
include_once "session.php";
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select * from student_profile where student_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<embed src="../resume/<?php echo $row['resume'];?>" type="application/pdf" width="100%" height="600px" />