<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	$subject = getSubjectFromTopic(str_replace("-"," ",$_GET['topic']));
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - <?php echo str_replace("-"," ",$_GET['topic']); ?> MCQ Prepration</title>
		<?php include_once("lthreeheader.php"); ?>
		 
		 <style>
		 @media screen and (max-width: 768px) {
			#breadcrumb-show{
				display: none;
			}
		 }
		 </style>
	</head>
	<body>
	<?php include_once("lthreenavbar.php"); ?>
	<nav id="breadcrumb-show">
		<div class="nav-wrapper <?php echo $settings['primary_color']; ?>" style="font-size:2px;padding:0;">
		  <div class="col s12">
			<a href="../index" class="breadcrumb">Home</a>
			<a href="../engineering" class="breadcrumb">Engineering</a>
			<a href="../computer-science" class="breadcrumb">Computer Science</a>
			<a href="<?php echo '../view-topics/'.$subject; ?>" class="breadcrumb"><?php echo $subject; ?></a>
			<a href="<?php echo ''.str_replace(" ","-",$_GET['topic']); ?>" class="breadcrumb"><?php echo str_replace("-"," ",$_GET['topic']); ?></a>
		  </div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col s12" style="margin-top: 20px;">
				 <div class="center">
				 <?php 
						$num_rec_per_page=10;
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
						$total_records = getTotalQuestions(str_replace("-"," ",$_GET['topic']));
						$total_pages = ceil($total_records / $num_rec_per_page); 
						
						if($total_records>0)
						if ($page == 1) { 
							echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons left">chevron_left</i>'." Back </a> ";
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='view-questions.php?topic=".$_GET['topic']."&page=".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						}					

						echo "<a href='#' class='waves-light btn-small disabled'>Page ".$page."/".$total_pages." </a> ";
						
						if($total_records>0)
						if ($page == $total_pages) { 
							echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons right">chevron_right</i>'." Next </a> ";	
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='view-questions.php?topic=".$_GET['topic']."&page=".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						}					
					?>
				</div>
		  
		<?php
			$start_from = ($page-1) * $num_rec_per_page; 
			$result = getAllQuestions(str_replace("-"," ",$_GET['topic']), $start_from, $num_rec_per_page);
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
										<a class="waves-light btn-small red modal-trigger" href="#modal'.$row['question_id'].'"><i class="material-icons left">report_problem</i> Report Incorrect </a>
										<a class="waves-light btn-small green" onclick="saveQuestion('.$row['question_id'].')" ><i class="material-icons left">bookmark</i> Save Question </a></div>
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
						  <a class="waves-effect waves-green btn-flat" onclick="reportWrongQuestion('.$row['question_id'].');">Report</a>
						</div>
					  </div>';
				}
			}
			
		?>
		
		 <div class="center">
		 <?php 
						$num_rec_per_page=10;
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
						$total_records = getTotalQuestions(str_replace("-"," ",$_GET['topic']));
						$total_pages = ceil($total_records / $num_rec_per_page); 
						
						if($total_records>0)
						if ($page == 1) { 
							echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons left">chevron_left</i>'." Back </a> ";
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='view-questions.php?topic=".$_GET['topic']."&page=".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						}					

						echo "<a href='#' class='waves-light btn-small disabled'>Page ".$page."/".$total_pages." </a> ";
						
						if($total_records>0)
						if ($page == $total_pages) { 
							echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons right">chevron_right</i>'." Next </a> ";	
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='view-questions.php?topic=".$_GET['topic']."&page=".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						}					
					?>
		</div>
				
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