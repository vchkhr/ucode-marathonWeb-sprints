<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>What about forms?</title>
</head>

<body>
    <h1>What Thanos did for the Soul Stone?</h1>

    <form action="" method="post">
        <p>
            <input name="whatThanosDid" type="radio" id="jump" value="jump">
            <label for="jump">Jumped from the mountain</label>
        </p>
        
        <p>
            <input name="whatThanosDid" type="radio" id="stone" value="stone">
            <label for="stone">Made stone keeper to jump from the mountain</label>
        </p>
        
        <p>
            <input name="whatThanosDid" type="radio" id="push" value="push">
            <label for="push">Pushed Gamora off the mountain</label>
        </p>

        <p>
            <input type="submit" value="I made a choice!">
        </p>
    </form>

    <h3>
        <?php
            if (isset($_POST['whatThanosDid'])) {
                if ($_POST['whatThanosDid'] == "push") {
                    echo "You are rock!";
                }
                else {
                    echo "Shame on you! Go and watch Avengers!";
                }
            }
        ?>
    </h3>
</body>

</html>
