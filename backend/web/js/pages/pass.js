$(function(){
       
       $("button").bind('click',function(e){
           e.preventDefault();

           var rePass = /^[A-Za-z0-9\-\.\_]{5,32}$/i;
           
           var userPass = $("#pass").val();
           var newPass = $("#newpass").val();
           var confPass = $("#confpass").val();
           
           $("input[type='password']").val('');
           
           if(userPass.search(rePass) != -1 && newPass.search(rePass) != -1 && confPass.search(rePass) != -1)
           {
              $.get(base_url+'getsalt/', function(data){
                  
                if(data.length > 0)
                {
                  var userHashPass = $.md5(data + $.sha1(userPass) + data);
                  $("#pass").val(userHashPass);
                  $("#newpass").val($.sha1(newPass));
                  $("#confpass").val($.sha1(confPass));
                  $("form").submit();
                }
                  
              });
           }
           return;
       });
       
   });