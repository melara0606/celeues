  <!-- BASIC FORM ELEMENTS -->
					            <!--===================================================-->
					            <form id="form" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
					            	 <input type="hidden" id="form_id" name="form_id" value="0">

					            	
					                <!--Static-->
                                    {{-- csrf_field() --}}
					               
					                <!--Text Input-->
					                <div class="form-group {{--@if($errors->has('titulo')) has-error @endif--}}">
					                    <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Titulo</label>
					                    <div class="col-md-7">
					                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ingrese titulo"  >
					                        {{--<small class="help-block">This is a help text</small>
					                    --}}
                                        </div>
					                </div>

                                    <!--Textarea-->
                                    <div class="form-group ">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-textarea-input">Descripcion</label>
                                        <div class="col-md-7">
                                            <textarea id="descripcion" name="descripcion" rows="4" class="form-control" placeholder="Your content here.."></textarea>
                                        </div>
                                    </div>
				        
                                    <div class="form-group">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Modulo</label>
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