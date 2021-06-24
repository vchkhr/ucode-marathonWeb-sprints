<?php
function checkDivision($a = 1, $b = 60) {
    for ($i = $a; $i <= $b; $i++) {
        echo "The number ";
        echo $i;

        $first = false;

        if ($i % 2 == 0) {
            echo " is divisible by 2";

            $first = true;
        }
        if ($i % 3 == 0) {
            if ($first == true) {
                echo ",";
            }

            echo " is divisible by 3";

            $first = true;
        }
        if ($i % 10 == 0) {
            if ($first == true) {
                echo ",";
            }

            echo " is divisible by 10";

            $first = true;
        }

        if ($first == false) {
            echo " -";
        }

        echo "\n";
    }
}
