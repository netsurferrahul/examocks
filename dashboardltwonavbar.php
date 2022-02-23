<?php
$path = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
$file = basename($path);         // $file is set to "index.php"
$file = basename($path, ".php"); // $file is set to "index"

$state = getUserState($_SESSION['username']);
?>
	<ul id="slide-out" class="sidenav sidenav-fixed">
		<li <?php if($file == "examocks" || $file == "index" ) { echo 'class="active"';} ?>><a href="../index" class="waves-effect"><i class="material-icons left">home</i>HOME</a></li>
		<?php if(isset($_SESSION['username']))
		 {
			if ($state == 'yes') { echo '<li <?php if($file == "dashboard" ) { echo \'class="active"\';} ?><a href="../dashboard" class="waves-effect"><i class="material-icons left">dashboard</i>DASHBOARD</a></li>';}
		 }
		 ?>
        <li <?php if($file == "premium-pass" ) { echo 'class="active"';} ?>><a href="../premium-pass" class="waves-effect"><i class="material-icons left">local_play</i>PREMIUM PASS</a></li>
		<li class="divider"><li>
		<li <?php if($file == "my-exams" ) { echo 'class="active"';} ?>><a href="../my-exams" class="waves-effect"><i class="material-icons left">chrome_reader_mode</i>MY EXAMS</a></li>
		<li <?php if($file == "my-tests" ) { echo 'class="active"';} ?>><a href="../my-tests" class="waves-effect"><i class="material-icons left">content_paste</i>MY ATTEMPTED TESTS</a></li>
		<li <?php if($file == "reported-questions" ) { echo 'class="active"';} ?>><a href="../reported-questions" class="waves-effect"><i class="material-icons left">report_problem</i>REPORTED QUESTIONS</a></li>
		<li <?php if($file == "saved-questions" ) { echo 'class="active"';} ?>><a href="../saved-questions" class="waves-effect"><i class="material-icons left">bookmark</i>SAVED QUESTIONS</a></li>
        <?php if(!isset($_SESSION['username'])) { echo '<li <?php if($file == "login" ) { echo \'class="active"\';} ?><a href="../login" class="waves-effect"><i class="material-icons left">login</i>LOGIN</a></li>
        <li <?php if($file == "signup" ) { echo \'class="active"\';} ?><a href="../signup" class="waves-effect"><i class="material-icons left">personadd</i>REGISTER</a></li>';}
		?>
		 <?php if(isset($_SESSION['username']))
		 {
			echo '<li <?php if($file == "logout" ) { echo \'class="active"\';} ?><a href="../logout" class="waves-effect"><i class="material-icons left">logout</i>LOGOUT</a></li>';
		 }			 
		 ?>
	 </ul>
<nav class="container-flex navbar-fixed wrapper">
	<div class="nav-wrapper <?php echo $settings['primary_color']; ?>">&nbsp;&nbsp;&nbsp;
	  <a href="#" class="brand-logo"><img src="../assets/images/logo.png" alt="ExaMocks - Best Compititive Exams Prepration Website"/></a>
	  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

	  <ul class="right hide-on-med-and-down">
		<li <?php if($file == "examocks" || $file == "index" ) { echo 'class="active"';} ?>><a href="../index" class="waves-effect"><i class="material-icons left">home</i>HOME</a></li>
		<li <?php if($file == "premium-pass" ) { echo 'class="active"';} ?>><a href="../premium-pass" class="waves-effect"><i class="material-icons left">local_play</i>PREMIUM PASS</a></li>
		<li <?php if($file == "mocks" ) { echo 'class="active"';} ?>><a href="../mocks" class="waves-effect">MOCKS</a></li>
		<?php if(isset($_SESSION['username']))
		 {
			if ($state == 'yes') { echo '<li <?php if($file == "dashboard" ) { echo \'class="active"\';} ?><a href="../dashboard" class="waves-effect"><i class="material-icons left">dashboard</i>DASHBOARD</a></li>';}
			
			echo '<li <?php if($file == "logout" ) { echo \'class="active"\';} ?><a href="../logout" class="waves-effect"><i class="material-icons left">logout</i>LOGOUT</a></li>';
		 }			 
		 ?>
	 </ul>
	</div>
</nav>
<div class="progress" style="margin:0px;border-radius:0;display:none;" id="progress">
	<div class="indeterminate <?php echo $settings['accent_color']; ?>"></div>
</div>

