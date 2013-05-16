<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('getMetaData'))
{
    /**
     * returns meta data for the page
     *
     * @return array
     */
    function getMetaData()
    {
        $metaData = array();
        if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
            $metaData['index_follow'] = 'noindex, follow';
            $requestUri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
            $metaData['canonical'] = '<link rel="canonical" href="http://' . $_SERVER['SERVER_NAME'] . $requestUri . '" />';
        } else {
            $metaData['index_follow'] = 'index, follow';
            $metaData['canonical'] = '';
        }
        $metaData['cache_expiration'] = date('r', time() + 604800);
        $metaData['page_title'] = 'Test Title';
        $metaData['page_description'] = 'Test Description';

        return $metaData;

    }
}
