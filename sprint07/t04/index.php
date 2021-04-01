<?php
    function autoload($pClassName) {
        include(__DIR__ . '/' . $pClassName . '.php');
    }

    spl_autoload_register("autoload");

    if (isset($_POST["name"])) {
        $file = new File($_POST["name"]);
        $file->write($_POST["content"]);
        
        $_GET["file"] = "";
    }
    if (isset($_POST["delete"])) {
        if (file_exists($_POST["delete"])) {
            unlink($_POST["delete"]);
        }

        unset($_POST);
        $_GET["file"] = "";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/04 Files</title>
</head>

<body>
    <h1>Files</h1>

    <form action="" method="post">
        <p>
            <label for="name">File name:</label>
            <input type="text" name="name" placeholder="Input string">
        </p>

        <p><label for="content">File name:</label></p>
        <p>
            <textarea name="content" cols="100" rows="7"></textarea>
        </p>
        <p>
            <input type="submit" value="Create file">
        </p>
    </form>

    <div id="list">
        <h2>List of files:</h2>

        <?php
            $list = new FilesList();
            echo $list->toList();
        ?>
    </div>

    <div id="file">
        <?php
            if (isset($_GET["file"]) && $_GET["file"] != "") {
                echo "<h2>Selected file: \"<i>" . $_GET["file"] . "</i>\"</h2>";

                echo '<form action="" method="post"><p>';
                echo '<input type="text" name="delete" value=' . str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]) . "storage/" . $_GET["file"] . ' style="display: none">';
                echo '<input type="submit" value="Delete file">';
                echo '</p></form>';

                echo file_get_contents(str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]) . "storage/" . $_GET["file"]);
            }
        ?>
    </div>

</body>

</html>
