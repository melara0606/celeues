@extends('layouts.shared.apppantilla')

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->

              <div id="page-head">
              	@if($estado==2){
                    {{ $datos }}
              	}@endif
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
					<li class="active">Ingresar Noticias</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
       
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content" >
                   
					<div class="row ">
						
    <div id="msjshow" name="msjshow" style="display: none"  class="alert alert-success col-md-5 " >
 <strong>Well done!</strong> You successfully read this important alert message.
   </div>

                        <div class="card-body "></div>
                        {{----}}<div class="col-lg-1">

                        </div>
                        <div class="col-lg-10 ">
					        <div class="panel" >
					            <div class="panel-heading bg-mint">
					                <h3 class="panel-title">Nueva Noticia</h3>
					            </div>
					 <div class="bord-all">
                       
					
					            <!-- BASIC FORM ELEMENTS -->
					            <!--===================================================-->
					            <form id="form" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
					            	
					                <!--Static-->
                                    {{-- csrf_field() --}}
					                <div class="form-group" style="display: none">
					                    <label class="col-md-3 control-label text-main text-bold">Static</label>
					                    <div class="col-md-7"><p class="form-control-static">Username</p></div>
					                </div>
                                    <br>
					
					                <!--Text Input-->
					                <div class="form-group @if($errors->has('titulo')) has-error @endif">
					                    <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Título</label>
					                    <div class="col-md-7">
					                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ingrese titulo"  >
					                        {{--<small class="help-block">This is a help text</small>
					                    --}}
                                        </div>
					                </div>

                                    <!--Textarea-->
                                    <div class="form-group has-success">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-textarea-input">Descripción</label>
                                        <div class="col-md-7">
                                            <textarea id="descripcion" name="descripcion" rows="4" class="form-control" placeholder="Your content here.."></textarea>
                                        </div>
                                    </div>
				        {{--
					                <!--Email Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label " for="demo-email-input">Email Input</label>
					                    <div class="col-md-9">
					                        <input type="email" id="demo-email-input" class="form-control" placeholder="Enter your email">
					                        <small class="help-block">Please enter your email</small>
					                    </div>
					                </div>
					--}}
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
                                    <div class="form-group">
                                     <div class="col-md-10 ui-panels form-group">
                                        <div class=" text-right">
                                            <button class="btn btn-primary" type="button" id="btnGuardar">Nuevo</button>
                                        </div>
                                     </div>
                                 </div>
                                


					         {{--       <!--Password-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-password-input">Password</label>
					                    <div class="col-md-9">
					                        <input type="password" id="demo-password-input" class="form-control" placeholder="Password">
					                        <small class="help-block">Please enter password</small>
					                    </div>
					                </div>
					
					                <!--Readonly Input-->
					                <div class="form-group">
					                    <label class="col-md-3 control-label" for="demo-readonly-input">Readonly input</label>
					                    <div class="col-md-9">
					                        <input type="text" id="demo-readonly-input" class="form-control" placeholder="Readonly input here..." readonly>
					                    </div>
					                </div>
										               					
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Radio Buttons</label>
					                    <div class="col-md-9">
					
					                        <!-- Radio Buttons -->
					                        <div class="radio">
					                            <input id="demo-form-radio" class="magic-radio" type="radio" name="form-radio-button" checked>
					                            <label for="demo-form-radio">Option 1 (pre-checked)</label>
					                        </div>
					                        <div class="radio">
					                            <input id="demo-form-radio-2" class="magic-radio" type="radio" name="form-radio-button">
					                            <label for="demo-form-radio-2">Option 2</label>
					                        </div>
					                        <div class="radio">
					                            <input id="demo-form-radio-3" class="magic-radio" type="radio" name="form-radio-button">
					                            <label for="demo-form-radio-3">Option 2</label>
					                        </div>
					
					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Inline Radio buttons</label>
					                    <div class="col-md-9">
					                        <div class="radio">
					
					                            <!-- Inline radio buttons -->
					                            <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="inline-form-radio" checked>
					                            <label for="demo-inline-form-radio">Option 1 (pre-checked)</label>
					
					                            <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="inline-form-radio">
					                            <label for="demo-inline-form-radio-2">Option 2</label>
					
					                            <input id="demo-inline-form-radio-3" class="magic-radio" type="radio" name="inline-form-radio">
					                            <label for="demo-inline-form-radio-3">Option 3</label>
					
					
					                        </div>
					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Checkboxes</label>
					                    <div class="col-md-9">
					
					                        <!-- Checkboxes -->
					                        <div class="checkbox">
					                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" checked>
					                            <label for="demo-form-checkbox">Option 1 (pre-checked)</label>
					                        </div>
					
					                        <div class="checkbox">
					                            <input id="demo-form-checkbox-2" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-checkbox-2">Option 2</label>
					                        </div>
					
					                        <div class="checkbox">
					                            <input id="demo-form-checkbox-3" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-checkbox-3">Option 3</label>
					                        </div>
					
					
					                    </div>
					                </div>
					                <div class="form-group pad-ver">
					                    <label class="col-md-3 control-label">Inline Checkboxes</label>
					                    <div class="col-md-9">
					                        <div class="checkbox">
					
					                            <!-- Inline Checkboxes -->
					                            <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" checked>
					                            <label for="demo-form-inline-checkbox">Option 1 (pre-checked)</label>
					
					                            <input id="demo-form-inline-checkbox-2" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-inline-checkbox-2">Option 2</label>
					
					                            <input id="demo-form-inline-checkbox-3" class="magic-checkbox" type="checkbox">
					                            <label for="demo-form-inline-checkbox-3">Option 3</label>
					
					                        </div>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <label class="col-md-3 control-label">File input</label>
					                    <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        Browse... <input type="file">
					                        </span>
					                    </div>
					                </div>
                                    --}}
					            </form>
					            <!--===================================================-->
					            <!-- END BASIC FORM ELEMENTS -->
	</div>				
					
					        </div>
					    </div>

                </div>
                <!--===================================================-->
                <!--End page content-->

   <br><br><br>       
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

@endsection

@section('script')

<script src="{{ asset('js/noticia.js') }}"></script>
@endsection