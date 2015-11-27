<?php defined('_RTMEXEC') or die('No direct script access.');

class Galleries_backend extends Auth_backend {
    
    private $data = array();
    private $galleries;


    public function __set($param,$val)
    {
       $this->data[$param] = $val;
    }
    
    public function __get($param)
    {
       return $this->data[$param];
    }
    
    public function __construct()
    {
      parent::__construct();
      $this->galleries = index::createObj('galleries_orm');
    }
    
    /**
     * Display start page
     *
     */
    public function indexAct()
    {
       $this->view($this->data['required']);
    }
    
    public function addphotoAct()
    {
      $this->data['required']['controller'] = 'addphoto';
      $this->view($this->data['required']);
    }
}