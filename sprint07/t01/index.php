<?php
    session_start();

    if (isset($_POST['name'])) { $_SESSION['name'] = $_POST['name']; }
    if  (isset($_POST['alias'])) { $_SESSION['alias'] = $_POST['alias']; }
    if  (isset($_POST['age'])) { $_SESSION['age'] = $_POST['age']; }
    if  (isset($_POST['about'])) { $_SESSION['about'] = $_POST['about']; }
    if  (isset($_POST['photo'])) { $_SESSION['photo'] = $_POST['photo']; }

    if (isset($_POST['strength'])) { $_SESSION['strength'] = $_POST['strength']; }
    if  (isset($_POST['speed'])) { $_SESSION['speed'] = $_POST['speed']; }
    if  (isset($_POST['intelligence'])) { $_SESSION['intelligence'] = $_POST['intelligence']; }
    if  (isset($_POST['teleportation'])) { $_SESSION['teleportation'] = $_POST['teleportation']; }
    if  (isset($_POST['immortal'])) { $_SESSION['immortal'] = $_POST['immortal']; }
    if  (isset($_POST['another'])) { $_SESSION['another'] = $_POST['another']; }
    if  (isset($_POST['control'])) { $_SESSION['control'] = $_POST['control']; }

    if (isset($_POST['publicity'])) { $_SESSION['publicity'] = $_POST['publicity']; }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/01 Session for new</title>

    <style>
        form, .border {
            border: 1px solid black;
            padding: 20px;
            margin: 20px 0px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Session for new</h1>

    <form action="" method="post" id="input" <?php if(isset($_SESSION['name'])) {echo 'class="hidden"';} ?>>
        <fieldset>
            <legend>About HERO</legend>

            <p>
                <label for="name">Real Name</label>
                <input type="text" id="name" name="name" placeholder="Tell your name" autofocus>

                <label for="name">Current Alias</label>
                <input type="text" id="alias" name="alias" placeholder="Tell your alias">

                <label for="age">Age</label>
                <input type="number" id="age" name="age" min="0" max="1000" step="1">
            </p>

            <p>
                <label for="about">About</label>
                <textarea id="about" name="about" rows="5" cols="50" placeholder="Tell about yourself, max 500 symbols"></textarea>
            </p>

            <p>
                <label for="photo">
                <input type="file" id="photo" name="photo">
            </p>
        </fieldset>

        <fieldset>
            <legend>Powers</legend>

            <p>
                <input type="checkbox" id="strength" name="strength" value="Strength">
                <label for="strength">Strength</label>

                <input type="checkbox" id="speed" name="speed" value="Speed">
                <label for="speed">Speed</label>

                <input type="checkbox" id="intelligence" name="intelligence" value="Intelligence">
                <label for="intelligence">Intelligence</label>

                <input type="checkbox" id="teleportation" name="teleportation" value="Teleportation">
                <label for="teleportation">Teleportation</label>

                <input type="checkbox" id="immortal" name="immortal" value="Immortal">
                <label for="immortal">Immortal</label>

                <input type="checkbox" id="another" name="another" value="Another">
                <label for="another">Another</label>
            </p>

            <p>
                <label for="control">Level of control</label>
                <input type="range" id="control" name="control" value="control">
            </p>
        </fieldset>

        <fieldset>
            <legend>Publicity</legend>

            <p>
                <input type="radio" id="unknown" name="publicity" value="UNKNOWN">
                <label for="unknown">UNKNOWN</label>
                
                <input type="radio" id="like-a-ghost" name="publicity" value="LIKE A GHOST">
                <label for="like-a-ghost">LIKE A GHOST</label>
                
                <input type="radio" id="i-am-in-comics" name="publicity" value="I AM IN COMICS">
                <label for="i-am-in-comics">I AM IN COMICS</label>
                
                <input type="radio" id="i-have-fun-club" name="publicity" value="I HAVE FUN CLUB">
                <label for="i-have-fun-club">I HAVE FUN CLUB</label>
                
                <input type="radio" id="superstar" name="publicity" value="SUPERSTAR">
                <label for="superstar">SUPERSTAR</label>
            </p>
        </fieldset>

        <p>
            <input type="reset" value="CLEAR">
            <input type="submit" value="SEND">
        </p>
    </form>

    <div <?php if(!isset($_SESSION['name'])) {echo 'class="hidden"';} ?>>
        <p>name: <?php if(isset($_SESSION['name'])) {echo $_SESSION['name'];} ?></p>
        <p>alias: <?php if(isset($_SESSION['alias'])) {echo $_SESSION['alias'];} ?></p>
        <p>age: <?php if(isset($_SESSION['age'])) {echo $_SESSION['age'];} ?></p>
        <p>about: <?php if(isset($_SESSION['about'])) {echo $_SESSION['about'];} ?></p>
        <p>photo: <?php if(isset($_SESSION['photo'])) {echo $_SESSION['photo'];} ?></p>

        <p>strength: <?php if(isset($_SESSION['strength'])) {echo "true";} else {echo "false";} ?></p>
        <p>speed: <?php if(isset($_SESSION['speed'])) {echo "true";} else {echo "false";} ?></p>
        <p>intelligence: <?php if(isset($_SESSION['intelligence'])) {echo "true";} else {echo "false";} ?></p>
        <p>teleportation: <?php if(isset($_SESSION['teleportation'])) {echo "true";} else {echo "false";} ?></p>
        <p>immortal: <?php if(isset($_SESSION['immortal'])) {echo "true";} else {echo "false";} ?></p>
        <p>another: <?php if(isset($_SESSION['another'])) {echo "true";} else {echo "false";} ?></p>
        <p>control: <?php if(isset($_SESSION['control'])) {echo $_SESSION['control'];} ?></p>

        <p>publicity: <?php if(isset($_SESSION['publicity'])) {echo $_SESSION['publicity'];} ?></p>

        <form method="post" action="<?php session_destroy(); ?>">
            <input type="submit" value="FORGET">
        </form>
    </div>

</body>

</html>
