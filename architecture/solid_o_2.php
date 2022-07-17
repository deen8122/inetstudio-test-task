<?php

/*
 * Даны 2 класса. Один реализует поведение объектов, второй - сам объект.
 * Привести функцию handleObjects в соответствие с принципом открытости-закрытости (O: Open-Closed Principle) SOLID.
 */

interface  SomeObjectInterface {
    public function getObjectName():string;

}
class SomeObject {
    protected $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getObjectName():string {
        return $this->name;
    }
    public function getHandler():string {
        return 'getHandler: '.$this->name;
    }
}

class SomeObjectsHandler {

    public function __construct() { }

    public function handleObjects(array $objects): array {
        $handlers = [];
        foreach ($objects as $object) {
            $handlers[] = $object->getHandler();
        }
        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);