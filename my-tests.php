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
				<h1><i class="material-icons left purple-text">content_paste</i>My Attempted Tests</h1>
			</div>
		</div>
		<div class="col s12" id="exams">
			<div class="card-panel">
				<?php 
				$mocks_list = getUserAttemptedTests(getUserDetails($_SESSION['username'])['id']);
				if ($mocks_list->num_rows > 0) {
					while($row = $mocks_list->fetch_assoc()) {
						echo '<div class="card lighten-5 z-depth-3">
									  <div class="row valign-wrapper">
										<div class="col s8">
											<div class="card-content">
												<span class="flex black-text left">
													<h2 class="start-paragraph-text left" style="margin:0;padding:0;font-weight:bold;">'.$row['mock_title'].'</h2>
												</span>
											</div>
										</div>
										
										<div class="col s4" style="margin-right: 2%;">';
									if (isMockTestAlreadyTaken(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id'])) {
										echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="./result/'.$row['mock_id'].'">View Solutions</a>';
									} else {
										echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="./test-home/'.$row['mock_id'].'">Start Now</a>';
									}										
										  
									echo '</div>
									  </div>
									  
									<div class="card-action">
										<span> <i class="tiny material-icons">help_outline</i> Rank '.getUserRank(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id']).'/'.getTotalAttemptsOfMock(md5($row['mock_id'])).' <i class="tiny material-icons">description</i> Marks '.json_decode(getResultAttributesFromMockId(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id']),true)['score'].'/'.getMockDetailsFromMockId(md5($row['mock_id']))['mock_total_marks'].' <i class="tiny material-icons">access_time</i> Attempted on '.date('d/m/Y',strtotime(getMockAttemptTime(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id']))).'</span>
									</div>
									</div>';
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