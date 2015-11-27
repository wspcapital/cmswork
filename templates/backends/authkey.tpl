{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<!-- Begin page content -->
    <div class="container page-content super-wrapper">
        
        <div class="page-header">
         <h3>{$t.form_signin}</h3>
        </div>
        
        {if $data_view.page_except|default:'' neq ''}
        <div class="alert alert-danger" role="alert">
            <span class="sr-only">Error:</span> {$t[$data_view.page_except]}
        </div>
        {/if}

        {include file="widgets/form.tpl" form=$form}

    </div>

{include file="footer.tpl"}