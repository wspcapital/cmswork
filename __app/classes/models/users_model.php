<?php  defined('_RTMEXEC') or die('No direct script access.');

class Users_model extends Model_class
{
    private $data = array();
   
    public function __set($param,$val)
    {
      $this->data[$param] = (string) $val;
    }
    
    public function __get($param='')
    {
      if(!$param) return $this->data;
      else return $this->data[$param];
    }        

    public function __construct(){
      parent::__construct();
      $this->_table = 'users';
      $this->_table_prefix = 'user_';
    }
    
    public function add_user()
    {
      if(!$this->data['id']) return false;
      
      $query = "select * from ".dbprefix."{$this->_table} where {$this->_table_prefix}email = '{$this->data['email']}'";
      
      if($record = MySQL_driver::query($query)) return false;
      
      if($this->data['item'] = MySQL_driver::add($this->_table, $this->_table_prefix, $this->data)) 
      {
        return $this->add_confirm();  
      }
      return false;
    }
    
    private function add_confirm()
    {
      $query = "select * from ".dbprefix."{$this->_table} where {$this->_table_prefix}item = '{$this->data['item']}'";
      if($record = MySQL_driver::query($query))
      {
         $this->data['confirm'] = sha1(strtotime($record[0]['user_created']).$this->data['email'].$this->data['item'].strtotime($record[0]['user_created']));
         if(MySQL_driver::edit($this->_table,$this->_table_prefix,array('item'=>$this->data['item']), array('confirm'=>$this->data['confirm']))) return $this->data['confirm'];
      }
      return false;
    }
    
    public function find_user($user_item = array())
    {
      return $this->find($user_item);
    }
    
    public function confirm_user($sConf)
    {
       if($this->data = $this->find(array('confirm'=>$sConf, 'active'=>0)))
       {
          $this->data['user_temp_pass'] = getUniqueId(5);
          $this->data['user_lastlogin'] = time();
          MySQL_driver::edit($this->_table,$this->_table_prefix, array('confirm'=>$sConf, 'active'=>0), array('password'=>sha1($this->data['user_temp_pass']), 'lastlogin'=>$this->data['user_lastlogin'], 'active'=>1));
          
          return true;
       }        
       return false;
    }
    
    public function profile_save()
    {
      if($this->data)
      {
        $user_id = $this->data['id'];
        $aValues = $this->data;
        
        unset($aValues['id']);
        if($aValues && $user_id) return MySQL_driver::edit($this->_table, $this->_table_prefix, array('id' => $user_id), $aValues); 
      }
      throw new Exception('profile_update_notice');
    }
}