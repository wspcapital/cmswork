<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:29:26
         compiled from "../../templates/frontends/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8098111655658a1064094d2-28958963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '626ceb80c46a97c2d15b4542bc79703fd377d448' => 
    array (
      0 => '../../templates/frontends/profile.tpl',
      1 => 1443521340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8098111655658a1064094d2-28958963',
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
  'unifunc' => 'content_5658a10643bad0_24168089',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5658a10643bad0_24168089')) {function content_5658a10643bad0_24168089($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<!-- Begin page content -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
             
            <?php echo $_smarty_tpl->getSubTemplate ("widgets/profile-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
            <div class="page-header"></div>
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
    
            <?php echo $_smarty_tpl->getSubTemplate ("widgets/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('form'=>$_smarty_tpl->tpl_vars['form']->value), 0);?>

            
            <div class="bs-example">
                 <p class="lead"><?php echo $_smarty_tpl->tpl_vars['t']->value['affiliate'];?>
</p>
            </div>
            <div class="highlight">
                <pre>
                    <code class="language-html" data-lang="html"><span class="nt"><?php echo $_smarty_tpl->tpl_vars['base_url']->value;
echo $_smarty_tpl->tpl_vars['data_view']->value['field_val']['user_confirm'];?>
/</span></code>
                </pre>
            </div>
                    <?php if ($_smarty_tpl->tpl_vars['data_view']->value['field_val']['user_status']==11) {?><div class="bs-example"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
control/" target="_blanc"><?php echo $_smarty_tpl->tpl_vars['t']->value['control_panel'];?>
</a></div><?php }?>
        
    
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
