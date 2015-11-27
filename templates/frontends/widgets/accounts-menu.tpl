        <div class="table-responsive">
            <ul class="nav nav-tabs">
                {if $data_view['controller']|default:'' eq 'metaprofile'}<li role="presentation" class="active"><a>{$t.metaprofile}</a></li>{else}<li role="presentation"><a href="{$base_url}accounts/">{$t.metaprofile}</a></li>{/if}
                {if $data_view['controller']|default:'' eq 'list_accs'}<li role="presentation" class="active"><a>{$t.list_accs}</a></li>{else}<li role="presentation"><a href="{$base_url}list/">{$t.list_accs}</a></li>{/if}
            </ul>    
        </div>