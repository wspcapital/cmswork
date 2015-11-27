<?php defined('_RTMEXEC') or die('No direct script access.');

class MySQL_driver {
    public static $_dbhandle = null;
    
    private static $_instance = null;
    
    private function __construct() {
    // приватный конструктор ограничивает реализацию getInstance ()
        if ( ! $this->connect(Appset_driver::get('db')))
        {
          die("DataBase connection error."); //Exception
        }
        defined("dbprefix") or define("dbprefix",'cmsw_');
    }
    
    /**
     * Connection to DataBase
     *
     * @param array
     * @return int 1|0
     */
    private function connect(array $params) 
    {
        self::$_dbhandle = @mysql_connect(
                                    $params['hostname'], 
                                    $params['username'], 
                                    $params['password']
                           );
                           
        if (self::$_dbhandle != 0) 
        {   
            mysql_set_charset('utf8',self::$_dbhandle);
            if (mysql_select_db($params['database'], self::$_dbhandle))    
                return 1;
            else 
                return 0;
        }
        else 
            return 0;
    }
    
    public static function query($query)
    {
       if(!$resource = @mysql_query($query, self::$_dbhandle)) return false; 
       if (preg_match("/^[select]/i",$query)) 
       {
            $result = array();
            $fields = array();
            $temp = array();
            $fields_num = mysql_num_fields($resource);

            for ($i = 0; $i < $fields_num; ++$i) 
            {
              array_push($fields,mysql_field_name($resource, $i));
            }
            
            while ($row = mysql_fetch_row($resource)) 
            {
                for ($i = 0;$i < $fields_num; ++$i) 
                {
                    $temp[$fields[$i]] = $row[$i];
                }

                array_push($result,$temp);
            }

            mysql_free_result($resource);

            return($result);
        }
    }
    
    public static function edit($table_name, $table_prefix, $condition = array(), $values = array())
    {
      $arraySet = array();
      $arrayWhere = array();
      if(is_array($values))
      {
        foreach($values as $key=>$val)
        {
           $arraySet[] = $table_prefix.$key.'` = \''.mysql_real_escape_string($val); 
        }
        
        $sSet = '`'.implode('\', `',$arraySet).'\'';
        if(is_array($condition))
        {
           foreach($condition as $key=>$val)
           {
             $arrayWhere[] = $table_prefix.$key.'` = \''.mysql_real_escape_string($val);  
           }
           $sWhere = '`'.implode('\' AND `',$arrayWhere).'\'';
        }
        
        if(mysql_query('UPDATE `'.dbprefix.$table_name.'` SET '.$sSet.' WHERE '.$sWhere,self::$_dbhandle))
        {
            return true;
        }        
      }
      return false;
    }
    
    public static function del($table_name, $table_prefix, $condition)
    {
       if(is_array($condition))
       {
          foreach($condition as $key=>$val)
          {
            $arrayWhere[] = $table_prefix.$key.'` = \''.mysql_real_escape_string($val);  
          }
          $sWhere = '`'.implode('\' AND `',$arrayWhere).'\'';
          
          if($sWhere)
          {
             if(mysql_query('DELETE FROM `'.dbprefix.$table_name.'` WHERE '.$sWhere,self::$_dbhandle))
             {
               return true;
             }
          }  
       }
        
       return false;   
    }

    public static function add($table_name, $table_prefix, $item = array())
    {
      $fields = array();
      $values = array();
      
      if(count($item))
      {
         foreach($item as $key=>$val)
         {
            $fields[] = mysql_real_escape_string($key); 
            $values[] = mysql_real_escape_string($val);
         }
         
         if(mysql_query('INSERT INTO `'.dbprefix.$table_name.'` (`'.$table_prefix.implode('`, `'.$table_prefix,$fields).'`) VALUES (\''.implode('\',\'',$values).'\')',self::$_dbhandle))
         {
            $ins_id = mysql_insert_id(self::$_dbhandle);
            return ($ins_id)?$ins_id:true; 
         }        
      }
      return false;
    }
    
    protected function __clone() {
    // ограничивает клонирование объекта
    }
    
    /**
     * Сериализация запрещена
     */
    private function __sleep()
    {
    }

    /**
     * Десериализация запрещена
     */
    private function __wakeup()
    {
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
    
    public function get() {
    // ...
    }
}
