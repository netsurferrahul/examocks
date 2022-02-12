<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	
	setLogoutTime($_SESSION['username']);
	
	session_destroy();
	header("Location: index.php");
	

?>