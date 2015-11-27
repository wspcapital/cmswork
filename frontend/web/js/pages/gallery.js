$(function(){
       $(this).bind("contextmenu", function(e) {e.preventDefault();});
       if($("li.dropdown").hasClass('open_gallery_list')) $('a.dropdown-toggle').click();
       
       $('a.thumbnail').bind('click',function(e){
           e.preventDefault();
           var rat = $(this).parent().find('input.rat').val();
           
           $('div.modal-body img').attr('src',$('img',this).attr('src')); 
           $('div.modal-header h4').html($('img',this).attr('alt'));
           
           if(rat >= 1)
           {
              $('div.modal-body img').removeAttr('height');
              $('div.modal-body img').attr('width','830px');
              $('div.modal-dialog').removeClass('modal-lim');
              $('#fullsize').addClass('bs-example-modal-lg');
              $('div.modal-dialog').addClass('modal-lg');
           }
           else if(rat < 1) 
           {
              $('div.modal-body img').removeAttr('width');
              $('div.modal-body img').attr('height','530px');
              $('#fullsize').removeClass('bs-example-modal-lg');
              $('div.modal-dialog').removeClass('modal-lg');
              $('div.modal-dialog').addClass('modal-lim');
           }
           $('#fullsize').modal('toggle');
       });
       
       $("#next_fullsize").bind('click',function(){
           var currFoto = $(this).parent().parent().find('img').attr('src');
           var nextFoto='';
           var foto_comment = '';
           var rate = 0;
           var tr=0;
           $('div.col-xs-6').each(function(){
              if(tr==1)
              {
                nextFoto=$('img',this).attr('src');
                foto_comment=$('img',this).attr('alt');
                rate = $('input',this).val();
                return false;
              }
              if($('img',this).attr('src') == currFoto)
              {
                tr=1;
              }
           });
           if(nextFoto !='')
           {
             if($(this).parent().parent().parent().hasClass('modal-lg') && rate < 1)
             {
               $(this).parent().parent().parent().parent().removeClass('bs-example-modal-lg');
               $(this).parent().parent().parent().removeClass('modal-lg');
               $(this).parent().parent().parent().addClass('modal-lim');
               $(this).parent().parent().find('img').removeAttr('width');
               $(this).parent().parent().find('img').attr('height','530px');
             }
             else if(!$(this).parent().parent().parent().hasClass('modal-lg') && rate > 1)
             {
               $(this).parent().parent().parent().removeClass('modal-lim');
               $(this).parent().parent().parent().parent().addClass('bs-example-modal-lg');
               $(this).parent().parent().parent().addClass('modal-lg');
               $(this).parent().parent().find('img').removeAttr('height');
               $(this).parent().parent().find('img').attr('width','830px');
             }
             $(this).parent().parent().find('img').attr('src', nextFoto);
             $(this).parent().parent().find('.modal-title').html(foto_comment);
           }
       });
       
       $("#prev_fullsize").bind('click',function(){
           var currFoto = $(this).parent().parent().find('img').attr('src');
           var prevFoto='';
           var foto_comment = '';
           var foto='';
           var rate = 0;
           $('div.col-xs-6').each(function(){
              foto=$('img',this).attr('src');
              if(foto == currFoto)
              {
                return false;
              }
              else
              {
                prevFoto=foto;
                foto_comment=$('img',this).attr('alt');
                rate = $('input',this).val();
              }
           });
           if(prevFoto !='')
           {
             if($(this).parent().parent().parent().hasClass('modal-lg') && rate < 1)
             {
               $(this).parent().parent().parent().parent().removeClass('bs-example-modal-lg');
               $(this).parent().parent().parent().removeClass('modal-lg');
               $(this).parent().parent().parent().addClass('modal-lim');
               $(this).parent().parent().find('img').removeAttr('width');
               $(this).parent().parent().find('img').attr('height','530px');
             }
             else if(!$(this).parent().parent().parent().hasClass('modal-lg') && rate > 1)
             {
               $(this).parent().parent().parent().removeClass('modal-lim');
               $(this).parent().parent().parent().parent().addClass('bs-example-modal-lg');
               $(this).parent().parent().parent().addClass('modal-lg');
               $(this).parent().parent().find('img').removeAttr('height');
               $(this).parent().parent().find('img').attr('width','830px');
             }
             $(this).parent().parent().find('img').attr('src', prevFoto);
             $(this).parent().parent().find('.modal-title').html(foto_comment);
           }
       });
       
       $('#fullsize').on('hidden.bs.modal', function (e) {
          var CurrFoto = $(this).find('img').attr('src');
          var foto='';
          $('div.col-xs-6').each(function(){
              foto=$('img',this).attr('src');
              if(foto == CurrFoto)
              {
                $('html, body').animate({scrollTop: ($(this).offset().top-$('#navbar').height())}, 500);
                return false;
              }
           });
       });
       
       $("a[aria-label='Next']").bind('click',function(e){
           e.preventDefault();
           var next_num = parseInt($(this).attr('href')) + 1;
           var next_pg = '';
           if(next_num < 10) next_pg = '0'+ String(next_num);
           else next_pg = String(next_num);
           location.href=base_url+'gallery/gallery'+next_pg+'/'; 
       });
       
       $("a[aria-label='Previous']").bind('click',function(e){
           e.preventDefault();
           var prev_num = parseInt($(this).attr('href')) - 1;
           var prev_pg = '';
           if(prev_num < 10) prev_pg = '0'+ String(prev_num);
           else prev_pg = String(prev_num);
           location.href=base_url+'gallery/gallery'+prev_pg+'/';
       });
       
   });
