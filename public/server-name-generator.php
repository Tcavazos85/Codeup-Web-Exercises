<?php 
function pageController()
{
	$nouns = ['fish', 'cat','footballs','boy', 'girl', 'nuts','television', 'lemonade','candy', 'sun'];
	$adjectives = ['hairy','bald','diabolical','innocent', 'colorful','raw','rank', 'fresh','tasty', 'curious'];
	$nameRandom = array_rand($nouns);
	$adjectivesRandom = array_rand($adjectives);

	return array(
		'nouns' 			=> $nouns,
		'adjectives' 		=> $adjectives,
		'nameRandom' 		=> $nameRandom,
		'adjectivesRandom' 	=> $adjectivesRandom
	);
}
extract(pageController());

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Server Name Generator</title>

	</head>
	<body>
		<H1><?= "{$adjectives[$adjectivesRandom]} {$nouns[$nameRandom]}"; ?> </H1>
	</body>
</html>