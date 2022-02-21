<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>India's Leading Govt Exam Preparation Site | Online Mock Tests</title>
		<meta name="description" content="The most trusted exam preparation Site for competitive exams. Prepare for Exams like RSMSSB, Banking, RPSC, SSC, Railways, UPSC with 2600+ Mock tests.">
		<?php include_once("loneheader.php"); ?>
		<link rel="stylesheet" href="./assets/css/custom-home.css">
		<style>
			.section {
				padding-top: 3rem;
			}
		</style>
	</head>
	<body>
	
	<?php include_once("lonenavbar.php"); ?>

	<main class="no-padding">
	<div class="section white no-pad-top">
		<div class="section <?php echo $settings['primary_color']; ?> darken-1 no-pad-bot z-depth-1 start-splash-section">
		  <div class="container start-splash-container">
			  <div class="row">
				<div class="col s12 l6">
					<div class="white-text start-splash-header-content">
						<span class="start-splash-header-text white-text">Welcome to ExaMocks</span>
						<h1 class="white-text start-header-paragraph-text" style="margin:0%;">India's Leading Govt Exam Preparation Site</h1>
						<h3 class="white-text start-header-paragraph-text">
							One place, all exams <br/> Best in class online test series platform. With Exam like interface tackle the rush of final exam before the exam.
						</h3>
						<a class="waves-effect waves-light btn modal-trigger" style="margin-bottom:10px;margin-right: 10px;margin-top:0px;" href="login"><i class="material-icons left">login</i>Login</a>
						<a class="waves-effect waves-light btn orange darken-3 modal-trigger" style="margin-bottom:10px;margin-right: 10px;margin-top:0px;" href="signup"><i class="material-icons left">personadd</i>Register</a>
					</div>
				</div>
				<div class="col s6 l3">
					<div class="splash-image-container">
						<img src="./assets/images/features-one.jpg" alt="ExaMocks Features Screenshot" class="splash-image z-depth-3">
					</div>
				</div>
				<div class="col s6 l3">
					<div class="splash-image-container">
						<img src="./assets/images/features-two.jpg" alt="ExaMocks Features Screenshot"  class="splash-image z-depth-3">
					</div>
				</div>
			  </div>
		  </div>
		</div>
	</div>

	<div class="section white darken-1" id="featuredExams">
		<div class="container">
			<div class="row">		
				<div class="col s12 m4 ">
					<h2 style="font-size:2.2rem">Popular Exams</h2>
					<span>Get exam-ready with concepts, questions and study notes as per the latest pattern</span>
				</div>
				<div class="col s12 m12 l6 center">
				<?php 
					$popular_exams = getPopularExamsList();
					if ($popular_exams->num_rows > 0) {
						while($row = $popular_exams->fetch_assoc()) {
							echo '<div class="waves-effect waves-light card-panel z-depth-3"><img src="'.$row['exam_pic'].'" alt="'.$row['exam_name'].'" class="left circle" height="40px" width="40px" style="margin-top:-10px;"><i class="material-icons right">chevron_right</i>&nbsp;&nbsp;'.$row['exam_name'].'</div>';
						}
					}
				?>
				</div>
			</div>  
		</div>
	</div>
	
	<div class="section blue darken-1" id="provisioning">
		<div class="container">
			<div class="row">	
				<h2 class="start white-text text-darken-3 center" style="font-size:2.2rem">Popular Test Series</h2>
				<?php 
					$popular_exams = getPopularExamsList();
					if ($popular_exams->num_rows > 0) {
						while($row = $popular_exams->fetch_assoc()) {		
							echo '<div class="col s12 m6 l3 ">
								<div class="card white z-depth-3">
									<div class="card-content">
										<span class="white-text"><img src="'.$row['exam_pic'].'" alt="'.$row['exam_name'].'" class="left circle" height="40px" width="40px"><span class="new badge" data-badge-caption="NEW"></span></span>
									</div>
									<div class="card-content center">
									  <h2 class="start-paragraph-text" style="margin:0;padding:0;">'.$row['exam_name'].'</h2>
									  <p style="font-size: 14px;">'.getAllMockTestsCountFromExamId($row['exam_id']).' TOTAL TESTS  | <span class="text-primarycolor">'.getFreeMockTestsCountFromExamId($row['exam_id']).' Free Tests</span></p>
									</div>
									<div class="card-action">
										<div style="margin-left:0%;" class="left"><i class="material-icons left">translate</i>'.getExamLanguagesFromExamId($row['exam_id']).'</div><br/>
									</div>
									<div class="card-action">
										<div class="left" style="margin-left:0%;">'.getTotalMocksCountFromExamId($row['exam_id']).' Mock Test</div><br/>
										<div class="left" style="margin-left:0%;">'.getTotalSubjectMocksCountFromExamId($row['exam_id']).' Subject Test</div><br/>
										<div class="left" style="margin-left:0%;">'.getTotalTopicMocksCountFromExamId($row['exam_id']).' Topic Test</div><br/>
									</div>
									<div class="card-action">
									  <a class="btn '.$settings['accent_color'].'" style="width: 100%" href="./tests/'.spacesToRealContentGetter($row['exam_name']).'">View Test Series</a>
									</div>
									
									
								</div>
							</div>';
						}
					}
				?>
			</div>  
		</div>
	</div>
	
	<div class="section white" id="features">
		<div class="container">
			<div class="row">		
				<div class="col s12 m12">
					<h2 class="start text-darken-3 center" style="font-size:2.2rem">Features for everyone</h2>
					<h4 class="start-paragraph-text center">We offer a very wide range of features, for everyone involved. The features' list is an ever-growing one, here are some of them :</h4>				
				</div>
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?> z-depth-3">
						<img class="responsive-img" src="./assets/images/high-quality.png" alt="High Quality Questions" >
						 <h3 class="white-text" style="font-size:32px;">Highest Quality Questions</h3>
						<h6 class="white-text">Questions created by highly experienced subject experts, based on latest exam pattern and updated level.
						</h6>
					</div>
				</div>
				
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?> z-depth-3">
						<img class="responsive-img" src="./assets/images/book.png" alt="Detailed solutions">
						 <h3 class="white-text" style="font-size:32px;">Detailed solutions</h3>
						<h6 class="white-text">To the point explanation for every solution including tips and methods for being time efficient.
						</h6>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?> z-depth-3">
						<img class="responsive-img" src="./assets/images/bar-graph.png" alt="Instant Analysis">
						 <h3 class="white-text" style="font-size:32px;">Instant Analysis</h3>
						<h6 class="white-text">Metrics like score, accuracy, tank and a complete analysis to improve your performance.
						</h6>
					</div>
				</div>
				
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?> z-depth-3">
						<img class="responsive-img" src="./assets/images/computer.png" alt="Gov. like exam interface">
						 <h3 class="white-text" style="font-size:32px;">Gov. like exam interface</h3>
						<h6 class="white-text">We offer a user friendly design very close to the government-like interface to help you adjust to it beforehand.
						</h6>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?> z-depth-3">
						<img class="responsive-img" src="./assets/images/translation.png" alt="Your Language">
						 <h3 class="white-text" style="font-size:32px;">Your Language</h3>
						<h6 class="white-text">Every test including solutions and notes is available in Hindi and English. Easily changeable during and after tests.
						</h6>
					</div>
				</div>
				
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?> z-depth-3">
						<img class="responsive-img" src="./assets/images/live.png" alt="Live Tests">
						 <h3 class="white-text" style="font-size:32px;">Live Tests</h3>
						<h6 class="white-text">For real time exam experience, imbuing confidence and overcoming the time management hurdle.
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section blue darken-1" id="provisioning">
		<div class="container">
			<div class="row">		
				<div class="col s12 m4 ">
					<h2 class="white-text" style="font-size:2.7rem">Why choose ExaMocks ?</h2>
				</div>
				<div class="col s6 offset-s3 m8 center">
					<div class="row"> 
						<div class="col s12 m4 ">
							<i class="medium material-icons white-text">stars</i>
							<div>
								<h3 class="text-title mb-1 white-text" style="font-size:24px;">Quality Mock Tests</h3>
								<p class="white-text"> Based on latest exam patterns with detailed time efficient solutions. </p>
							</div>
						</div>
						<div class="col s12 m4 ">
							<i class="medium material-icons white-text">looks_one</i>
							<div>
								<h3 class="text-title mb-1 white-text" style="font-size:24px;">Realtime Rank</h3>
								<p class="white-text"> Compete with thousands of students across India and view result in real-time.</p>
							</div>
						</div>
						<div class="col s12 m4 ">
							<i class="medium material-icons white-text">book</i>
							<div>
								<h3 class="text-title mb-1 white-text" style="font-size:24px;">Detailed Result Analysis</h3>
								<p class="white-text"> Time taken, weak points, comparison with top scorer and more to improve.</p>
							</div>
						</div>
					</div>
					<div class="row"> 
						<div class="col s12 m4 ">
							<i class="medium material-icons white-text">verified_user</i>
							<div>
								<h3 class="text-title mb-1 white-text" style="font-size:24px;">Trusted by</h3>
								<p class="white-text"> 10 thousands+ Students</p>
							</div>
						</div>
						<div class="col s12 m4 ">
							<i class="medium material-icons white-text">content_paste</i>
							<div>
								<h3 class="text-title mb-1 white-text" style="font-size:24px;">Tests Attempted</h3>
								<p class="white-text"> 75 thousands+</p>
							</div>
						</div>
						<div class="col s12 m4 ">
							<i class="medium material-icons white-text">help_outline</i>
							<div>
								<h3 class="text-title mb-1 white-text" style="font-size:24px;">MCQ Practiced</h3>
								<p class="white-text"> 36 lacs+ MCQs</p>
							</div>
						</div>
					</div>
				</div>
			</div>  
		</div>
	</div>
	<div class="section white" id="remotemanagement">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12">
					<h2 class="start grey-text text-darken-3 center" style="margin-bottom: 4rem;font-size:2.2rem;">Everything you need for your exam preparation</h2>
				</div>
				<div class="col s12 m3 center">
					<i class="large material-icons blue-text">book</i>
					<div>
						<h3 class="text-title mb-1" style="font-size:18px;">ONLINE COURSES</h3>
					</div>
				</div>
				<div class="col s12 m3 center">
					<i class="large material-icons orange-text">local_library</i>
					<div>
						<h3 class="text-title mb-1" style="font-size:18px;">PRACTICE PAPERS</h3>
					</div>
				</div>
				<div class="col s12 m3 center">
					<i class="large material-icons teal-text">book</i>
					<div>
						<h3 class="text-title mb-1" style="font-size:18px;">TEST SERIES</h3>
					</div>
				</div>
				<div class="col s12 m3 center">
					<i class="large material-icons pink-text">local_florist</i>
					<div>
						<h3 class="text-title mb-1" style="font-size:18px;">COMPLETE GUIDANCE</h3>
					</div>
				</div>
			</div>  
		</div>
	</div>
	<div class="section blue darken-1" id="custom">
		<div class="container">
			<div class="row">
				<div class="col s6 offset-s3 m6 center white-text">
					<h2 style="font-size:2.2rem" >Got any queries ?</h2>
					<div style="font-size: 22px;">We would love to hear you :)<br/>
					Write to us here or contact us through our email:<br/>
					</div>
					<i class="material-icons center">email</i> <a href="mailto:support@examocks.com" class="white-text"> support@examocks.com</a>
				</div><div class="col s12 m6">
					<div class="card-panel z-depth-5">
						<div class="input-field">
						  <i class="material-icons prefix">person</i>
						  <input id="name" type="text" class="validate" required>
						  <label for="name" class="active">Name</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">email</i>
						  <input id="email" type="email" class="validate" required>
						  <label for="email" class="active">Email</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">local_phone</i>
						  <input id="mobile" type="text" class="validate" required>
						  <label for="mobile" class="active">Mobile</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">menu</i>
						  <input id="subject" type="text" class="validate" required>
						  <label for="subject" class="active">Short Subject</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">message</i>
						  <textarea id="message" type="text" class="materialize-textarea validate" required></textarea>
						  <label for="message" class="active">Message</label>
						</div>
						<div class="center">
							<a class="waves-effect waves-light btn-small pink" onclick="sendMessage();" id="sendMessage"><i class="material-icons right">send</i>Send</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
 
    <div class="section white">
		<div class="container">
			<div class="col s12 m12 l12">
				<h2 class="start grey-text text-darken-3 center" style="margin-bottom: 4rem;font-size:2.2rem;">Hear it from out students</h2>
			</div>
		</div>
		<div class="container">
		  <div class="row">
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man1.png" class="circle" alt="Testimonials">
				</div>
				<div class="col s9 m8 l9">
					<blockquote>
						<p class="grey-text text-darken-3">
							"Test series is really good and as per the exam standard, Test interface is as it is as in real exam. Helped me a lot in <span style="font-weight:500;">cracking Teaching Exams</span>..."

						</p>
						<p style="font-weight:300;">Dipesh Kumawat</p>
						<div class="divider"></div>
					</blockquote>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man3.png" class="circle" alt="Testimonials">
				</div>
				<div class="col s9 m8 l9">
					<blockquote>
						<p class="grey-text text-darken-3">
							"This website is lit and really <span style="font-weight:500;">working hard for students</span>.. very very thanks to all teachers for this..."
						</p>
						<p style="font-weight:300;">Rahul Kumar</p>
						<div class="divider"></div>
					</blockquote>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man2.png" class="circle" alt="Testimonials">
				</div>
				<div class="col s9 m8 l9">
					<blockquote>
						<p class="grey-text text-darken-3">
							<span style="font-weight:500;">"Perfect</span>,Test was good. Thanks a lot for bringing such Tests..."
						</p>
						<p style="font-weight:300;">Vikash Ruhela</p>
						<div class="divider"></div>
					</blockquote>
				</div>
			</div>
		  </div>
		</div>
	</div>
</main>
   
   
    <?php include_once("lonefooter.php"); ?>
	
	</body>
<html>