@extends('layouts.shared.appplantilla')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div ng-app="materiales" ng-controller='materialesController'>
  <div id="page-head">
    <ol class="breadcrumb">
      <li><a href="{{ route("home") }}"><i class="demo-pli-home"></i></a></li>
      <li><a href="{{ route("materiales.index") }}">Materiales</a></li>
      <li class="active">Agregar materiales</li>
    </ol>
  </div>
  
  <div class="col-lg-8 col-lg-offset-2" style="padding-bottom:80px">
  <input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}"><br>
    <div class="panel" style="border: 1px bold #ccc; box-shadow: 2px 2px #bbb !important">
      <div class="panel-heading bg-gray-dark" >
        <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main bg"> <strong style="font-size: 14px;">NUEVO MATERIAL DIDACTICO</strong></p></h3>
      
      </div>

      <form name="materialForm" class="form-horizontal bv-form" ng-submit='send(materialForm.$valid)'>
        <div class="panel-body"  style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
          <p class="bord-btm pad-ver text-main text-bold">Relaciones</p>
          <fieldset>
            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.idioma.$valid }">
              <label class="col-lg-3 control-label" for="idioma">Idioma: </label>
              <div class="col-lg-7">
                <select ng-model='item.idioma' name="idioma" id="idioma" class="form-control" required>
                  @foreach ($idiomas as $item)
                    <option value="{{$item->id}}">{{ $item->nombre }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.categoria.$valid }">
              <label class="col-lg-3 control-label" for="categoria">Categoria: </label>
              <div class="col-lg-7">
                <select ng-model='item.categoria' name="categoria" id="categoria"  class="form-control" required>
                  @foreach ($categorias as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.niveles.$valid }">
              <label class="col-lg-3 control-label" for="niveles">Niveles: </label>
              <div class="col-lg-7">
                <select ng-model='item.nivel' name="niveles" id="niveles"  class="form-control" required>
                  <option value="1">Niveles: [1-4]</option>
                  <option value="2">Niveles: [5-8]</option>
                  <option value="3">Niveles: [9-12]</option>
                  <option value="4">Niveles: [13-16]</option>
                  <option value="5">Niveles: [17-20]</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-7 col-lg-offset-3">
                <div class="checkbox">
                  <input id="type_material" class="magic-checkbox" ng-model='copia'
                    type="checkbox" name="copia" />
                  <label for="type_material"> ¿Es copia?</label>
                </div>
                <i class="form-control-feedback" data-bv-icon-for="acceptTerms" style="display: none;"></i>
              </div>
              <div class="col-lg-7 col-lg-offset-3">
                <div class="checkbox">
                  <input id="donado" class="magic-checkbox" type="checkbox" name="donado" ng-model="donado" />
                  <label for="donado">¿Es donado?</label>
                </div>
                <div class="checkbox">
                  <input ng-model='item.cd' id="appendCD" class="magic-checkbox" type="checkbox" name="cd" />
                  <label for="appendCD">¿Contiene CD?</label>
                </div>
              </div>
            </div>
          </fieldset>

          <br>
          <p class="bord-btm pad-ver text-main text-bold">Informacion basica</p>
          <fieldset>
            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.titulo.$valid }">
              <label class="col-lg-3 control-label" for="titulo">Titulo: *</label>
              <div class="col-lg-7">
                <input ng-model='item.titulo' type="text" id="titulo" required class="form-control" name="titulo" placeholder="* Titulo" />
              </div>
            </div>
  
            <div class="form-group has-error" ng-class="{ 'has-success': (materialForm.edicion.$valid || copia) }">
              <label class="col-lg-3 control-label" for="edicion">Edicion: *</label>
              <div class="col-lg-7">
                <input ng-model='item.edicion' ng-required="!copia" type="text" 
                  class="form-control" id="edicion" name="edicion" placeholder="* Edicion" ng-disabled='copia' />
              </div>
            </div>

            <div class="form-group has-error" ng-class="{ 'has-success': (materialForm.autor.$valid || copia) }">
              <label class="col-lg-3 control-label" for="autor">Autor: *</label>
              <div class="col-lg-7">
                <input ng-model='item.autor' type="text" ng-required="!copia" class="form-control" id="autor" name="autor" placeholder="* Autor" ng-disabled='copia' />
              </div>
            </div>

            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.editorial.$valid }">
              <label class="col-lg-3 control-label" for="editorial">Editorial: *</label>
              <div class="col-lg-7">
                <input ng-model='item.editorial' type="text" required class="form-control" id="editorial" name="editorial" 
                  placeholder="* Editorial" />
              </div>
            </div>
            <div class="form-group has-error" ng-class="{ 'has-success': (materialForm.costo.$valid || donado) }">
              <label class="col-lg-3 control-label" for="costo">Costo: </label>
              <div class="col-lg-7">
                <input type="number" step="any" ng-required="!(donado)" class="form-control" id="costo" name="costo" 
                  placeholder="Costo" ng-disabled='donado' ng-model='item.costo' />
              </div>
            </div>

            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.fechaAdd.$valid }">
              <label class="col-lg-3 control-label" for="datetimepicker">Fecha de adquisicion: *</label>
              <div class="col-lg-7">
                <div class='input-group date' id='datetimepicker'>
                  <input ng-model='item.fechaAdd' ng-max='maxDate' type='date' class="form-control" name="fechaAdd" id="fechaAdd" required />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </fieldset>
          <br>
          <p class="bord-btm pad-ver text-main text-bold">Otra informacion importante</p>
          <fieldset>
            <div class="form-group has-error" ng-class="{ 'has-success': materialForm.observaciones.$valid }">
              <label class="col-md-3 control-label" for="observaciones">Observaciones</label>
              <div class="col-md-9">
                <textarea id="observaciones" rows="4" class="form-control" ng-model='item.observacion'
                  placeholder="Observaciones para el material" required name="observaciones"></textarea>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-sm-7 col-sm-offset-3">
              <button class="btn btn-primary btn-md" ng-disabled='materialForm.$invalid' type="submit">Guardar</button>
              <a class="btn btn-danger btn-md" href="{{ route('materiales.index') }}">Cancelar</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('js/angular.min.js') }}"></script>
  <script type="text/javascript">
    angular.module("materiales", [], function($interpolateProvider) {
      $interpolateProvider.startSymbol('[{');
      $interpolateProvider.endSymbol('}]');
    }).controller("materialesController", function($scope) {
      
      $.niftyNav('expand'); 
      $scope.donado = false;
      $scope.copia  = false;
      $scope.maxDate = new Date();

      $scope.send = function($valid) {
        if( $valid ) {
          var data = Object.assign($scope.item, {
            donado: $scope.donado, copia: $scope.copia
          });
          
          $.ajax({
            data: data,
            type: 'POST',
            url: $('#path').val() + "/materiales",
            success: function(response) {
              var response = JSON.parse(response);
              if(response.ok) {
                swal("Nuevo material agregado con exito", {
                  icon: "success"
                }).then(function() {
                  window.location.href = window.URL_BASE + 'materiales';
                })
              }
            },
            error: function(error) {
              console.log(error);
            },
            beforeSend: function (request) {
             return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            }
          })
        }
      }
    })
  </script>
@endsection