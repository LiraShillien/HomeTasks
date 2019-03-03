<?php
require_once __DIR__.'/CollisionResolvers/CollisionResolverInterface.php';
require_once __DIR__.'/CollisionResolvers/CollisionResolverPlus1.php';
require_once __DIR__.'/CollisionResolvers/CollisionResolverLinkedList.php';
require_once __DIR__.'/HashFunction.php';
require_once __DIR__.'/HashTable.php';
$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new CollisionResolverLinkedList(), 'LinkedList');
$string = 'Lira';
$str = 'ariL';
$str3 = 'Anna';
$hashFunction = new HashFunction($string, $hashTableLength);
$hashTable->write($hashFunction(), $string);
$hashFunction2 = new HashFunction($str, $hashTableLength);
$hashTable->write($hashFunction2(), $str);
$hashFunction3 = new HashFunction($str3, $hashTableLength);
$hashTable->write($hashFunction3(), $str3);
$hashTable->getValue('Lira');

//var_dump($hashTable);

//Solving collisions via Linked List:

//HashTable::__set_state(array(
//    'storage' =>
//        array (
//            17 =>
//                MyLinkedList::__set_state(array(
//                    'head' =>
//                        MySeparateNode::__set_state(array(
//                            'value' => 'Lira',
//                            'next' =>
//                                MySeparateNode::__set_state(array(
//                                    'value' => 'ariL',
//                                    'next' => NULL,
//                                    'previous' => NULL,
//                                )),
//                            'previous' => NULL,
//                        )),
//                )),
//            7 => 'Anna',
//        ),
