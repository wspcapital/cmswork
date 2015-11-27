<?php  defined('_RTMEXEC') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth_model extends Model_class
{
    var $is_auth;    
    var $uid; 
    private $auth_user;

    public function __construct(){
      parent::__construct();
      $this->_table = 'users';
      $this->_table_prefix = 'user_';
    }
    
    public function __get($param='')
    {
      if(!$param) return $this->auth_user;
      else return $this->auth_user[$param];
    }
    
    public function auth($email, $password)
    {
      if($user = $this->find(array('email'=>$email, 'active'=>1)))
      {
         if(md5(md5($user['user_lastlogin']).$user['user_password'].md5($user['user_lastlogin'])) == $password)
         {
            $timeAuth = time();
            MySQL_driver::edit($this->_table,$this->_table_prefix, array('item'=>$user['user_item']), array('lastlogin'=>$timeAuth)); 
         
            $auth_data['id'] = $user['user_id'];
            $auth_data['name'] = $user['user_fname'].' '.$user['user_lname'];
            $auth_data['email'] = $user['user_email'];
            set_session($auth_data);
            $this->auth_user = $user;
            return true;
         }
      }
      return false;
    }
    
    function logout() {
        session_unset();
        session_destroy();

        $this->is_auth = false;
        $this->uid = false;

        return true;
    }
    
    function is_auth() {
        
        if($this->is_auth) { return true; }

	$info['email'] = get_session('email');
	$info['id'] = get_session('id');
        
        if(!$info['email'] || !$info['id']) { return false; }
        
        if($this->auth_user = $this->find(array('email'=>$info['email'], 'id'=>$info['id'], 'active'=>1)))
        {
            $this->is_auth = true;
            $this->uid = $info['id'];
            return true;
        }
        else 
        {
           session_unset();
           session_destroy();
           $this->is_auth = false;
           $this->uid = false;
        }
        return false;        
    }
}