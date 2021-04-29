<?php
include("controller/ControllerInterface.php");
include("view/View.php");

class Main implements ControllerInterface {
    public $view;

    function __construct() {
        $this->view = new View(file_get_contents("main.php"));
    }

    function execute() {
        $this->view->render();
    }
}
