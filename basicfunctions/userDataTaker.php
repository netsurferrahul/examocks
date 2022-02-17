<?php
	include_once("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	if (isset($_SESSION['username'])) {
		$result = getUserDetails($email);
		$rows = array();
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		echo "<script>alert('hello');</script>";
		echo '<script>
				var jsonUserData = '.json_encode($rows).'
			if (sessionStorage.getItem("details") == null) {
				sessionStorage.setItem("details",JSON.stringify(json_encode(jsonExamData)));
			}
		</script>';
	}
?>