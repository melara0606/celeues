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
.table-bordered{
  border:none;
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
	  <ul class="breadcrumb">
	    <li><a href=""><i class="demo-pli-home"></i></a></li>
	    <li><a href="">Inscripcion</a></li>
	    <li class=""><a href="{{url('/')}}/grupos">Grupos</a></li>
	    <li class="active">Estudiantes</li>
	  </ul>
	  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	  <!--End breadcrumb-->

	</div>
		
	
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >

		<!--Row Main Left COL-MD -->
		<!--===================================================-->
		<div class="row col-md-3">
			<input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
			<input type="text" hidden="true" name="llenarGrupos"  id="llenarGrupos" value="{{$llenarGrupos}}">
			
			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">
					<div class="panel-heading ">
						<h4>Info Grupo	</h4>
		
					</div>

<!-- ----------------------------------------------------------------- -->
					<div class="row pad-btm form-inline">
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-4">IDIOMA:</label>

								 <label class="control-label  text-bold col-md-8">{{strtoupper($grupo->nivels->idiomas->nombre)}}</label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label  class="control-label text-main text-bold col-md-4">NIVEL:</label>
								<label class="control-label  text-bold col-md-8 text-capitalize">{{strtoupper($grupo->nivels->numNivel)}} SECCION A </label>
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label  class="control-label text-main text-bold col-md-4 text-sm">CATEGORIA: </label>
								<label class="control-label  text-bold col-md-8 text-capitalize">{{strtoupper($grupo->nivels->categorias->nombre)}}</label>
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-4">DOCENTE:</label>
								 @if($grupo->iddocentes!=null)
								 <label class="control-label  text-bold col-md-8 text-sm">{{strtoupper($grupo->docentes->nombre)}} {{strtoupper($grupo->docentes->apellido)}}  </label>
								 @else
								 <label class="control-label  text-bold col-md-8">N/A </label>
						          @endif
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-4">AULA:</label>

								@if($grupo->idaulas!=null)
								 <label class="control-label  text-bold col-md-8">{{ strtoupper($grupo->aulas->nombre) }} </label>
						        @else
								 <label class="control-label  text-bold col-md-8">N/A </label>
						        @endif
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-4">CUPOS:</label>

								 <label class="control-label  text-bold col-md-8"> {{ $grupo->cupos}}</label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-4">ESTADO:</label>

								  <label class="control-label  text-bold col-md-8">{{ $grupo->estado}} </label> 
								<!--  @if($grupo->estado=='ACTIVO')
								 <div class="label label-table bg-mint col-md-9">
				                    <div class="text-sm text-bold">
				                    {{$grupo->estado}}
				                    </div>
				                  </div>
				                  @endif
				                   @if($grupo->estado=='INACTIVO')
				                  <div class="label label-table bg-gray col-md-9">
				                    <div class="text-sm text-bold">
				                    {{$grupo->estado}}
				                    </div>
				                  </div>
				                  @endif
				              -->
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-4">PERIODO:</label>
								 @if($grupo->periodos->fechaFin!=null && $grupo->periodos->fechaIni != null)
								 <label class="control-label  text-bold col-md-8">{{date("d-M-Y",strtotime($grupo->periodos->fechaIni))}} a<br> {{date("d-M-Y",strtotime($grupo->periodos->fechaFin))}}</label>
						          @endif
							</div>							
						
							
						</div>
<!--------------------------------------------------------------------->

					
					
        
					<div class="row col-sm-12 ">
	{{--	<div style="display: none;"><input class=""  type="text" id="hiddenCurso" name="year" value="{{$selectCurso}}" >
		<input class=""  type="text" id="year" name="year" value="{{$selectYear}}" >
        <input class=""  type="text" id="hiddenModulo" name="hiddenModulo" value="{{$selectModulo}}" >
		<input class=""  type="text" id="hiddenPeriodo" name="hiddenPeriodo" value="{{$selectPeriodo}}" >
		</div>
		 <input class="" type="text" id="hiddenIdCategoria" name="hiddenIdCategoria" value="{{$selectCategoria}}" >
            --}}
         <div style="display: none;"{{----}}>
            		<input class=""  type="text" id="hiddenGrupo" name="hiddenGrupo" value="{{$selectGrupo}}" >
		</div>

						
					</div>


				<!--	<div class="row col-md-12 col-sm-12">
						<div class="comments media-block">
					                        
		                        <div class="media-body">
		                            <div class="comment-header">
		                            	{{--<div class="" style="width: 100%;height: 25px;display: inline-block;">
			                                <a href="" style="font-size: 14px;" class="media-heading  text-md box-inline  text-main text-semibold ">Ingles Nivel 10 Seccion A
			                                </a>

		                               
		                                 </div>--}}
		                                 <div class="media-body">
				                              {{--  <p class=" text-muted text-md " >Categoria Adulto</p>

		                                	                                 
				                                <p class=" text-muted text-md " id="docente1" > Docente: Docente</p>
				                                <p class="text-muted text-md " id="docente1" > Aula: Docente</p>
				                                  <p class="  text-sm ">Estado:<span id="estado1" class="label bg-gray text-sm">Iniciado</span></p> 
					                        <p class="  text-sm ">Inscritos 30 Inscritos</p>
					                        <p class="  text-sm ">Cupos 10 cupos</p>--}}
					                        <h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">informacion</h6>
					                        <table class="table bord-btm bord-top bord-lft bord-rgt table-striped table-sm " style="">
							
							<tbody id="llenarTabla">
								<tr>

									<td class="" >Aula</td>
									<td class="">Aesip</td>
				
								</tr>
								<tr>
									<td class="">Docente</td>
									<td class="">Cheyoylk asldk adslkf as laskd </td>
								</tr>
								<tr>
									<td class="">Cupos</td>
									<td class="">30</td>
								</tr>
								<tr>
									<td class="">Estado</td>
									<td class="">INICIADO</td>
								</tr>
							</tbody>
						</table>
					                         
				                            </div>
					                        
					                            
					                  </div>
		                            
		                             	
									

		                        </div>
					        </div>
						
					</div>
				-->

						
					<div class="row">
						
						<div class="col-sm-12 table-toolbar-right">
							<button id="btnnuevo" class="btn btn-purple" ><i class="demo-pli-add"></i> Agregar Estudiante</button>

						{{--	<button class="btn btn-default btn-mint addPonderacion" value="0" type="button" >Ponderacion</button>

							<button class="btn btn-default imprimir" ><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
							--}}
						</div>
						<div class="col-sm-6 table-toolbar-right">
							
						</div>
					</div>
					{{--<br>
					
				
					<div class="row">
						
					</div>
					<br>--}}
					
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
					<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">{{$encabezadoGrupo}}  </strong></p></h3></div>
						


				</div>

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body "  style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
					
					
					{{--<div class="col-md-1"></div>--}}	
					<div class="col-md-12" style="background-color: white">
						<div class="">
					<table id="myTable" class="table bord-top bord-btm table-striped table-dark row-border dataTable no-footer" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
							<thead>
										<tr>
									<th width="3%">#</th>
									<th width="30%"  colspan="2" > &nbsp&nbsp Nombre</th>
									
									<th width="15%">Usuario</th>
									<th width="10%">Estado</th>
									<th width="30%" style="text-align: center;">Accion </th>

				                        {{--<th>nota</th>
				                        
				                        <th>nota1</th>
				                        <th>nota1</th>
				                        <th>nota1</th>--}}

									</tr>
								</thead>
								<tbody id="tablaAsigDocenteAula">
								
            						<!--@for($i=1;$i<7;$i++)
            						
            						<tr class='clickable-row' >
            							{{----}}<td style="width: 3%" align="left">{{$i}}</td>
            							<td style="width: 5%" align="center" >
            									<i class="pli-student-male icon-lg" style="padding-top: 5pX"></i>
            									
            							</td>
            						
            								<td style="width: 45%" align="left">
            									<div class="comment-header">
					                                <label class="media-heading box-inline text-main text-sm text-semibold ">Kelvin Adonay Flores Mejia</label> 
					                                <p class="text-muted text-xs">Email@gmail.com </p>


					                            </div>
					                        </td>
					                        <td>
					                        	<span id="estado1" class="label bg-gray text-sm">INICIADO</span>
					                        </td>
					                        <td align="center">
<button class="btn btn-default btn-trans btn-sm  btn-hover infoModal add-tooltip btnAsigDocente" data-original-title="Asignar" data-container="body" value="" disabled="true">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>
					                        </td>
 
            						</tr>
            						@endfor -->
            						<div style="display: none;">{{ $i=1 }}</div>
 								@forelse($estudiantegrupos as $estudiantegrupo)
 								<tr>
            							{{----}}<td style="width: 3%" align="left">{{ $i++ }}</td>
            							<td style="width: 5%" align="center" >
            								<!--<i class="demo-pli-smartphone-3 icon-lg" style="padding-top: 10px">
            								-->	
            								@if($estudiantegrupo->genero=="MASCULINO")
            								<i class="pli-student-male icon-md" style="padding-top: 0pX"></i>
            								@else
            								<i class="pli-student-female icon-md" style="padding-top: 0pX"></i>
            								
            								@endif
            							</td>
            						
            								<td style="width: 45%" align="left">
            									<div class="comment-header">
					                                <label class="media-heading box-inline text-main text-sm text-semibold ">{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}</label> 
					                               <!-- <p class="text-muted text-xs">{{$estudiantegrupo->email}}</p> -->


					                            </div>
					                        </td>
					                        <td align="left">
					                        	<label class="media-heading box-inline text-main text-sm text-semibold ">{{$estudiantegrupo->email}}</label> 
					                        </td>
					                        <td>
					                        	@if($estudiantegrupo->estadoEstudiante=='PREINSCRITO')
						                        	<span id="estado1" class="label bg-gray text-sm">{{$estudiantegrupo->estadoEstudiante}}</span>
						                        @endif
					                        	@if($estudiantegrupo->estadoEstudiante=='ACTIVO')
						                        	<span id="estado1" class="label bg-mint text-sm">{{$estudiantegrupo->estadoEstudiante}}</span>					                        
					                        	@endif
					                        	@if($estudiantegrupo->estadoEstudiante=='OYENTE')
						                        	<span id="estado1" class="label bg-info text-sm">{{$estudiantegrupo->estadoEstudiante}}</span>
						                         @endif
					                        	@if($estudiantegrupo->estadoEstudiante=='TRASLADADO')
						                        	<span id="estado1" class="label bg-info text-sm">{{$estudiantegrupo->estadoEstudiante}}</span>
						                         @endif
					                        </td>
					                        <td align="center">
<!--<button class="btn btn-default btn-trans btn-sm  btn-hover infoModal add-tooltip " data-original-title="Asignar" data-container="body" value="" ="true"><i class="pli-dollar-sign icon-md "></i> </button>

-->
													<button class="btn btn-icon btn-default btn-xs media-right btn-hover add-tooltip infoModal" data-nombre="{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}" data-original-title="info estudiante" data-container="body" value="{{ $estudiantegrupo->id }}"><i class="pli-eye icon-lg "></i></button>

												@if($estudiantegrupo->estadoEstudiante=='PREINSCRITO')
						                        	<button class="btn btn-icon btn-default btn-xs media-right btn-hover add-tooltip asigPago" data-nombre="{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}" data-cupos="20" data-original-title="Asignar Pago" data-container="body" value="{{ $estudiantegrupo->idestudiantegrupo }}"><i class="pli-financial icon-lg "></i></button>

						                        	<button class="btn btn-icon btn-default btn-xs media-right btn-hover add-tooltip asigOyente" data-nombre="{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}" data-original-title="convertir a oyente" data-container="body" value="{{ $estudiantegrupo->idestudiantegrupo }}"><i class="pli-dj icon-lg "></i></button>
						                        	<button class="btn btn-icon btn-default btn-xs media-right btn-hover add-tooltip deleteEstudiante" data-nombre="{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}" data-original-title="remover estudiante" data-container="body" value="{{ $estudiantegrupo->idestudiantegrupo }}"><i class="pli-remove-user icon-lg "></i></button>
						                        				
						                        	
						                        @endif
					                        	@if($estudiantegrupo->estadoEstudiante=='OYENTE')
					                        		
						                        	<button class="btn btn-icon btn-default btn-xs media-right btn-hover add-tooltip asigPago" data-nombre="{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}"  data-original-title="Asignar Pago" data-container="body" value="{{ $estudiantegrupo->idestudiantegrupo }}"><i class="pli-financial icon-lg "></i></button>
						                        	<button class="btn btn-icon btn-default btn-xs media-right btn-hover add-tooltip deleteEstudiante" data-nombre="{{$estudiantegrupo->nombre}} {{$estudiantegrupo->apellido}}" data-original-title="remover estudiante" data-container="body" value="{{ $estudiantegrupo->idestudiantegrupo }}"><i class="pli-remove-user icon-lg "></i></button>
						                        				
					                        	@endif
					                        	@if($estudiantegrupo->estadoEstudiante=='ACTIVO')
					                        	{{--	N/A	--}}
					                        	@endif

					                        </td>
					                        
            						</tr>
 								@empty
						          @endforelse
            					 						

            						
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

	
	{{--<script src="{{asset('js/jquery.easyPaginate.js')}}"></script>

<script src="{{asset('js/jquery.snippet.min.js')}}"></script> 
	--}}<script type="text/javascript">
		 $(document).ready(function(){	
		  $('#llenarTabla').empty();
   $('#llenarTabla').html($('#llenarGrupos').val());
	 	
$.niftyNav('collapse');
$.niftyNav('bind');

   $('#myTable').DataTable({
  //    "dom": '<"top"lf>rt<"bottom"pi>'
  language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
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

//$('#myTable_filter').addClass('pull-right');
   
//$.niftyNav('bind');

		 });
	</script>
	<script src="{{asset('js/estudiantegrupo.js')}}"></script> 
	

	@endsection