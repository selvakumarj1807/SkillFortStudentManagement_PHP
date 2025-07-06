 $("#dialog-confirm").click(function(){
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 350,
	  show: 'fade',
	  hide: 'fade',
      modal: true,
      buttons: {
        "Are you sure to Clear All ?": function() {
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });