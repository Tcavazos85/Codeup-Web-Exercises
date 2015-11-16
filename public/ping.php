<?php
function pageController()
{
	$counter = isset($_GET['counter']) ? $_GET['counter'] : 0;
		
	return array(
		'counter'	=> $counter,
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
	<h2>PING</h2>
	<h2>Counter: <?= $counter ?></h2>
	<a href="pong.php?counter=<?= $counter +1;?>"><button>HIT</button></a>
	<a href="ping.php?counter=<?= $counter = 0;?>"><button>MISS</button></a>

</body>
</html>