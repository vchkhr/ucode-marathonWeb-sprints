<?php
class Ant {
    private $name;
    private $role;
    private $date;
    private $fights;
    private $legs;

    function __construct($name, $role, $date, $fights, $legs) {
        $this->name = $name;
        $this->role = $role;
        $this->fights = $fights;
        $this->legs = $legs;
    }

    function __serialize() {
        return [
            "name" => $this->name,
            "role_in_army" => $this->role,
            "date_of_entry" => $this->date,
            "number_of_fights" => $this->fights,
            "number_of_legs" => $this->legs,
        ];
    }

    function __wakeup() {
        echo "name: $this->name\n";
        echo "role_in_army: $this->role_in_army\n";
        echo "date_of_entry: $this->date_of_entry\n";
        echo "number_of_fights: $this->number_of_fights\n";
        echo "number_of_legs: $this->number_of_legs\n";
        
        error_reporting(0);
    }
}
