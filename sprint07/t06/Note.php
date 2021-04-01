<?php
class Note extends NotePad {
    private $name;
    private $time;
    private $imp;
    private $content;

    public function __construct($name = null, $time = null, $imp = null, $content = null) {
        if (!$name) {
            return;
        }

        $this->name = $name;
        $this->time = $time;
        $this->imp = $imp;
        $this->content = $content;

        $string = file_get_contents("storage/notes.json");
        $json = json_decode($string, true);

        $json[] = ["name" => $name, "time" => $time, "imp" => $imp, "content" => $content];

        $json = json_encode($json);

        file_put_contents("storage/notes.json", $json);
    }

    public function to_list($time) {
        $string = file_get_contents("storage/notes.json");
        $json = json_decode($string, true);
        $res = "<ul>";

        foreach($json as $key => $val) {
            if ($json[$key]["time"] == $time) {
                $res .= "<li>date: <b>" . date("Y-m-d H:i:s", $json[$key]["time"]) . "</b></li><li>name: <b>" . $json[$key]["name"] . "</b></li><li>importance: <b>" . $json[$key]["imp"] . "</b></li><li>text: <b>" . $json[$key]["content"] . "</b></li>";
            };
        }

        return $res . "</ul>";
    }

    public function getName($time) {
        $string = file_get_contents("storage/notes.json");
        $json = json_decode($string, true);
        $res = "";

        foreach($json as $key => $val) {
            if ($json[$key]["time"] == $time) {
                $res .= $json[$key]["name"];
            };
        }

        return $res;
    }
}
