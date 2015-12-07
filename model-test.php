<?php

require_once 'model.php';

$info = new Model();
$info->name = 'Jerald';
$info->class = 'codeup';
$info->location = 'San Antonio';

echo $info->name . " is taking ".$info->class ." in ".$info->location. PHP_EOL;
