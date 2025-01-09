console.log("Upload Custom Script");
(function( $ ) {
	'use strict';

    // Element to active
    var cargando = $("#cargando");
  
    // Event ajax start
    $(document).ajaxStart(function() {
      cargando.show();
    });
  
    // Event ajax stop
    $(document).ajaxStop(function() {
      cargando.hide();
    });
  
    // Sen ajax any
   /* $.post("ajax/test.html", function(data) {
      $(".result").html(data);
    });*/
 // });

 

})( jQuery );

