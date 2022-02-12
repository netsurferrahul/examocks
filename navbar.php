<?php
$path = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
$file = basename($path);         // $file is set to "index.php"
$file = basename($path, ".php"); // $file is set to "index"

$state = getUserState($_SESSION['username']);
?>

<div class="navbar-fixed">
	<nav>
    <div class="nav-wrapper <?php echo $settings['primary_color']; ?>">&nbsp;&nbsp;&nbsp;
      <a href="#" class="brand-logo"><img src="./assets/images/logo.png" alt="ExaMocks - Best Compititive Exams Prepration Website" style="height:55px;"/></a>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li <?php if($file == "examocks" || $file == "index" ) { echo 'class="active"';} ?>><a href="index" class="waves-effect"><i class="material-icons left">home</i>HOME</a></li>
        <li <?php if($file == "computer-scinece" ) { echo 'class="active"';} ?>><a href="computer-scinece" class="waves-effect">COMPUTER SCIENCE</a></li>
        <?php if(!isset($_SESSION['username'])) { echo '<li <?php if($file == "login" ) { echo \'class="active"\';} ?><a href="login" class="waves-effect"><i class="material-icons left">login</i>LOGIN</a></li>
        <li <?php if($file == "signup" ) { echo \'class="active"\';} ?><a href="signup" class="waves-effect"><i class="material-icons left">personadd</i>REGISTER</a></li>';}
		?>
		 <?php if(isset($_SESSION['username']))
		 {
			if ($state == 'yes') { echo '<li <?php if($file == "dashboard" ) { echo \'class="active"\';} ?><a href="dashboard" class="waves-effect"><i class="material-icons left">dashboard</i>DASHBOARD</a></li>';}
			
			echo '<li <?php if($file == "logout" ) { echo \'class="active"\';} ?><a href="logout" class="waves-effect"><i class="material-icons left">logout</i>LOGOUT</a></li>';
		 }			 
		 ?>
      </ul>
    </div>
  </nav>
  </div>
  
		<div class="progress" style="margin:0px;border-radius:0;display:none;" id="progress">
			<div class="indeterminate <?php echo $settings['accent_color']; ?>"></div>
		</div>
		
	<ul id="slide-out" class="sidenav">
		<li <?php if($file == "examocks" || $file == "index" ) { echo 'class="active"';} ?>><a href="index" class="waves-effect"><i class="material-icons left">home</i>HOME</a></li>
        <li <?php if($file == "computer-scinece" ) { echo 'class="active"';} ?>><a href="computer-scinece" class="waves-effect"><i class="material-icons left">book</i>COMPUTER SCIENCE</a></li>
        <?php if(!isset($_SESSION['username'])) { echo '<li <?php if($file == "login" ) { echo \'class="active"\';} ?><a href="login" class="waves-effect"><i class="material-icons left">login</i>LOGIN</a></li>
        <li <?php if($file == "signup" ) { echo \'class="active"\';} ?><a href="signup" class="waves-effect"><i class="material-icons left">personadd</i>REGISTER</a></li>';}
		?>
		 <?php if(isset($_SESSION['username']))
		 {
			if ($state == 'yes') { echo '<li <?php if($file == "dashboard" ) { echo \'class="active"\';} ?><a href="dashboard" class="waves-effect"><i class="material-icons left">dashboard</i>DASHBOARD</a></li>';}
			
			echo '<li <?php if($file == "logout" ) { echo \'class="active"\';} ?><a href="logout" class="waves-effect"><i class="material-icons left">logout</i>LOGOUT</a></li>';
		 }			 
		 ?>
	 </ul>