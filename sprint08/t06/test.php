<?php

function autoload($pClassName) {
    include(__DIR__ . "/" . $pClassName . ".php");
}

spl_autoload_register("autoload");

$test = new DatabaseConnection("127.0.0.1", null, "vkharchenk", "securepass", "ucode_web");
echo $test->getConnectionStatus();
