<?php
error_reporting(E_ALL);
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Best Mock Test Series for Compititive Exams prepration</title>
		<?php include_once("loneheader.php"); ?>
		 <style>
			 .margin-2 {
				 margin:0% 0% 0% 0%;
			 }
		 </style>
	</head>
	<body>
	
	<?php include_once("lonenavbar.php"); ?>

	<div class="row">
	
	<?php 
	$mocks = getAllExams();
	if ($mocks->num_rows > 0) {
		while($row = $mocks->fetch_assoc()) {
			echo '<div class="col s12 m6 l3">
			  <div class="card">
				<div class="card-header '.$settings['primary_color'].' white-text center">
				  <span class="card-title ">'.$row['exam_name'].'</span>
				</div>
				<div class="card-content">
				  <p>'.$row['exam_description'].'</p>
				  <div>';
				  
				  echo '<div class="row margin-2" style="margin-left:0%;"><i class="material-icons left">assignment</i>';
				  if (getTotalMocksCountFromExamId($row['exam_id']) == 0) {
					  echo 'No Mock Test';
				  } else if (getTotalMocksCountFromExamId($row['exam_id']) == 1) {
					  echo '1 Mock Test';
				  } else {
					  echo getTotalMocksCountFromExamId($row['exam_id']).' Mock Tests';
				  }
				  echo '</div>';
				  
				  echo '<div class="row margin-2" style="margin-left:0%;"><i class="material-icons left">assignment</i>';
				  if (getTotalSubjectMocksCountFromExamId($row['exam_id']) == 0) {
					  echo 'No Subject Test';
				  } else if (getTotalSubjectMocksCountFromExamId($row['exam_id']) == 1) {
					  echo '1 Subject Test';
				  } else {
					  echo getTotalSubjectMocksCountFromExamId($row['exam_id']).' Subject Tests';
				  }
				  echo '</div>';
				  
				  echo '<div class="row margin-2" style="margin-left:0%;"><i class="material-icons left">assignment</i>';
				  if (getTotalTopicMocksCountFromExamId($row['exam_id']) == 0) {
					  echo 'No Topic Test';
				  } else if (getTotalTopicMocksCountFromExamId($row['exam_id']) == 1) {
					  echo '1 Topic Test';
				  } else {
					  echo getTotalTopicMocksCountFromExamId($row['exam_id']).' Topic Tests';
				  }
				  echo '</div>';
				  
				  echo '</div>
				</div>
				<div class="card-action">
				  <a href="./tests/'.$row['exam_id'].'" class="btn btn-small '.$settings['accent_color'].'" style="width:100%">View Tests</a>
				</div>
			  </div>
			</div>';
		}
	}
	?>
	
  </div>
   
    <?php include_once("lonefooter.php"); ?>
	
	</body>
<html>