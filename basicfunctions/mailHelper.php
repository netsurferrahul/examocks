<?php /*
	include('../smtp/PHPMailerAutoload.php');
	include_once('class.phpmailer.php');

	require_once('class.smtp.php');
	try {
		$mail = new PHPMailer();

		// Settings
		$mail->IsSMTP();
		$mail->CharSet = 'UTF-8';

		$mail->Host       = "mail.gmail.com";    // SMTP server example
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
		$mail->Username   = "rahul.ctae94@gmail.com";            // SMTP account username example
		$mail->Password   = "Imalone@143";            // SMTP account password example

		//Recipients
		$mail->setFrom($_POST['from'], $_POST['name']);   //Add a recipient
		$mail->addAddress('support@examocks.com');            
		
		// Content
		$mail->isHTML(true); 
		$mail->Subject = $_POST['subject'];
		$mail->Body    = $_POST['body'] . "<br/><br/>" . $_POST['name'] . "<br/>" . $_POST['mobile'];
		$mail->AltBody = $_POST['body'] . "<br/><br/>" . $_POST['name'] . "<br/>" . $_POST['mobile'];

		$mail->send();
		echo "S Mail sent successfully.";
	} catch(Exception $ex) {
		echo "E Something went wrong while sending mail.";
	}
*/
?>
<?php

if ($_POST['name'] == "") {
    echo "E Please enter your name.";
} else if ($_POST['from'] == "") {
    echo "E Please enter your email.";
} else if ($_POST['subject'] == "") {
    echo "E Please enter Subject.";
} else if ($_POST['body'] == "") {
    echo "E Please enter message.";
} else if ($_POST['mobile'] == "") {
    echo "E Please enter mobile.";
} else  if (!preg_match('/^[0-9]{10}+$/', $_POST['mobile'])) {
    echo "E Please enter a valid mobile.";
} else  if (!filter_var($_POST['from'], FILTER_VALIDATE_EMAIL)) {
    echo "E Please enter a valid email.";
} else  if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
    echo "E Please enter a valid name.";
} else {
    $to      = 'support@examocks.com';
    $subject = $_POST['subject'];
    $message = $_POST['body'] . "<br/><br/>" . $_POST['name'] . "<br/>" . $_POST['mobile'];
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'To: <support@examocks.com>';
    $headers[] = 'From: '.$_POST['name'].' <'.$_POST['from'].'>';
    
    if (mail($to, $subject, $message, implode("\r\n", $headers))) {
        echo "S Mail sent successfully.";
    } else  {
        echo "E Something went wrong while sending mail.";
    }
}
?>
