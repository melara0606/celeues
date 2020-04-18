


$('#cursofiltro1').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    
    $('#categoriafiltro1').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursofiltro1').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro1').append(options);
    });
    console.log(valueSelected);
});

$('#cursofiltro2').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#categoriafiltro2').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursofiltro2').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro2').append(options);
    });
    console.log(valueSelected);
});

//categoriafiltro1 ==== idcursocategoria
$('#categoriafiltro1').on('change', function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#grupofiltro1').empty();
    var options="";
    options+='<option selected disabled label="Seleccione un Grupo"></option>';


     var formData = {
     cursofiltro:$('#cursofiltro1').val(),
     categoriafiltro:$('#categoriafiltro1').val(),
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/obtenerGruposTraspaso";
          //console.log($('#form').serializeArray());
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
              //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].id + '">' + data[i].nombreGrupo + '</option>';

            };      
             //console.log(options);
        $('#grupofiltro1').append(options);
  

             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
                });

});

//categoriafiltro2 ==== idcursocategoria
$('#categoriafiltro2').on('change', function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#grupofiltro2').empty();
    var options="";
    options+='<option selected disabled label="Seleccione un Grupo"></option>';


     var formData = {
     cursofiltro:$('#cursofiltro2').val(),
     categoriafiltro:$('#categoriafiltro2').val(),
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/obtenerGruposTraspaso";
          //console.log($('#form').serializeArray());
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
              //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].id + '">' + data[i].nombreGrupo + '</option>';

            };      
             //console.log(options);
        $('#grupofiltro2').append(options);
  

             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
                });

});




$('#grupofiltro1').on('change', function (e) {
  $("#filtrarOne").prop( "disabled", false ); 
   $('#titleacordeon').html('<strong style="font-size: 13px;color:white" >GRUPO '+$('#grupofiltro1 option:selected').text()+'</strong>'); 
});

$('#grupofiltro2').on('change', function (e) {
  $("#filtrarTwo").prop( "disabled", false );

   $('#titleacordeonTwo').html('<strong style="font-size: 13px; " >GRUPO '+$('#grupofiltro2 option:selected').text()+'</strong>'); 
    
});


$("#filtrarOne").click(function (e) {
 $('.display').DataTable().destroy();//.clear().destroy();
  $(".colapOne").click();
//$('#filtrarOne').on('click', function (e) {
  var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    $('#tbodyOne').empty();
    var formData = {
       numTable:1,
     //cursofiltro:$('#cursofiltro1').val(),
    // idcursocategoriafiltro:$('#categoriafiltro1').val(),
     idgrupofiltro:$('#grupofiltro1').val(),
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/obtenerEstudiantes";
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
              //success data
            console.log(data); 
            $('#tbodyOne').append(data);

$(".display").DataTable();  
             //$('.display').DataTable().ajax.reload();
            //table.ajax.reload();
 //           $(".display").DataTable().destroy();
//$(".display").DataTable().clear();
//$(".display").DataTable().clear();
// $('#tbodyOne').append(data);
             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
            });

});


$("#filtrarTwo").click(function (e) {
    if($('#grupofiltro2').val()!=$('#grupofiltro1').val()){
      $('.display').DataTable().destroy();//.clear().destroy();
    }
  $(".colapTwo").click();
//$('#filtrarOne').on('click', function (e) {
  var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    $('#tbodyTwo').empty();
    var formData = {
      numTable:2,
     //cursofiltro:$('#cursofiltro1').val(),
    // idcursocategoriafiltro:$('#categoriafiltro1').val(),
     idgrupofiltro:$('#grupofiltro2').val(),
     idgrupoUno:$('#grupofiltro1').val(),
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/obtenerEstudiantes";
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
              //success data
            console.log(data);
            if(data['msj']!=null){
              console.log(data['msj']);
              $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : ""+data['msj'],
                        closeBtn : false,
                        timer : 3000
                        });
            }else{
            console.log('Entroo a else');
              
    $('#tbodyTwo').append(data);
               
    $(".display").DataTable();
    }
            //clear().rows.add(data).draw(); 
           // $('#tbodyTwo').append(data);
             //$('.display').DataTable().ajax.reload();
            //table.ajax.reload();
 //           $(".display").DataTable().destroy();
//$(".display").DataTable().clear();
//$(".display").DataTable().clear();
// $('#tbodyOne').append(data);
             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
            });

});

 $(document).on('click','.traspasar',function(e){
 $('#btnGuardarTraspasar').attr("disabled", false);
  var value = this.value;
  $("#modalMsj").modal('show');
   $("#txtModalBodyMsj").html('<p>El estudiante '+$(this).data('nombre')+' pasara a grupo '+$('#grupofiltro2 option:selected').text()+
   '<br>Esta seguro de continuar con la accion?.</p>');
    $("#txtModalidestudiante").val(value);
  
});



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#btnGuardarTraspasar").click(function (e) {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    //$('#modalIngreso').modal('hide'); 
   e.preventDefault();
   /////Datos que PUTse envian para recibir en el controlador 
   var formData = {
     idgrupoInicial:$('#grupofiltro1').val(),
     idestudiante:$('#txtModalidestudiante').val(),
     idGrupoDestino :$('#grupofiltro2').val(),
   }      

      $('#btnGuardarTraspasar').attr("disabled", false);
        var state = $('#btnGuardar').val();///para ver si es add o update
        type = "PUT"; //for updating existing resource
        my_url = $('#path').val()+"/grupos/transferirEstudiante";
           
        //console.log($('#formmodalMsj').serializeArray());
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
                      //  window.location.reload();////recarga la pagina actual
                       // $(location).attr('href','/peticionForm');
                     }, 4000);
                     //$("#trow"+$('#txtModalidestudiante').val()).remove();
                     $('#btnGuardarTraspasar').attr("disabled", true);
                     $( "#filtrarOne" ).click();
                     $( "#filtrarTwo" ).click();
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
                $('#btnGuardarTraspasar').attr("disabled", false);
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
