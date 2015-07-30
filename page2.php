<?php
	
//Page Initializers
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('US/Pacific');
	
//Include global variables - information that does not change regardless of current page
	include('includes/global_var.php');
	
//Page Specific Variables and Functions
	define("TITLE", "Second Page");
	include('includes/things.php');
	
//Include header (important - contains opening <body> tag)
	include('includes/header.php');
	
//Body Contents
?>
<h1>Here are some examples of things</h1>
<h2>First, abstract things and their worth</h2>
<?php 
	//This is a way of looping through associative arrays, accessing key => value pairs
	foreach($things as $thing => $attribute){ ?>
	<li><a href="thing.php?object=<?php echo $thing; ?>"><?php echo $attribute['name']; ?></a></li>
<?php } ?>

<?php
//Include footer (important - contains closing </body> tag)
	include('includes/footer.php');

?>