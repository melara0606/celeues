@extends('layouts.shared.appplantilla')

@section('content')
<!-- Encabezado de la pagina -->
<div id="page-head">
  <div id="page-title">
    <h1 class="page-header text-overflow">Historial de prestamos</h1>
  </div>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{ route('docente') }}">Docentes</a></li>
    <li><a href="{{ route('docente_materiales', ['id' => $id]) }}">Detalles del docente</a></li>
    <li class="active">Historial de prestamo</li>
  </ol>
</div>
<!-- Contenido de la pagina -->
<div id="page-content">
  <div class="row">
    <div class="col-md-3">
      <div class="panel pos-rel">
        <div class="pad-all text-center">
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
            <table class="table table-hover table-vcenter mar-no table-striped">
              <thead>
                <tr>
                  <th class="min-width"></th>
                  <th class="text-center">Idioma</th>
                  <th class="text-center">Nivel</th>
                  <th class="text-center">Modalidad</th>
                  <th class="text-center">Categoria</th>
                  <th class="text-center">Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prestamos as $item)
                  <tr>
                    <td class="text-center"><i class="demo-pli-monitor-2 icon-2x"></i></td>
                    <td class="text-center">
                      <span class="text-main text-semibold">
                        {{ $item->material->idioma->nombre }}
                      </span>
                      <br>
                      <small class="text-muted">
                        {{ @$item->grupo->nivel->modalidad->turno }}
                      </small>
                    </td>
                    <td class="text-center">
                      {{ $item->grupo->nivel->numNivel || 0 }}
                    </td>
                    <td class="text-center">{{ $item->grupo->nivel->modalidad->nombre }}</td>
                    <td class="text-center">{{ $item->material->categoria->nombre }}</td>
                    <td class="text-center">
                      @php
                        $type = $item->estado == '0' ? 'Entregado' : 'Prestado';
                      @endphp
                      <span class="text-success text-semibold">{{ $type }}</span>
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