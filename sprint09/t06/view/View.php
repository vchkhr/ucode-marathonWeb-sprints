<?php
class View {
    function __construct($page) {
        $this->page = $page;
    }

    function render($url = null) {
        echo $this->page;
    }
}
