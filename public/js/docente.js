$(document).ready(function(){
 $('#myTable').DataTable({
      //"dom": '<"top"l>frt<"bottom"pi>'
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
 // $.niftyNav('bind');
  $.niftyNav('expand');
  //$.niftyNav('colExpToggle');

//$.niftyAside('darkTheme');
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
  url: 'docente/buscar/'+form_id,
  data: form_id,
  dataType: 'json',
  success: function (data) {
    console.log(data);

    var row = '<tr><td width="30%"> Nombre: </td><td width="70%">' + data.nombre + '</td>';
    row +='<tr><td> Apellido: </td><td>' + data.apellido + '</td>';
    row +='<tr><td> Email: </td><td>' + data.email + '</td>';
    row +='<tr><td> DUI: </td><td>' + data.dui + '</td>';
    row +='<tr><td> NIT: </td><td>' + data.nit + '</td>';
    row +='<tr><td> Telefono: </td><td>' + data.telefono + '</td>';
    row +='<tr><td> Genero: </td><td>' + data.genero + '</td>';
    row +='<tr><td> Cuenta: </td><td>' + data.ncuenta + '</td>';
    row +='<tr><td> Creado: </td><td>' + data.created_at + '</td>';
    $("#tablainfo").append(row); ///Se añade a la tabla

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
    $.get('docente/buscar/' + form_id, function (data) {
          //success data
          console.log(data);
          $('#nombre').val(data.nombre);
          $('#apellido').val(data.apellido);
          $('#email').val(data.email);
          $('#dui').val(data.dui);
          $('#nit').val(data.nit);
          $('#telefono').val(data.telefono);
          if(data.genero=='MASCULINO'){
            $('#genero').val(0);
          }else
          {
             $('#genero').val(1);
            
          }
          $('#ncuenta').val(data.ncuenta);
        });

    $('#btnGuardar').val("update");///valor update para cuando actulize
    $("#btnGuardar").html("Modificar");///cambia el boton modificar
    $("#btnGuardar").removeClass("btn-info");
    $("#btnGuardar").addClass("btn-mint");
    $("#modalIngresoHeader").addClass("alert-mint");
    $("#modalIngresoLabel").html("Modificar Docente");///titulo del modal
    $('#modalIngreso').modal('show');
  });



$("#btnnuevo").click(function(){

  $('#btnGuardar').val("add");
  $("#btnGuardar").html("Nuevo");
  $("#btnGuardar").removeClass("btn-mint");
  $("#modalIngresoHeader").removeClass("alert-mint");
  $("#modalIngresoLabel").html("Registro de Docente");
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
   apellido:$('#apellido').val(),
   email:$('#email').val(),
   dui:$('#dui').val(),
   nit:$('#nit').val(),
   telefono:$('#telefono').val(),
   genero:$('#genero').val(),
   ncuenta:$('#ncuenta').val(),
 }

        var state = $('#btnGuardar').val();///para ver si es add o update
        var type = "POST"; //for creating new resource
        var my_url = "docente/create";
        var form_id = $('#form_id').val();///el id del registro ya sea si modificamos

        if (state == "update"){
          type = "PUT"; //for updating existing resource
          my_url = 'docente/update/'+form_id;
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
              message : "A ocurrido un problema" + data,
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
          url: 'docente/cambiarEstado/'+value,
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

//////////////////////////////////////crear usuario ESTUDIANTE se entendera como DOCENTE////////////////////////////////////
$(document).on('click','.crearUsuarioEstudiante',function(){
    var form_id = $(this).val();
    $('#estudiante_id').val(form_id);
    $('#modalIngresoUsuario').modal('show');
    $('#parrafoUsuario').html("Esta a punto de crear un usuario al Docente <br>"+ $(this).data('nombre'));    
    $('#usuarioEstudiante').val($(this).data('email'));    

});


 $("#btnGuardarUsuario").click(function (e) {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })

   e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     estudiante_id:$('#estudiante_id').val(),
     usuario:$('#usuarioEstudiante').val(),
     contrasenha:$('#contraUsurioEstudiante').val(),
     repetirContrasenha:$('#contraRepeUsurioEstudiante').val(),
     
   }       


        $("#btnGuardarUsuario").attr("disabled", "disabled");
        setTimeout(function() {
            $("#btnGuardarUsuario").removeAttr("disabled");      
        }, 3000);
         // var state = $('#guardarResp').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = "docente/createUser";
         // var form_id = $('#estudiante_id').val();///el id del registro ya sea si modificamos 

          /*if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'responsable/update/'+form_id;
        }*/
          console.log(formData);

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                 console.log(data);
                 if (data['bandera']==3) {
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
                        title : 'Upps!!',
                        message : msj,
                        //timer : 6000
                    });

                 }
                // data[0];
                if(data['bandera']==1){
                    // $('#modalIngreso').modal('hide');
                     $.niftyNoty({
                      type: "info",
                      container : "floating",
                      title : "Bien Hecho!",
                      message : data['response'],
                      closeBtn : false,
                      timer : 3000
                      });
                    
                    /* setTimeout(function(){
                        $("#form").trigger("reset");
                        window.location.reload();////recarga la pagina actual
                       // $(location).attr('href','/peticionForm');
                     }, 4000);*/
                 } else if(data['bandera']==0){
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
              ///menasje de error
                  $.niftyNoty({
                    type: "danger",
                    container : "floating",
                    title : "Upps!",
                    message : "A ocurrido un problema",
                    closeBtn : false,
                    timer : 3000
                    });
                     console.log('Error de peticion:', data);
               
                  }
          });
  });
