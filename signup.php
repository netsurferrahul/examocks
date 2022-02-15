<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	 $color_code = "";
	 switch($settings['primary_color']) {
			case 'red': $color_code="#F44336"; break;
			case 'pink': $color_code="#E91E63"; break;
			case 'purple': $color_code="#9C27B0"; break;
			case 'deep purple': $color_code="#673AB7"; break;
			case 'indigo': $color_code="#3F51B5"; break;
			case 'blue': $color_code="#2196F3"; break;
			case 'light blue': $color_code="#03A9F4"; break;
			case 'cyan': $color_code="#00BCD4"; break;
			case 'teal': $color_code="#009688"; break;
			case 'green': $color_code="#4CAF50"; break;
			case 'light green': $color_code="#8BC34A"; break;
			case 'lime': $color_code="#CDDC39"; break;
			case 'yellow': $color_code="#FFEB3B"; break;
			case 'amber': $color_code="#FFC107"; break;
			case 'orange': $color_code="#FF9800"; break;
			case 'deep orange': $color_code="#FF5722"; break;
			case 'brown': $color_code="#795548"; break;
			case 'grey': $color_code="#9E9E9E"; break;
			case 'blue grey': $color_code="#607D8B"; break;
			
		}
		
	if (isset($_SESSION['username'])) {
		 header("Location: dashboard");
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Best RSMSSB Computer instructor(Anudeshak) Prepration Website</title>
		<?php include_once("loneheader.php"); ?>
		 <style>
			.datepicker-date-display {
				background-color: <?php echo $GLOBALS['color_code']; ?>;
			}
			
			.datepicker-table td.is-today {
				color: <?php echo $GLOBALS['color_code']; ?>;
			}
			
			.datepicker-cancel, .datepicker-clear, .datepicker-today, .datepicker-done {
				color: <?php echo $GLOBALS['color_code']; ?>;
			}
		 </style>
	</head>
	<body>
	
	<?php include_once("lonenavbar.php"); ?>

   <div class="row">
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-content white-text <?php echo $settings['primary_color']; ?> center">
          <span class="card-title">Register</span>
        </div>
        <div class="card-action">
          <p>
			<div class="row">
				<div class="input-field col s12 m6">
				  <input id="user_email" type="email" class="validate" onfocusout="checkMailExists()">
				  <label for="email">Email</label>
				  <span class="helper-text" style="visibility:hidden;" id="helper">Helper text</span>
				</div>
				<div class="input-field col s12 m6">
				  <input id="user_pass" type="password" class="validate">
				  <label for="password">Password</label>
				</div>
			 </div>
			 <div class="row">
				<div class="input-field col s12 m6">
				  <input id="user_name" type="text" class="validate">
				  <label for="name">Name</label>
				</div>
				<div class="input-field col s12 m6">
				  <input type="text" class="datepicker" id="user_dob" class="validate">
				  <label for="dob">DOB</label>
				</div>
			 </div>
			 <div class="row">
				<div class="input-field col s12 m6">
				  <label for="gender">Gender</label>
				</div>
				<div class="input-field col s12 m6">
					<div class="row">
						<div class="input-field col s12 m6">
						  <label>
							<input name="gender" type="radio" id="user_gender" checked />
							<span>Male</span>
						  </label>
						</div>
						<div class="input-field col s12 m6">
						  <label>
							<input name="gender" type="radio" id="user_gender" />
							<span>Female</span>
						  </label>
						</div>
					  </div>
				</div>
			 </div>
			 <div class="row">
				<div class="input-field col s12 m6">
				  <input id="user_mobile" type="text" class="validate" maxlength="10" onfocusout="checkMobileExists()">
				  <label for="mobile">Mobile Number</label>
				  <span class="helper-text" style="visibility:hidden;" id="mobile_helper">Helper text</span>
				</div>
				<div class="input-field col s12 m6">
					  <input type="text" class="autocomplete" id="user_state">
					  <label for="autocomplete-input">State</label>		 
				</div>
			 </div>
			 <div class="row center"><a class="waves-effect waves-light btn-small <?php echo $settings['accent_color']; ?>" onclick="register()" id="signin"><i class="material-icons right">personadd</i>Register</a></div>
		  </p>
        </div>
      </div>
    </div>
  </div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems);
  })
  
  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems, {
		data: {"Andhra Pradesh": null,
        "Haryana": 'data:image/png;base64,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',
        "Manipur": null,
        "Sikkim": null,
        "Arunachal Pradesh": null,
        "Himachal Pradesh": null,
        "Meghalaya": null,
        "Tamil Nadu": null,
        "Assam": null,
        "Bihar": null,
        "Chhattisgarh": null,
        "Goa": null,
        "Gujarat": null,
        "Jharkhand": null,
        "Karnataka": null,
        "Kerala": null,
        "Madhya Pradesh": null,
        "Maharashtra": null,
        "Mizoram": null,
        "Nagaland": null,
        "Odisha": null,
        "Punjab": null,
        "Rajasthan": 'data:image/png;base64,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',
        "Telangana": null,
        "Tripura": null,
        "Uttarakhand": null,
        "West Bengal": 'https://placehold.it/250x250',
        "Andaman and Nicobar Islands": null,
        "Dadra and Nagar Haveli and Daman & Diu": null,
        "Jammu & Kashmir": null,
        "Lakshadweep": null,
        "Chandigarh": null,
        "The Government of NCT of Delhi": null,
        "Ladakh": null,
        "Puducherry": null}
	});
  });
  </script>
  
  
    <?php include_once("lonefooter.php"); ?>
	
	</body>
<html>