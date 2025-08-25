<?php
include_once "header.php";
?>
<div class="container">
<div class="row">
<div class="col-md-12 body-content">
<h2 class="text-center">Search Result</h2>
<div class="row">
<?php
$keyword=$_POST['keyword'];
$sql="select * from search_history where keyword='$keyword'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)<1){
$sql="insert into search_history(keyword) values('$keyword')";
$result=mysqli_query($con,$sql); 
}
$sql="select vacancies.id, company_name, title, job_type, company_id, position, added_on, experience from vacancies INNER JOIN company on company.id=vacancies.company_id where company_name LIKE '%$keyword%' OR title LIKE '%$keyword%' OR job_type LIKE '%$keyword%' OR experience LIKE '%$keyword%' OR skills LIKE '%$keyword%' OR vacancies.location LIKE '%$keyword%' OR salary LIKE '%$keyword%' AND status=1";
$result=mysqli_query($con,$sql);
echo mysqli_error($con);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
?>
<div class="col-md-4 mt-3">
<div class="card">
<div class="card-body">
<h3><a href="company_profile.php?id=<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></a><span class="float-right"><a href="add_to_list.php?id=<?php echo $row['id'];?>"><i class="fa fa-bookmark-o"></i></a></span></h3>
<p class="card-title font-weight-bold pt-2 line-height"><?php echo $row['title'];?></p>
<p class="pb-1" style="line-height:10px;font-size:12px;">Posted on: <?php echo $row['added_on'];?></p>
<p class="line-height">No of Position: <?php echo $row['position'];?></p>
<a href="vacancy_detail.php?id=<?php echo $row['id'];?>">View Detail</a>
</div>
</div>
</div>
<?php }
 }
 else{
	echo '<h4>No record found</h4>';	 
 }?>

</div>
</div>
</div>
</div>
<?php 
include_once "footer.php";
?>