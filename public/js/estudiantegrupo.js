
  $(document).on('click','.infoModal',function(){

  var form_id = $(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
  $.ajax({

    type: "GET",
    url: $('#path').val()+'/estudiante/buscar1/'+form_id,
    data: form_id,
    dataType: 'json',
    success: function (data) {
      console.log(data);
         // for (var i = 0; i < data.length; i++) {
                
              var row = '<tr><td width="30%"> Nombre: </td><td width="70%">' + data[1].nombre + ' ' + data[1].apellido + '</td>';
              row +='<tr><td> Genero: </td><td>' + data[1].genero + '</td>';
              row +='<tr><td> Fecha de Nacimiento: </td><td>' + data[1].fechaNac + '</td>';
              if(data[1].dui!=null)
              row +='<tr><td> DUI: </td><td>' + data[1].dui + '</td>';
              if(data[1].idresponsables!=null)
              row +='<tr><td> Responsable: </td><td>' + data[2] + '</td>';
              row +='<tr><td> Email: </td><td>' + data[1].email + '</td>'
              row +='<tr><td> Telefono: </td><td>' + data[1].telefono + '</td>';
              row +='<tr><td> Direccion: </td><td>' + data[1].direccion + '</td>';
              
              
              
              row +='<tr><td> Creado: </td><td>' + data[1].created_at + '</td>';
              $("#tablainfo").append(row); ///Se anhade a la tabla           
        //};
    },
    error: function (data) {
      console.log('Error de boton Info:', data);
    }
  });

  $('#modalInfo').modal('show'); ///modal de informacion
  });





  $("#btnnuevo").click(function(){
      
    
      $("#tablaAsigEstudiante").empty();
    $('#modalAsigEstudiante').modal('show');   

    });

////////////////Esto para busqueda///////////////////
 $("#search").on('keyup',function(){
    var value = $(this).val();

    if (value.length % 2 == 0) {

    }else{///si es impar
      $("#tablaAsigEstudiante").empty();
               $.ajax({

                    type: "GET",
                    url: $('#path').val()+'/estudiantegrupo/'+value,
                    data: {'search':value},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                         $("#tablaAsigEstudiante").html(data);            
                    
                    },
                    error: function (data) {
                        console.log('Error de info boton:', data);
                    }
               });
          }
        
    
 });
///////////////////fin busqueda///////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click','.btnCreateEstudiante',function(e){
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    //$('#modalIngreso').modal('hide'); 
//$('#form_id').submit();
   e.preventDefault();
    var value = $(this).val();

   /////Datos que se envian para recibir en el controlador 
   var formData = {
     idgrupos:$('#hiddenGrupo').val(),
     idestudiantes:value,
   }      

      //  $('#btnGuardar').attr("disabled", true);
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/estudiantegrupo/create";
        console.log(formData);

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                     console.log(data);
                    // data[0];
                    if(data['bandera']==1){
                        $('#modalAsigEstudiante').modal('hide');
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
              //  $('#btnGuardar').attr("disabled", false);
              ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message : "A ocurrido un problema"+errors,
                closeBtn : false,
                timer : 3000
                });
              
              console.log('Error de btnCreateEstudiante:', data);
              
                  }
                });
        });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click','.asigPago',function(){
      var value = $(this).val();
    $( '#modalMsjDiv' ).removeClass("alert-danger");
$( '#modalMsjDiv' ).addClass("alert-mint");
$( '#btnGuardarMsj' ).removeClass("btn-danger");
$( '#btnGuardarMsj' ).addClass("btn-mint");  


      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val('asigPago');
    $('#modalMsjLabel').html("Inscripcion de estudiante"); 
    $('#msjAB').html("<p>Se registrara el pago del estudiante </p>"+$(this).data('nombre'));

     $('#modalMsj').modal('show'); ///modal de informacion
});



$(document).on('click','.asigOyente',function(){
      var value = $(this).val();

    $( '#modalMsjDiv' ).removeClass("alert-danger");
$( '#modalMsjDiv' ).addClass("alert-mint");
$( '#btnGuardarMsj' ).removeClass("btn-danger");
$( '#btnGuardarMsj' ).addClass("btn-mint");  


      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val('asigOyente');
  $('#modalMsjLabel').html("Cambio de Estado a OYENTE"); 
  $('#msjAB').html("<p>Esta a punto de cambiar el estudiante </p>"+$(this).data('nombre')+" a oyente");

     $('#modalMsj').modal('show'); ///modal de informacion
});



$(document).on('click','.deleteEstudiante',function(){
      var value = $(this).val();
      
    $( '#modalMsjDiv' ).removeClass("alert-mint");  
    $( '#modalMsjDiv' ).addClass("alert-danger");
$( '#btnGuardarMsj' ).removeClass("btn-mint");  
    $( '#btnGuardarMsj' ).addClass("btn-danger");


    $('#registro_id').val(value);
     $('#estadoAB').val('deleteEstudiante');

  $('#modalMsjLabel').html("Remover Estudiante");
  $('#msjAB').html("<p>Esta seguro de continuar con la accion </p> Se removera el estudiante "+$(this).data('nombre')+" del grupo");

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
   idgrupos:$('#hiddenGrupo').val(),
 }
  $.ajax({
          type: "PUT",
          url: $('#path').val()+'/estudiantegrupo/cambiarEstado/'+value,
          data: formData,
          dataType: 'json',
          success: function (data) {
              console.log(data);
              if(data['bandera']==1){
                      //  $('#modalAsigEstudiante').modal('hide');
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
              console.log('Error al dar Baja:', data);
             $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message :  data['response'],
                        closeBtn : false,
                        timer : 3000
                });
          }
     });

    $('#modalMsj').modal('hide');
  });

//////////////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////

$(document).on('click','.addPonderacion',function(e){
      var value = $(this).val();
   
/////////////////////////////////////////////////////////
 $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
   e.preventDefault();
  
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     idgrupos:$('#hiddenGrupo').val(),
   }      

          var type = "PUT"; //for creating new resource
          var my_url = $('#path').val()+"/estudiantegrupo/createPonderacion";
        console.log(formData);

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                     console.log(data);
                    // data[0];
                    if(data['bandera']==1){
                       // $('#modalAsigEstudiante').modal('hide');
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
              //  $('#btnGuardar').attr("disabled", false);
              ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message : "A ocurrido un problema"+errors,
                closeBtn : false,
                timer : 3000
                });
              
              console.log('Error de Create ponderacion:', data);
              
                  }
                });


   /////////////////////////////////////////////////

});



/////////////////////////////////////////////////////////////////////////////