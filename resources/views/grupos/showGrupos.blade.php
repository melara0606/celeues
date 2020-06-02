	@extends('layouts.shared.appplantilla')

	@section('links')

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
	<div id="page-head" >

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
	    <li><a href="">Inscripción</a></li>
	    <li class="active">Grupos</li>
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

			<div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
				<div class="panel-body ">
					<div class="panel-heading ">
						<h4>Filtrar	</h4>

					</div>




		<div class="row col-sm-12">

		<div style="display: none ;">
			<input class="" placeholder="selectCurso"   type="text" id="hiddenCurso" name="year" value="{{$selectCurso}}" >
			<input class="" placeholder="selectYear"  type="text" id="year" name="year" value="{{$selectYear}}" >
	        <input class="" placeholder="selectModulo" type="text" id="hiddenModulo" name="hiddenModulo" value="{{$selectModulo}}" >
			<input class="" placeholder="selectPeriodo"  type="text" id="hiddenPeriodo" name="hiddenPeriodo" value="{{$selectPeriodo}}" >
		</div>
		{{-- <input class="" type="text" id="hiddenIdCategoria" name="hiddenIdCategoria" value="{{$selectCategoria}}" >
            --}}

						<label for="" class="control-label text-main text-bold ">Cursos:
							<button class="btn btn-icon btn-trans btn-xs  add-tooltip infoHorariosModal" data-original-title="Ver Información de Curso" data-container="body" value=""><i class="ion-eye icon-lg " ></i></button>
						</label>
						<select class="form-control" id="cursofiltro" name="cursofiltro">

	            			 @forelse($cursos as $curso)
						          <option value="{{$curso->id}}">{{$curso->nombreIdioma}} {{$curso->nombreModalidad}} {{$curso->turno}}</option>
								@empty
						          @endforelse
            			</select>
					</div>
					<div class="row">

					</div>
					<br>

					<hr>
					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Categorías:</label>

						 <select class="form-control" id="categoriafiltro" name="categoriafiltro" >
						 	@forelse($categorias as $categoria)
				              <option value="{{$categoria->idcategorias}}">{{$categoria->nombre}} {{$categoria->edadInicio}}-{{$categoria->edadFin}}</option>
				              @empty
									@endforelse
				          </select>
					</div>
					<div class="row">

					</div>
					<br>

					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Año:</label>
						<select class="form-control" id="anhofiltro" name="anhofiltro" >
						          @forelse($anhos as $anho)
						          <option value="{{$anho->anho}}">{{$anho->anho}}</option>
								@empty
						          @endforelse
				        </select>

					</div>
					<div class="row">

					</div>
					<br>

					<div class="row col-sm-12">
						<label for="" class="control-label text-main text-bold ">Períodos o Módulos:</label>
						<select class="form-control" id="periodofiltro" name="periodofiltro" >
						          @forelse($periodos as $periodo)
						          <option value="{{$periodo->id}}">{{$periodo->numPeriodo}}</option>
								@empty
						          @endforelse
				        </select>

					</div>
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
					<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">GRUPOS DE {{$cursoNombreDiv}} {{$selectYear}} {{$selectModulo}}</strong></p></h3></div>



				</div>

				<!--Panel Body-->
				<!--===================================================-->
				<div class="panel-body " {{--style="background-image: linear-gradient(#eeeeee 14%, #ffffff 0%);"--}}>
					<!--1rst Row Panel Body-->
					<!--===================================================-->
					<div class="row bord-btm " style="margin-bottom: 15px;" >
						<div class="col-sm-12 table-toolbar-left">
							<button id="btnnuevo" class="btn btn-purple"><i class="demo-pli-add"></i> Nuevo</button>
							<button class="btn btn-default imprimir"><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
							<div class="btn-group text-right ">
								{{--<button class="btn btn-default"><i class="demo-pli-exclamation"></i>
								</button>
								<button class="btn btn-default"><i class="demo-pli-recycling"></i>
								</button>--}}
								<div class="btn-group btn-group-sm ">
									<table>
										<tbody id="tableCategorias">
											<tr>
									@forelse($categorias as $categoria)
										 <td>
										 	<!--@if($selectCategoria==$categoria->idcategorias) readonly @else @endif -->
										 	<button type="button" class="btn btn-mint @if($selectCategoria==$categoria->idcategorias)active @else @endif filtrar"
										 	value="{{$categoria->idcategorias}}">{{$categoria->nombre}} {{$categoria->edadInicio}}-{{$categoria->edadFin}} <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted">{{grupoController::numeroCategorias($selectPeriodo,$categoria->idcategorias)}}</span></button>
										 </td>
									@empty
									@endforelse
											</tr>
										</tbody>
									</table>
	                       {{-- <button class="btn btn-warning active">Adulto</button>
	                        <button class="btn btn-warning">Adolecente</button>
	                        <button class="btn btn-warning">Niño</button>--}}
	                   	</div>
							</div>
						</div>
					</div>


					<!--End 1rst Row Panel Body-->
					<!--===================================================-->
						<div style="display: none;">
							{{ $last=5}}
						    {{ $now =1 }}
						    </div>
				   {{-- @for ($i = $now; $i <= $last; $i++)
--}}

					<div class="col-md-12" >
					<table id="myTable" style="display:none;">
						<tbody>
							<tr>
								<td width="500px">
					<!--COL ROW CARTAS DE GRUPO-->
					<!--===================================================-->
					<div class="col-md-12">
						<div class="col-sm-12 col-md-12">

							 <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">

							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                                <a href="#" class="media-heading box-inline text-main text-semibold ">Ingles Nivel 5 EJEMPLO</a> <a href="#" class="media-heading box-inline text-main text-semibold media-right text-sm"><p style="color: green">Aula 2-1</p></a>
					                                <p class="text-muted text-sm ">{{-- <i class="demo-pli-smartphone-3 icon-lg">--}}</i>Adulto | Teacher <strong style="color: green">Lic. kelvin Adonay Flores</strong></p>
					                            </div>
					                            <p class=" media-left text-sm">30 estudiantes ----- 3 disponibles </p>
					                            {{--<a class="btn btn-sm btn-default media-right"><i class="icon-lg demo-pli-exclamation"></i></a>
					                            <a class="btn btn-sm btn-default media-right"><i class="icon-lg demo-pli-heart-2"></i></a>--}}



					                        </div>
					                </div>

			                            <!-------------------------------------->
										<div class="text-right">
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-lg " ></i> </button>

					                          <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Asignar aula y maestro" data-container="body" value=""><i class="demo-pli-add icon-lg " ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Modificar Grupo" data-container="body" value=""><i class="demo-psi-pen-5 icon-md " ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value=""><i class="demo-pli-remove icon-md " ></i> </button>
			                             </div>
			                            <!-------------------------------------->

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
					{{--@endfor
						--}}
							</td>
							<td  width="500px">
					<!--COL ROW CARTAS DE GRUPO-->
					<!--===================================================-->
					<div class="col-md-12">
						<div class="col-sm-12 col-md-12">

							 <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">

							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                                <a href="#" class="media-heading box-inline text-main text-semibold ">Ingles Nivel 5 EJEMPLO</a> <a href="#" class="media-heading box-inline text-main text-semibold media-right text-sm"><p style="color: green">Aula 2-1</p></a>
					                                <p class="text-muted text-sm ">{{-- <i class="demo-pli-smartphone-3 icon-lg">--}}</i>Adulto | Teacher <strong style="color: green">Lic. kelvin Adonay Flores</strong></p>
					                            </div>
					                            <p class=" media-left text-sm">30 estudiantes ----- 3 disponibles </p>
					                            {{--<a class="btn btn-sm btn-default media-right"><i class="icon-lg demo-pli-exclamation"></i></a>
					                            <a class="btn btn-sm btn-default media-right"><i class="icon-lg demo-pli-heart-2"></i></a>--}}



					                        </div>
					                </div>

			                            <!-------------------------------------->
										<div class="text-right">
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-lg " ></i> </button>

					                          <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Asignar aula y maestro" data-container="body" value=""><i class="demo-pli-add icon-lg " ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Modificar Grupo" data-container="body" value=""><i class="demo-psi-pen-5 icon-md " ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value=""><i class="demo-pli-remove icon-md " ></i> </button>
			                             </div>
			                            <!-------------------------------------->

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
					{{--@endfor
						--}}
							</td>
								</tr>
						</tbody>
					</table>
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
					@forelse($grupos as $grupo)
					<div class="col-md-6 single-item">
						<div class="col-sm-12 col-md-12">

							 <div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px 3px #bbbbbb !important; border-radius: 5px;">

							 	<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
							 		<div class="comments media-block">
					                        {{--<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/2.png"></a>--}}
					                        <div class="media-body">
					                            <div class="comment-header">
					                            	<div class="" style="width: 100%;height: 25px;display: inline-block;">
					                                <a href="" style="" class="media-heading  text-md box-inline  text-main text-semibold ">{{ucwords(strtolower(grupoController::verIdioma($grupo->ididiomas))) }} Nivel {{$grupo->numNivel}}  {{$seccion[$grupo->numGrupo] }}
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
					                                <p class="text-muted text-sm " style="display: inline-block;">{{ucwords(strtolower(grupoController::verCategoria($grupo->idcategorias))) }} | <i class="pli-professor icon-lg"></i>&nbsp </p>

					                                	@if($grupo->iddocentes==null)
							                                <p class="text-muted text-sm " id="docente{{$grupo->idgrupos}}" style="display: inline-block;">{{-- <i class="demo-pli-smartphone-3 icon-lg"></i>--}}<u>N/A</u></p>
								                        @else
								                            <p class="text-muted text-sm text-semibold" id="docente{{$grupo->idgrupos}}" style="display: inline-block; color: green"> {{ucwords(strtolower(grupoController::verDocente($grupo->iddocentes))) }}</p>
								                         @endif
								                         </div>
								                         @if($grupo->estadoGrupo=='INICIADO')
								                          <p class=" media-left text-sm "><span id="estado{{$grupo->idgrupos}}" class="label bg-gray text-sm">Iniciado</span>&nbsp&nbsp 30 Inscritos</p>
								                          @endif

								                         @if($grupo->estadoGrupo=='EN CURSO')
								                          <p class=" media-left text-sm "><span id="estado{{$grupo->idgrupos}}" class="label badge-primary text-sm">En curso</span>&nbsp&nbsp 30 Inscritos</p>
								                          @endif

								                         @if($grupo->estadoGrupo=='FINALIZADO')
								                          <p class=" media-left text-sm "><span id="estado{{$grupo->idgrupos}}" class="label bg-danger text-sm">Finalizado</span>&nbsp&nbsp 30 Inscritos</p>
								                          @endif
					                            </div>

					                             <!-------------------------------------->
										<div class="text-right" style="padding-top: 15px">
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip deleteGrupo" data-original-title="Eliminar grupo" data-container="body" value="{{$grupo->idgrupos}}"><i class="demo-pli-remove icon-md " ></i> </button>

											<button onclick="location.href='{{url('/')}}/grupos/notas/{{$grupo->idgrupos}}'" class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip " data-cupos="{{$grupo->cupos}}" data-original-title="Asignar Notas" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-notepad icon-lg " ></i> </button>
											<button onclick="location.href='{{url('/')}}/grupos/estudiantes/{{$grupo->idgrupos}}'" class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip " data-original-title="Listado de Estudiantes" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-student-male-female icon-lg " ></i> </button>
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigAula" data-original-title="Asignar Aula" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-board icon-lg"></i></button>
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigDocente" data-original-title="Asignar Docente" data-container="body" value="{{$grupo->idgrupos}}"><i class="pli-professor icon-lg" ></i> </button>
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip infoModal" data-original-title="Información" data-container="body" value="{{$grupo->idgrupos}}"><i class="demo-pli-exclamation icon-lg " ></i> </button>


											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip editarmodal" data-cupos="{{$grupo->cupos}}" data-original-title="Modificar Cupos" data-container="body" value="{{$grupo->idgrupos}}"><i class="demo-psi-pen-5 icon-md " ></i> </button>







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


<!--					<div class="col-md-12" style="display: none;">


						<table class="table  table-sm ">
							<tbody>
								@forelse($grupos as $grupo)

								<tr>

									<td>
										<i class="pli-board icon-lg" style="padding-top: 5pX"></i>
									</td>
									<td>

					                            <div class="comment-header">
					                                <a href="" class="media-heading box-inline text-main text-semibold ">{{ucwords(strtolower(grupoController::verIdioma($grupo->ididiomas))) }} Nivel {{$grupo->numNivel}}  {{$seccion[$grupo->numGrupo] }}</a>
					                                <p class="text-muted text-sm ">{{-- <i class="demo-pli-smartphone-3 icon-lg">--}}</i>{{ucwords(strtolower(grupoController::verCategoria($grupo->idcategorias))) }} | Teacher Lic. </p>
					                                <p class="text-muted text-sm">30 estudiantes ----- {{$grupo->cupos}} disponibles </p>


					                            </div>



									</td>
									<td>

										  	<div class="text-right">
										  		<a href="" class="media-heading box-inline text-main text-semibold media-right text-sm updateAula" data-name="name" data-type="text" data-pk="{{ $grupo->id }}" data-title="Enter name">{{ucwords(strtolower(grupoController::verAula($grupo->idaulas))) }}</a>
										 <br><br>
											<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value=""><i class="demo-pli-exclamation icon-lg " ></i> </button>

					                          <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip asigDocente" data-original-title="Asignar aula y maestro" data-container="body" value="{{$grupo->id}}"><i class="demo-pli-add icon-lg " ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip asigAula" data-original-title="Modificar Grupo" data-container="body" value="{{$grupo->id}}"><i class="demo-psi-pen-5 icon-md " ></i> </button>
				                             <button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value=""><i class="demo-pli-remove icon-md " ></i> </button>
			                             </div>
									</td>

								</tr>
					@empty No hay datos
					@endforelse
							</tbody>
						</table>

					</div>
-->



				</div>
				<!--End Panel Body-->
				<!--===================================================-->

			</div>
			<!--End Main Panel-->
			<!--===================================================-->

		</div>
		<!--End Main Right COL-MD-->
		<!--===================================================-->



	</div><!-- No se por que si lo pongo se me hace feo el disenho del footer===================================================-->
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

						<form  id="form" name="form" class="panel-body form-horizontal form-padding" action="" method="post">
							 <input type="hidden" id="form_id" name="form_id" value="0">
								<br>
								<div id="nuevoFormulario">
					          <div class="row form-group">
					            <div class="col-md-1 col-sm-1"></div>
					              <label class="col-md-2 col-sm-2 control-label text-main text-bold ">Curso:</label>
					              <div class="col-md-6 col-sm-6">
					                  <select class="form-control" id="cursoSelect" name="cursoSelect">
					                  	<option value="" selected="selected" disabled>Seleccione un curso</option>
                               			    @forelse($cursos as $curso)
									          <option value="{{$curso->id}}">{{$curso->nombreIdioma}} {{$curso->nombreModalidad}} {{$curso->turno}}</option>
											@empty
									          @endforelse
			            			</select>
					              </div>

					          </div>
					          <br>
					          <div  class="row form-group">
					            <div class="col-md-1 col-sm-1"></div>
					            <label  class="col-md-2 col-sm-2 control-label text-main text-bold ">Categoría:</label>
					            <div class="col-md-6 col-sm-6">
					            	<select class="form-control" id="categoriaSelect" name="categoriaSelect">
					            		<option selected disabled label="Seleccione una categoria"></option>
					            {{--   @forelse($categorias as $categoria)
					               		<option value="{{$categoria->id}}">{{$categoria->nombre}} {{$categoria->edadInicio}}-{{$categoria->edadFin}}</option>
									@empty
									@endforelse--}}
									</select>
					            </div>

					          </div>
					          <br>
					          <div  class="row form-group">
					             <div class="col-md-1 col-sm-1"></div>
					            <label  class="col-md-2 col-sm-2 control-label text-main text-bold ">Nivel:</label>
					            <div class="col-md-6 col-sm-6">
					               <select class="form-control" id="nivelSelect" name="nivelSelect">
					               	<option selected disabled label="Seleccione un nivel"></option>


			            			</select>
					            </div>
					            {{--<div class="col-md-2 col-sm-2">

					              <button style="margin-top: 5px" class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip nada" data-original-title="Modificar Grupo" data-container="body" value=""><i class="demo-psi-add icon-lg "></i> </button>
					            </div>
					            --}}

					          </div>
					          <br>
					          <div  class="row form-group">
					             <div class="col-md-1 col-sm-1"></div>
					            <label  class="col-md-2 col-sm-2 control-label text-main text-bold ">Evaluaciones:</label>
					            <div class="col-md-6 col-sm-6">
					               <select class="form-control" id="evaluacionesSelect" name="evaluacionesSelect">
					               	<option selected disabled label="Seleccione una evaluacion"></option>
					               		@forelse($evaluaciones as $evaluacion)
					               			<option value="{{ $evaluacion->id }}">{{ $evaluacion->titulo }}</option>
					               		@empty
					               		@endforelse


			            			</select>
					            </div>

					          </div>
					          <br>
					          <div class="row" id="divcollapseEvaluacion" style="display: none">
					           <label  class="col-md-3 col-sm-12 control-label text-main text-bold ">Visualizar:</label>

					           <div class=" col-md-6 col-sm-12">
						          <div class="panel {{--panel-default--}}" >
									    <div class="panel-heading bg-gray" style="height: 35px; border: 1px solid #ccc;">
									      	<div style="display: inline-block;width: 100%;margin-top: 8px">

											      <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-sm text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="{{--color:white;--}}font-size: 13px; " >ponderaciones</strong></p></h4>

										      <h4 class="panel-title text-sm" align="right" style="float: right;" >

										        <a data-toggle="collapse" href="#collapse1" class="colapOne" ><i class="ion-plus"></i></a>
										      </h4>
									  		</div>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse" style="border-bottom: 1px solid #ccc;">
									    	<table  class="table {{--table-bordered--}} table-striped table-sm ">
									    		<tbody id="tableEvaluaciones" name="tableEvaluaciones">

									    		</tbody>
									    	</table>
									    </div>
									</div>
								  </div>
							  </div>
					          <div class="row form-group">
					            <div class="col-md-1 col-sm-1"></div>
					            <label  class="col-md-2 col-sm-2 control-label text-main text-bold ">Sección:</label>
					            <div class="col-md-3 col-sm-3">
					                 <select class="form-control" id="numGrupos" name="numGrupos">

									          <!-- <option value="1">1  A </option>
											  <option value="2">2  A B </option>
											  <option value="3">3  A B C</option>
											  <option value="4">4  A B C D</option>
											  <option value="5">5  A B C D E</option>
											  <option value="6">6  A B C D E F</option> -->
											  <option value="1">A </option>
											  <option value="2">B </option>
											  <option value="3">C</option>
											  <option value="4">D</option>
											  <option value="5">E</option>
											  <option value="6">F</option>


			            			</select>
					            </div>

					          </div>
					          <br>
					          <div  class="row form-group">
					             <div class="col-md-1 col-sm-1"></div>
					            <label  class="col-md-2 col-sm-2 control-label text-main text-bold ">Cupos:</label>
					            <div class="col-md-3 col-sm-3">
					               <input class="form-control input-number" type="number" value="20" id="cupos" name="cupos">
					            </div>

					          </div>
					          <br>
							</div><!-- fin nuevo Formulario-->
					        <div id="modificarFormulario">
					          <div  class="row form-group">
					             <div class="col-md-1 col-sm-1"></div>
					            <label  class="col-md-2 col-sm-2 control-label text-main text-bold ">Cupos:</label>
					            <div class="col-md-6 col-sm-6">
					               <input class="form-control input-number" type="number" value="" id="cuposModificar" name="cuposModificar">
					            </div>

					          </div>
					          <br>
					        </div><!-- fin modificar Formulario-->

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
			<div class="modal-content">
				<div class="modal-header alert-mint">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalAsigDocenteAulaLabel">Horarios</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						{{--<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Asignar Docente</h6>
					     --}}
					     <input type="text" hidden="true" id="modalAsigDocenteAulaToggle" name="modalAsigDocenteAulaToggle" value="">

					     <input type="text" hidden="true" id="modalAsigDocenteAulaIdGrupo" name="modalAsigDocenteAulaIdGrupo" value="">

					     <div class="input-group mar-btm">
					                        <input type="text" placeholder="Buscar" class="form-control" id="search" name="search">
					                        <span class="input-group-btn">
					                            <button class="btn btn-mint" type="button">Buscar</button>
					                        </span>
					                    </div>
						<table   class="table {{--table-bordered--}} table-sm " align="center">
            					<tbody id="tablaAsigDocenteAula">



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
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Cambio Estado de Categoría</h4>
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

			$.niftyNav('bind');
			$('#anhofiltro').val($('#year').val());
			$('#periodofiltro').val($('#hiddenPeriodo').val());
			$('#cursofiltro').val($('#hiddenCurso').val());
			$('#myTable').DataTable({
 	    		 //"dom": '<"top"lf>rt<"bottom"pi>'
 			 });
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
</script>
	<script src="{{asset('js/grupo.js')}}"></script>


	@endsection
