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
		
		$mock = getMockDetailsFromMockId($_GET['exam']);
	}
	
	
	$result = getMockQuestionsFromMockId($_GET['exam']);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	
	$exam_questions = json_decode(json_encode($rows), true);
	$total_question = count($exam_questions);
	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ExaMocks | <?php echo $mock['mock_title']; ?> Exam Instructions</title>
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
	
	body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
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
<body>

<?php include_once("testsidenavbar.php"); ?>

<div>
<?php
	$arr = json_decode($mock['settings'], true);
?>
	<header>
		<?php include_once("lthreenavbar.php"); ?>
	</header>
	<main>
		<div class="container-flex">
			<div class="row">
				<div class="col s12 m8 l10">
						  <div class="card">
							<div class="card-content">
							  <div class="col-xs-12 c-test-instructions ng-scope" ng-class="{'railway-test-interface':isRailwayTestInterfaceUsed}" ng-show="showInstTab == 1" id="bank-instructions" ng-if="!instructionsJSON.isGateExam">
								   <h4>General Instructions:</h4>
								   <ol start="1">
									  <li>
										 <p>The clock will be set at the server. The countdown timer at the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches zero, the examination will end by itself. You need not terminate the examination or submit your paper.</p>
									  </li>
									  <li>
										 <p>The Question Palette displayed on the right side of screen will show the status of each question using one of the following symbols:</p>
										 <ul class="que-ans-states hide-on-railway">
											<li><span class="chip grey white-text">1</span> You have not visited the question yet.</li>
											<li><span class="chip red white-text">1</span> You have not answered the question.</li>
											<li><span class="chip green white-text">1</span> You have answered the question.</li>
											<li><span class="chip purple white-text">1</span> You have NOT answered the question, but have marked the question for review.</li>
											<li><span class="chip amber white-text">1</span> You have answered the question, but marked it for review.</li>
										 </ul>
										 <ul class="railway-instructions-legend show-on-railway">
											<li><span class="new-legend not-answered"></span> You have not answered the question.</li>
											<li><span class="new-legend answered"></span> You have answered the question.</li>
											<li><span class="new-legend reviewed"></span> You have NOT answered the question, but have marked the question for review.</li>
											<li><span class="new-legend reviewed-answered"></span> You answered the question also marked the question for review.</li>
										 </ul>
									  </li>
								   </ol>
								   <p>The <b>Mark For Review</b> status for a question simply indicates that you would like to look at that question again. If a question is answered, but marked for review, then the answer will be considered for evaluation unless the status is modified by the candidate.</p>
								   <b>Navigating to a Question :</b>
								   <ol start="3">
									  <li>
										 <p>To answer a question, do the following:</p>
										 <ol>
											<li>Click on the question number in the Question Palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</li>
											<li>Click on <b>Save &amp; Next</b> to save your answer for the current question and then go to the next question.</li>
											<li>Click on <b>Mark for Review <span class="hide-on-railway">&amp; Next</span></b> to save your answer for the current question and also mark it for review <span class="hide-on-railway">, and then go to the next question.</span></li>
										 </ol>
									  </li>
								   </ol>
								   <p>Note that your answer for the current question will not be saved, if you navigate to another question directly by clicking on a question number <span>without saving</span> the answer to the previous question.</p>
								   <p>You can view all the questions by clicking on the <b>Question Paper</b> button. <span style="color:#ff0000">This feature is provided, so that if you want you can just see the entire question paper at a glance.</span></p>
								   <h4>Answering a Question :</h4>
								   <ol start="4">
									  <li>
										 <p>Procedure for answering a multiple choice (MCQ) type question:</p>
										 <ol>
											<li>Choose one answer from the 4 options (A,B,C,D) given below the question<span class="hide-on-railway">, click on the bubble placed before the chosen option.</span></li>
											<li class="hide-on-railway">To deselect your chosen answer, click on the bubble of the chosen option again or click on the <b><span class="hide-on-railway">Clear Response</span> <span class="show-on-railway">Erase Answer</span></b> button</li>
											<li>To change your chosen answer, click on the bubble of another option.</li>
											<li>To save your answer, you MUST click on the <b>Save &amp; Next</b></li>
										 </ol>
									  </li>
									  <li>
										 <p>Procedure for answering a numerical answer type question :</p>
										 <ol>
											<li>To enter a number as your answer, use the virtual numerical keypad.</li>
											<li>A fraction (e.g. -0.3 or -.3) can be entered as an answer with or without "0" before the decimal point. <span style="color: red">As many as four decimal points, e.g. 12.5435 or 0.003 or -932.6711 or 12.82 can be entered.</span></li>
											<li>To clear your answer, click on the <b>Clear Response</b> button</li>
											<li>To save your answer, you MUST click on the <b>Save &amp; Next</b></li>
										 </ol>
									  </li>
									  <li ng-show="isJeeTestInterfaceUsed" class="ng-hide">
										 <p>Procedure for answering a multiple correct answers (MCAQ) type question</p>
										 <ol>
											<li>Choose one or more answers from the 4 options (A,B,C,D) given below the question, click on the bubble placed before the chosen option.</li>
											<li>To deselect your chosen answer, click on the checkbox of the chosen option again</li>
											<li>To clear your marked responses, click on the <b>Clear Response</b> button</li>
											<li>To save your answer, you MUST click on the <b>Save &amp; Next</b> button</li>
										 </ol>
									  </li>
									  <li>
										 <p>To mark a question for review, click on the <b>Mark for Review <span class="hide-on-railway">&amp; Next</span></b> button. If an answer is selected (for MCQ/MCAQ) entered (for numerical answer type) for a question that is <b>Marked for Review</b> , that answer will be considered in the evaluation unless the status is modified by the candidate.</p>
									  </li>
									  <li>
										 <p>To change your answer to a question that has already been answered, first select that question for answering and then follow the procedure for answering that type of question.</p>
									  </li>
									  <li>
										 <p>Note that ONLY Questions for which answers are <b>saved</b> or <b>marked for review after answering</b> will be considered for evaluation.</p>
									  </li>
									  <li>
										 <p>Sections in this question paper are displayed on the top bar of the screen. Questions in a Section can be viewed by clicking on the name of that Section. The Section you are currently viewing will be highlighted.</p>
									  </li>
									  <li>
										 <p>After clicking the <b>Save &amp; Next</b> button for the last question in a Section, you will automatically be taken to the first question of the next Section in sequence.</p>
									  </li>
									  <li>
										 <p>You can move the mouse cursor over the name of a Section to view the answering status for that Section.</p>
									  </li>
								   </ol>
								</div>
							 </div> 
						</div>
						<div class="card">
							<div class="card-content">
								<a class="waves-light btn-small red" onclick="history.back();" id="btnClear"><i class="material-icons left">arrow_back</i> Back </a>
								<a class="waves-light btn-small green right" onclick="goToMainExamScreen(<?php echo $_GET['exam']; ?>);" id="btnClear"><i class="material-icons right">arrow_forward</i> Next </a>
							</div>
						</div>	
					</div>
					
					<div class="col s12 m4 l2">
						<div class="card">
							<div class="card-content">
								<div class="row">
									<div class="col s6 m5">
										<span class="collection" style="border:0px; padding:0;"><span class="collection-item  avatar"> <i class="material-icons circle grey">person</i></a></span></span>
									</div>
									<div class="col s6 m7">
										<span class="black-text name center" style="line-height: normal;">RAHUL KUMAR</span>
									</div>
								</div>
							</div>
						</div>	
						<div class="card">
							<div class="card-title <?php echo $settings['primary_color']; ?> white-text center" style="font-size:20px;">Default Language</div>
							<div class="card-content">
								<div class="row">
									<div class="input-field col s6 m6">
									  <label>
										<input name="language" type="radio" id="language" checked />
										<span>English</span>
									  </label>
									</div>
									<div class="input-field col s6 m6">
									  <label>
										<input name="language" type="radio" />
										<span>Hindi</span>
									  </label>
									</div>
								</div>
							</div>
						 </div>
					</div>
			</div>
		</div>
	</div>
</main>
		
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
		<script src="../plugins/sweetalert2/sweetalert2.min.js" defer async ></script>
		<!-- Toastr -->
		<script src="../plugins/toastr/toastr.min.js" defer async ></script>
	</body>
<html>