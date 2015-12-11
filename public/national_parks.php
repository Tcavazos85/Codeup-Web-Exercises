<?php
require_once '../parks_test.php';
require_once '../db_connect.php';
require_once '../input.php';

$errors = [];
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
		try {
			$name = Input::getString('name');
		} catch (Exception $e) {
			$error = "Error Name " .$e->getMessage();
			array_push($errors, $error);
		}
		try {
			$location=Input::getString('location');
		} catch (Exception $e) {
			$error = "Error Location " .$e->getMessage();
			array_push($errors, $error);
		}
		try {
			$date_established= Input::getDate('date_established')->format('Y-m-d');
		} catch (Exception $e) {
			$error = "Error Date " .$e->getMessage();
			array_push($errors, $error);
		}
		try {
			$area_in_acres= Input::getString('area_in_acres');
		} catch (Exception $e) {
			$error = "Error Area " .$e->getMessage();
			array_push($errors, $error);
		}
		try {
			$description= Input::getString('description');
		} catch (Exception $e) {
			$error = "Error Description " .$e->getMessage();
			array_push($errors, $error);
		}
		if(empty($errors)){
			insertPark($dbc);
		}
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
					<?php $formName = (isset($_POST['name'])) ? $_POST['name'] : '';?>
					<input type="text" name="name" value="<?= $formName;?>">
					Location:
					<?php $formLocation = (isset($_POST['location'])) ? $_POST['location'] : '';?>
					<input type="text" name="location" value="<?= $formLocation;?>">
					Date Established: 
					<?php $formDateEst = (isset($_POST['date_established'])) ? $_POST['date_established'] : '';?>
					<input type="text" name="date_established" value="<?= $formDateEst;?>">
					Area in Acres:
					<?php $formArea = (isset($_POST['area_in_acres'])) ? $_POST['area_in_acres'] : '';?>
					<input type="text" name="area_in_acres" value="<?= $formArea;?>">
					<br>
					Description:
					<?php $formDescription = (isset($_POST['description'])) ? $_POST['description'] : '';?>
					<input type="text" name="description" value="<?= $formDescription;?>">
					<br>
					<input type="submit" name="submit">
				</form>
			</div>
			<div>
				<h3>Errors</h3>
				<?php if(!empty($errors)):?>
				<?php foreach ($errors as $key => $value):?>
					<p><?= $value ?></p>
				<?php endforeach ?>	
				<?php endif ?>
			</div>
		</div>
	</body>




</html>