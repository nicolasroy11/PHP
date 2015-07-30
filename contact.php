<?php

//Page Initializers
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('US/Pacific');
	
//Include global variables - information that does not change regardless of current page
	include('includes/global_var.php');
	
//Page Specific Variables and Functions
	define("TITLE", "Contact");
	
//Include header (important - contains opening <body> tag)
	include('includes/header.php');
	
//Body Contents
?>

<?php
	//check for header injection attempt by looking matching an input form string to a regex
	function has_header_injection($str)
		{
			return preg_match("/[\r\n]/", $str);	//Look for a line break in case someone
													//tries to enter several emails
		}
	
	if (isset($_POST['contact-submit']))	//contact-submit is the name of the sbmit button
		{
			$name = trim($_POST['name']);	//We create values using the name attributes of each form object
			$email = trim($_POST['email']);
			$message = $_POST['msg'];
			
			//check to see if $name or $email have header injections
			if (has_header_injection($name) || has_header_injection($email))
			{
				die();
			}
			
			//check to see if name or email are empty
			if (!$name || ! $email)
			{
				echo "<h4>what's wrong with you? I need those fields</h4>";
				exit;	//Takes the form away
			}
			
			//Add the recipient email to a variable
			$mailto = "nicolasroy11@gmail.com";
			
			//Create a subject
			$subject = "$name sent you a message via your contact form.";
			
			//Construct the message
			$message = "Name: $name\r\n";	// \r\n is a line break
			$message .= "Email: $email\r\n";
			$message .= "Message: \r\n$message";
			
			//Check if the sender checked the subscribe button
			if (isset($_POST['subscribe']) && $_POST['subscribe']=="Subscribe?")
				{
					$message .= "\r\n\r\nPlease add $email to the list.\r\n";
				}
				
			$message = wordwrap($message, 72);	//Wraps the message to 72 characters per line.
			
			//set mail headers into a variable
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "From: $name <$email>\r\n";
			$headers .= "X-Priority: 1\r\n";	//makes sure this goes to inbox , not your spam
			$headers .= "X-MSMail-Priority: High\r\n\r\n";
			
			//Send the email
			mail($mailto, $subject, $message, $headers);
		}

?>

<h1>Contact me</h1>

<form method="post" action="" id="contact-form">

		<label for="name">Name</label>
		<input type="text" id="name" name="name"></input>
		
		<label for="email">Email</label>
		<input type="text" id="email" name="email"></input>
		
		<label for="message">Your message</label>
		<textarea id="message" name="msg"></textarea>
		
		<label for="subscribe">Subscribe?</label>
		<input type="checkbox" id="subscribe" name="subscribe"></input>
		
		<input type="submit" value="submit" name="contact-submit"></input>

</form>

<?php
//Include footer (important - contains closing </body> tag)
	include('includes/footer.php');

?>