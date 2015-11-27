<?php  defined('_RTMEXEC') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Anonses_model extends Model_class
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
      $this->_table = 'anonses';
      $this->_table_prefix = 'anons_';
    }
    
    public function fetch($fields, $ord, $records_limit)
    {
      return $this->fetch_all($fields, $ord, $records_limit);  
    }

    public function find_anons($news_item = array())
    {
      if($news = $this->find($news_item)) return $news;
      return '';
    }
    
    public function get_actual_anonses()
    {
      $query = "select * from ".dbprefix."{$this->_table} where {$this->_table_prefix}active = '1' and {$this->_table_prefix}lang = '".get_cookie('lang')."' and {$this->_table_prefix}public_date<='".time()."' order by {$this->_table_prefix}item DESC";
      if($records = MySQL_driver::query($query))
      {
         return $records;
      }
      return false;
    }
    
    public function anons_edit($anons, $set_anons)
    {
       if(MySQL_driver::edit($this->_table, $this->_table_prefix, $anons, $set_anons)) return true;
       return false; 
    }
    
    public function anons_del($anons)
    {
       if(MySQL_driver::del($this->_table, $this->_table_prefix, $anons)) return true;
       return false; 
    }
    
    public function anons_new()
    {
       if($this->data['item'] = MySQL_driver::add($this->_table, $this->_table_prefix, $this->data)) return $this->data['item'];
       return false; 
    }
}