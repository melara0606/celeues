$(document).ready(function(){
 //$('#myTable').DataTable();
//var data = {!! json_encode($estado) !!}; 
// var sites = {!! json_encode($estado) !!}
// console.log('sites');
//$('#titulo').val(data);

  //$("#msjshow").hide();
  $('#myTable').DataTable();
  $(document).trigger('nifty.ready');

});

$("#btnnuevo").click(function(){

  $('#btnGuardar').val("add");
  $("#btnGuardar").html("Nuevo");
  $("#btnGuardar").removeClass("btn-success");
  $("#modalIngresoLabel").html("Registro de Idioma");
  //$("#tabla").append('<tr id="task"><td>'+ $("#btnsave").val() +'</td><td>');
    //$('#frm').trigger('reset');
    //$('#frmsocios')[0].reset();
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
         nombre:$('#nombre').val(),
		 descripcion:$('#descripcion').val(),

           }       

        var type = "POST"; //for creating new resource
        var my_url = "idioma/create";
        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
               console.log(data);
            /*  $('#Modal3').modal('hide');
              */
             // $("#msjshow").show();
             // $("#msjshow").html(" <strong>Bien hecho!</strong> Peticion guardada exitosamente");
              setTimeout(function(){
               //   $("#msjshow").hide();
                   $("#form").trigger("reset");
               // $(location).attr('href','/peticionForm');
              }, 4000);


           
            },
            error: function (data) {
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
