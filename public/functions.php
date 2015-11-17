<?php

function inputHasKey($key){ 
	 return isset($_REQUEST[$key]);
	
}

function inputGetKey($key, $default = ''){
	return (inputHasKey($key))? $_REQUEST[$key]: $default;
}

function escape($string){
	
		return htmlspecialchars(strip_tags($string));
}	


?>