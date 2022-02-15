<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();
	
	if (isset($_SESSION['username'])) {
		 header("Location: dashboard");
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Best RSMSSB Computer instructor(Anudeshak) Prepration Website</title>
		<?php include_once("loneheader.php"); ?>
		 
	</head>
	<body>
	
	<?php include_once("lonenavbar.php"); ?>
	
   <div class="row">
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-content white-text <?php echo $settings['primary_color']; ?> center">
          <span class="card-title">Login</span>
        </div>
        <div class="card-action">
          <p>
			<div class="row">
				<div class="input-field col s12">
				  <input id="email" type="email" class="validate" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
				  <label for="email">Email</label>
				</div>
			 </div>
			 <div class="row">
				<div class="input-field col s12">
				  <input id="password" type="password" class="validate" value="<?php if(isset($_COOKIE["user_password"])) { echo $_COOKIE["user_password"]; } ?>">
				  <label for="password">Password</label>
				</div>
			 </div>
			 <p>
			  <label>
				<input type="checkbox" id="remember" <?php if(isset($_COOKIE["user_password"])) { echo 'checked'; } ?>/>
				<span>Remember me</span>
			  </label>
			</p>
			 <div class="row center"><a class="waves-effect waves-light btn-small <?php echo $settings['accent_color']; ?>" onclick="Login()" id="signin"><i class="material-icons right">login</i>Login</a></div>
		  </p>
        </div>
      </div>
    </div>
  </div>
   
    <?php include_once("lonefooter.php"); ?>
	
	</body>
<html>