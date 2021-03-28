<?php
class EatException extends Exception {
    protected $message;

    function __construct($message) {
        $this->message = $message;
    }
}
