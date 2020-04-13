@extends('layouts.shared.appplantilla')

@section('content')

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
  <ol class="breadcrumb">
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Inscripcion</a></li>
    <li class="active">Ponderaciones</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->

</div>
<div id="page-content">
  <div class="panel" style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
    <div class="panel" style="background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">
      <div class="panel-heading"  style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
        <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;">EVALUACIONES</strong></p></h3>
      </div>
      <div class="panel-body " style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
        <div class="pad-btm form-inline">
          <div class="row">
            <div class="col-sm-6 table-toolbar-left">
              <a href="{{ route('evaluaciones.create') }}"
                class="btn btn-purple"><i class="demo-pli-add"></i> Nueva evaluacion </a>
            </div>
            <div class="col-sm-6 table-toolbar-right"></div>
          </div>
          <div class=" table-responsive">
            <table id="myTable" class="table table-striped row-border"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
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

  @section('script')
  
<script type="text/javascript">
     $(document).ready(function(){
      $.niftyNav('expand');
           $('#myTable').DataTable({
          //"dom": '<"top"lf>rt<"bottom"pi>'
        });
      
     });
  </script>

  

  @endsection