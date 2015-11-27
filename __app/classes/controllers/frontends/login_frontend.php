<?php defined('_RTMEXEC') or die('No direct script access.');

class Login_frontend extends Frontend_controller {
    
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
        if(get_session('id')) redirect (BASEURL . 'profile/');
        
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
                 $this->data['required']['page_danger'] = 'danger_auth_user_denied';  
               }
               else
               {
                 if(isset($this->data['get']['hlocate']) && $this->data['get']['hlocate'] != '')
                 {
                    redirect(BASEURL.$this->data['get']['hlocate']);
                 }
                 redirect(BASEURL.'profile/');
               }
            }
        }
        
        if(isset($this->get['success'])) $this->data['required']['page_success'] = 'success_'.$this->get['success'];
        if(isset($this->get['info'])) $this->data['required']['page_info'] = 'info_'.$this->get['info'];
        if(isset($this->get['warning'])) $this->data['required']['page_warning'] = 'warning_'.$this->get['warning'];
        if(isset($this->get['danger'])) $this->data['required']['page_danger'] = 'danger_'.$this->get['danger'];
        
        $this->view($this->data['required']);
    }
    
    public function logoutAct()
    {
       $authModel = index::createObj('auth_model');
       if($authModel->logout()) redirect (BASEURL.'login/');
    }
    
    public function loginsaltAct($hash_email)
    {
       $user = index::createObj('users_orm');
       if($user->ormFind(array('hash_email'=>$hash_email, 'active'=>1)))
       {
          die(md5($user->lastlogin));
       }
       die('');
    }
}