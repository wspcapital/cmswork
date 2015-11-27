<?php  defined('_RTMEXEC') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class News_model extends Model_class
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
      $this->_table = 'news';
      $this->_table_prefix = 'nws_';
    }
    
    public function fetch($fields, $ord, $records_limit)
    {
      return $this->fetch_all($fields, $ord, $records_limit);  
    }
    
    public function find_news($news_item = array())
    {
      if($news = $this->find($news_item)) return $news;
      return '';
    }
    
    public function find_list($condition = array())
    {
      if($news = $this->filtr($condition)) return $news;
      return false;
    }
    
    public function get_actual_news()
    {
      $query = "select * from ".dbprefix."{$this->_table} where {$this->_table_prefix}active = '1' and {$this->_table_prefix}lang = '".get_cookie('lang')."' and {$this->_table_prefix}public_date<='".time()."' order by {$this->_table_prefix}item DESC";
      if($records = MySQL_driver::query($query))
      {
         return $records;
      }
      return false;
    }
    
    public function news_edit($news, $set_news)
    {
       if(MySQL_driver::edit($this->_table, $this->_table_prefix, $news, $set_news)) return true;
       return false; 
    }
    
    public function news_del($item)
    {
       if(MySQL_driver::del($this->_table, $this->_table_prefix, $item)) return true;
       return false; 
    }
    
    public function add_news()
    {
       if($this->data['item'] = MySQL_driver::add($this->_table, $this->_table_prefix, $this->data)) return $this->data['item'];
       return false; 
    }
    
    public function set_news()
    {
       if(isset($this->data['item']))
       {
          foreach($this->data as $key=>$val)
          {
            if($key == 'item') $where[$key] = $val;
            else
            {
              $set[$key] = $val;
            }    
          }    
          return MySQL_driver::edit($this->_table, $this->_table_prefix, $where, $set);
       }
       else return MySQL_driver::add($this->_table, $this->_table_prefix, $this->data);
       return false; 
    }
}