<?php
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
		if($state == 'yes') {
			header("Location: dashboard");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ExaMocks | Verify Email</title>
  <?php include_once("common.php"); ?>
  <style>
	.login-image{
		width: 100px;
		height: 100px;
	}
  </style>
</head>
<body>

<?php include_once("navbar.php"); ?>


<div class="row">
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-content white-text <?php echo $settings['primary_color']; ?> center">
          <span class="card-title">Verify Email</span>
        </div>
        <div class="card-action">
          <p>
			<div class="row">
				<div class="input-field col s12 m6 center"> 
					<p><img class="login-image" src="./assets/images/user.png" /></p>
					<p class="text-center"><b><?php echo $_SESSION['username']; ?></b></p>
				</div>
				<div class="input-field col s12 m6">
				  <input id="vcode" type="password" class="validate" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
				  <label for="vcode">Please enter the verification code</label>
				</div>
			 </div>
			 <div class="row center">
				<a class="waves-effect waves-light btn-small <?php echo $settings['accent_color']; ?>" id="resend" onclick="ResendVerificationEmail();"><i class="material-icons left">refresh</i>Resend Verification Code</a>
				<a class="waves-effect waves-light btn-small <?php echo $settings['accent_color']; ?>" id="verify" onclick="VerifyEmail();"><i class="material-icons right">send</i>Verify</a>
				</div>
		  </p>
        </div>
      </div>
    </div>
  </div>
<?php include_once("footer.php"); ?>
</body>
</html>