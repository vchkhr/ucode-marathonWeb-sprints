<?php
class NotePad {
    public function toList() {
        $string = file_get_contents("storage/notes.json");
        $json = json_decode($string, true);
        $res = "<ul>";

        foreach($json as $note) {
            $res .= "<li><a href='?open=" . $note["time"] . "'>" . date("Y-m-d H:i:s", $note["time"]) . " > " . $note["name"] . "</a> <a href='?delete=" . $note["time"] . "'>DELETE</a></li>";
        }

        return $res . "</ul>";
    }

    public function delete($time) {
        $string = file_get_contents("storage/notes.json");
        $json = json_decode($string, true);

        foreach($json as $key => $val) {
            if ($json[$key]["time"] == $time) {
                unset($json[$key]);
            };
        }

        $json = json_encode($json);
        file_put_contents("storage/notes.json", $json);
    }
}
