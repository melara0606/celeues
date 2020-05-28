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
                                 
                                    <a class="list-group-item  list-group-item-primary"  href="{{ url('/perfil' )}} "><li class="demo-pli-add"></li> INFORMACIÓN PERSONAL</a>
                                    <a class="list-group-item "  href="{{ url('/seguridad/password' )}} "><li class="demo-pli-add"></li> SEGURIDAD</a>
                                    
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
                <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">INFORMACION PERSONAL</strong></p></h3>
                    
                
            </div>

            <!--Panel Body-->
            <!--===================================================-->
            <div class="panel-body">
                <div id="divCardsGrupos" class="" name="divCardsGrupos" {{--style="display: none;"--}}>
                
                    <div class="col-sm-12 col-md-12 {{----}}panel pos-rel" style="padding-bottom: 0px;padding-top:15px; border: 1px solid #ccc;box-shadow: 1px 1px 2px 0px #bbbbbb !important; border-radius: 5px; min-height: 400px{{----}}">
                        
                            <div class="panel {{--panel-default --}} ">
                            <div class="panel-heading bg-dark" style="border: 1px solid #ccc;">
                                <div style="display: inline-block;width: 100%;">
                                    
                                    <h4 class="panel-title " style="display: inline-block;"><p align="left" class="text-m text-bold media-heading mar-no text-main" id="titleacordeon" name="titleacordeon"> <strong style="color:white;font-size: 13px; " >INFORMACIÓN DOCENTE</strong></p></h4>
                                    
                                <h4 class="panel-title" align="right" style="float: right;" >
                                    
                                   {{-- <a data-toggle="collapse" href="#collapse1" class="colapOne" ><i class="ion-plus"></i></a> --}}
                                </h4>
                                </div>
                            </div>
                            <div id="collapse1" class="panel-collapse " style="border-bottom: 1px solid #ccc;">
                            <div class="row pad-btm {{--form-inline--}}">
                            
                                <div class="col-md-3  text-center">
                                    <div class="pad-ver">
                                        @if($docente->genero=='MASCULINO')
                                          <img src="{{asset('profile-photos/1.png')}}" class="img-lg img-circle" alt="Profile Picture" >
                                        @else
                                         <img src="{{asset('profile-photos/9.png')}}" class="img-lg img-circle" alt="Profile Picture" >
                                        @endif
                                    </div>
                                </div>
                                <!-- col 9 ////////////////////////////////////////////////// -->
                               
                                <div class="col-md-9">
                               
                                <br>
                                    <form id="formEstudiante">
                                    <div class=" col-md-12">
                                        <label  class="control-label text-main text-bold col-md-2">NOMBRE:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="text" placeholder="Ingrese nombre de estudiante" id="nombre" name="nombre" value="{{ strtoupper($docente->nombre)}} {{ strtoupper($docente->apellido)}} " readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-md-12 ">
                                        <label for="nombre" class="control-label text-main text-bold col-md-2">GÉNERO:</label>
                                        <div class=" col-md-10">
                                            <select class="form-control" id="genero" name="genero" value="{{$docente->genero}}" readonly>
                                                <option value="MASCULINO">MASCULINO</option>
                                                <option value="FEMENINO">FEMENINO</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                 
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">DUI:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="text" placeholder="" id="dui" name="dui" value="{{$docente->dui}}" readonly>
                                         </div>  
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">NIT:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="text" placeholder="" id="nit" name="nit" value="{{$docente->nit}}" readonly>
                                         </div>  
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">EMAIL:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="email" placeholder="" id="email" name="email" value="{{$docente->email}}" readonly>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">TELÉFONO:</label>
                                        <div class=" col-md-10">
                                            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="####-####" value="{{$docente->telefono}}" readonly>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-2">No. CUENTA:</label>
                                        <div class=" col-md-10">
                                            <input class="form-control" type="text" placeholder="" id="ncuenta" name="ncuenta" value="{{$docente->ncuenta}}" readonly>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <br>
                                    
                                    <!--<br>
                                    <br>
                                    <div class=" col-md-12">
                                        <label for="" class="control-label text-main text-bold col-md-3">ESTADO:</label>

                                        <label class="control-label  text-bold col-md-9"> </label> 
                                        @if($docente->estado=='ACTIVO')
                                        <div class="label label-table bg-mint col-md-9">
                                            <div class="text-sm text-bold">
                                            {{$docente->estado}}
                                            </div>
                                        </div>
                                        @endif
                                        @if($docente->estado=='INACTIVO')
                                        <div class="label label-table bg-gray col-md-9">
                                            <div class="text-sm text-bold">
                                            {{$docente->estado}}
                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>-->
                                    <br>
                                    <br>
                                    </form>
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
<!--<script src="{{asset('js/curso.js')}}"></script>
<script type="text/javascript">
     
</script>-->




@endsection