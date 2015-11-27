<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:06:04
         compiled from "../../templates/frontends/registr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213067675756589b8ce29916-69967302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eedc3a560735b93e5d512ba0465aa853320175cb' => 
    array (
      0 => '../../templates/frontends/registr.tpl',
      1 => 1443521340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213067675756589b8ce29916-69967302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    't' => 0,
    'data_view' => 0,
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56589b8ce49df8_87582431',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b8ce49df8_87582431')) {function content_56589b8ce49df8_87582431($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['t']->value['form_registr'];?>
</h2>

  <div class="row placeholders">
  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_except'])===null||$tmp==='' ? '' : $tmp)!='') {?>
  <?php $_smarty_tpl->tpl_vars['form'] = new Smarty_variable('', null, 0);?>
  <div class="alert alert-danger" role="alert">
    <span class="sr-only">Error:</span> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_except']])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['data_view']->value['page_except'] : $tmp);?>

  </div>
  <?php }?>

  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_success'])===null||$tmp==='' ? '' : $tmp)!='') {?>
  <?php $_smarty_tpl->tpl_vars['form'] = new Smarty_variable('', null, 0);?>
  <div class="alert alert-success" role="alert">
    <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_success']];?>

  </div>
  <?php }?>

  <?php echo $_smarty_tpl->getSubTemplate ("widgets/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('form'=>$_smarty_tpl->tpl_vars['form']->value), 0);?>

  
   </div>
</div>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
