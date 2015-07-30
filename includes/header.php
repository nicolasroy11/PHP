<html>
<head>
	 <link rel="stylesheet" href="/style.css">
	 <title><?php echo TITLE; ?></title>
</head>
<body>
	<div id="nav">
		<ul>
			<?php foreach($navItems as $navItem) {?>
					<li><a href="<?php echo $navItem['slug'] ?>"><?php echo $navItem['title'] ?></a></li>
			<?php } ?>
		</ul>
	</div>