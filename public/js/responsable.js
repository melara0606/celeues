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
    $('#modalIngreso').on('shown.bs.modal', function () {
  $('.modal-dialog').css('height', $('.modal-dialog').height() );
});

$('#modalIngreso').on('hidden.bs.modal', function () {
  $('.modal-dialog').css('height', 'auto');
});
   //No se para que es pero en la documentacion dice que sirve para algo
    //$(document).trigger('nifty.ready');
  //  $.niftyNav('refresh');
  //  $.niftyNav('bind');
    $.niftyNav('expand');
    //$.niftyNav('colExpToggle');
   
$.niftyAside('darkTheme');
  });


  $(document).on('click','.infoModal',function(){

  var form_id = $(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
  $.ajax({

    type: "GET",
    url: 'responsable/buscar/'+form_id,
    data: form_id,
    dataType: 'json',
    success: function (data) {
      console.log(data);

      var row = '<tr><td width="30%"> Nombre: </td><td width="70%">' + data.nombre + ' ' + data.apellido + '</td>';
      row +='<tr><td> DUI: </td><td>' + data.dui + '</td>';
      row +='<tr><td> Telefono: </td><td>' + data.telefono + '</td>';
      row +='<tr><td> Email: </td><td>' + data.email + '</td>';
      row +='<tr><td> Direccion: </td><td>' + data.direccion + '</td>';
     
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
    $("#btnGuardar").html("Nuevo");
    $("#btnGuardar").removeClass("btn-mint");
    $("#modalIngresoHeader").removeClass("alert-mint");
    $("#modalIngresoLabel").html("Registro de Responsable");
    $('#form').trigger('reset');
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
     nombre:$('#nombreR').val(),

     apellido:$('#apellidoR').val(),
     direccion:$('#direccionR').val(),
     telefono:$('#telefonoR').val(),
     dui:$('#duiR').val(),
//     email:$('#emailR').val(),
   }       

          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = "responsable/create";
          var form_id = $('#form_idR').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'responsable/update/'+form_id;
        }
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
                       title : 'llenar Campos Requeridos!!',
                       message : msj,
                       timer : 6000
                     });

            }
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
                  $("#form").trigger("reset");
                  window.location.reload();////recarga la pagina actual
                 // $(location).attr('href','/peticionForm');
               }, 4000);
             } else if(data['bandera']==2){
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
