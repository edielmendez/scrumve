$(document).ready(function(){
  console.log("listo");
  $( ".column" ).sortable({
    connectWith: ".column",
    handle: ".portlet-header",
    cancel: ".portlet-toggle",
    start: function (event, ui) {
      ui.item.addClass('tilt');
    },
    stop: function (event, ui) {
      ui.item.removeClass('tilt');
      var idActividad = ui.item[0].children[0].id;

      var estado = ui.item[0].parentNode.id

      

      $.ajax({
        method: "POST",
        url: "http://127.0.0.1/laravel/index.php/Sprint/updateEstadoActividad",
        data: { id: idActividad , estado:estado}
      })
      .success(function(data){
        console.log(data)
        
      })
      .error(function(err){
        console.log(err);
      })

      
    }
  });

  $( ".portlet" )
    .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
    .find( ".portlet-header" )
      .addClass( "ui-widget-header ui-corner-all" )
      .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");

  $( ".portlet-toggle" ).click(function() {
    var icon = $( this );
    icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
    icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
  });

});

