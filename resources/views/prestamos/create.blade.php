@extends('layouts.shared.appplantilla')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
  .title-font {
    text-align: center;
    font-size: 2.3rem;
  }
</style>
<div ng-app="prestamos" ng-controller='Controller'>
  <div id="page-head">
    <ol class="breadcrumb">
      <li><a href="{{ route("home") }}"><i class="demo-pli-home"></i></a></li>
      <li><a href="{{ route("materiales.index") }}">Materiales</a></li>
      <li class="active">Agregar prestamo</li>
    </ol>
  </div>

  <div class="container-fluid">
    <div class="row" style="margin-top:95px">
    
  <input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}"><br>
      <div class="col-lg-3">
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title title-font">Tipo de equipos</div>
          </div>
          <form ng-submit='add();'
            class="form-horizontal bv-form" name="addEquipo">
            <div class="panel-body">
              <fieldset>
                <div ng-class="{ 'has-success': addEquipo.tipo.$valid }"
                  class="form-group has-error">
                  <label class="col-lg-3 control-label" for="tipo">Tipo: </label>
                  <div class="col-lg-7">
                    <select ng-change='tipoChange(this)' ng-model='tipo' name="tipo" id="tipo" class="form-control" required>
                      @foreach ($tipos as $tipo)
                        <option value="{{$tipo}}">{{ $tipo->nombre_tipo }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div ng-class="{ 'has-success': addEquipo.equipo.$valid }"
                  class="form-group has-error">
                  <label class="col-lg-3 control-label" for="idioma">Equipo: </label>
                  <div class="col-lg-7">
                    <select ng-model='equipo' name="equipo" 
                      id="equipo" class="form-control" required>
                      <option value="[{ equipo }]" 
                        ng-repeat='equipo in itemsEquipos'>[{ equipo.codigo }]-([{ equipo.marca }])</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12" style="text-align: center">
                  <button class="btn btn-primary btn-lg" 
                    ng-disabled='addEquipo.$invalid' type="submit">Agregar</button>
                </div>
              </fieldset>
            </div>
          </form>
        </div>
      </div>
      
      <div class="col-lg-5" style="padding-bottom:80px">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title title-font">Nuevo prestamo</h3>
          </div>
          <form name="materialForm" class="form-horizontal bv-form" ng-submit='send(materialForm.$valid)'>
            <div class="panel-body">
              <fieldset>
                <table class="table table-hover table-vcenter">
                  <thead>
                    <tr>
                      <th class="min-width">Equipo</th>
                      <th>Codigo</th>
                      <th class="text-center">Marca</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat='item in prestamoEquipo'>
                      <td class="text-center">
                        <i class="demo-pli-monitor-2 icon-2x"></i>
                      </td>
                      <td>
                        <span class="text-main text-semibold">
                          [{ item.codigo }] ( [{ item.tipo['nombre_tipo'] }] )
                        </span>
                        <br>
                        <small class="text-muted">[{ item.modelo }]</small>
                      </td>
                      <td class="text-center">
                        <span class="text-danger text-semibold">[{ item.marca }]</span>
                      </td>
                      <td>
                        <button type="button" ng-click='eliminar($index, item);'
                          class="btn btn-danger">Eliminar</button>
                      </td>
                    </tr>
                    <tr ng-if='prestamoEquipo.length == 0'>
                      <td colspan="4">
                        <h4 class="text-center">Debes agregar un equipo desde el panel izquierdo</h4>
                      </td>
                    </tr>
                  </tbody>
              </table>
              </fieldset>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-lg-12" style="text-align:center">
                  <button class="btn btn-primary btn-lg" 
                    ng-disabled='prestamoEquipo.length == 0' type="submit">Guardar</button>
                  <a class="btn btn-danger btn-lg" href="{{ route('prestamos.index') }}">Cancelar</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-4" ng-show='prestamoEquipo.length > 0'>
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title title-font">Personal</div>
          </div>
          <form class="form-horizontal bv-form" name="personal">
            <div class="panel-body">
              <fieldset>
                <div class="input-group mar-btm">
                  <input type="text" name="dui" id="dui" required ng-model='dui' style="font-size: 2rem"
                    placeholder="Digite el dui del personal" class="form-control search">
                  <span class="input-group-btn">
                    <button ng-click='search();'
                      class="btn btn-mint" type="button">Buscar</button>
                  </span>
                </div>
              </fieldset>
              <fieldset >
                <legend>Informacion Complementaria</legend>
                <div ng-class="{ 'has-success': personal.nombre.$valid }"
                  class="form-group has-error">
                  <label class="col-lg-3 control-label" for="nombres">Nombres: </label>
                  <div class="col-lg-7">
                    <input type="text" ng-model='nombres'
                      name="nombres" id="nombres" class="form-control" placeholder="Nombres del personal" />
                  </div>
                </div>
                <div ng-class="{ 'has-success': personal.apellidos.$valid }"
                  class="form-group has-error">
                  <label class="col-lg-3 control-label" for="apellidos">Apellidos: </label>
                  <div class="col-lg-7">
                    <input type="text" ng-model='apellidos' ng-model='apellidos' required
                      name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos del personal" />
                  </div>
                </div>
              </fieldset>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection

@section('script')
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('js/angular.min.js') }}"></script>
  <script type="text/javascript">
    angular.module("prestamos", [], function($interpolateProvider) {
      $interpolateProvider.startSymbol('[{');
      $interpolateProvider.endSymbol('}]');
    }).controller("Controller", function($scope) {
      $scope.itemsEquipos = [];
      $scope.prestamoEquipo = [];
      $scope.isServerLoading = false;

      // para hacer la busqueda de lo que llevara el pedido
      $scope.tipoChange = function($this) {
        var tipo = $scope.tipo;
        if (tipo) {
          var _i = JSON.parse(tipo)
          $rsult = validNotRepeat($scope.prestamoEquipo, _i['id']);
          
          if ($rsult == true) {
            $scope.itemsEquipos = [];
            $.ajax({
              type: 'POST',
              data: { tipo: _i.id },
              url:  $('#path').val() +"/prestamos-search",
              beforeSend: function (request) {
               return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              }
            }).done(function(items) {
              $scope.$apply(function(){
                $scope.itemsEquipos = items;
              });
            });
          } else {
            swal("No se puede repetir el tipo de equipo", {
              icon: "error"
            }).then(function() {
              $scope.$apply(function() {
                $scope.itemsEquipos = [];
              })
            })
          }
        }
      }

      $scope.add = function() {
        var _e = Object.assign(JSON.parse($scope.equipo), {
          tipo: JSON.parse($scope.tipo)
        });
        $scope.prestamoEquipo.push(_e);
        reset();
      };

      $scope.eliminar = function($index, item) {
        $scope.prestamoEquipo.splice($index, 1);
      }

      $scope.search = function() {
        var _dui = $scope.dui;
        if (_dui) {
          
        }
      }

      function reset() {
        $scope.tipo   = null;
        $scope.equipo = null;
      }

      function validNotRepeat($array, $tipo) {
        for (value in $array) {
          if ($array[value].tipo['id'] == $tipo) {
            return false;
          }
        }
        return true;
      }
      
      // para la mascara del dui
      $('.search').mask('99999999-9')
    })
  </script>
@endsection