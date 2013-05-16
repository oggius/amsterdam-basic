<?php
abstract class Response_Boolean extends CI_Model 
{          
    protected $_booleanState;
    
    protected $_message;
    
    abstract public function __construct($message = null);
    /**
    * returns corresponding boolean state
    * 
    * @return bool
    */
    public function getState() 
    {
        return $this->_booleanState;
    }
    
    /**
    * returns false message
    * 
    * @param string $lang lang code
    * @return string
    */
    public function getMessage($lang = 'ru')
    {
        return !empty($this->_message) ? $this->_message : '';
    }
}