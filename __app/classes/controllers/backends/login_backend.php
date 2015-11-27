<?php defined('_RTMEXEC') or die('No direct script access.');

class Login_backend extends Backend_controller {
    
    private $data = array();
    
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
    }
    
    /**
     * Display start page
     *
     */
    public function indexAct()
    { 
        if(get_session('id')) redirect (BASEURL . 'control/');
        
        if($this->data['post'])
        {
            $valid_check = array();
            
            $valid_check = $this->check_post_valid($this->data['required']['alias'], $this->data['post']);
            
            $this->data['required']['errors'] = $valid_check;
            if(!count($valid_check))
            {
               $authModel = index::createObj('auth_model');
               
               if(!$user = $authModel->auth($this->data['post']['user_email'], $this->data['post']['user_pass']))
               {
                 $this->data['required']['page_except'] = 'auth_user_denied';  
               }
               else
               {
                 if(isset($this->data['get']['hlocate']) && $this->data['get']['hlocate'] != '')
                 {
                    redirect(BASEURL.$this->data['get']['hlocate']);
                 }
                 redirect(BASEURL.'control/');
               }
            }
        }
        $this->view($this->data['required']);
    }
    
    public function logoutAct()
    {
       $authModel = index::createObj('auth_model');
       if($authModel->logout()) redirect (BASEURL);
    }
}