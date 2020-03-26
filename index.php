<?php

require_once(__DIR__ . '/lib/functions.php');
require_once(__DIR__ . '/lib/Station.class.php');
require_once(__DIR__ . '/lib/verifyParams.php');

$url = "http://vlille.fil.univ-lille1.fr";
$params = "&nbvelosdispo=$bikes&nbplacesdispo=$slots";

foreach ($names as $name)
    $params .= "&nom=" . trim($name);

foreach ($cities as $city)
    $params .= "&commune=" . trim($city);

if ($state !== "") $params .= "&etat=$state";
$url .= "?$params";

$stations = json_decode(file_get_contents($url));
$stations = array_map("convert_to_station_object", $stations);
$nbOfStations = count($stations);

if ($sort === 'name') $cmp_func = "compare_stations_by_name";
elseif ($sort === 'city') $cmp_func = "compare_stations_by_city";

usort($stations, $cmp_func);

require_once('views/home.php');
