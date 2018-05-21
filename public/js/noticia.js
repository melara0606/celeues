$(document).ready(function(){
 //$('#myTable').DataTable();
var data = {!! json_encode($estado) !!}; 
// var sites = {!! json_encode($estado) !!}
 console.log('sites');
$('#titulo').val(data);
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

        var type = "POST"; //for creating new resource
        var my_url = "noticiaForm/create";
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
              $("#msjshow").show();
              $("#msjshow").html(" <strong>Bien hecho!</strong> Peticion guardada exitosamente");
              setTimeout(function(){
                  $("#msjshow").hide();
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
