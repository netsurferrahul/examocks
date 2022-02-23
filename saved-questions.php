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
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ExaMocks | My Saved Questions</title>
<?php if (isset($_GET['page'])) include_once("ltwoheader.php"); else include_once("loneheader.php"); ?>
  <style>
	.login-image{
		width: 100px;
		height: 100px;
	}
	@media only screen and (min-width: 913px) {
		.wrapper {
			padding-left: 300px;
		}
	}
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
<?php if (isset($_GET['page'])) include_once("dashboardltwonavbar.php"); else include_once("dashboardnavbar.php"); ?>
<div class="wrapper">
	<div class="row">
		<div class="col s12">
			<div class="card-panel">
				<h1><i class="material-icons left purple-text">bookmark</i>My Saved Questions</h1>
			</div>
		</div>
		<div class="col s12" style="margin-top: 20px;">
			 <div class="center">
			 <?php 
					$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$total_question = getCountUserSavedQuestion(getUserDetails($_SESSION['username'])['id']);
					$total_pages = ceil($total_question / $num_rec_per_page); 
					
					if($total_question>0)
					if ($page == 1) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons left">chevron_left</i>'." Back </a> ";
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../saved-questions/".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='./saved-questions/".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						}
					}					

					echo "<a href='#' class='waves-light btn-small disabled'>Page ".$page."/".$total_pages." </a> ";
					
					if($total_question>0)
					if ($page == $total_pages) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons right">chevron_right</i>'." Next </a> ";	
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../saved-questions/".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='./saved-questions/".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						}
					}					
				?>
			</div>
	  
	<?php
		$start_from = ($page-1) * $num_rec_per_page; 
		$result = getAllUserSavedQuestion(getUserDetails($_SESSION['username'])['id'], $start_from, $num_rec_per_page);
		$sr=$num_rec_per_page*($page-1)+ 1;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				switch($row['answer']) {
							  case 1: $ans= 'A'; break;
							  case 2: $ans= 'B'; break;
							  case 3: $ans= 'C'; break;
							  case 4: $ans= 'D'; break;
							  case 5: $ans= 'E'; break;
						  }
						  
				echo '<ul class="collection">
				
					  <li class="collection-item">'.$sr++.'. '.$row['question'].'</li>
					  <li class="collection-item" id="'.$row['question_id'].'1"><label onclick="checkAnswer('.$row['question_id'].','. $row['answer'].',1);"><input name="'.$row['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'1">'.$row['option_a'].'</span></label></li>
					  <li class="collection-item" id="'.$row['question_id'].'2"><label onclick="checkAnswer('.$row['question_id'].','. $row['answer'].',2);"><input name="'.$row['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'2">'.$row['option_b'].'</span></label></li>
					  <li class="collection-item" id="'.$row['question_id'].'3"><label onclick="checkAnswer('.$row['question_id'].','. $row['answer'].',3);"><input name="'.$row['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'3">'.$row['option_c'].'</span></label></li>
					  <li class="collection-item" id="'.$row['question_id'].'4"><label onclick="checkAnswer('.$row['question_id'].','. $row['answer'].',4);"><input name="'.$row['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'4">'.$row['option_d'].'</span></label></li>
					';
					
					if ($row['option_e'] != "") {
						echo '<li class="collection-item" id="'.$row['question_id'].'4"><label onclick="checkAnswer('.$row['question_id'].','. $row['answer'].',4);"><input name="'.$row['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'4">'.$row['option_e'].'</span></label></li>';
					
					}
					echo '</ul>
					<ul class="collection">
							<div class="row">
								<div class="col s12 m12 center" style="margin-top:1%;">
									<a class="waves-light btn-small red modal-trigger" href="#modal'.$row['question_id'].'"><i class="material-icons left">report_problem</i> Report </a>';
									
									if (isset($_GET['page'])) {
										echo ' <a class="waves-light btn-small green" href="../question/'.str_replace(" ","-",clean($row['question'])).'" ><i class="material-icons left">remove_red_eye</i> View </a></div>';
									} else {
										echo ' <a class="waves-light btn-small green" href="./question/'.str_replace(" ","-",clean($row['question'])).'" ><i class="material-icons left">remove_red_eye</i> View </a></div>';
									}
							echo '</div>
					</ul>
					<ul class="collapsible">
						<li id="ex'.$row['question_id'].'">
						  <div class="collapsible-header"><i class="material-icons">filter_drama</i>Explanation</div>
						  <div class="collapsible-body" id="bd'.$row['question_id'].'"><span>Answer is : <b>';
						  
						  echo $ans;
						  
						  echo '</b><br/>
						  '.$row['explanation'].'
						  </span></div>
						</li>
				</ul>';
				
				echo '<div id="modal'.$row['question_id'].'" class="modal">
					<div class="modal-content">
					  <h4>Report Question</h4>
					  <p>Question:  '.$row['question'].'</p>
					  <p>Given Answer:  <b>'.$ans.'</b></p>
					  <p>Suggestion for Correct Answer:  
							<label>
								<input name="group1" type="radio" id="correct'.$row['question_id'].'" value="A" />
								<span>A</span>
							</label>
							<label>
								<input name="group1" type="radio" id="correct'.$row['question_id'].'" value="B"  />
								<span>B</span>
							</label>
							<label>
								<input name="group1" type="radio" id="correct'.$row['question_id'].'" value="C"  />
								<span>C</span>
							</label>
							<label>
								<input name="group1" type="radio" id="correct'.$row['question_id'].'" value="D"  />
								<span>D</span>
							</label>';
					
					if ($row['option_e'] != "") {
						echo '<label>
								<input name="group1" type="radio" id="correct'.$row['question_id'].'" value="E"  />
								<span>E</span>
							</label>';
					}
					
					echo '  </p>
					</div>
					<div class="modal-footer">
					  <a class="waves-effect waves-green btn-flat" onclick="reportWrongQuestionSaved(\''.$_GET['page'].'\','.$row['question_id'].');">Report</a>
					</div>
				  </div>';
			}
		}
		
	?>
	
	 <div class="center">
	 <?php 
					$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = str_replace($_GET['topic']."-","",$_GET["page"]); } else { $page=1; }; 
					$total_records = getCountUserSavedQuestion(getUserDetails($_SESSION['username'])['id']);
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					if ($page == 1) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons left">chevron_left</i>'." Back </a> ";
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../saved-questions/".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='./saved-questions/".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						}
					}					

					echo "<a href='#' class='waves-light btn-small disabled'>Page ".$page."/".$total_pages." </a> ";
					
					if($total_records>0)
					if ($page == $total_pages) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons right">chevron_right</i>'." Next </a> ";	
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../saved-questions/".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='./saved-questions/".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						}
					}					
				?>
	</div>

		</div>
	</div>
</div>
<?php if (isset($_GET['page'])) include_once("ltwofooter.php"); else include_once("lonefooter.php"); ?>
	<script>
	  document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.modal');
		var instances = M.Modal.init(elems);
	  });
  
    document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.collapsible');
		var instances = M.Collapsible.init(elems);
	  });
  </script>
	</body>
<html>