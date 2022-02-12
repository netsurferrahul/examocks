<?php
	include("../db/db.php");
	include("../db/basicfunctions.php");
	
	$email = $_GET['email'];
	
	$sql = "SELECT 1 FROM users WHERE username = '$email'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo 'Email already exists!';
	}
	
?>