<?php

class Station
{

    public $name, $city, $bikes, $slots, $address, $state, $geo;

    function __construct($station)
    {
        $fields = $station->fields;
        $this->name = $fields->nom;
        $this->city = ucwords(mb_strtolower($fields->commune));
        $this->bikes = $fields->nbvelosdispo;
        $this->slots = $fields->nbplacesdispo;
        $this->address = ucwords(mb_strtolower($fields->adresse));
        $this->state = ucwords(mb_strtolower($fields->etat));
        $this->geo = $fields->geo;
    }
}
