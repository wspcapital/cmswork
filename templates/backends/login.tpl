{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<!-- Begin page content -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">{$t.form_signin}</h3>

          <div class="row placeholders">
            {if $data_view.page_except|default:'' neq ''}
            <div class="alert alert-danger" role="alert">
                <span class="sr-only">Error:</span> {$t[$data_view.page_except]}
            </div>
            {elseif $data_view.page_danger|default:'' neq ''}
            <div class="alert alert-danger" role="alert">
                <span class="sr-only">Error:</span> {$t[$data_view.page_danger]}
            </div>
            {elseif $data_view.page_warning|default:'' neq ''}
            <div class="alert alert-warning" role="alert">
                <span class="sr-only">Error:</span> {$t[$data_view.page_warning]}
            </div>
            {elseif $data_view.page_info|default:'' neq ''}
            <div class="alert alert-info" role="alert">
                <span class="sr-only">Info:</span> {$t[$data_view.page_info]}
            </div>
            {elseif $data_view.page_success|default:'' neq ''}
            <div class="alert alert-success" role="alert">
                <span class="sr-only">Success:</span> {$t[$data_view.page_success]}
            </div>
            {/if}
            {include file="widgets/form.tpl" form=$form}
          </div>
    </div>

{include file="footer.tpl"}