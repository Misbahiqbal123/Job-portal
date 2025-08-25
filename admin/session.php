<?php
include_once "../dbc.php";
if(!isset($_SESSION['admin'])){
	header('location:../index.php');
}
$sql="select * from admin where email='".$_SESSION['admin']."'";
$result=mysqli_query($con,$sql);
$admin=mysqli_fetch_array($result);
?>