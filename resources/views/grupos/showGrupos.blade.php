	@extends('layouts.appPlantilla')

	@section('content')

	<style type="text/css">
		
	</style>
		
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >

		<!--Row Main Left COL-MD -->
		<!--===================================================-->
		<div class="row col-md-3">
			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">
					<div class="panel-heading ">
						<h4>Filtrar	</h4>
					</div>

					
					
        
					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Cursos:</label>
						<select class="form-control" id="" name="">
                 
	            			<option value="1">INGLES INTENSIVO MATUTINO</option>
	            			<option value="2">SABATINO MATUTINO</option>
	            			<option value="3">SABATINO VESPERTINO</option>
            			</select>
					</div>
					<div class="row">
						
					</div>
					<br>
					<hr>

					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Anho:</label>
						<select class="form-control" id="" name="">
                 
	            			<option value="1">INTENSIVO MATUTINO</option>
	            			<option value="2">SABATINO MATUTINO</option>
	            			<option value="3">SABATINO VESPERTINO</option>
            			</select>
					</div>
					<div class="row">
						
					</div>
					<br>
					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Periodos:</label>
						<select class="form-control" id="" name="">
                 
	            			<option value="1">INTENSIVO MATUTINO</option>
	            			<option value="2">SABATINO MATUTINO</option>
	            			<option value="3">SABATINO VESPERTINO</option>
            			</select>
					</div>
					<div class="row">
						
					</div>
					<br>	
					<div class="row col-sm-12" align="right">
						<button class="btn btn-default btn-mint">Filtrar</button>

					</div>
					<br>
					<div class="row">
						
					</div>
					<br>
					
					{{--<div class="row col-md-12 btn-group-vertical mar-rgt" >
			            <button class="btn btn-default btn-mint">Anho</button>

			            <div class="btn-group">
			                <div class="dropdown">
			                    <button class="btn btn-default dropdown-toggle btn-active-success" data-toggle="dropdown" aria-expanded="false">
			                        Dropdown <i class="dropdown-caret"></i>
			                    </button>
			                    <ul class="dropdown-menu" style="">
			                        <li><a href="#">Action</a></li>
			                        <li><a href="#">Another action</a></li>
			                        <li><a href="#">Something else here</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Separated link</a></li>
			                    </ul>
			                </div>
			            </div>
			            <button class="btn btn-default btn-active-primary">Middle</button>
			            <button class="btn btn-default btn-active-primary">Bottom</button>
					</div>
					<div class="row">
						
					</div>
					<br>
					<hr>
					
					<div class="row col-md-12 btn-group-vertical mar-rgt" >
			            <button class="btn btn-default btn-mint">Periodo</button>
			            <div class="btn-group">
			              
			            </div>
			            <button class="btn btn-default btn-active-success">periodo 1 enero - marzo</button>
			            <button class="btn btn-default btn-active-success">periodo 2 enero - marzo</button>

			            <button class="btn btn-default btn-active-success">periodo 3 enero - marzo</button>
			            <button class="btn btn-default btn-active-success">periodo 4 enero - marzo</button>
			            <button class="btn btn-default btn-active-success">periodo 5 enero - marzo</button>
					</div>--}}
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
					<h3 class="panel-title ">Grupos</h3>
						


				</div>

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body ">
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
								<div class="btn-group btn-group-sm ">
	                        <button class="btn btn-warning">Adulto</button>
	                        <button class="btn btn-warning">Adolecente</button>
	                        <button class="btn btn-warning">Ninho</button>
	                   	</div>
							</div>
						</div>
					</div>
					<!--End 1rst Row Panel Body-->
					<!--===================================================-->

							{{ $last=5}}
						    {{ $now =1 }}
						    
				    @for ($i = $now; $i <= $last; $i++)

					<!--COL ROW CARTAS DE GRUPO-->
					<!--===================================================-->
					<div class="row col-md-6">
						<div class="col-sm-12 col-md-12">
							
							 <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">

							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                                <a href="#" class="media-heading box-inline text-main text-semibold ">Ingles Nivel 5 </a> <a href="#" class="media-heading box-inline text-main text-semibold media-right text-sm">Aula 2-1</a>
					                                <p class="text-muted text-sm ">{{-- <i class="demo-pli-smartphone-3 icon-lg">--}}</i>Adulto | Teacher Lic. kelvin Adonay Flores</p>

					                            </div>
					                            <p class=" media-left text-sm">30 estudiantes </p>
					                            {{--<a class="btn btn-sm btn-default media-right"><i class="icon-lg demo-pli-exclamation"></i></a>
					                            <a class="btn btn-sm btn-default media-right"><i class="icon-lg demo-pli-heart-2"></i></a>--}}

					                            <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-lg " ></i> </button>
					                           
					                            <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Asignar aula y maestro" data-container="body" value=""><i class="demo-pli-add icon-lg " ></i> </button>
					                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Modificar Grupo" data-container="body" value=""><i class="demo-psi-pen-5 icon-md " ></i> </button>
					                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value=""><i class="demo-pli-remove icon-md " ></i> </button>
					                        </div>
					                    </div>
							 		{{--<p align="left" style="color: black" class="text-m text-bold mar-no text-main"> Intensivo Tarde  <strong style="color: black; font-size: 13px;">kelvin</strong> kjnwjk</p>--}}
							 	</div>
							 	
							 	{{--<div class="pad-all text-right " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		jnkjn
							 	</div>--}}
							 	
							 </div>
							
						</div>
						
					</div>
					<!--End COL ROW CARTAS DE GRUPO-->
					<!--===================================================-->
					@endfor
				
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




	@endsection

	@section('script')

	{{--<script src="{{asset('js/curso.js')}}"></script> 
	<script src="{{asset('js/jquery.easyPaginate.js')}}"></script>

<script src="{{asset('js/jquery.snippet.min.js')}}"></script> 
	--}}<script type="text/javascript">
		 $(document).ready(function(){
		 	$.niftyNav('collapse');

/*$('#easyPaginate').easyPaginate({
    paginateElement: 'div',
    elementsPerPage: 5,
    effect: 'climb'
});*/

		 });
	</script>
	

	@endsection