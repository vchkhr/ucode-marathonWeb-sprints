<?php
class Tower extends Building {
    private $elevator;
    private $arc_capacity;
    private $height;
    private $color;

    function getElevator() {
        return $this->elevator;
    }

    function hasElevator($val) {
        $this->elevator = $val;
    }

    function getArcCapacity() {
        return $this->arc_capacity;
    }

    function setArcCapacity($val) {
        $this->arc_capacity = $val;
    }

    function getHeight() {
        return $this->height;
    }

    function setHeight($val) {
        $this->height = $val;
    }

    function getFloorHeight() {
        return $this->height / parent::getFloors();
    }

    function setColor($val) {
        $this->color = $val;
    }

    function getColor() {
        return $this->color;
    }

    public function toString() : string {
        $props = ["Elevator : " . ($this->elevator ? "+" : "-"),
            "Arc reactor capacity : " . $this->arc_capacity,
            "Height : " . $this->height,
            "Floor height : " . $this->getFloorHeight(),
            "Color : " . $this->color,
        ];

        $str = "";

        foreach ($props as $p)
            $str = $str . $p . "\n";
        
        return parent::toString() . $str;
    }
}
