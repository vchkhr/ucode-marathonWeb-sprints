<?php
class FilesList {
    private $dir;

    public function __construct() {
        $home = str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]);
        $this->dir = $home . "storage";
    }

    public function toList() {
        $res = "";
        
        foreach (scandir($this->dir) as $file) {
            if ($file != "." && $file != "..") {
                $res .= "<ul><li><a href=\"?file=" . $file . "\">" . $file . "</a></li></ul></ul>";
            }
        }

        return substr($res, 0, -2);
    }
}
