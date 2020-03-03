<?php

/**
 * Return the HTML code corresponding to a station
 * 
 * @param string $name        the name of the station
 * @param string $city        the city of the station
 * @param int $availableBikes the number of available bikes in the station
 * @param int $freeSlots      the number of free slots in the station
 * @param bool $highlight     true if the station should be highlighted
 * @return string the HTML code of the station
 */
function create_station($name, $city, $availableBikes, $freeSlots, $highlight = false)
{
    // Convert city to Title Case
    $city = ucwords(strtolower($city));
    $class = $highlight ? "highlight" : "";

    $html = "<div class=\"station card $class\">";
    $html .=   '<span class="station-title">';
    $html .=      '<i class="fas fa-map-marker-alt"></i>';
    $html .=        " $name ･ $city ";
    $html .=    '</span>';
    $html .=   '<span>';
    $html .=      '<i class="fas fa-check-circle"></i>';
    $html .=      ' Libres: ';
    $html .=       "<span class=\"station-bikes\">$availableBikes</span> Vélos";
    $html .=       ' | ';
    $html .=       "<span class=\"station-slots\">$freeSlots</span> Emplacements";
    $html .=    '</span>';
    $html .= '</div>';

    return $html;
}
