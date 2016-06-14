$(document).ready(function(){
  $(".dropdown-button").dropdown();
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    onSet: function (ele) {
       if(ele.select){
              this.close();
       }
    },
    format: 'yyyy-mm-dd',
    min: new Date()

  });

  $('select').material_select();


  //$('.modal-trigger').leanModal();

});

/**
 * Eliminar proyecto
 */

$(document).on('click','.eliminarProyecto',function(){
  $("#modalEliminarProyecto").openModal();
  var id = $(this).attr('id');
  $("#idProyectoEliminar").val(id);
  
});

$(document).on('click','#btnAceptarEliminarProyecto',function(){
  var idEliminar = $("#idProyectoEliminar").val();
  window.location.href = "http://127.0.0.1/laravel/index.php/Project/delete/"+idEliminar;
});
/**
 * Eliminar Sprint
 */

$(document).on('click','.eliminarSprint',function(){
  $("#modalEliminarSprint").openModal();
  var id = $(this).attr('id');
  $("#sprintEliminar").val(id);
  
  
});

$(document).on('click','#btnAceptarEliminarSprint',function(){
  
  var id = $("#sprintEliminar").val();
  var idproyecto = $("#proyectoActual").val();

  window.location.href = "http://127.0.0.1/laravel/index.php/Sprint/delete/"+id+"/"+idproyecto;


});

/**
 *
 * 
 */

$("#formNuevaActividad" ).submit(function( event ) {
  var r = $("#selectResponsable option:selected").text();

  if(r==="Escoje un responsable"){
    Materialize.toast("Escoja un responsable !",3000);
    event.preventDefault();
  }

   

});

$(document).on('click','.verResponsable',function(){
  var aux = $(this).attr("id");
  ids = aux.split('-');
  
  $.ajax({
    method: "POST",
    url: "http://127.0.0.1/laravel/index.php/Personal/getById",
    data: { id: ids[0] }
  })
  .success(function(data){
    res = JSON.parse(data);
    //console.log(res)
    $("#nombreResponsable").text(res.nombre);
    $("#ActividadCambiarResponsable").val(ids[1]);
    
  })
  .error(function(err){
    console.log(err);
  })

  

  $.ajax({
    method: "POST",
    url: "http://127.0.0.1/laravel/index.php/Personal/getAll"
  })
  .success(function(data){
    res = JSON.parse(data);
    $("#selectResponsable").empty();
    $("#selectResponsable").append("<option value='0' disabled selected>Escoje un responsable</option>");
    for (var i = 0; i < res.length; i++) {

      $('#selectResponsable').append($('<option>', {
          value: res[i].id,
          text: res[i].nombre
      }));
      //console.log(i,res[i].nombre)
      
      //$("#selectResponsable").append("<option value="+res[i].id+">"+res[i].nombre+"</option>");
    }
    $("#modalResponsable").openModal();
    //$("#selectResponsable").append('<option>'+data.+'</option>');
    
  })
  .error(function(err){
    console.log(err);
  })


  


});


$(document).on('click','#btnAceptarActualizarResponsable',function(){
  var idNuevoResponsable = $("#selectResponsable").val();
  var id = $("#ActividadCambiarResponsable").val();
  
  if((idNuevoResponsable==null) || (idNuevoResponsable==undefined) ){
    Materialize.toast('Sin cambio de responsable',4000);
    return;
  }
  
  $.ajax({
    method: "POST",
    url: "http://127.0.0.1/laravel/index.php/Sprint/actualizarResponsable",
    data: { id: id , idNuevoResponsable : idNuevoResponsable }
  })
  .success(function(data){
    window.location.reload();
    Materialize.toast('Responsable Actualizado');
  })
  .error(function(err){
    console.log(err);
  })
});


/**
 * Modal actualizar Actividad
 * 
 */
$(document).on('click','.editarActividad',function(){
  id = $(this).attr("id");

  $.ajax({
    method: "POST",
    url: "http://127.0.0.1/laravel/index.php/Sprint/getActividadById",
    data: { id: id }
  })
  .success(function(data){
    res = JSON.parse(data);
    $("#txtNombreActividad").val(res.nombre);
    $("#txtDescripcionActividad").val(res.descripcion);
    $("#idActividadActualizar").val(res.id);
    $("#modalActualizarActividad").openModal();
    $("#txtNombreActividad").focus();
    
  })
  .error(function(err){
    console.log(err);
  })
  
  
});


$(document).on('click','#btnAceptarActualizarActividad',function(){
  var id = $("#idActividadActualizar").val();
  var nombre = $("#txtNombreActividad").val();
  var descripcion = $("#txtDescripcionActividad").val();

  $.ajax({
    method: "POST",
    url: "http://127.0.0.1/laravel/index.php/Sprint/actualizarActividad",
    data: { id: id ,nombre:nombre,descripcion:descripcion }
  })
  .success(function(data){
    window.location.reload();   
  })
  .error(function(err){
    console.log(err);
  })


});

/**
 * 
 */

/**
 * Modal eliminar Actividad
 * 
 */
$(document).on('click','.eliminarActividad',function(){
  var id = $(this).attr('id');
  $("#idEliminar").val(id);
  $("#modalEliminarActividad").openModal();
  
});

$(document).on('click','#aceptarEliminarActividad',function(){
 
  var id = $("#idEliminar").val();

  $.ajax({
    method: "POST",
    url: "http://127.0.0.1/laravel/index.php/Sprint/eliminarActividad",
    data: { id: id  }
  })
  .success(function(data){
    window.location.reload();   
  })
  .error(function(err){
    console.log(err);
  })
  
  
});
/**
 * 
 */
