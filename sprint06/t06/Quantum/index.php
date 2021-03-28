<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Normal space</title>
</head>
<body>
    <p>
        <?php
            function calculate_time() {
                $origin = date_create("1939-01-01");
                $target = date_create("now");

                $dif_normal = date_diff($origin, $target)->format("%R%a");
                $dif = $dif_normal / 7;

                $year = intval($dif / 365);
                $month = intval(($dif - $year * 365) / 30);
                $days = intval(($dif - $year * 365) - $month * 30);

                return array($year, $month, $days);
            }

            $time = calculate_time();
            
            echo "In quantum space you were absent for " . $time[0] . " years, " . $time[1] . " months, " . $time[2] . " days!";
        ?>
    </p>
</body>
</html>
