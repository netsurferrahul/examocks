<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	$result = getMockQuestionsFromMockId($_GET['id']);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	$exam_questions = json_decode(json_encode($rows), true);
	$total_question = count($exam_questions);
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - <?php echo str_replace("-"," ",$_GET['subject']); ?> MCQ Prepration</title>
		<meta name="description" content="Prepare Best <?php echo str_replace("-"," ",$_GET['subject']); ?> Subject MCQ's from various topics <?php 
		$result = getAllTopics(str_replace("-"," ",$_GET['subject']));
		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
						echo $row['topic_name'] .", ";
				}
		}
		?> these mcq's came in previous year exams.">
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
		 </style>
	</head>
	<body>
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
										<div class="">1/250</div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons blue-text left" style="font-size:50px;">scoreboard</i>
									<div>
										<div class="grey-text">Score</div>
										<div class="">1/250</div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons blue-text left" style="font-size:50px;">spellcheck</i>
									<div>
										<div class="grey-text">Attempts</div>
										<div class="">1/250</div>
									</div>
								</div>
								<div class="col s12 m3">
									<i class="medium material-icons blue-text left" style="font-size:50px;">done_all</i>
									<div>
										<div class="grey-text">Accuracy</div>
										<div class="">1/250</div>
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
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons blue-text left"  style="font-size:25px;">compare</i><div><h2>You vs Topper<h2></div></div>
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
									<td>$0.87</td>
									<td>$0.87</td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">access_time</i></td>
									<td>Time Taken</td>
									<td>$3.76</td>
									<td>$0.87</td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">spellcheck</i></td>
									<td>Attempted</td>
									<td>$7.00</td>
									<td>$0.87</td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">check_circle_outline</i></td>
									<td>Correct</td>
									<td>$7.00</td>
									<td>$0.87</td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">highlight_off</i></td>
									<td>Incorrect</td>
									<td>$7.00</td>
									<td>$0.87</td>
								  </tr>
								  <tr>
									<td><i class="material-icons blue-text">done_all</i></td>
									<td>Accuracy</td>
									<td>$7.00</td>
									<td>$0.87</td>
								  </tr>
								</tbody>
							</table>
					</div>
				</div>
			</div>
			<div class="col s12 m12 l4">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons blue-text left"  style="font-size:25px;">emoji_events</i><div><h2>Top Rankers<h2></div></div>
					<div class="card-text">
						<div style="padding: 2%;">					
							<i class="medium material-icons blue-text left" style="font-size:50px;">looks_one</i>
							<div>
								<div>Rahul Kumar</div>
								<div class="grey-text">92.75</div>
							</div>	
						</div>
						<div style="padding: 2%;">					
							<i class="medium material-icons blue-text left" style="font-size:50px;">looks_two</i>
							<div>
								<div>Rahul Kumar</div>
								<div class="grey-text">92.75</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
	    </div>
		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-title" style="padding: 2%;"><i class="medium material-icons blue-text left"  style="font-size:25px;">fact_check</i><div style="display:inline-block;"><h2>Solutions<h2></div><a class=" btn btn-small browser-default right" onclick="changeLanguage(1);"> <i class="material-icons left">g_translate</i> <span id="selectedLanguage">English</span></a></div>
					<div class="card-text" style="margin: 1%;">
						<div class="row">
							<div class="col s12 m12 l4 center">
								<ul>
									<p class="waves-light btn-small purple" id="sectionName">Computer</p>
									<li style="margin: 8% 4% 8% 4%"><p>Choose a question:</p></li>
									<li style="margin: 8% 4% 8% 4%"><p>
										<?php 
											for ($i=1; $i <= $total_question; $i++){
												echo '<span id="questionsList'.$i.'" class="btn chip grey white-text" style="margin: 2% 4% 2% 4%" onclick="generateSpecific('.($i-1).','.$_GET['mock'].')">'.$i.'</span>';
											}
										?>
										</p>
									</li>
								</ul>
							</div>
							<div class="col s12 m12 l8">
								  <div class="card" style="margin:1%">
									<div class="card-header" style="padding:1% 0% 0% 1%"><a class="waves-effect waves-light btn-small disabled" id="question_id">Question 1</a><div class="right">
									You Scored
									<?php if (true) { echo '<span class="chip green white-text">+'.$arr['correct_marks'].'</span>'; }
													else { echo '<span class="chip red white-text">-';

														if ($arr['enable_negative_marking'] == true) {
															if ($arr['negative_marking_type'] == "percentage") {
																echo round($arr['correct_marks']*$arr['negative_marks']/100,2);
															} else {
																echo $arr['negative_marks'];
															}
														} else {
															echo '0';
														}
															echo '</span>';
													}
									?>
									</div>
									<div class="card-content">
									  <p style="display:inline-block;" id="question_content"><?php echo $exam_questions[0]['question_hindi']; ?></p>
									  <div>
										<p style="margin-top: 2%">
										  <label>
											<input name="group1" type="radio" id="options1"/>
											<span id="optionst1"><?php echo $exam_questions[0]['option_a']; ?></span>
										  </label>
										</p>
										<p style="margin-top: 2%">
										  <label>
											<input name="group1" type="radio" id="options2"/>
											<span id="optionst2"><?php echo $exam_questions[0]['option_b']; ?></span>
										  </label>
										</p>
										<p style="margin-top: 2%">
										  <label>
											<input name="group1" type="radio" id="options3"  />
											<span id="optionst3"><?php echo $exam_questions[0]['option_c']; ?></span>
										  </label>
										</p>
										<p style="margin-top: 2%">
										  <label>
											<input name="group1" type="radio" id="options4" />
											<span id="optionst4"><?php echo $exam_questions[0]['option_d']; ?></span>
										  </label>
										</p>
										<?php
											if ($exam_questions[0]['option_e'] != '') {
												echo '
													<p style="margin-top: 2%">
													  <label>
														<input name="group1" type="radio" id="options5" />
														<span id="optionst5">'.$exam_questions[0]['option_e'].'</span>
													  </label>
													</p>';
											}
										?>
									  </div>
									  
									</div>
									<div class="card-action">
										Solution: 
									  
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