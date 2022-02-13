<?php
	include_once("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	
	$question_id = $_POST['question_id'];
	$correct_answer = $_POST['correct_answer'];
	
	
	if (!isset($_SESSION['username'])) {
		 $user="Guest";
	} else {
		$user = $_SESSION['username'];
	}
	
	if(reportQuestion($user, $question_id, $correct_answer)) {
		echo 'S Question Reported successfully.';
	} else {
		echo 'E Some error occured while reporting.';
	}
?>