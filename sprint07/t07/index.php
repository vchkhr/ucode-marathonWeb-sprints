<?php
    function autoload($pClassName) {
        include(__DIR__ . '/' . $pClassName . '.php');
    }

    spl_autoload_register("autoload");

    $list = new ListAvengerQuotes(
        array(
            new AvengerQuote("1", "Tony Stark", "DOTH MOTHER KNOW YOU WEARETH HER DRAPES?", array("https://static1.srcdn.com/wordpress/wp-content/uploads/2019/11/MCU-Phase-1-Fights-Iron-Man-vs-Thor-vs-Captain-America-Cropped.jpg"), "2020", array(new Comment("2021", "Before calling this quote out on just being a comical line, consider the source."))),
            new AvengerQuote("2", "Tony Stark", "GENIUS-BILLIONAIRE-PLAYBOY-PHILANTHROPIST.", array("https://static0.srcdn.com/wordpress/wp-content/uploads/avengers-trailer073.jpg"), "2019", array(new Comment("2020", "Speaking of which, certain low-level fans of the franchise try to throw Tony Stark into the same category as Bruce Wayne/Batman."))),
            new AvengerQuote("3", "Iron-Man", "LANGUAGE!", array("https://static1.srcdn.com/wordpress/wp-content/uploads/2020/05/22Language22-Captain-Americas-Best-One-Liners.jpg"), "2018", array(new Comment("2019", "Steve Rogers, where would the world's mightiest heroes be without your moral compass and tried-and-true sense of duty and honor, as any good soldier should have."))),
            new AvengerQuote("4", "Hulk", "PUNY GOD.", array("https://static2.srcdn.com/wordpress/wp-content/uploads/2017/09/Brutal-MCU-injuries-Hulk-vs-Loki-Puny-God-scene.jpg"), "2017", array(new Comment("2018", "The Incredible Hulk has always been a man of few words, but this one utterance truly captures his might, power, and low tolerance for the likes of Loki.")))
        )
    );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>07/07 Data to XML</title>

    <style>
        .row {
            display: flex;
        }

        .column {
            flex: 50%;
            border: 1px solid gray;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1>Avenger Quote to XML</h1>

    <div class="row">
        <div class="column">
            <p>To XML</p>
            <?php
                print_r($list);
            ?>
        </div>
        <div class="column">
            <p>From XML</p>
            <?php
                $list->toXML("avenger_quote.xml");
                $list_new = $list->fromXML("avenger_quote.xml");

                print_r($list_new);
            ?>
        </div>
    </div>

</body>

</html>
