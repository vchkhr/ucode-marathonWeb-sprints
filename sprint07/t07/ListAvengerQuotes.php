<?php
class ListAvengerQuotes {
    public $list = array();

    public function __construct($list) {
        $this->list = $list;
    }

    public function toXML($fileName) {
        $xml = new SimpleXMLElement("<ListAvengerQuotes></ListAvengerQuotes>");

        foreach($this->list as $aq) {
            $quote = $xml->addChild("AvengerQuote");

            $id = $quote->addChild("id", $aq->id);
            $author = $quote->addChild("author", $aq->author);
            $quoteText = $quote->addChild("quote", $aq->quote);
            $photo = $quote->addChild("photos");

            foreach($aq->photo as $ph) {
                $photoEl = $photo->addChild("url", $ph);
            }

            $publishDate = $quote->addChild("publishDate", $aq->publishDate);
            $comments = $quote->addChild("comments");

            foreach($aq->comments as $com) {
                $comElDate = $comments->addChild("date", $com->date);
                $comElText = $comments->addChild("text", $com->comment);
            }
        }

        file_put_contents($fileName, $xml->asXML());
    }

    public function fromXML($fileName) {
        $xml = new SimpleXMLElement(file_get_contents($fileName));
        $list = new ListAvengerQuotes(array());

        foreach($xml as $aq) {
            $photos = array();
            $comments = array();

            foreach($aq->photos as $ph) {
                array_push(
                    $photos,
                    $ph->url . PHP_EOL
                );
            }

            foreach($aq->comments as $cm) {
                array_push(
                    $comments,
                    new Comment(
                        $cm->date . PHP_EOL,
                        $cm->text . PHP_EOL
                    )
                );
            }

            array_push(
                $list->list,
                new AvengerQuote(
                $aq->id . PHP_EOL,
                $aq->author . PHP_EOL,
                $aq->quote . PHP_EOL,
                $photos,
                $aq->publishDate . PHP_EOL,
                $comments
                )
            );
        }

        return $list;
    }
}
