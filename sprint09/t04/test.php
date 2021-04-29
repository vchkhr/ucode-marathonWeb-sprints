<?php
include("view/View.php");

$view = new View(file_get_contents("test.html"));
$view->render();
