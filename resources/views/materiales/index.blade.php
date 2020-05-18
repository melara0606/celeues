@extends('layouts.shared.appplantilla')

@section('content')
 
  <div id="page-head">
  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb">
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Admin. Equipo</a></li>
    <li class="active">Insumos Didacticos</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->

</div>
  <div id="page-content">
    <div class="panel" style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
      <div class="panel" style="background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">
        <div class="panel-heading" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important" >
          {{--<h3 class="panel-title "></h3>--}}
          <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;">MATERIALES DIDACTICOS</strong></p></h3>
      
        </div>
        <div class="panel-body " style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
          <div class="pad-btm form-inline">
            <div class="row">
              <div class="col-sm-6 table-toolbar-left">
                <a href="{{ route('materiales.create') }}"
                  class="btn btn-purple"><i class="demo-pli-add"></i> Nuevo Material </a>
              </div>
              <div class="col-sm-6 table-toolbar-right"></div>
            </div>
            <div class=" table-responsive">
              <table id="myTable2" class="table table-striped row-border" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Código</th>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Edición</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Costo</th>
                    {{----}}<th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($materiales as $key => $item)
                    <tr>
                      <td class="text-center">{{ $key + 1 }}</td>
                      <td class="text-center">{{ $item->codigo }}</td>
                      <td class="text-center">{{ $item->titulo }}</td>
                      <td class="text-center">{{ $item->edicion }}</td>
                      <td class="text-center">{{ $item->autor }}</td>
                      <td class="text-center">
                        $ {{ number_format($item->costo, 2) }}
                      </td>
                      <td>
                        @component('alert', ['type' => $item->estado])
                          <p></p>
                        @endcomponent
                      </td>
                      <td class="text-center">
                        <a href="{{ route('materiales.edit', $item->id) }}"
                          class="btn btn-icon btn-default btn-default btn-xs btn-hover-mint">
                          <i class="demo-psi-pen-5 icon-sm"></i>
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
       $(document).ready(function(){
        $.niftyNav('expand');
             $('#myTable2').DataTable({
            //"dom": '<"top"lf>rt<"bottom"pi>'
          });
        
       });
    </script>
  
    
  
    @endsection
