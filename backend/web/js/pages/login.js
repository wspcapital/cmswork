$(function(){
       
       $("button").bind('click',function(e){
           e.preventDefault();
           
           $("#email").parent().parent().removeClass('has-error');
           $("#pass").parent().parent().removeClass('has-error'); 
           
           var reEmail = /^[^@]+@[^@]+.[a-z]{2,}$/i;
           var rePass = /^[A-Za-z0-9\-\.\_]{3,32}$/i;
           
           var userEmail = $("#email").val();
           var userPass = $("#pass").val();
           
           if(userEmail.search(reEmail) != -1 && userPass.search(rePass) != -1)
           {
               
              $.get(base_url+'getloginsalt/'+$.md5($("#email").val()), function(data){
                  
                if(data.length > 0)
                {
                  var userHashPass = $.md5(data + $.sha1(userPass) + data);
                  $("#pass").parent().parent().hide();
                  $("#pass").val(userHashPass);
                  $("form").submit();
                } 
                else{
                    $("#email").val('');
                    $("#email").parent().parent().addClass('has-error');
                } 
                  
              });
           }
           else
           {
             if(userEmail.search(reEmail) == -1)
             {
               $("#email").val('');
               $("#email").parent().parent().addClass('has-error');  
             }
             
             if(userPass.search(rePass) == -1)
             {
               $("#pass").val('');
               $("#pass").parent().parent().addClass('has-error');  
             }
             
           }
           return;
       });
       
   });