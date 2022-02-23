<?php 
	include("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	
	$searched_exams = getSearchedExams($_POST['search']);
	if ($searched_exams->num_rows > 0) {
		echo '<div class="card-panel">';
	while($row = $searched_exams->fetch_assoc()) {
		echo '<a class="waves-effect waves-light card-panel z-depth-3" href="./exam/'.implode("-",explode(" ",$row['exam_name'])).'" style="color:black;">
				<img src="'.$row['exam_pic'].'" alt="'.$row['exam_name'].'" class="left circle" height="40px" width="40px" style="margin-top:-10px;">
				<i class="material-icons right">chevron_right</i>&nbsp;&nbsp;'.$row['exam_name'].'
			</a>';
		}
		echo '
			</div>';
	}	else {
		echo '<div class="card-panel">
					<h2 class="start-paragraph-text center" style="margin:0;padding:0;"><b>No exam found with this keyword.</b></h2>
				</div>';
	}
?>