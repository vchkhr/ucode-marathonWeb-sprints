<?php

class HardWorker {
    private $name;
    private $age;
    private $salary;

    function setName($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function setAge($age) {
        if ($age > 0 && $age <= 100) {
            $this->age = $age;

            return true;
        }

        return false;
    }

    function getAge() {
        return $this->age;
    }

    function setSalary($salary) {
        if ($salary >= 100 && $salary <= 10000) {
            $this->salary = $salary;

            return true;
        }

        return false;
    }

    function getSalary() {
        return this->salary;
    }

    function toArray() {
        return array(
            "name" => $this->name,
            "age" => $this->age,
            "salary" => $this->salary
        );
    }
}
