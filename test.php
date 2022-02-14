<?php
error_reporting(E_ALL);
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	//session_unset();
	//session_destroy();
	if (!isset($_SESSION['username'])) {
		header("Location: index.php");
	} else {
		$state = getUserState($_SESSION['username']);
		if($state == 'no') {
			header("Location: varifyemail");
		}
		
		$mock = getMockDetailsFromMockId($_GET['mock']);
	}
	
	
	$result = getMockQuestionsFromMockId($_GET['mock']);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	
	$exam_questions = json_decode(json_encode($rows), true);
	$total_question = count($exam_questions);
	
	echo $_SESSION['Responses'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ExaMocks | Dashboard</title>
  <?php include_once("common.php"); ?>
  <style>
	.login-image{
		width: 100px;
		height: 100px;
	}
	.sidenav li {
		line-height: 0px;
	}
	.nav-bottom {
	   position:absolute;
	   bottom:6%;
	   width:100%;
	}
  </style>
  <script>
		var jsonExamData = <?php echo json_encode($rows) ?>
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
   /*$(document).on("keydown", function (e) {
        if (e.key == "F5" || e.key == "F11" || 
            (e.ctrlKey == true && (e.key == 'r' || e.key == 'R')) || 
            e.keyCode == 116 || e.keyCode == 82) {

                   e.preventDefault();
        }
    });
	
	window.onbeforeunload = function() {
        return "Leave this page ?";
    }*/
  </script>
</head>
<body onload="startMock();sessionCheck();Examtimer('<?php echo $mock['mock_total_duration']; ?>','#countdown_timer')">

<?php include_once("testsidenavbar.php"); ?>

<div>
<?php
	$arr = json_decode($mock['settings'], true);
?>


	<div class="row">
		<div class="col s12 m10">
			<div class="row">
				  <div class="card" style="margin:1%">
					<div class="card-header" style="padding:1% 0% 0% 1%"><h5><?php echo $mock['mock_title']; ?></h5></div>
					<div class="card-content">
					  <p style="display:inline-block;">Sections:
					<?php 
						$sections = getSectionNamesFromMockId($_GET['mock']);
						if ($sections->num_rows > 0) {
							while($row = $sections->fetch_assoc()) {
								echo '<span class="btn chip blue white-text">
										 '.$row['section_name'].'
									  </span>';
							}
						}
					?>
					  </p>
					  <p style="display:inline-block;" class="right">
					  <span class="chip">
						   Time Left: <span id="countdown_timer"><?php echo secondsToExamTimeFormat($mock['mock_total_duration']); ?></span> 
					  </span>
					  </p>
					  <div>
						  <p style="display:inline-block;">
							Question Type: MCQ
						  </p>
						  
						  <p style="display:inline-block;" class="right">
							   Negative marks:  <span class="chip red white-text">
							   <?php
								if ($arr['enable_negative_marking'] == true) {
									if ($arr['negative_marking_type'] == "percentage") {
										echo round($arr['correct_marks']*$arr['negative_marks']/100,2);
;									} else {
										echo $arr['negative_marks'];
									}
								} else {
									echo '0';
								}
							   ?>
							   </span>
						  </p>
						  <p style="display:inline-block;" class="right">
							Marks for correct answer:   <span class="chip green white-text"><?php echo $arr['correct_marks']; ?></span>
						  </p> 
					  </div>
					  
					</div>
					<div class="card-action">
					  View In: <div  class="browser-default right">
					  <form>
								<select>
								  <option value="English">English</option>
								  <option value="Hindi">Hindi</option>
								</select>
								
								</form>
							  </div>
					</div>
				  </div>
			</div>
			
			<div class="row">
				  <div class="card" style="margin:1%">
					<div class="card-header" style="padding:1% 0% 0% 1%"><a class="waves-effect waves-light btn-small disabled" id="question_id">Question 1</a></div>
					<div class="card-content">
					  <p style="display:inline-block;" id="question_content"><?php echo $exam_questions[0]['question']; ?></p>
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
					  <a class="waves-light btn-small purple modal-trigger" id="btnMarkForReview" onclick="markForReviewAndNext('0',
					  <?php 
					  if ($exam_questions[0]['option_e'] != '') {
						  echo "5";
					  } else {
						  echo "4";
					  } 
					  ?>);"><i class="material-icons left">beenhere</i>  Mark for Review & Next </a> <?php //echo $exam_questions[0]['question_id'] ?> 
					  <a class="waves-light btn-small red" onclick="clearResponseFromSession();" id="btnClear"><i class="material-icons left">clear</i> Clear Response </a>
					  <p id="json_quesion_id" style="display:none;">0</p>
					  <a class="waves-light btn-small green right" id="btnSaveAndNext" onclick="saveAndNext('0',
					  <?php 
					  if ($exam_questions[0]['option_e'] != '') {
						  echo "5";
					  } else {
						  echo "4";
					  } 
					  ?>)"><i class="material-icons right">navigate_next</i>Save & Next</a>
					</div>
				  </div>
			</div>
		</div>
		
		<div class="col s12 m2">

				  <ul id="slide-out" class="sidenav sidenav-fixed right">
					<li style="margin: 4% 4% 8% 4%">
						<div class="row">
							<div class="col s12 m4">
								<span class="collection" style="border:0px; padding:0;"><span class="collection-item  avatar"> <i class="material-icons circle grey">person</i></a></span></span>
							</div>
							<div class="col s12 m8">
								<span class="black-text name center" style="line-height: normal;">RAHUL KUMAR</span>
							</div>
						</div>
					</li>
					<li><div class="divider"></div></li>
					<li style="margin: 4% 4% 8% 4%"><div class="row"><div class="col s12 m6" style="font-size: 14px;"><span class="chip grey white-text">1</span> <p style="display:inline-flex;">Not Visited</p></div><div class="col s12 m6" style="font-size: 14px;"><span class="chip red white-text">1</span> <p style="display:inline-flex;">Not Answered</p></div></div></li>
					<li style="margin: 4% 4% 8% 4%"><div class="row"><div class="col s12 m5" style="font-size: 14px;"><span class="chip green white-text">1</span> <p style="display:inline-flex;">Answered</p></div><div class="col s12 m7" style="font-size: 14px;"><span class="chip purple white-text">1</span> <p style="display:inline-flex;">Marked for review</p></div></div></li>
					<li style="margin: 4% 4% 8% 4%"><div class="row"><div class="col s12 m12" style="font-size: 14px;"><span class="chip amber white-text">1</span>  Answered and marked for review (will not be evaluated) </div></div></li>
					<li><div class="divider"></div></li>
					<li class="center"><p class="waves-light btn-small purple">MENTAL AND REASONING ABILITY</p></li>
					<li style="margin: 8% 4% 8% 4%"><p>Choose a question:</p></li>
					<li style="margin: 8% 4% 8% 4%"><p>
					<?php 
						for ($i=1; $i <= $total_question; $i++){
							echo '<span id="questionsList'.$i.'" class="btn chip grey white-text" style="margin: 2% 4% 2% 4%" onclick="generateSpecific('.($i-1).')">'.$i.'</span>';
						}
					?>
					</p></li>
					<a class="waves-light btn-small green right nav-bottom" id="btnSubmitExam" style="width:100%" onclick="submitTest();"><i class="material-icons right">done</i>Submit</a>
				  </ul>
		</div>
	</div>
</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.sidenav');
			var instances = M.Sidenav.init(elems,{
				edge : "right",
				draggable: true
			});
		  });
			
			
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('select');
			var instances = M.FormSelect.init(elems, {});
		});
	</script>
	 	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<!-- SweetAlert2 -->
		<script src="./plugins/sweetalert2/sweetalert2.min.js" defer async ></script>
		<!-- Toastr -->
		<script src="./plugins/toastr/toastr.min.js" defer async ></script>
	</body>
<html>