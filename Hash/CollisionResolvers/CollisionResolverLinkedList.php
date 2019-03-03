<?php

require_once __DIR__ . '/MyLinkedList.php';

class CollisionResolverLinkedList
{
    public function resolve($index, $hranilishche, $value)
    {
        if (
            isset($hranilishche[$index])
            && !empty($hranilishche[$index])) {
            if (gettype($hranilishche[$index]) == 'string') {
                $temp = $hranilishche[$index];
                $list = new MyLinkedList();
                $list->append($temp);
                $list->append($value);
            } else {
                $list = new MyLinkedList();
                $list->append($value);
            }
            return $list;
        }
    }
}