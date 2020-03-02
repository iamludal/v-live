<?php

class Station
{

    public $name, $city, $state, $connectionState, $bikes, $slots;

    function __construct($station)
    {
        $fields = $station->fields;
        $this->name = $fields->nom;
        $this->city = $fields->commune;
        $this->state = $fields->etat;
        $this->connectionState = $fields->etatConnexion;
        $this->bikes = $fields->nbvelosdispo;
        $this->slots = $fields->nbplacesdispo;
    }
}
