{* Smarty *}
</div>
    </div>
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$base_url}js/jquery.min.js"></script>
    <script src="{$base_url}js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{$base_url}js/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{$base_url}js/ie10-viewport-bug-workaround.js"></script>
    <script src="{$base_url}js/bootstrap-datepicker.js"></script>
    {if $data_view.controller eq 'authkey'}
        <script src="{$base_url}js/jquery.md5.js"></script>
    {/if}
    
    {if $data_view.controller eq 'login' || $data_view.controller eq 'pwdchange'}
        <script src="{$base_url}js/jquery.md5.js"></script>
        <script src="{$base_url}js/jquery.sha1.js"></script>
    {/if}
    
    {if $data_view.controller eq 'pages'}
        <script type="text/javascript" src="{$base_url}js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="{$base_url}js/ckeditor/adapters/jquery.js"></script>
    {/if}
    
    {if $data_view.pagejs eq 1}
        {literal}
        <script language="javascript" type="text/javascript">
            var base_url = '{/literal}{$base_url}{literal}';
        </script>
        {/literal}
        
        <script src="{$base_url}js/pages/{$data_view.alias}.js"></script>
    {/if}
  </body>
</html>