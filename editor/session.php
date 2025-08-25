<?php
include_once "../dbc.php";
if(!isset($_SESSION['editor'])){
	header('location:../editor.php');
}
$sql="select * from editor where email='".$_SESSION['editor']."'";
$result=mysqli_query($con,$sql);
$editor=mysqli_fetch_array($result);
?>