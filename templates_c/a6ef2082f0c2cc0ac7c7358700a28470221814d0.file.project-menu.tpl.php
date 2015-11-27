<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:05:44
         compiled from "../../templates/frontends/widgets/project-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131808251256589b788777a6-99042782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6ef2082f0c2cc0ac7c7358700a28470221814d0' => 
    array (
      0 => '../../templates/frontends/widgets/project-menu.tpl',
      1 => 1446122684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131808251256589b788777a6-99042782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_view' => 0,
    'base_url' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56589b78897435_37391205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b78897435_37391205')) {function content_56589b78897435_37391205($_smarty_tpl) {?>    <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)=='index') {?>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['mainctrl'];?>
 <span class="sr-only">(current)</span></a></li>
            <?php } else { ?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['mainctrl'];?>
</a></li>
            <?php }?>
            
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)=='profile'||(($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)=='pwdchange') {?>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
profile/"><?php echo $_smarty_tpl->tpl_vars['t']->value['profile_trader'];?>
 <span class="sr-only">(current)</span></a></li>
            <?php } else { ?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
profile/"><?php echo $_smarty_tpl->tpl_vars['t']->value['profile_trader'];?>
</a></li>
            <?php }?>
          </ul>
          <ul class="nav nav-sidebar">
            
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)!='about') {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
aboutus/"><?php echo $_smarty_tpl->tpl_vars['t']->value['about_us'];?>
</a></li>
            <?php } else { ?>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
aboutus/"><?php echo $_smarty_tpl->tpl_vars['t']->value['about_us'];?>
 <span class="sr-only">(current)</span></a></li>
            <?php }?>
            
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)!='contact') {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
contacts/"><?php echo $_smarty_tpl->tpl_vars['t']->value['our_contacts'];?>
</a></li>
            <?php } else { ?>
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
contacts/"><?php echo $_smarty_tpl->tpl_vars['t']->value['our_contacts'];?>
 <span class="sr-only">(current)</span></a></li>
            <?php }?>
            
          </ul>
    </div><?php }} ?>
