{* Smarty *}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{$base_url}favicon.ico">

    <title>{$t.Project_Title|default:'translate absent'}</title>

    <!-- Bootstrap core CSS -->
    <link href="{$base_url}css/backends/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{$base_url}css/backends/dashboard.css" rel="stylesheet">

    <link href="{$base_url}css/backends/datepicker.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{$base_url}js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    {include file="widgets/main-menu.tpl"}

    <div class="container-fluid">
      <div class="row">
        {include file="widgets/project-menu.tpl"}