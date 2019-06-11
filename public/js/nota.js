$(document).ready(function(){		 	
		
		$('.enter').keypress(function (e) {
			  if(e.which ==13){

			   	console.log($(this).attr('id'));
			   	console.log($(this).val());	

			     ////////////////////////////
			    $.ajaxSetup({
			    headers: {
			      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			    }
			  	})
			   e.preventDefault();
			  
			   /////Datos que se envian para recibir en el controlador 
			   var formData = {
			     nota:$(this).val(),
			     idestudiantegrupos:$(this).data('idestudiantegrupos'),
			     idnotas:$(this).data('idnotas'),
			     
			   }      

			          var type = "PUT"; //for creating new resource
			          var my_url = $('#path').val()+"/estudiantegrupo/createNota";
			        console.log(formData);
			        var div=$(this).attr('id');
			        var etFinal=$(this).data('idestudiantegrupos');
			          $.ajax({

			            type: type,
			            url: my_url,
			            data: formData,
			            dataType: 'json',
			            success: function (data) {
			                     console.log(data);
			                    // data[0];
			                    if(data['bandera']==1){
			                    	//div+=$(this).attr('id');
			                    	console.log(div);
			                       // $('#modalAsigEstudiante').modal('hide');

			                       $('#div'+div).removeClass('has-error');
			                       $('#div'+div).addClass('has-success');
			                       if (data['notaFinal']>=6) {
			                       		$('#divetf'+etFinal).removeClass('has-error');
			                       		$('#divetf'+etFinal).addClass('has-success');
			                      	    $('#etf'+etFinal).val(data['notaFinal']);
			                       }else{
			                       		$('#divetf'+etFinal).removeClass('has-success');
			                       		$('#divetf'+etFinal).addClass('has-error');
			                      	    $('#etf'+etFinal).val(data['notaFinal']);
			                       }//fin else
			                        
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
			                       $('#div'+div).removeClass('has-success');
			                        $('#div'+div).addClass('has-error');
			                     
			                     

			                     }

			             },
			             error: function (data) {
			              var errors=data.responseJSON;
			                console.log(errors);
			              //  $('#btnGuardar').attr("disabled", false);
			              ///menasje de error
			              $.niftyNoty({
			                type: "danger",
			                container : "floating",
			                title : "Upps!",
			                message : "A ocurrido un problema"+errors,
			                closeBtn : false,
			                timer : 3000
			                });
			              
			              console.log('Error de Create ponderacion:', data);
			              
			                  }
			                });


			     //////////////////////////// 
			   }////////si key es 13

					    
		});///fin enter keypress
});

     