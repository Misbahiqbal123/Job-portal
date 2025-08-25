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
<?php
$id=$_REQUEST['id'];
$sql="select name, roll_no, program, session, contact, email, city, address, cnic, dob, gender, image, resume from student_profile INNER JOIN student on student.id=student_profile.student_id where student_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<img src="../image/<?php echo $row['image'];?>" height="200">
<h2><?php echo $row['name'];?></h2>
<p class="line-height">Roll No: <?php echo $row['roll_no'];?></p>
<p class="line-height">Program: <?php echo $row['program'];?></p>
<p class="line-height">Session: <?php echo $row['session'];?></p>
<p class="line-height">CNIC: <?php echo $row['cnic'];?></p>
<p class="line-height">Contact: <?php echo $row['contact'];?></p>
<p class="line-height">Email: <?php echo $row['email'];?></p>
<p class="line-height">City: <?php echo $row['city'];?></p>
<p class="line-height">Address: <?php echo $row['address'];?></p>
<p class="line-height">Gender: <?php echo $row['gender'];?></p>
<a href="../resume/<?php echo $row['resume'];?>" download>Download Resume</a> ||
<a href="view_resume.php?id=<?php echo $id;?>">View Resume</a>

<h3 class="pt-4">Qualification</h3>
<table class="table table-bordered mt-4">
<thead>
<tr>
<th>S/No</th>
<th>Degree</th>
<th>Institute</th>
<th>Obtained Marks/ CGPA</th>
<th>Total Marks/ CGPA</th>
<th>Passing Year</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select * from qualification where student_id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo $row['degree'];?></td>
<td><?php echo $row['institute'];?></td>
<td><?php echo $row['marks_obtained'];?></td>
<td><?php echo $row['total_marks'];?></td>
<td><?php echo $row['passing_year'];?></td>
</tr>
<?php
}
 }
 else{ ?>
 
  <tr>
<td class="text-center" colspan="6">No Record Found</td>
</tr>
 <?php } ?>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>