<?php
class LLItem {
    private $data;
    private $next;

    function __construct($val) {
        $this->data = $val;
        $this->next = null;
    }

    function getData() {
        return $this->data;
    }

    function setData($val) {
        $this->data = $val;
    }

    function getNext() {
        return $this->next;
    }

    function setNext($val) {
        $this->next = $val;
    }
}
