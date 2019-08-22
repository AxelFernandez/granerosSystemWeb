<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Test GroceryCrud</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-static/">
	<!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<?php
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

</head>
<body >

<div style="margin-left: 5%;margin-right: 5%">
	<?php
	echo $output;
	?>
</div>
</body>
</html>
