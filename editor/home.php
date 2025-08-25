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
  <a class="navbar-brand" href="home.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="card mt-5">
<div class="card-body">
<h2 class="text-center">Welcome <?php echo $editor['name'];?></h2>
<h3 class="text-center">Online Job Portal</h3>

</div>
</div>

</div>
</div>


</div>

</body>
</html>