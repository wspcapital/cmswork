{* Smarty *}
{include file="header.tpl" base_url=$base_url}

<!-- Begin page content -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">{$t['common_static_data']}</h2>

          <div class="row placeholders">
              <table class="table table-striped">
                  <tr>
                     <td align='left'>{$t['total_auth_users']}</td>
                  </tr>
                  <tr>
                     <td align='left'>{$t['auth_users_current']}</td>
                  </tr>
                  <tr>
                     <td align='left'>{$t['auth_users_current']}</td>
                  </tr>
              </table>
          </div>

          <h2 class="sub-header">{$t['langs_static_data']}</h2>
          <div class="table-responsive">
             <table class="table table-striped">
                  <tr>
                     <td align='left'>{$t['auth_user_lang_team']}&nbsp;(Pl)</td>
                  </tr>
                  <tr>
                     <td align='left'>{$t['auth_user_lang_team']}&nbsp;(En)</td>
                  </tr>
                  <tr>
                     <td align='left'>{$t['auth_user_lang_team']}&nbsp;(Ua)</td>
                  </tr>
                  <tr>
                     <td align='left'>{$t['auth_user_lang_team']}&nbsp;(Ru)</td>
                  </tr>
              </table>
          </div>
        </div>
      


{include file="footer.tpl"}
