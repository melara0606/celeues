@extends('layouts.shared.appplantilla')

@section('content')
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
					<li><a href="{{url('/')}}/noticia">Noticias</a></li>
					<li class="active">Interesados</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
       
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content" >
                   
				
					<div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

					    <div class="panel-heading {{--bg-mint--}}" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
					    	<div class="panel-control">
					                        <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
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

				<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">INTERESADOS</strong></p></h3>

					    </div>

					
					    <!--Data Table-->
					    <!--===================================================-->
					    <div class="panel-body" style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
					       {{--<div class="pad-btm form-inline">
					            <div class="row">
					                <div class="col-sm-6 table-toolbar-left">
					                    <button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> Add</button>
					                    <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
					                    <div class="btn-group">
					                        <button class="btn btn-default"><i class="demo-pli-exclamation"></i></button>
					                        <button class="btn btn-default"><i class="demo-pli-recycling"></i></button>
					                    </div>
					                </div>
					                <div class="col-sm-6 table-toolbar-right">
					                    <div class="form-group">
					              	          <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
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
					                </div>
					            </div>
					        </div>--}}

					        <div class="{{--table-responsive--}}">
					            <table id="myTable" class="table table-striped" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
					                <thead>
					                    <tr>
					                        <th class="text-center">Titulo</th>
					                        <th>Descripcion</th>
					                        <th>Modalidad</th>
					                        <th>Estado</th>
					                        <th>Acciones</th>
					                       
					                    </tr>
					                </thead>
					                <tbody>
					                    @forelse($interesados as $interesado)
										<tr id="{{ $interesado->id }}">
											<td>{{ $interesado->nombre }}</td>
											<td >{{ $interesado->apellido }}</td>
											<td><span class="text-muted"><i class="demo-pli-clock"></i> {{ $interesado->fechaNac }}</span></td>
											<td ><div class="label label-table bg-mint"><div class="text-sm text-bold">{{ $interesado->telefono }}</div></div></td>
											<td>
											{{--<button class="btn btn-mint btn-icon btn-sm"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-rounded btn-default">Small</button>
											<button class="btn btn-xs btn-rounded btn-default">Extra Small</button>
											--}}
											<button class="btn btn-default btn-sm btn-default btn-success"><i class="demo-pli-pencil icon-sm"></i></button>
											<button class="btn btn-default btn-sm btn-circle btn-hover-info"><i class="demo-pli-exclamation icon-sm"></i></button>

											{{--<button class="btn btn-lg btn-default btn-hover-warning">Hover Me!</button>
											<div class="demo-icon"><i class="demo-pli-internet-explorer"></i></div>--}}
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


@endsection

@section('script')

<script >
	$(document).ready(function(){
	//$("#msjshow").hide();
	$('#myTable').DataTable({
      //"dom": '<"top"l>frt<"bottom"pi>'
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
    $.niftyNav('expand');

});
</script>
@endsection