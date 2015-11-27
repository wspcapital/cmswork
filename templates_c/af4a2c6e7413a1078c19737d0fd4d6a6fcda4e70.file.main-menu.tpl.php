<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:05:44
         compiled from "../../templates/frontends/widgets/main-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52783783356589b7884a191-54628336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af4a2c6e7413a1078c19737d0fd4d6a6fcda4e70' => 
    array (
      0 => '../../templates/frontends/widgets/main-menu.tpl',
      1 => 1443521343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52783783356589b7884a191-54628336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    't' => 0,
    'user_name_header' => 0,
    'data_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56589b788750a0_18560138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b788750a0_18560138')) {function content_56589b788750a0_18560138($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['t']->value['Project_Name'])===null||$tmp==='' ? 'translate absent' : $tmp);?>
</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
        <?php if ((($tmp = @$_COOKIE['lang'])===null||$tmp==='' ? '' : $tmp)!='en') {?>
          <li><a href='?lang=en'>En</a></li>
        <?php } else { ?>
          <li class="active"><a>En<span class="sr-only">(current)</span></a>
          </li>
        <?php }?>
        
        <?php if ((($tmp = @$_COOKIE['lang'])===null||$tmp==='' ? '' : $tmp)!='ru') {?>
          <li><a href='?lang=ru'>Ru</a></li>
        <?php } else { ?>
          <li class="active"><a>Ru<span class="sr-only">(current)</span></a>
          </li>
        <?php }?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['user_name_header']->value)===null||$tmp==='' ? '' : $tmp)!='') {?>
           <li><a href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
profile/'><?php echo $_smarty_tpl->tpl_vars['user_name_header']->value;?>
</a></li>
           <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['t']->value['logout'];?>
</a></li>
        <?php } else { ?>
           <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)!='login') {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
login/"><?php echo $_smarty_tpl->tpl_vars['t']->value['form_signin'];?>
</a></li><?php } else { ?><li  class="active"><a><?php echo $_smarty_tpl->tpl_vars['t']->value['form_signin'];?>
</a></li><?php }?>
           <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)!='registr') {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
registration/"><?php echo $_smarty_tpl->tpl_vars['t']->value['form_registr'];?>
</a></li><?php } else { ?><li class="active"><a><?php echo $_smarty_tpl->tpl_vars['t']->value['form_registr'];?>
</a></li><?php }?>
        <?php }?>
      </ul>
        </div>
      </div>
    </nav><?php }} ?>
