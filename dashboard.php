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
  <title>ExaMocks | Dashboard</title>
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
				<div class="input-field">
				  <i class="material-icons prefix">search</i>
				  <textarea id="search" class="materialize-textarea" onkeyup="searchExams();" style="height: 45px;"></textarea>
				  <label for="search">Search for your exams</label>
				</div>
			</div>
		</div>
		<div class="col s12" id="exams">
			<div class="card-panel">
				<?php 
				$top_exams = getPopularExamsList();
				if ($top_exams->num_rows > 0) {
					while($row = $top_exams->fetch_assoc()) {
						echo '<a class="waves-effect waves-light card-panel z-depth-3" href="./exam/'.implode("-",explode(" ",$row['exam_name'])).'" style="color:black;">
							<img src="'.$row['exam_pic'].'" alt="'.$row['exam_name'].'" class="left circle" height="40px" width="40px" style="margin-top:-10px;">
							<i class="material-icons right">chevron_right</i>&nbsp;&nbsp;'.$row['exam_name'].'
						</a>';
					}
				}
				
				?>
			</div>
		</div>
	</div>
<?php include_once("lonefooter.php"); ?>
</div>
	
	</body>
<html>