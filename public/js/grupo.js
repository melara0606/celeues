
  $("#btnnuevo").click(function(){
      
    $('#btnGuardar').val("add");
    $("#btnGuardar").html("Nuevo");
    $("#btnGuardar").removeClass("btn-mint");
    $("#modalIngresoHeader").removeClass("alert-mint");
    $("#modalIngresoLabel").html("Registro de Curso");
    //$('#form').trigger('reset');
    $("#btnGuardar").removeClass("btn-success");
    $('#modalIngreso').modal('show');   

    });

$('#cursoSelect').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#categoriaSelect').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursoSelect').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriaSelect').append(options);
    });
    console.log(valueSelected);
});

$('#categoriaSelect').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#nivelSelect').empty();
    var options="";
    options+='<option selected disabled label="Seleccione un nivel"></option>';


     $.getJSON($('#path').val()+'/grupos/niveles/'+$('#categoriaSelect').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].id + '">Nivel ' + data[i].numNivel + '</option>';

            };      
             //console.log(options);
        $('#nivelSelect').append(options);
    });
    console.log(valueSelected);
});



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
     idcursos:$('#cursoSelect').val(),
     idcursocategorias:$('#categoriaSelect').val(),
     nivel :$('#nivelSelect').val(),
     cupos:$('#cupos').val(),
     numGrupos :$('#numGrupos').val(),
     
   //  edadFin:$('#edadFin').val(),
   }      

      //  $('#btnGuardar').attr("disabled", true);
          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'hvbn/update/'+form_id;
        }
        
        // $('#modalIngreso').modal('hide');
        console.log($('#form').serializeArray());

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
                message : "A ocurrido un problema"+errors,
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
