<?php defined('_RTMEXEC') or die('No direct script access.');

class Appset_driver {
    private static $_appsets = array();
    private static $_instance = null;        

    private function __construct() {
    // приватный конструктор ограничивает реализацию getInstance ()
       if ( ! $this->setconfig(DOCROOT . 'config/'))
       {
         die("Set config files error."); //Exception
       }
    }
    
    private function setconfig($conf_path)
    {
      foreach(glob($conf_path.'*.php') as $file){
         $key = basename($file, ".php");
         if(!self::$_appsets[$key] = include_once ($file)) return false; 
      }
      return true;
    }        
    
    protected function __clone() {
    // ограничивает клонирование объекта
    }
    
    static public function getInstance() {
        if(is_null(self::$_instance))
        {
           self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function import() {
    // ...
    }
    
    public static function get($setting) {
      if(isset(self::$_appsets[$setting]))
           return self::$_appsets[$setting];
      return false;
    }
}