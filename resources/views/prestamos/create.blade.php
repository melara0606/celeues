@extends('layouts.shared.appplantilla')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
  .title-font {
    text-align: center;
    font-size: 2.3rem;
  }

  figure {
    width: 50%;
    display: block;
    margin: 0 auto;
    position: relative;
    top: 5rem;
  }

  figure > img {
    width: 100%;
  }

  .loading {
    width: 100%;
    height: 100%;
    position: fixed;
    background: white;
    left: 0px;
    right: 0px;
    top: 0px;
    bottom: 0px;
    z-index: 100000;
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
      <div class="col-lg-5">
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
      <div class="col-lg-7" style="padding-bottom:80px">
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
    </div>
  </div>
  <div class="loading" ng-show='isServerLoading'>
    <figure>
      <img src="{{asset('image-gif.gif')}}" alt="gif">
    </figure>
  </div>
</div>

@endsection

@section('script')
  {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/angular.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/ngMask.js') }}"></script>
  <script src="{{ asset('js/ui-bootstrap-tpls-2.5.0.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    angular.module("prestamos", ['ui.bootstrap', 'ngMask'], function($interpolateProvider) {
      $interpolateProvider.startSymbol('[{');
      $interpolateProvider.endSymbol('}]');
    }).controller("Controller", function($scope, $uibModal) {
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
            $scope.isServerLoading = true;
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
                $scope.isServerLoading = false;
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

      $scope.send = function(valid) {
        if(valid) {
          var modalInstance = $uibModal.open({
            templateUrl: 'prestamo/modal',
            controller: function($scope, $uibModalInstance) {
              $scope.inValid = false;
              $scope.loading = false;
              $scope.isServer = false;

              $scope.ok = function() {
                $uibModalInstance.close({ data: {
                  nombres: $scope.n,
                  apellidos: $scope.a,
                  dui: $scope.dui,
                  inValid: $scope.inValid,
                }})
              }
    
              $scope.cancel = function() {
                $uibModalInstance.dismiss('cancel');
              }

              $scope.search = function() {
                $scope.loading =  true;
                var dui = $scope.dui;
                $.ajax({
                  type: 'GET',
                  url:  window.URL_BASE + 'materiales/' +  dui + '/dui',
                }).done(function(data) {
                  var isValid = data.length == 0;
                  $scope.$apply(function() {
                    $scope.loading =  false;
                    $scope.inValid = isValid;

                    if(!isValid) {
                      $scope.frm.nombres.$setValidity('required', true);
                      $scope.frm.apellidos.$setValidity('required', true);
                      $scope.n = data[0].nombres;
                      $scope.a = data[0].apellidos;
                      $scope.isServer = true;
                    }
                  });
                });
              }
            },
          });

          modalInstance.result.then(function(data) {
            $scope.isServerLoading = true;
            var object = Object.assign(data, {
              prestamoEquipo: $scope.prestamoEquipo
            });
            $.ajax({
              type: 'POST',
              data: object,
              dataType: 'json',
              url: window.URL_BASE + "/prestamos",
              beforeSend: function (request) {
               return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
              }
            }).done(function(result) {
              $scope.$apply(function() {
                $scope.isServerLoading = false;
                $scope.itemsEquipos = [];
                $scope.prestamoEquipo = [];
              });
              if(result.response) {
                swal("Prestamo realizado con exito!", {
                  icon: "success"
                }).then(function() {
                  window.location.href = window.URL_BASE + 'prestamos';
                })
              }
            });
          })
        }
      } 
    })
  </script>
@endsection