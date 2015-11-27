<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-27 18:05:44
         compiled from "../../templates/frontends/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11217093556589b7883b097-30752511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3289750b53af0ea624b6ab3c805ea388814eef2e' => 
    array (
      0 => '../../templates/frontends/header.tpl',
      1 => 1443521342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11217093556589b7883b097-30752511',
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
  'unifunc' => 'content_56589b78848519_42642420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56589b78848519_42642420')) {function content_56589b78848519_42642420($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
favicon.ico">

    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['t']->value['Project_Title'])===null||$tmp==='' ? 'translate absent' : $tmp);?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/backends/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/backends/dashboard.css" rel="stylesheet">

    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/backends/datepicker.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>

  <body>

    <?php echo $_smarty_tpl->getSubTemplate ("widgets/main-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="container-fluid">
      <div class="row">
        <?php echo $_smarty_tpl->getSubTemplate ("widgets/project-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
