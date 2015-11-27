<?php defined('_RTMEXEC') or die('No direct script access.');

class Profile_frontend extends Auth_frontend {
    
    private $data = array();
    protected $profile = array();
    protected $user;


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
      $this->user = index::createObj('users_orm');
      $this->user->ormFind(array('id' => get_session('id')));
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
                    if($this->data['post']['user_fname'] != $this->user->fname) $this->user->fname = $this->data['post']['user_fname'];
                    if($this->data['post']['user_mname'] != $this->user->mname) $this->user->mname = $this->data['post']['user_mname'];
                    if($this->data['post']['user_lname'] != $this->user->lname) $this->user->lname = $this->data['post']['user_lname'];
                    $userPhone = preg_replace('/[^\d]/','',$this->data['post']['user_phone']);
                    if($userPhone != $this->user->phone) $this->user->phone = preg_replace('/[^\d]/','',$userPhone);
                    if($this->data['post']['user_state'] != $this->user->state) $this->user->state = $this->data['post']['user_state'];
                    if($this->data['post']['user_region'] != $this->user->region) $this->user->region = $this->data['post']['user_region'];
                    if($this->data['post']['user_city'] != $this->user->city) $this->user->city = $this->data['post']['user_city'];
                    if($this->data['post']['user_zip_code'] != $this->user->zip_code) $this->user->zip_code = $this->data['post']['user_zip_code'];
                    if($this->data['post']['user_address'] != $this->user->address) $this->user->address = $this->data['post']['user_address'];
                    
                    if(!$this->user->ormSave()) throw new Exception('profile_update_error');
                    $this->data['required']['page_success'] = 'profile_update_success';
               }
               catch(Exception $e)
               {
                  $this->data['required']['page_except'] = $e->getMessage();
               }
        }
      }
      
      $this->profile['user_email'] = $this->user->email;
      $this->profile['user_fname'] = $this->user->fname;
      $this->profile['user_mname'] = $this->user->mname;
      $this->profile['user_lname'] = $this->user->lname;
      $this->profile['user_phone'] = $this->user->phone;
      $this->profile['user_state'] = $this->user->state;
      $this->profile['user_region'] = $this->user->region;
      $this->profile['user_city'] = $this->user->city;
      $this->profile['user_zip_code'] = $this->user->zip_code;
      $this->profile['user_address'] = $this->user->address;
      $this->profile['user_confirm'] = $this->user->confirm;
      $this->profile['user_status'] = $this->user->status;
      
      $this->data['required']['field_val'] = $this->profile;
      $this->view($this->data['required']);
    }
}