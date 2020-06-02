$(document).ready(function(){
  $('#myTable').DataTable({
    //"dom": '<"top"lf>rt<"bottom"pi>'
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
  });

  //No se para que es pero en la documentacion dice que sirve para algo
  //$(document).trigger('nifty.ready');
//  $.niftyNav('refresh');
//  $.niftyNav('bind');
  $.niftyNav('expand');
  //$.niftyNav('colExpToggle');

$.niftyAside('darkTheme');
});

$(document).on('click','.darbaja',function(){
      var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(0);

     $('#modalMsj').modal('show'); ///modal de informacion
});
$(document).on('click','.darAlta',function(){
      var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(1);

     $('#modalMsj').modal('show'); ///modal de informacion
});


$(document).on('click','.infoModal',function(){

var form_id = $(this).val();

     $("#tablainfo").empty();////Deja vacia la tabla
$.ajax({

  type: "GET",
  url: 'modalidad/buscar/'+form_id,
  data: form_id,
  dataType: 'json',
  success: function (data) {
    console.log(data);

    var row = '<tr><td width="30%"> Nombre: </td><td width="70%">' + data.nombre + '</td>';
    row +='<tr><td> Turno: </td><td>' + data.turno + '</td>';
    row +='<tr><td> Creado: </td><td>' + data.created_at + '</td>';
    $("#tablainfo").append(row); ///Se anhade a la tabla

  },
  error: function (data) {
    console.log('Error de boton Info:', data);
  }
});

$('#modalInfo').modal('show'); ///modal de informacion
});


$(document).on('click','.editarmodal',function(){
  var form_id = $(this).val();
  $("#form_id").val(form_id);

    //Otra forma de realizar el get ajax el mismo de infomodal
    //no poner pleca antes de la url
    $.get('modalidad/buscar/' + form_id, function (data) {
          //success data
          console.log(data);
          $('#nombre').val(data.nombre);
          $('#turno').val();
        });

    $('#btnGuardar').val("update");///valor update para cuando actulize
    $("#btnGuardar").html("Modificar");///cambia el boton modificar
    $("#btnGuardar").removeClass("btn-info");
    $("#btnGuardar").addClass("btn-mint");
    $("#modalIngresoHeader").addClass("alert-mint");
    $("#modalIngresoLabel").html("Modificar Modalidad");///titulo del modal
    $('#modalIngreso').modal('show');
  });



$("#btnnuevo").click(function(){

  $('#btnGuardar').val("add");
  $("#btnGuardar").html("Guardar");
  $("#btnGuardar").removeClass("btn-mint");
  $("#modalIngresoHeader").removeClass("alert-mint");
  $("#modalIngresoLabel").html("Registro de Modalidad");
  $('#frm').trigger('reset');
  $("#btnGuardar").removeClass("btn-success");
  $('#modalIngreso').modal('show');

  });


$("#btnGuardar").click(function (e) {
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
})

 e.preventDefault();
 /////Datos que se envian para recibir en el controlador
 var formData = {
   nombre:$('#nombre').val(),
   turno:$('#modalidad').val(),

 }

        var state = $('#btnGuardar').val();///para ver si es add o update
        var type = "POST"; //for creating new resource
        var my_url = "modalidad/create";
        var form_id = $('#form_id').val();///el id del registro ya sea si modificamos

        if (state == "update"){
          type = "PUT"; //for updating existing resource
          my_url = 'modalidad/update/'+form_id;
      }
        console.log(formData);

        $.ajax({

          type: type,
          url: my_url,
          data: formData,
          dataType: 'json',
          success: function (data) {
           console.log(data);
             $('#modalIngreso').modal('hide');
             $.niftyNoty({
              type: "success",
              container : "floating",
              title : "Bien Hecho!",
              message : data,
              closeBtn : false,
              timer : 3000
              });
            /*///////mensaje de gaurdado o modificado//////
             $("#floating-top-right").html(
              '<div class="alert-wrap in animated jellyIn">'+
              '<div class="alert alert-mint">'+
                '<button class="close" data-dismiss="alert">'+
                    '<i class="pci-cross pci-circle"></i>'+
                '</button>'+data+
              '</div>'+
              '</div>'
              );
            *//////////fin mensaje////////////////////////
             setTimeout(function(){
             //   $("#floating-top-right").html('');
                $("#form").trigger("reset");
                window.location.reload();////recarga la pagina actual
               // $(location).attr('href','/peticionForm');
             }, 4000);



           },
           error: function (data) {
            ///menasje de error
            $.niftyNoty({
              type: "danger",
              container : "floating",
              title : "Upps!",
              message : "A ocurrido un problema",
              closeBtn : false,
              timer : 3000
              });
             /*///////mensaje de gaurdado o modificado
             $("#floating-top-right").html(
              '<div class="alert-wrap in animated jellyIn">'+
              '<div class="alert alert-danger">'+
                '<button class="close" data-dismiss="alert">'+
                    '<i class="pci-cross pci-circle"></i>'+
                '</button>'+'<strong>Error!!</strong> No pudo relizarse la accion correctamente '+
              '</div>'+
              '</div>'
              );

            /*/////////fin mensaje
            console.log('Error de peticion:', data);
              // var errors=data.responseJSON;
               // console.log(errors);
               /* if(errors.titulo!=undefined)
                {
                  $('#titulofeed').text(errors.titulo);
                  //$( '#nombrediv' ).removeClass();
                  $( '#titulodiv' ).addClass("has-danger");
                }else{
                  $( '#titulodiv' ).removeClass("has-danger");
                  $( '#titulofeed' ).text("");
                  }

                if(errors.descripcion!=undefined)
                {
                  $( '#descripciondiv' ).addClass("has-danger");
                  $('#descripcionfeed').text(errors.descripcion);
                }else{
                  $( '#descripciondiv' ).removeClass("has-danger");
                  $( '#descripcionfeed' ).text("");
                  }
                  */

                    /*setTimeout(function(){
                      $("#floating-top-right").html('');
                    }, 4000);*/
                }
              });
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
          url: 'idioma/cambiarEstado/'+value,
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
