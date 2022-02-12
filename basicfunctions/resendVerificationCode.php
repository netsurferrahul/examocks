<?php
	include_once("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	
	if (!isset($_SESSION['username'])) {
		 header("Location: index.php");
	}
	
	if(sendRegistrationEmail($_SESSION['username'])) {
		echo 'S Verification mail send successfully.';
	} else {
		echo 'E Some error occured while sending mail.';
	}
?>