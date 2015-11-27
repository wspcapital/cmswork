<?php defined('_RTMEXEC') or die('No direct script access.');

class ORM_model extends Model_class {
  protected $_table_columns;

  public function __construct() {
    parent::__construct();
  }

  public function ormFind($find_condition = array()) {
    if ($item = $this->find($find_condition)) {
      foreach ($item as $key => $val) {
        $field = str_replace($this->_table_prefix, '', $key);
        $this->_table_columns[$field] = $val;
      }
      return TRUE;
    }
    return FALSE;
  }

  public function ormFirst() {
    $query = "select * from `" . dbprefix . "{$this->_table}` ORDER BY `{$this->_table_prefix}item` ASC limit 0,1";

    if ($record = MySQL_driver::query($query)) {
      foreach ($record[0] as $key => $val) {
        $field = str_replace($this->_table_prefix, '', $key);
        $this->_table_columns[$field] = $val;
      }
      return TRUE;
    }
    return FALSE;
  }

  public function ormLast() {
    $query = "select * from `" . dbprefix . "{$this->_table}` ORDER BY `{$this->_table_prefix}item` DESC limit 0,1";

    if ($record = MySQL_driver::query($query)) {
      foreach ($record[0] as $key => $val) {
        $field = str_replace($this->_table_prefix, '', $key);
        $this->_table_columns[$field] = $val;
      }
      return TRUE;
    }
    return FALSE;
  }

  public function ormFiltr($filtr_condition = array(), $filtr_order = array()) {
    $rows = array();
    if ($items = $this->filtr($filtr_condition)) {
      for ($i = 0; $i < count($items); $i++) {
        foreach ($items[$i] as $key => $val) {
          $field = str_replace($this->_table_prefix, '', $key);
          $this->_table_columns[$field] = $val;
        }
        $rows[$i] = clone $this;
      }
    }
    return $rows;
  }

  public function ormFetch($fetch_order = array()) {
    $rows = array();
    if ($items = $this->filtr($fetch_order)) {
      for ($i = 0; $i < count($items); $i++) {
        foreach ($items[$i] as $key => $val) {
          $field = str_replace($this->_table_prefix, '', $key);
          $this->_table_columns[$field] = $val;
        }
        $rows[$i] = clone $this;
      }
    }
    return $rows;
  }

  public function ormSave() {
    $columns = array();

    foreach ($this->_table_columns as $key => $val) {
      if (!is_null($val)) {
        $columns[$key] = (is_array($val)) ? serialize($val) : $val;
      }
    }

    if ($this->_table_columns['item']) {
      return MySQL_driver::edit($this->_table, $this->_table_prefix, array('item' => $this->_table_columns['item']), $columns);
    }
    else {
            if (array_key_exists('id', $this->_table_columns) && !$this->_table_columns['id']) {
              $columns['id'] = getUniqueId();
            }
      
            $new_item = MySQL_driver::add($this->_table, $this->_table_prefix, $columns);
      
            $this->ormFind(array('item' => $new_item));
    }
    return $new_item;
  }
  
}