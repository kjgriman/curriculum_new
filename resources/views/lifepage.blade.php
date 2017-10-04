@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection
<?php
$jobs =' <div class="panel-body"><div class="panel-body"> <div class="row">
                            <div class="col-md-2"><label  class="" for="nombre">Nombre de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="nombre_empresa" placeholder="ingrese nombre" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="apellido">Cargo</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="cargo" placeholder="ingrese Apellido" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="cedula">fecha entrada</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="fecha_entrada" placeholder="ingrese Cedula" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="fecha_Salida" placeholder="ingrese Email" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Observaciones</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="observaciones" placeholder="ingrese Telefono" required></div>
                        </div></div>
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
                            <div class="col-md-4"><input  class="form-control" type="text" name="fecha_entrada" placeholder="ingrese Cedula" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="fecha_Salida" placeholder="ingrese Email" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Titulo Obtenido</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="observaciones" placeholder="ingrese Telefono" required></div>
                        </div></div>
                        <div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar</button></div>
                        </div>';
?>

@section('main-content')
    <div class="container">
        <div class=""><h3>Hoja de vida </h3> <small>Su id es: {{ Auth::user()->id }}</small></div>
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
                        <div class="col-md-4"><input  class="form-control" type="text" name="nombre" placeholder="ingrese nombre" value="{{ Auth::user()->name }}" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="apellido">apellido</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="apellido" placeholder="ingrese Apellido" required></div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="cedula">Cedula</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="cedula" placeholder="ingrese Cedula" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="email">Email</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="email" placeholder="ingrese Email" value="{{ Auth::user()->email }}" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="direccion">Direccion</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="direccion" placeholder="ingrese Direccion" required></div>
                    </div>
                    <br>
                <div class="row">
                        <div class="col-md-1"><label  class="" for="direccion">Telefono</label></div>
                        <div class="col-md-4"><input  class="form-control" type="text" name="telefono" placeholder="ingrese Telefono" required></div>
                    </div></div>
                <div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar</button></div>
            </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Experiencia laboral</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
<?php echo $jobs;?>
    <hr>
                <div class="alert"> Desea agregar una nueva experiencia labioral?  <button id="jobs_plus" class="fa fa-plus fa-2x" aria-hidden="true"></button></div>
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
            </div>
        </div>
    </div>






</div>
@endsection