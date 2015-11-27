<?php  defined('_RTMEXEC') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Logs_orm extends ORM_model
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
      $this->_table = 'logs';
      $this->_table_prefix = 'log_';
      $this->_table_columns = array(
       'item'         =>   NULL,
       'date'         =>   NULL,
       'sys_date'     =>   NULL,
       'token'        =>   NULL,
       'token_police' =>   NULL,
       'controller'   =>   NULL,
       'actfunction'  =>   NULL,
       'params'       =>   NULL,
       'post'         =>   NULL,
       'get'          =>   NULL,
       'cookie'       =>   NULL,
       'session'      =>   NULL,
       'server'       =>   NULL,
       );
    }       
}