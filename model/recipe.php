<?php
class Recipe {
    private $phase, $id, $name, $link, $calories, $protein, $carbs, $fat, $fiber, $net_carbs;

    public function __construct() {
        $this->phase = null;
        $this->id = 0;
        $this->name = '';
        $this->link = '';
        $this->calories = 0;
        $this->protein = 0;
        $this->carbs = 0;
        $this->fat = 0;
        $this->fiber = 0;
        $this->net_carbs = 0;
    }

    public function getPhase() {
        return $this->phase;
    }

    public function setPhase($value) {
        $this->phase = $value;
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

    public function getLink() {
        return $this->link;
    }

    public function setLink($value) {
        $this-> link = $value;
    }

    public function getCalories() {
        $formatted_cals = number_format($this->calories, 0);
        return $formatted_cals;
    }

    public function setCalories($value) {
        $this->calories = $value;
    }

    public function getProtein() {
        $formatted_protein = number_format($this->protein, 0);
        return $formatted_protein;
    }

    public function setProtein($value) {
        $this-> protein = $value;
    }

    public function getCarbs() {
        $formatted_carbs = number_format($this->carbs, 0);
        return $formatted_carbs;
    }

    public function setCarbs($value) {
        $this-> carbs = $value;
    }

    public function getFat() {
        $formatted_fat = number_format($this->fat, 0);
        return $formatted_fat;
    }

    public function setFat($value) {
        $this-> fat = $value;
    }

    public function getFiber() {
        $formatted_fiber = number_format($this->fiber, 0);
        return $formatted_fiber;
    }

    public function setFiber($value) {
        $this-> fiber = $value;
    }

    public function getNet_Carbs() {
        $formatted_net_carbs = number_format($this->net_carbs, 0);
        return $formatted_net_carbs;
    }

    public function setNet_Carbs($value) {
        $this-> net_carbs = $value;
    }
}
?>