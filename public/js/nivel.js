


$(document).on('click','.darbaja',function(){
     var value = $(this).val();
      //es ell id de idioma
    $('#registro_id').val(value);
     $('#estadoAB').val(0);
     $('#msjAB').html("<p>Esta seguro de continuar con la accion no se podran reaizar grupos con este nivel </p>");

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
   console.log(formData);
    $.ajax({
            type: "PUT",
            url: $('#path').val()+'/nivel/cambiarEstado/'+value,
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


  $("#btnnuevo").click(function(){
      
    $('#btnGuardar').val("add");
    $("#btnGuardar").html("Guardar");
    $("#btnGuardar").removeClass("btn-mint");
    $("#modalIngresoHeader").removeClass("alert-mint");
    $("#modalIngresoLabel").html("Registro de nivel");
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
   e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     numNivel:$('#nivel').val(),
     ididiomas:$('#ididiomas').val(),
     idcategorias :$('#idcategorias').val(),
     idmodalidads :$('#idmodalidads').val(),
     idcursos :$('#idcursos').val(),
     idcursocategorias :$('#idcursocategorias').val(),
     
   }      

          //$('#btnGuardar').attr("disabled", true);
          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/nivel/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'hvbn/update/'+form_id;
        }
        
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
                $('#btnGuardar').attr("disabled", false);
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






