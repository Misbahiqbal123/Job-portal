<?php
include_once "../dbc.php";
if(!isset($_SESSION['company'])){
	header('location:../index.php');
}
$sql="select * from company where email='".$_SESSION['company']."'";
$result=mysqli_query($con,$sql);
$company=mysqli_fetch_array($result);
?>