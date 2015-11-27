<?php defined('_RTMEXEC') or die('No direct script access.');

return array(
                 'home'          => array('active'=>1,'post'=>0,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'index','action'=>'index','pagejs'=>0),
    
                 'registration'  => array('active'=>1,'post'=>1,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'registr','action'=>'index','pagejs'=>0),
    
                 'login'         => array('active'=>1,'post'=>1,'get'=>array('lang'=>'/^[en]|[ru]$/','hlocate'=>'/^[a-z]{3,12}$/','info'=>'/^[a-z]{7,64}$/','warning'=>'/^[a-z]{7,64}$/','danger'=>'/^[a-z]{7,64}$/','success'=>'/^[a-z]{7,64}$/'),'params'=>0,'part'=>'frontend','controller'=>'login','action'=>'index','pagejs'=>1),
    
                 'confirmation'  => array('active'=>1,'post'=>0,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>array('/^[a-z0-9]{40}$/'),'part'=>'frontend','controller'=>'registr','action'=>'confirm','pagejs'=>0),
    
                 'logout'        => array('active'=>1,'post'=>0,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'login','action'=>'logout','pagejs'=>0),
    
                 'profile'       => array('active'=>1,'post'=>1,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'profile','action'=>'index','pagejs'=>0),
    
                 'authkey'       => array('active'=>1,'post'=>1,'get'=>array('lang'=>'/^[en]|[ru]$/','hlocate'=>'/^[a-z]{3,12}$/'),'params'=>0,'part'=>'frontend','controller'=>'authkey','action'=>'index','pagejs'=>1),
    
                 'pass'          => array('active'=>1,'post'=>1,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'pwdchange','action'=>'index','pagejs'=>1),
    
                 'getloginsalt'  => array('active'=>1,'post'=>0,'get'=>0,'params'=>array('/^[a-z0-9]{32}$/'),'part'=>'frontend','controller'=>'login','action'=>'loginsalt','pagejs'=>0),
    
                 'getsalt'       => array('active'=>1,'post'=>0,'get'=>0,'params'=>0,'part'=>'frontend','controller'=>'pwdchange','action'=>'passalt','pagejs'=>0),
    
                 'aboutus'       => array('active'=>1,'post'=>0,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'about','action'=>'index','pagejs'=>0),
    
                 'contacts'      => array('active'=>1,'post'=>1,'get'=>array('lang'=>'/^[en]|[ru]$/'),'params'=>0,'part'=>'frontend','controller'=>'contact','action'=>'index','pagejs'=>0),
    
                 'control'       => array('active'=>1,'post'=>0,'get'=>1,'params'=>0,'part'=>'backend','controller'=>'index','action'=>'index','pagejs'=>0),
    
                 'controlin'     => array('active'=>1,'post'=>1,'get'=>1,'params'=>0,'part'=>'backend','controller'=>'login','action'=>'index','pagejs'=>1),
    
                 'controlout'    => array('active'=>1,'post'=>0,'get'=>0,'params'=>0,'part'=>'backend','controller'=>'login','action'=>'logout','pagejs'=>0),
    
                 'gallercrl'    => array('active'=>1,'post'=>1,'get'=>0,'params'=>0,'part'=>'backend','controller'=>'galleries','action'=>'index','pagejs'=>0),
    
                 'newgallercrl' => array('active'=>1,'post'=>1,'get'=>0,'params'=>0,'part'=>'backend','controller'=>'galleries','action'=>'addphoto','pagejs'=>0),
            );