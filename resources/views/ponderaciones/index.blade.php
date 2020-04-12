@extends('layouts.shared.appplantilla')

@section('content')
<div id="page-head">
  <ol class="breadcrumb">
    <li><a href="/home"><i class="demo-pli-home"></i></a></li>
    <li class="active">Equipos</li>
  </ol>
</div>
<div id="page-content">
  <div class="panel" style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title ">Equipo Multimedia</h3>
      </div>
      <div class="panel-body ">
        <div class="pad-btm form-inline">
          <div class="row">
            <div class="col-sm-6 table-toolbar-left">
              <a href="{{ route('evaluaciones.create') }}"
                class="btn btn-purple"><i class="demo-pli-add"></i> Nueva evaluacion </a>
            </div>
            <div class="col-sm-6 table-toolbar-right"></div>
          </div>
          <div class=" table-responsive">
            <table id="myTable" class="table table-striped row-border">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Fecha de creacion</th>
                  <th class='text-center'>Fecha de actualizacion</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @forelse($evaluaciones as $key => $evaluacion)
                  <tr>
                    <td align="center">{{ $key + 1 }}</td>
                    <td align="Center">
                      <div class="label label-table bg-dark">
                        <div class="text-xs text-bold"></div>{{ $evaluacion->titulo }}
                      </div>
                    </td>
                    <td class="text-center">{{ $evaluacion->created_at->format('d/m/Y') }}</td>
                    <td class="text-center">{{ $evaluacion->updated_at->format('d/m/Y') }}</td>
                    <td align="center">
                      <div class="btn-group">
                        <a href="{{ route("evaluaciones.edit", ["id" =>  $evaluacion-> id]) }}"
                          class="btn btn-icon btn-default btn-default btn-sm  btn-hover-mint add-tooltip"
                          data-original-title="Editar Registro" data-container="body">
                          <i class="demo-psi-pen-5 icon-sm "></i> Editar
                        </a>
                      </div>
                    </td>
                  </tr>
                @empty
                  <p>No hay mensajes destacados</p>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection