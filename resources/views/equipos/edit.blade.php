@extends('layouts.shared.appplantilla')

@section('content')
<div id="page-head">
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{ route('equipos.index') }}">Equipos</a></li>
    <li class="active">Editar equipo</li>
  </ol>
</div>
<div id="page-content">
  <div class="col-sm-12">
    <div class="panel" style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
      <div class="panel-heading">
        <h3 class="panel-title bg-mint"><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;color:white">EDITAR EQUIPO</strong></p></h3>
      
      </div>
      <form action="{{ route("equipos.update", ["id" => $item->id ]) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="panel-body" style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 350px;">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Marca: </label>
                <input value="{{ $item->marca }}"
                  class="form-control" type="text" required name="marca" id="marca" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Modelo: </label>
                <input required type="text" value="{{ $item->modelo }}"
                  class="form-control" name="modelo" id="modelo" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Serie: </label>
                <input required type="text" value="{{ $item->nserie }}"
                  class="form-control" name="serie" id="serie" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="datePicker">
                <label class="control-label">Fecha de adquisicion: </label>
                <div class="input-group">
                  <input type="date" value="{{ date("Y-m-d", strtotime($item->fechaAd)) }}" required
                    class="form-control" name="fechaAquisicion" id="fechaAquisicion" />
                  <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label">Precio: </label>
                <input type="number" value="{{ $item->precio }}" required
                  step="any" class="form-control" name="precio" id="precio" />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
               
                <label class="control-label">Tipo de equipo: </label>
                <select name="tipo_equipo" id="tipo_equipo" class="form-control">
                  @foreach ($tipos as $tipo)
                    <option value="{{$tipo['id']}}"
                      {{ $tipo['id'] === $item->tipoEquipo->id ? 'selected' : '' }}>{{ $tipo->nombre_tipo }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label">Descripcion: </label>
                <textarea required name="descripcion" 
                id="descripcion" cols="5" rows="5" 
                  class="form-control">{{ $item->description }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer text-right">
          <button class="btn btn-mint" type="submit">Editar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
    $.niftyNav('expand');
    
    });
    </script>
@endsection
