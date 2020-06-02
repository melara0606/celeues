
$(document).on('click','.modificarHorarios',function(){

      $("#btnGuardarHorarios").show();

      $("infoModalHeader").removeClass();
       $( '#infoModalHeader' ).addClass("alert-mint");


      $("#tablaInfo").empty();
      var form_id = $(this).val();
      console.log(form_id);

       $("#idCursosEditarHorarios").val(form_id);
          //$("#tablaEditarHorarios").empty();////Deja vacia la tabla
           $("#tablainfo").empty();
      $.ajax({

        type: "GET",
        url: $('#path').val()+'/curso/buscarHorarios/'+form_id,
        data: form_id,
        dataType: 'json',
        success: function (data) {
          console.log("kelvin");
      //  var row = '<th><td>Dia</td></th>';
          var row = '<tr><td width="30%"> Dia </td><td width="30%">hora inicio</td><td width="30%">hora fin</td>'+
          '<td width="10%"><button type="button" class=" btn btn-icon btn-trans btn-xs add-tooltip addHorariosDias"    '+
          '   value="1"><i class="ion-plus-round icon-lg " ></i></button>'+
          '</td></tr>';
       
          for (var i = 0; i < data['message'].length; i++) {
            // row += '<tr><td width="30%">' + data['message'][i].nombreDia + ': </td><td width="35%">';
               row +='<tr id="trowHorarios'+i+ '">'; 
                row +='<td width="30%"><div class="form-group "><select  class="form-control" id="first'+(i)+'" name="first'+(i)+'" >'+
              
             
             
                                  +'</select></div></td>';
              
               row += '<td width="30%"><input class="form-control" type="time" placeholder="$" id="second'+(i)+'" name="second'+(i)+'" value="'+data['message'][i].horaInicio + '"></td>';
            
               row +='<td width="30%"><input class="form-control" type="time" placeholder="$" id="third'+(i)+'" name="third'+(i)+'" value="'+data['message'][i].horaFin + '"></td>';
                   if(i==0){
                  row +='<td width="10%"><button disabled="disabled" type="button" class=" btn btn-icon btn-trans btn-xs add-tooltip deleteHorariosDias"   '+
                'data-original-title="Eliminar" value="'+i+ '">'+
                '<i class="ion-trash-b icon-lg " ></i></button>'
                   }
                   else{
               row +='<td width="10%"><button type="button" class=" btn btn-icon btn-trans btn-xs add-tooltip deleteHorariosDias"   '+
                'data-original-title="Eliminar" value="'+i+ '">'+
                '<i class="ion-trash-b icon-lg " ></i></button>';
             // row +='<button class=" btn btn-icon btn-trans btn-xs  add-tooltip  data-original-title="Eliminar" data-container="body"  value="'+data['message'][i].id + '"><i class="ion-plus-round icon-lg " ></i></button>';
                }
               row +='</td>';

                   row +='</tr>';

            }
            $("#countDiasHorarios").val(i);

          /// $("#tablaEditarHorarios").append(row);
            $("#tablainfo").append(row);
           
           for (var i = 0; i < data['message'].length; i++) {
               
                $("#first"+i+"").append('<option value="1">Lunes</option>');
                $("#first"+i+"").append('<option value="2">martes</option>');
                 $("#first"+i+"").append('<option value="3">Miércoles</option>');
                 $("#first"+i+"").append('<option value="4">Jueves</option>');
                 $("#first"+i+"").append('<option value="5">Viernes</option>');
                 $("#first"+i+"").append('<option value="6">Sábado</option>');
                 $("#first"+i+"").append('<option value="7">Domingo</option>');//+
                                     
                 $("#first"+i+"").val(""+data['message'][i].numDia + "");
              //$("#first"+i+"").prop("selectedIndex", data['message'][i].numDia);
            }
        },
        error: function (data) {
          console.log('Error de boton Info:', data);
        }
      });

      //$('#modalEditarHorarios').modal('show'); ///modal de informacion
});

$(document).on('click','.addHorariosDias',function(){
     i=Number($("#countDiasHorarios").val());
   var cont=$("#countDiasHorarios").val(i+1);

     row ='<tr id="trowHorarios'+i+ '">'; 
                row +='<td width="30%"><div class="form-group "><select  class="form-control" id="first'+i+'" name="first'+i+'" >'+ 
                                  +'</select></div></td>';
               row += '<td width="30%"><input class="form-control" type="time" placeholder="$" id="second'+i+'" name="second'+i+'" value=""></td>';
          
               row +='<td width="30%"><input class="form-control" type="time" placeholder="$" id="third'+i+'" name="third'+i+'" value=""></td>';
                   
               row +='<td width="10%"><button type="button" class=" btn btn-icon btn-trans btn-xs add-tooltip deleteHorariosDias"   '+
                'data-original-title="Eliminar" value="'+i+ '">'+
                '<i class="ion-trash-b icon-lg " ></i></button>';
             // row +='<button class=" btn btn-icon btn-trans btn-xs  add-tooltip  data-original-title="Eliminar" data-container="body"  value="'+data['message'][i].id + '"><i class="ion-plus-round icon-lg " ></i></button>';

               row +='</td>';

                   row +='</tr>';

                

 
      $("#tablainfo").append(row);
                 $("#first"+i).append('<option value="1">Lunes</option>');
                 $("#first"+i).append('<option value="2">martes</option>');
                 $("#first"+i).append('<option value="3">Miércoles</option>');
                 $("#first"+i).append('<option value="4">Jueves</option>');
                 $("#first"+i).append('<option value="5">Viernes</option>');
                 $("#first"+i).append('<option value="6">Sábado</option>');
                 $("#first"+i).append('<option value="7">Domingo</option>');//+
     
});
$(document).on('click','.deleteHorariosDias',function(){
      var value = $(this).val();
      $("#trowHorarios" + value).remove();
});
 
 $(document).on('click','.editBoton',function(){
  var value = $(this).val();
    $('#modalCategoriaNueva').modal('show');  
    $('#idCursosModificarCat').val(value); 
    $("#ncatid").empty();
      $.getJSON($('#path').val()+'/curso/bus/categoria', function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
         //     $.each(data[i], function(key, val) {
            //$("#tabla").append('<tr id="task"><td>"'+data[i].nombre+'"</td><td>"'+data[i].ide+'"</td></tr>');
         $("#ncatid").append('<option value="' + data[i].id + '">' + data[i].nombre + '   ' + data[i].edadInicio + ' - ' + data[i].edadFin + ' años</option>');
         
         //   $('input[name="cat_id"]')[0].val('<option value="' + data[i].id + '">' + data[i].nombre + '   ' + data[i].edadInicio + ' - ' + data[i].edadFin + ' años</option>');
         
         //   output += '<option value="' + data[i].ide + '">' + data[i].nombre + '</option>';
       // });
            };      
           });
      $('#nnombre').val(0.00);

});

 $(document).on('click','.addCategoria',function(){
    $('#modalIngreso').modal('show');   

});

 /*////////////////////////////Accion dar alta y baja a categoria////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click','.darbaja',function(){
     var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(0);
     $('#msjAB').html("<p>Esta seguro de dar de baja esta categoria?. Al realizar esta accion no se podra elegir niveles al momento </p>");

     $('#modalMsj').modal('show'); ///modal de informacion
});
$(document).on('click','.darAlta',function(){
      var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(1);
  $('#msjAB').html("<p>Esta seguro de continuar con la accion </p>");

     $('#modalMsj').modal('show'); ///modal de informacion
});


$("#btnGuardarMsj").click(function (e) {
var value = $('#registro_id').val();
 //token siempre para ingresar y modificar
$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })

      e.preventDefault();
var formData = {
   estado:$('#estadoAB').val(),
 }
  $.ajax({
          type: "PUT",
          url: 'curso/cambiarEstado/'+value,
          data: formData,
          dataType: 'json',
          success: function (data) {
              console.log(data);
             $.niftyNoty({
              type: "success",
              container : "floating",
              title : "Bien Hecho!",
              message : data,
              closeBtn : false,
              timer : 3000
              });

              setTimeout(function(){
                   window.location.reload();////recarga la pagina actual


               }, 4000);
          },
          error: function (data) {
              console.log('Error al dar Baja:', data);
              $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : "A ocurrido un problema",
              closeBtn : false,
              timer : 3000
              });
          }
     });

    $('#modalMsj').modal('hide');
  });

*//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////Fin accion dar alta y baja a categoria////////////////////////////////////////


 /////////////////////////////Accion dar alta y baja a categoria////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click','.darbajaCurso',function(){
  console.log('entro');
     var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(0);
     $('#msjAB').html("<p>Esta seguro dar baja a curso? </p>");

     $('#modalMsj').modal('show'); ///modal de informacion
});
$(document).on('click','.darAltaCurso',function(){
      var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(1);
  $('#msjAB').html("<p>Esta seguro de continuar con la acción </p>");

     $('#modalMsj').modal('show'); ///modal de informacion
});


$("#btnGuardarMsjMotivo").click(function (e) {
var value = $('#registro_id').val();
 //token siempre para ingresar y modificar
$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })

      e.preventDefault();
var formData = {
   estado:$('#estadoAB').val(),
 }
  $.ajax({
          type: "PUT",
          url: $('#path').val()+'/curso/cambiarEstadoCurso/'+value,
          data: formData,
          dataType: 'json',
          success: function (data) {
              console.log(data);
             $.niftyNoty({
              type: "success",
              container : "floating",
              title : "Bien Hecho!",
              message : data,
              closeBtn : false,
              timer : 3000
              });

              setTimeout(function(){
                   window.location.reload();////recarga la pagina actual


               }, 4000);
          },
          error: function (data) {
              console.log('Error al dar Baja:', data);
              $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : "A ocurrido un problema",
              closeBtn : false,
              timer : 3000
              });
          }
     });

    $('#modalMsj').modal('hide');
  });

//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////Fin accion dar alta y baja a categoria////////////////////////////////////////


$(document).on('click','.infoHorariosModal',function(){
 
$("#btnGuardarHorarios").hide();

$('#infoModalHeader' ).removeClass();
$('#infoModalHeader' ).addClass("modal-header alert-info");

var form_id = $(this).val();
 $("#botonEditarHorario").val(form_id);
    $("#tablainfo").empty();////Deja vacia la tabla

$.ajax({

  type: "GET",
  url: $('#path').val()+'/curso/buscarHorarios/'+form_id,
  data: form_id,
  dataType: 'json',
  success: function (data) {
    console.log(data);

    var row = '<th><td>Dia</td></th>';
    var row = '<tr><td width="30%"> Dia </td><td width="35%">hora inicio</td><td width="35%">hora fin</td></th>';
 
    for (var i = 0; i < data['message'].length; i++) {

    
//    var row = '<tr><td width="30%">' + data[i].nombreDia + ': </td><td width="35%">' + data[i].horaInicio + '</td><td width="35%">' + data[i].horaFin + '</td>';
     row += '<tr><td width="30%">' + data['message'][i].nombreDia + ': </td><td width="35%">' + data['message'][i].horaInicio + '</td><td width="35%">' + data['message'][i].horaFin + '</td>';

   /* row +='<tr><td> Apellido: </td><td>' + data.apellido + '</td>';
    row +='<tr><td> Email: </td><td>' + data.email + '</td>';
    row +='<tr><td> DUI: </td><td>' + data.dui + '</td>';
    row +='<tr><td> Telefono: </td><td>' + data.telefono + '</td>';
    row +='<tr><td> Telefono: </td><td>' + data.nit + '</td>';
    row +='<tr><td> Telefono: </td><td>' + data.ncuenta + '</td>';
    row +='<tr><td> Creado: </td><td>' + data.created_at + '</td>';
    $("#tablainfo").append(row); ///Se añade a la tabla
 */   
  }

     $("#tablainfo").append(row);
  },
  error: function (data) {
    console.log('Error de boton Info:', data);
  }
});

$('#modalInfo').modal('show'); ///modal de informacion
});

/*function llenarSelectFormulario(){
  //  $("#resp_id").empty();
 //Otra forma de realizar el get ajax el mismo de infomodal    
    $.getJSON($('#path').val()+'/curso/bus/selectformulario', function (data) {
          //success data
            console.log(data);     
         for (var i = 0; i < data['idioma'].length; i++) {
                $("#idioma_id").append('<option value="' + data['idioma'][i].id + '">' + data['idioma'][i].nombre + '</option>');
         };  
         for (var i = 0; i < data['modalidad'].length; i++) {
                 $("#moda_id").append('<option value="' + data['modalidad'][i].id + '">' + data['modalidad'][i].nombre + ' ' + data['modalidad'][i].turno + '</option>');
         };  
         for (var i = 0; i < data['categoria'].length; i++) {
                $("#cat_id").append('<option value="' + data['categoria'][i].id + '">' + data['categoria'][i].nombre + '   ' + data['categoria'][i].edadInicio + ' - ' + data['categoria'][i].edadFin + ' años</option>');
         };   

    });


}*/

function llenarSelectIdioma(){
  //  $("#resp_id").empty();
 //Otra forma de realizar el get ajax el mismo de infomodal    
    $.getJSON($('#path').val()+'/curso/bus/idioma', function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
         //     $.each(data[i], function(key, val) {
            //$("#tabla").append('<tr id="task"><td>"'+data[i].nombre+'"</td><td>"'+data[i].ide+'"</td></tr>');
            $("#idioma_id").append('<option value="' + data[i].id + '">' + data[i].nombre + '</option>');
         //   output += '<option value="' + data[i].ide + '">' + data[i].nombre + '</option>';
       // });
            };      
           });


}
function llenarSelectModalidad(){    
    $.getJSON($('#path').val()+'/curso/bus/modalidad', function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
         //     $.each(data[i], function(key, val) {
            //$("#tabla").append('<tr id="task"><td>"'+data[i].nombre+'"</td><td>"'+data[i].ide+'"</td></tr>');
            $("#moda_id").append('<option value="' + data[i].id + '">' + data[i].nombre + ' ' + data[i].turno + '</option>');
         //   output += '<option value="' + data[i].ide + '">' + data[i].nombre + '</option>';
       // });
            };      
           });


}
function llenarSelectCategoria(){
    $.getJSON($('#path').val()+'/curso/bus/categoria', function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
         //     $.each(data[i], function(key, val) {
            //$("#tabla").append('<tr id="task"><td>"'+data[i].nombre+'"</td><td>"'+data[i].ide+'"</td></tr>');
         $("#cat_id").append('<option value="' + data[i].id + '">' + data[i].nombre + '   ' + data[i].edadInicio + ' - ' + data[i].edadFin + ' años</option>');
         
         //   $('input[name="cat_id"]')[0].val('<option value="' + data[i].id + '">' + data[i].nombre + '   ' + data[i].edadInicio + ' - ' + data[i].edadFin + ' años</option>');
         
         //   output += '<option value="' + data[i].ide + '">' + data[i].nombre + '</option>';
       // });
            };      
           });


}
$(document).on('click','.masCategoria',function(){
  var valor=0;
  //var cont=0;
    var value = $(this).val();
   // $("#form_idR").val(form_id);
   if($("#cont").val()==""){
    var cont=0;
   }else {
     cont=Number($("#cont").val());
   }
  
   valor=cont+1;
   $("#cont").val(valor);

     $('#categoriaTable').append('<tr id="trow'+(valor)+'">'+
            '<td>'+
//'<label for="example-email-input" class="control-label text-main text-bold ">Categoria:*</label>'+            
                      '<div class="form-group "> '+ 
                   // '<label for="example-email-input" class="col-md-2 control-label text-main text-bold ">Categoria:*</label>'+
                    '<div class="col-md-2">'+     
                    '<label for="example-email-input" class="control-label text-main text-bold ">Categoria:*</label>'+
                    '</div>'+
                    '<div class="col-md-5">'+
                    //{{--'<div class="col-md-7">'+ --}}
                        '<select  class="form-control" id="cat_id'+(valor)+'" name="cat_id'+(valor)+'" >'+
                      //  '<select  class="form-control" id="cat_id" name="cat_id[]" >'+
                       
                        '</select>'+                                      
                   '</div>'+
                    '<div class="col-md-5">'+

                        
                            '<label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Cuota:*</label>'+
                            '<div class="col-md-6">'+
                             '<input class="form-control" type="text" placeholder="$##.##" id="nombre'+(valor)+'" name="nombre'+(valor)+'">'+
                            //   '<input class="form-control" type="text" placeholder="$##.##" id="nombre'+(valor)+'" name="nombre[]">'+
                            
                               '<div id="descripcionfeed" class="form-control-feedback"></div>'+                   
                            '</div>'+
                            '<div class="col-md-1">'+
                                '<button type="button" value="'+(valor)+'" class="btn btn-icon btn-default btn-default btn-sm  btn-hover-danger add-tooltip menosCategoria" data-original-title="Informacion de Responsable" data-container="body" ><i class="demo-pli-add icon-lg " ></i> </button>'+

                            '</div>'+

                    '</div>'+  
                 '</div>'+
                  '</td>'+
        '</tr>'+
        '<tr id="trow2'+(valor)+'" >'+
            '<td>'+
           
                '<div class="form-group" >'+

                    '<div class="col-md-6">'+

                        
                            '<label for="example-number-input" class="col-md-4 control-label text-main text-bold ">Niveles:*</label>'+
                            '<div class="col-md-6">'+
                                '<select class="form-control" type="number" placeholder="" id="niveles'+(valor)+'" name="niveles'+(valor)+'">'+
                              '<option value="20">20</option>'+
                                    '<option value="18">18</option>'+
                                    '<option value="22">22</option>'+
                                    
                                '</select>'+
                             '<div id="de" class="form-control-feedback"></div>'+                   
                            '</div>'+
                            

                    '</div>'+ 
                '</div>'+
            '</td>'+
        '</tr>'); 
     //Otra forma de realizar el get ajax el mismo de infomodal    
    $.getJSON($('#path').val()+'/curso/bus/categoria', function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
         //     $.each(data[i], function(key, val) {
            //$("#tabla").append('<tr id="task"><td>"'+data[i].nombre+'"</td><td>"'+data[i].ide+'"</td></tr>');
            //$("#cat_id").append('<option value="' + data[i].id + '">' + data[i].nombre + '   ' + data[i].edadInicio + ' - ' + data[i].edadFin + ' años</option>');
         
            $("#cat_id"+valor+"").append('<option value="' + data[i].id + '">' + data[i].nombre + '   ' + data[i].edadInicio + ' - ' + data[i].edadFin + ' años</option>');
         //   output += '<option value="' + data[i].ide + '">' + data[i].nombre + '</option>';
       // });
            };      
           });

    });

$(document).on('click','.menosCategoria',function(){
   var value= $(this).val();
   $("#cont").val($("#cont").val()-1); 
  $("#nombre" + value).remove(); 
  $("#trow" + value).remove(); 
  $("#trow2" + value).remove(); 
  
});
$(document).on('click','.masDias',function(){
  var valor=0;
  //var cont=0;
    var value = $(this).val();
   // $("#form_idR").val(form_id);
   if($("#cont2").val()==""){
    var cont=0;
   }else {
     cont=Number($("#cont2").val());
   }
  
   valor=cont+1;
   $("#cont2").val(valor);

     $('#diasTable').append('<tr id="trow2'+(valor)+'">'+
            '<td>'+
          '<div class="form-group ">'+       
                    '<div class="col-md-3">'+
                         '<select  class="form-control" id="dias'+(valor)+'" name="dias'+(valor)+'" >'+
                            '<option value="1">Lunes</option>'+
                             '<option value="2">Martes</option>'+
                             '<option value="3">Miércoles</option>'+
                             '<option value="4">Jueves</option>'+
                             '<option value="5">Viernes</option>'+
                             '<option value="6">Sábado</option>'+
                             '<option value="7">Domingo</option>'+
                             
                        '</select>'+
                      
                                       
                   '</div>'+
                    '<div class="col-md-8">'+

                            '<div class=" input-daterange input-group" id="datepicker">'+
                             '<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>'+
                                   
                                    '<span class="input-group-addon">Inicio</span>'+
                                    '<input type="time" placeholder="Hora Inicio" class="form-control"  id="horaInicio'+(valor)+'" name="horaInicio'+(valor)+'" value="'+$('#horaInicio').val()+'" />'+
                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>'+
                                    '<span class="input-group-addon">Fin</span>'+
                                    '<input type="time" placeholder="Hora Fin" class="form-control" id="horaFin'+(valor)+'" name="horaFin'+(valor)+'" value="'+$('#horaFin').val()+'" />'+
                                '</div>'+
                                

                    '</div>'+  
                     '<div class="col-md-1">'+
                                '<button type="button" value="'+(valor)+'" class="btn btn-icon btn-default btn-default btn-sm   add-tooltip menosDias" data-original-title="Informacion de Responsable" data-container="body" ><i class="demo-pli-add icon-lg " ></i> </button>'+

                            '</div>'+
                 '</div>'+


            '</td>'+
        '</tr>'); 
  

    });
$(document).on('click','.menosDias',function(){
   var value= $(this).val();
   
  $("#trow2" + value).remove(); 
});

$(document).on('click','.editarmodal',function(){
    var form_id = $(this).val();
    $("#form_idR").val(form_id);

      //Otra forma de realizar el get ajax el mismo de infomodal
      //no poner pleca antes de la url    
      $.get('responsable/buscar/' + form_id, function (data) {
            //success data
            console.log(data);
            $('#nombreR').val(data.nombre);
            $('#apellidoR').val(data.apellido);
            $('#duiR').val(data.dui);
            $('#direccionR').val(data.direccion);

            //$('#emailR').val(data.email);

            $('#telefonoR').val(data.telefono);
            
          });

      $('#btnGuardar').val("update");///valor update para cuando actulize
      $("#btnGuardar").html("Modificar");///cambia el boton modificar
      $("#btnGuardar").removeClass("btn-info");
      $("#btnGuardar").addClass("btn-mint"); 
      $("#modalIngresoHeader").addClass("alert-mint"); 
      $("#modalIngresoLabel").html("Modificar Responsable");///titulo del modal
      $('#modalIngreso').modal('show');    
    });



  $("#btnnuevo").click(function(){
      
    $('#btnGuardar').val("add");
    $("#btnGuardar").html("Guardar");
    $("#btnGuardar").removeClass("btn-mint");
    $("#modalIngresoHeader").removeClass("alert-mint");
    $("#modalIngresoLabel").html("Registro de Curso");
    //$('#form').trigger('reset');
    $("#btnGuardar").removeClass("btn-success");
    $('#modalIngreso').modal('show');   

    });


$("#btnGuardar").click(function (e) {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    //$('#modalIngreso').modal('hide'); 
//$('#form_id').submit();
   e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     form_id:$('#form_id').val(),
     idioma_id:$('#idioma_id').val(),
     moda_id :$('#moda_id').val(),
   //  edadFin:$('#edadFin').val(),
   }      

  $('#btnGuardar').attr("disabled", true);
          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/curso/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'hvbn/update/'+form_id;
        }
          console.log($('form[name="form"]').serializeArray());//$('#form').serialize());
          console.log($('#form').serialize());
          //console.log($('#form').serializeArray());
         
         // console.log($("#cat_id2").val());
          console.log($('#form').show());
         

          $.ajax({

            type: type,
            url: my_url,
            data: $('#form').serializeArray(),
            dataType: 'json',
            success: function (data) {
             console.log(data);
            // data[0];
            if(data['bandera']==1){
                $('#modalIngreso').modal('hide');
               $.niftyNoty({
                type: "success",
                container : "floating",
                title : "Bien Hecho!",
                message : data['response'],
                closeBtn : false,
                timer : 3000
                });
                       
               setTimeout(function(){
                //  $("#form").trigger("reset");
                  window.location.reload();////recarga la pagina actual
                 // $(location).attr('href','/peticionForm');
               }, 4000);
             } else{
              $('#btnGuardar').attr("disabled", false);
               var msj='';
              msj+='</ul>';
              for(var i=0;i<data['errors'].length;i++)
              {
                msj+='<li>'+data['errors'][i]+'</li>'; 
              }
              msj+='</ul>';
              $.niftyNoty({
                type: 'danger',
                       // icon : 'fa fa-bolt fa-2x',
                       container : 'floating',
                       title : 'Llenar Campos Requeridos!!',
                       message : msj,
                       timer : 6000
                     });
  
               /*//menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message :  data['response'],
                closeBtn : false,
                timer : 3000
                });*/

             }




             },
             error: function (data) {
              var errors=data.responseJSON;
                console.log(errors);
                $('#btnGuardar').attr("disabled", false);
              ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message : "A ocurrido un problema"+data['response'],
                closeBtn : false,
                timer : 3000
                });
              
              console.log('Error de peticion:', data);
              
                  }
                });
          /* if(errors.nombre!=undefined)
                {
                  $('#montofeed').text(errors.monto);
                  //$( '#montodiv' ).removeClass();
                  $( '#nombrediv' ).addClass("has-danger");
                }else{
                  $( '#nombrediv' ).removeClass("has-danger");
                  $( '#nombrefeed' ).text("");
                  }*/
        });

$("#btnGuardarHorarios").click(function (e) {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    //$('#modalIngreso').modal('hide'); 
//$('#form_id').submit();
   e.preventDefault();
 

          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/curso/modificarHorarios";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

         
          //console.log($('form[name="form"]').serializeArray());//$('#form').serialize());
          console.log($('#formEditarHorarios').serializeArray());
          //console.log($('#form').serializeArray());
         
         // console.log($("#cat_id2").val());
          //console.log($('#form').show());
         


          $.ajax({

            type: type,
            url: my_url,
            data: $('#formEditarHorarios').serializeArray(),
            dataType: 'json',
            success: function (data) {
             console.log(data);
            // data[0];
            if(data['bandera']==1){
              // $('#modalEditarHorarios').modal('hide');
              //  $('#modalInfo').modal('hide');
               
               $.niftyNoty({
                type: "success",
                container : "floating",
                title : "Bien Hecho!",
                message : data['response'],
                closeBtn : false,
                timer : 3000
                });
                       
               setTimeout(function(){
                  ////////////////////--------------Lo mismo que infoHorariosModal------------/////////////
                    $("#btnGuardarHorarios").hide();
                    $('#infoModalHeader' ).removeClass();
                    $('#infoModalHeader' ).addClass("modal-header alert-info");

                    var form_id = $('#idCursosEditarHorarios').val();
                     $("#botonEditarHorario").val(form_id);
                        $("#tablainfo").empty();////Deja vacia la tabla
                    $.ajax({

                      type: "GET",
                      url:$('#path').val()+ '/curso/buscarHorarios/'+form_id,
                      data: form_id,
                      dataType: 'json',
                      success: function (data) {
                        console.log(data);

                        var row = '<th><td>Dia</td></th>';
                        var row = '<tr><td width="30%"> Dia </td><td width="35%">hora inicio</td><td width="35%">hora fin</td></th>';
                     
                        for (var i = 0; i < data['message'].length; i++) {

                        
                    //    var row = '<tr><td width="30%">' + data[i].nombreDia + ': </td><td width="35%">' + data[i].horaInicio + '</td><td width="35%">' + data[i].horaFin + '</td>';
                         row += '<tr><td width="30%">' + data['message'][i].nombreDia + ': </td><td width="35%">' + data['message'][i].horaInicio + '</td><td width="35%">' + data['message'][i].horaFin + '</td>';

                        
                      }

                         $("#tablainfo").append(row);
                      },
                      error: function (data) {
                        console.log('Error de boton Info:', data);
                      }
                    });

                //  $("#form").trigger("reset");
                 // window.location.reload();////recarga la pagina actual
                 // $(location).attr('href','/peticionForm');
               }, 2000);
             } else{
               ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message :  data['response'],
                closeBtn : false,
                timer : 3000
                });

             }




             },
             error: function (data) {
              var errors=data.responseJSON;
                console.log(errors);
              ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message : "A ocurrido un problema"+errors.nombre,
                closeBtn : false,
                timer : 3000
                });
              
              console.log('Error de peticion:', data);
              
                  }
                });
         
        });



 ////////////////////////////////////Actual Preicio/////////////////////////////////////////
$(document).on('click','.actualPrecio',function(){
     var value = $(this).val();
      //token siempre para ingresar y modificar
       $('#modalPrecioCategoria').modal('show'); ///modal de informacion
       $('#idCategoria').val(value);
       $('#idCursos').val($(this).attr('data-idcursos'));
       $('#montoCategoria').val($(this).attr('data-cuota'));
       //$('#montoCategoria').val(value);  
    
});

$("#btnGuardarPrecio").click(function (e) {
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })

      e.preventDefault();
var formData = {
   idCategoria:$('#idCategoria').val(),
  idCursos:$('#idCursos').val(),
   montoCategoria:$('#montoCategoria').val(),
    
 }
  $.ajax({
          type: "PUT",
          url: $('#path').val()+'/curso/actualizarPrecio',//+value,
          data: formData,
          dataType: 'json',
          success: function (data) {
              console.log(data);
             if(data['bandera']==1){
            
             $.niftyNoty({
              type: "success",
              container : "floating",
              title : "Bien Hecho!",
              message : data['response'],
              closeBtn : false,
              timer : 3000
              });
             $('#modalPrecioCategoria').modal('hide');

              setTimeout(function(){
                  window.location.reload();////recarga la pagina actual


               }, 4000);
            }else{
              $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : "A ocurrido un problema"+data['response'] ,
              closeBtn : false,
              timer : 3000
              });

            }
          },
          error: function (data) {
              //console.log('Error al dar Baja:', data);
              $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : "A ocurrido un problema no se de que",
              closeBtn : false,
              timer : 3000
              });
          }
     });

    //$('#modalPrecioCategoria').modal('hide');
});
/////////////////////////////////Fin actual precio//////////////////////////////////////////////////////




/////////////////////////////////nueva categoria//////////////////////////////////////////////////////
$("#btnGuardarNuevaCat").click(function (e) {
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })

      e.preventDefault();

      //$('#formNuevaCat').submit();
      console.log($('#formNuevaCat').serializeArray());
/*var formData = {
   idCategoria:$('#idCategoria').val(),
  idCursos:$('#idCursos').val(),
   montoCategoria:$('#montoCategoria').val(),
    
 }*/

  $.ajax({
          type: "POST",
          url: $('#path').val()+'/curso/createCategoria',//+value,
          data: $('#formNuevaCat').serializeArray(),
          dataType: 'json',
          success: function (data) {
              console.log(data);
             if(data['bandera']==1){
            
             $.niftyNoty({
              type: "success",
              container : "floating",
              title : "Bien Hecho!",
              message : data['response'],
              closeBtn : false,
              timer : 3000
              });
             $('#modalPrecioCategoria').modal('hide');

              setTimeout(function(){
                  window.location.reload();////recarga la pagina actual


               }, 4000);
            }else{
              $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : data['response'] ,
              closeBtn : false,
              timer : 3000
              });

            }
          },
          error: function (data) {
              //console.log('Error al dar Baja:', data);
              $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : "A ocurrido un problema no se de que",
              closeBtn : false,
              timer : 3000
              });
          }
     });

    //$('#modalPrecioCategoria').modal('hide');
});
/////////////////////////////////Fin nueva categoria //////////////////////////////////////////////////////