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
            <div class="table-responsive">
              <table id="myTable2" class="table table-striped row-border" 
                style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">DUI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th class="text-center">Fecha del pedido</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $key => $item)
                    <tr>
                      <td class="text-center">{{ $key + 1 }}</td>
                      <td class="text-center">{{ $item->detalle->dui }}</td>
                      <td>{{ $item->detalle->nombres }}</td>
                      <td>{{ $item->detalle->apellidos }}</td>
                      <td class="text-center">
                        {{ 
                          date('d-m-Y h:i:s', strtotime($item->created_at))
                        }}
                      </td>
                      <td>
                        @component('alert', ['type' => $item->estado, 'msg' => 'Entregado'])
                          <p></p>
                        @endcomponent
                      </td>
                      <td class="text-center">
                        <a href="{{ route('prestamos.show', $item->id) }}" class="btn btn-icon btn-default" data-value="{{$item->id}}" data-container="body">
                          <i class="demo-pli-exclamation icon-xs "></i> Info
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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