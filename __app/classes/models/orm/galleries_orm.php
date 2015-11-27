<?php  defined('_RTMEXEC') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Galleries_orm extends ORM_model
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
      $this->_table = 'galleries';
      $this->_table_prefix = 'gl_';
      $this->_table_columns = array(
       'item'             =>   NULL,
       'id'               =>   NULL,
       'parent_item'      =>   NULL,
       'caption'          =>   NULL,
       'desc'             =>   NULL,
       'active'           =>   NULL,
       'create'           =>   NULL
       );
    }
}