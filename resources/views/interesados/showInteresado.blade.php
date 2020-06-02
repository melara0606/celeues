@extends('layouts.shared.appplantilla')
@section('links')
	  <link href="{{ asset('demo/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">

	@endsection
@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->

              <div id="page-head">
                    
               <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    {{--<div id="page-title">
                        <h1 class="page-header text-overflow"></h1>
                        
                    </div>--}}
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="{{url('/')}}/noticia">Noticias</a></li>
					<li class="active">Interesados</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
       
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content" >

                <!--col-md-12-->
			    <!--===================================================-->
				<div class="col-md-12">	
                   <input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
				   
				
				   <input type="text" hidden="true"   id="idinteresado" name="idinteresado" />
					<div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

					    <div class="panel-heading {{--bg-mint--}}" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
					    	<div class="panel-control">
					                        <button onclick="location.href='{{url('/')}}/noticia/{{$noticia->id}}/interesados'"  id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
					                        <div class="dropdown">
					                            <button class="dropdown-toggle btn btn-default btn-active-primary" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical"></i></button>
					                            <ul class="dropdown-menu dropdown-menu-right">
					                                <li><a href="#">Action</a></li>
					                                <li><a href="#">Another action</a></li>
					                                <li><a href="#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#">Separated link</a></li>
					                            </ul>
					                        </div>
					                    </div>

				<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">INTERESADOS</strong></p></h3>

					    </div>

					
					    <!--Data Table-->
					    <!--===================================================-->
					    <div class="panel-body" style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
					       {{--<div class="pad-btm form-inline">
					            <div class="row">
					                <div class="col-sm-6 table-toolbar-left">
					                    <button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> Add</button>
					                    <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
					                    <div class="btn-group">
					                        <button class="btn btn-default"><i class="demo-pli-exclamation"></i></button>
					                        <button class="btn btn-default"><i class="demo-pli-recycling"></i></button>
					                    </div>
					                </div>
					                <div class="col-sm-6 table-toolbar-right">
					                    <div class="form-group">
					              	          <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
					                    </div>
					                    <div class="btn-group">
					                        <button class="btn btn-default"><i class="demo-pli-download-from-cloud"></i></button>
					                        <div class="btn-group dropdown">
					                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
					                                <i class="demo-pli-gear"></i>
					                                <span class="caret"></span>
					                            </button>
					                            <ul role="menu" class="dropdown-menu dropdown-menu-right">
					                                <li><a href="#">Action</a></li>
					                                <li><a href="#">Another action</a></li>
					                                <li><a href="#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#">Separated link</a></li>
					                            </ul>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>--}}
					        <!--col-md-6-->
						    <!--===================================================-->
							<div class="col-md-5">
								
									
								<div class="{{--panel-group--}}" >
								  <div class="panel {{--panel-default --}} ">
								    <div class="panel-heading bg-primary" style="border: 1px solid #ccc;">
								      	<div style="display: inline-block;width: 100%;">
									      	  
										      <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="color:white;font-size: 13px; " >INFORMACION DE NOTICIA</strong></p></h4>
								      		
									      <h4 class="panel-title" align="right" style="float: right;" >
									      	
									        <a data-toggle="collapse" href="#collapseProfe" class="colapOne" ><i class="ion-plus"></i></a>
									      </h4>
								  		</div>
								    </div>
								    <div id="collapseProfe" class="panel-collapse " style="border-bottom: 1px solid #ccc;">
								    	<br>
								     	<div class="row pad-btm form-inline">
											<div class=" col-md-12">
												<label  class="control-label text-main text-bold col-md-3">TÍTULO:</label>
												<label class="control-label  text-bold col-md-9">{{$noticia->titulo}} </label>
											</div>
											<br>
											<br>
											<div class=" col-md-12">
												<label for="" class="control-label text-main text-bold col-md-3">DESCRIPCIÓN:</label>

												 <label class="control-label  text-bold col-md-9">{{$noticia->descripcion}} </label>
										          
											</div>
											<br>
											<br>
											<div class=" col-md-12">
												<label for="" class="control-label text-main text-bold col-md-3">MÓDULO:</label>

												 <label class="control-label  text-bold col-md-9">{{$noticia->numModulo}} </label>
										          
											</div>
											<br>
											<br>
											<div class=" col-md-12">
												<label for="" class="control-label text-main text-bold col-md-3">MODALIDAD:</label>

												 <label class="control-label  text-bold col-md-9">{{$noticia->modalidad}} </label>
										          
											</div>		
											<br>
											<br>
											<div class=" col-md-12">
												<label for="" class="control-label text-main text-bold col-md-3">INTERESADOS:</label>

												 <label class="control-label  text-bold col-md-9">{{$noticia->numInteresados}} </label>
										          
											</div>		
											<br>
											<br>
											<div class=" col-md-12">
												<label for="" class="control-label text-main text-bold col-md-3">REGISTRADOS:</label>

												 <label class="control-label  text-bold col-md-9">{{$noticia->numRegistrados}} </label>
										          
											</div>		
											<br>
											<br>
											<div class=" col-md-12">
												<label for="" class="control-label text-main text-bold col-md-3">ESTADO:</label>

												 <label class="control-label  text-bold col-md-9">{{$noticia->estado}} </label>
										          
											</div>
											<br>
											<br>
										</div>
								    </div>
								  </div>
								</div>

							</div>
							<!--col-md-6-->
					    	<!--===================================================-->	
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
					        <!--col-md-7-->
						    <!--===================================================-->
							<div class="col-md-7">
								<!--COLLAPSE INTERSADOS-->
						    	<!--===================================================-->
								<div class="{{--panel-group--}}" >
								  <div class="panel {{--panel-default--}}">
								    <div class="panel-heading bg-gray-dark" style="border: 1px solid #ccc;">
								      	<div style="display: inline-block;width: 100%;">
									      	  
										      <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeonTwo" name="titleacordeonTwo"> <strong style="font-size: 13px; " >INTERESADOS</strong></p></h4>
								      		
									      <h4 class="panel-title" align="right" style="float: right;" >
									      	
									       {{-- <a data-toggle="collapse" href="#collapse2" class="colapTwo"><i class="ion-plus"></i></a> --}}
									      </h4>
								  		</div>
								    </div>
								    <div id="collapse2" class="panel-collapse collapse" style="border-bottom: 1px solid #ccc;">
								    	<br>
								     	<div class="row pad-btm form-inline">
											
										</div>
								    </div>
								  </div>
								</div>
								<!--FIN COLLAPSE INTERSADOS-->
						    	<!--===================================================-->
								
					        <div class="{{--table-responsive--}}">
					            <table id="myTable" class="table table-striped" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
					                <thead>
					                    <tr>

											<th class="text-center">#</th>
					                        <th class="text-left">Nombre</th>
					                        <th>Fecha Nac.</th>
					                        <th>Teléfono</th>
					                        <th>Acciones</th>
					                       
					                    </tr>
					                </thead>
					                <tbody>
					                	<div style="display: none;">{{ $correlativo=1 }}</div>
					                    @forelse($interesados as $interesado)
										<tr id="{{ $interesado->id }}">
											<td align="center">{{ $correlativo++ }}</td>
											<td align="left">
												<div class="">
													<div class="text-main text-bold">
													{{ $interesado->nombre }} {{ $interesado->apellido }}
													</div>
												</div>
											</td>
											<td ><span class="text-muted">{{ date("d-m-Y",strtotime($interesado->fechaNac)) }}</span></td>
											<td ><div class="label label-table bg-dark"><div class="text-sm text-bold">{{ $interesado->telefono }}</div></div></td>
											<td align="center">
											<button  class="btn btn-icon btn-default btn-xs  btn-hover-info infoModalInteresado add-tooltip" data-original-title="Info Interesado" data-container="body" value="{{$interesado->id}}"><i class="demo-pli-exclamation icon-sm "></i>{{--Info--}}</button>
											@if($interesado->estado=='INTERESADO')
											<button  class="btn btn-icon btn-default btn-default btn-xs  btn-hover-mint add-tooltip addEstudiante" data-original-title="Crear Estudiante" data-container="body" data-nombre="{{ $interesado->nombre }}" data-apellido="{{ $interesado->apellido }}" data-fechaNac="{{$interesado->fechaNac}}" data-email="{{$interesado->email}}" data-telefono="{{$interesado->telefono}}" value="{{$interesado->id}}">+<i class="pli-student-male icon-lg "></i> </button>
											@endif
											<!--<button class="btn btn-default btn-sm btn-default btn-success"><i class="demo-pli-pencil icon-sm"></i></button>
											<button class="btn btn-default btn-sm btn-circle btn-hover-info"><i class="demo-pli-exclamation icon-sm"></i></button>
											-->
											
											</td>

									        </tr>
									       
											@empty
									    	<p>No hay mensajes destacados</p>
									  		@endforelse
											        
																		</tbody>


										</table><hr>
							        </div>
							 </div>
							<!--col-md-7-->
					    	<!--===================================================-->
					    </div>
					    <!--===================================================-->
					    <!--End Panel Body-->
					</div>

					{{-- aqui termina col 10 --}}
		</div>
		<!--===================================================-->
		<!--End col-12-->
				    

        </div>
        <!--===================================================-->
        <!--End page content-->

   
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<!--INFO Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalInfo" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-info">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" >Información de Interesado</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Información</h6>
            			<div class="col-md-12">
						<table   class="table {{--table-bordered--}} table-striped table-sm " align="center">
            					<tbody id="tablainfo">
            						<tr>
            						<td></td> 
            						</tr>
            					</tbody>
            			</table>
            			</div>
					<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>-->
						</div>
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End Large Bootstrap Modal-->

	<!-- Modal con tabindex -1 no funciona select2 en bootstrap 4 -->
	<div class="modal fade" id="modalIngreso" 	name="modalIngreso" role="dialog"  tabindex="-1"  aria-labelledby="demo-default-modal" aria-hidden="true" >
		<div class="modal-dialog {{----}}modal-lg">
			<div class="modal-content">

				<!--Modal header-->
				<div class="modal-header alert-primary" id="modalIngresoHeader" >
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Estudiante</label></h4>
				</div>

				<!--Modal body-->
				<div class="modal-body" style="overflow-y: auto;  max-height: 470px;{{--background-color: #eeeeee--}}"	>
					@include('estudiante.formEstudiante')
				</div>

				{{----}}<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-primary" id="btnGuardarInteresado" value="POST">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End Default Bootstrap Modal-->

@endsection

@section('script')

<script >
	$(document).ready(function(){
	//$("#msjshow").hide();
	$('#myTable').DataTable({
      //"dom": '<"top"l>frt<"bottom"pi>'
      language: {
      	"dom": '<"top"l>frt<"bottom"pi>',
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ ",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ ",
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
    $.niftyNav('collapse');
     $("#resp_id").select2({
     dropdownParent: $('#modalIngreso'),///esto hace que muestre en modal 3
     tags: "true", 
     placeholder: "Selecione un responsable",
     width: "100%"});



});

	$(document).on('click','.infoModalInteresado',function(){

 	 var value = $(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
       console.log(value);
       $.ajax({

        type: "GET",
        url: $("#path").val()+'/interesados/buscar/'+value,
        data: value,
        dataType: 'json',
        success: function (data) {
          console.log(data);
         // for (var i = 0; i < data.length; i++) {

          var row = '<tr><td width="30%"> Nombre: </td><td width="70%">' + data.nombre + ' ' + data.apellido + '</td>';
          row +='<tr><td> Fecha de Nacimiento: </td><td>' + data.fechaNac + '</td>';
  
          row +='<tr><td> Email: </td><td>' + data.email + '</td>'
          row +='<tr><td> Telefono: </td><td>' + data.telefono + '</td>';
  


          row +='<tr><td> Creado: </td><td>' + data.created_at + '</td>';
              $("#tablainfo").append(row); ///Se anhade a la tabla           
        //};
      },
      error: function (data) {
        console.log('Error de boton Info:', data);
      }
    });/**/

	  $('#modalInfo').modal('show'); ///modal de informacion
	});


	$(document).on('click','.addEstudiante',function(){
		var id = $(this).val();
		$("#nombre").val($(this).data('nombre'));

		$("#apellido").val($(this).data('apellido'));
		$("#fechaNac").val($(this).data('fechaNac'));

		$("#telefono").val($(this).data('telefono'));

		$("#email").val($(this).data('email'));
		$('#idinteresado').val(id);
		
		$('#modalIngreso').modal('show'); ///modal de informacion
	});

	
	$("#btnGuardarInteresado").click(function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })

 e.preventDefault();

   /////Datos que se envian para recibir en el controlador 
   if($('#edad').val() >= 18){
     var formData = {
		idInteresado:$('#idinteresado').val(),
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
	idInteresado:$('#idinteresado').val(),
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
         // var state = $('#btnGuardarInteresado').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url =$("#path").val()+"/estudiante/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

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

</script>

	<script src="{{asset('js/estudiante.js')}}"></script>
@endsection