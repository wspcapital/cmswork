<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{$base_url}">{$t.Project_Name|default:'translate absent'}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        
      <ul class="nav navbar-nav navbar-right">
        {if $user_name_header|default:'' neq ''}
           <li><a href='{$base_url}profile/'>{$user_name_header}</a></li>
           <li><a href="{$base_url}controlout/">{$t.logout}</a></li>
        {else}
           {if $data_view['controller']|default:'' neq 'login'}<li><a href="{$base_url}login/">{$t.form_signin}</a></li>{else}<li  class="active"><a>{$t.form_signin}</a></li>{/if}
           
        {/if}
      </ul>
        </div>
      </div>
    </nav>