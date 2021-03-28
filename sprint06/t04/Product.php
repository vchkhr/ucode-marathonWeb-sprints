<?php
class Product {
    private $name;
    private $kcal_per_portion;

    function __construct($name, $kcal) {
        $this->name = $name;
        $this->kcal_per_portion = $kcal;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getKcal() {
        return $this->kcal_per_portion;
    }

    function setKcal($kcal) {
        $this->kcal_per_portion = $kcal;
    }
}
