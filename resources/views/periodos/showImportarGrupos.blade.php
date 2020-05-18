@extends('layouts.shared.appplantilla')
@section('links')
{{--	  <link href="{{ asset('demo/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">
--}}
	@endsection
@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->

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
        <li><a href=""><i class="demo-pli-home"></i></a></li>
        <li><a href="{{url('/')}}/grupos">Grupos</a></li>
        <li class="active">Traspaso</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content" >

    <!--col-md-12-->
    <!--===================================================-->
    <div class="col-md-12">
        <input type="text" hidden="true" name="path"  id="path" value="{{url('/')}}">
    <!--panel 1-->
    <!--===================================================-->
    <div class="panel" style="  background:#eeeeee{{----}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 500px;">

        <div class="panel-heading {{--bg-mint--}}" style="{{--background-color: white;--}} box-shadow: 0px 1px #bbb !important">
                <div class="panel-control">
                    <button id="btnup" class="btn btn-default btn-active-primary" ><i class="ion-chevron-up"></i></button>
                    <button id="btndown" class="btn btn-default btn-active-primary" ><i class="ion-chevron-down"></i></button>
                                                
                </div>			                        
            <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">IMPORTAR GRUPOS DE PERIODO ANTERIOR</strong></p></h3>

        </div>


        <!--Panel Body-->
        <!--===================================================-->
        <div class="panel-body " style="background-image: linear-gradient(#eeeeee 0.5%, #ffffff 0%);min-height: 500px;">
        <!--col-md-6-->
        <!--===================================================-->
        <div class="col-md-6" id="busquedas">
        <div class="{{--panel-group --}}" >
              <div class="panel {{--panel-default--}}">
                <div class="panel-heading bg-gray-dark" style="border: 1px solid #ccc;">
                      <div style="display: inline-block;width: 100%;">
                            
                          <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="" name="">
                           <strong style="font-size: 13px; " >BUSQUEDA</strong></p></h4>
                          
                      <h4 class="panel-title" align="right" style="float: right;" >
                          
                        <a data-toggle="collapse" href="#collapse1" class="colapOne" ><i class="ion-plus"></i></a>
                      </h4>
                      </div>
                </div>
                <div id="collapse1" class="panel-collapse collapse" style="border-bottom: 1px solid #ccc;">
                    <br>
                     <div class="row pad-btm form-inline">
                        <div class=" col-md-12">
                            <label for="" class="control-label text-main text-bold col-md-3">Cursos:</label>
                            <select class="form-control col-md-6" id="cursofiltro1" name="cursofiltro1">
                                 <option value="" selected="selected" disabled>Seleccione un curso</option>
                                 @forelse($cursos as $curso)
                                      <option value="{{$curso->id}}">{{$curso->nombreIdioma}} {{$curso->nombreModalidad}} {{$curso->turno}}
                                      </option>
                                    @empty
                                      @endforelse
                            </select>
                        </div>
                        <br>
                        <br>
                        <div class=" col-md-12">
                            <label for="" class="control-label text-main text-bold col-md-3">Categorias:</label>

                             <select class="form-control  col-md-6" id="categoriafiltro1" name="categoriafiltro1" >
                                 <option selected disabled label="Seleccione una categoria"></option>
                                 
                              </select>
                              
                        </div>
                        <br>
                        <br>
                        <div class=" col-md-12">
                            <label for="" class="control-label text-main text-bold col-md-3">Grupo:</label>

                             <select class="form-control  col-md-6" id="grupofiltro1" name="grupofiltro1" >
                                 
                                 <option value="" selected="selected" disabled>Seleccione un grupo</option>
                              </select>
                              
                        </div>
                        <div class=" col-md-12">
                            <br>
                            <div class="col-md-9"></div>
                            <button id="filtrarOne" name="filtrarOne"  class="btn btn-purple col-md-3" disabled="true"><i class="demo-pli-add"></i> Nuevo</button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            
        </div>
        
        <!--col-md-6-->
        <!--===================================================-->
        <div class="col-md-12">
        </div>	
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--col-md-6-->
        <!--===================================================-->
        <div class="col-md-6">    
            <div class="{{--panel-group --}}" >
              <div class="panel {{--panel-default--}}">
                <div class="panel-heading bg-primary" style="border: 1px solid #ccc;">
                      <div style="display: inline-block;width: 100%;">
                            
                          <h4 class="panel-title " style="display: inline-block"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="color:white;font-size: 13px; " >PERIODO ACTUAL</strong></p></h4>
                          
                      
                      </div>
                </div>
              </div>
            </div>
                <div class=" table-responsive">
                    <table id="" class="table table-striped row-border display"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                
                                <th class="text-left">Nombre</th>
                                
                                <th class="text-center">Categoria</th>
                                
                                <th class="text-left">Estado</th>
                                <th class="text-center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody id="tbodyOne" name="tbodyOne">
                            
                        </tbody>
                    </table>
                </div>
            
            </div>
            <!--col-md-6-->
            <!--===================================================-->	
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!--col-md-6-->
        <!--===================================================-->
        <div class="col-md-6">
            <div class="{{-- panel-group --}}" >
              <div class="panel {{--panel-default--}}">
                <div class="panel-heading bg-gray-dark" style="border: 1px solid #ccc;">
                      <div style="display: inline-block;width: 100%;">
                            
                          <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeonTwo" name="titleacordeonTwo"> <strong style="font-size: 13px; " >PERIODO ANTERIOR</strong></p></h4>
                          
                      <h4 class="panel-title" align="right" style="float: right;" >
                      <button id="btnrefresh" class="btn btn-trans btn-active-primary" ><i class="demo-psi-repeat-2"></i></button>
                   
                      {{--  <a data-toggle="collapse" href="#collapse2" class="colapTwo"><i class="ion-plus"></i></a> --}}
                      </h4>
                      </div>
                </div>
                <div id="collapse2" class="panel-collapse collapse" style="border-bottom: 1px solid #ccc;">
                    
                     
                </div>
              </div>
            </div>
            

                
                <div class=" table-responsive">
                    <table  class="table table-striped row-border display"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                
                                <th class="text-left">Nombre</th>
                                
                                <th class="text-center">Categoria</th>
                                
                                <th class="text-left">Estado</th>
                                <th class="text-center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody id="tbodyTwo" name="tbodyTwo">
                      
                        </tbody>
                    </table>
                </div>
            
            </div>
            <!--col-md-6-->	
        
        </div>
        <!--===================================================-->
        <!--End Panel Body-->
    {{-- aqui termina col 10 --}}
    </div>
    <!--===================================================-->
    <!--End Panel 1-->
    </div>
    <!--===================================================-->
    <!--End col-12-->



</div>
<!--===================================================-->
<!--End page content-->



<!--===================================================-->
<!--END CONTENT CONTAINER-->


<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="modalIngreso" name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog {{--modal-lg--}}">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header alert-primary" id="modalIngresoHeader" >
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar idioma</label></h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">
                {{--  <p class="text-semibold text-main">Bootstrap Modal Vertical Alignment Center</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                <br>
                <p class="text-semibold text-main">Popover in a modal</p>
                <p>This
                    <button class="btn btn-sm btn-warning demo-modal-popover add-popover" data-toggle="popover" data-trigger="focus" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="Popover Title">button</button>
                    should trigger a popover on click.
                </p>
                <br>
                <p class="text-semibold text-main">Tooltips in a modal</p>
                <p>
                    <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">This link</a> and
                    <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">that link</a> should have tooltips on hover.
                </p>
                --}}
                @include('configuracion.formIdioma')
            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                <button class="btn btn-primary" id="btnGuardar">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->



<!--INFO Bootstrap Modal-->
<!--===================================================-->
<div id="modalInfo" class="modal fade" tabindex="-1">
    <div class="modal-dialog {{--modal-lg--}}">
        <div class="modal-content">
            <div class="modal-header alert-info">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Datos de Estudiantes</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="table-responsive">
                    {{--<h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Informacion</h6>--}}
                    
                    <div class=" table-responsive">
                        <table  class="table table-striped row-border "  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; ">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    
                                    <th class="text-center">Nombre</th>
                                    
                                    <th class="text-center">Estado</th>
                                    <th class="text-center"></th>

                                </tr>
                            </thead>
                            <tbody id="tbodyThree" name="tbodyThree">
                        
                            </tbody>
                        </table>
                    </div>
                <!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>-->
                    </div>
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Large Bootstrap Modal-->


<!--DarBaja y Alta Bootstrap Modal-->
<!--===================================================-->
<div id="modalMsj" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog {{--modal-lg--}}">
        <div class="modal-content">
            <div class="modal-header alert-mint">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color: white;" id="modalMsjLabel">Importar Grupo</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <h5 id="txtModalBodyMsj" class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
                <p>Esta seguro de continuar con la accion?.</p></h5>
                    {{-- Este funciona para darle valor del id para dar baja o alta--}}
                 <form id="formmodalMsj" name="formmodalMsj">
                 <input type="" class="form-control" type="text"  id="txtnomboton" name="txtnomboton">
                  <input type="hidden" class="form-control" type="text"  id="registro_id" name="registro_id">
              </form>
              
                    
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" id="botoncerrar" type="button">Cerrar</button>
                <button class="btn btn-mint" id="btnGuardarTraspasar">Continuar</button>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End DarBaja y Alta Bootstrap Modal-->





@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
//$(".display").DataTable();
$.niftyNav('collapse');
//$.niftyNav('bind');
// $('table.display').DataTable().ajax.reload();

} );

$('#cursofiltro1').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    
    $('#categoriafiltro1').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursofiltro1').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro1').append(options);
    });
    console.log(valueSelected);
});

//categoriafiltro1 ==== idcursocategoria
$('#categoriafiltro1').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
         
   $("#filtrarOne").prop( "disabled", false ); 
   

});

$("#btnup").click(function () {
    $("#busquedas").hide();
});

$("#btndown").click(function () {
    $("#busquedas").show();
});
$("#btnrefresh").click(function () {
    $("#filtrarOne").click();
    $('#btnrefresh').attr("disabled", true);
    setTimeout(function () {
        
    $('#btnrefresh').attr("disabled", false);
    }, 5000);
});

$("#filtrarOne").click(function (e) {
    $("#btnup").click();
 $('.display').DataTable().destroy();//.clear().destroy();
  $(".colapOne").click();
  var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    $('#tbodyOne').empty();
    $('#tbodyTwo').empty();
    var formData = {
     //  numTable:1,
     cursofiltro:$('#cursofiltro1').val(),
     idcursocategoriafiltro:$('#categoriafiltro1').val(),
     //idgrupofiltro:$('#grupofiltro1').val(),
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/importar/obtenerGrupos";
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                //success data
                console.log(data);
                console.log(data['actual']); 
                $('#tbodyOne').append(data['anterior']);
                $('#tbodyTwo').append(data['actual']);
                $('#titleacordeon').html('<strong style="font-size: 13px;color:white" >'+data['periodoAntes']+'</strong>'); 
                $('#titleacordeonTwo').html('<strong style="font-size: 13px;" >'+data['periodoActual']+' (ACTUAL)</strong>'); 

                $(".display").DataTable();  
            
             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
            });

});

$(document).on('click','.verEstudiantes',function(e){
    var valueSelected = this.value;
   //$('.display').DataTable().destroy();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    $('#tbodyThree').empty();
    var formData = {
     // numTable:2,
      idgrupofiltro:valueSelected,
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/importar/obtenerEstudiantes";
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
              //success data
            console.log(data);
            if(data['msj']!=null){
              console.log(data['msj']);
              $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : ""+data['msj'],
                        closeBtn : false,
                        timer : 3000
                        });
            }else{
                console.log('Entroo a else');
                        
                $('#tbodyThree').append(data);
                        
             //$(".display").DataTable();
            }
            
         },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
            });
            $('#modalInfo').modal('show');

});

$(document).on('click','.traspasar',function(e){
 //$('#btnGuardarTraspasar').attr("disabled", false);
  var value =$(this);
  $("#modalMsj").modal('show');
   $("#txtModalBodyMsj").html('<p>El estudiante '+$(this).data('nombre')+' pasara a grupo <br>Esta seguro de continuar con la accion?.</p>');
   $("#txtnomboton").val($(this).val());
  
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#btnGuardarTraspasar").click(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
    $('#botoncerrar').click();
    var btn  = $("#txtnomboton").val();
    console.log(btn);
    //$('#tab'+btn).button('loading');
    $('#tab'+btn).attr("disabled", true);
    $('#tab'+btn).html("cargando..");
    var formData = {
     // numTable:2,
      idgrupofiltro:$("#txtnomboton").val(),
    }     
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/importar/importarGrupo";
          console.log(formData);
          
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
              //success data
            console.log(data);
            setTimeout(function () {
                //    $('#tab'+btn).button('reset');
                $('#tab'+btn).html("enviado");
                $('#tab'+btn).removeClass("btn-primary");
                $('#tab'+btn).addClass("btn-success");
                
                }, 5000);
            
             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema en la busqueda de grupos"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
            });   
    
     
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

</script>


@endsection