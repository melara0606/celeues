@extends('layouts.shared.appplantilla')

@section('content')
<style type='text/css'>
  .noneview{ display:none; }
</style>
<!-- Encabezado de la pagina -->
<div id="page-head">
  <div id="page-title">
    <h1 class="page-header text-overflow">Detalle del docente</h1>
  </div>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{ route('docente') }}">Docentes</a></li>
    <li class="active">Detalles</li>
  </ol>
</div>

<div id="page-content">
  <div class="row">
    <div class="col-md-2">
      <div class="panel pos-rel">
        <div class="pad-all text-center">
          @if (count($grupos) > 0)
            <div class="widget-control">
              <div class="btn-group dropdown">
                <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i
                    class="demo-psi-dot-vertical icon-lg"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a href="{{ route("docente_prestamos", ["id" => $docente->id ]) }}">
                      <i class="icon-lg icon-fw demo-pli-calendar-4"></i> Ver prestamos
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          @endif
          <a href="#">
            <img alt="Profile Picture" class="img-lg img-circle mar-ver" src='{{ asset("img/profile-photos/2.png") }}'>
            <p class="text-lg text-semibold mar-no text-main">
              {{ $docente->nombre }} {{ $docente->apellido  }}
            </p>
            <p class="text-sm">{{  $docente->email }}</p>
            <p class="text-sm">PENDIENTE LA DIRECCION DEL DOCENTE</p>
          </a>
        </div>
      </div>
    </div>
    @if(count($grupos) === 0)
      <div class="col-md-9">
        <div class="panel panel-body">
          <h3 style="text-align:center; padding: 75px;"
            class="text-main text-normal text-2x mar-no">Por el momento no tiene asigando, grupo academicos</h3>
        </div>
      </div>
    @else
      <div class="col-md-5">
        <div class="panel panel-body">
          <div class="panel-heading">
            <h3>Grupos</h3>
          </div>
          <div class="panel-body text-center">
            <table class="table table-hover table-vcenter mar-no">
              <thead>
                <tr>
                  <th class="min-width"></th>
                  <th class="text-center">Idioma</th>
                  <th class="text-center">Nivel</th>
                  <th class="text-center">Modalidad</th>
                  <th class="text-center">Categoria</th>
                  <th class="text-center">Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grupos as $item)
                  <tr>
                    <td><i class="demo-pli-monitor-2 icon-2x"></i></td>
                    <td>
                      <span class="text-main text-semibold">
                        {{ $item->nombreIdioma }}
                      </span>
                      <br>
                      <small class="text-muted">
                        {{ $item->turno }}
                      </small>
                    </td>
                    <td>{{ $item->numNivel }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->categoria }}</td>
                    <td>
                      <span class="text-success text-semibold">{{ $item->estado }}</span>
                    </td>
                    <td>
                      <a href="{{ route('docente_materiales', [
                        "id" => $docente->id, 'query' => $item->id
                      ]) }}" class="btn btn-primary">Ver</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @if (isset($grupo))
        <div class="col-md-5">
          <div class="panel panel-body">
            <div class="panel-body text-center">
              <table class="table table-hover table-vcenter mar-no">
                <thead>
                  <tr>
                    <th class="min-width"></th>
                    <th>Idioma</th>
                    <th>Modalidad</th>
                    <th class="text-center">Nivel</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <i class="demo-pli-monitor-2 icon-2x"></i>
                    </td>
                    <td class="text-left">
                      <span class="text-main text-semibold">
                        {{ $grupo->nombreIdioma }}
                      </span>
                      <br>
                      <small class="text-muted">
                        {{ $grupo->categoria }}
                      </small>
                    </td>
                    <td class="text-left">
                      {{ $grupo->nombre }}
                    </td>
                    <td class="text-center">{{ $grupo->numNivel }}</td>
                    <td width='140'>
                      @if (count($grupo->prestamo) === 0)
                        <button data-target="#demo-default-modal" 
                          class="btn btn-primary" data-toggle="modal"> Asignar material
                        </button>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel">
            <div class="panel-body text-center">
              @if (count($grupo->prestamo) > 0)
                <table class="table table-hover table-vcenter mar-no">
                  <thead>
                    <tr>
                      <th class="text-center">Codigo</th>
                      <th class="text-center">Titulo</th>
                      <th class="text-center">Nivel</th>
                      <th class="text-center">Categoria</th>
                      <th class="text-center">Idioma</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($grupo->prestamo as $item)
                      <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->titulo }}</td>
                        <td>{{ $item->numNivel }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->idioma }}</td>
                        <td>
                          <form id="entregarMaterial" name="entregar">
                            {{ csrf_field() }}
                            <input type="hidden" name="material" value="{{ $item->id }}">
                            <input type="hidden" name="id" value="{{ $item->keyPrimary }}">
                            <button class="btn btn-primary">Entregar</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <h3>Por el momento no tiene asignado material para este grupo</h3>
              @endif
            </div>
          </div>
        </div>
      @endif
    @endif
  </div>
</div>

@if (isset($grupo->books))
  <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <form action="#" method="POST" novalidate class="form-horizontal" id="addMaterial">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <i class="pci-cross pci-circle"></i>
            </button>
            <h4 class="modal-title">Asignar material</h4>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <input type="hidden" name="docente_id" value="{{ $docente->id }}" />
            <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="demo-hor-inputemail">Equipo * </label>
              <div class="col-sm-9">
                <select name="material_didactico_id" required id="material" class="form-control">
                  <option value>[]</option>
                  @foreach ($grupo->books as $material)
                    <option value="{{ $material->id }}">
                      [{{ $material->codigo }}] {{ $material->titulo }} {{ $material->editorial }}
                    </option>
                  @endforeach
                </select>
                <span id='inputError'></span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
            <button type="submit" class="btn btn-primary">Asignar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endif

@endsection

@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#addMaterial").submit(function(event) {
        event.preventDefault();
        $inputEquipo = $(this).find("[name='material_didactico_id']")[0];

        if($inputEquipo.validity.valid) {
          $.ajax({
            url: window.URL_BASE + 'docente/addMaterialDocente',
            data: $(this).serializeArray(),
            type: 'POST'
          }).done(function(response) {
            swal(response.message, {
              icon: "success",
            }).then(function() {
              window.location.reload();
            });
          });
        } else {
          $inputError = $(this).find("#inputError");
          $($inputError)
            .addClass("has-error-input")
            .html($inputEquipo.validationMessage)
        }
      });

      $("#entregarMaterial").submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: window.URL_BASE + 'sendMaterialDidactico',
          data: $(this).serializeArray(),
          type: 'POST'
        }).done(function(response) {
          swal(response.message, {
            icon: "success",
          }).then(function() {
            window.location.reload();
          });
        })
      });
    });
  </script>
@endsection