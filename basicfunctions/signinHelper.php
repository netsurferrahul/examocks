<?php
	error_reporting(0);
	session_start();
	include("../db/db.php");
	include("../db/basicfunctions.php");
	
	$email = mysqli_real_escape_string($conn,htmlspecialchars($_POST['email']));
	$pass = md5($_POST['pass']);
	$rem = $_POST['rem'];
	
	$sql = "SELECT * FROM users WHERE username = '$email' and password = '$pass'";
	$result=$conn->query($sql);
	
	if ($result->num_rows > 0) {
		session_start();
		$_SESSION['username'] = $email;
		$_SESSION['Login'] = 'True';
		$_SESSION['Time'] = time();	

		if ($rem == 'true') {
			setcookie("user_login", $email,time() + (10*365*24*60*60), "/");
			setcookie("user_password", $_POST['pass'],time() + (10*365*24*60*60), "/");
			setcookie("user_remember", $_POST['pass'],time() + (10*365*24*60*60), "/");
		} else {
			if (isset($_COOKIE["user_login"])) { 
				setcookie("user_login","", time() - 3600,"/");
			}
			if (isset($_COOKIE["user_password"])) {
				setcookie("user_password","", time() - 3600,"/");
			}
			if (isset($_COOKIE["user_remember"])) {
				setcookie("user_remember","", time() - 3600,"/");
			}
		}
		echo "S Login Successfully. Redirecting to dashboard...";
	} else{
		echo "E Wrong Password/Email Combination.";
	}
?>