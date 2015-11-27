<?php  defined('_RTMEXEC') or die('No direct script access.');

class Users_orm extends ORM_model
{
    public function __set($param, $val) {
      if (method_exists($this, 'set_' . $param)) {
        $this->{'set_' . $param}($val);
      }
      elseif (array_key_exists($param, $this->_table_columns)) {
        $this->_table_columns[$param] = $val;
      }
      return;
    }
  
    public function __get($param = '') {
      if (!$param || !isset($this->_table_columns[$param])) {
        return FALSE;
      }
      return $this->_table_columns[$param];
    }        

    public function __construct(){
      parent::__construct();
      $this->_table = 'users';
      $this->_table_prefix = 'user_';
      $this->_table_columns = array(
       'item'             =>   NULL,
       'id'               =>   NULL,
       'email'            =>   NULL,
       'password'         =>   NULL,
       'hash_email'       =>   NULL,
       'fname'            =>   NULL,
       'mname'            =>   NULL,
       'lname'            =>   NULL,
       'zip_code'         =>   NULL,
       'state'            =>   NULL,
       'region'           =>   NULL,
       'city'             =>   NULL,
       'address'          =>   NULL,
       'phone'            =>   NULL,
       'birthday'         =>   NULL,
       'notification'     =>   NULL,
       'active'           =>   NULL,
       'created'          =>   NULL,
       'confirm'          =>   NULL,
       'lastlogin'        =>   NULL,
       'status'           =>   NULL,
       );
    }
}