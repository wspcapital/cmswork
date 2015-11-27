<?php defined('_RTMEXEC') or die('No direct script access.');

function helptest()
{
    return 'success_test';
}

function get_uri_string()
{
    $uri_string = safe_input($_SERVER['PATH_INFO']);
    if(substr($uri_string,0,1) == '/')
    {
       $uri_string = substr_replace($uri_string,'',0,1); 
    }
    if(substr($uri_string,-1) == '/')
    {
       $uri_string = substr_replace($uri_string,'',-1);
    }        
    return $uri_string;
}

function set_session($aSession)
{
   if(is_array($aSession) && count($aSession)>0 )
   {
      foreach($aSession as $key=>$val)
      {
          $_SESSION[$key] = $val;
      }    
   }
   return;
}

function get_session($key)
{
   if($key!='')
   {
     if(isset($_SESSION[$key])) return $_SESSION[$key];
   }
   return;
}

function unset_session($key)
{
   if($key!='')
   {
     if(isset($_SESSION[$key])) unset($_SESSION[$key]);
   }
   return; 
}

function redirect ($uri)
{
    if ($uri=='') return;
    header("Location: ".$uri);
    exit;
}

function check_post_token($name, $val, $fields)
{
  if(!$token = get_cookie($name)) return false;
  
  if(!preg_match("/[0-9a-z]{10}/",$token)) throw new Exception($token);;
  
  if(sha1($token.md5($fields).$token) != $val) throw new Exception('Hash Token is not matched');;
  rm_cookie($name);
  return $token;
}

function set_cookie($name,$val, $cookTerm=0)
{
    $cookExp = ($cookTerm > 0) ? time()+$cookTerm : time()+3600*24;
    if(setcookie(safe_input($name), safe_input($val), $cookExp,'/','',false,true))
    {
       return true; 
    }        
    return false;
}

function get_cookie($name)
{
    if(isset($_COOKIE[$name])) {
        return safe_input($_COOKIE[$name]);
    }
    return;
}

function rm_cookie($name)
{
  if(isset($_COOKIE[$name])) {
    $_COOKIE[$name] = '';
    unset($_COOKIE[$name]);
    return setcookie($name, '', time() - 3600,'/','',false,true);
  }
  return true;
}

function getUniqueId($len=10) {
        mt_srand( (double)microtime() * 1000000 );
        $id = substr( md5(uniqid(mt_rand())), 0 ,$len  );
        return $id;
    }
    
function getUniqueDigitId($len=10) {
        list($usec, $sec) = explode(' ', microtime());
        $id = substr(mt_rand((float) $sec + ((float) $usec * 1000000),9999999999),0,$len);
        return $id;
    }

function profround($prof,$k=1)
{
      if($prof > 0 && is_float($prof))
      {
        if($prof <= 0.01) return 0.01;

        $aProf = explode('.', (string) $prof);

        if(strlen((string)$aProf[1]) <= 2) return $prof;

        $divers = substr((string)$aProf[1],0,2);
        
        if($k) return (float) $aProf[0].'.'.$divers + 0.01;
        else return (float) $aProf[0].'.'.$divers;
         
      }    
      return $prof;
}
    
    function safe_input($data) {
        $data = mb_substr(trim($data),0,65535);
        return htmlspecialchars($data,ENT_QUOTES);
    }
    
    function getFileType($file) {
    if (function_exists("mime_content_type"))
        return mime_content_type($file);
    else if (function_exists("finfo_open")) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $type = finfo_file($finfo, $file);
        finfo_close($finfo);
        return $type;
    }
    else {
        $types = array(
            'JPG' => 'image/jpeg','jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png',
            'gif' => 'image/gif', 'bmp' => 'image/bmp'
        );
        $ext = substr($file, strrpos($file, '.') + 1);
        if (key_exists($ext, $types)) return $types[$ext];
        return "unknown";
    }
}