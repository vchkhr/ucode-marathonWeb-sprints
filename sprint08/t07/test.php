<?php

function autoload($pClassName) {
    include(__DIR__ . "/" . $pClassName . ".php");
}

spl_autoload_register("autoload");

$heroes = new Heroes();

$heroes->find(0);

$heroes->id = 1;
$heroes->delete();

$heroes->id = 2;
$heroes->name = "new_name";
$heroes->description = "new_description";
$heroes->race = "human";
$heroes->class_role = "healer";
$heroes->save();
