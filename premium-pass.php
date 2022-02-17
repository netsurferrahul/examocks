<?php
error_reporting(E_ALL);
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Best Mock Test Series for Compititive Exams prepration</title>
		<?php include_once("loneheader.php"); ?>
		 <style>
			 .margin-2 {
				 margin:0% 0% 0% 0%;
			 }
			 h1{
				font-size: 40px;
				margin: 1%;				
			 }
			 h3{
				font-size: 20px; 
				margin: 1%;
			 }
			 
			#premiumShow {
					border-radius: 20px 0px 0px 20px;
				}
			#freeShow {
				border-radius: 0px 20px 20px 0px;
			}
			.icon-color{
				color: <?php echo getColorNameToColorCode($settings['primary_color']); ?>;
			}
			
			.card .card-content p {
				background: <?php echo getColorNameToColorCode($settings['primary_color']); ?>;
				margin: 2%;
			}
			
			input[type=radio] {
				padding:2%;
			}
		 </style>
	</head>
	<body>
		<header>
			<?php include_once("lonenavbar.php"); ?>
		</header>
		<main>
			<div class="container-flex">
				<div class="row">
					<div class="col s12" style="margin-top: 20px;">
						<div class="card">
							<div class="card-content">
									<h1 class="center">One Pass for all courses & tests</h1>
									<h3 class="center">Packages made for you, no surprise fees.</h3>
									<div class="row">
										<div class="col s12 m12 l6">
											<div class="card">
												<div class="card-content">
													<a class="waves-effect waves-light <?php echo $settings['accent_color']; ?> btn-small" id="premiumShow"><i class="material-icons left">local_play</i>Premium</a>
													<a class="waves-effect waves-light btn btn-small" id="freeShow">Free</a>
													<ul class="collection">
														<li class="collection-item">Complete access to all Mock tests <i class="material-icons right icon-color">check_circle</i></li>
														<li class="collection-item">Handpicked questions <i class="material-icons right icon-color">check_circle</i></li>
														<li class="collection-item">Subject experts. One text away from you <i class="material-icons right icon-color">check_circle</i></li>
														<li class="collection-item">Detailed solutions for all exams <i class="material-icons right icon-color">check_circle</i></li>
														<li class="collection-item">Performance analysis <i class="material-icons right icon-color">check_circle</i></li>
														<li class="collection-item">Exam like interface <i class="material-icons right icon-color">check_circle</i></li>
													</li>
												</div>
											</div>
										</div>
										<div class="col s12 m12 l6">
											<div class="card">
												<div class="card-content">
													<p>
													  <label>
														<input class="with-gap" name="group1" type="radio" checked />
														<span>1 Month</span>
													  </label>
													</p>
													<p>
													  <label>
														<input class="with-gap" name="group1" type="radio" />
														<span>2 Months</span>
													  </label>
													</p>
													<p>
													  <label>
														<input class="with-gap" name="group1" type="radio" />
														<span>3 Months</span>
													  </label>
													</p>
													<p>
													  <label>
														<input  class="with-gap" name="group1" type="radio" />
														<span>6 Months</span>
													  </label>
													</p>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer>
			<?php include_once("lonefooter.php"); ?>
		</footer>
		<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_Ippb8HNhNbJpud" async> </script> </form>
	</body>
<html>