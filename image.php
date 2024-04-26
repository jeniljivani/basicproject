<?php 
	
	echo "<pre>";
	print_r(@$_FILES['image']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<form method="post" enctype="multipart/form-data">
		<h4>Image</h4>
		<input type="file" name="image" multiple>

		<input type="submit" name="submit">
	</form>

</body>
</html>