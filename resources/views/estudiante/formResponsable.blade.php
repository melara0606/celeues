
<!-- BASIC FORM ELEMENTS -->
<!--===================================================-->
<form id="formResp" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
   <input type="hidden" id="form_idR" name="form_idR" value="0">

  
    <!--Static-->
              {{-- csrf_field() --}}
   
    <!--Text Input-->
    
   <div  id="nombreRdiv" class="form-group @if($errors->has('nombre')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> Nombre*</label>
        <div class="col-md-7 " >
     <input class="form-control" type="text" placeholder="Ingrese nombre" id="nombreR" name="nombreR">
                  <div id="nombreRfeed" class="form-control-feedback"></div>
             </div>
    </div>
    <div  id="apellidoRdiv" class="form-group @if($errors->has('apellido')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> Apellido*</label>
        <div class="col-md-7 " >
     <input class="form-control" type="text" placeholder="Ingrese apellido" id="apellidoR" name="apellidoR">
                  <div id="apellidoRfeed" class="form-control-feedback"></div>
             </div>
    </div>

  <div  id="duiRdiv" class="form-group @if($errors->has('apellido')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> DUI*</label>
        <div class="col-md-5 " >
     <input class="form-control" type="text" placeholder="" id="duiR" name="duiR">
                  <div id="duiRfeed" class="form-control-feedback"></div>
             </div>
    </div>

      
       <!--Text Input-->
      <div class="form-group @if($errors->has('titulo')) has-error @endif">
          <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Teléfono*</label>
          <div class="col-md-5">
              <input type="number" id="telefonoR" name="telefonoR" class="form-control" placeholder="####-####"  >
              {{--<small class="help-block">This is a help text</small>
          --}}
          </div>
      </div>
      <div  id="emailRdiv" class="form-group @if($errors->has('apellido')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold ">Email</label>
        <div class="col-md-7 " >
     <input class="form-control" type="email" placeholder="" id="emailR" name="emailR">
                  <div id="emailRfeed" class="form-control-feedback"></div>
             </div>
    </div>
    <div id="direccionRdiv" class="form-group">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Dirección*</label>
        <div class="col-md-7  ">
            <textarea class="form-control" type="text" id="direccionR" name="direccionR" value="mi casa" rows="2"></textarea>
            <div id="direccionRfeed" class="form-control-feedback"></div>                   
        </div>
    </div>     
            {{--  <div class="form-group">
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

          </div>--}}
             


</form>
<!--===================================================-->
<!-- END BASIC FORM ELEMENTS -->
