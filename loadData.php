<?php
include_once "dbc.php";
if(isset($_POST['searchRecord'])){
$keyword=$_POST['searchRecord'];
$sql="select vacancies.id, company_name, title, job_type, company_id, position, added_on, experience from vacancies INNER JOIN company on company.id=vacancies.company_id where (company_name LIKE '%$keyword%' OR title LIKE '%$keyword%' OR job_type LIKE '%$keyword%' OR experience LIKE '%$keyword%' OR skills LIKE '%$keyword%' OR vacancies.location LIKE '%$keyword%' OR salary LIKE '%$keyword%') AND status=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="col-md-4 mt-3">
<div class="card bg-white p-3">
<div class="card-body">
<h3><a href="company_profile.php?id=<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></a><span class="float-right"><a href="add_to_list.php?id=<?php echo $row['id'];?>"><i class="fa fa-bookmark-o"></i></a></span></h3>
<p class="card-title font-weight-bold pt-2"><?php echo $row['title'];?></p>
<p class="pb-1" style="line-height:10px;font-size:12px;">Posted on: <?php echo $row['added_on'];?></p>
<p class="line-height">No of Position: <?php echo $row['position'];?></p>
<a href="vacancy_detail.php?id=<?php echo $row['id'];?>">View Detail</a>
</div>
</div>
</div>
<?php } }?>