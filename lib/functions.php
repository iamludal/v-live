<?php

/**
 * Return the HTML code corresponding to a station
 * 
 * @param Station $station the station object from which to create the html
 * @return string the HTML code of the station
 */
function create_station($station)
{
    $geo = json_encode($station->geo);

    return <<<HTML
    <li class="station card" data-geo="$geo" data-address="{$station->address}"
                        data-bikes="{$station->bikes}" data-slots="{$station->slots}"
                        data-state="{$station->state}" data-name="{$station->name}">
        <span class="station-title">
            <i class="fa fa-map-farker"></i>
            <strong>{$station->bikes}V | {$station->slots}P</strong>
            {$station->name} ･ {$station->city}
        </span>
    </li>
HTML;
}

/**
 * Create the HTML code corresponding to an information
 * 
 * @param string $icon the icon to use (font awesome)
 * @param string $property the property of the information
 * @param string $title the title of the information
 * @return string the HTML code corresponding to the station
 */
function create_info($icon, $property, $title)
{
    return <<<HTML
    <li class="info card" data-property="$property">
        <span class="info-title">
            <i class="fa $icon"></i> $title
        </span>
        <span class="info-value"><span>
    </li>
HTML;
}

/**
 * Convert a station response into a station object (of Station class)
 * 
 * @param string $station the station to convert
 * @param Station the station object
 */
function convert_to_station_object($station)
{
    return new Station($station);
}

/**
 * Compare 2 stations by their name
 * 
 * @param Station $station1 the first station
 * @param Station $station2 the second station
 * @return int an integer, < 0 if the name of the first station if smaller than
 * the second one, > 0 otherwise. Return 0 if they are the same
 */
function compare_stations_by_name($station1, $station2)
{
    $name1 = $station1->name;
    $name2 = $station2->name;
    $name_cmp = strcmp($name1, $name2);

    $city1 = $station1->city;
    $city2 = $station2->city;

    return $name_cmp != 0 ? $name_cmp : strcmp($city1, $city2);
}

/**
 * Compare 2 stations by their city
 * 
 * @param Station $station1 the first station
 * @param Station $station2 the second station
 * @return int an integer, < 0 if the city of the first station if smaller than
 * the second one, > 0 otherwise. Return 0 if they are the same
 */
function compare_stations_by_city($station1, $station2)
{
    $city1 = $station1->city;
    $city2 = $station2->city;
    $city_cmp = strcmp($city1, $city2);

    $name1 = $station1->name;
    $name2 = $station2->name;

    return $city_cmp != 0 ? $city_cmp : strcmp($name1, $name2);
}
