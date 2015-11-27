<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 20:44:31
         compiled from "../../templates/frontends/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5404785655658c0af772046-92045592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b592484f1ae83e1b2cea3d01430529c7ea29053' => 
    array (
      0 => '../../templates/frontends/about.tpl',
      1 => 1447338800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5404785655658c0af772046-92045592',
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
  'unifunc' => 'content_5658c0af7c2b35_43518912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5658c0af7c2b35_43518912')) {function content_5658c0af7c2b35_43518912($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<!-- Begin page content -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['t']->value['about_us'];?>
</h2>

        <div class="row placeholders">
              
        </div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
