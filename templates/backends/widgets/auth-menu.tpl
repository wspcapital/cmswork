        <div class="table-responsive">
            <ul class="nav nav-tabs">
                {if $data_view['controller']|default:'' eq 'profile'}<li role="presentation" class="active"><a>{$t.profile_master}</a></li>{else}<li role="presentation"><a href="{$base_url}profile/">{$t.profile_master}</a></li>{/if}
                {if $data_view['controller']|default:'' eq 'pwdchange'}<li role="presentation" class="active"><a>{$t.change_passwd}</a></li>{else}<li role="presentation"><a href="{$base_url}pass/">{$t.change_passwd}</a></li>{/if}
                <li role="presentation"><a href="#">{$t.artfactories}</a></li>
            </ul>    
        </div>