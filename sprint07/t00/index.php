<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/00 Cookie counter</title>
</head>

<body>
    <h1>Cookie counter</h1>

    <p>
        This page was loaded
        <span>
            <strong>
                <?php
                    if (isset($_COOKIE['loaded'])) {
                        $cookie = $_COOKIE['loaded'] + 1;
                    }
                    else {
                        $cookie = 1;
                    }

                    echo $cookie;
                    setcookie('loaded', $cookie, time()+60, '/', '', false, false);
                ?>
            </strong>
        </span>
        time(s) in last minute.
    </p>
</body>

</html>
