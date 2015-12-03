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

$select = "SELECT * FROM national_parks LIMIT :limit OFFSET :offset";

$stmt2 = $dbc->prepare($select);
$stmt2->bindValue(':limit', 4, PDO::PARAM_INT);
$stmt2->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt2->execute();

$parks = $stmt2->fetchAll(PDO::FETCH_ASSOC);


function insertPark($dbc)
{
	$name = Input::get('name');
	$location=Input::get('location');
	$date_established= Input::get('date_established');
	$area_in_acres= Input::get('area_in_acres');
	$description= Input::get('description');

	$query = "INSERT INTO national_parks(name, location, date_established, area_in_acres, description)
	VALUES (:name, :location, :date_established, :area_in_acres, :description)";

	$stmt3 = $dbc->prepare($query);
	$stmt3->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt3->bindValue(':location', $location, PDO::PARAM_STR);
	$stmt3->bindValue(':date_established', $date_established, PDO::PARAM_STR);
	$stmt3->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
	$stmt3->bindValue(':description', $description, PDO::PARAM_STR);
	$stmt3->execute();

}

if (!empty($_POST)){
	if(Input::notEmpty('name') &&
		Input::notEmpty('location')&&
		Input::notEmpty('date_established')&&
		Input::notEmpty('area_in_acres') &&
		Input::notEmpty('description'))
		{
			insertPark($dbc);
		} else {
		 $denied = "You cannot submit an empty form";
		}
	}
// var_dump($_POST);
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
					<th>Description</th>
				</tr>
				<tr>
					<?php foreach($parks as $park): ?>
						<tr> 
							<td> <?= $park['name'] ?> </td>
							<td> <?= $park['location'] ?> </td>
							<td> <?= $park['date_established'] ?> </td>
							<td> <?= $park['area_in_acres'] ?> </td>
							<td> <?= $park['description'] ?> </td>
						</tr>
					<?php endforeach; ?>
				</tr>	
			</table> 
				<a href="national_parks.php?page=<?= $page -1;?>"><button>Previous</button></a>
				<a href="national_parks.php?page=<?= $page +1;?>"><button>Next</button></a>
			<div>
				<?php if (isset($denied)):?>
					<h2><?= $denied?></h2> 
				<?php endif ?>
				<form action="national_parks.php" method="post">
					<br>
					Park Name:
					<input type="text" name="name">
					Location:
					<input type="text" name="location">
					Date Established: 
					<input type="text" name="date_established">
					Area in Acres:
					<input type="text" name="area_in_acres">
					<br>
					Description:
					<input type="text" name="description">
					<br>
					<input type="submit" name="submit">
				</form>
			</div>
		</div>
	</body>




</html>