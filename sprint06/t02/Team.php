<?php
class Team {
    public $id;
    public $avengers;

    function __construct($id, $avengers) {
        $this->$id = $id;
        $this->avengers = $avengers;
    }

    function battle($damage) {
        foreach($this->avengers as $number => $avenger) {
            $avenger->hp -= $damage;
            
            if ($avenger->hp <= 0) {
                unset($this->avengers[$number]);
            }
        }
    }

    function calculate_losses($cloned_team) {
        $dif = count($cloned_team->avengers) - count($this->avengers);

        if ($dif == 0) {
            echo "We haven't lost anyone in this battle!\n";
        }
        else {
            echo "In this battle we lost $dif Avenger(s).\n";
        }
    }
}
