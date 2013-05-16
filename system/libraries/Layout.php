<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    private $_obj;
    private $_layout;
    private $_partials = array();

    public function  __construct($layout = "layout_main")
    {
        $this->_obj =& get_instance();
        $this->_layout = $layout;
    }

    public function setLayout($layout)
    {
      $this->_layout = $layout;
    }
    
    public function setPartial($key, $data)
    {
        $this->_partials[$key] = $data;
    }

    public function view($view, $data=null, $return=false)
    {
        $loadedData = array(
                        'page_title' => '', 
                        'page_description' => '', 
                        'page_keywords' => '', 
                        'main_menu' => '', 
                        'content_for_layout' => '',
                        'canonical' => '',
                        'index_follow' => ''
                     );
        if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
            $loadedData['index_follow'] = 'noindex, follow';
            $requestUri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
            $loadedData['canonical'] = '<link rel="canonical" href="http://' . $_SERVER['SERVER_NAME'] . $requestUri . '" />';
        } else {
            $loadedData['index_follow'] = 'index, follow';            
            $requestUri = $_SERVER['REQUEST_URI'];
            $loadedData['canonical'] = '';
        }
        $loadedData['content_for_layout'] = $this->_obj->load->view($view,$data,true);
        // load particles data
        if (is_array($this->_partials) && count($this->_partials) > 0) {
            foreach ($this->_partials as $partialKey => $partialData) {
                $loadedData[$partialKey] = $partialData;
            }
        }
        
        if($return)
        {
            $output = $this->_obj->load->view($this->_layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->_obj->load->view($this->_layout, $loadedData, false);
        }
    }
}