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
  <a class="navbar-brand" href="home.php">Job Seeker</a>
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
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Name</th>
<th>Contact</th>
<th>Email</th>
<th>City</th>
<th>Address</th>
<th style="width:16%;">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from job_seeker";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['address'];?></td>
<td>
<a href="job_seeker_profile.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Profile</button></a>
<a href="delete_job_seeker.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Delete</button></a>
</td>
</tr>
<?php
$i++;
 } ?>
</tbody>
</table>
</div>
</div>
</div>


</div>
</div>
</body>
</html>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>