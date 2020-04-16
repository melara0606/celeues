	@extends('layouts.shared.appplantilla')

	  @section('links')
	  <link href="{{ asset('demo/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">

	@endsection

	@section('content')
<?php use App\Http\Controllers\grupoController;
	?>
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >

		<!--Row Main Left COL-MD -->
		<!--===================================================-->
		<div class="row col-md-2" style="display: none;" >
			<input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
			
			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">
					<div class="panel-heading ">
						<h4>Grupo	</h4>
		
					</div>

					
					
        
					<div class="row col-sm-12 "><input class=""  type="text" id="hiddenThead" name="hiddenThead" value="{{$thead}}" >
       
       <input class=""  type="text" id="hiddenTbody" name="hiddenTbody" value="{{$tbody}}" >
       
	{{--	<div style="display: none;"><input class=""  type="text" id="hiddenCurso" name="year" value="{{$selectCurso}}" >
		<input class=""  type="text" id="year" name="year" value="{{$selectYear}}" >
        <input class=""  type="text" id="hiddenModulo" name="hiddenModulo" value="{{$selectModulo}}" >
		<input class=""  type="text" id="hiddenPeriodo" name="hiddenPeriodo" value="{{$selectPeriodo}}" >
		</div>
		 <input class="" type="text" id="hiddenIdCategoria" name="hiddenIdCategoria" value="{{$selectCategoria}}" >
            --}}
         <div {{--style="display: none;"--}}>
            		<input class=""  type="text" id="hiddenGrupo" name="hiddenGrupo" value="{{$selectGrupo}}" >
		</div>

						
					</div>
					
					<div class="row col-md-12 col-sm-12">
						<div class="comments media-block">
					                        
		                        <div class="media-body">
		                            <div class="comment-header">
		                            	<div class="" style="width: 100%;height: 25px;display: inline-block;">
			                                <a href="" style="" class="media-heading  text-lg box-inline  text-main text-semibold ">Ingles Nivel 10 Seccion A
			                                </a>

		                               
		                                 </div>
		                                 <div class="media-body">
				                              {{--  <p class=" text-muted text-md " >Categoria Adulto</p>

		                                	                                 
				                                <p class=" text-muted text-md " id="docente1" > Docente: Docente</p>
				                                <p class="text-muted text-md " id="docente1" > Aula: Docente</p>
				                                  <p class="  text-sm ">Estado:<span id="estado1" class="label bg-gray text-sm">Iniciado</span></p> 
					                        <p class="  text-sm ">Inscritos 30 Inscritos</p>
					                        <p class="  text-sm ">Cupos 10 cupos</p>--}}
					                        <table class="table table-bordered " >
							
							<tbody>
								<tr>

									<td >Nombre</td>
									<td >Ingles Nivel 10</td>
				
								</tr>
								<tr>
									<td>Nombre</td>
									<td>Docente</td>
								</tr>
								<tr>
									<td>Nombre</td>
									<td>Estudiante</td>
								</tr>
								<tr>
									<td>Nombre</td>
									<td>INICIADO</td>
								</tr>
							</tbody>
						</table>
					                         
				                            </div>
					                        
					                            
					                  </div>
		                            
		                             	
									

		                        </div>
					        </div>
						
					</div>

						
					<div class="row">
						
						<div class="col-sm-12 table-toolbar-left">
							<button id="btnnuevo" class="btn btn-purple" ><i class="demo-pli-add"></i> Agregar Estudiante</button>

							<button class="btn btn-default btn-mint addPonderacion" value="0" type="button" >Ponderacion</button>

							<button class="btn btn-default imprimir" ><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
							
						</div>
						<div class="col-sm-6 table-toolbar-right">
							
						</div>
					</div>
					<br>
					
				
					<div class="row">
						
					</div>
					<br>
					<div class="row col-sm-12" align="right">
						<button class="btn btn-default btn-mint filtrar" value="0" type="button" >Filtrar</button>

					</div>
					<br>
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
		<div class="row col-md-12">
			<!--Main Panel-->
			<!--===================================================-->
			<div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

				<div class="panel-heading " style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">

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
					<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">GRUPOS DE </strong></p></h3></div>
						


				</div>

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body "  style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
					
					
					{{--<div class="col-md-1"></div>--}}	
					<div class="col-md-12 col-sm-12" style="background-color: white">
						<div class="table-responsive ">
					<table id="myTable" class="table bord-top bord-btm table-striped table-xs row-border {{--dataTable--}} tablaMod no-footer">
							<thead id="thead">
										
								</thead>
								<tbody id="tablaAsigDocenteAula">
								
            						
            					</tbody>

            			</table>
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
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Informacion Estudiante</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Informacion Estudiante</h6>
            			
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
				<div id="modalMsjDiv" class="modal-header alert-danger">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Cambio Estado de Categoria</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h5 class="card-subtitle mb-2 text-muted col-md-12" style="font-weight:bold;">
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


<!--modalAsigDocenteAula Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalAsigEstudiante" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-primary">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalAsigEstudianteLabel">Inscribir Estudiante</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						{{--<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Inscribir Estudiante</h6>
					     --}}
					    
					     <div class="input-group mar-btm">
					                        <input type="text" placeholder="Buscar" class="form-control" id="search" name="search">
					                        <span class="input-group-btn">
					                            <button class="btn btn-primary" type="button">Buscar</button>
					                        </span>
					                    </div> 
						<table   class="table {{--table-bordered--}} table-sm " align="center">
            					<tbody id="tablaAsigEstudiante">
            						@for($i=1;$i<5;$i++)
            						<tr class='clickable-row'>
            							<td align="center" >
            								<!--<i class="demo-pli-smartphone-3 icon-lg" style="padding-top: 10px">
            								-->	<i class="pli-professor icon-lg" style="padding-top: 5pX"></i>
            									<i class="pli-board icon-lg"></i>
            							</td>
            						
            								<td>
            									<div class="comment-header">
					                                <label class="media-heading box-inline text-main text-sm text-semibold ">Kelvin Adonay Flores Mejia</label> 
					                                <p class="text-muted text-xs">Email@gmail.com </p>


					                            </div>
					                        </td>
					                        <td align="center">
<button class="btn btn-default btn-trans btn-sm  btn-hover infoModal add-tooltip btnAsigDocente" data-original-title="Asignar" data-container="body" value="" disabled="true">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>
					                        </td>
 
            						</tr>
            						@endfor

            						<tr >
            							<td align="center" >
            									<i class="pli-board icon-lg" style="padding-top: 5pX"></i>
            									<i class="pli-conference icon-sm" style="padding-top: 5pX"></i>
            									
            							</td>
        								<td>
        									<div class="comment-header">
				                                <label class="media-heading box-inline text-main text-sm text-semibold ">Aula 2-1</label> 
				                                <p class="text-muted text-xs">Capacidad 20 personas </p>


				                            </div>
				                        </td>
				                        <td align="center">
<button class="btn btn-default btn-trans btn-sm  btn-hover infoModal add-tooltip btnAsigAula" data-original-title="Asignar Aula" data-container="body" value="">Asignar aula<i class="demo-psi-arrow-right icon-md "></i> </button>
				                        </td>

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



	@endsection

	@section('script')

	
<script type="text/javascript">
	$(document).ready(function(){		 	
		 $.niftyNav('collapse');
   		
	    //$('#myTable').empty();
	    //$("#myTable").empty();
	    $('#myTable').append($('#hiddenThead').val());
	    $('#myTable').append($('#hiddenTbody').val());	 
	    // $(".tablaMod").DataTable();

	    });
	</script>


	<script src="{{asset('js/nota.js')}}"></script>
	

	@endsection