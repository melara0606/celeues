	@extends('layouts.shared.appplantilla')

	@section('content')

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
			<li><a href="">Configuracion</a></li>
			<li><a href="{{url('/')}}/curso">Cursos</a></li>

			<li class="active">Niveles</li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->

	</div>		
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >

		<!--Row Main Left COL-MD -->
		<!--===================================================-->
		<div class="row col-md-1">

			
		</div>
		<!--End Main Left Row COL-MD -->
		<!--===================================================-->
		

		<!--Row Main Right COL-MD -->
		<!--===================================================-->
		<div class="row col-md-12">
			<input type="text" name="path" hidden="true"  id="path" value="{{url('/')}}">
			
			<!--Main Panel-->
			<!--===================================================-->
			<div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

				<div class="panel-heading " style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important" >
					<div class="panel-control ">
						
					</div>
					<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">CURSO {{$curso->nombreIdioma}} {{$curso->nombreModalidad}} {{$curso->turno}} - {{$categoria->nombre}}</strong></p></h3>


					
					
						


				</div>

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body " style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
					<div style="display: none;">
					<label>ididiomas</label>
					<input type="text" name="ididiomas" id="ididiomas" placeholder="ididiomas" value="{{$curso->ididiomas}}">
					<label>idcategorias</label>
					<input type="text" name="idcategorias" id="idcategorias" placeholder="idcategorias" value="{{$categoria->id}}">
					<label>idmodalidads</label>
					<input type="text" name="idmodalidads" id="idmodalidads" placeholder="idmodalidads" value="{{$curso->idmodalidads}}">
					<label>idcursocategorias</label>
					<input type="text" name="idcursocategorias" id="idcursocategorias" placeholder="idcursocategorias" value="{{$cursocategoria->id}}">
					<label>idcursos</label>
					<input type="text" name="idcursos" id="idcursos" placeholder="idcursos" value="{{$cursocategoria->idcursos}}">
					</div>
					<!--1rst Row Panel Body-->
					<!--===================================================-->
					<div class="row">
						<div class="col-sm-6 table-toolbar-left">
							<button id="btnnuevo" class="btn btn-purple"><i class="demo-pli-add"></i> Nuevo</button>
							<button class="btn btn-default imprimir"><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
							<div class="btn-group text-right">
								{{--<button class="btn btn-default"><i class="demo-pli-exclamation"></i>
								</button>
								<button class="btn btn-default"><i class="demo-pli-recycling"></i>
								</button>--}}
								{{--<div class="btn-group btn-group-sm ">
	                        <button class="btn btn-warning active">Adulto</button>
	                        <button class="btn btn-warning">Adolecente</button>
	                        <button class="btn btn-warning">Ninho</button>
	                   	</div>--}}
							</div>
						</div>
					</div>
					<!--End 1rst Row Panel Body-->
					<!--===================================================-->
					
					<div class="col-md-1"></div>

					<!--COL ROW CARTAS DE GRUPO-->
					<!--===================================================-->
					<div class="col-md-10">

						<div class="col-sm-12 col-md-12">
							<table id="myTable" class="table table-hover table-vcenter row-border"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
						<thead>
							<tr>
								
								
								<th class="text-left">Niveles</th>
								<th>Idioma</th>

								<th class="text-left">Estado</th>
								<th class="text-center">Acciones</th>

							</tr>
						</thead>
						<tbody>
							<div style="display: none;">{{ $correlativo=1 }}</div>
							<div style="display: none;">
							{{ $last=20}}
						    {{ $now =1 }}
						    </div>
				   			 @forelse($nivels as $nivel)
							<tr >
								<td align="left" >
									<p class="text-main text-sm "><STRONG>
									Nivel {{$nivel->numNivel}} </STRONG></p>

								</td>
								<td> <p class="text-muted text-sm label">{{-- <i class="demo-pli-smartphone-3 icon-lg">--}}</i> {{$curso->nombreIdioma}} {{$categoria->nombre}}</p>
</td>
								<td align="Left">
									@if($nivel->estado=='ACTIVO')
									<div class="label label-table bg-dark add-tooltip" data-original-title="" data-container="body" value="3"><div class="text-xs text-bold"></div>{{$nivel->estado}}</div>
									@else
									<div class="label label-table bg-gray add-tooltip" data-original-title="" data-container="body" value="3"><div class="text-xs text-bold"></div>{{$nivel->estado}}</div>
									
									@endif
								</td>
								<td align="center">
									@if($nivel->estado=='ACTIVO')
									<button class="btn btn-icon btn-trans btn-sm   add-tooltip darbaja" data-original-title="Desactivar" data-container="body" value="{{$nivel->id}}"><i class="ion-arrow-down-a icon-sm "></i> </button>
									@else
									<button class="btn btn-icon btn-trans btn-sm   add-tooltip darAlta" data-original-title="Desactivar" data-container="body" value="{{$nivel->id}}"><i class="ion-arrow-up-a icon-sm "></i> </button>
									
									@endif
									<button disabled="disabled" type="button" class=" btn btn-icon btn-trans btn-xs add-tooltip deleteHorariosDias" data-original-title="Eliminar" value="0"><i class="ion-trash-b icon-lg "></i></button>
								</td>



							</tr>
							@empty
							@endforelse


						</tbody>


					</table>
							
							
						</div>
						
					</div>
					<!--End COL ROW CARTAS DE GRUPO-->
					<!--===================================================-->
				
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
					<form>
					<div class="form-group">
						<div class=" col-md-12">
					        <label for="example-email-input" class="col-md-3 control-label text-main text-bold ">Nivel No:*</label>
					        <div class="col-md-9">
					        		<input type="number" name="nivel" id="nivel">  
					                           
					       </div>
					    </div>
				   </div>
				   </form>
					
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
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Cambio Estado de Nivel</h4>
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

	<script src="{{asset('js/nivel.js')}}"></script>

	<script type="text/javascript">

		 $(document).ready(function(){
		 	//$.niftyNav('collapse');

/*$('#easyPaginate').easyPaginate({
    paginateElement: 'div',
    elementsPerPage: 5,
    effect: 'climb'
});*/

		 });
	</script>
	

	@endsection