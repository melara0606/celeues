@extends('layouts.shared.appplantilla') @section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div ng-app="evaluaciones">
  <div id="page-head">
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('home') }}"><i class="demo-pli-home"></i></a>
      </li>
      <li><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
      <li class="active">Nueva evaluacion</li>
    </ol>
  </div>
  <div id="page-content" ng-controller="EvaluacionController">
    <form name="form" ng-submit='EditarForm();' >
       <input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
      <input type="hidden" ng-model='token' id="token" name="token" value="{{ csrf_token() }}" />
      <div class="panel col-sm-5 col-sm-offset-3">
        <div class="panel-heading">
          <h3 class="panel-title">Evaluacion</h3>
        </div>
        <div class="panel-body">
          <div class="pad-btm form-inline">
            <div class="row">
              <div class="form-group col-sm-8"
                ng-class="{ 'has-error': form.title.$invalid }">
                <input
                  minlength="3" type="text" style="width:100%"
                  placeholder="Nombre de la evaluacion"
                  class="form-control" required name="title"
                  autocomplete="off" ng-model='title'
                />
                <small class="help-block" ng-if='form.title.$invalid'>
                  El campo es requerido y debe tener por lo menos 3 caracteres
                </small>
              </div>
              <div class="col-sm-2">
                <div class="btn-group pull-right">
                  <button ng-if='total < 100' id="demo-btn-addrow" type="button"
                    ng-click='addInput();' class="btn btn-purple">
                    <i class="demo-pli-add"></i> Agregar
                  </button>  
                  <button ng-if='total== 100' id="demo-btn-addrow" 
                    type='submit' class="btn btn-primary">
                    <i class="demo-pli-add"></i> Editar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre de la ponderacion</th>
                  <th width='150'>Ponderacion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat='input in inputEvaluacion'>
                  <td>
                    <input type="hidden" name="ponderacionId[]" value="[{ input.id }]" />
                    <input required type="text" ng-model='input.titulo' 
                      name="nombreInput[]" id="nombreInput[]" class="form-control" />
                  </td>
                  <td>
                    <input required min="1" type="number" ng-model='input.ponderacion'
                      name="ponderacion" id="ponderacion" ng-blur='updateTotal();'
                      class="form-control" />
                  </td>
                  <td class="text-center">
                    <button type="button" ng-click='delete($index)' class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="text-left">
                    <h4>Total: </h4>
                  </td>
                  <td class="text-center"><h4>[{ total | number:2 }]</h4></td>
                </tr>
                <tr ng-if='total > 100'>
                  <td colspan="3">
                    <h4 class="text-center alert alert-danger">Los sentimos pero el total no puede ser mayor a 100</h4>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection 
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/angular.min.js') }}"></script>
<script text="text/javascript">
  angular
    .module("evaluaciones", [], function($interpolateProvider) {
      $interpolateProvider.startSymbol('[{');
      $interpolateProvider.endSymbol('}]');
    })
    .controller("EvaluacionController", function($scope) {
      $scope.total = 0.0;
      $scope.view = true;
      $scope.title = '<?php echo $evaluacion->titulo ?>';
      $scope.inputEvaluacion = <?php echo $evaluacion->items ?>;

      $scope.addInput = function() {
        if($scope.form.$valid && $scope.sumTotal() <= 100) {
          $scope.inputEvaluacion.push({
            nombre: '', ponderacion: 0.0
          });
        }
      };

      $scope.updateTotal = function() {
        $scope.total = $scope.sumTotal();
      }

      $scope.sumTotal = function() {
        return $scope.inputEvaluacion.reduce(function(total, currentvalue) {
          return total + (currentvalue.ponderacion || 0);
        }, 0);
      }

      $scope.delete = function(index) {
        $scope.inputEvaluacion.splice(index, 1);
        $scope.updateTotal();
      };

      $scope.updateTotal();

      $scope.EditarForm = function() {
        var url =$('#path').val()+'/evaluaciones';//window.URL_BASE + 'evaluaciones';
        if( $scope.sumTotal() === 100 && $scope.form.$valid) {
          var token = $("#token").val()
          var data = {
            items: $scope.inputEvaluacion, nombre: $scope.title
          }
          console.log(url);
          $.ajax({
            url: url + "/<?php echo $evaluacion->id ?>",
            type: 'PUT',
            data: data,
            success: function (response) {
              swal("Poderaciones actualizada con exitos", {
                icon: "success"
              }).then(function() {
                window.location.href = url;
              })
            },
            beforeSend: function (request) {
             return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            }
          })
        }
      };
    });
</script>
@endsection
