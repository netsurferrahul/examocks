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
			.start-paragraph-text {
				font-size: 16px;
				font-weight: 400;
				line-height: 28px;
			}
			h2 {
				font-size: 1.5rem;
			}
			h1 {
				font-size: 1.5rem;
				margin: 0;
				font-weight: bold;
			}
		 </style>
	</head>
	<body>
	<head>
	<?php include_once("lonenavbar.php"); ?>
	</head>
	<main>
		<div class="card-panel" style="margin-top:0;">
			<div class="container">
				<div class="row">
					<div class="col s12"><a href="./index">Home</a><i class="tiny material-icons">chevron_right</i>Mock Test Series</div>
					<div class="col s12"><h1>Mock Test Series</h1></div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="input-field col s12">
				  <i class="material-icons prefix">search</i>
				  <textarea id="search" class="materialize-textarea" onkeyup="searchTestSeries();"></textarea>
				  <label for="search">Search Test Series</label>
				</div>
			</div>
			<div class="row" id="MockTests">
			<?php 
				$mocks = getAllExams();
				if ($mocks->num_rows > 0) {
				while($row = $mocks->fetch_assoc()) {
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
			}	
									?>
			
		  </div>
		</div>
     </main>
    <?php include_once("lonefooter.php"); ?>
	
	</body>
<html>