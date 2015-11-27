{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<!-- Begin page content -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">{$t['gall_man']}</h2>

        {if $galleries|default:0 neq 0}
            {foreach from=$galleries key=key item=item}
                <div class="media">
                   <div class="media-left">
                     <a href="#">
                       <img class="media-object" alt="128x128" data-src="holder.js/128x128" style="width: 128px; height: 128px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTBmYzYwNWUxMCB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MGZjNjA1ZTEwIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi45NTgzMzM5NjkxMTYyMTEiIHk9IjM2LjY1Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                     </a>
                   </div>
                   <div class="media-body">
                     <h4 class="media-heading">Media heading</h4>
                     ...
                   </div>
                </div>
            {/foreach}
        {/if}  
          
        </div>

{include file="footer.tpl"}
