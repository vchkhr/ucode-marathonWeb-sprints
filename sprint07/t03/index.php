<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/03 Charset</title>

    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Charset</h1>

    <form action="" method="post">
        <p>
            <label for="input">Change charset:</label>
            <input type="text" name="text" placeholder="Input string">
        </p>
        <p>Select charset of several charsets:</p>
        <p>
            <select size="3" name="charset[]" multiple>
                <option value="utf" selected>UTF-8</option>
                <option value="iso">ISO-8859-1</option>
                <option value="win">Windows-1252</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Change charset">
        </p>
    </form>

    <form action="unset($_POST)" method="post">
        <input type="text" name="reset" value="reset" style="display: none">
        <input type="submit" value="Clear">
    </form>

    <div
        <?php
            if (!isset($_POST['charset'])) {
                echo "style='display: none;'";
            }
        ?>
    >
        <p>Input string: <textarea disabled><?php echo $_POST['text'] ?></textarea></p>
    </div>

    <div class="hidden"
        <?php
            if (isset($_POST['charset'])) {
                foreach ($_POST['charset'] as $c) {
                    if ($c == "utf") {
                        echo "style='display: block !important;'";
                    }
                }
            }
        ?>
    >
        <p>UTF-8: <textarea disabled><?php echo mb_convert_encoding($_POST['text'], "UTF-8") ?></textarea></p>
    </div>

    <div class="hidden"
        <?php
            if (isset($_POST['charset'])) {
                foreach ($_POST['charset'] as $c) {
                    if ($c == "iso") {
                        echo "style='display: block !important;'";
                    }
                }
            }
        ?>
    >
        <p>ISO-8859-1: <textarea disabled><?php echo mb_convert_encoding($_POST['text'], "ISO-8859-1") ?></textarea></p>
    </div>

    <div class="hidden"
        <?php
            if (isset($_POST['charset'])) {
                foreach ($_POST['charset'] as $c) {
                    if ($c == "win") {
                        echo "style='display: block !important;'";
                    }
                }
            }
        ?>
    >
        <p>Windows-1252: <textarea disabled><?php echo mb_convert_encoding($_POST['text'], "Windows-1252") ?></textarea></p>
    </div>
</body>

</html>
