<?php defined('_RTMEXEC') or die('No direct script access.');

class Pwdchange_frontend extends Profile_frontend {
    
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
      if($this->data['post'])
      {
        $valid_check = array();
        $valid_check = $this->check_post_valid($this->data['required']['alias'], $this->data['post']);
        
        if(!count($valid_check))
        {
            if($this->data['post']['user_pass'] != md5(md5($this->user->lastlogin) . $this->user->password . md5($this->user->lastlogin))) $valid_check['user_pass'] = 'user_password_wrong';
            if($this->data['post']['user_newpass'] != $this->data['post']['user_confpass'])  $valid_check['user_confpass'] = 'user_confpass_nomatch';
        }
        $this->data['required']['errors'] =  $valid_check;
        
        if(!count($valid_check))
        {
            try {
                   if($this->data['post']['user_newpass'] != $this->data['post']['user_pass'])
                   {
                      $this->user->password = $this->data['post']['user_newpass'];
                      if(!$this->user->ormSave()) throw new Exception('passwd_update_error');
                      else
                      {
                        $authModel = index::createObj('auth_model');
                        if($authModel->logout()) redirect (BASEURL.'login?success=pwdchsuccess');
                      }
                   }
                }
                catch(Exception $e)
                {
                  $this->data['required']['page_except'] = $e->getMessage();
                }
        }
      }
      
      $this->view($this->data['required']);
    }
    
    public function passaltAct()
    {
       die(md5($this->user->lastlogin));
    }
}