	@extends('layouts.appPlantilla')

	@section('content')
	<?php use App\Http\Controllers\cursoController;
	?>

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
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="col-sm-4 col-md-4 ">
					            <div class="panel pos-rel ">
					                <div class="pad-all text-center ">
					                	@if($curso->estado=='ACTIVO')
					                    <div class="widget-control bg-mint">

					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
				                    	@else
				                    	 <div class="widget-control bg-dark">
							                   <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-dot-vertical icon-lg"></i></span></a>
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
					                    </div>
					                    <p class="text-lg text-semibold mar-no text-main">{{-- Intensivo Tarde --}} {{ $curso->modulos }}</p>
					                    <br>
					                    <p class="text-sm">L M X J V <button class="btn btn-icon btn-default btn-xs  btn-hover-mint add-tooltip editarmodal" data-original-title="Editar Registro" data-container="body" value=""><i class="demo-psi-pen-5 icon-sm " ></i></button></p> 
					                        
					                    <table class="table table-toolbar-right">
					                    	<tbody>
					                    		@forelse(cursoController::verCategorias($curso->id) as $categoria)

													<tr>
						                    			<td {{-- style="border-color:purple;"--}} align="left"><div class="text-sm text-bold">{{ $categoria->nombre }}</div>
						                    				 
						                    			</td>
						                    			<td><div class="label label-table bg-primary add-tooltip" data-original-title="Adulto" data-container="body" value="id" ><div class="text-xs text-bold"></div>
						                    				${{ $categoria->cuota }}</div>
						                    			</td>
						                    			<td  align="right">
						                    				<button class="btn btn-icon btn-default btn-default btn-xs  btn-hover-mint add-tooltip editarmodal" data-original-title="Editar Registro" data-container="body" value=""><i class="demo-psi-pen-5 icon-sm " ></i> </button>
															<button class="btn btn-icon btn-default btn-xs  btn-hover-info infoModal add-tooltip " data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-sm " ></i> </button>
														</td>
						                    		</tr>
							                    @empty
	    											<tr>
						                    			<td>
						                    				
						                    			</td>
						                    		</tr>
						                    	@endforelse
					                    		
					                    		
					                    	</tbody>
					                    </table>
					                    {{--<div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                    <div class="pad-top btn-groups">
					                        <a href="#" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
					                        <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
					                    </div>--}}
					                </div>
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
		<div class="modal-dialog {{----}}modal-lg">
			<div class="modal-content">

				<!--Modal header-->
				<div class="modal-header alert-primary" id="modalIngresoHeader" >
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Estudiante</label></h4>
				</div>

				<!--Modal body-->
				<div class="modal-body" style="overflow-y: auto;  max-height: 500px;"	>
					
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
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Datos de Responsable</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Informacion</h6>
            			
						<table   class="table {{--table-bordered--}} table-striped table-sm " align="center">
            					<tbody id="tablainfo">
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
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Alerta</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h4 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
					<p>Esta seguro de continuar con la accion?.</p></h4>
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

	<script src="{{asset('js/curso.js')}}"></script>

	@endsection