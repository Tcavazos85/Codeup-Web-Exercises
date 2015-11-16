<?php 
	session_start();

	if(!$_SESSION['IS_LOGGED_IN']){
		header("Location: login.php");
		die();
	}
	
	$LOGGED_IN_USER = $_SESSION['LOGGED_IN_USER']; 
	var_dump($LOGGED_IN_USER);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>AUTHORIZED</h1>
	<p> USER LOGGED IN = <?= $LOGGED_IN_USER ?></p>
	<a href="logout.php"><button>LOGOUT</button></a>
</body>
</html>