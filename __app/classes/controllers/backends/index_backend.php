<?php defined('_RTMEXEC') or die('No direct script access.');

class Index_backend extends Auth_backend {
    
    private $data = array();
    
    public function __set($param,$val)
    {
       $this->data[$param] = $val;
    }
    
    public function __construct()
    {
      parent::__construct();
    }
    
    /**
     * Display start page
     *
     */
    public function indexAct()
    {
      $this->view($this->data['required']);
    }
}