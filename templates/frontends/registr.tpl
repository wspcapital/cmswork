{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="page-header">{$t.form_registr}</h2>

  <div class="row placeholders">
  {if $data_view.page_except|default:'' neq ''}
  {assign var='form' value=''}
  <div class="alert alert-danger" role="alert">
    <span class="sr-only">Error:</span> {$t[$data_view.page_except]|default:$data_view.page_except}
  </div>
  {/if}

  {if $data_view.page_success|default:'' neq ''}
  {assign var='form' value=''}
  <div class="alert alert-success" role="alert">
    <span class="sr-only">Error:</span> {$t[$data_view.page_success]}
  </div>
  {/if}

  {include file="widgets/form.tpl" form=$form}
  
   </div>
</div>
  
{include file="footer.tpl"}
