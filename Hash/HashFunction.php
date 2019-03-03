<?php
class HashFunction
{
    private $valueToHash;
    private $hashTableLength;

    public function __construct($valueToHash, $hashTableLength)
    {
        if(gettype($valueToHash) == 'string') {
            $this->valueToHash = $valueToHash;
        }else{
            throw new Exception('value to hash is no string');
        }
        if(gettype($hashTableLength) == 'integer') {
            $this->hashTableLength = $hashTableLength;
        }else{
            throw new Exception('HashTableLength must be an integer');
        }
    }
    public function __invoke()
    {
        $sumOfAsciiCodes = 0;
        for ($i = 0, $strLen = strlen($this->valueToHash); $i < $strLen; $i++) {
            $letter = $this->valueToHash[$i];
            $sumOfAsciiCodes += ord($letter);
        }
        return $sumOfAsciiCodes % $this->hashTableLength;
    }
}