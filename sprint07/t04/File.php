<?php
class File extends FilesList {
    private $name;

    public function __construct($name) {
        $home = str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]);
        $this->name = $home . "storage/" . $name;
    }

    public function write($contents) {
        $parts = explode("/", $this->name);
        $file = array_pop($parts);
        $directory = "";

        foreach ($parts as $part) {
            if (!is_dir($directory .= "/" . $part)) {
                mkdir($directory);
            }
        }
        
        file_put_contents("$directory/$file", $contents, FILE_APPEND);
    }

    public function toList() {
        return file_get_contents($this->name);
    }
}
