<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:13:41
         compiled from "../../templates/frontends/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16033988856589d5540a066-19996194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fab2056e3927668afc00197a3c0b0bc5beef2d3' => 
    array (
      0 => '../../templates/frontends/login.tpl',
      1 => 1443521341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16033988856589d5540a066-19996194',
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
  'unifunc' => 'content_56589d554501d2_59348286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589d554501d2_59348286')) {function content_56589d554501d2_59348286($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<!-- Begin page content -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['t']->value['form_signin'];?>
</h2>
        
        <div class="row placeholders">
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_except'])===null||$tmp==='' ? '' : $tmp)!='') {?>
            <div class="alert alert-danger" role="alert">
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_except']];?>

            </div>
            <?php } elseif ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_danger'])===null||$tmp==='' ? '' : $tmp)!='') {?>
            <div class="alert alert-danger" role="alert">
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_danger']];?>

            </div>
            <?php } elseif ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_warning'])===null||$tmp==='' ? '' : $tmp)!='') {?>
            <div class="alert alert-warning" role="alert">
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_warning']];?>

            </div>
            <?php } elseif ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_info'])===null||$tmp==='' ? '' : $tmp)!='') {?>
            <div class="alert alert-info" role="alert">
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_info']];?>

            </div>
            <?php } elseif ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['page_success'])===null||$tmp==='' ? '' : $tmp)!='') {?>
            <div class="alert alert-success" role="alert">
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['page_success']];?>

            </div>
            <?php }?>
    
            <?php echo $_smarty_tpl->getSubTemplate ("widgets/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('form'=>$_smarty_tpl->tpl_vars['form']->value), 0);?>

    
        </div>
    </div>        

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
