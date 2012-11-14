<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Installation Errors</title>

</head>
<body>

<h1>Citrastop installation was not sucessful.</h1>
<p>The Citrastop installation ran into a couple issues.</p>
<p><strong>Error List:</strong></p>
<ul>
<?php foreach($error_array as $error):?>
	<li><?php echo $error;?></li>
<?php endforeach;?>
</ul>

</body>
</html>