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

    return <<< HTML

    <div class="station card $class">
        <span class="station-title">
            <i class="fas fa-map-marker-alt"></i>
            $name ･ $city
        </span>
        <span>
            <i class="fas fa-check-circle"></i>
            Libres:
            <span class="station-bikes">$availableBikes</span> Vélos
            |
            <span class="station-slots">$freeSlots</span> Emplacements
        </span>
    </div>

    HTML;
}

/*
<div class="station card">
    <span class="station-title">
        <i class="fas fa-map-marker-alt"></i>
        FORT DE MONS ･ MONS EN BAROEUL
    </span>
    <span>
        <i class="fas fa-check-circle"></i>
        Libres: <span class="station-bikes">2</span> Vélos |
        <span class="station-slots">6</span> Emplacements
    </span>
</div>
*/
