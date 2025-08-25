<?php
include_once "header.php";
if(!isset($_SESSION['job_seeker'])){
	echo '<script>window.location.href="index.php"</script>';
}
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">
<div class="row">
<div class="col-md-12">
<h2>View Job Listing</h2>
</div>
</div>
<div id="print_data">
<table class="table table-bordered mt-4" id="myTable">
<thead class="table-dark bg-warning">
<tr>
<th>S/No</th>
<th>Company</th>
<th>Job Title</th>
<th>Positions</th>
<th>Location</th>
<th>Experience</th>
<th>Salary</th>
<th>Last Date</th>
<th style="width:10%;">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="select company_name, job_listing.id, title, position, experience, vacancies.location, salary, last_date, added_on, description from job_listing INNER  JOIN vacancies on vacancies.id=job_listing.vacancy_id INNER JOIN company on company.id=vacancies.company_id ";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo $i++;?></td>
<td><?php echo $row['company_name'];?></td>
<td><a href="vacancy_detail.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
<td><?php echo $row['position'];?></td>
<td><?php echo $row['location'];?></td>
<td><?php echo $row['experience'];?></td>
<td><?php echo $row['salary'];?></td>
<td><?php echo $row['last_date'];?></td>
<td>
<a href="delete_listing.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning btn-sm">Delete</button></a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
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