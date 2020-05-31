@extends('layouts.shared.appplantilla')

@section('content')
<style type="text/css">
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
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div ng-app="prestamos" ng-controller='Controller'>
  <div id="page-head">
    <ol class="breadcrumb">
      <li><a href="{{ route("home") }}"><i class="demo-pli-home"></i></a></li>
      <li><a href="{{ route("prestamos.index") }}">Prestamos</a></li>
      <li class="active">Detalles del prestamo</li>
    </ol>
  </div>

  <div class="container-fluid">
    <div class="row" style="margin-top:95px">
      <div class="col-lg-7" style="padding-bottom:80px">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title title-font">Prestamo</h3>
          </div>
          <div class="panel-body">
            <fieldset>
              <table class="table table-hover table-vcenter">
                <thead>
                  <tr>
                    <th class="min-width">Equipo</th>
                    <th>Codigo</th>
                    <th class="text-center">Marca</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($prestamo->items as $item)
                  <tr>
                    <td class="text-center">
                      <i class="demo-pli-monitor-2 icon-2x"></i>
                    </td>
                    <td>
                      <span class="text-main text-semibold">
                       {{$item->equipo->codigo}} 
                      </span>
                      <br>
                      <small class="text-muted">{{ $item->equipo->modelo }}</small>
                    </td>
                    <td class="text-center">
                      <span class="text-danger text-semibold">{{ $item->equipo->marca }}</span>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </fieldset>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="panel pos-rel">
          <div class="pad-all text-center">
            <img alt="Profile Picture" class="img-lg img-circle mar-ver" 
              src='{{ asset("portfolio-02.jpg") }}'>
            <p class="text-lg text-semibold mar-no text-main">
             {{ $prestamo->detalle->nombres }} {{ $prestamo->detalle->apellidos }}
            </p>
            <p class="text-sm">DUI: {{ $prestamo->detalle->dui }}</p>
            <p class="text-sm">
              Fecha del prestamo: {{ date('d-m-Y H:i:s',strtotime($prestamo->created_at) )}}
            </p>
            @if ($prestamo->estado == 1)
              <hr />
              <div ng-app='prestamos' ng-controller='Controller'>
                <form name='frm' class="form p-t-20" ng-submit='submit();' style="overflow: auto">
                  <div class="form-group col-sm-12">
                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Observaciones: </label>
                    <div class="col-sm-9">
                      <input type="hidden" id="id" name="id" value="{{ $prestamo->id }}" />
                      <textarea name="observaciones" ng-model='o' class="form-control" required
                        id="observaciones" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-9 col-offset-sm-3">
                    <button ng-disabled='frm.$invalid' class="btn btn-primary btn-lg" type="submit">Guardar</button>
                  </div>
                </form>
                <div class="loading" ng-show='isServerLoading'>
                  <figure>
                    <img src="{{asset('image-gif.gif')}}" alt="gif">
                  </figure>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/angular.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    angular.module("prestamos", [])
    .controller("Controller", function($scope) {
      $scope.isServerLoading = false;

      $scope.submit = function() {
        $scope.isServerLoading = true;
        if($scope.frm.$valid) {
          var id = $("#id").val();
          $.ajax({
            type: 'PUT',
            dataType: 'json',
            data: { d: $scope.o},
            url:  window.URL_BASE + 'prestamos/' +  id,
            beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            }
          }).done(function(result) {
            $scope.$apply(function() {
              $scope.isServerLoading = false;
            });
            if(result.response) {
              swal("El prestamo fue entregado con exito", {
                icon: "success"
              }).then(function() {
                window.location.href = window.URL_BASE + 'prestamos';
              })
            }
          });
        }
      }
    });
  </script>
@endsection