<?php
class Response_False extends Response_Boolean 
{
    public function __construct($message = null) 
    {
        $this->_booleanState = false;
        if (!empty($message)) {
            $this->_message = $message;
        }
    }
}