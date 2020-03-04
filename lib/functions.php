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
    $html .=   '<span>';
    $html .=      '<i class="fa fa-check-circle"></i>';
    $html .=      ' Libres: ';
    $html .=       "<span class=\"station-bikes\">$station->bikes</span> Vélos";
    $html .=       ' | ';
    $html .=       "<span class=\"station-slots\">$station->slots</span> Emplacements";
    $html .=    '</span>';
    $html .= '</div>';

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
    $html = "<div class=\"info card\" data-property=\"$property\">";
    $html .=   '<span class="info-title">';
    $html .=      "<i class=\"fa $icon\"></i> $title";
    $html .=   '</span>';
    $html .=   "<span class=\"info-value\"></span>";
    $html .= '</div>';
    return $html;
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
