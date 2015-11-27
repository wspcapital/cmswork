{if $form|default:'' neq ''}
    <form class="form-horizontal" data-example-id="simple-input-groups" method="post" action="" autocomplete="off">
      {foreach from=$form item=fields key=field}
        {if $fields['type'] eq 'hidden'}
            <input type='{$fields['type']}' name='{$field}' value='{$fields['val']}' {if $fields['id']|default:'' neq ''}id='{$fields['id']}'{/if} />
        {/if}
        
        {if $fields['type'] eq 'text'}
        <div class="form-group {*has-success*} {if $data_view.errors[$field]|default:'' neq '' }has-error{/if}">
          {*<div class="input-group">*}
          <label class="control-label col-sm-3" for="{$fields['id']}">{$t.$field}</label>

          <div class="col-sm-9">
            <input type="{$fields['type']}" {if $fields['disabled']}disabled{else}name="{$field}"{/if} class="{$fields['class']}" id="{$fields['id']}" value='{$fields['val']}' aria-describedby="inputSuccess3Status" placeholder="" aria-describedby="basic-addon1" />
            <span class="alert-danger">{if $data_view.errors[$field]|default:'' neq '' }{$t[$data_view.errors[$field]]}{/if}</span>
          </div>
          {*</div>*}
        </div>
        {/if}
        
        {if $fields['type'] eq 'password'}
        <div class="form-group {*has-success*} {if $data_view.errors[$field]|default:'' neq '' }has-error{/if}">
          {*<div class="input-group">*}
          <label class="control-label col-sm-3" for="{$fields['id']}">{$t.$field}</label>

          <div class="col-sm-9">
            <input type="{$fields['type']}" name="{$field}" class="{$fields['class']}" id="{$fields['id']}" aria-describedby="inputSuccess3Status" placeholder="" aria-describedby="basic-addon1" />
            <span class="alert-danger">{if $data_view.errors[$field]|default:'' neq '' }{$t[$data_view.errors[$field]]}{/if}</span>
          </div>
          {*</div>*}
        </div>
        {/if}
        
        {if $fields['type'] eq 'select'}
            <div class="form-group {*has-success*} {if $data_view.errors[$field]|default:'' neq '' }has-error{/if}">
          {*<div class="input-group">*}
          <label class="control-label col-sm-3" for="{$fields['id']}">{$t.$field}</label>

          <div class="col-sm-9">
            <select name="{$field}" id="{$fields['id']}" class="{$fields['class']}">
                {if $fields['val'] eq ''}<option value="">{$t['set_select_'|cat:$field]}</option>{/if}
                {foreach from=$fields['options'] item=option_val key=option}
                    <option value="{$option}" {if $option eq $fields['val']}selected{/if}>{$option_val}</option>
                {/foreach}
            </select>
            <span class="alert-danger">{if $data_view.errors[$field]|default:'' neq '' }{$t[$data_view.errors[$field]]}{/if}</span>
          </div>
          {*</div>*}
        </div>
        {/if}
        
        {if $fields['type'] eq 'checkbox'}
            <div class="form-group {*has-success*} {*has-error*}">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            {foreach from=$fields['options'] item=option_val key=option}
                                <input type="{$fields['type']}" name="{$field}" id="{$fields['id']}" value="{$option_val}" {if $option_val eq $fields['val']}checked{/if}> {$t.$option}
                            {/foreach}
                        </label>
                    </div>
                </div>
            </div>
        {/if}
        
        {if $fields['type'] eq 'textarea'}
            <div class="form-group {*has-success*} {if $data_view.errors[$field]|default:'' neq '' }has-error{/if}">
          {*<div class="input-group">*}
          <label class="control-label col-sm-3" for="{$fields['id']}">{$t.$field}</label>

          <div class="col-sm-9">
              <textarea {if $fields['disabled']}disabled{else}name="{$field}"{/if} class="{$fields['class']}" id="{$fields['id']}" 
                        value='{$fields['val']}' aria-describedby="inputSuccess3Status" placeholder="" aria-describedby="basic-addon1" 
                        {if $fields['rows']|default:0 neq 0}rows='{$fields['rows']}'{/if} {if $fields['cols']|default:0 neq 0}cols='{$fields['cols']}'{/if} >{$fields['val']}</textarea>
            <span class="alert-danger">{if $data_view.errors[$field]|default:'' neq '' }{$t[$data_view.errors[$field]]}{/if}</span>
          </div>
          {*</div>*}
        </div>
        {/if}
        
      {/foreach}
      <div class="form-group col-sm-12 text-center">
        <button type="submit" class="btn btn-default">{$t.submit_form}</button>
      </div>
    </form>
  {/if}