<?php 
$nouns = ['fish', 'cat','footbal','boy', 'girl', 'nuts','television', 'lemonade','candy', 'sun'];
$adjectives = ['hairy','bald','diabolical','innocent', 'colorful','raw','rank', 'fresh','tasty', 'curious'];
$nameRandom = array_rand($nouns);
$adjectivesRandom = array_rand($adjectives);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<body>
	<H1><?php echo "{$adjectives[$adjectivesRandom]} {$nouns[$nameRandom]}"; ?> </H1>
</body>
</html>