<?php defined('_RTMEXEC') or die('No direct script access.');

class Registr_frontend extends Frontend_controller {
    
    private $data = array();
    
    public function __set($param,$val)
    {
       $this->data[$param] = $val;
    }
    
    public function __get($param)
    {
       return $this->data[$param];
    }
    
    public function __construct()
    {
      parent::__construct();
      //$this->loadLangs('index');
    }
    
    /**
     * Display start page
     *
     */
    public function indexAct()
    { 
      if($this->data['post'])
      {
        $valid_check = array();
        $valid_check = $this->check_post_valid($this->data['required']['alias'], $this->data['post']);
        $this->data['required']['errors'] =  $valid_check;
        if(!count($valid_check))
        {
            try {
                    $newUser = index::createObj('users_orm');
                    $newUser->id = $this->data['token'];
                    $newUser->email = strtolower($this->data['post']['user_email']);
                    $newUser->hash_email = md5(strtolower($this->data['post']['user_email']));
                    $newUser->fname = $this->data['post']['user_first_name'];
                    $newUser->lname = $this->data['post']['user_last_name'];
                    if(!$newUser->ormSave()) throw new Exception('registr_user_repeat');
                    
                    $newUser->confirm = sha1(strtotime($newUser->created).$newUser->email.$newUser->item.strtotime($newUser->user_created));
                    
                    $newUser->ormSave();
                    
                    if($this->sendMail($this->translates['registrate_conf_subject'], sprintf($this->translates['registrate_confirm_email'],$newUser->fname, $newUser->lname,BASEURL.'confirmation/'.$newUser->confirm.'/'), $newUser->email, $newUser->fname, $newUser->lname))
                         $this->data['required']['page_success'] = 'registr_user_success';
                    
               }
               catch(Exception $e)
               {
                    $this->data['required']['page_except'] = $e->getMessage();
               }
        }
      }
      $this->view($this->data['required']);
    }
    
    public function confirmAct($key='')
    {
        try 
        {
            if(!$key || !preg_match('/^[a-z0-9].*$/',$key)) throw new Exception('confirm_user_denied'); 
            
            $user = index::createObj('users_orm');
            
            if(!$user->ormFind(array('confirm'=>$key, 'active'=>0))) throw new Exception('confirm_user_denied');
            
            $temp_pass = getUniqueId(5);
            $user->lastlogin = time();
            $user->password = sha1($temp_pass);
            $user->active = 1;
            
            $user->ormSave();
            
            if($this->sendMail($this->translates['registrate_completed_subject'], 
                               sprintf($this->translates['registrate_completed_email'], $user->fname, $user->lname, $temp_pass, BASEURL.'login/'), $user->email, $user->fname, $user->lname))
                $this->data['required']['page_success'] = 'registr_completed_success';
        }
        
        catch(Exception $e)
        {
           $this->data['required']['page_except'] = $e->getMessage();
        }
        $this->view($this->data['required']);
    }
}