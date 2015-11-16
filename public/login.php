<?php
function pageController()
{
	session_start();
	
	if (isset($_SESSION['IS_LOGGED_IN']) && ($_SESSION['IS_LOGGED_IN'])) {
		header("Location: authorized.php");
		die();
	}

	var_dump($_POST);
	
	$name = isset($_POST['name']) ? htmlspecialchars(strip_tags($_POST['name'])) : '';
	$password = isset($_POST['password']) ? htmlspecialchars(strip_tags($_POST['password'])) : '';
    
    if(($name == "guest") && ($password == "password")){
		 $_SESSION['LOGGED_IN_USER'] = $name;
		 $_SESSION['IS_LOGGED_IN'] = true;
		 header("Location: authorized.php");
		 die();
	}

	return array(
	'name' 		=> $name,
	'password' 	=> $password
	);
}
extract(pageController());
?>
<!DOCTYPE html>
<html>
<head>
    <title>Please Log In</title>
</head>
<body>
    
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
	<?php if(($name != "guest") && ($name != '')) :?>
	<p>LOGIN Failed</p>
	<a href="login.php">Try Again</a>
	<?php endif; ?>
		
</body>
</html>