@extends('layouts.shared.appplantilla')

@section('content')
<style type='text/css'>
  .noneview{ display:none; }
</style>
<!-- Encabezado de la pagina -->
<div id="page-head">
  <div id="page-title">
    <h1 class="page-header text-overflow">Detalle del docente</h1>
  </div>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{ route('docente') }}">Docentes</a></li>
    <li class="active">Detalles</li>
  </ol>
</div>

<div id="page-content">
  <div class="row">
    <div class="col-md-3">
      <div class="panel pos-rel">
        <div class="pad-all text-center">
          @if (count($grupo) > 0)
            <div class="widget-control">
              <div class="btn-group dropdown">
                <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i
                    class="demo-psi-dot-vertical icon-lg"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a href="{{ route("history_prestamos", ["id" => $docente->id ]) }}">
                      <i class="icon-lg icon-fw demo-pli-calendar-4"></i> Ver prestamos
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          @endif
          <a href="#">
            <img alt="Profile Picture" class="img-lg img-circle mar-ver" src='{{ asset("img/profile-photos/2.png") }}'>
            <p class="text-lg text-semibold mar-no text-main">
              {{ $docente->nombre }} {{ $docente->apellido  }}
            </p>
            <p class="text-sm">{{  $docente->email }}</p>
            <p class="text-sm">PENDIENTE LA DIRECCION DEL DOCENTE</p>
          </a>
        </div>
      </div>
    </div>
    @if(count($grupo) === 0)
      <div class="col-md-9">
        <div class="panel panel-body">
          <h3 style="text-align:center; padding: 75px;"
            class="text-main text-normal text-2x mar-no">Por el momento no tiene asigando, grupo academicos</h3>
        </div>
      </div>
    @else
      <div class="col-md-5">
        <div class="panel panel-body">
          <div class="panel-heading">
            <h3>Equipo</h3>
          </div>
          <div class="panel-body text-center">
            @if (count($docente->equipo) > 0)
              <table class="table table-hover table-vcenter mar-no">
                <thead>
                  <tr>
                    <th class="min-width">Device</th>
                    <th>Codigo</th>
                    <th class="text-center">Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <i class="demo-pli-monitor-2 icon-2x"></i>
                    </td>
                    <td class="text-left">
                      <span class="text-main text-semibold">{{ $docente->equipo[0]->codigo }}</span>
                      <br>
                      <small class="text-muted">{{ $docente->equipo[0]->modelo }}</small>
                    </td>
                    <td class="text-center">
                      <span class="text-success text-semibold">
                        Activo
                      </span>
                    </td>
                    <td>
                      @if (count($prestamos) == 0)
                        <button data-pivoted="{{ $docente->equipo[0]->pivot }}"
                          id="deleteEquipo" class="btn btn-primary">Eliminar</button>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            @else
            <p class="h5">
              No hay equipo asignado por el momento.
            </p>
            <button data-target="#demo-default-modal" data-toggle="modal" class="btn btn-primary">Asignar
              equipo</button>
            @endif
          </div>
        </div>
      </div>

      @if (count($docente->equipo) > 0)
        <div class="col-md-4">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h3>Prestamos</h3>
            </div>
            <div class="panel-body text-center">
              @if (count($prestamos) == 0)
                <p class="h5">Por el momento no hay prestamos pendientes.</p>
                <form action="#" id='addPrestamo'>
                  {{ csrf_field() }}
                  <input type="hidden" name="docente" value="{{ $docente->equipo[0]->pivot->docente_id }}" />
                  <input type="hidden" name="equipo" value="{{ $docente->equipo[0]->pivot->equipo_id }}" />
                  <button type="submit" class="btn btn-primary">Realizar un prestamo</button>
                </form>
              @else
                <table class="table table-hover table-vcenter mar-no">
                  <thead>
                    <tr>
                      <th class="min-width">Device</th>
                      <th>Codigo</th>
                      <th>Fecha de prestamo</th>
                      <th class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($prestamos as $item)
                      <tr>
                        <td class="text-center">
                          <i class="demo-pli-monitor-2 icon-2x"></i>
                        </td>
                        <td class="text-left">
                          <span class="text-main text-semibold">{{ $item->equipo->codigo }}</span>
                          <br>
                          <small class="text-muted">{{ $item->equipo->modelo }}</small>
                        </td>
                        <td class="text-left">
                          <span class="text-success text-semibold">{{ $item->created_at }}</span>
                        </td>
                        <td>
                          <button data-target="#demo-entrega-observacion" data-toggle="modal"
                            type="button" class="btn btn-primary">Entregar</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif
            </div>
          </div>
        </div>
      @endif
    @endif
  </div>
</div>

<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <form action="#" method="POST" novalidate class="form-horizontal" id="addEquipo">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <i class="pci-cross pci-circle"></i>
          </button>
          <h4 class="modal-title">Asignar equipo</h4>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          <input type="hidden" name="docente" value="{{ $docente->id }}" />
          <div class="form-group">
            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Equipo * </label>
            <div class="col-sm-9">
              <select name="equipo" required id="equipo" class="form-control">
                <option value>[]</option>
                @foreach ($equipos as $equipo)
                <option value="{{ $equipo->equipoId }}">
                  {{ $equipo->codigo }} [{{ $equipo->marca }} | {{ $equipo->modelo }}]
                </option>
                @endforeach
              </select>
              <span id='inputError'></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
          <button type="submit" class="btn btn-primary">Asignar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="demo-entrega-observacion" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <form action="#" method="POST" class="form p-t-20" id="entregarEquipo">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <i class="pci-cross pci-circle"></i>
          </button>
          <h4 class="modal-title">Entregar equipo</h4>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          <table class="table table-hover table-vcenter mar-no">
            <thead>
              <tr>
                <th class="min-width">Device</th>
                <th>Codigo</th>
                <th>Fecha de prestamo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prestamos as $item)
                <tr>
                  <td class="text-center">
                    <i class="demo-pli-monitor-2 icon-2x"></i>
                  </td>
                  <td class="text-left">
                    <span class="text-main text-semibold">{{ $item->equipo->codigo }}</span>
                    <br>
                    <small class="text-muted">{{ $item->equipo->modelo }}</small>
                  </td>
                  <td class="text-left">
                    <span class="text-success text-semibold">{{ $item->created_at }}</span>
                    <input type="hidden" value="{{ $item->id }}" name="codigo">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>          
          <div class="form-group col-sm-12" style="margin-top: 30px;">
            <label class="col-sm-3 control-label" for="demo-hor-inputemail">Observaciones: </label>
            <div class="col-sm-9">
              <textarea name="observaciones" class="form-control" required
                id="observaciones"  rows="5"></textarea>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <div class="checkbox checkbox-success col-sm-9">
              <input id="estado" name="estado" type="checkbox" />
              <label for="estado" style="padding:0px;"> El equipo esta dañado (Cambio de estado) </label>
            </div>
          </div>
          <div id='motivos' class="form-group col-sm-12 noneview" style="margin-top: 30px;">
            <label class="col-sm-3 control-label" for="observacion">Motivos: </label>
            <div class="col-sm-9">
              <textarea name="observacion" class="form-control"
                id="observacion" rows="3"></textarea>
                <span>Al cambiar el estado del equipo automaticamente se eliminara para el docente</span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
          <button type="submit" class="btn btn-primary">Entregar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('js/asignar.js')}}"></script>
@endsection