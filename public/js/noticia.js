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
    $.niftyNav('expand');
    //$.niftyNav('colExpToggle');
   
//$.niftyAside('darkTheme');
 //$('#myTable').DataTable();
//var data = {!! json_encode($estado) !!}; 
// var sites = {!! json_encode($estado) !!}
// console.log('sites');
//$('#titulo').val(data);
});

  $(document).on('click','.infoModal',function(){

  var form_id = $(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
  $.ajax({

    type: "GET",
    url: 'noticia/buscar/'+form_id,
    data: form_id,
    dataType: 'json',
    success: function (data) {
      console.log(data);

      var row = '<tr><td width="30%"> Titulo: </td><td width="70%">' + data.titulo + '</td>';
      row +='<tr><td> Descripcion: </td><td>' + data.descripcion + '</td>';

      row +='<tr><td> Modulo: </td><td>' + data.numModulo + '</td>';

      row +='<tr><td> Modalidad: </td><td>' + data.modalidad + '</td>';
      row +='<tr><td> Fecha Inicio: </td><td>' + data.fechaInicio + '</td>';
      row +='<tr><td> Fecha Fin: </td><td>' + data.fechaFin + '</td>';
      
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
      $.get('noticia/buscar/' + form_id, function (data) {
            //success data
            console.log(data);
            $('#titulo').val(data.titulo);
            $('#descripcion').val(data.descripcion);
            $('#numModulo').val(data.numModulo);
            $('#modalidad').val(data.modalidad);
            $('#fechaInicio').val(data.fechaInicio);
            $('#fechaFin').val(data.fechaFin);
            
          });

      $('#btnGuardar').val("update");///valor update para cuando actulize
      $("#btnGuardar").html("Modificar");///cambia el boton modificar
      $("#btnGuardar").removeClass("btn-info");
      $("#btnGuardar").addClass("btn-mint"); 
      $("#modalIngresoHeader").addClass("alert-mint"); 
      $("#modalIngresoLabel").html("Modificar Noticia");///titulo del modal
      $('#modalIngreso').modal('show');    
    });



  $("#btnnuevo").click(function(){
      
    $('#btnGuardar').val("add");
    $("#btnGuardar").html("Nuevo");
    $("#btnGuardar").removeClass("btn-mint");
    $("#modalIngresoHeader").removeClass("alert-mint");
    $("#modalIngresoLabel").html("Registro de Noticia");
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
        var formData = {
         titulo:$('#titulo').val(),
		 descripcion:$('#descripcion').val(),
		 numModulo:$('#numModulo').val(),
	 	 fechaInicio:$('#fechaInicio').val(),
	 	 fechaFin:$('#fechaFin').val(),
		 modalidad:$('#modalidad').val(),
	 	 

           }       
         var state = $('#btnGuardar').val();///para ver si es add o update
             
        var type = "POST"; //for creating new resource
        var my_url = "noticiaForm/create";
        var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'noticiaForm/update/'+form_id;
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
                  setTimeout(function(){
                   $("#form").trigger("reset");
                  window.location.reload();////recarga la pagina actual

              }, 4000);


           
            },
            error: function (data) {
               $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message : "A ocurrido un problema",
                closeBtn : false,
                timer : 3000
                });
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
            }
        });
});
