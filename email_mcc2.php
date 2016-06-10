<?php
require_once 'includes/page_start.php';
require_once 'includes/functions.php';
session_start();
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCCCS Email Us v2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body> 

<!-- MCCCS Email Us v2 -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->

	<?php if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
			$firstName = $_SESSION['_firstName'];
			$lastName = $_SESSION['_lastName'];
			$email = $_SESSION['_email'];
			$comment = $_SESSION['_comment'];?>
			<h1>Send us your questions or comments</h1>
			<form data-ajax="false" method="POST">
				<div data-role="fieldcontain">
					<label for="first_name">First Name</label>
					<input maxlength="50" name="first_name" id="first_name" type="text" value="<?php echo $firstName ?>">
				</div>                        
				<div data-role="fieldcontain">
					<label for="last_name">Last Name</label>
					<input maxlength="50" name="last_name" id="last_name" type="text" value="<?php echo $lastName ?>">
				</div>
				<div data-role="fieldcontain">
					<label for="email">Your Email Address</label>
					<input maxlength="80" name="email" type="email" value="<?php echo $email ?>" required>
				</div>
				<div data-role="fieldcontain">
					<label for="comment">Comment or Question</label> 
					<textarea name="comment" id="comment" value="<?php echo $comment ?>" required></textarea>
				</div>
				<input type="submit" value="Submit">
			</form>
	<?php } else {
		$emailRegex = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		$nameRegex = "/^[A-Za-z .'-]+$/";
		$errors = array();
		if (empty($_POST['first_name'])) {
			$first_name = "None Provided";
		} else {
			$firstName = $_POST['first_name'];
			if (!preg_match($nameRegex, $firstName)) {
				$errors[] = 'The first name does not appear to be valid.';
			}
			$_SESSION['_firstName'] = $firstName;
		}
		if (empty($_POST['last_name'])) {
			$last_name = "None Provided";
		} else {
			$lastName = $_POST['last_name'];
			if (!preg_match($nameRegex, $lastName)) {
				$errors[] = 'The last name does not appear to be valid.';
			}  
			$_SESSION['_lastName'] = $lastName;
		}
		if (empty($_POST['email'])) {
			$errors[] = 'You must specify an email to send a comment';
		} else {
			$email = $_POST['email'];
			if (!preg_match($emailRegex, $email)) {
				$errors[] = 'The email does not appear to be valid.';
			}  
			$_SESSION['_email'] = $email;
		}
		if (empty($_POST['comment'])) {
			$errors[] = 'You must specify a comment or question';
		} else {
			$comment = $_POST['comment'];
			$_SESSION['_comment'] = $comment;
		/* 	if (!preg_match($nameRegex, $comment)) {
				$errors[] = 'The comment does not appear to be valid.';
			}   */
		}  
		if (count($errors) === 0) {  
			$_SESSION['_firstName'] = $firstName;
			$_SESSION['_lastName'] = $lastName;
			$_SESSION['_email'] = $email;
			$message = "A message has been sent from the MCC Career Services App.\n\n" .
				"From: " . $firstName . ' ' . $lastName .  "\n" .
				"Email Address: " . $email . "\n\n" . $comment . "\n\n" .
				"Please do not reply to this message directly.\n\n";
			$fromEmail = 'CCC@MCC.net';
			$subject = "Message sent from MCC Career Services App: " . $firstName . ' ' . $lastName;
			$email_to = "skip123paschall@gmail.com"; 
			/* $email_to = "rhschuman@gmail.com"; */
			mail($email_to, $subject, $message, $fromEmail);
	?>
						<h3>Thank you for submitting your question or comment.<br>
						A Career Services Navigator will reply within two business days.</h3>
						<div>
							<a class="button" href="index.php">Return to Home Page</a>
						</div>					
	<?php
		}
		else {
	?>
						<ul class="errors">
	<?php foreach ($errors as $error) { ?>
							<li class="error"><?php echo $error; ?></li>
	<?php } ?>
						</ul>
	<?php
		}
	} ?>
		
	</div><!--closing content div-->
	<div data-role="footer" data-position="fixed" data-tap-toggle="false" data-theme="a"><!-- opening footer div-->     
		 	<p id="footer">| <a href="http://www.mccneb.edu">MCC Home</a> | <a href="http://www.mccneb.edu/careercenter/">MCC Career Services</a> | <br>
			| <a href="http://www.mccneb.edu/future/">Future MCC Student</a> | <a href="http://www.mccneb.edu/currentstudents/2resourcecenter.asp">Current MCC Students</a> | 
			<br> Metropolitan Community College<br>Copyright © 2014, All Rights Reserved. 
			</p>
	</div><!-- footer closing div -->   
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->