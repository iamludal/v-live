<?php

require_once(__DIR__ . '/lib/functions.php');
require_once(__DIR__ . '/lib/Station.class.php');
require_once(__DIR__ . '/lib/verifyParams.php');

$url = "http://vlille.fil.univ-lille1.fr";
$params = "commune=$city&nom=$name&nbvelosdispo=$bikes&nbplacesdispo=$slots&etat=$state";
$url .= "?$params";

$stations = json_decode(file_get_contents($url));
$stations = array_map("convert_to_station_object", $stations);

if ($sort === 'name') $cmp_func = "compare_stations_by_name";
elseif ($sort === 'city') $cmp_func = "compare_stations_by_city";

usort($stations, $cmp_func);

require_once('views/home.php');
