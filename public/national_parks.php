<?php
require_once '../parks_test.php';
require_once '../db_connect.php';
require_once '../input.php';


$page = Input::has('page')? Input::get('page'): 1;

$selectCount = 'SELECT count(*) FROM national_parks';

$stmt1 = $dbc->query($selectCount);

$parks1 = $stmt1->fetch();

$rows = $parks1[0];

if ($page < 1) {
	$page = 1;
}

if($page > ceil($rows/4)){
	$page= ceil($rows/4);
}

$limit = 4;

$offset = $limit * $page - $limit;

$select = "SELECT * FROM national_parks LIMIT $limit OFFSET $offset";

$stmt2 = $dbc->query($select);

$parks = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html>
	<head>
		<title>National Parks</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h1>National Parks</h1>
			<?= "You are on page $page"?>

			<table class="table table-striped text-primary">
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Date Established</th>
					<th>Area(acres)</th>
				</tr>
				<tr>
					<?php foreach($parks as $park): ?>
						<tr> 
							<td> <?= $park['name'] ?> </td>
							<td> <?= $park['location'] ?> </td>
							<td> <?= $park['date_established'] ?> </td>
							<td> <?= $park['area_in_acres'] ?> </td>
						</tr>
					<?php endforeach; ?>
				</tr>	
			</table>
			<a href="national_parks.php?page=<?= $page -1;?>"><button>Previous</button></a>
			<a href="national_parks.php?page=<?= $page +1;?>"><button>Next</button></a>
		</div>
	</body>




</html>