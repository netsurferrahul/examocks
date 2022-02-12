<?php
	include("../db/db.php");
	include("../db/basicfunctions.php");
	
	$mobile = $_GET['mobile'];
	
	$sql = "SELECT 1 FROM users WHERE mobile_number = '$mobile'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo 'Mobile Number already exists!';
	}
	
?>