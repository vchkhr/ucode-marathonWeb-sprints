<?php
    function getCSV($csv) {
        $output = "<table>";
    
        for ($i = 0; $i < sizeof($csv); $i++) {
            $output .= "<tr>";
    
            for ($j = 0; $j < sizeof($csv[$i]); $j++) {
                $output .= "<td>";
    
                if ($i == 0) {
                    $output .= "
                        <form action=\"index.php\" method=\"get\">
                            <input class=\"hidden\" name=\"filterBy\" type=\"text\" value=\"" . $j . "\">
                            <input type=\"submit\" value=\"" . $csv[$i][$j] . "\">
                        </form>
                    ";
                } else {
                    $output .= $csv[$i][$j];
                }
    
                $output .= "</td>";
            }
    
            $output .= "</tr>";
        }
    
        return $output . "</table>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>07/05 WhoIsWho</title>

    <style>
        table, td {
            border: 1px solid black;
        }

        form {
            margin: 10px 0;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Parsing CSV data</h1>

    <form enctype="multipart/form-data" action="index.php" method="post">
        <label for="file">Upload file:</label>
        <input type="file" name="file">
        <input type="submit" id="upload" value="Upload">
    </form>

    <form action="index.php" method="post">
        <label for="filter">Filer:</label>

        <select name="filter" id="filter">
            <?php
                if ($_GET) {
                    $filename = "buf.csv";
                    $file = fopen($filename, "r");
                    $fullCSV = [];

                    while (($csv = fgetcsv($file))) {
                        array_push($fullCSV, $csv);
                    }

                    fclose($file);

                    $column = $_GET["filterBy"];
                    $options = [];

                    for ($i = 1; $i < sizeof($fullCSV) - 1; $i++) {
                        if (!in_array($fullCSV[$i][$column], $options)) {
                            array_push($options, $fullCSV[$i][$column]);
                        }
                    }

                    foreach ($options as $option) {
                        echo "<option value=\"" . $option . "_" . $column . "\">" . $option . "</option>";
                    }

                } else {
                    echo "<option value=\"NOT SELECTED\">NOT SELECTED</option>";
                }
            ?>
        </select>

        <input type="submit" value="APPLY">
    </form>

    <?php
        if ($_FILES && isset($_FILES["file"])) {
            $ext = explode(".", $_FILES["file"]['name']);
            $ext = array_pop($ext);

            if ($ext != "csv") {
                echo "Uploaded file is not CSV!";
                unset($_POST);

                return;
            }

            $filename = $_FILES["file"]["tmp_name"];

            $file = fopen($filename, "r");
            $fullCSV = [];

            while (($csv = fgetcsv($file))) {
                array_push($fullCSV, $csv);
            }

            fclose($file);

            $file = fopen($filename, "r");
            $temp = fopen("buf.csv", "c");

            fwrite($temp, fread($file, filesize($filename)));
            fclose($file);
            fclose($temp);

            echo getCSV($fullCSV) . "\n";
        } else if ($_POST) {
            if (isset($_POST["filter"])) {
                $data = explode("_", $_POST["filter"]);

                if (sizeof($data) == 2) {
                    $filename = "buf.csv";
                    $file = fopen($filename, "r");
                    $fullCSV = [];

                    while (($csv = fgetcsv($file))) {
                        array_push($fullCSV, $csv);
                    }

                    fclose($file);
                    $filter = $data[0];

                    $column = intval($data[1]);
                    $filteredCSV = [];

                    array_push($filteredCSV, $fullCSV[0]);

                    for ($i = 1; $i < sizeof($fullCSV) - 1; $i++) {
                        if ($filter == $fullCSV[$i][$column]) {
                            array_push($filteredCSV, $fullCSV[$i]);
                        }
                    }

                    echo getCSV($filteredCSV) . "\n";
                }
            }
        } else if ($_GET) {
            $filename = "buf.csv";
            $file = fopen($filename, "r");
            $fullCSV = [];

            while (($csv = fgetcsv($file))) {
                array_push($fullCSV, $csv);
            }

            fclose($file);

            echo getCSV($fullCSV) . "\n";
        }
    ?>
</body>

</html>
