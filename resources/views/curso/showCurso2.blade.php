	@extends('layouts.shared.appplantilla')

	@section('content')
<?php use App\Http\Controllers\cursoController;
	?>
	<style type="text/css">
		
	</style>
	<div id="page-head">

		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		{{--<div id="page-title">
			<h1 class="page-header text-overflow">kjk</h1>

		</div>--}}
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->


		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href=""><i class="demo-pli-home"></i></a></li>
			<li><a href="">Configuración</a></li>
			<li class="active">Cursos</li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->

	</div>	
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >

		<!--Row Main Left COL-MD -->
		<!--===================================================-->
		<div class="row col-md-3">
			<input type="text" hidden="true"  name="path"  id="path" value="{{url('/')}}">
			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">
					<div class="panel-heading ">
						<h4>Filtrar	</h4>
					</div>
					{{--<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Idioma:</label>
						<select class="form-control" id="" name="">
                 
	            			<option value="1">INGLES</option>
	            			<option value="2">FRANCES</option>
	            			<option value="3">CHINO</option>
            			</select>
					</div>--}}
					<div class="row col-sm-12 col-lg-12">
						<label for="" class="control-label text-main text-bold "></label>
						
									<div class="list-group">
					                    <h5> &nbsp IDIOMAS	</h5>
					                    @forelse($idiomas as $idioma)
					                    <a class="list-group-item @if($firstIdioma==$idioma->id) list-group-item-primary @endif"  href="{{ url('/curso' )}}/{{$idioma->id}}">{{ $idioma->nombre }}</a>

					                    @empty
					                    @endforelse
					                </div>
					            </div>
					<div class="row">
						
					</div>
					<br>
					<hr>
					
        
					
					
					<div class="row col-sm-12 col-lg-12">
						
									<div class="list-group">
					                    <a class="list-group-item @if($estado=='DISPONIBLE')list-group-item-primary @endif" href="{{ url('/curso/estado/Disponible' )}}/{{$firstIdioma}}">DISPONIBLE<span style="font-size: 11px;" class="badge badge-primary text-xs text-muted">25</span></a>
					                    <a class="list-group-item @if($estado=='NODISPONIBLE')list-group-item-primary @endif" href="{{ url('/curso/estado/NoDisponible' )}}/{{$firstIdioma}}">NO DISPONIBLE</a>
					                    
					                </div>
					            </div>
					
					{{--<div class="row col-md-12 btn-group-vertical mar-rgt" >
			            <!--<button class="btn btn-default btn-mint">Periodo</button>
			            --><div class="btn-group">
			              
			            </div>
			            <button class="btn btn-success btn-active-success">DISPONIBLE <span style="font-size: 11px;" class="badge badge-primary text-xs text-muted">25</span></button>
			            <button class="btn btn-default btn-active-success">NO DISPONIBLE <span style="font-size: 11px;" class="badge badge-primary text-xs text-muted">25</span></button></button>

					</div>--}}
					
					
					<div class="row">
						
					</div>
					<br>
					<hr>
					<div class="row">
						
					</div>
					<br>
				</div><!--End Panel Body -->
			</div><!--End Pannel -->		
			<hr>
		</div>
		<!--End Main Left Row COL-MD -->
		<!--===================================================-->
		

		<!--Row Main Right COL-MD -->
		<!--===================================================-->
		<div class="row col-md-9">

			<!--Main Panel-->
			<!--===================================================-->
			<div class="panel" style=" background:#eee;border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 715px;">
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
					<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">CURSOS</strong></p></h3>
						


				</div>

<div style="display: none;">{{ $verifica=1 }}</div>
				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body">


				<!--Seccion Botones principales-->
				<!--===================================================-->
				<div class="row col-md-12 bord-btm " style="margin-bottom: 15px;">
							<div class="col-sm-6 table-toolbar-left">
								<button id="btnnuevo" class="btn btn-purple"><i class="demo-pli-add"></i> Nuevo</button>
								<button class="btn btn-default imprimir"><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
								{{--<div class="btn-group">
									<button class="btn btn-default"><i class="demo-pli-exclamation"></i>
									</button>
									<button class="btn btn-default"><i class="demo-pli-recycling"></i>
									</button>
								</div>--}}
							</div>
							<div class="col-sm-6 table-toolbar-right">
								<!--<div class="form-group">
									<input id="demo-input-search2" type="text" placeholder="Buscar" class="form-control" autocomplete="off">
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
							</div>-->
						</div>
				</div>
				<!--End Seccion Botones principales-->
				<!--===================================================-->
				

					 @forelse($cursos as $curso)
					 
					 	@if($verifica%2==0)

					 		@else
{{--<div class="col-md-1"></div>
$verifica++ --}}

					 		@endif
					 	
						

					<!--Content Cards-->
					<!--===================================================-->
					<div class="col-md-6">		
	 					 <div style="display: none;">{{ $contador=0 }}
						</div>
						
						

				            <!-- Contact Widget -->
				            <!---------------------------------->
				            <div class="col-sm-12 col-md-12">

				            	<!-- panel pos-rel -->
				            	<!---------------------------------->
					            <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 12px;">
					            	
					            	<!-- pad- all div -->
				            		<!---------------------------------->					      
					            	<div class="pad-all text-center " style="border-top-left-radius:15px; border-top-right-radius:15px">
					            		
					            		<div class="comments media-block">
					            			<div class="media-body">
					            				<div class="comment-header">


					            		<p align="left"  class="text-m text-bold media-heading mar-no text-main">{{-- Intensivo Tarde --}} <strong style="font-size: 13px;">{{ $curso->nombreIdioma }} {{ $curso->nombreModalidad }} {{ $curso->turno }}</strong></p>

					            		@if($curso->estado=='ACTIVO')
						                    <div class="widget-control {{--bg-mint--}}" align="left" style="border-radius: 15px;">

						                        {{--<a href="#" class="add-tooltip btn btn-trans" data-original-title="Desabilitar"><span class="favorite-color"><i class="ion-arrow-down-b icon-lg"></i></span></a>
						                        --}}
						                        <button class="btn btn-icon btn-trans btn-xs  add-tooltip darbajaCurso" data-original-title="Desactivar"   value="{{ $curso->id }}"><i class="ion-arrow-down-b icon-lg " ></i></button>

						                        <!--<div class="btn-group dropdown">
						                            <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
						                            <ul class="dropdown-menu dropdown-menu-right" style="">
						                                <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
						                                <li class="divider"></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
						                            </ul>
						                        </div>-->
						                    </div>
					                     @else
					                    	 <div class="widget-control" style="border-radius:15px;" >
					                    	 	<button class="btn btn-icon btn-trans btn-xs  add-tooltip darAltaCurso" data-original-title="Activar"   value="{{ $curso->id }}"><i class="ion-arrow-up-b icon-lg " ></i></button>

								                   
								                  <!-- <div class="btn-group dropdown">
						                            <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
						                            <ul class="dropdown-menu dropdown-menu-right" style="">
						                                <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
						                                <li class="divider"></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
						                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
						                            </ul>
						                        </div>-->
						                    </div>
						                @endif
					                       </div>
					                  

					                  
					                    {{--<br>--}}
					                    <p class="text-sm media-left">
					                    	Módulos - {{$curso->modulos[0]}}{{$curso->modulos[1]}} períodos | Días -
					                    @forelse(cursoController::verDias($curso->id) as $algo)
					                    	{{ $algo->contractado }}
					                    @empty
	    											
						                @endforelse
					                    	<button class="btn btn-icon btn-trans btn-xs  add-tooltip infoHorariosModal" data-original-title="Editar Registro" data-container="body"  value="{{ $curso->id }}"><i class="ion-eye icon-lg " ></i></button>
					                    	<!--<button class="btn btn-icon btn-trans btn-xs  add-tooltip modificarHorarios" data-original-title="Editar Horarios" data-container="body"  value="{{ $curso->id }}"><i class="demo-psi-pen-5 icon-xs " ></i></button>-->
					                    </p> 
					                        <div class="">
					                        	<br>
					                        	<br>
					                    <table class="table table-sm table-toolbar-right">
					                    	<tbody>
					                    		@forelse(cursoController::verCategorias($curso->id) as $categoria)

													<tr>
						                    			<td {{-- style="border-color:purple;"--}} style="font-size: 12px;" align="left"><div class="text-sm text-muted text-bold">{{ $categoria->nombre }}</div>
						                    				 
						                    			</td>
						                    			<td {{-- style="border-color:purple;"--}} style="font-size: 12px;" align="left"><div class="text-sm text-muted text-bold">{{ $categoria->edadInicio}}-{{$categoria->edadFin}} años</div>
						                    				 
						                    			</td>
						                    			<td>
						                    				<div class="text-sm text-muted text-bold">
						                    					<a href="{{url('/')}}/cursoNiveles/{{$categoria->idcursocategoria}}">
						                    				<u>{{cursoController::verCantidadNiveles($categoria->idcursocategoria)}}    Niveles</u>
						                    				</a>
						                    				</div> 
						                    			</td>

						                    			<td>
						                    				<span class="badge badge-primary">${{ $categoria->cuota }}
						                    					<button class="btn btn-icon btn-trans btn-xs  btn-hover infoModal add-tooltip actualPrecio" data-original-title="Actualizar precio" data-container="body" value="{{ $categoria->id }}" data-cuota="{{ $categoria->cuota }}" data-idcursos="{{ $categoria->idcursos }}"><i class="ion-refresh icon-md " ></i> </button>
						                    				</span>
						                    			
						                    				<!--<div class="label label-table  bg-primary " data-original-title="Adulto" data-container="body" value="id" style="border-radius:15px !important;"><div class="text-xs text-bold" ></div>
						                    				${{ $categoria->cuota }}
						                    				<button class="btn btn-icon btn-trans btn-xs  btn-hover infoModal add-tooltip actualPrecio" data-original-title="Actualizar precio" data-container="body" value="{{ $categoria->id }}"  data-idcursos="{{ $categoria->idcursos }}"><i class="ion-refresh icon-md " ></i> </button>
						                    			</div>-->

						                    			</td>
						                    			<!--<td  align="right">
						                    				{{--@if($categoria->estado=='ACTIVO')
						                    				<button class="btn btn-icon btn-default  btn-xs  btn-hover-danger add-tooltip darbaja" data-original-title="Dar Baja a categoria" data-container="body" value="{{ $categoria->idcursocategoria }}"><i class="ion-ios-arrow-down icon-sm " ></i> </button>
						                    				@else
						                    				<button class="btn btn-icon btn-default  btn-xs  btn-hover-primary add-tooltip darAlta" data-original-title="Dar Alta a categoria" data-container="body" value="{{ $categoria->idcursocategoria }}"><i class="ion-ios-arrow-up icon-sm " ></i> </button>
						                    				
						                    				@endif--}}
															<button class="btn btn-icon btn-trans btn-xs  btn-hover infoModal add-tooltip actualPrecio" data-original-title="Actualizar precio" data-container="body" value="{{ $categoria->id }}"  data-idcursos="{{ $categoria->idcursos }}"><i class="ion-refresh icon-lg " ></i> </button>
														</td>-->
						                    		</tr>
						                    		<div style="display: none;">
						                    			{{ $contador++ }}
						                    		</div>
							                    @empty
	    											<tr>
						                    			<td>
						                    				
						                    			</td>
						                    		</tr>
						                    	@endforelse

						                    	@for($i=$contador;$i<=$numCategorias;$i++)
						                    		@if($i<$numCategorias)
						                    			<tr>
						                    				<td style="border-color:white;" ></td>
						                    			<td style="border-color:white;" height="43"></td>

						                    			<td style="border-color:white;" ></td>
						                    			</tr>
						                    		@endif
						                    	@endfor
					                    		
					                    		
					                    	</tbody>
					                    </table>
					                    </div>
					                   <!-- <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-lg " ></i> </button>
					                           
					                            <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Asignar aula y maestro" data-container="body" value=""><i class="demo-pli-add icon-lg " ></i> </button>
					                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Modificar Grupo" data-container="body" value=""><i class="demo-psi-pen-5 icon-md " ></i> </button>
					                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value=""><i class="demo-pli-remove icon-md " ></i> </button>-->
					                
					                    <div class="text-right pad-to " >
					                    
					                        <div class="btn-group">
					                        	<button class="btn btn-icon btn-groups btn-default btn-sm  btn-default add-tooltip editBoton" data-original-title="Editar Registro" data-container="body" value="{{ $curso->id }}"><i class="ion-plus icon-sm " ></i>&nbsp;&nbsp;Nueva Categoría </button>

					                        	<button class="btn btn-icon btn-groups btn-default btn-sm  btn-hover-primary add-tooltip infoHorariosModal" data-original-title="Informacion de Horarios" data-container="body" value="{{ $curso->id }}"><i class="demo-pli-exclamation icon-sm " ></i>&nbsp;&nbsp;Info Horarios </button>
					                        	
													
					                            {{--<a id="bt" href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw addCategoria"></i>Nueva Categoria</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw aaf"></i> Edit</a>--}}
					                        </div>
					                    </div>
					                   </div></div>
									</div>
									<!--End pad- all div -->
				            		<!---------------------------------->					      
					            	
					                
					                	
					            </div>
					            <!-- End panel pos-rel -->
				            	<!---------------------------------->
					            
					       	 </div>
					       	 <!--End Contact Widget -->
					         <!---------------------------------->
									
											
											        

				      </div>
				      <!--End Content Cards-->
					  <!--===================================================-->
					  		@empty
						    	<p>No hay mensajes destacados</p>
						  		@endforelse	

				</div>
				<!--End Panel Body-->
				<!--===================================================-->

			</div>
			<!--End Main Panel-->
			<!--===================================================-->

		</div>
		<!--End Main Right COL-MD-->
		<!--===================================================-->
		
<!--<div class="col-md-1">
	<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;min-height: 15px">
		lsdjkjdsn
		lknds
		kjds
		ljsnd
		ljds
		jb
		kjsn
			</div>
</div>-->
	
	<!--</div> No se por que si lo pongo se me hace feo el disenho del footer===================================================-->
	<!--End page content-->



	<!--Default Bootstrap Modal-->
	<!--===================================================-->
	<div class="modal fade" id="modalIngreso" 	name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true" >
		<div class="modal-dialog {{----}}modal-lg" >
			<div class="modal-content" style="background: {{ asset('demo/img/bg-img/1.jpg') }}">

				<!--Modal header-->
				<div class="modal-header alert-primary" id="modalIngresoHeader" >
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Estudiante</label></h4>
				</div>

				<!--Modal body-->
				<div class="modal-body "  style="overflow-y: auto;  max-height: 500px;{{--background:#eee;--}}"	>
					
					@include('curso.formCurso')
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
				<div class="modal-header alert-info" id="infoModalHeader">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Horarios</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Horarios <button class="btn btn-icon btn-trans btn-xs  add-tooltip modificarHorarios" id="botonEditarHorario" name="botonEditarHorario" data-original-title="Editar Horarios" data-container="body" value="1"><i class="demo-psi-pen-5 icon-xs " ></i></button>
</h6>

						
            			<form id="formEditarHorarios">
							<input type="number"  name="idCursosEditarHorarios" id="idCursosEditarHorarios" placeholder="idCursosEditarHorarios">
							<input type="number"  name="countDiasHorarios" id="countDiasHorarios" placeholder="countDiasHorarios">
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
            		</form>
					<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>-->
						</div>
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-mint " hidden="true" id="btnGuardarHorarios" >Modificar</button>
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
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Cambio Estado de Curso{{--Categoria--}}</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h5 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
					<div id="msjAB"><p>Esta seguro de continuar con la accion?.</p>
					</div>
					</h5>
            			{{-- Este funciona para darle valor del id para dar baja o alta--}}
					 <form>
					 <input  class="form-control" type="text"  id="estadoAB" name="estadoAB">
					  <input  class="form-control" type="text"  id="registro_id" name="registro_id">
      			</form>
      			
						
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					{{--<button class="btn btn-danger" id="btnGuardarMsj">Continuar</button>--}}
					<button class="btn btn-danger" id="btnGuardarMsjMotivo">Continuar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End DarBaja y Alta Bootstrap Modal-->

<!--Actualizar precio Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalPrecioCategoria" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-mint">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel4">Actualizar cuota</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h5 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
					<div id="msjPC"><strong><p>Ingresar a la categoria una nueva cuota.</p></strong>
					</div>
					</h5>
            			{{-- Este funciona para darle valor del id para dar baja o alta--}}
				<form>
					<div class="form-group">
 					   <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Nuevo Monto:</label>
				    	<div class="col-md-5">
 
					 		<input class="form-control" type="text" placeholder="$" id="montoCategoria" name="montoCategoria">
					 	 	<input  class="form-control" type="text" placeholder="idCategoria" id="idCategoria" name="idCategoria">
					 	 	<input  class="form-control" type="text" placeholder="idCursos"  id="idCursos" name="idCursos">
					 	 	
						</div>
					</div>
					  </form>
      			
						
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-mint" id="btnGuardarPrecio">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End DarBaja y Alta Bootstrap Modal-->
<!--Actualizar precio Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalCategoriaNueva" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-mint">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel4">Nueva categoria</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h5 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
					<div id="msjPC"><strong><p>Ingresar a la categoria una nueva cuota.</p></strong>
					</div>
					</h5>
            			{{-- Este funciona para darle valor del id para dar baja o alta--}}
				<form id="formNuevaCat">
					<input type="number"  name="idCursosModificarCat" id="idCursosModificarCat" placeholder="idCursosModificarCat">
					       <div class="form-group ">       
			                     <label for="example-email-input" class="col-md-3 control-label text-main text-bold ">Categoria:*</label>
			         
			                    <div class="col-md-7">
			                   <!--     <select  class="form-control" id="cat_id[]" name="cat_id[]" >
			                       -->
			                         <select  class="form-control" id="ncatid" name="ncatid" >
			                             
			                        </select>
			                      
			                                       
			                   </div>
			                   
			                 </div>
			                 <br><br>
			                 <div class="form-group">
			                 	<label for="example-number-input" class="col-md-3  control-label text-main text-bold ">Cuota:*</label>
			                 	 

			                        
			                            
			                            <div class="col-md-7">
			                                <input class="form-control" type="number" placeholder="##.##" id="nnombre" name="nnombre" required="required">
			                                <div id="descripcionfeed" class="form-control-feedback"></div>                   
			                            </div>
			                            

			                    
			                 	
			                 </div>
			                 <br><br>
			                 <div class="form-group">

                        
	                            <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Niveles:*</label>
	                            <div class="col-md-7">
	                                <select class="form-control" type="number" placeholder="" id="nniveles" name="nniveles">
	                                    <option value="20">20</option>
	                                    <option value="18">18</option>
	                                    <option value="22">22</option>
	                                    
	                                </select>
	                                <div id="descripcionfeed" class="form-control-feedback"></div>                   
	                            
	                            </div>
	                            
                			</div>
       
					  </form>
      			
						
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-mint" id="btnGuardarNuevaCat">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End DarBaja y Alta Bootstrap Modal-->


	<!--INFO Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalEditarHorarios" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-mint">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Horarios</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Horarios</h6>
						<!--
						<form id="formEditarHorarios">
							<input type="number" name="idCursosEditarHorarios" id="idCursosEditarHorarios" placeholder="idCursosEditarHorarios">
							<input type="number" name="countDiasHorarios" id="countDiasHorarios" placeholder="countDiasHorarios">
            			-->
						<table   class="table {{--table-bordered--}} table-striped table-sm " align="center">
            					<tbody id="tablaEditarHorarios">
            						<th>
            							
            								<td>ds</td>
            							
            						</th>
            						<tr>
            						<td></td> 
            						</tr>
            					</tbody>
            			</table>
            			<!--</form>-->
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


	@endsection

	@section('script')
	<script src="{{asset('js/curso.js')}}"></script>
<script type="text/javascript">
		 $(document).ready(function(){
		 	$.niftyNav('collapse');
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
   
//$.niftyAside('darkTheme');
//$.niftyNav('collapse');
//$.niftyAside('alignLeft');

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
//llenarSelectFormulario();

		 });
	</script>

	
	

	@endsection