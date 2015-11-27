<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:06:04
         compiled from "../../templates/frontends/widgets/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158180634156589b8ce4e210-93521673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8227693227f95d52a275de6ae2f703990bdd29c8' => 
    array (
      0 => '../../templates/frontends/widgets/form.tpl',
      1 => 1443521343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158180634156589b8ce4e210-93521673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
    'fields' => 0,
    'field' => 0,
    'data_view' => 0,
    't' => 0,
    'option' => 0,
    'option_val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56589b8cef0077_57335758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b8cef0077_57335758')) {function content_56589b8cef0077_57335758($_smarty_tpl) {?><?php if ((($tmp = @$_smarty_tpl->tpl_vars['form']->value)===null||$tmp==='' ? '' : $tmp)!='') {?>
    <form class="form-horizontal" data-example-id="simple-input-groups" method="post" action="" autocomplete="off">
      <?php  $_smarty_tpl->tpl_vars['fields'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fields']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['form']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->key => $_smarty_tpl->tpl_vars['fields']->value) {
$_smarty_tpl->tpl_vars['fields']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['fields']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['fields']->value['type']=='hidden') {?>
            <input type='<?php echo $_smarty_tpl->tpl_vars['fields']->value['type'];?>
' name='<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['fields']->value['val'];?>
' <?php if ((($tmp = @$_smarty_tpl->tpl_vars['fields']->value['id'])===null||$tmp==='' ? '' : $tmp)!='') {?>id='<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
'<?php }?> />
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['fields']->value['type']=='text') {?>
        <div class="form-group  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {?>has-error<?php }?>">
          
          <label class="control-label col-sm-3" for="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['field']->value];?>
</label>

          <div class="col-sm-9">
            <input type="<?php echo $_smarty_tpl->tpl_vars['fields']->value['type'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields']->value['disabled']) {?>disabled<?php } else { ?>name="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
"<?php }?> class="<?php echo $_smarty_tpl->tpl_vars['fields']->value['class'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
" value='<?php echo $_smarty_tpl->tpl_vars['fields']->value['val'];?>
' aria-describedby="inputSuccess3Status" placeholder="" aria-describedby="basic-addon1" />
            <span class="alert-danger"><?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {
echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value]];
}?></span>
          </div>
          
        </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['fields']->value['type']=='password') {?>
        <div class="form-group  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {?>has-error<?php }?>">
          
          <label class="control-label col-sm-3" for="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['field']->value];?>
</label>

          <div class="col-sm-9">
            <input type="<?php echo $_smarty_tpl->tpl_vars['fields']->value['type'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['fields']->value['class'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
" aria-describedby="inputSuccess3Status" placeholder="" aria-describedby="basic-addon1" />
            <span class="alert-danger"><?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {
echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value]];
}?></span>
          </div>
          
        </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['fields']->value['type']=='select') {?>
            <div class="form-group  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {?>has-error<?php }?>">
          
          <label class="control-label col-sm-3" for="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['field']->value];?>
</label>

          <div class="col-sm-9">
            <select name="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['fields']->value['class'];?>
">
                <?php if ($_smarty_tpl->tpl_vars['fields']->value['val']=='') {?><option value=""><?php echo $_smarty_tpl->tpl_vars['t']->value[('set_select_').($_smarty_tpl->tpl_vars['field']->value)];?>
</option><?php }?>
                <?php  $_smarty_tpl->tpl_vars['option_val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option_val']->_loop = false;
 $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option_val']->key => $_smarty_tpl->tpl_vars['option_val']->value) {
$_smarty_tpl->tpl_vars['option_val']->_loop = true;
 $_smarty_tpl->tpl_vars['option']->value = $_smarty_tpl->tpl_vars['option_val']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['fields']->value['val']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['option_val']->value;?>
</option>
                <?php } ?>
            </select>
            <span class="alert-danger"><?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {
echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value]];
}?></span>
          </div>
          
        </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['fields']->value['type']=='checkbox') {?>
            <div class="form-group  ">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <?php  $_smarty_tpl->tpl_vars['option_val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option_val']->_loop = false;
 $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option_val']->key => $_smarty_tpl->tpl_vars['option_val']->value) {
$_smarty_tpl->tpl_vars['option_val']->_loop = true;
 $_smarty_tpl->tpl_vars['option']->value = $_smarty_tpl->tpl_vars['option_val']->key;
?>
                                <input type="<?php echo $_smarty_tpl->tpl_vars['fields']->value['type'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['option_val']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['option_val']->value==$_smarty_tpl->tpl_vars['fields']->value['val']) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['option']->value];?>

                            <?php } ?>
                        </label>
                    </div>
                </div>
            </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['fields']->value['type']=='textarea') {?>
            <div class="form-group  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {?>has-error<?php }?>">
          
          <label class="control-label col-sm-3" for="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['field']->value];?>
</label>

          <div class="col-sm-9">
              <textarea <?php if ($_smarty_tpl->tpl_vars['fields']->value['disabled']) {?>disabled<?php } else { ?>name="<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
"<?php }?> class="<?php echo $_smarty_tpl->tpl_vars['fields']->value['class'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['fields']->value['id'];?>
" 
                        value='<?php echo $_smarty_tpl->tpl_vars['fields']->value['val'];?>
' aria-describedby="inputSuccess3Status" placeholder="" aria-describedby="basic-addon1" 
                        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['fields']->value['rows'])===null||$tmp==='' ? 0 : $tmp)!=0) {?>rows='<?php echo $_smarty_tpl->tpl_vars['fields']->value['rows'];?>
'<?php }?> <?php if ((($tmp = @$_smarty_tpl->tpl_vars['fields']->value['cols'])===null||$tmp==='' ? 0 : $tmp)!=0) {?>cols='<?php echo $_smarty_tpl->tpl_vars['fields']->value['cols'];?>
'<?php }?> ><?php echo $_smarty_tpl->tpl_vars['fields']->value['val'];?>
</textarea>
            <span class="alert-danger"><?php if ((($tmp = @$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value])===null||$tmp==='' ? '' : $tmp)!='') {
echo $_smarty_tpl->tpl_vars['t']->value[$_smarty_tpl->tpl_vars['data_view']->value['errors'][$_smarty_tpl->tpl_vars['field']->value]];
}?></span>
          </div>
          
        </div>
        <?php }?>
        
      <?php } ?>
      <div class="form-group col-sm-12 text-center">
        <button type="submit" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['t']->value['submit_form'];?>
</button>
      </div>
    </form>
  <?php }?><?php }} ?>
