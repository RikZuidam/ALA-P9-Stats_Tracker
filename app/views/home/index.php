<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Item list</h1>
	<a href="create">Add an item</a>
	<table>
		<tr><td>Name</td><td>Actions</td></tr>
		<?php 
			foreach($data["items"] as $items) { ?>
				<tr>
				<td><?php echo $items["name"];?></td>
				<td><a href="detail/<?php echo $items["item_id"]?>">Details</a></td>
				</tr>
			<?php }
		?>
	</table>
</body>
</html>