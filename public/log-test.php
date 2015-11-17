<?php
require_once 'Log.php';

$test = new Log ();
$test->$prefix = 'cli';
var_dump($test);

