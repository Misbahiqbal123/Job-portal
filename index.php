<?php
include_once "header.php";
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/s1.jpg" style="height:100vh;" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/s2.jpg" style="height:100vh;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/s3.jpg" style="height:100vh;" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
<div class="row">
<div class="col-md-4 bg-info">
<div class="row">
<div class="col-md-6">
<h5 class="text-center pt-4 pb-3">Available Jobs</h5>
</div>
<div class="col-md-6">
<h4 class="text-center pt-4 pb-3">5</h4>
</div>
</div>
</div>

<div class="col-md-4 bg-warning">
<div class="row">
<div class="col-md-6">
<h5 class="text-center pt-4 pb-3">Total Employers</h5>
</div>
<div class="col-md-6">
<h4 class="text-center pt-4 pb-3">8</h4>
</div>
</div>
</div>

<div class="col-md-4 bg-danger">
<div class="row">
<div class="col-md-6">
<h5 class="text-center text-white pt-4 pb-3">Total Job Seeker</h5>
</div>
<div class="col-md-6">
<h4 class="text-center text-white pt-4 pb-3">5</h4>
</div>
</div>
</div>
</div>
</div>


<div class="container body-content">
<div class="row">
<div class="col-md-4 text-center">
<div class="card">
<div class="card-body">
<img src="image/img-1.png">
<h5 class="pt-2">Professional Identification</h5>
<p>Create your online resume and make it available to employers.</p>
</div>
</div>
</div>

<div class="col-md-4 text-center">
<div class="card">
<div class="card-body">
<img src="image/img-2.png">
<h5 class="pt-2">Discover Jobs in Pakistan</h5>
<p>Single stop shop accross the different Jobs.</p>
</div>
</div>
</div>

<div class="col-md-4 text-center">
<div class="card">
<div class="card-body">
<img src="image/img-3.png">
<h5 class="pt-2">Apply on the GO</h5>
<p>Apply with a click of button.</p>
</div>
</div>
</div>



<div class="col-md-12 pt-100">
<h2 class="text-center">View Jobs Listing</h2>
<input type="search" name="search" id="search" class="form-control w-50" placeholder="Filters jobs on the basis of job type, education, experience, Salary Range">
<div class="row" id="data_container">
<?php
$sql="select vacancies.id, company_name, title, company_id, position, added_on, experience from vacancies INNER JOIN company on company.id=vacancies.company_id where status=1 ORDER BY vacancies.id DESC";
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
<?php } ?>

</div>
</div>
</div>
</div>


<?php 
include_once "footer.php";
?>
<script>
$('#search').keyup(function(){
        var searchRecord = $(this).val();
        if(searchRecord){
            $.ajax({
                type:'POST',
                url:'loadData.php',
                data:'searchRecord='+searchRecord,
                success:function(html){
                    $('#data_container').html(html);
                }
            });
        }
    });
</script>