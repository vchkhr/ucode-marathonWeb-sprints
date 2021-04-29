<?php
class Router {
    public $params;

    function __construct() {
        $this->params = explode("?", $_SERVER["REQUEST_URI"])["1"];
        
        $this->print_params();
    }

    function print_params() {
        $res = "{";

        $arr = explode("&", $this->params);
        
        foreach($arr as $val) {
            $val = explode("=", $val);
            $res .= "'" . $val["0"] . "': '" . $val["1"] . "', ";
        }

        $res = substr($res, 0, -2) . "}";
        
        if ($res == "{'': ''}") {
            $res = "{}";
        }

        echo $res;
    }
}
