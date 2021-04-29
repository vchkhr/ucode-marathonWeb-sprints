<?php
include("ControllerInterface.php");

class Main implements ControllerInterface {
    public $view;

    function __construct() {
        include("view/View.php");

        $this->view = new View(file_get_contents("view/templates/main.html"));
    }

    function execute() {
        $this->view->render();
    }
}
