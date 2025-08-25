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
<div class="col-md-6">
<h4>View Student</h4>
</div>
<div class="col-md-6">
<button class="btn btn-info float-right" onClick="printdata('print_data')">Print</button>
</div>
</div>
<div id="print_data">
<table class="table table-bordered mt-4">
<thead class="table-dark bg-info">
<tr>
<th>Sr.</th>
<th>Name</th>
<th>Roll No</th>
<th>Program</th>
<th>Session</th>
<th>Email</th>
<th>Contact</th>
<th>Apply Date</th>
<th>Resume</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$id=$_REQUEST['id'];
$sql="select name, roll_no, program, session, contact, email, apply_date, resume from student INNER JOIN student_profile ON student.id=student_profile.student_id INNER JOIN post_applied on student.id=post_applied.student_id where vacancy_id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['roll_no'];?></td>
<td><?php echo $row['program'];?></td>
<td><?php echo $row['session'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['apply_date'];?></td>

<td>
<a href="../resume/<?php echo $row['resume'];?>" download>Download</a> |
<a href="view_resume.php?id=<?php echo $id;?>">View</a>
</td>
</tr>
<?php
}
 }
 else{ ?>
 
  <tr>
<td class="text-center" colspan="9">No Record Found</td>
</tr>
 <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<script>
function printdata(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML=restorepage;
}

</script>