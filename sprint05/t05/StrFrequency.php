<?php
class StrFrequency {
    private $str;

    function __construct($str) {
        $this->str = $str;
    }

    function letterFrequencies() {
        $up = strtoupper($this->str);
        $symbols = array();

        foreach(str_split($up) as $val) {
            if (array_key_exists($val, $symbols)) {
                $symbols[$val] = $symbols[$val] + 1;
            }
            else {
                if (ctype_alpha($val)) {
                    $symbols[$val] = 1;
                }
            }
        }

        ksort($symbols);
        
        return $symbols;
    }

    function wordFrequencies() {
        $up = strtoupper($this->str);
        $symbols = array();

        foreach(explode(" ", $up) as $val) {
            $val = preg_replace("/[^a-zA-Z]+/", "", $val);

            if (array_key_exists($val, $symbols)) {
                $symbols[$val] = $symbols[$val] + 1;
            }
            else {
                if (ctype_alpha($val)) {
                    $symbols[$val] = 1;
                }
            }
        }

        return $symbols;
    }

    function reverseString() {
        $str = preg_replace("/[^a-zA-Z\s]+/", " ", $this->str);

        $str = strrev($str);

        return $str;
    }
}
