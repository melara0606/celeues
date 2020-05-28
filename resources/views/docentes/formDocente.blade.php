<form class="panel-body form-horizontal form-padding" id="frm" name="frmsocios" action="/socios/create" method="post">
         <input type="hidden" id="form_id" name="form_id" value="0">

  <div class="panel" >

     <div class="card-body "></div>
                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-10 ">
                          @if ( count ($errors) > 0 )
                            <div class= "alert alert-danger" >
                              <ul>
                                @<?php foreach ($errors->all() as $error): ?>
                                  <li> {{ $error }}</li>
                                <?php endforeach; ?>
                              </ul>
                            </div>
                          @endif
   {{-- <div class="row">
        <h6 class="text-main" style="font-weight:bold;">Formulario</h6></div>       --}}

    <div  id="nombrediv" class="form-group @if($errors->has('nombre')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> Nombre: *</label>
        <div class="col-md-7 " >

             {{-- Token ue genera laravel es obligatorio
            debido a laraevl provee seguridad y da el toen
            para que lo econozca que es nuestro formulario
            {{ csrf_field() }} --}}

            <input class="form-control" type="text" placeholder="Ingrese nombre docente" id="nombre" name="nombre">
              {{-- @if($errors->has('nombre'))
               @foreach($errors->get('nombre') as $error)--}}
                <div id="nombrefeed" class="form-control-feedback"></div>
              {{--  @endforeach
            @endif --}}
        </div>
    </div>

    <div id="apellidodiv" class="form-group">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Apellido:*</label>
        <div class="col-md-7  ">
            <input class="form-control" type="text" placeholder="Ingrese apellido" id="apellido" name="apellido">
            <div id="apellidofeed" class="form-control-feedback"></div>
        </div>
    </div>
    <div id="emaildiv" class="form-group">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Email:*</label>
        <div class="col-md-7  ">
            <input class="form-control" type="text" placeholder="Ingrese Correo Electronico" id="email" name="email">
            <div id="emailfeed" class="form-control-feedback"></div>
        </div>
    </div>
    <div id="duidiv" class="form-group">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">DUI:*</label>
        <div class="col-md-7  ">
            <input class="form-control" type="text" placeholder="Ingrese Numero de DUI" id="dui" name="dui">
            <div id="duifeed" class="form-control-feedback"></div>
        </div>
    </div>
    <div id="telefonodiv" class="form-group">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Teléfono:*</label>
        <div class="col-md-7  ">
            <input class="form-control" type="text" placeholder="Ingrese Numero de Telefono" id="telefono" name="telefono">
            <div id="telefonofeed" class="form-control-feedback"></div>
        </div>
    </div>

    <div id="generodiv" class="form-group">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Género*</label>
        <div class="col-md-7  ">
            <select class="col-md-7 form-control" name="genero" id="genero">
              <option value="0">MASCULINO</option>
              <option value="1">FEMENINO</option>
            </select>
            <div id="generofeed" class="form-control-feedback"></div>
        </div>
    </div>

    {{-- <div id="apellidodiv" class="form-group">
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold ">Apellido: *</label>
        <div class="col-md-7">
            <input class="form-control" type="text" value="" id="apellido" name="apellido">
            <div id="apellidofeed" class="form-control-feedback"></div>
        </div>
    </div>
    <div id="fechaNacdiv" class="form-group">
        <label for="example-date-input" class="col-md-3 control-label text-main text-bold">Email: *</label>
        <div class="col-md-7">
            <input class="form-control " type="date"  placeholder="ejemplo@algo.com" id="fechaNac" name="fechaNac">
            <div id="fechaNacfeed" class="form-control-feedback"></div>

        </div>
    </div>
    <div id="duidiv" class="form-group row">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold">DUI: *</label>
        <div class="col-md-7">
            <input class="form-control" type="text"  id="dui" name="dui">
            <div id="duifeed" class="form-control-feedback"></div>
        </div>
    </div>

      <div id="telefonodiv" class="form-group row">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold">Teléfono</label>
        <div class="col-md-7 ">
            <input class="form-control" type="number"  id="telefono" name="telefono">
            <div id="telefonofeed" class="form-control-feedback"></div>
        </div>
    </div>--}}
    <div id="nitdiv" class="form-group row">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold">NIT: *</label>
        <div class="col-md-7">
            <input class="form-control" type="text" placeholder="9999-999999-999-9"  id="nit" name="nit">
            <div id="nitfeed" class="form-control-feedback"></div>
        </div>
    </div>
<br>
    <div id="ncuentadiv" class="form-group row">
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold">N Cuenta: *</label>
        <div class="col-md-7">
            <input class="form-control" type="text"  id="ncuenta" name="ncuenta">
            <div id="ncuentafeed" class="form-control-feedback"></div>
        </div>
    </div>

    </div><!--=Fincol 10=-->

</div>
</form>
