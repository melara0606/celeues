$(document).ready(function(){
  //$('#myTable').DataTable({
    //"dom": '<"top"lf>rt<"bottom"pi>'
  //});

  //No se para que es pero en la documentacion dice que sirve para algo
  //$(document).trigger('nifty.ready');
//  $.niftyNav('refresh');
  $.niftyNav('bind');
  //$.niftyNav('collapse');
  //$.niftyNav('colExpToggle');

$.niftyAside('darkTheme');
$('#anhofiltro').val($('#year').val());

  $('#nperiodofiltro').val($('#hiddenPeriodo').val());
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
  url: 'periodo/buscar/'+form_id,
  data: form_id,
  dataType: 'json',
  success: function (data) {
    console.log(data);

    var row = '<tr><td width="30%"> Periodo: </td><td width="70%">' + data.nperiodo + '</td>';
    row +='<tr><td> Año: </td><td>' + data.anho + '</td>';
    row +='<tr><td> Fecha Inicio: </td><td>' + data.fechaIni + '</td>';
    row +='<tr><td> Inicio de Pago: </td><td>' + data.iniPago + '</td>';
    row +='<tr><td> Fecha Fin: </td><td>' + data.fechaFin + '</td>';
    row +='<tr><td> Fin de Pago: </td><td>' + data.finPago + '</td>';
  //  row +='<tr><td> Modalidad: </td><td>' + data.modalidad + '</td>';
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
    $.get('periodo/buscar/' + form_id, function (data) {
          //success data
          console.log(data);
          $('#nperiodo').val(data.nperiodo);
          $('#anho').val(data.anho);
          $('#fechaIniModal').val(data.fechaIni);
          $('#iniPagoModal').val(data.iniPago);
          $('#fechaFinModal').val(data.fechaFin);
          $('#finPagoModal').val(data.finPago);
        });

    $('#modalFechas').modal('show');
  });


$("#btnnuevo").click(function(e){

  $('#btnGuardar').val("add");
  $("#btnGuardar").html("Nuevo");
  $("#btnGuardar").removeClass("btn-mint");
  $("#modalIngresoHeader").removeClass("alert-mint");
  $("#modalIngresoLabel").html("Registro de Periodo");
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
   nperiodo:$('#nperiodo').val(),
   anho:$('#anho').val(),
   fechaIni:$('#fechaIni').val(),
   iniPago:$('#iniPago').val(),
   fechaFin:$('#fechaFin').val(),
   finPago:$('#finPago').val(),


 }

        var state = $('#btnGuardar').val();///para ver si es add o update
        var type = "POST"; //for creating new resource
        var my_url = "periodo/create";
        var form_id = $('#form_id').val();///el id del registro ya sea si modificamos

        if (state == "update"){
          type = "PUT"; //for updating existing resource
          my_url = 'periodo/update/'+form_id;
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
             //   $("#floating-top-right").html('');
                $("#form").trigger("reset");
                window.location.reload();////recarga la pagina actual
               // $(location).attr('href','/peticionForm');
             }, 4000);
           } else{
             $.niftyNoty({
               type: "danger",
               container : "floating",
               title : "Upps!",
               message : data['response'],
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
          url: 'periodo/cambiarEstado/'+value,
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
              $('#modalMsj').modal('hide');
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


  });

  $(document).on('click','.filtrar',function(){
  //  var form_id = $(this).val();
    console.log($('#anhofiltro').val()+'/'+$('#nperiodofiltro').val());
    //$("#form_id").val(form_id);
 $("#myTable").empty();////Deja vacia la tabla
 var row="";
/*var row = '<tr><th class="text-center">#</th><th class="text-center">Periodo</th>'+
'<th>Fecha Iniiocio</th>'+
  '<th>Fecha Fin</th>'+
  '<th>Inicio de Pago</th>'+
  '<th>Fin de Pago</th>'+
    '<th class="text-center">Estado</th>'+
    '<th class="text-center">Acciones</th>'+
    '</tr>';*/
  $('#refresh').niftyOverlay({
    title:'loading..'
  });
      //Otra forma de realizar el get ajax el mismo de infomodal
      //no poner pleca antes de la url
      $.get('periodo/filtrar/' + $('#anhofiltro').val()+'/'+$('#nperiodofiltro').val(), function (data) {
            //success data
            console.log(data);
            for (var i = 0; i < data.length; i++) {
              row +='<tr><td align="center">' + data[i].numPeriodo +'</td>';
              row +='<td align="center">Periodo ' + data[i].numPeriodo +'-'+ data[i].anho + '</td>';
              if (data[i].fechaIni==null) {
                row +='<td align="center">--</td>';
              }else {
                row +='<td align="center">' + data[i].fechaIni +'</td>';
              }
              if (data[i].fechaFin==null) {
                row +='<td align="center">--</td>';
              }else {
                row +='<td align="center">' + data[i].fechaFin +'</td>';
              }
              if (data[i].iniPago==null) {
                row +='<td align="center">--</td>';
              }else {
                row +='<td align="center">' + data[i].iniPago +'</td>';
              }
              if (data[i].finPago==null) {
                row +='<td align="center">--</td>';
              }else {
                row +='<td align="center">' + data[i].finPago +'</td>';
              }
              if(data[i].estado=='ACTIVO'){
                row +='<td align="center"><div class="label label-table bg-mint"><div class="text-xs text-bold">' + data[i].estado +'</div></div></td>';

              }else {
                row +='<td align="center"><div class="label label-table bg-gray"><div class="text-xs text-bold">' + data[i].estado +'</div></div></td>';
              }

              row +='<td align="center">';
    row +='<button class="btn btn-icon btn-default btn-xs  add-tooltip editarmodal" data-original-title="Editar Fechas" data-container="body" value="' + data[i].id +'"><i class="demo-psi-pen-5 icon-sm " ></i> </button>';
            row +=' <button class="btn btn-icon btn-default btn-xs  infoModal add-tooltip " data-original-title="Información" data-container="body" value="' + data[i].id +'"><i class="demo-pli-exclamation icon-sm " ></i> </button>';
             
               if(data[i].estado=='ACTIVO'){
                 row +=' <button class="btn btn-icon btn-default btn-xs   darbaja" data-original-title="Desactivar" value="' + data[i].id +'"><div class="demo-icon"><i class="ion-chevron-down"></i><span> </span></div> </button>';
                }
                if(data[i].estado=='INACTIVO'){
                 row +=' <button class="btn btn-icon btn-default btn-xs   darAlta" data-original-title="Activar" value="' + data[i].id +'"><div class="demo-icon"><i class="ion-chevron-up"></i><span> </span></div> </button>';
                }
 row +='</td></tr>'
              console.log(row);

            //  row +='<tr><td>' + data[i].año + '</td>';
          };

$("#myTable").append(row);
//$('[data-toggle="add-tooltip"').tooltip();
$(".editarmodal").tooltip();
$(".infoModal").tooltip();
$(".darbaja").tooltip();
$(".darAlta").tooltip();


          });



    });



    $('#refresh').niftyOverlay().on('click',function(){
      $(this).niftyOverlay('show');
      $(this).niftyOverlay('hide');

    });
////////////////modificar////////////////

    $("#btnGuardarFechas").click(function (e) {
     $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    })

     e.preventDefault();
     /////Datos que se envian para recibir en el controlador
     var formData = {

       fechaIni:$('#fechaIniModal').val(),
       iniPago:$('#iniPagoModal').val(),
       fechaFin:$('#fechaFinModal').val(),
       finPago:$('#finPagoModal').val(),


     }

            var type = "PUT"; //for creating new resource
            var form_id = $('#form_id').val();///el id del registro ya sea si modificamos

            var my_url = "periodo/update/"+form_id;
              console.log(formData);

            $.ajax({

              type: type,
              url: my_url,
              data: formData,
              dataType: 'json',
              success: function (data) {
               console.log(data);
                 $('#modalFechas').modal('hide');
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
                 //   $("#floating-top-right").html('');
                    $("#form").trigger("reset");
                    window.location.reload();////recarga la pagina actual
                   // $(location).attr('href','/peticionForm');
                 }, 4000);
               } else{
                 $.niftyNoty({
                   type: "danger",
                   container : "floating",
                   title : "Upps!",
                   message : data['response'],
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
