<?php
include_once "header.php";
include_once "function.php";
if(isset($_POST['login'])){
	if(isset($_POST['g-recaptcha-response']))
	{
		$secretKey= "6LcLq_IpAAAAAPSMXvp8HMZZ6-yeJVUdeyel8p3u";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response = $_POST['g-recaptcha-response'];
		$url= "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
		$fire = file_get_contents($url);
		$data = json_decode($fire);
		if($data->success==true){
			$email=$_POST['email'];
			$password=$_POST['password'];
			$sql="select * from job_seeker where email='$email' AND password='$password'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row){
                if($row['status']==1)
                {
                    $_SESSION['job_seeker']=$email;
				    echo '<script>swal("Successfully", "Login successfully", "success").then(function() { window.location = "index.php";  });</script>';
                }
                else{
                    echo '<script>swal("Warning", "Your email is not verified", "warning").then(function() { window.location = "index.php";  });</script>';
                }
			}
			else{
				
				echo '<script>swal("Warning", "Invalid email or password", "warning").then(function() { window.location = "index.php";  });</script>';
			}
		}
		else{
			echo '<script>swal("Warning", "Please fill captcha code", "warning").then(function() { window.location = "index.php";  });</script>';
		}
		
	}
	else{
			echo '<script>swal("Warning", "Captcha error", "warning").then(function() { window.location = "index.php";  });</script>';
	}

}
if(isset($_POST['register'])){
	if(isset($_POST['g-recaptcha-response']))
	{
		$secretKey= "6LcLq_IpAAAAAPSMXvp8HMZZ6-yeJVUdeyel8p3u";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response = $_POST['g-recaptcha-response'];
		$url= "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
		$fire = file_get_contents($url);
		$data = json_decode($fire);
		if($data->success==true){
			$name=$_POST['name'];
			$contact=$_POST['contact'];
			$email=$_POST['email'];
			$city=$_POST['city'];
			$password=$_POST['password'];
			$address=$_POST['address'];
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
			$img=$_FILES['img']['name'];
			$sql="insert into job_seeker values('','$name','$contact','$email','$city','$password','$address','$img','0')";
			$result=mysqli_query($con,$sql);
            $user_id = mysqli_insert_id($con);
            $subject= 'Activate Your Account';
	        $body= 'Please verify your account by clicking on this link. <br>http://localhost/online_job_portal/verify.php?id='.$user_id.'<br>Online Job Portal';
			if($result && sendEmail($email,$name,$subject,$body)){
				echo '<script>swal("Successfully", "Account created successfully", "success").then(function() { window.location = "index.php";  });</script>';
			}
			else{
				echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
				}
			}
			else{
				echo '<script>swal("Warning", "Please fill captcha code", "warning").then(function() { window.location = "index.php";  });</script>';
			}
		}
	else{
			echo '<script>swal("Warning", "Captcha error", "warning").then(function() { window.location = "index.php";  });</script>';
	}
		
	}
?>