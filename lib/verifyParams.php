<?php

const METHOD = INPUT_GET;
const STATES = array("EN%20SERVICE", "HORS%20SERVICE");
const SORT_METHODS = array("name", "city");

$name = filter_input(METHOD, 'name', FILTER_SANITIZE_STRING, [
    "options" => [
        "default" => ""
    ]
]);
$names = explode(",", $name);

$city = filter_input(METHOD, 'city', FILTER_SANITIZE_STRING, [
    "options" => [
        "default" => ""
    ]
]);
$cities = explode(",", $city);

$bikes = filter_input(METHOD, 'bikes', FILTER_VALIDATE_INT, [
    "options" => [
        "default" => 0
    ]
]);

$slots = filter_input(METHOD, 'slots', FILTER_VALIDATE_INT, [
    "options" => [
        "default" => 0
    ]
]);

$state = filter_input(METHOD, 'state', FILTER_SANITIZE_STRING, [
    "options" => [
        "default" => ""
    ]
]);

if (!in_array($state, STATES)) $state = "";

$sort = filter_input(METHOD, 'sort', FILTER_SANITIZE_STRING, [
    "options" => [
        "default" => "name"
    ]
]);

if (!in_array($sort, SORT_METHODS)) $sort = "name";
