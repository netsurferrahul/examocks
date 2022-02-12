<?php
	include("../db/db.php");
	include("../db/basicfunctions.php");
	
	$name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['name']));
	$email = mysqli_real_escape_string($conn,htmlspecialchars($_POST['email']));
	$dob = mysqli_real_escape_string($conn,htmlspecialchars($_POST['dob']));
	$pass = $_POST['password'];
	$mobile = mysqli_real_escape_string($conn,htmlspecialchars($_POST['mobile']));
	$gender = mysqli_real_escape_string($conn,htmlspecialchars($_POST['gender']));
	$state = mysqli_real_escape_string($conn,htmlspecialchars($_POST['state']));
	
	if($name == "") {
		echo 'E Name can\'t be empty.';
	} else if($mobile == "") {
		echo 'E Mobile can\'t be empty.';
	} else if (strlen($mobile) != 10){
		echo 'E Please enter a valid mobile number';
	}  else if(checkMobile($mobile) == true) {
		echo 'E Mobile Number already exists.';
	} else if(strpos($email, "@") == false) {
		echo 'E email can\'t be empty.';
	} else if(checkEmail($email) == true) {
		echo 'E email already exists.';
	} else if($pass == "") {
		echo 'E Password can\'t be empty.';
	}  else if(strlen($pass) < 8) {
		echo 'E Password must be minimum 8 character long.';
	} else if ((substr($mobile,1) == '1' || substr($mobile,1) == '2' || substr($mobile,1) == '3' || substr($mobile,1) == '4' || substr($mobile,1) == '5')) {
		echo 'E Please enter a valid mobile number';
	}else {
		$pass = md5($pass);
		$sql = "INSERT INTO `users`(`username`, `password`, `full_name`, `mobile_number`, `state`, `dob`, `gender`) VALUES ('$email','$pass','$name','$mobile', '$state', '$dob', '$gender')";
	
		if ($conn->query($sql)) {
			sendRegistrationEmail($email);
			session_start();
			$_SESSION['username'] = $email;
			$_SESSION['Login'] = 'True';
			$_SESSION['Time'] = time();	
			echo "S Registered successfully. Please Wait..";
		} else {
			echo "E Error occured. Please try again.";
		}
	}
	// $sql = "SELECT 1 FROM employees WHERE emp_email = '$email'";
	// $result = $conn->query($sql);
	
	// if ($result->num_rows > 0) {
		// echo 'Email already exists!';
	// }
	
?>