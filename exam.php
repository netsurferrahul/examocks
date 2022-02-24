<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title><?php echo dashesToRealContentGetter($_GET['exam']); ?> Test Series (Free)</title>
		<meta name="description" content="<?php echo dashesToRealContentGetter($_GET['exam']); ?> Test Series. Attempt test series to check your performance and detailed analysis." >
		<?php include_once("ltwoheader.php"); ?>
		 <style>
			
			.start-paragraph-text {
				font-size: 16px;
				font-weight: 400;
				line-height: 28px;
				font-weight: bold;
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
				<div class="col s12"><a href="">Home</a><i class="tiny material-icons">chevron_right</i><?php echo dashesToRealContentGetter($_GET['exam']); ?></div>
				<div class="col s12" style="margin-top:2%">
				<?php
					if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
						$exam_details = getExamDetailsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
						if ($exam_details->num_rows > 0) {
							while($row = $exam_details->fetch_assoc()) {
								echo '<img src="../'.$row['exam_pic'].'" alt="" class="left circle" height="50px" width="50px"><h1 style="font-size:40px;">'.dashesToRealContentGetter($_GET['exam']).' Exam<a class="btn btn-small pink right" href="'.$row['notification_pdf'].'">Download Pdf</a></h1>';
							}
						}
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<main class="container">
		<div class="section light darken-1" id="provisioning">
			<div class="row">	
				<div class="col s12 m12 l8 left">
					<h3><b>About <?php echo dashesToRealContentGetter($_GET['exam']); ?></b></h3>
				</div>
				<div class="col s12 m12 l4">
				
				</div>
				
				
				<div class="col s12 m12 l8">
					<?php 
						$exam_details = getExamDetailsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
							if ($exam_details->num_rows > 0) {
								while($row = $exam_details->fetch_assoc()) {	
									echo $row['exam_description'];
							}
						}
					?>
				</div>
				<div class="col s12 m12 l4">
			
				</div>
			</div>
		</div>
		<div class="row">
			<?php /*
			if (getExamIdFromExamName(spacesToRealContentGetter($_GET['exam'])) !=0) {
				$mocks = getAllMockTestsFromExamId(getExamIdFromExamName(spacesToRealContentGetter($_GET['exam'])));
				if ($mocks->num_rows > 0) {
					while($row = $mocks->fetch_assoc()) {
						echo '<div class="col s12 m6 l3">
						  <div class="card">
							<div class="card-header '.$settings['primary_color'].' white-text center">
							  <span class="card-title ">'.$row['mock_title'].'</span>
							</div>
							<div class="card-content">
							  <p>Exam : '.$row['mock_description'].'</p>
							  <div><p style="display:inline-block"><i class="material-icons left">assignment</i>'.$row['mock_total_question'].' Questions</p>&nbsp;&nbsp;&nbsp;&nbsp;<p style="display:inline-block" class="right"><i class="material-icons left">access_time</i>'.($row['mock_total_duration']/60).' Minutes</p></div>
							</div>
							<div class="card-action">
							  <a href="../test-home/'.$row['mock_id'].'" class="btn tooltipped btn-small '.$settings['accent_color'].'" style="width:100%" data-position="bottom" data-tooltip="Login to take this mock test">';
							  if ($row['is_free'] == 0) {
								  echo '<i class="material-icons left">lock</i>';
							  }
							  
							  echo 'attempt</a>
							</div>
						  </div>
						</div>';
					}
				}
			} else {
				
			} */
			?>
			
			<?php
			
				if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
					$exam_details = getExamDetailsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
					if ($exam_details->num_rows > 0) {
						while($row = $exam_details->fetch_assoc()) {
							echo '<div class="col s12 m6 l4 right hide-on-med-and-down">
									<div class="card white z-depth-3">
										<div class="card-content">
											<span class="white-text"><img src="../'.$row['exam_pic'].'" alt="" class="left circle" height="40px" width="40px"><span class="new badge" data-badge-caption="NEW"></span></span>
										</div>
										<div class="card-content center">
										  <h2 class="start-paragraph-text" style="margin:0;padding:0;">'.$row['exam_name'].'</h2>
										  <p style="font-size: 14px;">'.getAllMockTestsCountFromExamId($row['exam_id']).' TOTAL TESTS  | <span class="green-text">'.getFreeMockTestsCountFromExamId($row['exam_id']).' Free Tests</span></p>
										</div>
										<div class="card-action">
											<div style="margin-left:0%;" class="left"><i class="material-icons left">translate</i>'.getExamLanguagesFromExamId($row['exam_id']).'</div><br/>
										</div>
										<div class="card-action">
											<div class="left" style="margin-left:0%;">'.getTotalMocksCountFromExamId($row['exam_id']).' Mock Test</div><br/>
											<div class="left" style="margin-left:0%;">'.getTotalSubjectMocksCountFromExamId($row['exam_id']).' Subject Test</div><br/>
											<div class="left" style="margin-left:0%;">'.getTotalTopicMocksCountFromExamId($row['exam_id']).' Topic Test</div><br/>
										</div>
										<div class="card-action">';
										  if (isset($_SESSION['username']) && isPremiumMember($_SESSION['username'])) {
											  if (isAlreadyExamAddedToUser($row['exam_id'], $_SESSION['username'])) {
												echo '<a class="btn '.$settings['accent_color'].' disabled" style="width: 100%" id="addToExam">Add To My Exams</a>';
											  } else {
												echo '<a class="btn '.$settings['accent_color'].'" style="width: 100%"  id="addToExam" onclick="addToMyExams('.$row['exam_id'].');">Add To My Exams</a>';  
											  }
										  } else {
											  echo '<a class="btn '.$settings['accent_color'].'" style="width: 100%" href="../premium-pass">Get Premium Pass</a>';
										  }
								echo '</div>
										
										
									</div>
								</div>';
						}
					} 
				}
				if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
					$mocks = getFreeMockTestsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
					if ($mocks->num_rows > 0) {
						while($row = $mocks->fetch_assoc()) {
							echo '<div class="col s12 m12 l8 ">
									<h2><b>Free Mock Tests</b></h2>
									<div class="card lighten-5 z-depth-3">
									  <div class="row valign-wrapper">
										<div class="col s8">
											<div class="card-content">
												<span class="white-text"><span class="new badge left" data-badge-caption="NEW" style="margin-left:0%;"></span></span>
											</div>
											<div class="card-content">
												<span class="flex black-text left">
													<h2 class="start-paragraph-text left" style="margin:0;padding:0;">'.$row['mock_title'].'</h2>
												</span>
											</div>
										</div>
										
										<div class="col s4" style="margin-right: 2%;">';
									if (isMockTestAlreadyTaken(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id'])) {
										echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../result/'.md5($row['mock_id']).'">View Solutions</a>';
									} else {
										echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../test-home/'.md5($row['mock_id']).'">Start Now</a>';
									}										
										  
									echo '</div>
									  </div>
									  
									<div class="card-action">
										<span> <i class="tiny material-icons">help_outline</i> '.$row['mock_total_question'].' Questions <i class="tiny material-icons">description</i> '.$row['mock_total_marks'].' Marks <i class="tiny material-icons">access_time</i> '.($row['mock_total_duration']/60).' Mins</span>
									</div>
									</div>
							</div>';
						}
					} 
				} else {
					// redirect to 404 error
				}
				
				
			
			?>
	</div>	
	
	<div class="row">	
		<div class="col s12 m12 l8 center">
			<h3><b>Why Take this Test Series ?</b></h3>
		</div>
		<div class="col s12 offset-s3 m12 l4">
		
		</div>
		
		<div class="col s12 m12 l8 center">
			<div class="row">
				<table class="responsive">
				<tbody>
				  <tr>
					<td class="center">
						<i class="small material-icons">stars</i>
						<div>
							<h4 class="text-title mb-1" style="font-size:14px;font-weight:bold;">All India Rank</h4>
							<p class="grey-text" style="font-size:12px;"> Compete with thousands of students across India </p>
						</div>
					</td>
					<td class="center">
						<i class="small material-icons">looks_one</i>
						<div>
							<h4 class="text-title mb-1" style="font-size:14px;font-weight:bold;">Personal recommendation</h4>
							<p class="grey-text" style="font-size:12px;"> Recommendations for you based on your strong & weak areas </p>
						</div>
					</td>
					<td class="center">
						<i class="small material-icons">book</i>
						<div>
							<h4 class="text-title mb-1" style="font-size:14px;font-weight:bold;">No.1 Quality</h4>
							<p class="grey-text" style="font-size:12px;"> Designed by experts with years of experience. Based on latest pattern</p>
						</div>
					</td>
				  </tr>
				</tbody>
			  </table>
			</div>
	    </div>
		<!--
		<div class="col s12 m12 l8 center">
			<div class="row"> 
				<div class="col s12 m4 l4">
					<i class="small material-icons">stars</i>
					<div>
						<h4 class="text-title mb-1" style="font-size:14px;font-weight:bold;">All India Rank</h4>
						<p class="grey-text" style="font-size:12px;"> Compete with thousands of students across India </p>
					</div>
				</div>
				<div class="col s12 m4 l4">
					<i class="small material-icons">looks_one</i>
					<div>
						<h4 class="text-title mb-1" style="font-size:14px;font-weight:bold;">Personal recommendation</h4>
						<p class="grey-text" style="font-size:12px;"> Recommendations for you based on your strong & weak areas </p>
					</div>
				</div>
				<div class="col s12 m4 l4">
					<i class="small material-icons">book</i>
					<div>
						<h4 class="text-title mb-1" style="font-size:14px;font-weight:bold;">No.1 Quality</h4>
						<p class="grey-text" style="font-size:12px;"> Designed by experts with years of experience. Based on latest pattern</p>
					</div>
				</div>
			</div>
		</div> -->
		<div class="col s12 m12 l4">
	
		</div>
	</div>
	<div class="row"> 
			<?php 
				if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
					$exam_details = getExamDetailsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
					if ($exam_details->num_rows > 0) {
						while($row = $exam_details->fetch_assoc()) {
							echo '<div class="col s12 m12 right hide-on-large-only">
									<div class="card white z-depth-3">
										<div class="card-content">
											<span class="white-text"><img src="../'.$row['exam_pic'].'" alt="" class="left circle" height="40px" width="40px"><span class="new badge" data-badge-caption="NEW"></span></span>
										</div>
										<div class="card-content center">
										  <h2 class="start-paragraph-text" style="margin:0;padding:0;">'.$row['exam_name'].'</h2>
										  <p style="font-size: 14px;">'.getAllMockTestsCountFromExamId($row['exam_id']).' TOTAL TESTS  | <span class="green-text">'.getFreeMockTestsCountFromExamId($row['exam_id']).' Free Tests</span></p>
										</div>
										<div class="card-action">
											<div style="margin-left:0%;" class="left"><i class="material-icons left">translate</i>'.getExamLanguagesFromExamId($row['exam_id']).'</div><br/>
										</div>
										<div class="card-action">
											<div class="left" style="margin-left:0%;">'.getTotalMocksCountFromExamId($row['exam_id']).' Mock Test</div><br/>
											<div class="left" style="margin-left:0%;">'.getTotalSubjectMocksCountFromExamId($row['exam_id']).' Subject Test</div><br/>
											<div class="left" style="margin-left:0%;">'.getTotalTopicMocksCountFromExamId($row['exam_id']).' Topic Test</div><br/>
										</div>
										<div class="card-action">';
										  if (isset($_SESSION['username']) && isPremiumMember($_SESSION['username'])) {
											  if (isAlreadyExamAddedToUser($row['exam_id'], $_SESSION['username'])) {
												echo '<a class="btn '.$settings['accent_color'].' disabled" style="width: 100%" id="addToExam">Add To My Exams</a>';
											  } else {
												echo '<a class="btn '.$settings['accent_color'].'" style="width: 100%"  id="addToExam" onclick="addToMyExams('.$row['exam_id'].');">Add To My Exams</a>';  
											  }
										  } else {
											  echo '<a class="btn '.$settings['accent_color'].'" style="width: 100%" href="../premium-pass">Get Premium Pass</a>';
										  }
								echo '</div>
										
										
									</div>
								</div>';
						}
					} 
				}
			
			?>
		
	</div>
	<div class="row">
		<div class="col s12 m12 l8 left">
			<h3><b><?php echo dashesToRealContentGetter($_GET['exam']); ?> Mock Test All Tests (<?php echo getTotalMocksCountFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam']))) + getTotalSubjectMocksCountFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam']))) + getTotalTopicMocksCountFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam']))); ?>)</b></h3>
		</div>
		<div class="col s12 m12 l4">
		
		</div>
		<div class="col s12 m12 l8">
			<ul class="tabs">
				<li class="tab col s4 active"><a  class="active" href="#mockTests">Mock Tests(<?php echo getTotalMocksCountFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam']))); ?>)</a></li>
				<li class="tab col s4"><a href="#subjectTests">Subject Tests(<?php echo getTotalSubjectMocksCountFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam']))); ?>)</a></li>
				<li class="tab col s4"><a href="#topicTests">Topic Tests(<?php echo getTotalTopicMocksCountFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam']))); ?>)</a></li>
			</ul>
			<div id="mockTests" class="col s12">
				<?php
					if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
						$mocks = getMockTestsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
						if ($mocks->num_rows > 0) {
							while($row = $mocks->fetch_assoc()) {
								echo '<div class="col s12 m12 l12 ">
										
										<div class="card lighten-5 z-depth-3">
										  <div class="row valign-wrapper">
											<div class="col s8">
												<div class="card-content">
													<span class="white-text"><span class="new badge left" data-badge-caption="NEW" style="margin-left:0%;"></span></span>
												</div>
												<div class="card-content">
													<span class="flex black-text left">
														<h2 class="start-paragraph-text left" style="margin:0;padding:0;">'.$row['mock_title'].'</h2>
													</span>
												</div>
											</div>
											
											<div class="col s4" style="margin-right: 2%;">';
											if (isMockTestAlreadyTaken(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id'])) {
												echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../result/'.md5($row['mock_id']).'">View Solutions</a>';
											} else {
												if ($row['is_free'] == 1 || strtotime(getUserDetails($_SESSION['username'])['premium_till']) > time()) {
													echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../test-home/'.md5($row['mock_id']).'">Start Now</a>';
												} else {
													echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../premium-pass"><i class="medium material-icons left">local_play</i>Start Now</a>';
												}
											}	
										echo '</div>
										  </div>
										  
										<div class="card-action">
											<span> <i class="tiny material-icons">help_outline</i> '.$row['mock_total_question'].' Questions <i class="tiny material-icons">description</i> '.$row['mock_total_marks'].' Marks <i class="tiny material-icons">access_time</i> '.($row['mock_total_duration']/60).' Mins</span>
										</div>
										</div>
								</div>';
							}
						} 
					} else {
						// redirect to 404 error
					}
			?>
			</div>
			<div id="subjectTests" class="col s12">
				<?php
					if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
						$mocks = getSubjectMockTestsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
						if ($mocks->num_rows > 0) {
							while($row = $mocks->fetch_assoc()) {
								echo '<div class="col s12 m12 l12 ">
										
										<div class="card lighten-5 z-depth-3">
										  <div class="row valign-wrapper">
											<div class="col s8">
												<div class="card-content">
													<span class="white-text"><span class="new badge left" data-badge-caption="NEW" style="margin-left:0%;"></span></span>
												</div>
												<div class="card-content">
													<span class="flex black-text left">
														<h2 class="start-paragraph-text left" style="margin:0;padding:0;">'.$row['mock_title'].'</h2>
													</span>
												</div>
											</div>
											
											<div class="col s4" style="margin-right: 2%;">';
											if (isMockTestAlreadyTaken(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id'])) {
												echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../result/'.md5($row['mock_id']).'">View Solutions</a>';
											} else {
												if ($row['is_free'] == 1 || strtotime(getUserDetails($_SESSION['username'])['premium_till']) > time()) {
													echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../test-home/'.md5($row['mock_id']).'">Start Now</a>';
												} else {
													echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../premium-pass"><i class="medium material-icons left">local_play</i>Start Now</a>';
												}
											}	
											echo '</div>
										  </div>
										  
										<div class="card-action">
											<span> <i class="tiny material-icons">help_outline</i> '.$row['mock_total_question'].' Questions <i class="tiny material-icons">description</i> '.$row['mock_total_marks'].' Marks <i class="tiny material-icons">access_time</i> '.($row['mock_total_duration']/60).' Mins</span>
										</div>
										</div>
								</div>';
							}
						} 
					} else {
						// redirect to 404 error
					}
				?>
			</div>
			<div id="topicTests" class="col s12">
				<?php
					if (getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])) !=0) {
						$mocks = getTopicMockTestsFromExamId(getExamIdFromExamName(dashesToRealContentGetter($_GET['exam'])));
						if ($mocks->num_rows > 0) {
							while($row = $mocks->fetch_assoc()) {
								echo '<div class="col s12 m12 l12 ">
										
										<div class="card lighten-5 z-depth-3">
										  <div class="row valign-wrapper">
											<div class="col s8">
												<div class="card-content">
													<span class="white-text"><span class="new badge left" data-badge-caption="NEW" style="margin-left:0%;"></span></span>
												</div>
												<div class="card-content">
													<span class="flex black-text left">
														<h2 class="start-paragraph-text left" style="margin:0;padding:0;">'.$row['mock_title'].'</h2>
													</span>
												</div>
											</div>
											
											<div class="col s4" style="margin-right: 2%;">';
											if (isMockTestAlreadyTaken(md5($row['mock_id']),getUserDetails($_SESSION['username'])['id'])) {
												echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../result/'.md5($row['mock_id']).'">View Solutions</a>';
											} else {
												if ($row['is_free'] == 1 || strtotime(getUserDetails($_SESSION['username'])['premium_till']) > time()) {
													echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../test-home/'.md5($row['mock_id']).'">Start Now</a>';
												} else {
													echo '<a class="btn btn-small '.$settings['accent_color'].' right" href="../premium-pass"><i class="medium material-icons left">local_play</i>Start Now</a>';
												}
											}	
											echo '</div>
										  </div>
										  
										<div class="card-action">
											<span> <i class="tiny material-icons">help_outline</i> '.$row['mock_total_question'].' Questions <i class="tiny material-icons">description</i> '.$row['mock_total_marks'].' Marks <i class="tiny material-icons">access_time</i> '.($row['mock_total_duration']/60).' Mins</span>
										</div>
										</div>
								</div>';
							}
						} 
					} else {
						// redirect to 404 error
					}
				?>
			</div>
		</div>
	</div>
    </main>
    <?php include_once("ltwofooter.php"); ?>
	<script>
		  document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.tooltipped');
			var instances = M.Tooltip.init(elems, {
				position : 'top'
			});
		  });
		  
		  document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.tabs');
			var instance = M.Tabs.init(elems, {});
		  });
		  
		  
	</script>
	</body>
<html>