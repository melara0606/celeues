<div class="tab-base " {{--style="height: 10px"--}}>
  <div class="tab-content " {{--style="background-color: #eeeeee"--}}>
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" >
      <li class="active" style="border: 1px solid lightgray;border-bottom: 0px " id="pestEst"><a href="#demo-bsc-tab-1" data-toggle="tab" aria-expanded="true">Estudiante</a></li>
      
      <li class="" style="display: none;border: 1px solid lightgray;border-bottom: 0px;border-left: 0px" id="pestMenorEdad"><a href="#demo-bsc-tab-2" data-toggle="tab" aria-expanded="false">Responsable</a></li>
      
    </ul> 

    <!-- Tab1 -->
    <!--===================================================-->
    <div class="tab-pane pad-btm fade active in " id="demo-bsc-tab-1"> 
     <div class="bord-top"> 


      <!-- BASIC FORM ELEMENTS -->
      <!--===================================================-->
      <form id="form" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
        <input type="hidden" id="form_id" name="form_id" value="0">

        
        <!--Static-->
        {{-- csrf_field() --}}
        
        <!--Text Input-->

        <div  id="nombrediv" class="form-group @if($errors->has('nombre')) has-danger @endif" >
          <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> Nombre*</label>
          <div class="col-md-7 " >
           <input class="form-control" type="text" placeholder="Ingrese nombre de estudiante" id="nombre" name="nombre">
           <div id="nombrefeed" class="form-control-feedback"></div>
         </div>
       </div>
       <div  id="apellidodiv" class="form-group @if($errors->has('apellido')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> Apellido*</label>
        <div class="col-md-7 " >
         <input class="form-control" type="text" placeholder="Ingrese apellido de estudiante" id="apellido" name="apellido">
         <div id="apellidofeed" class="form-control-feedback"></div>
       </div>
     </div>

     

     <div class="form-group">
      <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Género*</label>
      <div class="col-md-5">
        <select class="form-control" id="genero" name="genero" >
          <option value="MASCULINO">Masculino</option>
          <option value="FEMENINO">Femenino</option>
          
        </select>
      </div>
    </div>
    <div class="form-group">
     <label class="col-md-3 control-label text-main text-bold"  for="demo-email-input">Fecha Nacimiento*</label>
     <div class="col-md-5">
       <input type="date" class="form-control" id="fechaNac" name="fechaNac" />
       
       
       
     </div>

   </div>
   <div style="display: none;" class="form-group">
     <label class="col-md-3 control-label text-main text-bold"  for="demo-email-input">Edad*</label>
     <div class="col-md-5">
       <input type="text" class="form-control" id="edad" name="edad" />
       
       
       
     </div>

   </div>
   
   <div style="display: none;" id="menorEdad">{{-- esta para menores de edad --}}
    <div class="form-group">
      <label for="example-email-input" class="col-md-3 control-label text-main text-bold ">Responsable:*</label>
      <div class="col-md-5">
        <select  class="" id="resp_id" name="resp_id" >
         
        </select>
        
        
      </div>
      <div class="col-md-1">

        <button type="button" class="btn btn-icon btn-default btn-default btn-sm  btn-hover-info add-tooltip infoResp" data-original-title="Informacion de Responsable" data-container="body" ><i class="demo-pli-exclamation icon-sm " ></i> Info </button>

      </div>
      <div class="col-md-1">

        <button type="button" class="btn btn-icon btn-default btn-default btn-sm  btn-hover-purple add-tooltip nuevoResp" data-original-title="Informacion de Responsable" data-container="body" ><i class="demo-pli-add icon-sm " ></i> Nuevo </button>
      </div>
      
      

    </div>
    <div class="row" id="divcollapseResponsable" style="display:none ">
         <label  class="col-md-3 col-sm-12 control-label text-main text-bold ">Visualizar:</label>
          
         <div class=" col-md-5 col-sm-12">
          <div class="panel panel-default" >
          <div class="panel-heading " style="height: 35px; border: 1px solid #ccc;">
              <div style="display: inline-block;width: 100%;margin-top: 8px">
                  
                <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-sm text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="font-size: 13px; " >Informacion Responsable</strong></p></h4>
                
              <h4 class="panel-title text-sm" align="right" style="float: right;" >
                
                <a data-toggle="collapse" href="#collapse1" class="colapOne" ><div class="demo-icon"><i class="ion-chevron-down"></i></div></a>
              </h4>
            </div>
          </div>
          <div id="collapse1" class="panel-collapse collapse" style="border-bottom: 1px solid #ccc;">
             <div class="table-responsive">
                        
                  <table   class="table {{--table-bordered--}} table-striped table-sm ">
                            <tbody id="tablainfoResp">
                              <tr>
                              <td>dcdc</td> 
                              </tr>
                            </tbody>
                  </table>
                <!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>-->
            </div>
          </div>
      </div>   
      </div>
    </div>

  </div>
  <div style="display: none;" id="mayorEdad">
    <div  id="duidiv" class="form-group @if($errors->has('apellido')) has-danger @endif" >
      <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> DUI</label>
      <div class="col-md-5 " >
       <input class="form-control" type="text" placeholder="" id="dui" name="dui">
       <div id="duifeed" class="form-control-feedback"></div>
     </div>
   </div>
 </div>

 
 <!--Text Input-->
 <div class="form-group @if($errors->has('titulo')) has-error @endif">
  <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Teléfono*</label>
  <div class="col-md-5">
    <input type="number" id="telefono" name="telefono" class="form-control" placeholder="####-####"  >
    {{--<small class="help-block">This is a help text</small>
    --}}
  </div>
</div>
<div  id="emaildiv" class="form-group @if($errors->has('apellido')) has-danger @endif" >
  <label for="example-text-input" class="col-md-3 control-label text-main text-bold ">Email*</label>
  <div class="col-md-7 " >
   <input class="form-control" type="email" placeholder="" id="email" name="email">
   <div id="emailfeed" class="form-control-feedback"></div>
 </div>

</div>



<div id="direcciondiv" class="form-group">
  <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Dirección*</label>
  <div class="col-md-7  ">
    <textarea class="form-control" type="text" id="direccion" name="direccion" value="mi casa" rows="2"></textarea>
    <div id="direccionfeed" class="form-control-feedback"></div>                   
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
</div>
</div>
<!--===================================================-->
<!-- END tab1 -->

<!-- Tab2 -->
<!--===================================================-->
<div class="tab-pane pad-btm fade" id="demo-bsc-tab-2"> 
 <div class="bord-top"> 
  @include('estudiante.formResponsable')

</div>
<div class="panel-footer clearfix">
  <div class="col-lg-7 col-lg-offset-3">
    <button class="btn btn-mint" name="signup" id="guardarResp" name="guardarResp" value="add" >Guardar</button>
  </div>
</div>

</div>
<!--===================================================-->
<!-- END tab2 -->

</div>
<!--===================================================-->
<!-- END tabcontent -->

</div>
<!-- END tabbase -->


{{--<div class="tab-base">
  
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#demo-bsc-tab-1" data-toggle="tab" aria-expanded="true">Information</a></li>
    <li class=""><a href="#demo-bsc-tab-2" data-toggle="tab" aria-expanded="false">Address</a></li>
  </ul>
  
  <!-- Tabs Content -->
  <form id="demo-bv-bsc-tabs" class="form-horizontal bv-form" action="#" method="post" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
    <div class="tab-content">
      <div class="tab-pane pad-btm fade active in" id="demo-bsc-tab-1">
        <p class="text-main text-bold">First Tab</p>
        <hr>
        <div class="form-group has-feedback">
          <label class="col-lg-3 control-label">Full name</label>
          <div class="col-lg-7">
            <input type="text" class="form-control" name="fullName" placeholder="Full name" data-bv-field="fullName"><i class="form-control-feedback" data-bv-icon-for="fullName" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="fullName" data-bv-result="NOT_VALIDATED" style="display: none;">The full name is required</small></div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">Company</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="company" placeholder="Company" data-bv-field="company"><i class="form-control-feedback" data-bv-icon-for="company" style="display: none;"></i>
              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="company" data-bv-result="NOT_VALIDATED" style="display: none;">The company name is required</small></div>
            </div>
            <div class="form-group has-feedback">
              <label class="col-lg-3 control-label">Member Type</label>
              <div class="col-lg-7">
                <div class="radio">
                  <input id="demo-radio-1" class="magic-radio" type="radio" name="memberType" value="free" data-bv-field="memberType">
                  <label for="demo-radio-1">Free</label>
                  
                  <input id="demo-radio-2" class="magic-radio" type="radio" name="memberType" value="personal" data-bv-field="memberType">
                  <label for="demo-radio-2">Personal</label>
                  
                  <input id="demo-radio-3" class="magic-radio" type="radio" name="memberType" value="bussines" data-bv-field="memberType">
                  <label for="demo-radio-3">Bussiness</label>
                </div><i class="form-control-feedback" data-bv-icon-for="memberType" style="display: none;"></i>
                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="memberType" data-bv-result="NOT_VALIDATED" style="display: none;">Please choose the membership type that best meets your needs</small></div>
              </div>
            </div>
            <div class="tab-pane fade" id="demo-bsc-tab-2">
              <p class="text-main text-bold">Second Tab</p>
              <hr>
              <div class="form-group has-feedback">
                <label class="col-lg-3 control-label">Address</label>
                <div class="col-lg-7">
                  <input type="text" class="form-control" name="address" placeholder="Address" data-bv-field="address"><i class="form-control-feedback" data-bv-icon-for="address" style="display: none;"></i>
                  <small class="help-block" data-bv-validator="notEmpty" data-bv-for="address" data-bv-result="NOT_VALIDATED" style="display: none;">The address is required</small></div>
                </div>
                <div class="form-group has-feedback">
                  <label class="col-lg-3 control-label">City</label>
                  <div class="col-lg-7">
                    <input type="text" class="form-control" name="city" placeholder="City" data-bv-field="city"><i class="form-control-feedback" data-bv-icon-for="city" style="display: none;"></i>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="city" data-bv-result="NOT_VALIDATED" style="display: none;">The city is required</small></div>
                  </div>
                </div>
                <div class="tab-footer clearfix">
                  <div class="col-lg-7 col-lg-offset-3">
                    <button type="submit" class="btn btn-primary">Validate</button>
                  </div>
                </div>
              </div>
            </form>
          </div> --}}