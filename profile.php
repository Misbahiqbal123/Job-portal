<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>window.location.href="index.php"</script>';
}
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">

<a href="index.php">Home</a> <i class="fa fa-angle-double-right"></i> Profile
<hr>
<h4>Manage Account</h4>
<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other Information</a>
  </li>
</ul>
<div class="tab-content py-4" id="myTabContent">
  <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
  <div class="col-md-5">
         <form method="post">
         <label>Email</label>
        <input type="text" name="email" value="<?php echo $job_seeker['email'];?>" class="form-control mb-3" required>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $job_seeker['password'];?>" class="form-control mb-3" required>
        <input type="submit" name="account" value="Update" class="btn btn-warning mt-3">
        </form>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="col-md-5">
         <form method="post" enctype="multipart/form-data">
         <label>Name</label>
         <input type="text" name="name" value="<?php echo $job_seeker['name'];?>" class="form-control mb-3" required>
         <label>Contact</label>
         <input type="text" name="contact" value="<?php echo $job_seeker['contact'];?>" class="form-control mb-3" required>
         <label>City</label>
         <input type="text" name="city" value="<?php echo $job_seeker['city'];?>" class="form-control mb-3" required>
         <label>Address</label>
         <input type="text" name="address" value="<?php echo $job_seeker['address'];?>" class="form-control mb-3" required>
         <label>Profile Image</label>
         <input type="file" name="img" accept=".jpg, .jpeg, .png" class="form-control mb-2">
         <img src="image/<?php echo $job_seeker['profile_img'];?>" height="80" width="70"><br><br>
        <input type="submit" name="profile" value="Update" class="btn btn-warning mt-3">
        </form>
    </div>
  </div>
  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
  <div class="col-md-5">
  <?php
  $sql="select * from job_seeker_profile where job_seeker_id='".$job_seeker['id']."'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_array($result); 
	?>
      <form method="post" enctype="multipart/form-data">
         <label>CNIC</label>
         <input type="text" name="cnic" value="<?php echo $row['cnic'];?>" class="form-control mb-3" required>
         <label>DOB</label>
         <input type="date" name="dob" value="<?php echo $row['dob'];?>" class="form-control mb-3" required>
         <label>Gender</label>
         <select name="gender" class="form-control mb-3" required>
         <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
         <option value="Male">Male</option>
         <option value="Female">Female</option>
         </select>
         <label>Resume</label>
         <input type="file" name="resume" accept="application/pdf" class="form-control mb-2">
         <a href="resume/<?php echo $row['resume'];?>" download>Download Now</a><br><br>
         <label>About me</label>
         <textarea name="about" class="form-control mb-3" rows="4" placeholder="About me" required><?php echo $row['about'];?></textarea>
        <input type="submit" name="other_update" value="Submit" class="btn btn-warning mt-3">
        </form>
    
    
    <?php 
  }
  else{
  ?>
         <form method="post" enctype="multipart/form-data">
         <label>CNIC</label>
         <input type="text" name="cnic" class="form-control mb-3" required>
         <label>DOB</label>
         <input type="date" name="dob" class="form-control mb-3" required>
         <label>Gender</label>
         <select name="gender" class="form-control mb-3" required>
         <option value="">- Select -</option>
         <option value="Male">Male</option>
         <option value="Female">Female</option>
         </select>
         <label>Resume</label>
         <input type="file" name="resume" accept="application/pdf" class="form-control mb-3" required>
         <label>About me</label>
         <textarea name="about" class="form-control mb-3" rows="4" placeholder="About me" required></textarea>
        <input type="submit" name="other" value="Submit" class="btn btn-warning mt-3">
        </form>
       <?php } ?>
    </div>
  </div>
</div>


</div>
</div>
</div>
<?php 
include_once "footer.php";
if(isset($_POST['account'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$_SESSION['job_seeker']=$email;
	$sql="update job_seeker set email='$email', password='$password' where id='".$job_seeker['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Account updated successfully", "success").then(function() { window.location = "profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
if(isset($_POST['profile'])){
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	if(!empty($_FILES['img']['name'])){
		move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$job_seeker['profile_img'];
	}
	$sql="update job_seeker set name='$name', contact='$contact', city='$city', address='$address', profile_img='$img' where id='".$job_seeker['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Profile updated successfully", "success").then(function() { window.location = "profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
if(isset($_POST['other'])){
	$cnic=$_POST['cnic'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$about=$_POST['about'];
	move_uploaded_file($_FILES['resume']['tmp_name'],"resume/".$_FILES['resume']['name']);
	$resume=$_FILES['resume']['name'];
	$sql="insert into job_seeker_profile values('','".$job_seeker['id']."','$cnic','$dob','$gender','$resume','$about')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Profile added successfully", "success").then(function() { window.location = "profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
if(isset($_POST['other_update'])){
	$cnic=$_POST['cnic'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$about=$_POST['about'];
	if(!empty($_FILES['resume']['name'])){
		move_uploaded_file($_FILES['resume']['tmp_name'],"resume/".$_FILES['resume']['name']);
		$resume=$_FILES['resume']['name'];
	}
	else{
		$resume=$row['resume'];
	}
	
	$sql="update job_seeker_profile set cnic='$cnic', dob='$dob', gender='$gender', resume='$resume', about='$about' where id='".$row['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo '<script>swal("Successfully", "Information updated successfully", "success").then(function() { window.location = "profile.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>