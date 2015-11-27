<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 20:44:32
         compiled from "../../templates/frontends/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10217051625658c0b070c6c0-54902807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17793ef4c1e794fb46cfb7ca60d515ae73fda730' => 
    array (
      0 => '../../templates/frontends/contact.tpl',
      1 => 1447338869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10217051625658c0b070c6c0-54902807',
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
  'unifunc' => 'content_5658c0b0719c19_18628969',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5658c0b0719c19_18628969')) {function content_5658c0b0719c19_18628969($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('base_url'=>$_smarty_tpl->tpl_vars['base_url']->value), 0);?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header"><?php echo $_smarty_tpl->tpl_vars['t']->value['our_contacts'];?>
</h2>

        <div class="row placeholders">
              
        </div>
          
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
