<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:29:26
         compiled from "../../templates/frontends/widgets/profile-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5242442445658a106440306-22153991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed90c977e5bc29723dacb8ce45ed7f04cfe6a73c' => 
    array (
      0 => '../../templates/frontends/widgets/profile-menu.tpl',
      1 => 1443521343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5242442445658a106440306-22153991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_view' => 0,
    't' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5658a106455db6_38809535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5658a106455db6_38809535')) {function content_5658a106455db6_38809535($_smarty_tpl) {?>        <div class="table-responsive">
            <ul class="nav nav-tabs">
                <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)=='profile') {?><li role="presentation" class="active"><a><?php echo $_smarty_tpl->tpl_vars['t']->value['profile_trader'];?>
</a></li><?php } else { ?><li role="presentation"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
profile/"><?php echo $_smarty_tpl->tpl_vars['t']->value['profile_trader'];?>
</a></li><?php }?>
                <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['controller'])===null||$tmp==='' ? '' : $tmp)=='pwdchange') {?><li role="presentation" class="active"><a><?php echo $_smarty_tpl->tpl_vars['t']->value['change_passwd'];?>
</a></li><?php } else { ?><li role="presentation"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pass/"><?php echo $_smarty_tpl->tpl_vars['t']->value['change_passwd'];?>
</a></li><?php }?>
            </ul>    
        </div><?php }} ?>
