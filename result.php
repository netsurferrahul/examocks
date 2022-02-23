<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	$result = getMockResponseQuestionsAndSolutionsFromMockId($_GET['id'],getUserDetails($_SESSION['username'])['id']);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	$exam_questions = json_decode(json_encode($rows), true);
	$total_question = count($exam_questions);
	
	if (!isMockResponseTextExists($_GET['id'],getUserDetails($_SESSION['username'])['id'])) {
		$total_attempted =  getTotalAttamptedQuestionCountFromMockId($_GET['id'],getUserDetails($_SESSION['username'])['id']);
		$total_correct = getTotalCorrectQuestionCountFromMockId($_GET['id'],getUserDetails($_SESSION['username'])['id']);
		$total_incorrect = getTotalIncorrectQuestionCountFromMockId($_GET['id'],getUserDetails($_SESSION['username'])['id']);
		$accuracy = round(($total_correct/$total_question)*100,2);
		$total_marks = round(getTotalMarksCountFromMockId($_GET['id'],getUserDetails($_SESSION['username'])['id']),2);
		$string_make = '{"score": '.$total_marks.',"no_of_attempts": '.$total_attempted.',"total_correct": '.$total_correct.',"total_incorrect": '.$total_incorrect.',"accuracy": '.$accuracy.' }';
		setMockResponseText($string_make,$_GET['id'],getUserDetails($_SESSION['username'])['id']);
	} 
	$resultDetailsAttributesInJson = getResultAttributesFromMockId($_GET['id'],getUserDetails($_SESSION['username'])['id']);
	$resultDetailsAttributes = json_decode($resultDetailsAttributesInJson, true);
	
	$TopperDetails = getTopper($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - <?php echo getMockDetailsFromMockId($_GET['id'])['mock_title']; ?> Result</title>
		<?php include_once("ltwoheader.php"); ?>
		 
		 <style>
		 @media screen and (max-width: 768px) {
			#breadcrumb-show{
				display: none;
			}
		 }
		 h2 {
			font-size: 1.5rem;
			margin: 0;
			font-weight: bold;
		}
		h1 {
			font-size: 1.5rem;
			margin: 0;
			font-weight: bold;
		}
		.inline-icon {
		   vertical-align: bottom;
		   font-size: 25px !important;
		}
		 </style>
		 
		  <script>
				var jsonSolutionData = <?php echo json_encode($rows) ?>
		  </script>
	</head>
	<body onload="checkSolutionsSession(<?php echo $_GET['id']; ?>);generateSpecificSolutionQuestion(0,<?php echo $_GET['id']; ?>);">
	<?php include_once("ltwonavbar.php"); ?>
	<div class="card-panel" style="margin-top:0;">
		<div class="container">
			<div class="row">
				<div class="col s12"><h1><?php echo getMockDetailsFromMockId($_GET['id'])['mock_title']; ?></h1></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons blue-text left"  style="font-size:25px;">equalizer</i><div><h2>Overall Performance<h2></div></div>
					<div class="card-text">
							<div class="row" style="padding:2%;">
								<div class="col s12 m3">
									<i class="medium material-icons blue-text left" style="font-size:50px;">emoji_events</i>
									<div>
										<div class="grey-text">Rank</div>
										<div class=""><?php echo getUserRank($_GET['id'],getUserDetails($_SESSION['username'])['id']); ?>/<?php echo getTotalAttemptsOfMock($_GET['id']); ?></div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons pink-text left" style="font-size:50px;">scoreboard</i>
									<div>
										<div class="grey-text">Score</div>
										<div class=""><?php echo $resultDetailsAttributes['score']; ?>/<?php echo getMockDetailsFromMockId($_GET['id'])['mock_total_marks']; ?></div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons green-text left" style="font-size:50px;">spellcheck</i>
									<div>
										<div class="grey-text">Attempts</div>
										<div class=""><?php echo $resultDetailsAttributes['no_of_attempts']; ?>/<?php echo $total_question; ?></div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons purple-text left" style="font-size:50px;">done_all</i>
									<div>
										<div class="grey-text">Accuracy</div>
										<div class=""><?php echo $resultDetailsAttributes['accuracy']; ?>%</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
	    </div>
		<div class="row">
			<div class="col s12 m12 l8">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons purple-text left"  style="font-size:25px;">compare</i><div><h2>You vs Topper<h2></div></div>
					<div class="card-text" style="padding: 2%;">
							 <table class="highlight responsive-table">
								<thead>
								  <tr>
									  <th></th>
									  <th></th>
									  <th>You</th>
									  <th>Topper</th>
								  </tr>
								</thead>

								<tbody>
								  <tr>
									<td><i class="material-icons blue-text">scoreboard</i></td>
									<td>Score</td>
									<td><?php echo $resultDetailsAttributes['score']; ?></td>
									<td><?php echo $TopperDetails['score']; ?></td>
								  </tr>
								 <!-- <tr>
									<td><i class="material-icons blue-text">access_time</i></td>
									<td>Time Taken</td>
									<td>$3.76</td>
									<td>$0.87</td>
								  </tr> -->
								  <tr>
									<td><i class="material-icons blue-text">spellcheck</i></td>
									<td>Attempted</td>
									<td><?php echo $resultDetailsAttributes['no_of_attempts']; ?></td>
									<td><?php echo $TopperDetails['no_of_attempts']; ?></td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">check_circle_outline</i></td>
									<td>Correct</td>
									<td><?php echo $resultDetailsAttributes['total_correct']; ?></td>
									<td><?php echo $TopperDetails['total_correct']; ?></td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">highlight_off</i></td>
									<td>Incorrect</td>
									<td><?php echo $resultDetailsAttributes['total_incorrect']; ?></td>
									<td><?php echo $TopperDetails['total_incorrect']; ?></td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">done_all</i></td>
									<td>Accuracy</td>
									<td><?php echo $resultDetailsAttributes['accuracy']; ?>%</td>
									<td><?php echo $TopperDetails['accuracy']; ?>%</td>
								  </tr>
								</tbody>
							</table>
					</div>
				</div>
			</div>
			<div class="col s12 m12 l4">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons amber-text left"  style="font-size:25px;">emoji_events</i><div><h2>Top Rankers<h2></div></div>
					<div class="card-text">
						<?php 
							$result = getTopRankers($_GET['id']);
							$id = 1;
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo '<div style="padding: 2%;">					
										<i class="medium material-icons amber-text left" style="font-size:50px;">';
										
									switch($id) {
										case 1: echo "looks_one";break;
										case 2: echo "looks_two";break;
										case 3: echo "looks_3";break;
										case 4: echo "looks_4";break;
										case 5: echo "looks_5";break;
									}										
										
									echo '</i>
										<div>
											<div>'.$row['full_name'].'</div>
											<div class="grey-text">Score: '.$row['score'].'</div>
										</div>	
									</div>';
									$id++;
								}
							}
						?>
					</div>
				</div>
			</div>
	    </div>
		<!--<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons blue-text left"  style="font-size:25px;">equalizer</i><div><h2>Sectional Performance<h2></div></div>
					<div class="card-text">
							<div class="row" style="padding:2%;">
								<div class="col s12 m3">
									<i class="medium material-icons blue-text left" style="font-size:50px;">emoji_events</i>
									<div>
										<div class="grey-text">Rank</div>
										<div class=""><?php //echo getUserRank($_GET['id'],getUserDetails($_SESSION['username'])['id']); ?>/<?php //echo getTotalAttemptsOfMock($_GET['id']); ?></div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons pink-text left" style="font-size:50px;">scoreboard</i>
									<div>
										<div class="grey-text">Score</div>
										<div class=""><?php //echo $resultDetailsAttributes['score']; ?>/<?php //echo getMockDetailsFromMockId($_GET['id'])['mock_total_marks']; ?></div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons green-text left" style="font-size:50px;">spellcheck</i>
									<div>
										<div class="grey-text">Attempts</div>
										<div class=""><?php //echo $resultDetailsAttributes['no_of_attempts']; ?>/<?php //echo $total_question; ?></div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons purple-text left" style="font-size:50px;">done_all</i>
									<div>
										<div class="grey-text">Accuracy</div>
										<div class=""><?php //echo $resultDetailsAttributes['accuracy']; ?>%</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
	    </div>-->
		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons blue-text left"  style="font-size:25px;">fact_check</i><div style="display:inline-block;"><h2>Solutions<h2></div><a class=" btn btn-small browser-default right" onclick="changeSolutionsLanguage(1);"> <i class="material-icons left">g_translate</i> <span id="selectedLanguage">English</span></a></div>
					<div class="card-text" style="margin: 1%;">
						<div class="row">
							<div class="col s12 m12 l4 center">
								<ul>
									<p class="waves-light btn-small purple" id="sectionName">Computer</p>
									<li style="margin: 8% 4% 8% 4%"><p>Choose a question:</p></li>
									<li style="margin: 8% 4% 8% 4%"><p>
										<?php 
											for ($i=1; $i <= $total_question; $i++){
												echo '<span id="questionsList'.$i.'" class="btn chip grey white-text" style="margin: 2% 4% 2% 4%" onclick="generateSpecificSolutionQuestion('.($i-1).','.$_GET['id'].')">'.$i.'</span>';
											}
										?>
										</p>
									</li>
								</ul>
							</div>
							<div class="col s12 m12 l8">
								  <div class="card" style="margin:1%">
									<div class="card-header" style="padding:1% 0% 0% 1%"><a class="waves-effect waves-light btn-small disabled" id="question_id">Question 1</a><div class="right">
									You Scored <span class="chip green white-text" id="marks"></span>
									</div>
									<div class="card-content">
									  <p style="display:inline-block;padding:1%" id="question_content"><?php echo $exam_questions[0]['question']; ?></p>
									  <div>
										<p style="margin-top: 2%;;padding:1%">
											<i class="inline-icon material-icons red-text" id="option_one">highlight_off</i><i class="inline-icon material-icons red-text" id="user_option_one"></i>
											<span id="optionst1"><?php echo $exam_questions[0]['option_a']; ?></span>
										</p>
										<p style="margin-top: 2%;padding:1%">
											<i class="inline-icon material-icons red-text" id="option_two">highlight_off</i><i class="inline-icon material-icons red-text" id="user_option_two"></i>
											<span id="optionst2"><?php echo $exam_questions[0]['option_b']; ?></span>
										</p>
										<p style="margin-top: 2%;;padding:1%">
											<i class="inline-icon material-icons red-text"  id="option_three">highlight_off</i><i class="inline-icon material-icons red-text" id="user_option_three"></i>
											<span id="optionst3"><?php echo $exam_questions[0]['option_c']; ?></span>
										</p>
										<p style="margin-top: 2%;;padding:1%">
											<i class="inline-icon material-icons red-text" id="option_four">highlight_off</i><i class="inline-icon material-icons red-text" id="user_option_four"></i>
											<span id="optionst4"><?php echo $exam_questions[0]['option_d']; ?></span>
										</p>
										<?php
											if ($exam_questions[0]['option_e'] != '') {
												echo '
													<p style="margin-top: 2%;;padding:1%">
														<i class="inline-icon material-icons red-text" id="option_five">highlight_off</i><i class="inline-icon material-icons red-text" id="user_option_five"></i>
														<span id="optionst5">'.$exam_questions[0]['option_e'].'</span>
													</p>';
											}
										?>
									  </div>
									  
									</div>
									<div class="card-action">
										Solution: <p id="explanation"><?php echo $exam_questions[0]['explanation']; ?></p>
									  
									</div>
								  </div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
  
   
    <?php include_once("ltwofooter.php"); ?>
	</body>
<html>