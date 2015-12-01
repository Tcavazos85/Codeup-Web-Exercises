<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$truncate = "TRUNCATE national_parks";

$dbc->exec($truncate);

$parks = [
    ['name' => 'acadia',   'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => '47389'],
	['name' => 'arches',   'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '1284767'],
	['name' => 'badlands',   'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => '868094'],
	['name' => 'bigbend',   'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '314102'],
	['name' => 'biscayne',   'location' => 'Florida', 'date_established' => '1980-06-28', 'area_in_acres' => '525745'],
	['name' => 'canyonlands',   'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => '542231'],
	['name' => 'congaree',   'location' => 'South Carolina', 'date_established' => '2003-11-10', 'area_in_acres' => '120122'],
	['name' => 'denali',   'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => '531315'],
	['name' => 'everglades',   'location' => 'Florida', 'date_established' => '1934-05-30', 'area_in_acres' => '1110901'],
	['name' => 'glacier',   'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '2338538'],
];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";

    $dbc->exec($query);
}
