	@extends('layouts.shared.appplantilla')
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
			<li><a href=""><i class="demo-pli-home"></i></a></li>

			<li><a href="{{url('/')}}/docente">Inscripcion</a></li>
			<li><a href="{{url('/')}}/docente">Docentes</a></li>
			<li class="active">Grupos</li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->

	</div>

	<!--Page content-->
	<!--===================================================-->
	<div id="page-content" >

		<!--col-md-12-->
	    <!--===================================================-->
		<div class="col-md-12">
			<input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
		<!--panel 1-->
	    <!--===================================================-->
		<div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

			<div class="panel-heading {{--bg-mint--}}" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
				
				<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">GRUPOS DE DOCENTE {{strtoupper($docente->nombre)}} {{strtoupper($docente->apellido)}}</strong></p></h3>

			</div>


			<!--Panel Body-->
			<!--===================================================-->
			<div class="panel-body " style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
			<!--col-md-6-->
		    <!--===================================================-->
			<div class="col-md-5">
				<div class="{{--panel-group--}}" >
				  <div class="panel {{--panel-default --}} ">
				    <div class="panel-heading bg-primary" style="border: 1px solid #ccc;">
				      	<div style="display: inline-block;width: 100%;">
					      	  
						      <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="color:white;font-size: 13px; " >INFORMACION DE DOCENTE</strong></p></h4>
				      		
					      <h4 class="panel-title" align="right" style="float: right;" >
					      	
					        <a data-toggle="collapse" href="#collapse1" class="colapOne" ><i class="ion-plus"></i></a>
					      </h4>
				  		</div>
				    </div>
				    <div id="collapse1" class="panel-collapse " style="border-bottom: 1px solid #ccc;">
				    	<br>
				     	<div class="row pad-btm form-inline">
							<div class=" col-md-12">
								<label  class="control-label text-main text-bold col-md-3">NOMBRE:</label>
								<label class="control-label  text-bold col-md-9 text-capitalize">{{strtoupper($docente->nombre)}} {{strtoupper($docente->apellido)}}</label>
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">GENERO:</label>

								 <label class="control-label  text-bold col-md-9">{{$docente->genero}} </label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">EDAD:</label>

								
								 <label class="control-label  text-bold col-md-9">{{ estudianteController::getNumberYears($docente->fechaNac)}} </label>
						        
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">DUI:</label>

								 <label class="control-label  text-bold col-md-9">{{$docente->dui}} </label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">NIT:</label>

								 <label class="control-label  text-bold col-md-9">{{$docente->nit}} </label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">EMAIL:</label>

								 <label class="control-label  text-bold col-md-9 ">{{$docente->email}} </label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">TELEFONO:</label>

								 <label class="control-label  text-bold col-md-9">{{$docente->telefono}} </label>
						          
							</div>							
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">CUENTA:</label>

								 <label class="control-label  text-bold col-md-9">{{$docente->ncuenta}} </label>
						          
							</div>
							<br>
							<br>
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">ESTADO:</label>

								 <!-- <label class="control-label  text-bold col-md-9"> </label> -->
								  @if($docente->estado=='ACTIVO')
								 <div class="label label-table bg-mint col-md-9">
				                    <div class="text-sm text-bold">
				                    {{$docente->estado}}
				                    </div>
				                  </div>
				                  @endif
				                   @if($docente->estado=='INACTIVO')
				                  <div class="label label-table bg-gray col-md-9">
				                    <div class="text-sm text-bold">
				                    {{$docente->estado}}
				                    </div>
				                  </div>
				                  @endif
						          
							</div>
							<br>
							<br>
						</div>
				    </div>
				  </div>
				</div>
				
				</div>
				<!--col-md-6-->
		    	<!--===================================================-->	
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
				<!--col-md-6-->
		    <!--===================================================-->
			<div class="col-md-7">
				{{-- @forelse($estudiantegrupos as $estudiantegrupo) --}}
				<div class="{{--panel-group--}}" >
				  <div class="panel {{--panel-default--}}">
				    <div class="panel-heading bg-gray-dark" style="border: 1px solid #ccc;">
				      	<div style="display: inline-block;width: 100%;">
					      	  
						      <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeonTwo" name="titleacordeonTwo"> <strong style="font-size: 13px; " >GRUPOS</strong></p></h4>
				      		
					      <h4 class="panel-title" align="right" style="float: right;" >
					      	
					        <a data-toggle="collapse" href="#collapse2" class="colapTwo"><i class="ion-plus"></i></a>
					      </h4>
				  		</div>
				    </div>
				    <div id="collapse2" class="panel-collapse collapse" style="border-bottom: 1px solid #ccc;">
				    	<br>
				     	<div class="row pad-btm form-inline">
							<div class=" col-md-12">
								<label for="" class="control-label text-main text-bold col-md-3">Idiomas:</label>
								<select class="form-control col-md-6" id="idioma" name="idioma">
									@forelse($idiomas as $idioma)
										<option value="{{$idioma->id}}">{{$idioma->nombre}}</option>
									@empty
										<option selected disabled label="No hay mensajes destacados"></option>
									@endforelse 
		            			</select>
		            			@if(count($grupos)>0)
		            				<input type="number" hidden="true" name="iddocentes" id="iddocentes" value="{{$grupos->first()->iddocentes}}">
		            			
		            			@endif
							</div>
							
							<div class=" col-md-12">
								<br>
								<div class="col-md-9"></div>
								@if(count($grupos)>0)
								<button type="button" id="filtrar" name="filtrar" class="btn btn-mint col-md-3 filtrar" >Filtrar
								</button>
								@endif
							</div>
						</div>
				    </div>
				  </div>
				</div>

							
					{{--			@empty
							<p>No hay mensajes destacados</p>
							@endforelse --}}
				

					
					<div class=" table-responsive">
						<table  class="table table-striped row-border display"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
							<thead>
								<tr>
									<th class="text-center">#</th>
									
									<th class="text-left">Nombre</th>
									<th class="text-left">Categoria</th>
									
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
								@forelse($grupos as $grupo)
								@if($ididioma == $grupo->nivels->ididiomas)
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
								@endif
								@empty
							<p>No hay mensajes destacados</p>

							@endforelse 
							</tbody>
						</table>
					</div>
				
				</div>
				<!--col-md-6-->	
			
			</div>
			<!--===================================================-->
			<!--End Panel Body-->
		{{-- aqui termina col 10 --}}
		</div>
		<!--===================================================-->
		<!--End Panel 1-->
		</div>
		<!--===================================================-->
		<!--End col-12-->
	


	</div>
	<!--===================================================-->
	<!--End page content-->



	<!--===================================================-->
	<!--END CONTENT CONTAINER-->


	<!--INFO Bootstrap Modal-->
	<!--===================================================-->
	<div id="modalInfo" class="modal fade" tabindex="-1">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">
				<div class="modal-header alert-info">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Notas de Estudiante</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Ponderaciones de Grupo</h6>
            			<div class="col-md-9">
						<table   class="table {{--table-bordered--}} table-striped table-sm " align="center">
            					<tbody id="tablainfo">
            						<tr>
            						<td></td> 
            						</tr>
            					</tbody>
            			</table>
            			</div>
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
				<div class="modal-header alert-mint">
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalMsjLabel">Mover Estudiante</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<h5 id="txtModalBodyMsj" class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
					<p>Esta seguro de continuar con la accion?.</p></h5>
            			{{-- Este funciona para darle valor del id para dar baja o alta--}}
					 <form id="formmodalMsj" name="formmodalMsj">
					 <input type="hidden" class="form-control" type="text"  id="txtModalidestudiante" name="txtModalidestudiante">
					  <input type="hidden" class="form-control" type="text"  id="registro_id" name="registro_id">
      			</form>
      			
						
					</div>
				</div>
				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
					<button class="btn btn-mint" id="btnGuardarTraspasar">Continuar</button>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End DarBaja y Alta Bootstrap Modal-->





	@endsection

	@section('script')
	<script type="text/javascript">
	$(document).ready(function() {
    //$(".display").DataTable();
    $.niftyNav('collapse');
    //$.niftyNav('bind');
   // $('table.display').DataTable().ajax.reload();

} );

 $(document).on('click','.vernotaestudiante',function(){

    var idestudiantegrupo =$(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
       console.log(idestudiantegrupo);
       $.ajax({

        type: "GET",
        url: $("#path").val()+'/estudiante/record/nota/'+idestudiantegrupo,
        data: idestudiantegrupo,
        dataType: 'json',
        success: function (data) {
          console.log(data);
           var row = '';
          for(i=0;i<data['notas'].length;i++){
          row += '<tr><td width="30%"> ' + data['notas'][i].nombreEvaluacion + ' ( ' + data['notas'][i].ponderacion + '% ):</td>';
          row +='<td width="50%">' + data['notas'][i].nota + '</td>';
          row += '</tr>';
      	}
      	row +='<tr><td>Nota Final ( 100% )</td><td>' + data['notaFinal'].notaFinal + '</td></tr>'
      $("#tablainfo").append(row); ///Se anhade a la tabla           

    },
    error: function (data) {
      console.log('Error de boton Info:', data);
    }
  });

  $('#modalInfo').modal('show'); ///modal de informacion
});

  $(document).on('click','.filtrar',function(){
  //	window.location.reload();
    $(location).attr('href',$("#path").val()+'/estudiante/record/'+$('#iddocentes').val()+'/idioma/'+$('#idioma option:selected').text());
                     
  });

</script>
<!--
	<script src="{{asset('js/traspaso.js')}}"></script> -->

	@endsection