<?php defined('_RTMEXEC') or die('No direct script access.');

class Metaq_driver {
    
    private static $_instance = null;
    
    private static $_MQ_CLEAR_STARTTIME = 0; 
    private static $_MQ_CLEAR_NUMBER = 0;
    
    private static $mq_params;
    private static $cacheDirPrefix;

    private function __construct() {
       self::$mq_params = Appset_driver::get('metaq');
       self::$cacheDirPrefix = '';
    }
    
    public static function mqQuery($query)
    {
        $ret = '';
      
        $fName = ROOT.self::$mq_params['t_cachedir'].self::$cacheDirPrefix.crc32($query);

        if(file_exists($fName) && (time()-filemtime($fName)) < self::$mq_params['t_cachetime']) 
        {
           $ret = file_get_contents($fName);
        }
        else
        {
            $ptr=@fsockopen(self::$mq_params['t_host'], self::$mq_params['t_port'], $errno, $errstr, self::$mq_params['t_timeout']);
           
            if($ptr)
            {
 
               if(fputs($ptr,"W$query\r\nQUIT\r\n")!=FALSE)
               {
                   while(!feof($ptr)) 
                   {
                      if(($line=fgets($ptr,128))=="end\r\n") break;
                      $ret .= $line;
                   }  
               }  
                   
               fclose($ptr);
               
               //return $ret;
               
               if (self::$mq_params['t_cachetime'])
               {

                 if (self::$cacheDirPrefix!='' && !file_exists(ROOT.self::$mq_params['t_cachedir'].self::$cacheDirPrefix))
                 {
                    foreach(explode('/',self::$cacheDirPrefix) as $tmp)
                    {
                     if ($tmp=='' || $tmp[0]=='.') continue;
                     ROOT.self::$mq_params['t_cachedir'] .= $tmp.'/';
                     if (!file_exists(ROOT.self::$mq_params['t_cachedir'])) @mkdir(ROOT.self::$mq_params['t_cachedir']);
                    }
                 }

                  $fp=@fopen($fName,'w');
                  if($fp) { fputs($fp,$ret); fclose($fp); }
               }
            }
            else
            {
                 if(file_exists($fName))
                 {
                  touch($fName);
                  $ret = file_get_contents($fName);
                 }
                 else return false;
            }
        }

        if(!file_exists(ROOT.self::$mq_params['t_cachedir'].'.clearCache') || (time()-filemtime(ROOT.self::$mq_params['t_cachedir'].'.clearCache'))>=3)
        {
           ignore_user_abort(true);
           touch(ROOT.self::$mq_params['t_cachedir'].'.clearCache');
     
           self::$_MQ_CLEAR_STARTTIME = time();
           self::mq_clearCache(realpath(ROOT.self::$mq_params['t_cachedir']));
     
           ignore_user_abort(false);
        }
        return $ret;
    }
    
    private static function mq_clearCache($dirName)
    {
        if(empty($dirName) || ($list=glob($dirName.'/*'))===false || empty($list)) return;

        $size = sizeof($list);
        foreach($list as $fileName)
        {
            $baseName = basename($fileName);
            
            if ($baseName[0]=='.') continue;
            
            if (is_dir($fileName))
            {
                self::mq_clearCache($fileName);
                if (self::$_MQ_CLEAR_NUMBER >= self::$mq_params['t_clear_delnumber']) return; 
            }
            elseif((self::$_MQ_CLEAR_STARTTIME-filemtime($fileName)) > self::$mq_params['t_cachetime'])
            {
             @unlink($fileName);
             if (++self::$_MQ_CLEAR_NUMBER >= self::$mq_params['t_clear_delnumber']) return;
             --$size;
            }
        }
        $tmp = realpath(ROOT.self::$mq_params['t_cachedir']);
        if (!empty($tmp) && $size<=0 && strlen($dirName)>strlen($tmp) && $dirName!=$tmp)
        {
          @rmdir($dirName);
        }
        return;
    }
    
    public static function mqAccount($user=array())
    {
        $ret='error';
        
        $query = "NEWACCOUNT MASTER=".self::$mq_params['t_master']."|IP={$user['remote_addr']}|GROUP=".self::$mq_params['t_group'][$user['group']]."|NAME={$user['name']}|".
                 "PASSWORD={$user['password']}|INVESTOR={$user['investor']}|EMAIL={$user['email']}|COUNTRY={$user['country']}|".
                 "STATE={$user['state']}|CITY={$user['city']}|ADDRESS={$user['address']}|COMMENT={$user['comment']}|".
                 "PHONE={$user['phone']}|PHONE_PASSWORD={$user['phone_password']}|STATUS={$user['status']}|ZIPCODE={$user['zipcode']}|".
                 "ID={$user['id']}|LEVERAGE={$user['leverage']}|AGENT={$user['agent']}|SEND_REPORTS={$user['send_reports']}|DEPOSIT={$user['deposit']}";
//echo $query;exit;
        $ptr=@fsockopen(self::$mq_params['t_host'], self::$mq_params['t_port'], $errno, $errstr, self::$mq_params['t_timeout']); 
     
        if($ptr)
        {
            if(fputs($ptr,"W$query\nQUIT\n")!=FALSE)
            {
              $ret='';
             
              while(!feof($ptr)) 
              {
                  $line=fgets($ptr,128);
                  if($line=="end\r\n") break; 
                  $ret.= $line;
              } 
            }
            fclose($ptr);
        }
     
        return $ret; 
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