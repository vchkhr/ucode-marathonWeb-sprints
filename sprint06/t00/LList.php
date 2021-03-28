<?php
class LList {
    private $head;

    function __construct() {
        $this->head = null;
    }

    function getHead() {
        return $this->head;
    }

    function getFirst() {
        return $this->head->getData();
    }

    function getLast() {
        $current = $this->head;

        while (true) {
            if ($current->getNext()) {
                $current = $current->getNext();
            }
            else {
                return $current->getData();
            }
        }
    }

    function add($value) {
        if (!$this->head) {
            $this->head = new LLItem($value);
        }
        else {
            $current = $this->head;

            while ($current->getNext()) {
                $current = $current->getNext();
            }

            $item = new LLItem($value);
            $current->setNext($item);
        }
    }

    function addArr($array) {
        foreach ($array as $key => $value) {
            $this->add($value);
        }
    }

    function remove($value) {
        if (!$this->head) {
            return false;
        }

        if ($this->head->getData() == $value) {
            $this->head = $this->head->getNext();

            return true;
        }

        $current = $this->head;

        while (true) {
            if (!$current->getNext()) {
                break;
            }

            if ($current->getNext()->getData() == $value) {
                $current->setNext($current->getNext()->getNext());
            
                return true;
            }

            $current = $current->getNext();
        }

        return false;
    }

    function removeAll($value) {
        while ($this->remove($value)) {
            
        }
    }
    
    function contains($value) {
        $current = $this->head;

        while (true) {
            if ($current->getData() == $value) {
                return 1;
            }
            
            if (!$current->getNext()) {
                return 0;
            }

            $current = $current->getNext();
        }
    }

    function clear() {
        $this->head = null;
    }

    function count() {
        $res = 1;

        $current = $this->head;

        if ($current == null) {
            return 0;
        }

        while (true) {
            if ($current->getNext()) {
                $res += 1;
                $current = $current->getNext();
            }
            else {
                return $res;
            }
        }
    }

    function toString() {
        if (!$this->head) {
            return "";
        }

        $res = "";
        $current = $this->head;

        while (true) {
            $res .= $current->getData() . ", ";

            if (!$current->getNext()) {
                break;
            }

            $current = $current->getNext();
        }

        return substr($res, 0, -2);
    }

    function getIterator() {
        return new LLIterator($this);
    }
}

class LLIterator implements Iterator {
    private $head;
	private $current;
	private $key;

	function __construct($list) {
        $this->head = $list->getHead();
        $this->current = $list->getHead();
        $this->key = 0;
    }

	public function current() {
		return $this->current->getData();
	}

	public function key() {
		return $this->key;
	}

	public function next() {
		$this->current = $this->current->getNext();
		$this->key += 1;
	}

	public function rewind() {
		$this->current = $this->head;
		$this->key = 0;
	}

	public function valid() {
		if ($this->current == null) {
            return false;
        }
        else {
            return true;
        }
	}
}
