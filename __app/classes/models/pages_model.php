<?php  defined('_RTMEXEC') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Pages_model extends Model_class
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
      $this->_table = 'pages';
      $this->_table_prefix = 'page_';
    }
    
    public function find_page($page_item = array())
    {
      if($page = $this->find($page_item)) return $page;
      return '';
    }
    
    public function edit_page($page = array())
    {
       if(!$page['lang'] || !$page['alias']) return false;
       
       if($item = $this->find_page(array('lang'=>$page['lang'], 'alias'=>$page['alias'])))
       {
         MySQL_driver::edit($this->_table, $this->_table_prefix, array('alias'=>$page['alias'], 'lang'=>$page['lang']),array('content'=>$page['content']));
       }
       elseif($log_id = MySQL_driver::add($this->_table, $this->_table_prefix, 
                                          array('alias'=>$page['alias'], 
                                                'lang'=>$page['lang'], 
                                                'content'=>$page['content'], 
                                                'active'=>1, 
                                                'status'=>1))) return $log_id;
       else return false;
    }
}