<?php
require_once __DIR__ . '/HashFunction.php';
require_once __DIR__ . '/CollisionResolvers/MyLinkedList.php';

class HashTable
{

    private $storage = [];
    private $hashTableMaxLength;
    private $collisionResolver;
    private $collisionType;

    public function __construct($hashTableMaxLength, $collisionResolver, $collisionType)
    {
        $this->hashTableMaxLength = $hashTableMaxLength;
        $this->collisionResolver = $collisionResolver;
        $this->collisionType = $collisionType;
    }
    public function write($index, $value) {
        if(isset($this->storage[$index]) && !empty($this->storage[$index])) {
            if($this->collisionType == 'IndexPlus1') {
                $newIndex = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLength);
                $this->storage[$newIndex] = $value;
            }
            elseif($this->collisionType == 'LinkedList'){
                $list = $this->collisionResolver->resolve($index, $this->storage, $value);
                $this->storage[$index] = $list;
            }
        } else {
            $this->storage[$index] = $value;
        }
    }
    public function getValue($value){
        $myValue = new HashFunction($value,$this->hashTableMaxLength);
        if(array_key_exists($myValue(), $this->storage) && !empty($this->storage[$myValue()])) {
            if (gettype($this->storage[$myValue()]) == 'string') {
                echo $myValue() . '=>' . $this->storage[$myValue()];
            } else {
                $node = $this->storage[$myValue()]->search($value);
                echo $myValue() . '=>' . $node->getValue();
            }
        }else{
            throw new Exception('Value does not exist');
        }
    }
}