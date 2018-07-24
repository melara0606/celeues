@extends('layouts.appPlantilla')

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
					<li><a href="#">Forms</a></li>
					<li class="active">Idiomas</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
       
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content" >
                   
				
					<div class="panel">

					    <div class="panel-heading {{--bg-mint--}}">
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
					        <h3 class="panel-title ">Noticias</h3>

					    </div>

					
					    <!--Data Table-->
					    <!--===================================================-->
					    <div class="panel-body">
					       <div class="pad-btm form-inline">
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
					                                <li><a href="#">Something elsesssssshere</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#">Separated link</a></li>
					                            </ul>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>

					        <div class="{{--table-responsive--}}">
					            <table id="myTable" class="table table-striped">
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
					                    @forelse($noticias as $noticia)
										<tr id="{{ $noticia->id }}">
											<td>{{ $noticia->titulo }}</td>
											<td >{{ $noticia->descripcion }}</td>
											<td><span class="text-muted"><i class="demo-pli-clock"></i> {{ $noticia->modalidad }}</span></td>
											<td ><div class="label label-table bg-mint"><div class="text-sm text-bold">{{ $noticia->estado }}</div></div></td>
											<td>
											{{--<button class="btn btn-mint btn-icon btn-sm"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-rounded btn-default">Small</button>
											<button class="btn btn-xs btn-rounded btn-default">Extra Small</button>
											--}}
											<button class="btn btn-default btn-default btn-success"><i class="demo-pli-pen-5 icon-sm add-tooltip" ></i></button>
											<button class="btn btn-default btn-sm btn-circle btn-hover-info"><i class="demo-pli-exclamation icon-sm" ></i></button>
											<button class="btn btn-default btn-sm btn-circle"><i class="btn btn-icon demo-pli-pen-5 icon-lg add-tooltip" data-original-title="Edit Post" data-container="body"></i></button>

											{{--<button class="btn btn-lg btn-default btn-hover-warning">Hover Me!</button>
											<div class="demo-icon"><i class="demo-pli-internet-explorer"></i></div>--}}
											<a href="#" <a href="#" class="btn btn-icon demo-pli-pen-5 icon-lg add-tooltip" data-original-title="Edit Post" data-container="body"></a>
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
 	$('#myTable').DataTable();

});
</script>
@endsection