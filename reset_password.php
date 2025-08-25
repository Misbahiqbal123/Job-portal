<?php
include_once "header.php";
?>
<div class="container">
<div class="row">
<div class="col-md-6 m-auto body-content">
<div class="card">
<div class="card-body">
<h3 class="text-center">Forgot Password</h3>
<form method="post">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
<span>Please enter your registered email with this platform</span><br>
<input type="submit" name="submit" value="Submit" class="btn btn-warning mt-3 mb-3"><br>
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
include_once "footer.php";
include_once "function.php";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$sql="select * from company where email='$email'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_array($result);
	
		$subject= 'Modern Work Opportunity Platform';
		$body= 'Hello '.$row['company_name'].' you have requested for your password, your password is <b>'.$row['password'].'</b>';
		if(sendEmail($row['email'],$row['company_name'],$subject,$body)){
			echo '<script>swal("Successfully", "Please check your email", "success").then(function() { window.location = "employer.php";  });</script>';
		}
		else{
			echo '<script>swal("Warning", "Sorry try again later", "warning");</script>';
			
		}
	}
	else{
		echo '<script>swal("Warning", "This email is not registered", "warning");</script>';
	}
	
}
?>