<?php
    function autoload($pClassName) {
        include(__DIR__ . '/' . $pClassName . '.php');
    }

    spl_autoload_register("autoload");

    if (isset($_POST["name"])) {
        $note = new Note($_POST["name"], time(), $_POST["imp"], $_POST["content"]);

        unset($POST);
    }

    if (isset($_GET["delete"])) {
        $list = new NotePad();
        echo $list->delete($_GET["delete"]);

        unset($_GET);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/06 Notepad mini</title>

    <style>
        form.inline {
            display: inline;
            margin-left: 5px;
        }

        form.inline input {
            background-color: white;
            border: none;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Notepad mini</h1>

    <form action="" method="post">
        <p>
            <input type="text" name="name" placeholder="Name" required>
        </p>

        <p>
            <select name="imp" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </p>

        <p>
            <textarea name="content" cols="50" rows="3" required></textarea>
        </p>
        <p>
            <input type="submit" value="Create">
        </p>
    </form>

    <div id="list">
        <h2>List of notes</h2>

        <?php
            $list = new NotePad();
            echo $list->toList();
        ?>
    </div>

    <div id="note" style="
        <?php
            if (!isset($_GET["open"])) {
                echo "display: none";
            }
        ?>
    ">
        <h2>Detail of "
            <?php
                if (isset($_GET["open"])) {
                    $note = new Note();
                    echo $note->getName($_GET["open"]);
                }
            ?>
        "</h2>

        <?php
            if (isset($_GET["open"])) {
                $note = new Note();
                echo $note->to_list($_GET["open"]);

                unset($_GET);
            }
        ?>
    </div>

</body>

</html>
