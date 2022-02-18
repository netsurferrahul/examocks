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
		<?php include_once("ltwoheader.php"); ?>
		 
		 <style>
		 @media screen and (max-width: 768px) {
			#breadcrumb-show{
				display: none;
			}
		 }
		 </style>
	</head>
	<body>
	<?php include_once("ltwonavbar.php"); ?>
	<nav id="breadcrumb-show">
		<div class="nav-wrapper <?php echo $settings['primary_color']; ?>">
		  <div class="col s12">
			<a href="../index" class="breadcrumb">Home</a>
			<a href="../engineering" class="breadcrumb">Engineering</a>
			<a href="../computer-science" class="breadcrumb">Computer Science</a>
			<a href="#" class="breadcrumb"><?php echo str_replace("-"," ",$_GET['subject']); ?></a>
		  </div>
		</div>
	</nav>
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
			  <li class="collection-item"> <a href="../view-questions/'.str_replace(" ","-",$row['topic_name']).'" class="btn '.$settings['primary_color'].'" style="width:100%;"><i class="material-icons left">logout</i>View</a></li>
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