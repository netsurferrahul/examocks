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
		<?php include_once("ltwoheader.php"); ?>
		 
	</head>
	<body>
	
	<?php include_once("ltwonavbar.php"); ?>

	<div class="row">
	
    <?php 
	$mocks = getAllMockTestsFromExamId($_GET['exam']);
	if ($mocks->num_rows > 0) {
		while($row = $mocks->fetch_assoc()) {
			echo '<div class="col s12 m2">
			  <div class="card">
				<div class="card-header '.$settings['primary_color'].' white-text center">
				  <span class="card-title ">'.$row['mock_title'].'</span>
				</div>
				<div class="card-content">
				  <p>Exam : '.$row['mock_description'].'</p>
				  <div><p style="display:inline-block"><i class="material-icons left">assignment</i>'.$row['mock_total_question'].' Questions</p>&nbsp;&nbsp;&nbsp;&nbsp;<p style="display:inline-block" class="right"><i class="material-icons left">access_time</i>'.($row['mock_total_duration']/60).' Minutes</p></div>
				</div>
				<div class="card-action">
				  <a href="../test-home/'.$row['mock_id'].'" class="btn tooltipped btn-small '.$settings['accent_color'].'" style="width:100%" data-position="bottom" data-tooltip="Login to take this mock test">';
				  if ($row['is_free'] == 0) {
					  echo '<i class="material-icons left">lock</i>';
				  }
				  
				  echo 'attempt</a>
				</div>
			  </div>
			</div>';
		}
	}
	?>
	
  </div>
   
    <?php include_once("ltwofooter.php"); ?>
	<script>
		  document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.tooltipped');
			var instances = M.Tooltip.init(elems, {
				position : 'top'
			});
		  });
	</script>
	</body>
<html>