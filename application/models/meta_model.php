<?php
class Meta_model extends CI_Model
{
    private $_metadata = array();

    /**
     * constructor
     */
    public function __construct()
    {
        // basic initialisation
        $this->init();
    }

    /**
     * inits the data
     * @return void
     */
    public function init() {
        if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
            $this->_metadata['index_follow'] = 'noindex, follow';
            $requestUri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
            $this->_metadata['canonical'] = '<link rel="canonical" href="http://' . $_SERVER['SERVER_NAME'] . $requestUri . '" />';
        } else {
            $this->_metadata['index_follow'] = 'index, follow';
            $this->_metadata['canonical'] = '';
        }
        $this->_metadata['cache_expiration'] = date('r', time() + 604800);
    }

    /**
     * @param string $metakey
     * @param mixed $value
     * @return void;
     */
    public function setValue($metakey, $value)
    {
        $this->_metadata[$metakey] = $value;
    }

    /**
     * returns filled data
     * @return array
     */
    public function getData()
    {
        return $this->_metadata;
    }
}