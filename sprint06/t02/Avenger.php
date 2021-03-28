<?php
class Avenger {
    public $name;
    public $alias;
    public $gender;
    public $age;
    public $power;
    public $hp;

    function __construct($name, $alias, $gender, $age, $power, $hp) {
        $this->name = $name;
        $this->alias = $alias;
        $this->gender = $gender;
        $this->age = $age;
        $this->power = $power;
        $this->hp = $hp;
    }

    function __invoke() {
        echo strtoupper($this->alias) . "\n";

        foreach($this->power as $p) {
            echo $p . "\n";
        }

        echo "\n";
    }

    function __toString() {
        return "name: '$this->name'\ngender: '$this->gender'\nage: '$this->age'\n";
    }
}
