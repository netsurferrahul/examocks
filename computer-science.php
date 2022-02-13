<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Computer Science MCQ Prepration</title>
		<?php include_once("common.php"); ?>
		 <style>
		 @media screen and (max-width: 768px) {
			#breadcrumb-show{
				display: none;
			}
		 }
		 </style>
	</head>
	<body>
	<?php include_once("navbar.php"); ?>
	<nav id="breadcrumb-show">
		<div class="nav-wrapper <?php echo $settings['primary_color']; ?>">
		  <div class="col s12">
			<a href="index" class="breadcrumb">Home</a>
			<a href="engineering" class="breadcrumb">Engineering</a>
			<a href="computer-science" class="breadcrumb">Computer Science</a>
		  </div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
		
		<?php
			$result = getAllSubjects("Computer Science");
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
								  <a href="view-topics.php?subject='.str_replace(" ","-",$row['subject_name']).'"><i class="material-icons left">logout</i>View</a>
								</div>
							  </div>
							</div>';
				}
			}
			
		?>
		
	  </div>
  </div>
  
   
    <?php include_once("footer.php"); ?>
	
	</body>
<html>