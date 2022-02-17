<?php
include_once("./db/db.php");
include("./db/basicfunctions.php");
session_start();

if (isset($_SESSION['username'])) {
	if(isset($_POST['amt'])){
		$amt=$_POST['amt'];
		$payment_status="pending";
		$added_on=date('Y-m-d h:i:s');
		if (insertPaymentIntoDb($_SESSION['username'],$amt,$payment_status,$added_on)) {
			echo getUserDetails($_SESSION['username'])['full_name'].",".$_SESSION['username'].",".getUserDetails($_SESSION['username'])['mobile_number'];
		} else {
			echo "0";
		}
	}


	if(isset($_POST['payment_id'])){
		$payment_id=$_POST['payment_id'];
		if (UpdatePaymentStatusIntoDb($payment_id, $_SESSION['username'])) {
			if (addUserMembership($payment_id,$_SESSION['username'])) {
				echo "1";
			} else {
				echo "2";
			}
			echo "3";
		} else {
			echo "0";
		}
	}
}
?>