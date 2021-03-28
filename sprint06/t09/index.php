<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A new set</title>

    <style>
        div, form {
            border: 1px solid black;
            padding: 20px;
            margin: 20px 0px;
        }

        div#result {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h1>New Avenger application</h1>

    <div id="result">
        <p>POST</p>
        
        <code>
            <?php
                print_r($_POST);
            ?>
        </code>
    </div>

    <form action="" method="post">
        <fieldset>
            <legend>About candidate</legend>

            <p>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Tell your name" required autofocus>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Tell your e-mail" required>

                <label for="age">Age</label>
                <input type="number" id="age" name="age" min="0" max="1000" step="1" required>
            </p>

            <p>
                <label for="about">About</label>
                <textarea id="about" name="about" rows="5" cols="50" placeholder="Tell about yourself, max 500 symbols" required></textarea>
            </p>

            <p>
                <label for="photo">
                <input type="file" id="photo" name="photo">
            </p>
        </fieldset>

        <p>
            <input type="reset" value="CLEAR">
            <input type="submit" value="SEND">
        </p>
    </form>
</body>

</html>
