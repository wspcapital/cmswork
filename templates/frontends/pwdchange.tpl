{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<!-- Begin page content -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        {include file="widgets/profile-menu.tpl"}
            <div class="page-header"></h3></div>
            {if $data_view.page_except|default:'' neq ''}
            <div class="alert alert-danger" role="alert">
                <span class="sr-only">Error:</span> {$t[$data_view.page_except]}
            </div>
            {/if}
            
            {if $data_view.page_success|default:'' neq ''}
                
                <div class="alert alert-success" role="alert">
                    <span class="sr-only">Error:</span> {$t[$data_view.page_success]}
                </div>
            {/if}

            {if $form|default:'' neq ''}{include file="widgets/form.tpl" form=$form}{/if}
        
    </div>

{include file="footer.tpl"}