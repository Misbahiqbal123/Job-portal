<?php
include_once "session.php";
include_once "header.php";
?>
<div class="container-fluid">
<div class="row body-content">
<div class="col-md-2">
<?php
include_once "sidebar.php";
?>
</div>
<div class="col-md-10">
<div class="row">
<div class="col-md-12">
<h4>View Pass Out Student</h4>
</div>
</div>
<table class="table table-bordered mt-4">
<thead class="table-dark bg-info">
<tr>
<th>S/No</th>
<th>Name</th>
<th>Roll No</th>
<th>Program</th>
<th>Session</th>
<th>Contact</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from student where status=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['roll_no'];?></td>
<td><?php echo $row['program'];?></td>
<td><?php echo $row['session'];?></td>
<td><?php echo $row['contact'];?></td>
<td>
<a href="student_profile.php?id=<?php echo $row['id'];?>"><button class="btn btn-info btn-sm">Profile</button></a>
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