<?php
	
//Page Initializers
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('US/Pacific');
	
//Include global variables - information that does not change regardless of current page
	include('includes/global_var.php');
	
//Page Specific Variables and Functions

	
//Include header (important - contains opening <body> tag)
	include('includes/header.php');
	
//Body Contents
?>
<p>third page</p>

<?php
//Include footer (important - contains closing </body> tag)
	include('includes/footer.php');

?>