<?php defined('_RTMEXEC') or die('No direct script access.');

class About_frontend extends Frontend_controller {
    
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