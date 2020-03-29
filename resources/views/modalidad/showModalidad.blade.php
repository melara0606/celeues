@extends('layouts.shared.appplantilla')

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
  <ul class="breadcrumb">
    <li><a href=""><i class="demo-pli-home"></i></a></li>
    <li><a href="">Configuracion</a></li>
    <li class="active">Modalidad</li>
  </ul>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->

</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content" >


  <div class="panel"  style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

    <div class="panel-heading {{--bg-mint--}}" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
      <div class="panel-control ">
        <!--<button id="nuevoModal" class="btn btn-default btn-active-primary" ><i class="demo-pli-pen-5"></i></button>
        <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
        -->
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
     <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;">MODALIDAD</strong></p></h3>

    </div>


    <!--Data Table-->
    <!--===================================================-->
    <div class="panel-body "  style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
      {{----}}<div class="pad-btm form-inline">
        <div class="row">
          <div class="col-sm-6 table-toolbar-left">
            <button id="btnnuevo" class="btn btn-purple"><i class="demo-pli-add"></i> Nuevo</button>
            <button class="btn btn-default imprimir"><i class="demo-pli-printer icon-sm add-tooltip" data-original-title="Imprimir" data-container="body"></i></button>
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
        <table id="myTable" class="table table-striped row-border"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
          <thead>
            <tr>
              <th class="text-center">#</th>

              <th class="text-center">Nombre</th>
              <th>Turno</th>


              <th class="text-center">Acciones</th>

            </tr>
          </thead>
          <tbody>
            <div style="display: none;">{{ $correlativo=1 }}</div>
            @forelse($modalidades as $modalidad)
            <tr id="{{ $modalidad->id }}">
              <td align="center">{{ $correlativo++ }}</td>
              <td align="Center"><div class="label label-table bg-dark"><div class="text-xs text-bold"></div>{{ $modalidad->nombre }}</div></td>
              <td >{{ $modalidad->turno }}</td>

              <td align="center">
                {{--<button class="btn btn-mint btn-icon btn-sm"><i class="demo-psi-pen-5 icon-sm"></i></button>
                <button class="btn btn-sm btn-rounded btn-default">Small</button>
                <button class="btn btn-xs btn-rounded btn-default">Extra Small</button>
                --}}
                <button class="btn btn-icon btn-default btn-default btn-sm  btn-hover-mint add-tooltip editarmodal" data-original-title="Editar Registro" data-container="body" value="{{ $modalidad->id }}"><i class="demo-psi-pen-5 icon-sm " ></i> Editar</button>
                <button class="btn btn-icon btn-default btn-sm  btn-hover-info infoModal add-tooltip " data-original-title="Información" data-container="body" value="{{ $modalidad->id }}"><i class="demo-pli-exclamation icon-sm " ></i> Info</button>

                {{--<button type="button" class="btn btn-outline-info btn-sm infomodal" value="{{ $modalidad->id }}">Info</button>--}}


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
        <h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Modalidad</label></h4>
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
        @include('modalidad.formModalidad')
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



<!--Large Bootstrap Modal-->
<!--===================================================-->
<div id="modalInfo" class="modal fade" tabindex="-1">
  <div class="modal-dialog {{--modal-lg--}}">
    <div class="modal-content">
      <div class="modal-header alert-info">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Datos de Modalidad</h4>
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
        <p>Esta seguro de continuar con la accion?.</p></h4>
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





@endsection

@section('script')

<script src="{{asset('js/modalidad.js')}}"></script>

@endsection
