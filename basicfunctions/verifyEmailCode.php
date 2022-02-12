<?php
	include_once("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	
	if (!isset($_SESSION['username'])) {
		 header("Location: login.php");
	}
	
	$code = $_POST['verificationcode'];
	
	if(verifyEmail($_SESSION['username'],$code)) {
		echo 'S Mail verified successfully.';
	} else {
		echo 'E It looks like the verification code is wrong or expired.';
	}
?>