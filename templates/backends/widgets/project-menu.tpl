    <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            {if $data_view['controller']|default:'' neq 'index'}<li><a href="{$base_url}control/">{$t.mainctrl}</a></li>{else}<li class="active"><a href="{$base_url}control/">{$t.mainctrl} <span class="sr-only">(current)</span></a></li>{/if}
            
            {if $data_view['controller']|default:'' neq 'pages'}
                <li><a href="{$base_url}pagscrl/">{$t.pagscrl}</a></li>
            {else}
                <li class="active"><a href="{$base_url}pagscrl/">{$t.pagscrl} <span class="sr-only">(current)</span></a></li>
            {/if}
            
            {if $data_view['controller']|default:'' neq 'news'}
                <li><a href="{$base_url}newscrl/">{$t.newscrl}</a></li>
            {else}
                <li class="active"><a href="{$base_url}newscrl/">{$t.newscrl} <span class="sr-only">(current)</span></a></li>
                <div class="list-group">
                    <a href="{$base_url}setnews/" class="list-group-item">{$t['add_news']}</a>
                </div>
            {/if}
            
            {if $data_view['controller']|default:'' neq 'anons' and $data_view['controller']|default:'' neq 'newanons'}
                <li><a href="{$base_url}anonscrl/">{$t.anonscrl}</a></li>
            {else}
                <li class="active"><a href="{$base_url}anonscrl/">{$t.anonscrl} <span class="sr-only">(current)</span></a></li>
                <div class="list-group">
                    <a href="{$base_url}newanons/" class="list-group-item">{$t['new_anons']}</a>
                </div>
            {/if}
            
            {if $data_view['controller']|default:'' neq 'forms'}
                <li><a href="{$base_url}formscrl/">{$t.formscrl}</a></li>
            {else}
                <li class="active"><a href="{$base_url}formscrl/">{$t.formscrl} <span class="sr-only">(current)</span></a></li>
            {/if}
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="{$base_url}userscrl/">{$t.userscrl}</a></li>
            <li><a href="{$base_url}newslettscrl/">{$t.newslettscrl}</a></li>
            <li><a href="{$base_url}tcrl/">{$t.tcrl}</a></li>
            {if $data_view['controller']|default:'' neq 'galleries' AND $data_view['controller']|default:'' neq 'addphoto' }
                <li><a href="{$base_url}gallercrl/">{$t.gallercrl}</a></li>
            {else}
                {if $data_view['controller']|default:'' neq 'addphoto'}
                   <li class="active"><a href="{$base_url}gallercrl/">{$t.gallercrl} <span class="sr-only">(current)</span></a></li>
                   <div class="list-group">
                        <li><a href="{$base_url}newgallercrl/" class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;{$t['new_gall']}</a></li>
                   </div>
                {else}
                   <li><a href="{$base_url}gallercrl/">{$t.gallercrl}</a></li>
                    <li class="active"><a href="{$base_url}newgallercrl/" class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;{$t['new_gall']} <span class="sr-only">(current)</span></a></li>                  
                {/if}
            {/if}
          </ul>
    </div>