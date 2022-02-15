<?php
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
		 
	</head>
	<body>
	
	<?php include_once("lonenavbar.php"); ?>

	<div class="row">
	
	<?php 
	$mocks = getAllExams();
	if ($mocks->num_rows > 0) {
		while($row = $mocks->fetch_assoc()) {
			echo '<div class="col s12 m2">
			  <div class="card">
				<div class="card-header '.$settings['primary_color'].' white-text center">
				  <span class="card-title ">'.$row['exam_name'].'</span>
				</div>
				<div class="card-content">
				  <p>Exam : '.$row['exam_description'].'</p>
				  <div><p style="display:inline-block"><i class="material-icons left">assignment</i>';
				  if (getTotalMocksCountFromExamId($row['exam_id']) == 0) {
					  echo 'No Mock Tests';
				  } else if (getTotalMocksCountFromExamId($row['exam_id']) == 1) {
					  echo '1 Mock Test';
				  } else {
					  echo getTotalMocksCountFromExamId($row['exam_id']).' Mock Test';
				  }
				  
				  echo '</p></div>
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