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
        
                return date_diff($origin, $target);
            }
            
            $time = calculate_time();
            
            echo "In real life you were absent for " . $time->format("%Y") . " years, " . $time->format("%m") . " months, " . $time->format("%d") . " days!";
        ?>
    </p>
</body>
</html>
