	@extends('layouts.appPlantilla')

	@section('content')
	<?php use App\Http\Controllers\cursoController;
	?>
	{{--<style type="text/css">
			.modal-body {

  position: relative;

  padding: 25px;
   background-image: url("{{ asset('demo/img/Whats.jpg') }}");
 
  overflow: auto;

}
</style>--}}

	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >


		<div class="panel" style=" background:#eee;border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">

			<div class="panel-heading ">
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
				<h3 class="panel-title ">Cursos</h3>

			</div>


			<!--Data Table-->
			<!--===================================================-->
			<div class="panel-body ">
				{{----}}<div class="pad-btm form-inline">
					<div class="row">
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
						<div class="row col-md-12">
	 					 @forelse($cursos as $curso)
	 					 <div style="display: none;">{{ $contador=0 }}
						</div>
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="col-sm-4 col-md-4">
					            <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 2px 2px #bbbbbb !important; border-radius: 12px;">
					            	<div class="pad-all text-center " style="border-top-left-radius:15px; border-top-right-radius:15px">
					            		  <p align="left" style="color: black" class="text-m text-bold mar-no text-main">{{-- Intensivo Tarde --}} <strong style="color: black; font-size: 13px;">{{ $curso->nombreIdioma }}</strong> {{ $curso->nombreModalidad }} {{ $curso->turno }}</p>
									</div>
					                <div class="pad-all text-center	">

					                	@if($curso->estado=='ACTIVO')
					                    <div class="widget-control {{--bg-mint--}}" align="left" style="border-radius: 15px;">

					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
				                    	@else
				                    	 <div class="widget-control bg-dark" style="border-radius:15px;" >
							                   <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star-off icon-lg"></i></span></a>
					                    	@endif
					                        <div class="btn-group dropdown">
					                            <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                            <ul class="dropdown-menu dropdown-menu-right" style="">
					                                <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                            </ul>
					                        </div>
					                    </div>{{----}}
					                  

					                  
					                    {{--<br>--}}
					                    <p class="text-sm">
					                    	  @forelse(cursoController::verDias($curso->id) as $algo)
					                    	{{ $algo->contractado }}
					                    @empty
	    											
						                @endforelse
					                    	<button class="btn btn-icon btn-trans btn-xs  add-tooltip infoHorariosModal" data-original-title="Editar Registro" data-container="body" value="{{ $curso->id }}"><i class="ion-eye icon-lg " ></i></button></p> 
					                        
					                    <table class="table table-toolbar-right">
					                    	<tbody>
					                    		@forelse(cursoController::verCategorias($curso->id) as $categoria)

													<tr>
						                    			<td {{-- style="border-color:purple;"--}} align="left"><div class="text-sm text-bold">{{ $categoria->nombre }}</div>
						                    				 
						                    			</td>
						                    			<td>20 Nivles</td>
						                    			<td><div class="label label-table bg-primary " data-original-title="Adulto" data-container="body" value="id" style="border-radius:15px !important;"><div class="text-xs text-bold" ></div>
						                    				${{ $categoria->cuota }}
						                    				<button class="btn btn-icon btn-trans btn-xs  btn-hover infoModal add-tooltip actualPrecio" data-original-title="Actualizar precio" data-container="body" value="{{ $categoria->id }}"  data-idcursos="{{ $categoria->idcursos }}"><i class="ion-refresh icon-md " ></i> </button>

						                    			</div>

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
						                    			<td style="border-color:white;" height="47"></td>

						                    			<td style="border-color:white;" ></td>
						                    			</tr>
						                    		@endif
						                    	@endfor
					                    		
					                    		
					                    	</tbody>
					                    </table>
					                
					                    <div class="text-center pad-to " >
					                    
					                        <div class="btn-group">
					                        	<button class="btn btn-icon btn-groups btn-default btn-sm  btn-dark add-tooltip editBoton" data-original-title="Editar Registro" data-container="body" value=""><i class="ion-plus icon-sm " ></i>&nbsp;&nbsp;Nueva Categoria </button>

					                        	<button class="btn btn-icon btn-groups btn-default btn-sm  btn-hover-info add-tooltip infoHorariosModal" data-original-title="Informacion de Horarios" data-container="body" value="{{ $curso->id }}"><i class="demo-pli-exclamation icon-sm " ></i>&nbsp;&nbsp;Info Horarios </button>
					                        	
													
					                            {{--<a id="bt" href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw addCategoria"></i>Nueva Categoria</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw aaf"></i> Edit</a>--}}
					                        </div>
					                    </div>
					                   {{-- <div class="pad-top btn-groups">
					                        <a href="#" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
					                    </div>--}}
					                </div>{{-- fin pad-all --}}
					            </div>
					       	 </div>
					            <!---------------------------------->
					@empty
    	<p>No hay mensajes destacados</p>
  		@endforelse	
					
					        

					      </div><!--end Row-->

				</div>{{-- end row --}}
			</div>
			<!--===================================================-->
			<!--End Data Table-->
		</div>

		{{-- aqui termina col 10 --}}

	</div>
	<!--===================================================-->
	<!--End page content-->

	<!--CONTENT CONTAINER-->
	<!--===================================================-->
<!-- ////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////TERMINA EL EJEMPLO DE LA ONDA DE PANEL ////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 -->



	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div class="container">
	<div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Users</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>

		

	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >
		{{--
<div class="panel" style="border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">--}}

			<div class="row col-md-12">
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


		

	<!--===================================================-->
	<!--End page content-->
	<div class="row col-md-12">
		
	 					 @forelse($cursos as $curso)
	 					 <div style="display: none;">{{ $contador=0 }}
			</div>
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="col-sm-4 col-md-4 ">
					            <div class="panel pos-rel" style="border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; border-radius: 15px;">
					            	<div class="pad-all text-center " style="border-top-left-radius:15px; border-top-right-radius:15px">
					            		  <p align="left" style="color: black" class="text-m text-bold mar-no text-main">{{-- Intensivo Tarde --}} <strong style="color: black; font-size: 13px;">{{ $curso->nombreIdioma }}</strong> {{ $curso->nombreModalidad }} {{ $curso->turno }}</p>
</div>
					                <div class="pad-all text-center	">

					                	@if($curso->estado=='ACTIVO')
					                    <div class="widget-control {{--bg-mint--}}" align="left" style="border-radius: 15px;">

					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
				                    	@else
				                    	 <div class="widget-control bg-dark" style="border-radius:15px;" >
							                   <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star-off icon-lg"></i></span></a>
					                    	@endif
					                        <div class="btn-group dropdown">
					                            <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                            <ul class="dropdown-menu dropdown-menu-right" style="">
					                                <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                                <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                            </ul>
					                        </div>
					                    </div>{{----}}
					                  

					                  
					                    {{--<br>--}}
					                    <p class="text-sm">
					                    	  @forelse(cursoController::verDias($curso->id) as $algo)
					                    	{{ $algo->contractado }}
					                    @empty
	    											
						                @endforelse
					                    	<button class="btn btn-icon btn-default btn-xs  btn-hover-mint add-tooltip infoHorariosModal" data-original-title="Editar Registro" data-container="body" value="{{ $curso->id }}"><i class="ion-eye icon-sm  " ></i></button></p> 
					                        
					                    <table class="table table-toolbar-right">
					                    	<tbody>
					                    		@forelse(cursoController::verCategorias($curso->id) as $categoria)

													<tr>
						                    			<td {{-- style="border-color:purple;"--}} align="left"><div class="text-sm text-bold">{{ $categoria->nombre }}</div>
						                    				 
						                    			</td>
						                    			<td>
						                    				<div class="label label-table bg-primary add-tooltip" data-original-title="Adulto" data-container="body" value="id" style="border-radius:15px !important;"><div class="text-xs text-bold" ></div>
						                    				${{ $categoria->cuota }}</div>
						                    			</td>
						                    			<td  align="right">
						                    				{{--@if($categoria->estado=='ACTIVO')
						                    				<button class="btn btn-icon btn-default  btn-xs  btn-hover-danger add-tooltip darbaja" data-original-title="Dar Baja a categoria" data-container="body" value="{{ $categoria->idcursocategoria }}"><i class="ion-ios-arrow-down icon-sm " ></i> </button>
						                    				@else
						                    				<button class="btn btn-icon btn-default  btn-xs  btn-hover-primary add-tooltip darAlta" data-original-title="Dar Alta a categoria" data-container="body" value="{{ $categoria->idcursocategoria }}"><i class="ion-ios-arrow-up icon-sm " ></i> </button>
						                    				
						                    				@endif--}}
															<button class="btn btn-icon btn-trans btn-xs  btn-hover infoModal add-tooltip actualPrecio" data-original-title="Actualizar precio" data-container="body" value="{{ $categoria->id }}"  data-idcursos="{{ $categoria->idcursos }}"><i class="ion-refresh icon-lg " ></i> </button>
														</td>
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
						                    			<td style="border-color:white;" height="40"></td>

						                    			<td style="border-color:white;" ></td>
						                    			</tr>
						                    		@endif
						                    	@endfor
					                    		
					                    		
					                    	</tbody>
					                    </table>
					                
					                    <div class="text-center pad-to " >
					                    
					                        <div class="btn-group">
					                        	<button class="btn btn-icon btn-groups btn-default btn-sm  btn-dark add-tooltip editBoton" data-original-title="Editar Registro" data-container="body" value=""><i class="ion-plus icon-sm " ></i>&nbsp;&nbsp;Nueva Categoria </button>

					                        	<button class="btn btn-icon btn-groups btn-default btn-sm  btn-hover-info add-tooltip infoHorariosModal" data-original-title="Informacion de Horarios" data-container="body" value="{{ $curso->id }}"><i class="demo-pli-exclamation icon-sm " ></i>&nbsp;&nbsp;Info Horarios </button>
					                        	
													
					                            {{--<a id="bt" href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw addCategoria"></i>Nueva Categoria</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw aaf"></i> Edit</a>--}}
					                        </div>
					                    </div>
					                   {{-- <div class="pad-top btn-groups">
					                        <a href="#" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
					                    </div>--}}
					                </div>{{-- fin pad-all --}}
					            </div>
					       	 </div>
					            <!---------------------------------->
					@empty
    	<p>No hay mensajes destacados</p>
  		@endforelse	
					
					        

					      </div><!--end Row-->
								
								 

	
				</div>
                <!--===================================================-->
                <!--End page content-->

	<!--===================================================-->
	<!--END CONTENT CONTAINER-->


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
				<div class="modal-header alert-info">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Horarios</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Horarios</h6>
            			
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
				<form>
					 <label for="example-email-input" class="control-label text-main text-bold ">Categoria:*</label>
			                <div class="form-group ">       
			                    
			                    <div class="col-md-10">
			                   <!--     <select  class="form-control" id="cat_id[]" name="cat_id[]" >
			                       -->
			                         <select  class="form-control" id="ncatid" name="ncatid" >
			                             
			                        </select>
			                      
			                                       
			                   </div>
			                   
			                 </div>
			                 <br><br><br>
			                 <div class="form-group">
			                 	<label for="example-number-input" class="col-md-7  control-label text-main text-bold ">Cuota:*</label>
			                 	 <div class="col-md-10">

			                        
			                            
			                            <div class="col-md-10">
			                                <input class="form-control" type="text" placeholder="$##.##" id="nombre" name="nombre">
			                                <div id="descripcionfeed" class="form-control-feedback"></div>                   
			                            </div>
			                            

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



	@endsection

	@section('script')

	<script src="{{asset('js/curso.js')}}"></script>

	@endsection