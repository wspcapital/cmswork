<?php defined('_RTMEXEC') or die('No direct script access.');

class Controller_class {
    
    protected $smarty;

    public function __construct()
    {  
        
    }
    
    protected function get_form_token($form = array(), $form_alias)
    {
       if(count($form))
       {
          $sField = '';
          foreach($form as $fieldKey=>$fieldVal)
          {
             if(!preg_match('/[a-z]{3,10}_token$/i',$fieldKey) && $fieldVal['disabled'] == 0) $sField .= $fieldKey;
          }
          return $this->create_token($form_alias.'_token', $sField);
       }
       return;
    }
    
    protected function sendMail($subj, $body, $receiver, $fname, $lname)
    {
      require MAILER . 'PHPMailerAutoload.php';
      $params = Appset_driver::get('smtp');
      $mail = new PHPMailer;
      
      $mail->isSMTP();                                      
      $mail->Host = $params['host'];
      $mail->SMTPAuth = true;
      $mail->Username = $params['user'];
      $mail->Password = $params['pass'];
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = $params['port'];
      $mail->CharSet = 'utf-8';

      $mail->From = $params['user'];
      $mail->FromName = $this->translates[$params['project_name']];
      $mail->addAddress($receiver, $fname.' '.$lname);
      
      $mail->Subject = $subj;
      $mail->Body    = $body;
      if(!$mail->send())
      {
         throw new Exception($mail->ErrorInfo); 
      }
      return true;
    }        
    
    protected function create_token($name, $fields, $token_exp = 300)
    {
       if(is_array($this->cookie) && count($this->cookie) > 0)
       {
         foreach($this->cookie as $keyCookie => $valCookie)
         {
            if(preg_match('/[a-z]+\_token$/', $keyCookie)) rm_cookie ($keyCookie);
         }  
       }
            
       if(!$val = $this->token) throw new Exception('Token is not created.');
       
       if($name && $fields) set_cookie($name, $val, $token_exp); return sha1($val.md5($fields).$val);
       return false;
    }
    
    protected function check_post_valid($form, array $post)
    {
      $aErrors = array();
      if(isset(Appset_driver::get('forms')[$form]))
      {
        $fields = Appset_driver::get('forms')[$form];
        foreach($post as $keyPost=>$valPost)
        {
          if(isset($fields[$keyPost]))
          {
            foreach($fields[$keyPost]['valid'] as $rule=>$message)
            {
              if(!isset($aErrors[$keyPost]))
              {
                $valid_mess = '';
                if($valid_mess = call_user_func_array('valid_'.$rule, array($valPost, $message))) $aErrors[$keyPost] =  $valid_mess; 
              } 
              continue;
            }    
          }    
        }
      }
      return $aErrors;
    }        
}