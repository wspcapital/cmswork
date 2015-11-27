<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:05:44
         compiled from "../../templates/frontends/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:654581556589b7889ef26-88255965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd77155f0c73cfbe92a9e06485f98f2d74f01d36' => 
    array (
      0 => '../../templates/frontends/footer.tpl',
      1 => 1443521341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '654581556589b7889ef26-88255965',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'data_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56589b788b6fa1_57398880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b788b6fa1_57398880')) {function content_56589b788b6fa1_57398880($_smarty_tpl) {?>
</div>
    </div>
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/holder.js"><?php echo '</script'; ?>
>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
    <?php if ($_smarty_tpl->tpl_vars['data_view']->value['controller']=='authkey') {?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery.md5.js"><?php echo '</script'; ?>
>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['data_view']->value['controller']=='login'||$_smarty_tpl->tpl_vars['data_view']->value['controller']=='pwdchange') {?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery.md5.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery.sha1.js"><?php echo '</script'; ?>
>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['data_view']->value['controller']=='pages') {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/ckeditor/adapters/jquery.js"><?php echo '</script'; ?>
>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['data_view']->value['pagejs']==1) {?>
        
        <?php echo '<script'; ?>
 language="javascript" type="text/javascript">
            var base_url = '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
';
        <?php echo '</script'; ?>
>
        
        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/pages/<?php echo $_smarty_tpl->tpl_vars['data_view']->value['alias'];?>
.js"><?php echo '</script'; ?>
>
    <?php }?>
  </body>
</html><?php }} ?>
