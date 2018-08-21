<!-- BASIC FORM ELEMENTS -->
<!--===================================================-->
<form id="form" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
	 <input type="hidden" id="form_id" name="form_id" value="0">

	
    <!--Static-->
              {{-- csrf_field() --}}
   
    <!--Text Input-->
    <div class="form-group @if($errors->has('titulo')) has-error @endif">
        <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Nombre*</label>
        <div class="col-md-7">
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese titulo"  >
            {{--<small class="help-block">This is a help text</small>
        --}}
                  </div>
    </div>

              <!--Textarea-->
              <div class="form-group">
                  <label class="col-md-3 control-label text-main text-bold" for="demo-textarea-input">Descripcion</label>
                  <div class="col-md-7">
                      <textarea id="descripcion" name="descripcion" rows="4" class="form-control" placeholder="Your content here.."></textarea>
                  </div>
              </div>

             
              <div class="form-group">
               <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Rango edades*</label>
           <div class="col-md-7">
              <div id="demo-dp-range">
                              <div class="input-daterange input-group" id="datepicker">
                                  <input type="number" class="form-control" id="edadInicio" name="edadInicio" />
                                  <span class="input-group-addon">a</span>
                                  <input type="number" class="form-control" id="edadFin" name="edadFin" />
                              </div>
                              
               </div>
          </div>

          </div>
             


</form>
<!--===================================================-->
<!-- END BASIC FORM ELEMENTS -->