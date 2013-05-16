<?php
class Response_True extends Response_Boolean 
{
    public function __construct($message = null) 
    {
        $this->_booleanState = true;
    }
}