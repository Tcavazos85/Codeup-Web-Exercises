<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$truncate = "TRUNCATE national_parks";

$dbc->exec($truncate);

$parks = [
    ['name' => 'acadia',   'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => '47389', 'description'=> 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes.'],
	['name' => 'arches',   'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '1284767', 'description'=> 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins.'],
	['name' => 'badlands',   'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => '868094', 'description'=> "The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world\'s richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes."],
	['name' => 'bigbend',   'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '314102', 'description'=> 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river.'],
	['name' => 'biscayne',   'location' => 'Florida', 'date_established' => '1980-06-28', 'area_in_acres' => '525745', 'description'=> 'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs.'],
	['name' => 'canyonlands',   'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => '542231', 'description'=> 'This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples.'],
	['name' => 'congaree',   'location' => 'South Carolina', 'date_established' => '2003-11-10', 'area_in_acres' => '120122', 'description'=> 'On the Congaree River, this park is the largest portion of old-growth floodplain forest left in North America. Some of the trees are the tallest in the Eastern US.'],
	['name' => 'denali',   'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => '531315', 'description'=> 'Centered around Denali, the tallest mountain in North America, Denali is serviced by a single road leading to Wonder Lake. Denali and other peaks of the Alaska Range are covered with long glaciers and boreal forest.'],
	['name' => 'everglades',   'location' => 'Florida', 'date_established' => '1934-05-30', 'area_in_acres' => '1110901', 'description'=> 'The Everglades are the largest tropical wilderness in the United States, and it encompasses a large expanse of tropical rainforest and savanna. This mangrove ecosystem and marine estuary is home to 36 protected species, including the Florida panther, American crocodile, and West Indian manatee.'],
	['name' => 'glacier',   'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '2338538', 'description'=> 'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks. There are historic hotels and a landmark road in this region of rapidly receding glaciers.'],
];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) 
    VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}','{$park['description']}')";

    $dbc->prepare($query);
    $dbc->exec($query);
}
