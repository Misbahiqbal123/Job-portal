<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>window.location.href="index.php"</script>';
}
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">
<h2>View Job Application</h2>
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Company</th>
<th>Job Title</th>
<th>Positions</th>
<th>Experience</th>
<th>Salary</th>
<th style="width:11%;">Apply Date</th>
<th>Shortlist</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select company_name, vacancy_id, title, position, experience, salary, last_date, apply_date, shortlist from vacancies INNER JOIN company on company.id=vacancies.company_id INNER JOIN post_applied on post_applied.vacancy_id=vacancies.id where job_seeker_id='".$job_seeker['id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo $row['company_name'];?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['experience'];?></td>
<td><?php echo $row['salary'];?></td>
<td><?php echo $row['apply_date'];?></td>
<td><?php 
if($row['shortlist']==0){
	echo 'Pending';
}
else if($row['shortlist']==1){
	echo 'Yes | <a href="interview.php?id='.$row['vacancy_id'].'">Interview</a>';
}
if($row['shortlist']==-1){
	echo 'No';
}

?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
<?php 
include_once "footer.php";
?>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>