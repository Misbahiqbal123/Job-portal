<?php
include_once "session.php";
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
<?php
include_once "sidebar.php";
?>
</div>
<div class="col-md-10">
<nav class="row navbar navbar-expand-lg navbar-dark" style="background-color: #FFD862;">
  <a class="navbar-brand" href="message.php">Message</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="message.php">View Message</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Message</label>
<textarea name="message" placeholder="Enter your message" class="form-control mb-2" rows="4" required></textarea>
<input type="submit" name="submit" value="Send Now" class="btn btn-warning mt-3">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
$id=$_REQUEST['id'];
if(isset($_POST['submit'])){
	$message=$_POST['message'];
	$sql="insert into message values('','".$company['id']."','$id','$message','')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Message sent successfully", "success").then(function() { window.location = "message.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>