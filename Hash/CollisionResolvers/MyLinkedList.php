<?php
require_once('MySeparateNode.php');

class MyLinkedList
{

    public $head = null;

    public function append($value)
    {
        $newElement = new MySeparateNode();
        $newElement->setValue($value);
        if (!empty($this->head)) {
            $lastElement = $this->head;
            while (!empty($lastElement->getNext())) {
                $lastElement = $lastElement->getNext();
            }
            $lastElement->setNext($newElement);
            $newElement->setPrevious($lastElement);
        } else {
            $this->head = $newElement;
        }
    }

    public function search($value)
    {
        $lastElement = $this->head;
        while (!($lastElement->getValue() == $value)) {
            if (!empty($lastElement->getNext())) {
                $lastElement = $lastElement->getNext();
            }
        }
        return $lastElement;
    }
}