<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

define( 'BASEURL', "http://".$_SERVER['HTTP_HOST'].str_replace("__app/index.php","",$_SERVER['SCRIPT_NAME']));

define( '_RTMEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );
define('DOCROOT', realpath(__DIR__).DS);
define('ROOT', str_replace('__app' . DS, '', DOCROOT));
define('SYSROOT', DOCROOT . 'classes' . DS);
define('CLASSES', 'classes' . DS);
define('CONTROLLERS', 'controllers' . DS);
define('FRONTENDS', 'frontends' . DS);
define('BACKENDS', 'backends' . DS);
define('MODELS', 'models' . DS);
define('DRIVERS', 'drivers' . DS);
define('VENDERS', 'venders' . DS);

define('SMARTY_TEMPLATE_DIR', ROOT . 'templates' . DS);
define('SMARTY_COMPILE_DIR', ROOT . 'templates_c');
define('SMARTY_CONFIG_DIR', ROOT . 'configs');
define('SMARTY_CACHE_DIR', ROOT . 'cache');

define('GALLERY', ROOT . 'img' . DS . 'gallery' . DS);

define('MAILER', 'VENDERS' . DS . 'mailer' . DS);

require_once(DOCROOT . 'helpers/functions_helper.php');

require_once(DOCROOT . 'helpers/validations_helper.php');

require_once(DOCROOT . 'classes/index.php');

spl_autoload_register(array('Index', 'auto_load'));

Appset_driver::getInstance();

MySQL_driver::getInstance();   //check DB connect

Metaq_driver::getInstance();

$modeModel = Index::createObj('modes_orm');

date_default_timezone_set('UTC');

try {
        if(!$modeModel->status) throw new Exception('App closed');
    
        $token_police = '';
        $page_except = '';
        
        $server_safe = array();
        if(count($_SERVER))
        {
            foreach($_SERVER as $keyServer=>$valServer){
                if(is_array($valServer))
                {
                  foreach($valServer as $aKeyServer=>$aValServer) 
                  {
                    $server_safe[safe_input($keyServer)][safe_input($aKeyServer)] = safe_input($aValServer);
                  }    
                }
                else $server_safe[safe_input($keyServer)] = safe_input($valServer);
            } 
        }
        
        $cookie_safe = array();
        if(count($_COOKIE))
        {
            foreach($_COOKIE as $keyCookie=>$valCookie){
                if(is_array($valCookie))
                {
                  foreach($valCookie as $aKeyCookie=>$aValCookie) 
                  {
                    $cookie_safe[safe_input($keyCookie)][safe_input($aKeyCookie)] = safe_input($aValCookie);
                  }    
                }
                else $cookie_safe[safe_input($keyCookie)] = safe_input($valCookie);
            } 
        }
        
        $session_safe = array();
        if(count($_SESSION))
        {
            foreach($_SESSION as $keySession=>$valSession){
                if(is_array($valSession))
                {
                  foreach($valSession as $aKeySession=>$aValSession) 
                  {
                    $session_safe[safe_input($keySession)][safe_input($aKeySession)] = safe_input($aValSession);
                  }    
                }
                else $session_safe[safe_input($keySession)] = safe_input($valSession);
            } 
        }
        
        $route =  Index::request($server_safe['PATH_INFO']);
        
        if(!isset($route['implement']['page_except']))
        {
            $post_safe = array();
            
            if(count($_POST) && $route['implement']['post'])
            {
                $post_fields = '';
                $post_token_field=''; 
                $post_token='';
                
                foreach($_POST as $keyPost=>$valPost)
                {
                   if(is_array($valPost))
                   {
                     foreach($valPost as $aKeyPost=>$aValPost) 
                     {
                        $post_safe[safe_input($keyPost)][safe_input($aKeyPost)] = safe_input($aValPost);
                        $post_fields .= safe_input($aKeyPost);
                     }    
                   }
                   else
                   {
                      if(preg_match('/[a-z]{3,10}_token$/i',safe_input($keyPost)))
                      {
                        $post_token = $valPost;
                        $post_token_field = safe_input($keyPost);
                      }
                      else
                      {
                        $post_safe[safe_input($keyPost)] = safe_input($valPost);
                        $post_fields .= safe_input($keyPost);  
                      }
                   }    
                }
                if(!$token_police = check_post_token($post_token_field, $post_token, $post_fields))
                {
                   $post_safe = array();
                   $route['implement']['page_except'] = 'error_form_expired';
                }
            }
        
            $get_safe = array();
            
            if(count($_GET) && count($route['implement']['get']))
            {
                foreach($_GET as $keyGet=>$valGet){
                    if(isset($route['implement']['get'][$keyGet]) && preg_match($route['implement']['get'][$keyGet],$valGet))
                    {
                      $get_safe[safe_input($keyGet)] = safe_input($valGet);  
                    }       
                }
                
                if(isset($get_safe['lang']) && $get_safe['lang'] != '')
                {
                    set_cookie('lang', $get_safe['lang']);
                    
                    redirect (BASEURL . preg_replace('/^\//','',$server_safe['PATH_INFO']));
                }    
            } 
        }
        
        $loged = Index::createObj('logs_orm');
      
        $token = getUniqueId();
        
        if($loged->ormFind(array('token'=>$token))) throw new Exception('Token used already was added');
        
        if(!empty($token_police))
        {
          if(!$loged->ormFind(array('token'=>$token_police))) throw new Exception('Police Token is not loged');
        }
      
        $loged->date = date('Y-m-d H:i:s');
        
        $loged->sys_date = time();
        
        $loged->token = $token;
        
        $loged->token_police = $token_police;
        
        $loged->controller = $route['implement']['controller'];
        
        $loged->actfunction = $route['implement']['action'];
        
        $loged->params = (isset($route['actparams']) && count($route['actparams'])) ? $route['actparams'] : '';
        
        $loged->post = (isset($post_safe) && count($post_safe)) ? $post_safe : '';
        
        $loged->get = (isset($get_safe) && count($get_safe)) ? $get_safe : '';
        
        $loged->cookie = (count($cookie_safe)) ? $cookie_safe : '';
        
        $loged->session = (count($session_safe)) ? $session_safe : '';
        
        $loged->server = (count($server_safe)) ? array('PHP_SELF'=>$server_safe['PHP_SELF'], 'REQUEST_URI'=>$server_safe['REQUEST_URI'],'PATH_INFO'=>$server_safe['PATH_INFO'],'HTTP_REFERER'=>isset($server_safe['HTTP_REFERER'])?$server_safe['HTTP_REFERER']:'','REMOTE_ADDR'=>$server_safe['REMOTE_ADDR'],'HTTP_USER_AGENT'=>$server_safe['HTTP_USER_AGENT']) : '';
        
        if(!$loged->ormSave()) throw new Exception('Call is not loged');    
        
        $exe = Index::createObj($route['implement']['controller'].'_'.$route['implement']['part']);
        
        $act = $route['implement']['action'];
        
        $exe->date = date('Y-m-d H:i:s');
        $exe->sys_date = time();
        $exe->token = $token;
        $exe->cookie = (count($cookie_safe)) ? $cookie_safe:'';
        $exe->post = (isset($post_safe) && count($post_safe)) ? $post_safe:'';
        $exe->get = (isset($get_safe) && count($get_safe)) ? $get_safe:'';
        $exe->remoute = (isset($server_safe['REMOTE_ADDR'])) ? $server_safe['REMOTE_ADDR']:'';
        $exe->required = $route['implement'];
        
        if(method_exists($exe, $act.'Act'))
        {
          if(isset($route['actparams']) && count($route['actparams']))
          {
            switch (count($route['actparams']))
            {
              case 1:
                  $exe->{$act.'Act'}($route['actparams'][0]);
                  break;
              
              case 2:
                  $exe->{$act.'Act'}($route['actparams'][0],$route['actparams'][1]);
                  break;
              
              case 3:
                  $exe->{$act.'Act'}($route['actparams'][0],$route['actparams'][1],$route['actparams'][2]);
                  break;
             }
          }
          else $exe->{$act.'Act'}();
        }        
        else throw new Exception('Alias indicated is wrong');
}
catch(Exception $e)
{
  die($e->getMessage());  
}