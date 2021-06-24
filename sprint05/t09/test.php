<?php
/*
    Task 09 (test.php)
    Task name: Overload
*/

require_once __DIR__ . "/Overload.php";
$overload = new Overload();

$overload->mark_LXXXV = "INACTIVE";
echo $overload->mark_LXXXV; // INACTIVE

echo "\n" . $overload->mark_LXXXVI; // NO DATA

if (isset($overload->mark_LXXXVI)) {
    echo "\n" . $overload->mark_LXXXVI; // NOT SET
}

unset($overload->mark_IV);

if ($overload->mark_IV == null) {
    echo "\nNULL\n"; // NULL
}
