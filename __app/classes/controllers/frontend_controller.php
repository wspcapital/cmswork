<?php defined('_RTMEXEC') or die('No direct script access.');

/**
 * Frontend_controller Class.
 *
 * @author RTM
 * @project Metaq
 */
class Frontend_controller extends Controller_class {
    
    protected $lang_app;
    protected $langs_list = array('pl','en','ua','ru');
    protected $translates = array();
    protected $current_quotes;

    private $quotes = 'EURUSD,GBPUSD,USDJPY,AUDUSD,USDCAD,';

    public function __construct()
    {  
        if(get_cookie('lang') && in_array(get_cookie('lang'),$this->langs_list))
        {
           $this->lang_app = get_cookie('lang'); 
        } 
        else
        {
          $this->lang_app = 'ru';
          set_cookie('lang','ru');
        }
        
        require_once(ROOT . 'Smarty/libs/Smarty.class.php');
        $this->smarty = new Smarty();
        $this->smarty->template_dir = SMARTY_TEMPLATE_DIR . FRONTENDS;
        $this->smarty->compile_dir = SMARTY_COMPILE_DIR;
        $this->smarty->config_dir = SMARTY_CONFIG_DIR;
        $this->smarty->cache_dir = SMARTY_CACHE_DIR;

        /*if(!$this->current_quotes = Metaq_driver::mqQuery("QUOTES-" . $this->quotes))
        {
           die("MetaTrader connection error.");
        }*/
        //echo '<pre/>';print_r(explode("\n",$this->current_quotes));exit;
    }
    
    /**
     * Display start page
     *
     */
    protected function view($data_view = array()) {
      $tpl = $data_view['controller'] . '.tpl';
      
      $this->loadLangs('header');
      $this->loadLangs('footer');
      $this->loadLangs('common');
     
      $this->smarty->assign('t', $this->translates);
      $this->smarty->assign('base_url', BASEURL);
      $this->smarty->assign('lang', $this->lang_app);
      $this->smarty->assign('data_view', $data_view);
     
      /*$pagesModel = Index::createObj('pages_model');
      if($content = $pagesModel->find_page(array('alias'=>$data_view['alias'], 'lang'=>$this->lang_app, 'active'=>1)))
         $this->smarty->assign('page', htmlspecialchars_decode($content['page_content'],ENT_QUOTES));
      else $this->smarty->assign('page', '');*/
      
      if(isset(Appset_driver::get('forms')[$data_view['alias']]))
      {
        $form = Appset_driver::get('forms')[$data_view['alias']];
        $form[$data_view['alias'].'_token']['val'] = $this->get_form_token(Appset_driver::get('forms')[$data_view['alias']], $data_view['alias']);
        if(isset($data_view['field_val']) && count($data_view['field_val']))
        {
          foreach($data_view['field_val'] as $field_name=>$field_val)
          {
            if(isset($form[$field_name])) $form[$field_name]['val'] = $field_val;
          }
        }
        
        foreach($form as $field_name=>$field_params)
        {
            foreach($field_params as $pKey=>$pVal)
            {
              if(isset($data_view[$field_name][$pKey]))
              {
                if(is_string($data_view[$field_name][$pKey]) && isset($this->translates[$data_view[$field_name][$pKey]]))
                {
                  $form[$field_name][$pKey] = $this->translates[$data_view[$field_name][$pKey]]; 
                }
                else $form[$field_name][$pKey] = $data_view[$field_name][$pKey];
              }
              if(is_string($pVal) && isset($this->translates[$pVal]))
              {
                $form[$field_name][$pKey] = $this->translates[$pVal]; 
              }
            }
        }
        
        $this->smarty->assign('form',$form);
      }
      $this->smarty->assign('user_name_header', get_session('name'));
      $this->smarty->display($tpl);
    }

    protected function getCurrentQuotes()
    {
       if(!$this->current_quotes = Metaq_driver::mqQuery("QUOTES-" . $this->quotes))
       {
         die("MetaTrader connection error.");
       }
       return; 
    }
    
    public function loadLangs($langPack)
    {
      if ($langPack && file_exists(ROOT .'langs/'. $this->lang_app .'/'. $langPack.'.lg'))
      {
        $aLangs = file(ROOT .'langs/'. $this->lang_app .'/'. $langPack.'.lg');

        foreach($aLangs as $valLangs)
        {
            list($translate_key,$translate_str) = explode("|",$valLangs."|");
            if($translate_key && $translate_str)
            {
                $this->translates[$translate_key] = preg_replace("/[\n\r]$/","",$translate_str); 
                $this->translates[$translate_key] = preg_replace("/\\\\r\\\\n/",PHP_EOL,$this->translates[$translate_key]); 
            }
        } 
      }
      return;
    }        
}