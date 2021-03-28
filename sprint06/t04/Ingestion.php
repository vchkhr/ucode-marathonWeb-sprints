<?php
class Ingestion {
    private $id;
    private $meal_type;
    private $day_of_diet;
    private $products = array();

    function __construct($meal_type, $id) {
        $this->meal_type = $meal_type;
        $this->id = $id;
    }

    function get_from_fridge($product) {
        if ($this->products[$product]->getKcal() >= 200) {
            throw new EatException("No more junk food, dumpling");
        }

        unset($this->products[$product]);
    }

    function setProduct($product) {
        $this->products += [$product->getName() => $product];
    }

    function getProducts() {
        return $this->products;
    }
}
