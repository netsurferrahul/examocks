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
  <?php include_once("common.php"); ?>
  <style>
	.login-image{
		width: 100px;
		height: 100px;
	}
  </style>
</head>
<body>

<?php include_once("testsidenavbar.php"); ?>

<div>
	<div class="row">
		<div class="col s12 m10">
			<div class="row">
				  <div class="card" style="margin:1%">
					<div class="card-header" style="padding:1% 0% 0% 1%"><h5>PART - 1 MOCK TEST - 1</h5></div>
					<div class="card-content">
					  <p style="display:inline-block;">Sections: 
					  <span class="chip blue white-text">
						 MENTAL AND REASONING ABILITY 
					  </span>
					  <span class="chip">
						  GENERAL AWARENESS 
					  </span>
					  <span class="chip">
						  NUMERICAL ABILITY 
					  </span>
					  <span class="chip">
						  HINDI LANGUAGE 
					  </span>
					  <span class="chip">
						  ENGLISH LANGUAGE 
					  </span></p>
					  <p style="display:inline-block;" class="right">
					  <span class="chip">
						   Time Left: 00:54:10  
					  </span>
					  </p>
					  <div>
						  <p style="display:inline-block;">
							Question Type: MCQ
						  </p>
						  
						  <p style="display:inline-block;" class="right">
							   Negative marks:  <span class="chip red white-text">0.25</span>
						  </p>
						  <p style="display:inline-block;" class="right">
							Marks for correct answer:   <span class="chip green white-text">1</span>
						  </p> 
					  </div>
					  
					</div>
					<div class="card-action">
					  View In: <div  class="browser-default right">
								<select>
								  <option value="" disabled selected>Choose your option</option>
								  <option value="1">Option 1</option>
								  <option value="2">Option 2</option>
								  <option value="3">Option 3</option>
								</select>
								<label>Materialize Select</label>
							  </div>
					</div>
				  </div>
			</div>
			
			<div class="row">
				  <div class="card" style="margin:1%">
					<div class="card-header" style="padding:1% 0% 0% 1%"><a class="waves-effect waves-light btn-small disabled">Question 1</a></div>
					<div class="card-content">
					  <p style="display:inline-block;">Merchant' is related to 'Trade' in the same way as 'Doctor' is related to:</p>
					  <div>
						<p style="margin-top: 2%">
						  <label>
							<input name="group1" type="radio" checked />
							<span>Medicine</span>
						  </label>
						</p>
						<p style="margin-top: 2%">
						  <label>
							<input name="group1" type="radio" />
							<span>Prescription</span>
						  </label>
						</p>
						<p style="margin-top: 2%">
						  <label>
							<input name="group1" type="radio"  />
							<span>Healing</span>
						  </label>
						</p>
						<p style="margin-top: 2%">
						  <label>
							<input name="group1" type="radio" />
							<span>Examination</span>
						  </label>
						</p>
					  </div>
					  
					</div>
					<div class="card-action">
					  <a class="waves-light btn-small purple modal-trigger" href="#modal1"><i class="material-icons left">beenhere</i>  Mark for Review & Next </a>
					  <a class="waves-light btn-small red modal-trigger" href="#modal1"><i class="material-icons left">clear</i> Clear Response </a>
					  
					  <a class="waves-light btn-small green modal-trigger right" href="#modal1"><i class="material-icons right">navigate_next</i>Save & Next</a>
					</div>
				  </div>
			</div>
		</div>
		
		<div class="col s12 m2">

				  <ul id="slide-out" class="sidenav sidenav-fixed right">
					<li style="margin-top: 2%">
						<div class="row">
							<div class="col s12 m4">
								<span class="collection" style="border:0px; padding:0;"><span class="collection-item  avatar"> <i class="material-icons circle grey">person</i></a></span></span>
							</div>
							<div class="col s12 m8">
								<span class="black-text name center" style="line-height: normal;">RAHUL KUMAR</span>
							</div>
						</div>
					</li>
					<li><div class="divider"></div></li>
					<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
					<li><a href="#!">Second Link</a></li>
					<li><div class="divider"></div></li>
					<li><a class="subheader">Subheader</a></li>
					<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
				  </ul>
		</div>
	</div>
</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.sidenav');
			var instances = M.Sidenav.init(elems,{
				edge : "right",
				draggable: true
			});
		  });
			
	</script>
	 	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</body>
<html>