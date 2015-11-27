<?php defined('_RTMEXEC') or die('No direct script access.');

class Index{
    
    public static function createObj($obj) {
        $newObj = new $obj;
        
        switch (preg_replace('/^[a-z]+(_)/','',strtolower($obj)))
        {
         case('frontend'):
             $newObj->loadLangs(str_replace('_frontend','',$obj));
             break;
             
         case('backend'):
             $newObj->loadPack(str_replace('_backend','',$obj));
             break;
        }
        return $newObj;
    }
    
    public static function auto_load($className)
    {
       $file = strtolower($className) . '.php';
      
       switch (preg_replace('/^[a-z]+(_)/','',strtolower($className)))
       {
         case('frontend'):
             if (file_exists(SYSROOT . CONTROLLERS . FRONTENDS . $file))
             {
               include_once (SYSROOT . CONTROLLERS . FRONTENDS . $file);
             }
             else throw new Exception(SYSROOT . CONTROLLERS . FRONTENDS . $file. ' not found');
             break;
             
         case('backend'):
             if (file_exists(SYSROOT . CONTROLLERS . BACKENDS . $file))
             {
               include_once (SYSROOT . CONTROLLERS . BACKENDS . $file);
             }
             else throw new Exception(SYSROOT . CONTROLLERS . BACKENDS . $file. ' not found');
             break;
             
         case('controller'):
             if (file_exists(SYSROOT . CONTROLLERS . $file))
             {
               include_once (SYSROOT . CONTROLLERS . $file);
             }
             else throw new Exception(SYSROOT . CONTROLLERS . $file. ' not found');
             break;
             
         case('model'):
             if (file_exists(SYSROOT . MODELS . $file))
             {
               include_once (SYSROOT . MODELS . $file);
             }
             else throw new Exception(SYSROOT . MODELS . $file. ' not found');
             break;
             
             case('orm'):
             if (file_exists(SYSROOT . MODELS . 'orm/' . $file))
             {
               include_once (SYSROOT . MODELS . 'orm/' . $file);
             }
             else throw new Exception(SYSROOT . MODELS . 'orm/' . $file. ' not found');
             break;
         
         case('driver'):
             if (file_exists(SYSROOT . DRIVERS . $file))
             {
               include_once (SYSROOT . DRIVERS . $file);
             }
             else throw new Exception(SYSROOT . DRIVERS . $file. ' not found');
             break;
         
         case('class'):
             if (file_exists(SYSROOT . $file))
             {
               include_once (SYSROOT . $file);
             }
             else throw new Exception(SYSROOT . $file. ' not found');
             break;
       }
    }
    
    public static function request($sInfo)
    {
       $aExecute = array();
       
       if(strlen($sInfo)){
              
          if(preg_match('/^[a-zA-Z0-9\/\.\_]*$/',$sInfo)){    
              $aInfo = array();
              $aInfo = explode("/",$sInfo);
              $aRoute = array();
              
              foreach ($aInfo as $infoKey=>$infoVal)
              {
                if($infoVal) $aRoute[] = $infoVal;
              }
              
              $aActs = Appset_driver::get('actions');
              
              if(!count($aRoute)) 
              {
                $aActs['home']['alias'] = 'home';
                return $aExecute['implement'] = array('implement' => $aActs['home']);  
              }
              
              $aExecute = array();
              
              for($i=0; $i<count($aRoute); $i++){
                  
                if($aRoute[$i] != '')
                {
                  if(!isset($aExecute['implement']))
                  {
                    if(!isset($aActs[$aRoute[$i]])) throw new Exception('Routing wrong');
                    
                    $aExecute['implement'] = $aActs[$aRoute[$i]];
                    
                    if(!$aExecute['implement']['active']) throw new Exception('Pagedown');
                    
                    $aExecute['implement']['alias'] = $aRoute[$i];
                  }
                  else if( is_array($aExecute['implement']['params']) && $i-1 <= count($aExecute['implement']['params']) )
                  {
                    if(preg_match($aExecute['implement']['params'][$i-1],$aRoute[$i])) $aExecute['actparams'][] = $aRoute[$i];
                    else
                    {
                      $aExecute['implement']['page_except'] = 'error_info_param';
                      break;
                    }
                  }
                  else $aExecute['implement']['page_except'] = 'error_info_param';
                }
              }
              
              return $aExecute; 
          }
          throw new Exception('Routing wrong');
       }
       else return array('implement'=>array('active'=>1, 'post'=>0, 'get'=>0, 'params'=>0, 'controller'=>'index', 'action'=>'index', 'alias'=>'home'));
    }        
}