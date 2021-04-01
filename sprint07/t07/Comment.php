<?php
class Comment {
    public $date;
    public $comment;

    public function __construct($date, $comment) {
        $this->date = $date;
        $this->comment = $comment;
    }
}
