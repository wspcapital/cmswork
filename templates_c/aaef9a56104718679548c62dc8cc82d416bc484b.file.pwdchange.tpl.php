<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:29:31
         compiled from "../../templates/frontends/pwdchange.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3291604285658a10b4c5499-81811507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaef9a56104718679548c62dc8cc82d416bc484b' => 
    array (
      0 => '../../templates/frontends/pwdchange.tpl',
      1 => 1443521341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3291604285658a10b4c5499-81811507',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'data_view' => 0,
    't' => 0,
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5658a10b549110_93793452',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5658a10b549110_93793452')) {function content_5658a10b549110_93793452($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<!-- Begin page content -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <?php echo $_smarty_tpl->getSubTemplate ("widgets/profile-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <div class="page-header"></h3></div>
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_except'])===null||$tmp==='' ? '' : $tmp)!='') {?>
            <div class="alert alert-danger" role="alert">
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_except']];?>

            </div>
            <?php }?>
            
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_success'])===null||$tmp==='' ? '' : $tmp)!='') {?>
                
                <div class="alert alert-success" role="alert">
                    <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_success']];?>

                </div>
            <?php }?>

            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['form']->value)===null||$tmp==='' ? '' : $tmp)!='') {
echo $_smarty_tpl->getSubTemplate ("widgets/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('form'=>$_smarty_tpl->tpl_vars['form']->value), 0);
}?>
        
    </div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
