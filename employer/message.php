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
        <a class="nav-link" href="logout.php">Logout</span></a>
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
<th>Message</th>
<th>Reply</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select name, email, contact, message, reply from message INNER JOIN job_seeker on job_seeker.id=message.job_seeker_id where employer_id='".$company['id']."' ORDER BY message.id DESC";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['message'];?></td>
<td><?php echo ($row['reply']=="") ? "N/A" : $row['reply'];?></td>
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
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>