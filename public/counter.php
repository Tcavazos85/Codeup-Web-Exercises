<?php
function pageController()
{
	$counter = isset($_GET['counter']) ? $_GET['counter'] : 0;
	return array(
		'counter'=> $counter,
		);
}
extract(pageController());
?>
<!Doctype html>
<html>
<head>
	<title>Counter</title>
</head>
<body>
	<h2>Counter: <?= $counter ?></h2>
	<a href="counter.php?counter=<?= $counter +1;?>"><button>UP</button></a>
	<a href="counter.php?counter=<?= $counter -1;?>"><button>DOWN</button></a>
</body>
</html>