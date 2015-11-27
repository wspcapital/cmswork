{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<!-- Begin page content -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
             
            {include file="widgets/profile-menu.tpl"}
            
            <div class="page-header"></div>
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
    
            {include file="widgets/form.tpl" form=$form}
            
            <div class="bs-example">
                 <p class="lead">{$t.affiliate}</p>
            </div>
            <div class="highlight">
                <pre>
                    <code class="language-html" data-lang="html"><span class="nt">{$base_url}{$data_view['field_val']['user_confirm']}/</span></code>
                </pre>
            </div>
                    {if $data_view['field_val']['user_status'] eq 11}<div class="bs-example"><a href="{$base_url}control/" target="_blanc">{$t.control_panel}</a></div>{/if}
        
    
</div>

{include file="footer.tpl"}