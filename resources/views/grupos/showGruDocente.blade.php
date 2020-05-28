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
	<li><a href=""><i class="demo-pli-home"></i></a></li>
	<li class="active">Grupos</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->

</div>		
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >
		<input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
			

		
	<div class="row col-md-3">
			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">
					<div class="panel-heading ">
						<h4>	Infomación</h4>
					</div>

					
					<div class="row col-sm-12 col-lg-12">
						<label for="" class="control-label text-main text-bold "></label>
						
									<div class="list-group">
					                    <h5> &nbsp; 	</h5>
					                    					                    <a class="list-group-item  list-group-item-primary " href="http://localhost/celeues/public/curso/1">GRUPOS</a>

					                    					                    <a class="list-group-item " href="http://localhost/celeues/public/curso/2">PRESTAMOS</a>


					                    					                </div>
					            </div>
					<div class="row">
						
					</div>
					<br>
					<hr>
					
        
					
					
					
					
					
					
				
					<br>
				</div>
			</div>		
			<hr>
		</div>
		{{--<div class="row col-md-1"></div> --}}
		<!--Row Main Right COL-MD -->
		<!--===================================================-->
		<div class="row col-md-9">
			<!--Main Panel-->
			<!--===================================================-->
			<div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

				<div class="panel-heading " style="background-color: white; box-shadow: 0px 1px #bbb !important">

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
					</div>
					 <div id="cursoNombreDiv">
					<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">GRUPOS</strong></p></h3></div>
						


				</div>
				<!--1rst Row Panel Body-->
					<!--===================================================-->
					

					<!--End 1rst Row Panel Body-->
					<!--===================================================-->

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body " {{--style="background-image: linear-gradient(#eeeeee 14%, #ffffff 0%);"--}}>
					<div class="row bord-btm " style="margin-bottom: 15px;">
						<div class="col-sm-12 table-toolbar-left">
							
							<div class="btn-group ">
								
								<div class="btn-group btn-group-sm ">
									<table>
										<tbody id="tableCategorias">
											<tr>
																			 <td>
										 	<!-- readonly  -->
										 	<button type="button" class="btn btn-mint active  mostrarActivos" value="1">GRUPOS ACTUALES<span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted"></span></button> 
										 </td>
																			 <td>
										 	<!--  -->
										 	<button type="button" class="btn btn-mint   mostrarHistorial" value="2">HISTORIAL <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted"></span></button> 
										 </td>																			 
																				</tr>
										</tbody>
									</table>
	                       
	                   	</div>
							</div>
						</div>
					</div>
					
					
						<!--COL ROW CARTAS DE GRUPO CON FOR ELSE-->
					<!--===================================================-->

					<?php
					$seccion = array('1' =>'A' ,
				            '2' =>'B' ,
				            '3' =>'C' ,
				            '4' =>'D' ,
				            '5' =>'E' ,
				            '6' =>'F' ,
				            
				         );

					 ?>
					 <div id="divCardsGrupos" class="" name="divCardsGrupos" {{--style="display: none;"--}}>
					 	{{--<a href="" class="updateAula" data-name="email" data-type="text" data-pk="2" data-title="Enter email">email</a>--}}
					@forelse($gruposActuales as $grupo)
					 
					<div class="col-md-12  single-item">

						<div class="col-md-1"></div>
						<div class="col-sm-12 col-md-10">
							
							 <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">

							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                            	<div class="" style="width: 100%;height: 25px;display: inline-block;">
					                                <a href="" style="" class="media-heading  text-md box-inline  text-main text-semibold ">{{ucwords(strtolower(grupoController::verIdioma($grupo->nivels->ididiomas))) }} Nivel {{$grupo->nivels->numNivel}}  {{$seccion[$grupo->numGrupo] }}
					                                </a>

					                                 <a style="float: right; " class="media-heading box-inline text-md text-main  text-semibold  text-xs updateAula" data-name="name" data-type="text" data-pk="{{ $grupo->id }}" data-title="Enter name">
					                                 	@if($grupo->idaulas==null)
					                                 		<p  class="text-lg" id="aula{{$grupo->idgrupos}}" ><i class="pli-board icon-sm"></i> <u>N/A</u></p>
					                                 	@else
					                                 	<p class="text-lg" id="aula{{$grupo->idgrupos}}" style="color: green"><i class="pli-board icon-sm"></i> {{ucwords(strtolower(grupoController::verAula($grupo->idaulas))) }}<u></u></p>
					                                 	@endif

					                                 </a>
					                                 </div>
					                                 <div class="" >
					                                <p class="text-muted text-sm " style="display: inline-block;">{{ucwords(strtolower(grupoController::verCategoria($grupo->nivels->idcategorias))) }} | <i class="pli-professor icon-lg"></i>&nbsp </p>

					                                	@if($grupo->iddocentes==null)                                 
							                                <p class="text-muted text-sm " id="docente{{$grupo->idgrupos}}" style="display: inline-block;">{{-- <i class="demo-pli-smartphone-3 icon-lg"></i>--}}<u>N/A</u></p>
								                        @else
								                            <p class="text-muted text-sm text-semibold" id="docente{{$grupo->idgrupos}}" style="display: inline-block; color: green"> {{ucwords(strtolower(grupoController::verDocente($grupo->iddocentes))) }}</p>
								                         @endif
								                         </div>
								                         @if($grupo->estado=='INICIADO')
								                          <p class=" media-left text-sm "><span id="estado{{$grupo->idgrupos}}" class="label bg-gray text-sm">Iniciado</span>&nbsp&nbsp 30 Inscritos</p> 
								                          @endif

								                         @if($grupo->estado=='EN CURSO')
								                          <p class=" media-left text-sm "><span id="estado{{$grupo->idgrupos}}" class="label badge-primary text-sm">En curso</span>&nbsp&nbsp 30 Inscritos</p> 
								                          @endif

								                         @if($grupo->estado=='FINALIZADO')
								                          <p class=" media-left text-sm "><span id="estado{{$grupo->idgrupos}}" class="label bg-danger text-sm">Finalizado</span>&nbsp&nbsp 30 Inscritos</p> 
								                          @endif
					                            </div>
					                            
					                             <!-------------------------------------->
										<div class="text-right" style="padding-top: 15px">
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip deleteGrupo" data-original-title="Eliminar grupo" data-container="body" value="{{$grupo->idgrupos}}"><i class="demo-pli-remove icon-md " ></i> </button>

											<button onclick="location.href='{{url('/')}}/grupos/notas/{{$grupo->id}}'" class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigNotas" data-cupos="{{$grupo->cupos}}" data-original-title="Asignar Notas" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-notepad icon-lg " ></i> </button>
											<button onclick="location.href='{{url('/')}}/grupos/estudiantes/{{$grupo->id}}'" class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip " data-original-title="Listado de Estudiantes" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-student-male-female icon-lg " ></i> </button>
											

							
						
											
					                          
				                             

			                             </div>
			                            <!-------------------------------------->
												

					                        </div>
					                </div>
					                <!--<div class="text-left" style="display: inline;font-size: 10px">1</div>-->
			                           <!--------------------qui se ve mas abajo------------------
										<div class="text-right" {{--style="display: inline;float: right;"--}}>

											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip editEd" data-original-title="Modificar Grupo" data-container="body" value="{{$grupo->idgrupos}}"><i class="demo-psi-pen-5 icon-md " ></i> </button>
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-lg " ></i> </button>
			                           
					                          <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip asigDocente" data-original-title="Asignar Docente" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-professor icon-lg" ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip asigAula" data-original-title="Asignar Aula" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-board icon-lg"></i></button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value=""><i class="demo-pli-remove icon-md " ></i> </button>

			                             </div>
			                            ------------------------------------>
							 		{{--<p align="left" style="color: black" class="text-m text-bold mar-no text-main"> Intensivo Tarde  <strong style="color: black; font-size: 13px;">kelvin</strong> kjnwjk</p>--}}
							 	</div>
							 	
							 	{{--<div class="pad-all text-right " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		jnkjn
							 	</div>--}}
							 	
							 </div>
							
						</div>
						
					</div>
					@empty
					No hay datos
					@endforelse
					</div>
					{{-- $grupos->render() --}}
					<!--End COL ROW CARTAS DE GRUPO  CON FOR ELSE-->
					<!--===================================================-->


					<div id="contentHistorial" class="" name="divCardsGrupos" style="display: none;"{{----}}>
                
				<div class="col-sm-12 col-md-12 {{----}}panel pos-rel" style="padding-bottom: 0px;padding-top:15px; border: 1px solid #ccc;box-shadow: 1px 1px 2px 0px #bbbbbb !important; border-radius: 5px; min-height: 400px{{----}}">
					
						<div class="panel {{--panel-default --}} ">
						<div class="panel-heading bg-dark" style="border: 1px solid #ccc;">
							<div style="display: inline-block;width: 100%;">
								
								<h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="color:white;font-size: 13px; " >RECORD DE GRUPOS</strong></p></h4>
								
							<h4 class="panel-title" align="right" style="float: right;" >
								
							   {{-- <a data-toggle="collapse" href="#collapse1" class="colapOne" ><i class="ion-plus"></i></a> 
							 <a  class="habilitar add-tooltip" data-original-title="Habilitar Campos"><i class="ion-edit"></i></a> --}}
							 
							   
							</h4>
							</div>
						</div>
						<div id="collapse1" class="panel-collapse " style="border-bottom: 1px solid #eee;">			
					
					<div class="col-md-3  text-center">
						<div class="pad-ver">
										<img src="{{asset('profile-photos/calificacion.png')}}" class="img-lg img-circle" alt="Profile Picture" >
									
									
						</div>
					</div>	
					{{-- Auth::user() --}}
					
					<div class="col-sm-12 col-md-8">
					<br>				
					<div class=" table-responsive" > 
						<table  class="table table-striped row-border display"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
							<thead>
								<tr>
									<th class="text-center">#</th>
									
									<th class="text-left">Nombre</th>
									<th class="text-left">Categoría</th>
									<th class="text-left">Periodo</th>
									
									<th class="text-center">Aula</th>
									<th class="text-center">Estado</th>
									
									<th class="text-center">Acciones</th>

								</tr>
							</thead><?php 
								  $seccion = array('1' =>'A' ,
                                '2' =>'B' ,
                                '3' =>'C' ,
                                '4' =>'D' ,
                                '5' =>'E' ,
                                '6' =>'F' ,
                                
                             );
							?>
							<tbody id="tbodyTwo" name="tbodyTwo">
								<div style="display: none;">{{ $correlativo=1 }}</div>
								@forelse($gruposFinalizados as $grupo)
							{{--	@if($ididioma == $grupo->nivels->ididiomas) --}}
								<tr id="{{ $grupo->id }}">
								<td align="center">{{ $correlativo++ }}</td>
								<td align="left">
									<div class="">
										<div class="text-main text-bold">
										{{ $grupo->nivels->idiomas->nombre }} NIVEL {{ $grupo->nivels->numNivel}} {{ $seccion[$grupo->numGrupo] }}
										</div>
									</div>
								</td>
								<td align="left">
									<div class="">
										<div class="text-main text-bold">
										{{ $grupo->nivels->categorias->nombre }}
										</div>
									</div>
								</td>
								
								<td align="center">
									<div class="">
										<div class="text-main text-bold">
										{{ $grupo->periodos->fehcaIni }}- {{ $grupo->periodos->fehcaFin}}
										
										</div>
									</div>
								</td>
								<td align="center">
									<div class="">
										<div class="text-main text-bold">
										@if($grupo->idaulas!=null)
										{{ $grupo->aulas->nombre }}
										@else 
										N/A
										@endif
										</div>
									</div>
								</td>
								<td align="center">
									<div class="label label-table bg-dark">
										<div class="text-xs text-bold">
										{{ $grupo->estado }}
										</div>
									</div>
								</td>
								<td align="center">
									<!--	{{--<button  class="btn btn-icon btn-default btn-xs  btn-hover-info infoModal add-tooltip vernotaestudiante" data-original-title="Ver Notas de Estudiante" data-container="body" value="{{$grupo->id}}"><i class="pli-notepad icon-lg "></i>{{--Info--}}</button>
									-->
										<button onclick="location.href='{{url('/')}}/grupos/estudiantes/{{$grupo->id}}'" class="btn btn-icon btn-default{{--btn-trans--}} btn-xs media-right btn-hover add-tooltip " data-original-title="Listado de Estudiantes" data-container="body" value="{{$grupo->id}}"><i class="pli-student-male-female icon-lg " ></i> </button>
										<button onclick="location.href='{{url('/')}}/grupos/notas/{{$grupo->id}}'"  class="btn btn-icon btn-default btn-xs  btn-hover-info infoModal add-tooltip " data-original-title="Ver Notas Grupo" data-container="body" value="{{$grupo->id}}"><i class="pli-notepad icon-lg "></i>{{--Info--}}</button>
										

								</td>
								</tr>
								{{--@endif--}}
								@empty
							<p>No hay registros de historial de grupos</p>

							@endforelse 
							</tbody>
						</table>
						</div>
					</div>

					</div>
					</div>

						
					</div>
					
					</div>



				
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
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">información de Grupo</h6>
            			
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

<!--modalAsigDocenteAula Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalAsigDocenteAula" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<di 	v class="modal-content">
				<div class="modal-header alert-mint">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalAsigDocenteAulaLabel">Horarios</h4>
				</div>
				<div  class="modal-body">
					<div class="panel-body">
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
					<div id="msjAB"><p>Esta seguro de continuar con la acción?.</p>
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

  $('#anhofiltro').val($('#year').val());
  $('#periodofiltro').val($('#hiddenPeriodo').val());
  $('#cursofiltro').val($('#hiddenCurso').val());

/*$('#easyPaginate').easyPaginate({
    paginateElement: 'div',
    elementsPerPage: 5,
    effect: 'climb'
});*/


		 });
  $(document).on('click','.mostrarActivos',function(){	
	$("#contentHistorial").hide();	
	$("#divCardsGrupos").show();
	$(".mostrarHistorial").removeClass("active");
	$(".mostrarActivos").addClass("active");
	
	
  });
  $(document).on('click','.mostrarHistorial',function(){	
	$("#contentHistorial").show();	
	$("#divCardsGrupos").hide();
	
	$(".mostrarActivos").removeClass("active");
	$(".mostrarHistorial").addClass("active");
  });


	</script>
	{{--
	<script src="{{asset('js/grupo.js')}}"></script> --}}
	

	@endsection