<?php

require_once 'model.php';
require_once 'user.php';

// $user = new User();
// $user->name = 'Jerome';
// $user->email = 'jerome@jco.com';
// $user->address = '2345 Main Street';
// $user->phone = '2127777777';
// $user->city = 'San Antonio';
// $user->state = 'Texas';
// $user->zip = '78212';
// $user->save();
$user2 = User::delete(2);
$user = User::all();

var_dump($user);


