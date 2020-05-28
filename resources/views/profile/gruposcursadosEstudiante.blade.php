@extends('layouts.shared.appplantilla')

@section('content')
<?php use App\Http\Controllers\estudianteController;
	?>
<style type="text/css">
    
</style>
<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    {{--<div id="page-title">
        <h1 class="page-header text-overflow">kjk</h1>

    </div>--}}
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href=""><i class="demo-pli-home"></i></a></li>
        <li><a href="">Perfil</a></li>
        <li class="active">Información Personal</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>	

<!--Page content-->
<!--===================================================-->
<div id="page-content" >

    <!--Row Main Left COL-MD -->
    <!--===================================================-->
    <div class="row col-md-3">
        <input type="text" hidden="true"  name="path"  id="path" value="{{url('/')}}">
        <div class="panel" style=" border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;">
            <div class="panel-body ">
                <div class="panel-heading ">
                    <h4>Opciones	</h4>
                </div>
                <div class="row col-sm-12 col-lg-12">
                    <label for="" class="control-label text-main text-bold "></label>
                   
                                <div class="list-group">
                                 
                                    <a class="list-group-item  "  href="{{ url('/perfil' )}} "><li class="demo-pli-add"></li> INFORMACIÓN PERSONAL</a>
                                    <a class="list-group-item  list-group-item-primary"  href="{{ url('/perfil/cursadoEstudiante' )}}"><li class="demo-pli-add"></li> GRUPOS CURSADOS</a>
                                    <a class="list-group-item "  href="{{ url('/seguridad/password' )}}"><li class="demo-pli-add"></li> SEGURIDAD</a>
                                    
                                </div>
                            </div>
                <div class="row">
                    
                </div>
                <br>
                <hr>
                
    
                

                <br>
            </div><!--End Panel Body -->
        </div><!--End Pannel -->		
        <hr>
    </div>
    <!--End Main Left Row COL-MD -->
    <!--===================================================-->
    

    <!--Row Main Right COL-MD -->
    <!--===================================================-->
    <div class="row col-md-9">

        <!--Main Panel-->
        <!--===================================================-->
        <div class="panel" style=" background:#eee;border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important; min-height: 430px;">
            <div class="panel-heading " style="background-color: white; box-shadow: 0px 1px #bbb !important">
                <div class="panel-control ">
                   
                </div>
                <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">RECORD ACADEMICO</strong></p></h3>
                    
                
            </div>

            <!--Panel Body-->
            <!--===================================================-->
            <div class="panel-body">
                <div id="divCardsGrupos" class="" name="divCardsGrupos" {{--style="display: none;"--}}>
                
                    <div class="col-sm-12 col-md-12 {{----}}panel pos-rel" style="padding-bottom: 0px;padding-top:15px; border: 1px solid #ccc;box-shadow: 1px 1px 2px 0px #bbbbbb !important; border-radius: 5px; min-height: 400px{{----}}">
                        
                            <div class="panel {{--panel-default --}} ">
                            <div class="panel-heading bg-mint" style="border: 1px solid #ccc;">
                                <div style="display: inline-block;width: 100%;">
                                    
                                    <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="color:white;font-size: 13px; " >RECORD DE GRUPOS</strong></p></h4>
                                    
                                <h4 class="panel-title" align="right" style="float: right;" >
                                    
                                   {{-- <a data-toggle="collapse" href="#collapse1" class="colapOne" ><i class="ion-plus"></i></a> 
                                 <a  class="habilitar add-tooltip" data-original-title="Habilitar Campos"><i class="ion-edit"></i></a> --}}
                                 
                                   
                                </h4>
                                </div>
                            </div>
                            <div id="collapse1" class="panel-collapse " style="border-bottom: 1px solid #eee;">
                            <div class="row pad-btm {{--form-inline--}}">
                            
                                <div class="col-md-4  text-center">
                                
                                    <div class="pad-ver">
                                            <br>
                                          <img src="{{asset('profile-photos/calificacion.png')}}" class="img-lg img-circle" alt="Profile Picture" >
                                       
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <label for="" class="control-label text-main text-bold ">Idiomas</label>
                                        @foreach($idiomas as $idioma)
                                        <div class=" ">
                                            <button style="margin-bottom:1px"
                                             onclick="location.href='{{url('/')}}/perfil/cursadoEstudiante/idioma/{{$idioma->id}}';"  
                                             class="form-control btn btn-mint btn-hover-mint" type="button" placeholder="" id="" 
                                             name="" >
                                            {{$idioma->nombre}}
                                            </button>
                                          
                                  
                                        </div>
                                        @endforeach
                                     </div> 
                                </div>
                                <!-- col 9 ////////////////////////////////////////////////// -->
                               
                                <div class="col-md-8">  
                                
                                <br>
                                <div class=" col-md-12">
                                 <div style="display:none">
                                 {{$i=2}}
                                 <?php
                                    $seccion = array('1' =>'A' ,
                                            '2' =>'B' ,
                                            '3' =>'C' ,
                                            '4' =>'D' ,
                                            '5' =>'E' ,
                                            '6' =>'F' ,

                                        );

                                    ?>
                                 </div>
                                @forelse($estudiantegrupos as $estudiantegrupo)
                                @if($estudiantegrupo->grupos->nivels->ididiomas == $ididioma)
                                <div class="panel {{--panel-default --}} " style="margin:3px">
                            <div class="panel-heading bg-gray" style="border: 1px solid #ccc;height:30px">
                                <div style="display: inline-block;width: 100%;">
                                    
                                    <h4 class="panel-title " style="display: inline-block;margin-top:7px">
                                    <p align="left" class="text-xs text-bold media-heading mar-no {{--text-main--}}" id="titleacordeon" name="titleacordeon"> 
                                    <strong style="font-size: 11px; " class="text-muted" >
                                    {{$estudiantegrupo->grupos->nivels->idiomas->nombre}} NIVEL {{$estudiantegrupo->grupos->nivels->numNivel}}
                                     {{$seccion[$estudiantegrupo->grupos->numGrupo] }}</strong>
                                    </p>
                                    </h4>
                                    
                                <h4 class="panel-title" align="right" style="float: right;margin-top:-7px" >
                                    
                                   <a data-toggle="collapse" href="#collapse{{$i}}" class="colapOne">{{--<i class="ion-plus"></i>--}}
                                   <strong style="font-size: 11px; "> Ver notas</strong>
                                   </a> 
                                {{--  <a  class="habilitar add-tooltip" data-original-title="Habilitar Campos"><i class="ion-edit"></i></a> 
                                 
                                   --}}
                                </h4>
                                </div>
                            </div>
                            <div id="collapse{{$i}}" class="panel-collapse collapse " style="border-bottom: 1px solid #eee;">
                                    <table class="table {{--table-bordered--}}  table-sm ">
                                        
                                        <tbody>
                                        @if($estudiantegrupo->ponderacions === null)
                                        <tr>
                                                <td align="left"> 
                                                    <strong style="font-size: 11px;padding-left:40px " class="text-main text-m">
                                                    PONDERACIÓN
                                                    </strong>
                                                </td>
                                                <td>  
                                                    <strong style="font-size: 12px;padding-left:40px " class="text-muted text-m">
                                                    CALIFICACIÓN
                                                    </strong>
                                                </td>
                                            </tr> 
                                            @endif
                                         @forelse( $estudiantegrupo->ponderacions as $nota)
                                            <tr>
                                                <td> 
                                                    <strong style="font-size: 11px;padding-left:40px " class="text-main text-m">
                                                    ({{$nota->ponderacion}}%) {{strtoupper($nota->nombreEvaluacion)}}  
                                                    </strong>
                                                </td>
                                                <td>
                                                    <strong style="font-size: 12px;padding-left:40px " class="  text-muted text-m">
                                                    @if($estudiantegrupo->notaFinal!=0 )
                                                    {{ number_format($nota->pivot->nota,2)}}
                                                    @else N/A
                                                    @endif
                                                    </strong>
                                                </td>
                                            </tr> 
                                            @empty 
                                            <br><p align="center">
                                            <strong style="font-size: 12px; " class="text-muted text-m" >
                                            No hay notas asignadas
                                            </strong></p><br>
                                            @endforelse
                                            @if(!$estudiantegrupo->ponderacions && $estudiantegrupo->notaFinal!=0 )
                                            <tr>
                                                <td align="center"> 
                                                    <strong style="font-size: 11px;padding-left:-20px " class="text-main text-m">
                                                    TOTAL
                                                    </strong>
                                                </td>
                                                <td>  
                                                    <strong style="font-size: 12px;padding-left:40px " class="text-muted text-m">
                                                    {{$estudiantegrupo->notaFinal}}
                                                    </strong>
                                                </td>
                                            </tr> 
                                            @endif
                                        <tbody>
                                    </table>
                                      
                                        
                            </div>
                            </div>
                            <div style="display:none">{{{ $i++ }}}</div>
                            @endif
                            @empty 
                                            <br><p align="center">
                                            <strong style="font-size: 12px; " class="text-muted text-m" >
                                            No hay notas asignadas
                                            </strong></p><br>

                            @endforelse
                            </div>
                                <br>
                                
                                 <!--   <form id="formulario"> 
                                  
                                   
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">Contraseña:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="password" placeholder="" id="contrasenha" name="contrasenha" readonly>
                                         </div>  
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">Verificacion Contraseña:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="password" placeholder="" id="repetirContrasenha" name="repetirContrasenha" readonly>
                                        </div>
                                        
                                    </div>
                                
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class=" col-md-12"> 
                                        <div class=" col-md-9"></div>
                                        <div class=" col-md-3">
                                            <button type="button" align="right" class="btn btn-mint" id="enviar" name="enviar" value="1">ENVIAR<span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted" readonly></span></button>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <br>
                                    </form>-->
                                </div>
                                
                                <!-- col 9 ////////////////////////////////////////////////// -->
                            </div>
                        </div>
                    </div>
                    
                </div>  
            </div>
            <!--End Panel Body-->
            <!--===================================================-->

        </div>
        <!--End Main Panel-->
        <!--===================================================-->

    </div>
    <!--End Main Right COL-MD-->
    <!--===================================================-->


</div><!-- No se por que si lo pongo se me hace feo el disenho del footer===================================================-->
<!--End page content-->



<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="modalIngreso" 	name="modalIngreso" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true" >
    <div class="modal-dialog {{----}}modal-lg" >
        <div class="modal-content" style="background: {{ asset('demo/img/bg-img/1.jpg') }}">

            <!--Modal header-->
            <div class="modal-header alert-primary" id="modalIngresoHeader" >
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color: white;" id="modalIngresoLabel"><label>Ingresar Estudiante</label></h4>
            </div>

            <!--Modal body-->
            <div class="modal-body "  style="overflow-y: auto;  max-height: 500px;{{--background:#eee;--}}"	>
                
                @include('curso.formCurso')
            </div>

            {{----}}<!--Modal footer-->
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
            <div class="modal-header alert-info" id="infoModalHeader">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color: white;" id="myLargeModalLabel">Horarios</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="table-responsive">
                    <h6 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">Horarios <button class="btn btn-icon btn-trans btn-xs  add-tooltip modificarHorarios" id="botonEditarHorario" name="botonEditarHorario" data-original-title="Editar Horarios" data-container="body" value="1"><i class="demo-psi-pen-5 icon-xs " ></i></button>
</h6>

                    
                    <form id="formEditarHorarios">
                        <input type="number"  name="idCursosEditarHorarios" id="idCursosEditarHorarios" placeholder="idCursosEditarHorarios">
                        <input type="number"  name="countDiasHorarios" id="countDiasHorarios" placeholder="countDiasHorarios">
                    <table   class="table {{--table-bordered--}} table-striped table-sm " align="center">
                            <tbody id="tablainfo">
                                <th>
                                    
                                        <td>ds</td>
                                    
                                </th>
                                <tr>
                                <td></td> 
                                </tr>
                            </tbody>
                    </table>
                </form>
                <!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>-->
                    </div>
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                <button class="btn btn-mint " hidden="true" id="btnGuardarHorarios" >Modificar</button>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Large Bootstrap Modal-->


<!--DarBaja y Alta Bootstrap Modal-->
<!--===================================================-->
<div id="modalMsj" class="modal fade" tabindex="-1">
    <div class="modal-dialog {{--modal-lg--}}">
        <div class="modal-content">
            <div class="modal-header alert-danger">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color: white;" id="modalMsjLabel">Cambio Estado de Curso{{--Categoria--}}</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <h5 class="card-subtitle mb-2 text-muted" style="font-weight:bold;">
                <div id="msjAB"><p>Esta seguro de continuar con la acción?.</p>
                </div>
                </h5>
                    {{-- Este funciona para darle valor del id para dar baja o alta--}}
                 <form>
                 <input  class="form-control" type="text"  id="estadoAB" name="estadoAB">
                  <input  class="form-control" type="text"  id="registro_id" name="registro_id">
              </form>
              
                    
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                {{--<button class="btn btn-danger" id="btnGuardarMsj">Continuar</button>--}}
                <button class="btn btn-danger" id="btnGuardarMsjMotivo">Continuar</button>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End DarBaja y Alta Bootstrap Modal-->

@endsection

@section('script')
<!--<script src="{{ asset('demo/plugins/fooTable/dist/footable.all.min.js') }}"></script>
<script src="{{ asset('demo/js/demo/tables-footable.js') }}"></script>

<script src="{{asset('js/curso.js')}}"></script>-->
<script type="text/javascript">


</script>




@endsection