<?php  defined('_RTMEXEC') or die('No direct script access.');

class Model_class {
    
    protected $_table;
    protected $_table_prefix;
    
    public function __construct(){
       
    }
    
    protected function fetch_all($order_fields, $order_val='ASC', $limit = '')
    {
      if(is_array($order_fields)) $sOrder = '`'.implode('`, `', $this->_table_prefix.$order_fields).'`';
      else $sOrder = '`' . $this->_table_prefix.$order_fields . '`';
      
      if($order_val == 'DESC') $sOrder .= ' ' . $order_val;
      
      $query = "select * from ".dbprefix."{$this->_table} ORDER BY {$sOrder}";
      if($limit) $query .= ' limit '.$limit;
      
      if($records = MySQL_driver::query($query))
      {
        if(count($records)) return $records;
      }
      return false;  
    }
    
    protected function find($condition = array())
    {
       $arrayWhere = array();
       if(is_array($condition))
       {
           foreach($condition as $key=>$val)
           {
             $arrayWhere[] = $this->_table_prefix.$key.'` = \''.$val;  
           }
           $sWhere = '`'.implode('\' AND `',$arrayWhere).'\'';
       }
        
       $query = "select * from ".dbprefix."{$this->_table} where {$sWhere}"; 
       if($record = MySQL_driver::query($query))
       {
         if(count($record) == 1) return $record[0];
       }
       return false;
    }
    
    protected function filtr($condition = array())
    {
       $arrayWhere = array();
       if(is_array($condition))
       {
           foreach($condition as $key=>$val)
           {
             $arrayWhere[] = $this->_table_prefix.$key.'` = \''.$val;  
           }
           $sWhere = '`'.implode('\' AND `',$arrayWhere).'\'';
       }
       
       $query = "select * from ".dbprefix."{$this->_table} where {$sWhere}"; 
       if($records = MySQL_driver::query($query))
       {
         return $records;
       }
       return false; 
    }
}
