<?php

/**
 * Return the HTML code corresponding to a station
 * 
 * @param Station $station the station object from which to create the html
 * @return string the HTML code of the station
 */
function create_station($station, $highlight = false)
{
    $class = $highlight ? "highlight" : "";
    $geo = json_encode($station->geo);

    $html = "<li class=\"station card $class\" data-geo=\"$geo\" ";
    $html .=                                   "data-address=\"$station->address\" ";
    $html .=                                   "data-city=\"$station->city\" ";
    $html .=                                   "data-bikes=\"$station->bikes\" ";
    $html .=                                   "data-slots=\"$station->slots\" ";
    $html .=                                   "data-state=\"$station->state\" ";
    $html .=                                   "data-connectionstate=\"$station->connectionState\" ";
    $html .=                                   "data-tpe=\"$station->tpe\" ";
    $html .=                                   "data-name=\"$station->name\">";
    $html .=   '<span class="station-title">';
    $html .=      '<i class="fa fa-map-marker"></i>';
    $html .=        " $station->name ･ $station->city ";
    $html .=    '</span>';
    $html .= '</li>';

    return $html;
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
    $html = "<li class=\"info card\" data-property=\"$property\">";
    $html .=   '<span class="info-title">';
    $html .=      "<i class=\"fa $icon\"></i> $title";
    $html .=   '</span>';
    $html .=   "<span class=\"info-value\"></span>";
    $html .= '</li>';
    return $html;
}


function convert_to_station_object($station)
{
    return new Station($station);
}

function compare_stations_by_name($station1, $station2)
{
    $name1 = $station1->name;
    $name2 = $station2->name;
    $name_cmp = strcmp($name1, $name2);

    $city1 = $station1->city;
    $city2 = $station2->city;

    return $name_cmp != 0 ? $name_cmp : strcmp($city1, $city2);
}

function compare_stations_by_city($station1, $station2)
{
    $city1 = $station1->city;
    $city2 = $station2->city;
    $city_cmp = strcmp($city1, $city2);

    $name1 = $station1->name;
    $name2 = $station2->name;

    return $city_cmp != 0 ? $city_cmp : strcmp($name1, $name2);
}

/* 
<div class="info card">
    <span class="info-title">
        <i class="fa fa-cog"></i>
        État
    </span>
    <span class="info-value">En service</span>
</div>


*/
