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
  <title>ExaMocks | My Reported Questions</title>
  <?php include_once("loneheader.php"); ?>
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
<?php include_once("dashboardnavbar.php"); ?>
<div class="wrapper">
	<div class="row">
		<div class="col s12">
			<div class="card-panel">
				<h1><i class="material-icons left purple-text">report_problem</i>My Reported Questions</h1>
			</div>
		</div>
		<div class="col s12" style="margin-top: 20px;">
			 <div class="center">
			 <?php 
					$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$total_question = getCountUserReportedQuestion(getUserDetails($_SESSION['username'])['id']);
					$total_pages = ceil($total_question / $num_rec_per_page); 
					
					if($total_question>0)
					if ($page == 1) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons left">chevron_left</i>'." Back </a> ";
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../../questions/".$_GET['topic']."/".$_GET['topic']."-".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../questions/".$_GET['topic']."/".$_GET['topic']."-".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						}
					}					

					echo "<a href='#' class='waves-light btn-small disabled'>Page ".$page."/".$total_pages." </a> ";
					
					if($total_question>0)
					if ($page == $total_pages) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons right">chevron_right</i>'." Next </a> ";	
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../../questions/".$_GET['topic']."/".$_GET['topic']."-".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../questions/".$_GET['topic']."/".$_GET['topic']."-".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						}
					}					
				?>
			</div>
	  
	<?php
		$start_from = ($page-1) * $num_rec_per_page; 
		$result = getAllUserReportedQuestion(getUserDetails($_SESSION['username'])['id'], $start_from, $num_rec_per_page);
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
						  
				
					echo '</ul>
					<ul class="collapsible">
						<li id="ex'.$row['question_id'].'">
						  <div class="collapsible-header">Q. '.$row['question'].'</div>
						  <div class="collapsible-body" id="bd'.$row['question_id'].'">
						 
					
						 <span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'1">A) '.$row['option_a'].'</span>
						 <span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'2">B) '.$row['option_b'].'</span>
						 <span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'3">C) '.$row['option_c'].'</span>
						 <span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'4">D) '.$row['option_d'].'</span>
						';
						
						if ($row['option_e'] != "") {
							echo '<span style="display:inline-flex;height:100%;width:100%;"  id="s'.$row['question_id'].'4">E) '.$row['option_e'].'</span>';
						
						}
						echo '
						<div class="divider"></div>
						  <span>Answer Given : <b>';
						  
						  echo $ans;
						  
						  echo '</b><br/><span>Suggested Answer : <b>';
						  
						  echo $row['suggest_answer'];
						  
						  echo '</b><br/> Report Status : 
						  '.$row['resolve_status'].'
						  </span></div>
						  
						</li>
				</ul>';
			}
		}
		
	?>
	
	 <div class="center">
	 <?php 
					$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = str_replace($_GET['topic']."-","",$_GET["page"]); } else { $page=1; }; 
					$total_records = getCountUserReportedQuestion(getUserDetails($_SESSION['username'])['id']);
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					if ($page == 1) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons left">chevron_left</i>'." Back </a> ";
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../../questions/".$_GET['topic']."/".$_GET['topic']."-".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../questions/".$_GET['topic']."/".$_GET['topic']."-".($page-1)."'>".'<i class="material-icons left">chevron_left</i>'."Back </a> "; // decrease 1st page 
						}
					}					

					echo "<a href='#' class='waves-light btn-small disabled'>Page ".$page."/".$total_pages." </a> ";
					
					if($total_records>0)
					if ($page == $total_pages) { 
						echo "<a href='#' class='waves-light btn-small ".$settings['accent_color']." disabled'>".'<i class="material-icons right">chevron_right</i>'." Next </a> ";	
					} else {
						if (isset($_GET['page'])) {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../../questions/".$_GET['topic']."/".$_GET['topic']."-".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						} else {
							echo "<a class='waves-light btn-small ".$settings['accent_color']."' href='../questions/".$_GET['topic']."/".$_GET['topic']."-".($page+1)."'>".'<i class="material-icons right">chevron_right</i>'." Next</a>"; //increase one page  
						}
					}					
				?>
	</div>

		</div>
	</div>
<?php include_once("lonefooter.php"); ?>
</div>
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