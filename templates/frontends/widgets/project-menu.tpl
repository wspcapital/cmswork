    <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            {if $data_view['controller']|default:'' eq 'index'}
                <li class="active"><a href="{$base_url}">{$t.mainctrl} <span class="sr-only">(current)</span></a></li>
            {else}
                <li><a href="{$base_url}">{$t.mainctrl}</a></li>
            {/if}
            
            {if $data_view['controller']|default:'' eq 'profile' ||  $data_view['controller']|default:'' eq 'pwdchange'}
                <li class="active"><a href="{$base_url}profile/">{$t.profile_trader} <span class="sr-only">(current)</span></a></li>
            {else}
                <li><a href="{$base_url}profile/">{$t.profile_trader}</a></li>
            {/if}
          </ul>
          <ul class="nav nav-sidebar">
            
            {if $data_view['controller']|default:'' neq 'about'}
                <li><a href="{$base_url}aboutus/">{$t.about_us}</a></li>
            {else}
                <li class="active"><a href="{$base_url}aboutus/">{$t.about_us} <span class="sr-only">(current)</span></a></li>
            {/if}
            
            {if $data_view['controller']|default:'' neq 'contact'}
                <li><a href="{$base_url}contacts/">{$t.our_contacts}</a></li>
            {else}
                <li class="active"><a href="{$base_url}contacts/">{$t.our_contacts} <span class="sr-only">(current)</span></a></li>
            {/if}
            
          </ul>
    </div>