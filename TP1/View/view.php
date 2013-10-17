  
  </ul><span style="clear: both"></span>
  </div>
  <script type="text/javascript" src="../Lib/jquery.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    setInterval(function() {
      $.ajax({
        type: 'POST',
        url: 'http://ns366377.ovh.net/~vaudore/3A/TP1/Lib/ajax.php',
        data: {
          action: 'end_loop_data',
          agence: <?php echo $agence; ?>,
          speed: <?php echo $speed; ?>,
        }
      }).done(function(print) {
            $( ".ajax" ).html(print);
        });
    }, <?php echo $total_time; ?>);
  });

</script>
  <script type="text/javascript">
    $(function(){
      setInterval(function(){  
         $(".slideshow ul").animate({marginLeft:-1200},800,function(){  
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));})  
             $(".bloc_img_big").animate({marginLeft:-1000},8000,function(){  
            $(this).css({marginLeft:0}).find("img:first").after($(this).find("img:last"));  
         
         })  
      }, <?php echo $speed ?>);
   });
  </script>
  </body>
  </html>
  

