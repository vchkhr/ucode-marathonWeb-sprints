<?php
    function saveImage($image, $ext, $name = "") {
        if ($ext == "jpg") {
            imagejpeg($image, "storage/image" . $name . ".jpg");
        }
        else if ($ext == "jpeg") {
            imagejpeg($image, "storage/image" . $name . ".jpeg");
        }
        else if ($ext == "png") {
            imagepng($image, "storage/image" . $name . ".png");
        }
        else {
            echo "ERROR! Only jpg, jpeg or png are allowed.";
        }
    }

    function getOriginalImage($ext) {
        if ($ext == "jpg") {
            return imagecreatefromjpeg("storage/image.jpg");
        }
        else if ($ext == "jpeg") {
            return imagecreatefromjpeg("storage/image.jpeg");
        }
        else if ($ext == "png") {
            return imagecreatefrompng("storage/image.png");
        }
    }

    if (isset($_POST["url"])) {
        $string = file_get_contents($_POST["url"]);
        $image = imagecreatefromstring($string);

        if (imagesx($image) > imagesy($image)) {
            $image = imagecrop(
                $image,
                array(
                    "x" => (imagesx($image) - imagesy($image)) / 2,
                    "y" => 0,
                    "width" => imagesy($image),
                    "height" => imagesy($image)
                )
            );
        }
        else {
            $image = imagecrop(
                $image,
                array(
                    "x" => 0,
                    "y" => (imagesy($image) - imagesx($image)) / 2,
                    "width" => imagesx($image),
                    "height" => imagesx($image)
                )
            );
        }

        $ext = explode(".", $_POST["url"]);
        $ext = array_pop($ext);

        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
            saveImage($image, $ext);
            
            $imageRed = getOriginalImage($ext);
            imagefilter($imageRed, IMG_FILTER_COLORIZE, 256, 0, 0);
            saveImage($imageRed, $ext, "-red");

            $imageGreen = getOriginalImage($ext);
            imagefilter($imageGreen, IMG_FILTER_COLORIZE, 0, 256, 0);
            saveImage($imageGreen, $ext, "-green");

            $imageBlue = getOriginalImage($ext);
            imagefilter($imageBlue, IMG_FILTER_COLORIZE, 0, 0, 256);
            saveImage($imageBlue, $ext, "-blue");
        }
        else {
            echo "ERROR! Only jpg, jpeg or png are allowed.";
        }
    }
    
    if (isset($_POST["reset"])) {
        echo "Type an URL...";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/10 Make square image</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <h1>Make square image</h1>

    <form action="" method="post">
        <input type="url" name="url" placeholder=".jpg, .jpeg or .png">
        <input type="submit" value="GO">
    </form>

    <div style="<?php if (isset($_POST['reset']) || !isset($_POST["url"])) { echo 'display: none'; } ?>">
        <div class="row">
            <div class="column">
                <?php
                    echo "<img src='storage/image." . $ext . "'>";
                ?>
            </div>
            
            <div class="column">
                <?php
                    echo "<img src='storage/image-red." . $ext . "'>";
                ?>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <?php
                    echo "<img src='storage/image-green." . $ext . "'>";
                ?>
            </div>
            
            <div class="column">
                <?php
                    echo "<img src='storage/image-blue." . $ext . "'>";
                ?>
            </div>
        </div>
    </div>
</body>

</html>
