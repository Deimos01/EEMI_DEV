$(function(){
         $.urlParam = function(speed){
          var results = new RegExp('[\\?&amp;]' + speed + '=([^&amp;#]*)').exec(window.location.href);
          return results[1] || 0;
         
      }
      console.log($.urlParam('speed'));
      var speed = $.urlParam('speed');
      setInterval(function(speed){  
         $(".slideshow ul").animate({marginLeft:-1200},800,function(){  
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));  
         })  
      }, speed);  
   });  
