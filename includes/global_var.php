<?php
	$birth_year = year;
	$this_year = date('Y');
	$today_date = date('M jS, Y');
	$age = $this_year - $birth_year;
	define('AUTHOR', 'Nicolas O');
	$navItems = array(
					array('slug'=>'index.php','title'=>'home'),
					array('slug'=>'page2.php','title'=>'second page'),
					array('slug'=>'page3.php','title'=>'third page'),
					array('slug'=>'contact.php','title'=>'Contact')
				);
?>
