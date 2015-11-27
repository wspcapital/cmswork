<?php defined('_RTMEXEC') or die('No direct script access.');

class Auth_frontend extends Frontend_controller {
    
    private $data = array();
    protected $authModel;
    
    public function __set($param,$val)
    {
       $this->data[$param] = $val;
    }
    
    public function __construct()
    {
      parent::__construct();
      $this->authModel = new Auth_model;
       
       if(!$this->authModel->is_auth()) {
            if(get_uri_string() != '' && !preg_match('/^\/?(logout)\/?$/',get_uri_string()))
            {
               redirect(BASEURL."login/?hlocate=".get_uri_string()); 
            }
            else redirect(BASEURL."login/");
            exit;
       }
       elseif($this->authModel->user_status > 1)
       {
          if(str_replace('_frontend','',get_called_class()) != 'Authkey')
          {
             if($auth_key = get_session('auth_key'))
             {
               if($auth_key != sha1($this->authModel->user_lastlogin.$this->authModel->user_id.$this->authModel->user_item.$this->authModel->user_lastlogin))
                 $this->auth_out();
             }
             else
             {
                if(get_uri_string() != '' && !preg_match('/^\/?(controlout)\/?$/',get_uri_string()))
                {
                  redirect(BASEURL."authkey/?hlocate=".get_uri_string()); 
                }
                else redirect (BASEURL."authkey/");
             }
          }
       }
       
       return;
    }
    
    protected function auth_out()
    {
      $this->authModel->logout();
      redirect (BASEURL."login/");
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