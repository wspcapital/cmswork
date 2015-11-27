<?php defined('_RTMEXEC') or die('No direct script access.');

class Authkey_backend extends Auth_backend {
    
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
      $hash_key_token = sha1($this->authModel->user_lastlogin.$this->authModel->user_email.$this->authModel->user_lastlogin);
      
      if($this->data['post'])
      {
        $valid_check = array();
        $valid_check = $this->check_post_valid($this->data['required']['alias'], $this->data['post']);
        if(!count($valid_check))
        {
          if(md5($hash_key_token.get_session('auth_key_token').$hash_key_token) == preg_replace('/\s+/', '',$this->data['post']['key_acc']))
          {
            unset_session('auth_key_token');
            $aControlAuth['auth_key'] = sha1($this->authModel->user_lastlogin.$this->authModel->user_id.$this->authModel->user_item.$this->authModel->user_lastlogin);
            set_session($aControlAuth);
            
            if(isset($this->data['get']['hlocate']) && $this->data['get']['hlocate'] != '')
            {
              redirect(BASEURL.$this->data['get']['hlocate']);
            }
            redirect(BASEURL.'control/');
          }
          else $this->control_auth_out();
        }
      }
      elseif(get_session('auth_key_token'))
      {
        $this->control_auth_out();
      }
      
      /*---------------------------------------------------*/
        try 
        {
            $auth_key_token = getUniqueDigitId(8);
      
            if($this->sendMail($this->translates['auth_key_access'], 
                               implode(' ',str_split($auth_key_token,2)), 
                               $this->authModel->user_email, 
                               $this->authModel->user_fname, 
                               $this->authModel->user_lname))
            {
              $aControlToken['auth_key_token'] = $auth_key_token; 
              set_session($aControlToken);
              $this->data['required']['page_success'] = $this->translates['send_key_success'];
            }
            else throw new Exception('control_auth_repeat');
            
            $this->data['required']['hash_key']['val'] = $hash_key_token;
        }
        catch(Exception $e)
        {
            $this->data['required']['page_except'] = $e->getMessage();
        }
      /*---------------------------------------------------*/
      
      
      $this->view($this->data['required']);
    }
}