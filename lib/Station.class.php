<?php

class Station
{

    public $name, $city, $state, $connectionState, $bikes, $slots;

    function __construct($station)
    {
        $fields = $station->fields;
        $this->name = $fields->nom;
        $this->city = ucwords(strtolower($fields->commune));
        $this->bikes = $fields->nbvelosdispo;
        $this->slots = $fields->nbplacesdispo;
        $this->address = ucwords(strtolower($fields->adresse));
        $this->state = ucwords(strtolower($fields->etat));
        $this->geo = $fields->geo;

        $connectionStates = array(
            "CONNECTED" => "En ligne",
            "DISCONNECTED" => "Hors ligne"
        );

        $tpeValues = array("AVEC TPE" => "Oui", "SANS TPE" => "Non");

        $this->connectionState = $connectionStates[$fields->etatconnexion];
        $this->tpe = $tpeValues[$fields->type];
    }
}
