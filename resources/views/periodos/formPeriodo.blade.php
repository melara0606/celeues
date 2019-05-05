<form class="panel-body form-horizontal form-padding" id="frm" name="frmsocios" action="/socios/create" method="post">
         <input type="hidden" id="form_id" name="form_id" value="0">

  <div class="panel" >

     <div class="card-body "></div>
                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-10 ">

   {{-- <div class="row">
        <h6 class="text-main" style="font-weight:bold;">Formulario</h6></div>       --}}
        <div id="anhdiv" class="form-group">
            <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Año:*</label>
            <div class="col-md-7  ">
              <select class="form-control" id="anho" name="anho" >
                  <option value="2019 ">2019</option>
                  <option value="2020 ">2020</option>
                  <option value="2021 ">2021</option>
                  <option value="2022 ">2022</option>
                  <option value="2023 ">2023</option>
                  <option value="2024 ">2024</option>
                  <option value="2025 ">2025</option>
              </select>
              <div id="añofeed" class="form-control-feedback"></div>
            </div>
            </div>
    <div  id="nperiododiv" class="form-group @if($errors->has('nperiodo')) has-danger @endif" >
        <label for="example-text-input" class="col-md-3 control-label text-main text-bold ">Periodo:*</label>

        <div class="col-md-7">
          <select class="form-control" id="nperiodo" name="nperiodo" >
              <option value="5">Normal 5 periodos</option>
              <option value="10">Intensivo 10 periodos</option>
          </select>
      <div id="periodofeed" class="form-control-feedback"></div>
    </div>

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
        <label for="example-date-input" class="col-md-3 control-label text-main text-bold">Fecha Ingreso: *</label>
        <div class="col-md-7">
            <input class="form-control " type="date"  id="fechaNac" name="fechaNac">
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
        <label for="example-number-input" class="col-md-3 control-label text-main text-bold">Telefono</label>
        <div class="col-md-7 ">
            <input class="form-control" type="number"  id="telefono" name="telefono">
            <div id="telefonofeed" class="form-control-feedback"></div>
        </div>
    </div>--}}
    </div><!--=Fincol 10=-->


</form>
