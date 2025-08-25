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
  <a class="navbar-brand" href="home.php">Post</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="post.php">View Post</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-md-6 mt-4">
<div class="card">
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Title</label>
<input type="text" name="title" class="form-control mb-2" required>
<label>Image</label>
<input type="file" name="img" accept=".jpg, .jpeg, .png" class="form-control mb-2">
<label>Post Description</label>
<textarea name="description" class="form-control mb-2" rows="4" required></textarea>
<input type="submit" name="submit" value="Save" class="btn btn-warning mt-3">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
	$title=$_POST['title'];
	$description=$_POST['description'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$date=date('Y-m-d');
	$sql="insert into post values('','".$company['id']."','$title','$img','$description','$date')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Post added successfully", "success").then(function() { window.location = "post.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>