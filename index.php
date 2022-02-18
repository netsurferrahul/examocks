<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Best RSMSSB Computer instructor(Anudeshak) Prepration Website</title>
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
						<h3 class="white-text start-header-paragraph-text">
							One place, all exams <br/> Best in class online test series platform. With Exam like interface tackle the rush of final exam before the exam.
						</h3>
						<a class="waves-effect waves-light btn modal-trigger" style="margin-bottom:10px;margin-right: 10px;margin-top:0px;" href="#modalBuy" onclick="buySingle()"><i class="material-icons left">login</i>Login</a>
						<a class="waves-effect waves-light btn orange darken-3 modal-trigger" style="margin-bottom:10px;margin-right: 10px;margin-top:0px;" href="#modalBuyKL" onclick="buySingleKL()"><i class="material-icons left">personadd</i>Register</a>
					</div>
				</div>
				<div class="col s6 l3">
					<div class="splash-image-container">
						<img src="./assets/images/features-one.jpg" class="splash-image">
					</div>
				</div>
				<div class="col s6 l3">
					<div class="splash-image-container">
						<img src="./assets/images/features-two.jpg" class="splash-image">
					</div>
				</div>
			  </div>
		  </div>
		</div>
	</div>

	<div class="section white" id="features">
		<div class="container">
			<div class="row">		
				<div class="col s12 m12">
					<h5 class="text-primarycolor">Features for everyone :</h5>
					<p class="start-paragraph-text">We offer a very wide range of features, for everyone involved. The features' list is an ever-growing one, here are some of them :</p>				
				</div>
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?>">
						<img class="responsive-img" src="./assets/images/high-quality.png">
						 <h3 class="white-text" style="font-size:32px;">Highest Quality Questions</h3>
						<h6 class="white-text">Questions created by highly experienced subject experts, based on latest exam pattern and updated level.
						</h6>
					</div>
				</div>
				
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?>">
						<img class="responsive-img" src="./assets/images/book.png">
						 <h3 class="white-text" style="font-size:32px;">Detailed solutions</h3>
						<h6 class="white-text">To the point explanation for every solution including tips and methods for being time efficient.
						</h6>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?>">
						<img class="responsive-img" src="./assets/images/bar-graph.png">
						 <h3 class="white-text" style="font-size:32px;">Instant Analysis</h3>
						<h6 class="white-text">Metrics like score, accuracy, tank and a complete analysis to improve your performance.
						</h6>
					</div>
				</div>
				
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?>">
						<img class="responsive-img" src="./assets/images/computer.png">
						 <h3 class="white-text" style="font-size:32px;">Gov. like exam interface</h3>
						<h6 class="white-text">We offer a user friendly design very close to the government-like interface to help you adjust to it beforehand.
						</h6>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?>">
						<img class="responsive-img" src="./assets/images/translation.png">
						 <h3 class="white-text" style="font-size:32px;">Your Language</h3>
						<h6 class="white-text">Every test including solutions and notes is available in Hindi and English. Easily changable during and after tests.
						</h6>
					</div>
				</div>
				
				<div class="col s12 m6 center">
					<div class="card-panel <?php echo $settings['accent_color']; ?>">
						<img class="responsive-img" src="./assets/images/live.png">
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
					<h3 class="white-text">Why choose ExaMocks ?</h3>
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
				</div>
			</div>  
		</div>
	</div>
	<div class="section white" id="remotemanagement">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12">
					<h3 class="start grey-text text-darken-3 center" style="margin-bottom: 4rem;">Everything you need for your exam preparation :</h3>
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
					<h3>Got any queries ?</h3>
					<div style="font-size: 22px;">We would love to hear you :)<br/>
					Write to us here or contact us through our email:<br/>
					</div>
					<div class="flex">
						<i class="material-icons white-text">email</i> <span>examocks@gmail.com</span>
					</div>
				</div><div class="col s12 m6">
					<div class="card-panel">
						<div class="input-field">
						  <i class="material-icons prefix">person</i>
						  <input id="name" type="text" class="validate">
						  <label for="name" class="active">Name</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">email</i>
						  <input id="email" type="email" class="validate">
						  <label for="email" class="active">Email</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">local_phone</i>
						  <input id="mobile" type="text" class="validate">
						  <label for="mobile" class="active">Mobile</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">menu</i>
						  <input id="subject" type="text" class="validate">
						  <label for="subject" class="active">Short Subject</label>
						</div>
						<div class="input-field">
						  <i class="material-icons prefix">message</i>
						  <textarea id="message" type="text" class="materialize-textarea validate"></textarea>
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
				<h3 class="start grey-text text-darken-3 center" style="margin-bottom: 4rem;">Hear it from out students :</h3>
			</div>
		</div>
		<div class="container">
		  <div class="row">
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man1.png" class="circle">
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
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man3.png" class="circle">
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
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man2.png" class="circle">
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