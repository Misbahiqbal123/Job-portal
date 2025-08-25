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
      <a href="add_post.php"><button class="btn btn-warning btn-sm">Add New</button></a>
    </ul>
  </div>
</nav>

<div class="card mt-5">
<div class="card-body">
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th></th>
<th>Title</th>
<th>Added On</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from post where company_id='".$company['id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><img src="../image/<?php echo $row['image'];?>" height="60" width="70"></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['added_on'];?></td>
<td><?php echo $row['description'];?></td>

<td>
<a href="update_post.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Update</button></a>
<a href="delete_post.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm mt-2">Delete</button></a>
</td>
</tr>
 <?php } ?>
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