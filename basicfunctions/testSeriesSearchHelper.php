<?php 
	include("../db/db.php");
	include("../db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	
	$searched_exams = getSearchedExams($_POST['search']);
	if ($searched_exams->num_rows > 0) {
	while($row = $searched_exams->fetch_assoc()) {
		echo '<div class="col s12 m6 l3 ">
				<div class="card white z-depth-3">
					<div class="card-content">
						<span class="white-text"><img src="'.$row['exam_pic'].'" alt="" class="left circle" height="40px" width="40px"><span class="new badge" data-badge-caption="NEW"></span></span>
					</div>
					<div class="card-content center">
					  <h2 class="start-paragraph-text" style="margin:0;padding:0;">'.$row['exam_name'].'</h2>
					  <p style="font-size: 14px;">'.getAllMockTestsCountFromExamId($row['exam_id']).' TOTAL TESTS  | <span class="text-primarycolor">'.getFreeMockTestsCountFromExamId($row['exam_id']).' Free Tests</span></p>
					</div>
					<div class="card-action">
						<div style="margin-left:0%;" class="left"><i class="material-icons left">translate</i>'.getExamLanguagesFromExamId($row['exam_id']).'</div><br/>
					</div>
					<div class="card-action">
						<div class="left" style="margin-left:0%;">'.getTotalMocksCountFromExamId($row['exam_id']).' Mock Test</div><br/>
						<div class="left" style="margin-left:0%;">'.getTotalSubjectMocksCountFromExamId($row['exam_id']).' Subject Test</div><br/>
						<div class="left" style="margin-left:0%;">'.getTotalTopicMocksCountFromExamId($row['exam_id']).' Topic Test</div><br/>
					</div>
					<div class="card-action">
					  <a class="btn '.$settings['accent_color'].'" style="width: 100%" href="./tests/'.implode("-",explode(" ",$row['exam_name'])).'">View Test Series</a>
					</div>
					
					
				</div>
			</div>';
						
		}
	}	else {
		echo '<div class="col s12 m12 l12 ">
				<div class="card-panel z-depth-3">
					<h2 class="start-paragraph-text center" style="margin:0;padding:0;"><b>No Test Series Found</b></h2>
				</div>
			</div>';
	}
?>