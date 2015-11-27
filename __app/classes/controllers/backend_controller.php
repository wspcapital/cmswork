<?php defined('_RTMEXEC') or die('No direct script access.');

class Backend_controller extends Controller_class {

    protected $translates = array();
    protected $aLangs = array('en'=>'English','pl'=>'Polski','ru'=>'Русский','ua'=>'Український');
    
    public function __construct()
    {
        require_once(ROOT . 'Smarty/libs/Smarty.class.php');
        $this->smarty = new Smarty();
        $this->smarty->template_dir = SMARTY_TEMPLATE_DIR . BACKENDS;;
        $this->smarty->compile_dir = SMARTY_COMPILE_DIR;
        $this->smarty->config_dir = SMARTY_CONFIG_DIR;
        $this->smarty->cache_dir = SMARTY_CACHE_DIR;
    }
    
    /**
     * Display start page
     *
     */
    protected function view($data_view = array()) {
      $tpl = (isset($data_view['tpl']) && $data_view['tpl']!='')?$data_view['tpl'] . '.tpl':$data_view['controller'] . '.tpl';
      
      $this->loadPack('header');
      $this->loadPack('footer');
      $this->loadPack('common');
     
      $this->smarty->assign('t', $this->translates);
      $this->smarty->assign('base_url', BASEURL);
      $this->smarty->assign('data_view', $data_view);
      
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
    
    public function loadPack($langPack)
    {
      if ($langPack && file_exists(ROOT .'langs/control/'. $langPack.'.lg'))
      {
        $aLangs = file(ROOT .'langs/control/'. $langPack.'.lg');

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