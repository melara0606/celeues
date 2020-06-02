@extends('layouts.shared.appplantilla')
 @section('links')
    <link href="{{ asset('demo/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">

  @endsection
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
					<li><a href="{{url('/')}}/noticia"><i class="demo-pli-home"></i></a></li>
					
					<li class="active"  >Noticias</li>
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

				<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">NOTICIAS</strong></p></h3>
					    

					    </div>

					
					    <!--Data Table-->
					    <!--===================================================-->
					    <div class="panel-body" style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
					       <div class="pad-btm form-inline">
					            <div class="row">
					                <div class="col-sm-6 table-toolbar-left">
					                    <button id="btnnuevo" class="btn btn-purple"><i class="demo-pli-add"></i> Nueva </button>
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
					            <table id="myTable" class="table table-striped" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
					                <thead>
					                    <tr>
					                        <th class="text-center">Título</th>
					                        <th>Descripción</th>
					                        <th>Modalidad</th>
					                        <th>Estado</th>
					                        <th class="text-center">Acciones</th>
					                       
					                    </tr>
					                </thead>
					                <tbody>
					                    @forelse($noticias as $noticia)
										<tr id="{{ $noticia->id }}">
											<td align="center">
											 
								                <div class="text-sm text-bold">
								                    {{ strtoupper($noticia->titulo) }}
								                  </div> 
								             
											</td>
											<td align="left"><label class="text-muted text-bold" >{{ $noticia->descripcion }}</label></td>
											<td><label class="text-muted text-bold" > {{ strtoupper($noticia->modalidad) }}</label></td>
											<td ><div class="label label-table bg-mint"><div class="text-sm text-bold">{{ $noticia->estado }}</div></div></td>
											<td align="center">
									{{--<button class="btn btn-mint btn-icon btn-sm"><i class="demo-psi-pen-5 icon-sm"></i></button>
									<button class="btn btn-sm btn-rounded btn-default">Small</button>
									<button class="btn btn-xs btn-rounded btn-default">Extra Small</button>
									--}}
									<button class="btn btn-icon btn-default btn-default btn-xs  btn-hover-mint add-tooltip editarmodal" data-original-title="Editar Registro" data-container="body" data-original-title="Editar" value="{{ $noticia->id }}"><i class="demo-psi-pen-5 icon-sm " ></i> </button>
									<button class="btn btn-icon btn-default btn-xs  btn-hover-info infoModal add-tooltip " data-original-title="Información" data-container="body" data-original-title="Informacion" value="{{ $noticia->id }}"><i class="demo-pli-exclamation icon-sm " ></i> </button>
									
									<button class="btn btn-icon btn-default btn-default btn-xs add-tooltip btn-hover-primary darAlta" data-original-title="Dar Alta" value="{{ $noticia->id }}"><div class="demo-icon"><i class="ion-chevron-up"></i></div> </button>

                  					<button onclick="location.href='{{url('/')}}/noticia/{{$noticia->id}}/interesados'" class="btn btn-icon btn-default btn-default btn-xs  btn-hover-mint add-tooltip " data-original-title="Listado de interesados" data-container="body" value="{{ $noticia->id }}"><i class="pli-student-male-female icon-lg " ></i> </button>
									{{--<button type="button" class="btn btn-outline-info btn-sm infomodal" value="{{ $noticia->id }}">Info</button>--}}
									
												
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
	<div class="modal fade" id="modalIngreso" name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
		<div class="modal-dialog {{--modal-lg--}}">
			<div class="modal-content">

				<!--Modal header-->
				<div class="modal-header alert-primary" id="modalIngresoHeader" >
					<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
					<h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Noticia</label></h4>
				</div>

				<!--Modal body-->
				<div class="modal-body">
					
					
					  <!--  include('noticias.formnoticias')BASIC FORM ELEMENTS -->
					            <!--===================================================-->
					            <form id="form" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
					            	 <input type="hidden" id="form_id" name="form_id" value="0">

					            	
					                <!--Static-->
                                    {{-- csrf_field() --}}
					               
					                <!--Text Input-->
					                <div class="form-group {{--@if($errors->has('titulo')) has-error @endif--}}">
					                    <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Título</label>
					                    <div class="col-md-7">
					                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ingrese titulo"  >
					                        {{--<small class="help-block">This is a help text</small>
					                    --}}
                                        </div>
					                </div>

                                    <!--Textarea-->
                                    <div class="form-group ">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-textarea-input">Descripción</label>
                                        <div class="col-md-7">
                                            <textarea id="descripcion" name="descripcion" rows="4" class="form-control" placeholder="Your content here.."></textarea>
                                        </div>
                                    </div>
				        
                                    <div class="form-group">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Módulo</label>
                                        <div class="col-md-4">
                               <select class="form-control" id="numModulo" name="numModulo" >
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                              <option>4</option>
                                              
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Modalidad</label>
                                         <div class="col-md-5">
                                          <select class="form-control" id="modalidad" name="modalidad">
                                             <option>Sabatino</option>
                                             <option>Intensivo</option>
                                               
                                          </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                     <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Modalidad</label>
                                 <div class="col-md-7">
                                    <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="date" class="form-control" id="fechaFin" name="fechaFin" />
                                                    </div>
                                                    
                                     </div>
                                </div>

                            </div>
                                   {{-- <div class="form-group">
                                     <div class="col-md-10 ui-panels form-group">
                                        <div class=" text-right">
                                            <button class="btn btn-primary" type="button" id="btnGuardar">Nuevo</button>
                                        </div>
                                     </div>
                                 </div>--}}
                                


					            </form>
					            <!--===================================================-->
					            <!-- END BASIC FORM ELEMENTS -->
				</div>

				<!--Modal footer-->
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
					<h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Datos de Noticia</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="table-responsive">
						<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Información</h6>
            			
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
	<!--End INFO Bootstrap Modal-->



@endsection

@section('script')

<script src="{{asset('js/noticia.js')}}"></script>

</script>
@endsection