<?php
namespace Space\Normal;

function calculate_time() {
    $origin = date_create("1939-01-01");
    $target = date_create("now");

    return date_diff($origin, $target);
}
