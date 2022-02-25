<?php error_reporting(E_ALL);
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	$questionDetails = getQuestionDetailsFromQuestion(str_replace("-"," ",$_GET['question']));
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - <?php echo $questionDetails['question']; ?> MCQ Prepration</title>
		<meta name="description" content="<?php echo $questionDetails['question'] . " (a) " . $questionDetails['option_a'] . " (b) " . $questionDetails['option_b'] . "( c) " . $questionDetails['option_c'] . " (d) " . $questionDetails['option_d']; ?>">
		<?php include_once("lthreeheader.php"); ?>
		 
		 <style>
		 @media screen and (max-width: 768px) {
			#breadcrumb-show{
				display: none;
			}
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
	<?php include_once("lthreenavbar.php"); ?>
	<div class="card-panel" style="margin-top:0;">
		<div class="container">
			<div class="row">
				<div class="col s12"><a href="../index">Home</a><i class="tiny material-icons">chevron_right</i><a href="../engineering">Engineering</a><i class="tiny material-icons">chevron_right</i><a href="../<?php echo str_replace(" ","-",$questionDetails['branch_name']); ?>"><?php echo $questionDetails['branch_name']; ?></a><i class="tiny material-icons">chevron_right</i><a href="<?php echo '../topic/'.str_replace(" ","-",$questionDetails['subject_name']); ?>"><?php echo $questionDetails['subject_name']; ?></a><i class="tiny material-icons">chevron_right</i><?php echo str_replace("-"," ",$questionDetails['question']); ?></div>
				<div class="col s12"><h1><?php echo $questionDetails['question']; ?></h1></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12" style="margin-top: 20px;">

		  
		<?php
					
					switch($questionDetails['answer']) {
								  case 1: $ans= 'A'; break;
								  case 2: $ans= 'B'; break;
								  case 3: $ans= 'C'; break;
								  case 4: $ans= 'D'; break;
								  case 5: $ans= 'E'; break;
							  }
							  
					echo '<ul class="collection">
					
						  <li class="collection-item">Q. '.$questionDetails['question'].'</li>
						  <li class="collection-item" id="'.$questionDetails['question_id'].'1"><label onclick="checkAnswer('.$questionDetails['question_id'].','. $questionDetails['answer'].',1);"><input name="'.$questionDetails['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$questionDetails['question_id'].'1">'.$questionDetails['option_a'].'</span></label></li>
						  <li class="collection-item" id="'.$questionDetails['question_id'].'2"><label onclick="checkAnswer('.$questionDetails['question_id'].','. $questionDetails['answer'].',2);"><input name="'.$questionDetails['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$questionDetails['question_id'].'2">'.$questionDetails['option_b'].'</span></label></li>
						  <li class="collection-item" id="'.$questionDetails['question_id'].'3"><label onclick="checkAnswer('.$questionDetails['question_id'].','. $questionDetails['answer'].',3);"><input name="'.$questionDetails['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$questionDetails['question_id'].'3">'.$questionDetails['option_c'].'</span></label></li>
						  <li class="collection-item" id="'.$questionDetails['question_id'].'4"><label onclick="checkAnswer('.$questionDetails['question_id'].','. $questionDetails['answer'].',4);"><input name="'.$questionDetails['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$questionDetails['question_id'].'4">'.$questionDetails['option_d'].'</span></label></li>
						';
						
						if ($questionDetails['option_e'] != "") {
							echo '<li class="collection-item" id="'.$questionDetails['question_id'].'4"><label onclick="checkAnswer('.$questionDetails['question_id'].','. $questionDetails['answer'].',4);"><input name="'.$questionDetails['question_id'].'" type="radio" /><span style="display:inline-flex;height:100%;width:100%;"  id="s'.$questionDetails['question_id'].'4">'.$questionDetails['option_e'].'</span></label></li>';
						
						}
						echo '</ul>
						<ul class="collection">
								<div class="row">
									<div class="col s12 m12 center" style="margin-top:1%;">
										<a class="waves-light btn-small red modal-trigger" href="#modal'.$questionDetails['question_id'].'"><i class="material-icons left">report_problem</i> Report </a>
										<a class="waves-light btn-small green" onclick="saveQuestion(\'\','.$questionDetails['question_id'].')" ><i class="material-icons left">bookmark</i> Save </a></div>
									</div>
						</ul>
						<ul class="collapsible">
							<li id="ex'.$questionDetails['question_id'].'">
							  <div class="collapsible-header"><i class="material-icons">filter_drama</i>Explanation</div>
							  <div class="collapsible-body" id="bd'.$questionDetails['question_id'].'"><span>Answer is : <b>';
							  
							  echo $ans;
							  
							  echo '</b><br/>
							  '.$questionDetails['explanation'].'
							  </span></div>
							</li>
					</ul>';
					
					echo '<div id="modal'.$questionDetails['question_id'].'" class="modal">
						<div class="modal-content">
						  <h4>Report Question</h4>
						  <p>Question:  '.$questionDetails['question'].'</p>
						  <p>Given Answer:  <b>'.$ans.'</b></p>
						  <p>Suggestion for Correct Answer:  
								<label>
									<input name="group1" type="radio" id="correct'.$questionDetails['question_id'].'" value="A" />
									<span>A</span>
								</label>
								<label>
									<input name="group1" type="radio" id="correct'.$questionDetails['question_id'].'" value="B"  />
									<span>B</span>
								</label>
								<label>
									<input name="group1" type="radio" id="correct'.$questionDetails['question_id'].'" value="C"  />
									<span>C</span>
								</label>
								<label>
									<input name="group1" type="radio" id="correct'.$questionDetails['question_id'].'" value="D"  />
									<span>D</span>
								</label>';
						
						if ($questionDetails['option_e'] != "") {
							echo '<label>
									<input name="group1" type="radio" id="correct'.$questionDetails['question_id'].'" value="E"  />
									<span>E</span>
								</label>';
						}
						
						echo '  </p>
						</div>
						<div class="modal-footer">
						  <a class="waves-effect waves-green btn-flat" onclick="reportWrongQuestion(\'\','.$questionDetails['question_id'].');">Report</a>
						</div>
					  </div>';
			
		?>
		
		<div class="card-panel center">
			<h1>Similar Questions</h1>
		</div>
		
		<?php
			$result = getSimiliarQuestions($questionDetails['topic_name']);
			$sr=1;
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
										<a class="waves-light btn-small red modal-trigger" href="#modal'.$row['question_id'].'"><i class="material-icons left">report_problem</i> Report </a>
										<a class="waves-light btn-small green" onclick="saveQuestion(\'\','.$row['question_id'].')" ><i class="material-icons left">bookmark</i> Save </a>
										<a class="waves-light btn-small green" href="../question/'.str_replace("?","",str_replace(" ","-",$row['question'])).'" ><i class="material-icons left">remove_red_eye</i> View </a></div>
									</div>
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
						  <a class="waves-effect waves-green btn-flat" onclick="reportWrongQuestion(\'\','.$row['question_id'].');">Report</a>
						</div>
					  </div>';
				}
			}
			
		?>
		
		<div class="card-panel center">
			<h1><?php echo $questionDetails['subject_name'] . "Topics"; ?></h1>
		</div>
		
		<?php
			$result = getAllTopics(str_replace("-"," ",$questionDetails['subject_name']));
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		echo '<div class="col s12 m12 l6">
		<ul class="collection">
			<li class="collection-item avatar">
			  <i class="material-icons circle">folder</i>
			  <span class="title">'.$row['topic_name'].'</span>
			  <p><span class="chip">Total MCQS : '.getTotalQuestions($row['topic_name']).'</span>
			  </p>
			  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
			  <li class="divider"></li>
			  <li class="collection-item"> <a href="../questions/'.str_replace(" ","-",$row['topic_name']).'" class="btn '.$settings['primary_color'].'" style="width:100%;"><i class="material-icons left">logout</i>View</a></li>
			</li>
		  </ul>
		  </div>';
				}
			}
			?>
			<?php /*
					$total_records = getTotalQuestions(str_replace("-"," ",$_GET['topic']));
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li class=\"waves-effect";
					if ($page == 1) { 
						echo " disabled"; 
						echo "\"><a href='#'>".'<i class="material-icons">chevron_left</i>'."</a></li> ";
					} else {
						echo "\"><a href='view-questions.php?topic=".$_GET['topic']."&page=".($page-1)."'>".'<i class="material-icons">chevron_left</i>'."</a></li> "; // decrease 1st page 
					}					

					if($total_pages > 10) {
						for ($i=1; $i<=5; $i++) { 
							echo "<li class=\"waves-effect";
							if ($page == $i) echo " active";
							echo "\"><a href='view-questions.php?topic=".$_GET['topic']."&page=".$i."'>".$i."</a></li> "; 
						}
						echo '<li>....</li>';
						for ($i=$total_pages-4; $i<=$total_pages; $i++) { 
							echo "<li class=\"waves-effect";
							if ($page == $i) echo " active";
							echo "\"><a href='view-questions.php?topic=".$_GET['topic']."&page=".$i."'>".$i."</a></li> "; 
						}
					} else {
						for ($i=1; $i<=$total_pages; $i++) { 
							echo "<li class=\"waves-effect";
							if ($page == $i) echo " active";
							echo "\"><a href='view-questions.php?topic=".$_GET['topic']."&page=".$i."'>".$i."</a></li> "; 
						}; 
					}
					if($total_records>0)
					echo "<li class=\"waves-effect";
					if ($page == $total_pages) { 
						echo " disabled";
						echo "\"><a href='#'>".'<i class="material-icons">chevron_right</i>'."</a></li> ";	
					} else {
						echo "\"><a href='view-questions.php?topic=".$_GET['topic']."&page=".($page+1)."'>".'<i class="material-icons">chevron_right</i>'."</a></li> "; //increase one page  
					}	*/				
				?>
			</div>
	  </div>
  </div>
  
  
  <!-- Modal Structure -->
  
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
    <?php include_once("lthreefooter.php"); ?>
	
	</body>
<html>