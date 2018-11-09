 $(document).ready(function(){
    $('#myTable').DataTable({
      //"dom": '<"top"lf>rt<"bottom"pi>'
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
    $.niftyNav('bind');
    //$.niftyNav('collapse');
    //$.niftyNav('colExpToggle');
   
$.niftyAside('darkTheme');
/* $("#idioma_id").select2({
     dropdownParent: $('#modalIngreso'),///esto hace que muestre en modal 3
      tags: "true", 
  placeholder: "Selecione un Idioma",
  width: "100%"});
 $("#moda_id").select2({
     dropdownParent: $('#modalIngreso'),///esto hace que muestre en modal 3
      tags: "true", 
  placeholder: "Selecione una Modalidad",
  width: "100%"});
 $("#cat_id").select2({
     dropdownParent: $('#modalIngreso'),///esto hace que muestre en modal 3
      tags: "true", 
  placeholder: "Selecione una Categoria",
  width: "100%"});
  */



llenarSelectIdioma();
llenarSelectModalidad();
llenarSelectCategoria();
  });


function llenarSelectIdioma(){
  //  $("#resp_id").empty();
 //Otra forma de realizar el get ajax el mismo de infomodal    
    $.getJSON('curso/bus/idioma', function (data) {
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
    $.getJSON('curso/bus/modalidad', function (data) {
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
    $.getJSON('curso/bus/categoria', function (data) {
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
                      '<div class="form-group "> '+ 
                   // '<label for="example-email-input" class="col-md-2 control-label text-main text-bold ">Categoria:*</label>'+
                    '<div class="col-md-7">'+
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
        '</tr>'); 
     //Otra forma de realizar el get ajax el mismo de infomodal    
    $.getJSON('curso/bus/categoria', function (data) {
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
   
  $("#trow" + value).remove(); 
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
                             '<option value="3">Miercoles</option>'+
                             '<option value="4">Jueves</option>'+
                             '<option value="5">Viernes</option>'+
                             '<option value="6">Sabado</option>'+
                             '<option value="7">Domingo</option>'+
                             
                        '</select>'+
                      
                                       
                   '</div>'+
                    '<div class="col-md-8">'+

                            '<div class=" input-daterange input-group" id="datepicker">'+
                             '<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>'+
                                   
                                    '<span class="input-group-addon">Inicio</span>'+
                                    '<input type="time" placeholder="Hora Inicio" class="form-control"  id="horaInicio'+(valor)+'" name="horaInicio'+(valor)+'" />'+
                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>'+
                                    '<span class="input-group-addon">Fin</span>'+
                                    '<input type="time" placeholder="Hora Fin" class="form-control" id="horaFin'+(valor)+'" name="horaFin'+(valor)+'" />'+
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
    $("#btnGuardar").html("Nuevo");
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

   e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     form_id:$('#form_id').val(),
     idioma_id:$('#idioma_id').val(),
     moda_id :$('#moda_id').val(),
   //  edadFin:$('#edadFin').val(),
   }      

          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = "curso/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'hvbn/update/'+form_id;
        }
          console.log($('form[name="form"]').serializeArray());//$('#form').serialize());
          console.log($('#form').serialize());
          //console.log($('#form').serializeArray());
         
          console.log($("#cat_id2").val());
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
