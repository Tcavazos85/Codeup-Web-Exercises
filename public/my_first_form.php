<!doctype html>
<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<html>
<head>
	<title>My First Form</title>
</head>
<body>
	<h2>My First HTML Form</h2>
	<form method="Post" action="/my_first_form.php">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="type username here" required>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="7 digit password">
    </p>
    <p>
        <button> Log In </button>
    </p>
	</form>

	<h2>Compose An Email</h2>
		<form method="POST" action="/my_first_form.php">
		<p>
			<label for="email" action="/forms.php"> Email address</label>
			<input id="email" name="email" type="email" placeholder="example@example.com">
		</p>
		<p>
			<label for="from" action="/my_first_form.php"> From</label>
			<input id="from" name="from" type="email" placeholder="your email address here">
		</p>
		<p>
			<label for="subject" action="/my_first_form.php"> Subject</label>
			<input id="subject" name="subject" type="text" placeholder="subject here">
		</p>
		<p>
			<textarea id="email_body" name="email_body" rows="5" cols="40" placeholder="content here"></textarea>
		</p>
		<p>
    		<input type="checkbox" id="send_email" name="send_email" value="yes" checked>
    		<label for="send_email">Sign Me Up</label>
    	</p>
    	<p>
    		<button>Send</button>
    	</p>
		</form>
	<h2>Multiple Choice Test</h2>
		<form method="Post" action="/my_first_form.php"> 
			<p>Which do you prefer?</p>
				<label>
					<input type="radio" name="q1" value="beach">
				Beach
				</label>

				<label>
					<input type="radio" name="q1" value="jungle">
				Jungle
				</label>

				<label>
					<input type="radio" name="q1" value="mountain">
				Mountains
				</label>

			<p>Which is your favorite?</p>
				<label>
					<input type="radio" name="q2" value="blue">
				Blue
				</label>

				<label>
					<input type="radio" name="q2" value="red">
				Red
				</label>
				
				<label>
					<input type="radio" name="q2" value="Green">
				Green
				</label>
			<p><button>Submit</button>
			</p>
		</form>
			
		<h2>Check all that apply</h2>
		<form method="Post" action="/my_first_form.php"> 
				<label>
					<input type="checkbox" id="answer" name="answer">
				Single
				</label>

				<label>
					<input type="checkbox" id="answer" name="answer">
				Male
				</label>
				
				<label>
					<input type="checkbox" id="answer" name="answer">
				Rich
				</label>
			<p><button>Submit</button>
			</p>
		</form>
		
		<h2>Select Testing</h2>
		<form method="POST" action="/my_first_form.php">
			<label for="transmission">Do you like Star Wars?</label>
		<select id="transmission" name="transmission">
		    <option value="1">Yes</option>
		    <option value="0">No</option>
		</select>
			<button>Submit</button>
		</form>
		
		<h2>Star Wars</h2>
		<form method="POST" action="/my_first_form.php">
		<label for="os">Which Star Wars Character do you like?</label>
			<select id="os" name="os[]" multiple>
			    <option value="R2">R2-D2</option>
			    <option value="Yoda">Yoda</option>
			    <option value="Darth_Vader">Darth Vader</option>
			</select>
				<button>Submit</button>
		</form>	
</body>
</html>
