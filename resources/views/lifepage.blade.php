@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection
<?php
$jobs ='<div class="panel-body"><div class="panel-body"> <div class="row">
                            <div class="col-md-2"><label  class="" for="nombre">Nombre de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="nombre_empresa_0" placeholder="ingrese nombre" required></div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-2"><label  class="" for="apellido">Cargo</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="cargo_0" placeholder="ingrese Apellido" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="cedula">fecha entrada</label></div>
                            <div class="col-md-4"><input  class="form-control" type="date" name="fecha_entrada_0" placeholder="ingrese Cedula" required></div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-2"><label  class="" for="direccion">Trabajas aqui Actualmente?</label></div>
                            <div class="col-md-4"><input type="checkbox" value="1" id="checkbox_jobs_0"></div>
                         </div>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-4"><input id="fecha_salida_jobs" class="form-control" type="date" name="fecha_Salida_0" placeholder="ingrese Email" ></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa_0" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Observaciones</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="observaciones_0" placeholder="ingrese alguna observacion" required></div>
                        </div>
                        <br>


                        </div>
                        <div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar</button></div>

                        </div>';

$estudies =' <div class="panel-body"><div class="panel-body"> <div class="row">
                            <div class="col-md-2"><label  class="" for="nombre">Nombre de institucion</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="nombre_institucion" placeholder="ingrese nombre de la institucion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="apellido">Carrera/Especialidad/Area</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="carrera" placeholder="ingrese Carrera/Especialidad/Area<" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="cedula">fecha entrada</label></div>
                            <div class="col-md-4"><input  class="form-control" type="date" name="fecha_entrada" placeholder="fecha de ingreso" required></div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-2"><label  class="" for="direccion">Estudia aqui Actualmente?</label></div>
                            <div class="col-md-4"><input type="checkbox" value="1" id="checkbox_studies"></div>
                         </div>
                         <div class="row " id="estudies">
                            <div class="col-md-2"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-4"><input id="fecha_salida_estudies" class="form-control" type="date" name="fecha_Salida" placeholder="ingrese fecha de egreso" ></div>
</div>


                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Titulo Obtenido</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="observaciones" placeholder="ingrese titulo obtenido" required></div>
                        </div>
                        <br>
                        <div class="row">

                        </div>

                        </div>
                        <div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar</button></div>
                        </div>';
?>

@section('main-content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class=""><h3>Hoja de vida <small>Su id es: {{ Auth::user()->id}}</small></h3> </div>
        <hr>

        <br>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Datos Personales</a>
                    <span class="hidden-xs"></span>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body"> <div class="row">
                        <div class="col-md-1"><label  class="" for="nombre">Nombre</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="nombre" placeholder="ingrese nombre" value="{{ Auth::user()->name }}" disabled></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="apellido">apellido</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="apellido" placeholder="ingrese Apellido" value="{{ Auth::user()->apellido }}" required></div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="cedula">Cedula</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="cedula" placeholder="ingrese Cedula" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="email">Email</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="email" placeholder="ingrese Email" value="{{ Auth::user()->email }}" disabled></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="direccion">Direccion</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="direccion" placeholder="ingrese Direccion" required></div>
                    </div>
                    <br>
                <div class="row">
                        <div class="col-md-1"><label  class="" for="direccion">Telefono</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="telefono" placeholder="ingrese Telefono" value="{{ Auth::user()->telefono }}" disabled required></div>
                    </div>
                <div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar</button></div></div>
            </div>



        <div class="panel panel-default">
            <div class="panel-heading ">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Experiencia laboral</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
<?php echo $jobs;?>
                <div class="jobs_new">
                    {{--nuevos trabajos--}}

                </div>

                <div class=""> Desea agregar una nueva experiencia labioral?  <button id="jobs_plus" class="btn btn-success fa fa-plus fa-2x" aria-hidden="true"></button></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Estudios Realizados</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo $estudies;?>

                </div>
            </div></div>
        </div> </div>
    </div>






</div>

    <script>

       $("#checkbox_studies").change("checked", function(){
            $('#fecha_salida_estudies').attr('disabled','disabled');
        });
        $("#checkbox_jobs").change("checked", function(){
                    $('#fecha_salida_jobs').attr('disabled','disabled');
                });
//
//        $("#jobs_plus").on("click", function(){
//                    $('.jobs_new').html('<div>hollaaaa</div>');
//                });

       var bt_count = 1;

       $("#jobs_plus").on("click", function(){
           $(".jobs_new").after('<div class="panel-body"><div class="panel-body"> <div class="row"><div class="col-md-2"><label  class="" for="nombre">Nombre de empresa</label></div><div class="col-md-4"><input  class="form-control" type="text" name="nombre_empresa_'+bt_count+'" placeholder="ingrese nombre" required></div></div><br><div class="row "><div class="col-md-2"><label  class="" for="apellido">Cargo</label></div><div class="col-md-4"><input  class="form-control" type="text" name="cargo_'+bt_count+'" placeholder="ingrese Apellido" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="cedula">fecha entrada</label></div><div class="col-md-4"><input  class="form-control" type="date" name="fecha_entrada_'+bt_count+'" placeholder="ingrese Cedula" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Trabajas aqui Actualmente?</label></div><div class="col-md-4"><input type="checkbox" value="1" id="checkbox_jobs_'+bt_count+'"></div></div><div class="row"><div class="col-md-2"><label  class="" for="email">fecha salida</label></div><div class="col-md-4"><input id="fecha_salida_jobs" class="form-control" type="date" name="fecha_Salida_'+bt_count+'" placeholder="ingrese Email" ></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div><div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa_'+bt_count+'" placeholder="ingrese Direccion" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Observaciones</label></div> <div class="col-md-4"><input  class="form-control" type="text" name="observaciones_'+bt_count+'" placeholder="ingrese alguna observacion" required></div></div><br></div><div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar</button></div></div>');      });



    </script>


@endsection