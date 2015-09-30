<!doctype html>
<html>
	<head>
		<title>Challenge Homework</title>
	</head>
	<body>
		<h1>GET</h1>
		<?php var_dump($_GET); ?>

		<h1>POST</h1>
		<?php var_dump($_POST); ?>

		<h2>Search</h2>
		<form method"GET" action="/forms.php">
		<p>
			<label for="search">Search &nbsp; Me</label>
			<input id="search" name="search" type="text">
			<button>Go</button>
		</p>
		</form>

		<h2>Log In</h2>
		<form method="POST" action="/forms.php">
		<p>
			<label for="username">Username</label>
			<input id="username" name="username" type="text" placeholder="type username here">
		</p>
		<p>
	        <label for="password">Password</label>
	        <input id="password" name="password" type="password" placeholder="type password">
    	</p>
    	<p>
    		<button>Log In</button>
    	</p>
		</form>

		<h2>Sign-Up</h2>
		<form method="POST" action="/forms.php">
		<p>
			<label for="first" action="/forms.php"> First Name</label>
			<input id="first" name="first" type="text">
		</p>
		<p>
			<label for="last" action="/forms.php"> Last Name </label>
			<input id="last" name="last" type="text">
		</p>
		<p>
			<label for="sign_up_username">Username</label>
			<input id="sign_up_username" name="sign_up_username" type="text" placeholder="type username here">
		</p>
		<p>
	        <label for="sign_up_password">Password</label>
	        <input id="sign_up_password" name="sign_up_password" type="password" placeholder="type password">
    	</p>
    	<p>
    		<button>Sign Up</button>
    	</p>
		</form>

		<h2>Contact Me</h2>
		<form method="POST" action="/forms.php">
		<p>
			<label for="email" action="/forms.php"> Email address</label>
			<input id="email" name="email" type="text" placeholder="example@example.com">
		</p>
		<p>
			<label for="subject" action="/forms.php"> Subject</label>
			<input id="subject" name="subject" type="text" placeholder="subject here">
		</p>
		<p>
			<textarea id="email_body" name="email_body" rows="5" cols="40" placeholder="content here"></textarea>
		</p>
		<p>
    		<button>Send</button>
    	</p>
		</form>
	</body>
</html>