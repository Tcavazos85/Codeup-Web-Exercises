<?php 
$things = ['football','traveling','languages','golf','beer','jazz'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>My favorite things</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
</head>
<body>
	<div class="container">
		<table class="table-striped">
			<thead>My Favorite Things</thead>
			
			<tbody>
				<?php foreach($things as $thing){ ?>
				<tr> 
					<td> <?php echo $thing.PHP_EOL ?> </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>