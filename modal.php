<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Job Seeker Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="job_seeker.php" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name" class="form-control mb-2" required>
        <label>Email</label>
        <input type="email" name="email" class="form-control mb-2" required>
        <label>Password</label>
        <input type="password" name="password" class="form-control mb-2" required>
        <label>Contact</label>
        <input type="text" name="contact" class="form-control mb-2" required>
        <label>City</label>
        <input type="text" name="city" class="form-control mb-2" required>
        <label>Address</label>
        <input type="text" name="address" class="form-control mb-2" required>
        <label>Profile Picture</label>
        <input type="file" name="img" class="form-control mb-4" required>
        <div class="g-recaptcha mt-2" data-sitekey="6LcLq_IpAAAAAPGHRv4vi7nGRNCUzD3yS5syXRaD"></div>
        <input type="submit" name="register" value="Register" class="btn btn-warning mt-3 mb-3">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Job Seeker Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="job_seeker.php">
        <label>Email</label>
        <input type="email" name="email" class="form-control mb-2" required>
        <label>Password</label>
        <input type="password" name="password" class="form-control mb-2" required>
        <a href="forgot_password.php">Forgot Password?</a><br>
        <div class="g-recaptcha mt-2" data-sitekey="6LcLq_IpAAAAAPGHRv4vi7nGRNCUzD3yS5syXRaD"></div>
        
        <input type="submit" name="login" value="Login" class="btn btn-warning mt-3 mb-3">
        </form>
      </div>
    </div>
  </div>
</div>