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
		<h1>My Favorite Things</h1>
		<table class="table table-striped">
			<thead></thead>
			
			<tbody>
				<?php foreach($things as $thing): ?>
				<tr> 
					<td> <?= $thing.PHP_EOL ?> </td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>