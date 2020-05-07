@extends('layouts.shared.appplantilla')

@section('content')
<div id="page-head">
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{ route('equipos.index') }}">Equipos</a></li>
    <li class="active">Agregar equipo</li>
  </ol>
</div>
<div id="page-content">
  <div class="col-sm-12">
    <div class="panel"  style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
      <div class="panel-heading bg-gray-dark">
      
        <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;">AGREGAR EQUIPO</strong></p></h3>
      
      </div>
      <form action="{{ route('equipos.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="panel-body"  style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 400px;">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Marca: </label>
                <input class="form-control" type="text" required name="marca" id="marca" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Modelo: </label>
                <input type="text" required class="form-control" name="modelo" id="modelo" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Tipo del Equipo: </label>
                <select class='form-control' name="tipo_equipo" id="tipo_equipo">
                  @foreach ($tipos as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre_tipo }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Serie: </label>
                <input type="text" required class="form-control" name="serie" id="serie" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group" id="datePicker">
                <label class="control-label">Fecha de adquisicion: </label>
                <div class="input-group">
                  <input type="date" required class="form-control" name="fechaAquisicion" id="fechaAquisicion" />
                  <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Precio: </label>
                <input type="number" required step="any" class="form-control" name="precio" id="precio" />
              </div>
            {{-- </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label">Estado: </label>
                <select required name="estado" id="estado" class="form-control">
                  <option value="1">DISPONIBLE</option>
                  <option value="2">PRESTADO</option>
                  <option value="0">DE-BAJA</option>
                </select>
              </div>
            </div> --}}
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label">Descripcion: </label>
                <textarea required name="descripcion" id="descripcion" cols="5" rows="5" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer text-right">
          <button class="btn btn-primary" type="submit">Guardar</button>
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
