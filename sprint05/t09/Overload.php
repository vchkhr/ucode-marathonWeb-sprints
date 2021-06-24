<?php
class Overload {
    private $data = array();

    public function __set($name, $val) {
        $this->data[$name] = $val;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        else {
            return "NO DATA";
        }
    }

    public function __isset($name) {
        if (!array_key_exists($name, $this->data)) {
            $this->data[$name] = "NOT SET";
        }

        return true;
    }

    public function __unset($name) {
        $this->data[$name] = null;
    }
}
