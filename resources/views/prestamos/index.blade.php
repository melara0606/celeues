@extends('layouts.shared.appplantilla')

@section('content')
  <div id="page-head">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
      <li class="active">Prestamos</li>
    </ol>
  </div>
  <div id="page-content">
    <div class="panel" style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
      <div class="panel" style="background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">
        <div class="panel-heading" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
        <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;">PRESTAMOS</strong></p></h3>
      
        </div>
        <div class="panel-body "  style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
          <div class="pad-btm form-inline">
            <div class="row">
              <div class="col-sm-6 table-toolbar-left">
                <a href="{{ route('prestamos.create') }}"
                  class="btn btn-purple"><i class="demo-pli-add"></i> Agregar prestamo </a>
              </div>
              <div class="col-sm-6 table-toolbar-right"></div>
            </div>
            <div class=" table-responsive">
              {{-- <table id="myTable" class="table table-striped row-border" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Código</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>N° Serie</th>
                    <th>Fecha Adquisición</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($equipos as $key => $equipo)
                    <tr>
                      <td align="center">{{ $key + 1 }}</td>
                      <td align="Center">
                        <div class="label label-table bg-dark">
                          <div class="text-xs text-bold"></div>{{ $equipo->codigo }}
                        </div>
                      </td>
                      <td>{{ $equipo->description }}</td>
                      <td>{{ $equipo->marca }}</td>
                      <td>{{ $equipo->modelo }}</td>
                      <td>{{ $equipo->nserie }}</td>
                      <td>{{ $equipo->fechaAd }}</td>
                      <td>$ @convert($equipo->precio)</td>
                      <td>
                        @component('alert', ['type' => $equipo->estado])
                          <p></p>
                        @endcomponent
                      </td>
                      <td align="center">
                        <div class="btn-group">
                          <a href="{{ route("equipos.edit", ["id" =>  $equipo-> id]) }}"
                            class="btn btn-icon btn-default btn-default btn-sm  btn-hover-mint add-tooltip"
                            data-original-title="Editar Registro" data-container="body">
                            <i class="demo-psi-pen-5 icon-sm "></i> Editar
                          </a>
                          <button class="btn btn-icon btn-default btn-sm  btn-hover-info add-tooltip "
                            data-original-title="Información" data-container="body">
                            <i class="demo-pli-exclamation icon-sm "></i> Info
                          </button>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <p>No hay mensajes destacados</p>
                  @endforelse
                </tbody>
              </table> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $("#myTable").DataTable({})
    })
  </script>
@endsection