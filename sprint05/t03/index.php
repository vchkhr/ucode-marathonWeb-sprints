<?php
function firstUpper($str) {
    $str = trim($str);
    $str = strtolower($str);

    $first = ucwords(substr($str, 0, 1));

    $res = $first . substr($str, 1);

    return $res;
}
