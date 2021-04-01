<?php
class AvengerQuote {
    public $id;
    public $author;
    public $quote;
    public $photo = array();
    public $publishDate;
    public $comments = array();

    public function __construct($id, $author, $quote, $photo, $publishDate, $comments) {
        $this->id = $id;
        $this->author = $author;
        $this->quote = $quote;
        $this->photo = $photo;
        $this->publishDate = $publishDate;
        $this->comments = $comments;
    }
}
