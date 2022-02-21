<?php 
	include("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	
	if (isAlreadyExamAddedToUser($_POST['exam'],$_SESSION['username'])) {
		echo "E Exam is already added.";
	} else {
		if (addExamToUser($_POST['exam'],$_SESSION['username'])) {
			echo "S Exam added to Your Exams.";
		} else {
			echo "E Something went wrong. Please try again later.";
		}
	}
?>