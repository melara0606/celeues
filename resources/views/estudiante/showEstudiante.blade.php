	@extends('layouts.shared.appPlantilla')


	  @section('links')
	  <link href="{{ asset('demo/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">

	@endsection
	@section('content')
<?php use App\Http\Controllers\estudianteController;
	?>
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
			<li><a href="#">Forms</a></li>
			<li class="active">Estudiantesss</li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->

	</div>

	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >


		<div class="panel" style="border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">

			<div class="panel-heading {{--bg-mint--}}">
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
				<h3 class="panel-title ">Estudiantes</h3>

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
				</div>

	<!--===================================================-->
	<!--	MENSAJE FLOTANTE -->
<!--
<div id="floating-top-right" class="floating-container">
	<div class="alert alert-mint" style="display: none;" id="msjshow">
		<button class="close" data-dismiss="alert">
			<i class="pci-cross pci-circle"></i>
		</button><strong>Heads up!</strong> This alert needs your attention, but it's not super important.
	</div>
	
</div>-->

	<!--===================================================-->
	<!--End mensajeflotante-->

				<div class=" table-responsive">
					<table id="myTable" class="table table-striped row-border">
						<thead>
							<tr>
								<th class="text-center">#</th>
								
								<th class="text-left">Nombre</th>
								<th class="text-center">Usuario</th>
								<th class="text-center">Edad</th>
								<th class="text-center">Telefono</th>

								
								<th class="text-center">Acciones</th>

							</tr>
						</thead>
						<tbody>
							<div style="display: none;">{{ $correlativo=1 }}</div>
							@forelse($estudiantes as $estudiante)
							<tr id="{{ $estudiante->id }}">
								<td align="center">{{ $correlativo++ }}</td>
								<td align="bord-left">
									<div class="text-sm text-bold">
										{{ $estudiante->nombre}} {{ $estudiante->apellido}}
									</div> 
								</td>
								
								{{--<td align="Center"><i class="pli-student-male icon-lg" style="padding-top: 5pX"></i> <div class="label label-table bg-dark add-tooltip" data-original-title="{{ $estudiante->nombre }}" data-container="body" value="{{ $estudiante->id }}" ><div class="text-xs text-bold"></div>{{ estudianteController::getUserName($estudiante->id) }}</div></td>
								--}}			
								<td align="center">
									
									<div class="label label-table bg-dark">
										<div class="text-sm text-bold">
											{{ estudianteController::getUserName($estudiante->id) }}	
										</div>
									</div>
								</td>
								<td align="center">{{ estudianteController::getNumberYears($estudiante->fechaNac) }}</td>
								
								<td align="center">{{ $estudiante->telefono }}</td>
								
								
								<td align="center">
								
									<button class="btn btn-icon btn-default btn-default btn-sm  btn-hover-mint add-tooltip editarmodal" data-original-title="Editar Registro" data-container="body" value="{{ $estudiante->id }}"><i class="demo-psi-pen-5 icon-sm " ></i> {{--Editar--}}</button>
									<button class="btn btn-icon btn-default btn-sm  btn-hover-info infoModal add-tooltip " data-original-title="Información" data-container="body" value="{{ $estudiante->id }}"><i class="demo-pli-exclamation icon-sm " ></i> {{--Info--}}</button>
									@if($estudiante->idusers==null)
									<button class="btn btn-icon btn-trans btn-md media-right btn-hover add-tooltip crearUsuarioEstudiante" data-nombre="{{ $estudiante->nombre }} {{ $estudiante->apellido }}" data-email="{{ $estudiante->email }}" data-original-title="Crear usuario" data-container="body" value="{{ $estudiante->id }}"><i class="pli-add-user icon-lg "></i></button>
									@else
									<button class="btn btn-icon btn-trans btn-md media-right btn-hover add-tooltip crearUsuarioEstudiante" data-nombre="{{ $estudiante->nombre }} {{ $estudiante->apellido }}" data-email="{{ $estudiante->email }}" data-original-title="Crear usuario" data-container="body" value="{{ $estudiante->id }}"><i class="pli-id-card icon-lg "></i></button>
									@endif
									{{-- nose si agregarle estado a categoria @if($categoria->estado=='ACTIVO')
									<button class="btn btn-icon btn-default btn-default btn-sm  btn-hover-danger darbaja" value="{{ $categoria->id }}"><div class="demo-icon"><i class="ion-chevron-down"></i><span> Dar Baja</span></div> </button>
									@endif
									@if($categoria->estado=='INACTIVO')
									<button class="btn btn-icon btn-default btn-default btn-sm  btn-hover-primary darAlta" value="{{ $categoria->id }}"><div class="demo-icon"><i class="ion-chevron-up"></i><span> Dar Alta</span></div> </button>
									@endif --}}
									{{--<button type="button" class="btn btn-outline-info btn-sm infomodal" value="{{ $categoria->id }}">Info</button>--}}
									
									
								<!--	{{--<button class="btn btn-default btn-sm btn-circle"><i class="btn btn-icon demo-pli-pen-5 icon-lg add-tooltip" data-original-title="Edit Post" data-container="body"></i></button>

									<button class="btn btn-lg btn-default btn-hover-warning">Hover Me!</button>
									<div class="demo-icon"><i class="demo-pli-internet-explorer"></i></div>
									<a href="#" <a href="#" class="btn btn-icon demo-pli-pen-5 icon-lg add-tooltip" data-original-title="Edit Post" data-container="body"></a>--}}-->
								</td>

							</tr>

							@empty
							<p>No hay mensajes destacados</p>
							@endforelse

						</tbody>


					</table>
				</div>
			</div>
			<!--===================================================-->
			<!--End Data Table-->
		</div>

		{{-- aqui termina col 10 --}}



	</div>
	<!--===================================================-->
	<!--End page content-->



	<!--===================================================-->
	<!--END CONTENT CONTAINER-->


	<!--Default Bootstrap Modal-->
	<!--===================================================-->

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
				<div class="modal-body" style="overflow-y: auto;  max-height: 500px;"	>
					
					@include('estudiante.formEstudiante')
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
	<div id="modalInfo" class="modal fade bord-left" tabindex="-1">
		<div class="modal-dialog border  border-primary {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-info">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Datos de Idioma</h4>
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


<!-- Modal con tabindex -1 no funciona select2 en bootstrap 4 -->
	<div class="modal fade" id="modalIngresoUsuario" 	name="modalIngreso" role="dialog"  tabindex="-1"  aria-labelledby="demo-default-modal" aria-hidden="true" >
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">

				<!--Modal header-->
				<div class="modal-header alert-primary" id="modalIngresoUsuarioHeader" >
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalIngresoUsuarioLabel">Crear Usuario Estudiante</h4>
				</div>
<br>
						<h4 style="font-size: 14px;text-align: center;" class="text-main col-md-12" id="parrafoUsuario" ></h4>
						<br>
						 
				<!--Modal body-->
				<div id="pruebatarget" class="modal-body" style="overflow-y: auto;  max-height: 700px;"	>
				
					<form>
						<input hidden="true" type="text" id="estudiante_id" name="estudiante_id">

						<div  id="" class="col-md-12 form-group @if($errors->has('nombre')) has-danger @endif" >
					        <div class="col-md-1"></div>
					        <label for="example-text-input" class="col-md-2 control-label text-main text-bold ">Usuario:</label>
					        <div class="col-md-7 " >
								     <input class="form-control" type="text" placeholder="Ingrese usuario o email" id="usuarioEstudiante" name="usuarioEstudiante">
					                  <div id="" class="form-control-feedback"></div>
					        </div>
					    </div>
					    <div  id="" class="col-md-12 form-group @if($errors->has('nombre')) has-danger @endif" >
					        <div class="col-md-1"></div>
					        <label for="example-text-input" class="col-md-2 control-label text-main text-bold ">Contraseña: </label>
					        <div class="col-md-7 " >
								     <input class="form-control" type="password" placeholder="Ingroduzca Contraseña" id="contraUsurioEstudiante" name="contraUsurioEstudiante">
					                  <div id="" class="form-control-feedback"></div>
					        </div>
					    </div>
					    
					    <div  id="" class="col-md-12 form-group @if($errors->has('nombre')) has-danger @endif" >
					        <div class="col-md-1"></div>
					        <label for="example-text-input" class="col-md-2 control-label text-main text-bold ">Comprobar Contraseña:</label>
					        <div class="col-md-7 " >
								     <input class="form-control" type="password" placeholder="Ingroduzca nuevamente su Contraseña" id="contraRepeUsurioEstudiante" name="contraRepeUsurioEstudiante">
					                  <div id="" class="form-control-feedback"></div>
					        </div>
					    </div>
					</form>

				</div>
				<br>

				{{----}}<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-primary" id="btnGuardarUsuario">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End Default Bootstrap Modal-->




	@endsection

	@section('script')
	<script src="{{asset('js/estudiante.js')}}"></script>

	@endsection