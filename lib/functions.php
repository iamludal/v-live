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

    $html = "<div class=\"station card $class\" data-geo=\"$geo\" ";
    $html .=                                   "data-name=\"$station->name\">";
    $html .=   '<span class="station-title">';
    $html .=      '<i class="fas fa-map-marker-alt"></i>';
    $html .=        " $station->name ･ $station->city ";
    $html .=    '</span>';
    $html .=   '<span>';
    $html .=      '<i class="fas fa-check-circle"></i>';
    $html .=      ' Libres: ';
    $html .=       "<span class=\"station-bikes\">$station->bikes</span> Vélos";
    $html .=       ' | ';
    $html .=       "<span class=\"station-slots\">$station->slots</span> Emplacements";
    $html .=    '</span>';
    $html .= '</div>';

    return $html;
}
