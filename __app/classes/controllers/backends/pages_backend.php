<?php defined('_RTMEXEC') or die('No direct script access.');

class Pages_backend extends Auth_backend {
    
    private $data = array();
    private $pagesModel;


    public function __set($param,$val)
    {
       $this->data[$param] = $val;
    }
    
    public function __construct()
    {
      parent::__construct();
      $this->pagesModel = index::createObj('pages_model');
    }
    
    /**
     * Display start page
     *
     */
    public function indexAct($lang='', $page='')
    {
        if($this->data['post'])
        {
           $valid_check = array();
           if(!$lang) $valid_check['sel_langs'] = 'sel_langs_required_error';
           if(!$page) $valid_check['sel_page'] = 'sel_page_required_error';
           $valid_check = $this->check_post_valid($this->data['required']['alias'], $this->data['post']);
           if(!count($valid_check))
           {
             $this->pagesModel->edit_page(array('alias'=>$page, 'lang'=>$lang, 'content'=>$this->data['post']['page_content']));  
           }
        }
        
        $this->data['required']['pages_list'] = array('home'=>$this->translates['index_page'],
                                                     'aboutus'=>$this->translates['about_page'],
                                                     'contact'=>$this->translates['contact_page']);
       
       $this->data['required']['langs_list'] = $this->aLangs;
       $this->data['required']['selected_lang'] = $lang;
       $this->data['required']['selected_page'] = $page;
       if($selected = $this->pagesModel->find_page(array('alias'=>$page, 'lang'=>$lang))) $this->data['required']['page_content']['val'] = $selected['page_content'];
       $this->view($this->data['required']);
    }
}