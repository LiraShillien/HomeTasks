<?php
class MySeparateNode
{
    private $value;
    private $next = null;
    private $previous = null;

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    function setNext($next): void
    {
        $this->next = $next;
    }

    function getPrevious()
    {
        return $this->previous;
    }

    function setPrevious($previous)
    {
        $this->previous = $previous;
    }

    public function getValue()
    {
        return $this->value;
    }
}

