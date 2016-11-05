/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $(document).ready(function(){
             $(".reply-content-box img").each(function(index){
                 var maxWidth = 120;
                 var maxHeight = 120;
                 var ratio = 0;
                 var width = $(this).width();
                 var height = $(this).height();
     
                if(width > maxWidth){
                  ratio = maxWidth / width;
                  $(this).css("width", maxWidth);
                  $(this).css("height", height * ratio);
                 height = height * ratio;
               }
               var width = $(this).width();
              var height = $(this).height();
              if(height > maxHeight){
                 ratio = maxHeight / height;
                 $(this).css("height", maxHeight);
                 $(this).css("width", width * ratio);
                width = width * ratio;
               }
             })
         })

