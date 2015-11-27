<?php defined('_RTMEXEC') or die('No direct script access.');

function valid_email($check_val, $error_mess)
{
  if($check_val && !preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$check_val)) return $error_mess;
  return;
}

function valid_money_number($check_val, $error_mess)
{
  if($check_val && !preg_match("/^[0-9]{1,7}\.?[0-9]{1,2}$/",$check_val)) return $error_mess;
  return;
}

function valid_name($check_val, $error_mess)
{
  if($check_val && !preg_match("/^\pL+$/u",$check_val)) return $error_mess;
  return;
}

function valid_date_format($check_val, $error_mess)
{
  if(!preg_match("/^([0]?[1-9]|[1|2][0-9]|[3][0|1])[.\/-]([0]?[1-9]|[1][0-2])[.\/-]([0-9]{4}|[0-9]{2})$/",$check_val)) return $error_mess;
  return;
}

function valid_lang($check_val, $error_mess)
{
  //if($check_val && !preg_match("/^\pL+$/u",$check_val)) return $error_mess;
  return;
}

function valid_phone($check_val, $error_mess)
{
  if($check_val && !preg_match("/^[0-9\(\)\+\-\s]{9,32}$/",$check_val)) return $error_mess;
  return;
}

function valid_address($check_val, $error_mess)
{
  if($check_val && !preg_match("/^[\pL0-9\s\-\,\.\'\"]{8,255}$/u",$check_val)) return $error_mess;
  return;
}

function valid_zip($check_val, $error_mess)
{
  if($check_val && !preg_match("/^[A-Za-z0-9]{3,12}$/",$check_val)) return $error_mess;
  return;
}

function valid_required($check_val, $error_mess)
{
  if(!$check_val) return $error_mess;
  return;
}

function valid_unique($check_val, $error_mess)
{
  $aParams = explode('_',$error_mess);
  $model = Index::createObj($aParams[0].'s_model');
  $valid_method = 'find_'.$aParams[0];
  if($model->$valid_method(array($aParams[1] => $check_val))) return $error_mess;
  return;
}

function valid_alias($check_val, $error_mess)
{
  if($check_val && !preg_match("/^[\w\d\s\-]+$/u",$check_val)) return $error_mess;
  return;
}

function valid_exist($check_val, $error_mess)
{
  $aParams = explode('_',$error_mess);
  $model = Index::createObj($aParams[0].'s_model');
  $valid_method = 'find_'.$aParams[0];
  if(!$model->$valid_method(array($aParams[1] => $check_val, 'active' => 1))) return $error_mess;
  return;
}

function valid_uniqother($check_val, $error_mess)
{
  $id = get_session('id');
  $aParams = explode('_',$error_mess);
  $model = Index::createObj($aParams[0].'s_model');
  $valid_method = 'find_'.$aParams[0];
  if($aRow = $model->$valid_method(array($aParams[1] => $check_val)))
  {
    if(count($aRow) == 1)
    {
      if($aRow[0][$aParams[0].'_id'] == get_session('id')) return;
    }
    return $error_mess; 
  }       
  return;
}

function valid_metapasswd($check_val, $error_mess)
{
    $digit=0; $upper=0; $lower=0;
  
    if(strlen($check_val)<5) return $error_mess;
     
    for($i=0;$i<strlen($check_val);$i++)
    {
        if(ctype_digit($check_val[$i])) $digit=1;
        if(ctype_lower($check_val[$i])) $lower=1;
        if(ctype_upper($check_val[$i])) $upper=1;
    }
    
    if(($digit+$upper+$lower) < 2) return $error_mess;
    return;
}

function valid_passwd($check_val, $error_mess)
{
  if($check_val && !preg_match("/^[A-Za-z0-9\-\.\_]{32,40}$/",$check_val)) return $error_mess;
  return;
}