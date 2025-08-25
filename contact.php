<?php
include_once "header.php";
?>
<!-- Contact Us Section -->
<section class="contact-us py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center font-weight-bold mb-4">Contact Us</h2>
                <p class="text-center text-muted mb-5">
                    Have any questions or need assistance? Feel free to reach out to us. We're here to help!
                </p>
                <!-- Contact Form -->
                <form method="post">
                    <div class="form-row">
                        <!-- Name Input -->
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>
                        <!-- Email Input -->
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <!-- Subject Input -->
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter subject" required>
                    </div>
                    <!-- Message Textarea -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" rows="4" placeholder="Enter your message" required></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php 
include_once "footer.php";
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];

	$sql="insert into contact values('','$name','$email','$subject','$message')";
	$result=mysqli_query($con,$sql);
if($result){
		echo '<script>swal("Successfully", "Message sent successfully", "success").then(function() { window.location = "contact.php";  });</script>';
	}
	else{
		echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
	}
}
?>