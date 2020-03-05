<?php

require_once(__DIR__ . '/lib/functions.php');
require_once(__DIR__ . '/lib/Station.class.php');

$stations = json_decode(file_get_contents("data.json"));
// $stations = json_decode(file_get_contents("http://vlille.fil.univ-lille1.fr"));
$stations = array_map("convert_to_station_object", $stations);

$sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING, [
    "options" => [
        "default" => "name"
    ]
]);

if ($sort === 'name') $cmp_func = "compare_stations_by_name";
elseif ($sort === 'city') $cmp_func = "compare_stations_by_city";

usort($stations, $cmp_func);

require_once('views/home.php');
