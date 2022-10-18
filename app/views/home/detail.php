<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Item details</h1>
	<form action="" method="post">
		<label for="">Name: <input type="text" name="name" value="<?php echo $data["item"]["name"]?>"></label>
		<input type="submit" name="btnUpdate" value="Update">
		<input type="submit" name="btnDelete" value="Delete">
	</form>
	<a href="../../home/">Cancel</a>
</body>
</html>