<?php
include_once "header.php";
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">
<h2 class="text-center pb-4">Vacancy Detail</h2>
<?php
$id=$_REQUEST['id'];
$sql="select company_name, vacancies.id, company_id, title, job_type, position, experience, qualification, skills, vacancies.location, salary, last_date, added_on, description from vacancies INNER JOIN company on company.id=vacancies.company_id where vacancies.id='$id' ORDER BY vacancies.id DESC";
$result=mysqli_query($con,$sql);
echo mysqli_error($con);
$row=mysqli_fetch_array($result);
?>
<div class="row p-3">
<div class="col-md-12 mt-3">
<div class="card">
<div class="card-body">
<h3><a href="company_profile.php?id=<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></a></h3>
<p class="card-title font-weight-bold pt-2"><?php echo $row['title'];?></p>
<p class="line-height">Job Type: <?php echo $row['job_type'];?></p>
<p class="line-height">No of Position: <?php echo $row['position'];?></p>
<p>Experience: <?php echo $row['experience'];?></p>
<p>Qualification: <?php echo $row['qualification'];?></p>
<p>Skills: <?php echo $row['skills'];?></p>
<p class="line-height">Location: <?php echo $row['location'];?></p>
<p class="line-height">Salary Package: <?php echo number_format($row['salary']);?> PKR</p>
<p class="line-height">Last Date: <?php echo date('d M Y',strtotime($row['last_date']));?></p>
<p class="line-height">Added On: <?php echo date('d M Y',strtotime($row['added_on']));?></p>
<h5>Description</h5>
<p><?php echo $row['description'];?></p>
<form method="post">
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<button type="submit" name="submit" class="btn btn-warning mt-2">Apply Now</button>
</form>
<span>Share on Social Media:-</span>
<?php
$websiteUrl = 'http://localhost/final/vacancy_detail.php?id='.$id;
$encodedUrl = urlencode($websiteUrl);
?>
<div class="iconn-bar">
<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodedUrl; ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
<a href="https://twitter.com/intent/tweet?url=<?php echo $encodedUrl; ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
<a href="whatsapp://send?text=<?php echo $encodedUrl; ?>" data-action="share/whatsapp/share" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<?php 
include_once "footer.php";
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$date=date('Y-m-d');
	if(!isset($_SESSION['job_seeker'])){
		echo '<script>swal("Warning", "Please login into the system", "warning").then(function() { window.location = "index.php";  });</script>';
	}
	else{
		$sql="select * from job_seeker_profile where job_seeker_id='".$job_seeker['id']."'";
		  $result=mysqli_query($con,$sql);
		  if(mysqli_num_rows($result)<1){
			  echo '<script>swal("Warning", "Please add profile information", "warning").then(function() { window.location = "profile.php";  });</script>';
		  }
		  $sql="select * from post_applied where job_seeker_id='".$job_seeker['id']."' AND vacancy_id='$id'";
		  $result=mysqli_query($con,$sql);
		  if(mysqli_num_rows($result)>0){
			  echo '<script>swal("Warning", "You have already applied for this post.", "warning");</script>';
		  }
		  else{
			  if(strtotime($date)>strtotime($row['last_date'])){
				  echo '<script>swal("Warning", "The last date for applying has passed.", "warning");</script>';
			  }
			  else{
				  	$sql="insert into post_applied values('','".$job_seeker['id']."','$id','$date','0','0')";
					$result=mysqli_query($con,$sql);
					if($result){
						echo '<script>swal("Successfully", "Post applied successfully", "success").then(function() { window.location = "index.php";  });</script>';
					}
					else{
						echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
					}
			  }
			  
		  }
		
	}
}
?>