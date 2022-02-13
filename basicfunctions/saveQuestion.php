<?php
	include_once("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	
	$question_id = $_POST['question_id'];
	$correct_answer = $_POST['correct_answer'];
	
	
	if (!isset($_SESSION['username'])) {
		 echo "E Please login to save questions.";
		 return;
	}
	if (checkAlreadySaveQuestion($_SESSION['username'], $question_id)) {
		echo 'E You have already saved this question.';
	} else {
		if(saveQuestion($_SESSION['username'], $question_id)) {
			echo 'S Question Saved successfully.';
		} else {
			echo 'E Some error occured while saving.';
		}
	}
?>