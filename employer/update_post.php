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
<?php
$id=$_REQUEST['id'];
$sql="select * from post where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<form method="post" enctype="multipart/form-data">
<label>Title</label>
<input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control mb-2" required>
<label>Job Description</label>
<textarea name="description" class="form-control mb-2" rows="4" required><?php echo $row['description'];?></textarea>
<input type="submit" name="submit" value="Update" class="btn btn-warning mt-3">
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
	$sql="update post set title='$title', description='$description' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Post updated successfully", "success").then(function() { window.location = "post.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>