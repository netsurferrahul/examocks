<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>Best Computer Science MCQ Prepration</title>
		<meta name="description" content="Prepare Best Computer Science MCQ's from various subjects <?php 
		$result = getAllSubjects("Computer Science");
		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
						echo $row['subject_name'] .", ";
				}
		}
		?> these mcq's came in previous year exams.">
		<?php include_once("loneheader.php"); ?>
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
	<?php include_once("lonenavbar.php"); ?>
	<div class="card-panel" style="margin-top:0;">
		<div class="container">
			<div class="row">
				<div class="col s12"><a href="index">Home</a><i class="tiny material-icons">chevron_right</i><a href="engineering">Engineering</a><i class="tiny material-icons">chevron_right</i>Computer Science</div>
				<div class="col s12"><h1>Computer Science MCQs</h1></div>
			</div>
		</div>
	</div>
	<main>
	<div class="container">
		<div class="row">
		
		<?php
			/*$result = getAllSubjects("Computer Science");
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<div class="col s12 m4">
							  <div class="card">
							  <div class="card-title center '.$settings['primary_color'].' white-text">'.$row['subject_name'].'</div>
								<div class="card-content">
								  <p>
								  <blockquote>Total MCQS : 2912</blockquote></p>
								</div>
								<div class="card-action '.$settings['accent_color'].'-text">
								  <a href="./view-topics/'.str_replace(" ","-",$row['subject_name']).'"><i class="material-icons left">logout</i>View</a>
								</div>
							  </div>
							</div>';
				}
			}
			*/
		?>
		<?php
			$result = getAllSubjects("Computer Science");
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		echo '<div class="col s12 m12 l6">
		<ul class="collection">
			<li class="collection-item avatar">
			  <i class="material-icons circle">folder</i>
			  <span class="title">'.$row['subject_name'].'</span>
			  <p><span class="chip">Total MCQS : 2912</span>
			  </p>
			  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
			  <li class="divider"></li>
			  <li class="collection-item"> <a href="./topic/'.str_replace(" ","-",$row['subject_name']).'" class="btn '.$settings['primary_color'].'" style="width:100%;"><i class="material-icons left">logout</i>View</a></li>
			</li>
		  </ul>
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