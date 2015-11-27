<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:05:44
         compiled from "../../templates/frontends/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202466176156589b78815279-52514626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '253ac303b14cae8eebf29a68df125d019295f6e9' => 
    array (
      0 => '../../templates/frontends/index.tpl',
      1 => 1444499963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202466176156589b78815279-52514626',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56589b78837577_97426218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b78837577_97426218')) {function content_56589b78837577_97426218($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<!-- Begin page content -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['t']->value['common_static_data'];?>
</h2>

          <div class="row placeholders">
              
          </div>
      


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
