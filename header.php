<?php
include_once "dbc.php";
include_once "modal.php";
?>
<!doctype html>
<html>
<head>
<title>Online Job Portal</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
<div class="bg-white border-bottom">
<div class="container">
<div class="row">
<div class="col-md-4 pt-3 mt-2">
<h3><a class="navbar-brand font-weight-bold" href="index.php">Online Job Portal</a></h3>
</div>
<div class="col-md-6 my-3">
<form method="post" action="search.php">
<div class="d-flex form-inputs">
<input class="form-control" type="text" name="keyword" id="searchInput" placeholder="Search Jobs..." autocomplete="off" required>
<button type="submit" name="search"><i class="fa fa-search"></i></button>
</div>
</form>
</div>
<div class="col-md-2 text-right pt-3">
<button class="btn btn-warning" data-toggle="modal" data-target="#registerModal">Sign Up</button>  
<button class="btn btn-outline-warning" data-toggle="modal" data-target="#loginModal">Login</button> 
</div>
</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
	  if(isset($_SESSION['job_seeker'])){
		  $sql="select * from job_seeker where email='".$_SESSION['job_seeker']."'";
		  $result=mysqli_query($con,$sql);
		  $job_seeker=mysqli_fetch_array($result);
		  ?>
          <li class="nav-item active">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="education.php">Education</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="experience.php">Experience</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="skill.php">Skill</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="certification.php">Certification</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="language.php">Language</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="hobby.php">Hobbies</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="post_applied.php">Application</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="listing.php">Listing</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="message.php">Message</a>
      </li>
           <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
	
	<?php	  
	  }
	  else{
	  ?>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="employer.php">Employer</a>
      </li>
      <?php } ?>
    </ul>
  </div>
  </div>
</nav>