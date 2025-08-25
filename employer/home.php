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
  <a class="navbar-brand" href="home.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="card mt-5">
<div class="card-body">
<h2 class="text-center">Welcome <?php echo $company['company_name'];?></h2>
<h3 class="text-center">Online Job Portal</h3>
<?php
$sql="select post_applied.status from post_applied INNER JOIN vacancies on vacancies.id=post_applied.vacancy_id where company_id='".$company['id']."' AND post_applied.status=0";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
?>
<div class="col-md-6 m-auto pt-5">
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong><?php echo mysqli_num_rows($result) ?></strong> New Job Application Received.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>

<?php } ?>
</div>
</div>
</div>
</div>
</div>