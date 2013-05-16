<?php
class User_model extends CI_Model {          

    /**
    * @desc 
    */
    public function login($pass) {    
        if ($pass === 'amsterdam123') {
            $userdata = array('isLogged' => true);
            $this->session->set_userdata($userdata);
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    
    /**
    * @desc 
    */
    public function logout() {
        $userdata = array('isLogged' => false);
        $this->session->unset_userdata($userdata);
        if ($this->isLogged()) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
    * @desc 
    */
    public function isLogged() {        
        $isLogged = $this->session->userdata("isLogged");
        if (!$isLogged) {
            return false;
        } else {
            return true;
        }
    }
}