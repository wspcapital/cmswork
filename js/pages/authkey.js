$(function(){
    
   $("form").bind('submit', function(event){
       
       var auth_key = $.trim($("#akey").val().split(' ').join(''));
       var hash_key = $.trim($("#hkey").val().split(' ').join(''));
       
       $("#hkey").val($.md5(hash_key));
       
       if(auth_key.length == 8 && hash_key.length > 0)
       {
         $("#akey").hide();
         $("#akey").val($.md5(hash_key + auth_key + hash_key));
       }
       else event.preventDefault();
       return;
   });
   
   $("#akey").bind('keyup', function(){
        if($(this).val().search(/^[0-9\s]{1,12}?$/) == -1 && $(this).val().length > 0)
        {
           $(this).parent().parent().addClass('has-error');
        }
        else $(this).parent().parent().removeClass('has-error');
   });
   
});