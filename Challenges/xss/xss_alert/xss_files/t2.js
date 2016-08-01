function myAjax1() {
      $.ajax({
           type: "POST",
           url: '11.php',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }
      });
 }