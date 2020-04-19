@extends('layouts.shared.appplantilla')

@section('content')

<style type="text/css">

</style>

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
    <ul class="breadcrumb">
      <li><a href=""><i class="demo-pli-home"></i></a></li>
      <li><a href="">Tareas Comunes</a></li>
      <li class=""><a href="{{url('/')}}/periodo">Periodo</a></li>
    </ul>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

  </div>

<!--Page content-->
<!--===================================================-->
<div id="page-content" >

  <!--Row Main Left COL-MD -->
  <!--===================================================-->
  <div class="row col-md-3">
    <div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
      <div class="panel-body ">
        <div class="panel-heading ">
          <h4>Filtrar	</h4>
        </div>



        <input class="" type="text" id="year" name="year" value="{{$selectYear}}" hidden="true">
        <input class="" type="text" id="hiddenPeriodo" name="hiddenPeriodo" value="{{$selectPeriodo}}" hidden="true">
        <div class="row col-sm-12">
          <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Año:*</label>
          <div class="col-md-7  ">
            <select class="form-control" id="anhofiltro" name="anhofiltro" >
              @forelse($anhos as $anho)
              <option value="{{$anho->anho}}">{{$anho->anho}}</option>
@empty
              @endforelse
            </select>
            <div id="anhofeed" class="form-control-feedback"></div>
          </div>
        <div class="row">

        </div>
        <br>
        <hr>

        <div class="row col-sm-12">
          <label for="example-text-input" class="col-md-3 control-label text-main text-bold ">Periodo:*</label>
          <select class="form-control" id="nperiodofiltro" name="nperiodofiltro" >
              <option value="5">5 periodos</option>
              <option value="10">10 periodos</option>
          </select>
      <div id="periodofeed" class="form-control-feedback"></div>
        </div>
        <div class="row">

        </div>
        <br>
        <div class="row">

        </div>
        <br>
        <div class="row col-sm-12" align="right">
          <button class="btn btn-default btn-mint filtrar"  value="" type="button">Filtrar</button>

        </div>
        <br>
        <div class="row">

        </div>
        <br>

        {{--<div class="row col-md-12 btn-group-vertical mar-rgt" >
                <button class="btn btn-default btn-mint">Anho</button>

                <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle btn-active-success" data-toggle="dropdown" aria-expanded="false">
                            Dropdown <i class="dropdown-caret"></i>
                        </button>
                        <ul class="dropdown-menu" style="">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-default btn-active-primary">Middle</button>
                <button class="btn btn-default btn-active-primary">Bottom</button>
        </div>
        <div class="row">

        </div>
        <br>
        <hr>

        --}}
      </div><!--End Panel Body -->
    </div><!--End Pannel -->
    <hr>
  </div>
</div>
  <!--End Main Left Row COL-MD -->
  <!--===================================================-->


  <!--Row Main Right COL-MD -->
  <!--===================================================-->
  <div class="row col-md-9">
    <!--Main Panel-->
    <!--===================================================-->
    <div class="panel" id="panelReload" name="panelReload" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

      <div class="panel-heading " style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
        <div class="panel-control ">
          <!--<button id="nuevoModal" class="btn btn-default btn-active-primary" ><i class="demo-pli-pen-5"></i></button>
          <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
          -->
          <div class="">
            <button autocomplete="off" type="button" name="refresh" id="refresh" data-target="#panelReload" ></button>
          </div>
        </div>
        
          <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">PERIODOS</strong></p></h3>

      </div>

      <!--Panel Body-->
      <!--===================================================-->
      <div class="panel-body " style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
        {{----}}<div class="pad-btm form-inline">
          <div class="row">
            <div class="col-sm-6 table-toolbar-left">
              <button id="btnnuevo" class="btn btn-purple btn-sm"><i class="demo-pli-add"></i> Nuevo</button>
              <button class="btn btn-default btn-sm imprimir"><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
              {{--<div class="btn-group">
                <button class="btn btn-default"><i class="demo-pli-exclamation"></i>
                </button>
                <button class="btn btn-default"><i class="demo-pli-recycling"></i>
                </button>
              </div>--}}
            </div>
            <div class="col-sm-6 table-toolbar-right">
              <!--<div class="form-group">
                <input id="demo-input-search2" type="text" placeholder="Buscar" class="form-control" autocomplete="off">
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
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
              </div>
            </div>-->
          </div>
        </div>

  <!--===================================================-->
  <!--	MENSAJE FLOTANTE -->
  <!--
  <div id="floating-top-right" class="floating-container">
  <div class="alert alert-mint" style="display: none;" id="msjshow">
    <button class="close" data-dismiss="alert">
      <i class="pci-cross pci-circle"></i>
    </button><strong>Heads up!</strong> This alert needs your attention, but it's not super important.
  </div>

  </div>-->

  <!--===================================================-->
  <!--End mensajeflotante-->

        <div class=" table-responsive">
          <table class="table table-striped row-border">
            <thead>
              <tr>
                <th class="text-center">#</th>

                <th class="text-center">Periodo</th>

                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Inicio de Pago</th>
                <th>Fin de Pago</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acciones</th>

              </tr>
            </thead>
            <tbody  id="myTable">
              <div style="display: none;">{{ $correlativo=1 }}</div>
              @forelse($periodos as $periodo)
              <tr id="{{ $periodo->id }}">
                <td align="center">{{ $correlativo++ }}</td>
                <td align="Center">Periodo {{ $periodo->numPeriodo }}-{{ $periodo->anho }}</td>

                <td >{{ $periodo->fechaIni }}</td>
                <td >{{ $periodo->fechaFin }}</td>
                <td >{{ $periodo->iniPago }}</td>
                <td >{{ $periodo->finPago }}</td>
                @if($periodo->estado=='ACTIVO')
                <td align="center">
                 
                <div class="label label-table bg-mint">
                    <div class="text-xs text-bold">
                      {{ $periodo->estado }}  
                    </div>
                  </div>
                @endif
                @if($periodo->estado=='INACTIVO')
                <td align="center">
                  <div class="label label-table bg-gray">
                    <div class="text-xs text-bold">
                      {{ $periodo->estado }}
                    </div>
                  </div>
                  </td>
                @endif

                <td align="center">
                  {{--<button class="btn btn-mint btn-icon btn-xs"><i class="demo-psi-pen-5 icon-sm"></i></button>
                  <button class="btn btn-sm btn-rounded btn-default">Small</button>
                  <button class="btn btn-xs btn-rounded btn-default">Extra Small</button>
                  --}}
                  <button class="btn btn-icon {{--btn-trans--}} btn-default btn-xs  add-tooltip editarmodal" data-original-title="Editar Fechas" data-container="body" value="{{ $periodo->id }}"><i class="demo-psi-pen-5 icon-sm " ></i> </button>
                  <button class="btn btn-icon {{--btn-trans--}} btn-default btn-xs  infoModal add-tooltip " data-original-title="Información" data-container="body" value="{{ $periodo->id }}"><i class="demo-pli-exclamation icon-sm " ></i> </button>
                  @if($periodo->estado=='ACTIVO')
                  <button class="btn btn-icon {{--btn-trans--}} btn-default btn-xs   darbaja" value="{{ $periodo->id }}"><div class="demo-icon"><i class="ion-chevron-down"></i><span> </span></div> </button>
                  @endif
                  @if($periodo->estado=='INACTIVO')
                  <button class="btn btn-icon {{--btn-trans--}} btn-default btn-xs   darAlta" value="{{ $periodo->id }}"><div class="demo-icon"><i class="ion-chevron-up"></i><span> </span></div> </button>
                  @endif
                  {{--<button type="button" class="btn btn-outline-info btn-sm infomodal" value="{{ $periodo->id }}">Info</button>--}}


                <!--	{{--<button class="btn btn-default btn-sm btn-circle"><i class="btn btn-icon demo-pli-pen-5 icon-lg add-tooltip" data-original-title="Edit Post" data-container="body"></i></button>

                  <button class="btn btn-lg btn-default btn-hover-warning">Hover Me!</button>
                  <div class="demo-icon"><i class="demo-pli-internet-explorer"></i></div>
                  <a href="#" <a href="#" class="btn btn-icon demo-pli-pen-5 icon-lg add-tooltip" data-original-title="Edit Post" data-container="body"></a>--}}-->
                </td>

              </tr>

              @empty
              <p>No hay mensajes destacados</p>
              @endforelse

            </tbody>

          </table>
          
              <hr>
        </div>
      </div>
      <!--===================================================-->
      <!--End Data Table-->
    </div>
      <!--End Panel Body-->
      <!--===================================================-->

    </div>
    <!--End Main Panel-->
    <!--===================================================-->

  </div>
  <!--End Main Right COL-MD-->
  <!--===================================================-->



<!--</div> No se por que si lo pongo se me hace feo el disenho del footer===================================================-->
<!--End page content-->






<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="modalIngreso" name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog {{--modal-lg--}}">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header alert-primary" id="modalIngresoHeader" >
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar periodo</label></h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">
        {{--  <p class="text-semibold text-main">Bootstrap Modal Vertical Alignment Center</p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        <br>
        <p class="text-semibold text-main">Popover in a modal</p>
        <p>This
          <button class="btn btn-sm btn-warning demo-modal-popover add-popover" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="Popover Title">button</button>
          should trigger a popover on click.
        </p>
        <br>
        <p class="text-semibold text-main">Tooltips in a modal</p>
        <p>
          <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">This link</a> and
          <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">that link</a> should have tooltips on hover.
        </p>
        --}}
        @include('periodos.formPeriodo')
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
        <h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Datos de Periodo</h4>
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
<!--End Large Bootstrap Modal-->


<!--DarBaja y Alta Bootstrap Modal-->
<!--===================================================-->
<div id="modalMsj" class="modal fade" tabindex="-1">
  <div class="modal-dialog {{--modal-lg--}}">
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title" style="color: white;" id="modalMsjLabel">Alerta</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          <h4 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
        <p>¿Esta seguro de continuar con la accion?.</p></h4>
                {{-- Este funciona para darle valor del id para dar baja o alta--}}
         <form>
         <input type="hidden" class="form-control" type="text"  id="estadoAB" name="estadoAB">
          <input type="hidden" class="form-control" type="text"  id="registro_id" name="registro_id">
          </form>
        </div>
      </div>
      <!--Modal footer-->
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
        <button class="btn btn-danger" id="btnGuardarMsj">Continuar</button>
      </div>
    </div>
  </div>
</div>
<!--===================================================-->
<!--End DarBaja y Alta Bootstrap Modal-->


<!--Default Bootstrap Modal Ingresar Fechas-->
<!--===================================================-->
<div class="modal fade" id="modalFechas" name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog {{--modal-lg--}}">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header alert-mint" id="modalFechasHeader" >
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title" style="color: white;" id="modalFechasLabel"><label>Modificar Fechas</label></h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">
        <form class="" action="" method="post">
<br>
          <div id="" class="row form-group">
            <div class="col-md-1">

            </div>
              <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Fecha Inicio:*</label>
              <div class="col-md-6">
                  <input class="form-control" type="date" id="fechaIniModal" name="fechaIniModal">
                  <div id="" class="form-control-feedback"></div>
              </div>

          </div>
          <br>
          <div id="" class="row form-group">
            <div class="col-md-1">

            </div>
            <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Fecha Fin:*</label>
            <div class="col-md-6">
                <input class="form-control" type="date" id="fechaFinModal" name="fechaFinModal">
                <div id="" class="form-control-feedback"></div>
            </div>

          </div>
          <br>
          <div id="" class="row form-group">
            <div class="col-md-1">

            </div>
            <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Pago Inicio:*</label>
            <div class="col-md-6">
                <input class="form-control" type="date" id="iniPagoModal" name="iniPagoModal">
                <div id="" class="form-control-feedback"></div>
            </div>

          </div>
          <br>
          <div id="" class="row form-group">
            <div class="col-md-1">

            </div>
            <label for="example-number-input" class="col-md-3 control-label text-main text-bold ">Pago Fin:*</label>
            <div class="col-md-6">
                <input class="form-control" type="date" id="finPagoModal" name="finPagoModal">
                <div id="" class="form-control-feedback"></div>
            </div>

          </div>
          <br>

        </form>
      </div>

      <!--Modal footer-->
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
        <button class="btn btn-mint" id="btnGuardarFechas">Guardar </button>
      </div>
    </div>
  </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->




@endsection

@section('script')
<script src="{{asset('js/periodo.js')}}"></script>
{{--<script src="{{asset('js/curso.js')}}"></script>
<script src="{{asset('js/jquery.easyPaginate.js')}}"></script>

<script src="{{asset('js/jquery.snippet.min.js')}}"></script>
--}}<script type="text/javascript">
   $(document).ready(function(){

    $.niftyNav('collapse');
      $.niftyNav('bind');
/*$('#easyPaginate').easyPaginate({
  paginateElement: 'div',
  elementsPerPage: 5,
  effect: 'climb'
});*/

   });
</script>

@endsection
