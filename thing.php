<?php
	
//Page Initializers
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('US/Pacific');
	
//Include global variables - information that does not change regardless of current page
	include('includes/global_var.php');
	
//Page Specific Variables and Functions
	include('includes/things.php');
	if (isset($_GET['object']))
		{
			$object = $_GET['object'];
			$item = $things[$object];
			$title = $item['name'];
			$type = $item['type'];
			$worth = $item['worth'];
			define("TITLE", $title);
		}
	
	
//Include header (important - contains opening <body> tag)
	include('includes/header.php');
	
//Body Contents
?>
<h1><?php echo TITLE; ?></h1>
<p>I love <?php echo TITLE; ?>!!! It is a <?php echo $type; ?> thing worth <?php echo $worth; ?>.</p>


<?php
//Include footer (important - contains closing </body> tag)
	include('includes/footer.php');

?>