<?php
require_once 'Log.php';

$test = new Log ('cli');
$test-> info('message');
$test-> error('message');
