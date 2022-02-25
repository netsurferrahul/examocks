<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
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
		<?php echo $settings['google_adsense_code']; ?>
		<?php include_once("ltwoheader.php"); ?>
		 
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
	<?php include_once("ltwonavbar.php"); ?>
	<div class="card-panel" style="margin-top:0;">
		<div class="container">
			<div class="row">
				<div class="col s12"><a href="../index">Home</a><i class="tiny material-icons">chevron_right</i><a href="../engineering">Engineering</a><i class="tiny material-icons">chevron_right</i><a href="../computer-science">Computer Science</a><i class="tiny material-icons">chevron_right</i><?php echo str_replace("-"," ",$_GET['subject']); ?></div>
				<div class="col s12"><h1><?php echo str_replace("-"," ",$_GET['subject']); ?> MCQs</h1></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
		
		<?php
			/*$result = getAllTopics(str_replace("-"," ",$_GET['subject']));
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<div class="col s12 m4">
							  <div class="card">
							  <div class="card-title center '.$settings['primary_color'].' white-text">'.$row['topic_name'].'</div>
								<div class="card-content">
								  <p>
								  <blockquote>Total MCQS : '.getTotalQuestions($row['topic_name']).'</blockquote></p>
								</div>
								<div class="card-action '.$settings['accent_color'].'-text">
								  <a href="../view-questions/'.str_replace(" ","-",$row['topic_name']).'"><i class="material-icons left">logout</i>View</a>
								</div>
							  </div>
							</div>';
				}
			}
			*/
		?>
		
		<?php
			$result = getAllTopics(str_replace("-"," ",$_GET['subject']));
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
		
	  </div>
  </div>
  
   
    <?php include_once("ltwofooter.php"); ?>
	
	</body>
<html>