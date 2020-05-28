

  $(document).on('click','.nuevoResp',function(){
   $('#pestMenorEdad').show();

   $("#pestEst").removeClass("active");
   $("#demo-bsc-tab-1").removeClass("active in");

   $("#demo-bsc-tab-2").removeClass("fade");

   $("#demo-bsc-tab-2").addClass("active in");

   $("#pestMenorEdad").addClass("active");
 });

  $(document).on('click','.infoResp',function(){

    var form_id =$('#resp_id').val();

       $("#tablainfoResp").empty();////Deja vacia la tabla
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
      $("#tablainfoResp").append(row); ///Se anhade a la tabla           

    },
    error: function (data) {
      console.log('Error de boton Info:', data);
    }
  });
        $('#divcollapseResponsable').show();
  //$('#modalInfo').modal('show'); ///modal de informacion
});




  $('#fechaNac').change(function() { 

   var actual = new Date();
   var elegido=new Date($(this).val());


   today_date = new Date();
   today_year = today_date.getFullYear();
   today_month = today_date.getMonth()+1;
   today_day = today_date.getDate();

   edad = today_year - elegido.getFullYear();

   if (today_month < (elegido.getMonth()+1)) {
    edad--;
  }
  if (((elegido.getMonth()+1) == today_month) && today_day < elegido.getDate()) {
    edad--;
  }
              /*$.niftyNoty({
                type: "success",
                container : "floating",
                title : "Bien Hecho!",
                            //message : elegido.getFullYear()+'/'+elegido.getMonth()+' year= '+(actual.getFullYear())+' month= '+(actual.getMonth()+1),
                message : edad+'anhos'+' actualMes= '+today_month+' elegidoMes= '+(elegido.getMonth()+2),
                //message :  elegido.getFullYear()+'/'+(elegido.getMonth()+1)+'/'+(elegido.getDate()+1),

                closeBtn : false,
                timer : 3000
              });*/
  $('#edad').val(edad);
  if(edad >= 18){
    $('#mayorEdad').show();

    $('#menorEdad').hide();

    $('#pestMenorEdad').hide();

  }else{
    $('#mayorEdad').hide();

    $('#menorEdad').show();


    llenarSelectResp();
  }

//var month = d.getMonth()+1;
//var day = d.getDate();


});

  function llenarSelectResp(){
    $("#resp_id").empty();
 //Otra forma de realizar el get ajax el mismo de infomodal    
 $.getJSON($("#path").val()+'/estudiante/bus/responsables', function (data) {
          //success data
          console.log(data);     
          for (var i = 0; i < data.length; i++) {
         //     $.each(data[i], function(key, val) {
            //$("#tabla").append('<tr id="task"><td>"'+data[i].nombre+'"</td><td>"'+data[i].ide+'"</td></tr>');
            $("#resp_id").append('<option value="' + data[i].id + '">' + data[i].nombre + ' ' + data[i].apellido + '</option>');
         //   output += '<option value="' + data[i].ide + '">' + data[i].nombre + '</option>';
       // });
     };      
   });


}

function calcularEdad(){
  
  var actual = new Date();
  var elegido=new Date($('#fechaNac').val());


  today_date = new Date();
  today_year = today_date.getFullYear();
  today_month = today_date.getMonth()+1;
  today_day = today_date.getDate();

  edad = today_year - elegido.getFullYear();

  if (today_month < (elegido.getMonth()+1)) {
   edad--;
 }
 if (((elegido.getMonth()+1) == today_month) && today_day < elegido.getDate()) {
   edad--;
 }
        
 $('#edad').val(edad);
}

function calculate_age(birth_month, birth_day, birth_year) {
  today_date = new Date();
  today_year = today_date.getFullYear();
  today_month = today_date.getMonth();
  today_day = today_date.getDate();
  edad = today_year - birth_year;

  if (today_month < (birth_month - 1)) {
    edad--;
  }
  if (((birth_month - 1) == today_month) && (today_day < birth_day)) {
    edad--;
  }
  console.log(edad);
}



$(document).on('click','.infoModal',function(){

  var form_id = $(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
       $.ajax({

        type: "GET",
        url: 'estudiante/buscar1/'+form_id,
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


$(document).on('click','.editarmodal',function(){
  var form_id = $(this).val();
  $("#form_id").val(form_id);

      //Otra forma de realizar el get ajax el mismo de infomodal
      //no poner pleca antes de la url    
      $.get('estudiante/buscar/' + form_id, function (data) {
            //success data
            console.log(data);
            $('#nombre').val(data.nombre);
            $('#apellido').val(data.apellido);
            $('#genero').val(data.genero);
            $('#fechaNac').val(data.fechaNac);
            if (data.dui!=null) {
              $('#dui').val(data.dui);
              $('#mayorEdad').show();
              $('#menorEdad').hide();
            }
            $('#direccion').val(data.direccion);
            $('#telefono').val(data.telefono);
            $('#email').val(data.email);
            if(data.idresponsables!=null){
              llenarSelectResp();
              $('#resp_id').val(data.idresponsables).trigger('change.select2');
              //              
              $('#mayorEdad').hide();
              $('#menorEdad').show();
              setTimeout(function(){
               $('#resp_id').val(data.idresponsables).trigger('change.select2');
              //                  window.location.reload();////recarga la pagina actual
                               // $(location).attr('href','/peticionForm');
                             }, 3000);

              }

              });

      $('#btnGuardar').val("update");///valor update para cuando actulize
      $("#btnGuardar").html("Modificar");///cambia el boton modificar
      $("#btnGuardar").removeClass("btn-info");
      $("#btnGuardar").addClass("btn-mint"); 
      $("#modalIngresoHeader").addClass("alert-mint"); 
      $("#modalIngresoLabel").html("Modificar Estudiante");///titulo del modal
      $('#modalIngreso').modal('show');    
    });



$("#btnnuevo").click(function(){

  $('#btnGuardar').val("add");
  $("#btnGuardar").html("Guardar");
  $("#btnGuardar").removeClass("btn-mint");
  $("#modalIngresoHeader").removeClass("alert-mint");
  $("#modalIngresoLabel").html("Registro de Estudiante");
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
 calcularEdad();
   /////Datos que se envian para recibir en el controlador 
   if($('#edad').val() >= 18){
     var formData = {
       edad:$('#edad').val(),
       nombre:$('#nombre').val(),
       apellido:$('#apellido').val(),
       genero:$('#genero').val(),
       fechaNac:$('#fechaNac').val(),
       direccion:$('#direccion').val(),
       dui:$('#dui').val(),
       telefono:$('#telefono').val(),
       email:$('#email').val(),
       idresponsables:null,//$('#resp_id').val(),
    }       
  }else{
   var formData = {
     edad:$('#edad').val(),
     nombre:$('#nombre').val(),
     apellido:$('#apellido').val(),
     genero:$('#genero').val(),
     fechaNac:$('#fechaNac').val(),
     direccion:$('#direccion').val(),
      // dui:$('#dui').val(),
      telefono:$('#telefono').val(),
      email:$('#email').val(),
      idresponsables:$('#resp_id').val(),
    }       
  }
          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url =$("#path").val()+"/estudiante/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = 'estudiante/update/'+form_id;
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
                       title : 'Llenar Campos Requeridos!!',
                       message : msj,
                       timer : 6000
                     });

            }
            // data[0];
            if(data['bandera']==1){
              // $('#modalIngreso').modal('hide');
              $.niftyNoty({
                type: "success",
                container : "floating",
                title : "Bien Hecho!",
                message : data['response'],
                closeBtn : false,
                timer : 3000
              });

              setTimeout(function(){
                 // $("#form").trigger("reset");
                 // window.location.reload();////recarga la pagina actual
                 // $(location).attr('href','/peticionForm');
               }, 4000);
            } else  if(data['bandera']==2){
               ///menasje de error
               $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Llenar Campos Requeridos!",
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


  $("#guardarResp").click(function (e) {
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
             email:$('#emailR').val(),
        }       

          var state = $('#guardarResp').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = $("#path").val()+"/responsable/create";
          var form_id = $('#form_idR').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = $("#path").val()+'/responsable/update/'+form_id;
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
              // $('#modalIngreso').modal('hide');
              $.niftyNoty({
                type: "info",
                container : "floating",
                title : "Bien Hecho!",
                message : data['response']+' Ver pestaña Estudiante',
                closeBtn : false,
                timer : 3000
              });
              $('#formResp').trigger('reset'); 
              llenarSelectResp();       
              /* setTimeout(function(){
                  $("#form").trigger("reset");
                  window.location.reload();////recarga la pagina actual
                 // $(location).attr('href','/peticionForm');
               }, 4000);*/
             } else  if(data['bandera']==2){
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



  $(document).on('click','.crearUsuarioEstudiante',function(){
    var form_id = $(this).val();
    $('#estudiante_id').val(form_id);
    $('#modalIngresoUsuario').modal('show');
    $('#parrafoUsuario').html("Esta a punto de crear un usuario al estudiante <br>"+ $(this).data('nombre'));    
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
          var my_url = "estudiante/createUser";
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
