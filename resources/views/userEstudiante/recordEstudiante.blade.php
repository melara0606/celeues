	@extends('layouts.shared.appplantilla')

	  @section('links')
	  <link href="{{ asset('demo/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">

	@endsection

	@section('content')
<?php use App\Http\Controllers\grupoController;
	?>
	<style type="text/css">
	.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}


	</style>
		
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >
		<input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
<input type="text" hidden="true" name="path"  id="hiddenLlenarInfo" value="{{$llenarInfo}}">

<input type="text" hidden="true" name="path"  id="hiddenActuaIdioma" value="{{$actualIdioma}}">
					
<input type="text" hidden="true" name="path" id="hiddenCurso" value="{{$actualCurso}}">
			
<input type="text" hidden="true"  name="path" id="hiddenCantCurso" value="{{$cantidadCurso}}">

<input type="text" hidden="true"  name="path" id="hiddenNameLenguage" value="{{$nombreIdioma}}">

	<div class="row col-md-3" >
			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">

					<div class="panel-heading ">
						<h4>Idiomas</h4>
					</div>

					
					<div class="row col-sm-12 col-lg-12">
						<label for="" class="control-label text-main text-bold "></label>
						
									<div class="list-group">
					                    <h5> 	</h5>
					                   @forelse($idiomas as $idioma)
							               @if($actualIdioma==$idioma->ididiomas)
							                	<a class="list-group-item  list-group-item-primary " href="{{url('/')}}/record/{{$idioma->ididiomas}}">{{$idioma->nombre}}</a>
						                   @else

							                	<a class="list-group-item  list-group-item " href="{{url('/')}}/record/{{$idioma->ididiomas}}">{{$idioma->nombre}}</a>
						                   @endif
					                    

					                    @empty
					                    @endforelse	
					                    
					                   {{-- <a class="list-group-item  list-group-item-primary " href="http://localhost/celeues/public/curso/1">INGLES</a>

					                    <a class="list-group-item " href="http://localhost/celeues/public/curso/2">FRANCES<span style="font-size: 11px;" class="badge badge-primary text-xs text-muted">25</span></a>
--}}

					                </div>
					            </div>
					<div class="row">
						
					</div><hr>
					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Curso:</label>

						<select class="form-control" id="cursofiltro" name="cursofiltro">
							<option value="" selected="selected" disabled="">Seleccione un curso</option>
                 				@forelse($cursos as $curso)
                 						   <option value="{{$curso->idcursos}}">{{$curso->nombre}} {{$curso->turno}}</option>               				
                 				@empty
                 				@endforelse
	            			 						         
								            			</select>
					</div>
					<div class="row">
						
					</div>
					<br>
					<div class="row col-sm-12" align="right">
						<button class="btn btn-default btn-mint filtrar" value="0" type="button">Filtrar</button>

					</div>
					
					
					
        
					
					
					
					
					
					
				
					<br>
				</div>
			</div>		
			<hr>
		</div>
		
		<!--Row Main Right COL-MD -->
		<!--===================================================-->
		<div class="row col-md-9">
			<!--Main Panel-->
			<!--===================================================-->
			<div class="panel" style=" background:#eeeeee{{----}} ;border: 0.5px solid #ccc; box-shadow: 0px 0px #bbb !important; min-height: 500px;">

				<div class="panel-heading  " style="background-color: white;{{----}} box-shadow: 0px 1px #bbb !important">

					<div class="panel-control ">

						<!--<button id="nuevoModal" class="btn btn-default btn-active-primary" ><i class="demo-pli-pen-5"></i></button>
						<button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
						-->
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
					</div>{{----}}
					 <div id="cursoNombreDiv">
					<h3 class="panel-title "><p align="left" style="{{--color:white--}}" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">RECORD ACADEMICO </strong></p></h3></div>
						


				</div>{{----}}
				<!--1rst Row Panel Body-->
					<!--===================================================-->
					

					<!--End 1rst Row Panel Body-->
					<!--===================================================-->

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body " {{--style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);"--}}>
					<div class="row bord-btm " style="margin-bottom: 15px;">
						
						{{--<div class="col-sm-12 table-toolbar-left">
							<button class="btn btn-default imprimir"><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
							<div class="btn-group ">

								
								<div class="btn-group btn-group-sm ">

									<table>
										<tbody id="tableCategorias">
											<tr>
																			 <td>
										 	<!-- readonly  -->
										 	<button type="button" class="btn btn-mint active  filtrar" value="1">RECORD<span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted"></span></button> 
										 </td>
																			 <td>
										 	<!--  -->
										 	<button type="button" class="btn btn-mint   filtrar" value="2">NOTAS <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted"></span></button> 
										 </td>																			 
																				</tr>
										</tbody>
									</table>
	                       
	                   	</div>
							</div>
						</div>--}}
					</div>
					
					
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 
					 
					 <div id="divCardsGrupos" class="" name="divCardsGrupos" {{--style="display: none;"--}}>
					 	{{--<a href="" class="updateAula" data-name="email" data-type="text" data-pk="2" data-title="Enter email">email</a>--}}
					


					
						<!--<div class="label label-table bg-dark add-tooltip" data-original-title="KIDS" data-container="body" value="4" style="margin:10px">KIDS</div>-->
						
						
						<div class="col-sm-12 col-md-12 panel pos-rel" style="padding-bottom: 100px;padding-top:15px; border: 1px solid #ccc;box-shadow: 1px 1px 5px 0px #bbbbbb !important; border-radius: 5px; min-height: 800px{{----}}">
							
							 <div class="" >		
							 	<div class="pad-all text-center" >
 	<div class="comments media-block">
 		
			 		<div class="" style="width: 100%;height: 25px;display: inline-block;">
								                               
			<a style="float: center" class="media-heading box-inline text-md text-main  text-semibold  text-xs ">

					<p align="center" class="text-m text-bold media-heading mar-no text-main"> 
					 	<strong style="font-size: 14px;">CENTRO DE ENSENHANZAS DE LEGUA EXTRANJERA CELEUES</strong>
					 </p>
				 	<p align="center" class="text-m text-bold media-heading mar-no text-main"> 
				 		<strong style="font-size: 14px;">RECORD ACADEMICO </strong>
				 	</p>
				 	<p id="titulo" align="center" class="text-m text-bold media-heading mar-no text-main"> 
				 		<strong style="font-size: 14px;">{{$nombreIdioma}}</strong>
				 	</p>
				 </a>
				 <a  class="media-heading box-inline text-md text-main  text-semibold  text-xs " style="float: right;"><p><i class="pli-board icon-lg"></i></p></a>
				 </div>
			
 </div>
</div>

						
							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                            	<div class="" style="width: 100%;height: 25px;display: inline-block;">

					                                 
					                                 <a style="float: right; " class="media-heading box-inline text-md text-main  text-semibold  text-xs " data-name="name" data-type="text" data-pk="" data-title="Enter name">
					                                 	
					                                 		<p  class="text-lg" id="" ><i class="pli-board icon-sm"></i> <u>Fecha:{{--12/06/2019 5:30:10--}} <?php  echo (date('d/m/Y h:i:s a',time())); ?></u></p>
					                                 	

					                                 </a>
					                                 </div>
					                              
								                         
					                            </div>

					                            
					                
					                        </div>
					                </div>
					                <table class="table table-striped table-bordered row-border dataTable no-footer" >
					                	<tr>
					                		
					                	</tr>
					                	<tr>
					                	
					                	<th>Usuario</th>
					                	<th>Apellidos</th>
					                	<th>Nombre</th>

					                	<th>Sexo</th>
					                	</tr>
								                         	<tbody>
								                         		<tr>
								                         			
								                         			<td>{{$usuarioActual->name}}</td>
								                         			<td>{{$datosEstudiante->apellido}}</td>
								                         			<td>
								                         				{{$datosEstudiante->nombre}}
								                         			</td>
								                         			<td>{{$datosEstudiante->genero}}</td>
								                         			
								                         			
								                         			
								                         		</tr>
								                         		
								                         		

								                         	</tbody>
								                         </table>
								                         
					                
							 		
							 	</div>
							 	
			 			 	<div id="llenarInfo" class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px" >
			 		
					                <a  href="" style="padding: 5px;font-size: 17px" class="media-heading box-inline text-lg text-main ">
					                                	<div class="label bg-dark " data-container="body">Kids</div>
					                  </a>

					                <div class="table table-responsive">
					                <table class="table table-striped table-bordered row-border dataTable no-footer">
					                	<th>#</th>
					                	<th>Nivel</th>
					                	<th>Docente</th>
					                	<th>Curso</th>
					                	<th>estado</th>

					                	<th>anho</th>

					                	<th>fecha Inicio</th>

					                	<th>fecha Inicio</th>

					                	<th>Promedio</th>
								                         	<tbody>
								                         		@for($i=0;$i<2;$i++)
								                         		<tr>
								                         			<td>1</td>
								                         			<td>Nivel 5</td>
								                         			<td>Josue Humberto Hndez</td>
								                         			<td>SABATINO MATUTINO</td>
								                         			<td>
								                         				<div class="label bg-mint add-tooltip" data-original-title="KIDS" >APROVADO</div>
								                         			</td>
								                         			<td>2019</td>
								                         			<td>12/03/2019</td>
								                         			<td>12/05/2019</td>
								                         			<td align="center">10</td>
								                         			
								                         			
								                         			
								                         		</tr>

								                         		
								                         		@endfor
								                         		

								                         	</tbody>
								                         </table>
								                     </div>{{-- fin table responsive --}}


							 		
							 	</div>
							 	
							 	
					
							 	
							 </div><!--panel-->
							
						</div><!--fin col12-->
					
					</div>
					{{-- $grupos->render() --}}
					<!--End COL ROW CARTAS DE GRUPO  CON FOR ELSE-->
					<!--===================================================-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
					
				
				</div>
				<!--End Panel Body-->
				<!--===================================================-->

			</div>
			<!--End Main Panel-->
			<!--===================================================-->

		</div>
		<!--End Main Right COL-MD-->
		<!--===================================================-->
		

	
	<!--</div> No se por que si lo pongo se me hace feo el disenho del footer===================================================-->
	<!--End page content-->



	


	<!--Default Bootstrap Modal-->
	<!--===================================================-->
	<div class="modal fade" id="modalIngreso" 	name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true" >
		<div class="modal-dialog {{--modal-lg--}}" >
			<div class="modal-content" style="background: {{ asset('demo/img/bg-img/1.jpg') }}">

				<!--Modal header-->
				<div class="modal-header alert-primary" id="modalIngresoHeader" >
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Estudiante</label></h4>
				</div>

				<!--Modal body-->
				<div class="modal-body "  style="overflow-y: auto;  max-height: 500px;{{--background:#eee;--}}"	>
					
				</div>

				{{----}}<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-primary" id="btnGuardar">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End Default Bootstrap Modal-->



	<!--INFO Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalInfo" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-info">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Grupo</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">informacion de Grupo</h6>
            			
						<table   class="table {{--table-bordered--}} table-striped table-sm " align="center">
            					<tbody id="tablainfo">
            						<th>
            							
            								<td>ds</td>
            							
            						</th>
            						<tr>
            						<td></td> 
            						</tr>
            					</tbody>
            			</table>
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


	<!--DarBaja y Alta Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalMsj" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-danger">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Cambio Estado de Categoria</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h5 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
					<div id="msjAB"><p>Esta seguro de continuar con la accion?.</p>
					</div>
					</h5>
            			{{-- Este funciona para darle valor del id para dar baja o alta--}}
					 <form>
					 <input type="hidden" class="form-control" type="text"  id="estadoAB" name="estadoAB">
					  <input type="hidden" class="form-control" type="text"  id="registro_id" name="registro_id">
      			</form>
      			
						
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-danger" id="btnGuardarMsj">Continuar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End DarBaja y Alta Bootstrap Modal-->




	@endsection

	@section('script')

	
	{{--<script src="{{asset('js/jquery.easyPaginate.js')}}"></script>

<script src="{{asset('js/jquery.snippet.min.js')}}"></script> 
	--}}<script type="text/javascript">
		 $(document).ready(function(){
		 	$.niftyNav('collapse');

  //$('#anhofiltro').val($('#year').val());
  $('#periodofiltro').val($('#hiddenPeriodo').val());
  if($('#hiddenCantCurso')>1){
		$('#cursofiltro').val($('#hiddenCurso').val());
  } 
$('#llenarInfo').html($('#hiddenLlenarInfo').val());
    

   
$('.updateAula').editable({

           url: '/update-user',

           type: 'text',

           pk: 1,

           name: 'name',

           title: 'Enter name'

    });

/*$('#easyPaginate').easyPaginate({
    paginateElement: 'div',
    elementsPerPage: 5,
    effect: 'climb'
});*/


		 });

$(document).on('click','.filtrar',function(e){
   var value= $(this).val();
   
  // $('#hiddenIdCategoria').val(value);
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     IDIDIOMA:$('#hiddenActuaIdioma').val(),
     IDCURSO:$('#cursofiltro').val(),
   } 
          $('#llenarInfo').text("");     
          var type = "PUT"; //for creating new resource
          var my_url = $('#path').val()+"/record/filtrar";
          //console.log($('#form').serializeArray());
          console.log(formData);
          var cards="";
          var curso="";
          if($("#cursofiltro  option:selected").text()=="Seleccione un curso"){
          	curso=$('#hiddenNameLenguage').val();
          }else{
          	curso=$('#hiddenNameLenguage').val()+' '
          +$("#cursofiltro  option:selected").text();
          }
          $('#titulo').html('<strong style="font-size: 14px;">'+curso+'</strong>');//$("#cursofiltro  option:selected").text());
          

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
             console.log(data);
              $('#llenarInfo').html(data);




             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
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
});

	</script>
	{{--<script src="{{asset('js/grupo.js')}}"></script> 
	--}}

	@endsection





	<!--

						{{--COL ROW CARTAS DE GRUPO CON FOR ELSE--}}
					{{--===================================================--}}

					 <div id="divCardsGrupos" class="" name="divCardsGrupos"style="display: none;" {{----}}>
					 	{{--<a href="" class="updateAula" data-name="email" data-type="text" data-pk="2" data-title="Enter email">email</a>--}}
					
					 

					<div class="col-md-12 col-sm-12 single-item">

						{{--<div class="label label-table bg-dark add-tooltip" data-original-title="KIDS" data-container="body" value="4" style="margin:10px">KIDS</div>--}}
						<br>
						
						<div class="col-sm-12 col-md-12">
							
							 <div class="panel pos-rel" style=" border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">
<table class="table table-striped table-bordered row-border dataTable no-footer">
							<tbody>
								<th style="text-align: center">SABATINO MkmwekllkmATUTINO INGLES</th>
							</tbody>
						</table>

						
							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                            	<div class="" style="width: 100%;height: 25px;display: inline-block;">
					                               

					                                 <a style="float: right; " class="media-heading box-inline text-md text-main  text-semibold  text-xs " data-name="name" data-type="text" data-pk="" data-title="Enter name">
					                                 	
					                                 		<p  class="text-lg" id="" ><i class="pli-board icon-sm"></i> <u>Fecha:12/06/2019 5:30:10</u></p>
					                                 	

					                                 </a>
					                                 </div>
					                              
								                         
					                            </div>

					                            
					                
					                        </div>
					                </div>
					                
					                <table class="table table-striped table-bordered row-border dataTable no-footer">
					                	<tr>
					                	</tr>
					                	<tr>
					                	<th>#</th>
					                	<th>Usuario</th>
					                	<th>Apellido</th>
					                	<th>Nombre</th>
					                	<th>Sexo</th>
					                	</tr>
								                         	<tbody>
								                         		<tr>
								                         			<td>1</td>
								                         			<td>FM10033</td>
								                         			<td>Flores</td>
								                         			<td>
								                         				Meia
								                         			</td>
								                         			<td>MASCULINO</td>
								                         			
								                         			
								                         			
								                         		</tr>
								                         	</tbody>
								                         </table>
							 	</div>
							 	
							 	
							 	
							 </div>{{--panel--}}
							
						</div>{{--fin col12--}}
						<div class="col-sm-12 col-md-12">
							
							 <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">

							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                            	<div class="" style="width: 100%;height: 25px;display: inline-block;">
					                                <a href="" style="" class="media-heading  text-md box-inline  text-main text-semibold ">
					                                	<div class="label label-table bg-dark add-tooltip" data-original-title="KIDS" data-container="body" value="4"><div class="text-xs text-bold"></div>KIDS</div>
					                                </a>

					                                 <a style="float: right; " class="media-heading box-inline text-md text-main  text-semibold  text-xs updateAula" data-name="name" data-type="text" data-pk="" data-title="Enter name">
					                                 	
					                                 		<p  class="text-lg" id="aula" ><i class="pli-board icon-sm"></i> <u>N/A</u></p>
					                                 	

					                                 </a>
					                                 </div>
					                              
								                         
					                            </div>

					                            
					                
					                        </div>
					                </div>
					                
					                <table class="table table-striped table-bordered row-border dataTable no-footer">
					                	<th>#</th>
					                	<th>Nivel</th>
					                	<th>Docente</th>
					                	<th>estado</th>

					                	<th>anho</th>

					                	<th>fecha Inicio</th>

					                	<th>fecha Inicio</th>

					                	<th>Promedio</th>
								                         	<tbody>
								                         		@for($i=0;$i<3;$i++)
								                         		<tr>
								                         			<td>1</td>
								                         			<td>Nivel 5</td>
								                         			<td>Josue Humberto Hndez</td>
								                         			<td>
								                         				<div class="label label-table bg-mint add-tooltip" data-original-title="KIDS" data-container="body" value="4"><div class="text-xs text-bold">APROVADO</div></div>
								                         			</td>
								                         			<td>2019</td>
								                         			<td>12/03/2019</td>
								                         			<td>12/05/2019</td>
								                         			<td align="center">10</td>
								                         			
								                         			
								                         			
								                         		</tr>

								                         		
								                         		@endfor
								                         		

								                         	</tbody>
								                         </table>
					                
							 		
							 	</div>
							 	
							 	
							 	
							 </div>{{--panel--}}
							
						</div>{{--fin col12--}}
						
					</div>
					
					</div>
					{{-- $grupos->render() --}}
					{{--End COL ROW CARTAS DE GRUPO  CON FOR ELSE--}}
					{{--=================================================== --}}
		-->