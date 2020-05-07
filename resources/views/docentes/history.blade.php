@extends('layouts.appPlantilla')

@section('content')
<!-- Encabezado de la pagina -->
<div id="page-head">
  <div id="page-title">
    <h1 class="page-header text-overflow">Historial de prestamos</h1>
  </div>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{ route('docente') }}">Docentes</a></li>
    <li><a href="{{ route('prestamo_docente', ['id' => $id]) }}">Detalles del docente</a></li>
    <li class="active">Historial</li>
  </ol>
</div>
<!-- Contenido de la pagina -->
<div id="page-content">
  <div class="row">
    <div class="col-md-3">
      <div class="panel pos-rel">
        <div class="pad-all text-center">
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
    <div class="col-xs-9">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Historial de prestamos </h3>
        </div>
        <div class="panel-body">
          <div class="pad-btm form-inline">
            <div class="row">
              <div class="col-sm-6 table-toolbar-left">
              </div>
              <div class="col-sm-6 table-toolbar-right">
                <div class="form-group">
                  <input type="text" autocomplete="off" class="form-control" 
                    placeholder="Buscar ..." id="demo-input-search2">
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Equipo</th>
                  <th>Descripcion</th>
                  <th>Fecha de prestamo</th>
                  <th>Fecha de entrega</th>
                  <th class="text-center">Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prestamos as $key => $item)
                  <tr>
                    <td class="vertical-middle">{{ $key + 1 }}</td>
                    <td class="vertical-middle">
                      <span class="h3">{{ $item->equipo->codigo }}</span>
                      <p>
                        {{ $item->equipo->marca }} [{{ $item->equipo->modelo }}]
                      </p>
                    </td>
                    <td class="vertical-middle">
                      {{ $item->observaciones  }}
                    </td>
                    <td class="vertical-middle">
                      <span class="text-muted">{{ $item->created_at }}</span>
                    </td>
                    <td class="vertical-middle">
                      @if ($item->estado == 0)
                        <span class="text-muted">{{ $item->updated_at }}</span>
                      @endif
                    </td>
                    <td class="text-center vertical-middle">
                      @if ($item->estado == 0)
                        <div class="label label-table label-success">Entregado</div>
                      @else
                        <div class="label label-table label-warning">Pendiente</div>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr class="new-section-xs">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@endsection