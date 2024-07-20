<?php
class Phase {
    private $id;
    private $name;
    private $desc;

    public function __construct() {
        $this->id = 0;
        $this->name = '';
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function setDesc($value) {
        $this->desc = $value;
    }
}
