<?php
//Page Initializers
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('US/Pacific');

$servername = "localhost";
$username = "root";
$password = "root";
$db = "nickdontcare";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{echo "Connected successfully";}

//mysqli_select_db($conn, $db) or die("Unable to select database");

$query = "show tables";
$results = mysqli_query($conn, $query) or die(mysql_error());;
var_dump($results);

//Include global variables - information that does not change regardless of current page
	include('includes/global_var.php');
	
//Page Specific Variables and Functions
	define("TITLE", "PHP Test Page 1");
	$name = 'Nicolas';
	$fave_foods = array("sushi", "poutine", "your mom");
	$nick = array('name' => 'Nicolas Roy', 'age' => 38, 'occupation' => 'engineer');
	$jobs = array(
				array('name'=>'Orbit','years_worked'=>'1'),
				array('name'=>'GCS','years_worked'=>'1'),
				array('name'=>'Universal','years_worked'=>'1.5')
				);
	function enumfoods()
		{
			global $fave_foods;	//without this, $fave_foods is undeclared in the scope of the function
								//the array can also be passed in as an argument.
			foreach ($fave_foods as $fave_food)
			{
				echo "I love $fave_food,<br>";
			}
		}
		
	function enumjobs()
		{
			global $jobs;
			foreach ($jobs as $job)
			{
				echo "I worked at " . $job['name'] . " for " . $job['years_worked'] . " year,<br>";
			}
		}
	
//Include header (important - contains opening <body> tag)
	include('includes/header.php');
	
//Body Contents
?>
<div class='quote'>My name is <?php echo $name; ?>, <br>and I am <?php echo $age; ?>.</div>
	My full name is <?php echo $nick['name']; ?><br>
	Today's date is <?php echo $today_date; ?>. <br>
	<?php
		enumfoods();
		enumjobs();
	
	if ($jobs[2]['name'] == 'Universal')
		{
			echo "Yes, the third job was Universal.";
		}
	elseif($jobs[2]['name'] == 'GCS')
		{
			echo "Yes, the third job was GCS.";
		}
	else echo "nothing matched.";
	?>
	<p>end of index body content</p>

<?php
//Include footer (important - contains closing </body> tag)
	include('includes/footer.php');
?>

