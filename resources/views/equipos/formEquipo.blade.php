<form class="panel-body form-horizontal form-padding" id="frm" name="frmsocios" action="/socios/create" method="post">
    <input type="hidden" id="form_id" name="form_id" value="0">

    <div class="panel">

        <div class="card-body "></div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-10 ">

            {{-- <div class="row">
        <h6 class="text-main" style="font-weight:bold;">Formulario</h6></div>       --}}
            <div id="nombrediv" class="form-group @if($errors->has('nombre')) has-danger @endif">
                <label for="example-text-input" class="col-md-3 control-label text-main text-bold "> Código: *</label>
                <div class="col-md-7 ">

                    {{-- Token ue genera laravel es obligatorio
            debido a laraevl provee seguridad y da el toen
            para que lo econozca que es nuestro formulario
            {{ csrf_field() }} --}}

                    <input class="form-control" type="text" placeholder="Ingrese codigo de equipo " id="codigo"
                        name="codigo">
                    {{-- @if($errors->has('nombre'))
               @foreach($errors->get('nombre') as $error)--}}
                    <div id="codigofeed" class="form-control-feedback"></div>
                    {{--  @endforeach
            @endif --}}
                </div>
            </div>

            <div id="descripciondiv" class="form-group">
                <label for="example-number-input"
                    class="col-md-3 control-label text-main text-bold ">Descripción:*</label>
                <div class="col-md-7  ">
                    <textarea class="form-control" type="text" id="descripcion" name="descripcion" value=""
                        rows="2"></textarea>
                    <div id="descripcionfeed" class="form-control-feedback"></div>
                </div>
            </div>
            <div id="marcadiv" class="form-group">
                <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Marca:*</label>
                <div class="col-md-7  ">
                    <input class="form-control" type="text" placeholder="Ingrese la marca del equipo" id="marca"
                        name="marca">
                    <div id="marcafeed" class="form-control-feedback"></div>
                </div>
            </div>
            <div id="modelodiv" class="form-group">
                <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Modelo:*</label>
                <div class="col-md-7  ">
                    <input class="form-control" type="text" placeholder="Ingrese Numero de Modelo" id="modelo"
                        name="modelo">
                    <div id="modelofeed" class="form-control-feedback"></div>
                </div>
            </div>
            <div id="telefonodiv" class="form-group">
                <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">N° Serie:*</label>
                <div class="col-md-7  ">
                    <input class="form-control" type="text" placeholder="Ingrese Numero de Serie" id="nserie"
                        name="nserie">
                    <div id="nseriefeed" class="form-control-feedback"></div>
                </div>
            </div>
            <div id="telefonodiv" class="form-group">
                <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Fecha de
                    Adquisición:*</label>
                <div class="col-md-7  ">
                    <input class="form-control" type="date" id="fechaAd" name="fecha">
                    <div id="fechaAdfeed" class="form-control-feedback"></div>
                </div>
            </div>
            <div id="telefonodiv" class="form-group">
                <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Precio: $
                    *</label>
                <div class="col-md-7  ">
                    <input class="form-control" type="text"
                        placeholder="Ingrese el precio de adquisicion, de ser donado ingrese valor 0" id="precio"
                        name="obse">
                    <div id="preciofeed" class="form-control-feedback"></div>
                </div>
            </div>
            <div id="telefonodiv" class="form-group">
                <label for="example-number-input"
                    class="col-md-3 control-label text-main text-bold ">Observación:*</label>
                <div class="col-md-7  ">
                    <input class="form-control" type="text" placeholder="Ingrese alguna observacion sobre el equipo"
                        id="observacion" name="obse">
                    <div id="observacionfeed" class="form-control-feedback"></div>
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
            <input class="form-control " type="date"  placeholder="ejemplo@algo.com" id="email" name="fechaNac">
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



        </div>

    </div>
</form>