@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection
<?php
$jobs ='<div class="panel-body"><div class="panel-body"> <div class="row">
                            <div class="col-md-2"><label  class="" for="nombre_empresa_0">Nombre de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="nombre_empresa_0"  id="nombre_empresa_0" placeholder="ingrese nombre" required></div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-2"><label  class="" for="cargo_0">Cargo</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="cargo_0" id="cargo_0" placeholder="ingrese Apellido" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="fecha_entrada_0">fecha entrada</label></div>
                            <div class="col-md-4"><input  class="form-control" type="date" name="fecha_entrada_0" id="fecha_entrada_0" placeholder="ingrese Cedula" required></div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-2"><label  class="" for="checkbox_jobs_0">Trabajas aqui Actualmente?</label></div>
                            <div class="col-md-4"><input type="checkbox" value="1" id="checkbox_jobs_0"></div>
                         </div>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-4"><input id="fecha_salida_0" class="form-control" type="date" name="fecha_Salida_0" placeholder="ingrese Email" ></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa_0" id="direccion_empresa_0" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Observaciones</label></div>
                            <div class="col-md-4"><input  id="observaciones_0" class="form-control" type="text" name="observaciones_0" id="observaciones_0" placeholder="ingrese alguna observacion" required></div>
                        </div>
                        <br>


                        </div>
                        <div class="col-md-offset-5"><button class="btn btn-primary center"> Guardar y Continuar</button></div>

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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Datos Personales</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
            <form action="edituser/{{Auth::user()->id}}" method="post" >
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-body"> <div class="row">
                        <div class="col-md-1"><label  class="" for="nombre">Nombre</label></div>
                        <div class="col-md-4"><input id="nombre"  class="form-control" type="text" name="nombre" placeholder="ingrese nombre" value="{{ strtoupper( Auth::user()->name) }}"  required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="apellido">Apellido</label></div>
                        <div class="col-md-4"><input id="apellido"  class="form-control" type="text" name="apellido" placeholder="ingrese Apellido" value="{{ strtoupper(Auth::user()->apellido) }}"  required></div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="cedula">Cedula</label></div>
                        <div class="col-md-4"><input id="cedula"  class="form-control" type="number" name="cedula"  value="{{ strtoupper( Auth::user()->cedula) }}" placeholder="ingrese Cedula" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="email">Email</label></div>
                        <div class="col-md-4"><input id="email"  class="form-control" type="email" name="email" placeholder="ingrese Email" value="{{ Auth::user()->email }}" disabled required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"><label  class="" for="direccion">Direccion</label></div>
                        <div class="col-md-4"><input id="direccion"  class="form-control" type="text" name="direccion" value="{{ strtoupper( Auth::user()->direccion) }}" placeholder="ingrese Direccion" required></div>
                    </div>
                    <br>
                <div class="row">
                        <div class="col-md-1"><label  class="" for="direccion">Telefono</label></div>
                        <div class="col-md-4"><input id="telefono"  class="form-control" type="text" name="telefono" placeholder="ingrese Telefono" value="{{ Auth::user()->telefono }}"  required></div>
                    </div>
                <div class="col-md-offset-5"><button class="btn btn-primary center" id="guardardatos"> Guardar y Continuar</button>&nbsp;&nbsp;<a class="btn btn-default center" id="seguirdatos">Continuar sin guardar</a></div></div>
</form>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" id="experiencia_laboral" data-parent="#accordion" href="">Experiencia laboral</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            

                <?php echo $jobs;?>
                <div class="jobs_new">
                    {{--nuevos trabajos--}}

                </div>

                <div class=""> Desea agregar una nueva experiencia laboral?  <button id="jobs_plus" class="btn btn-success fa fa-plus fa-2x" aria-hidden="true"></button> &nbsp;<a class="btn btn-default center" id="seguirtrabajo">Continuar sin guardar</a></div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="">Estudios Realizados</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
           <div class="panel-body">
            <div class=""><kbd>Estudios</kbd></div> 

            

                <?php echo $estudies;?>

                 <div class="estudies_new">

                    {{--nuevos estudios--}}

                </div>
                 <div class=""> Desea agregar otro estudio realizado  <button id="estudies_plus" class="btn btn-success fa fa-plus fa-2x" aria-hidden="true"></button></div>
                

                
        </div>
      </div>
      </div>
    </div>
  </div> 
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

       var bt_count2 = 1;

       $("#estudies_plus").on('click',function(){

        $(".estudies_new").append('<kbd>Estudio adicional '+bt_count+'</kbd><div class="panel-body"><div class="panel-body"> <div class="row"><div class="col-md-2"><label  class="" for="nombre_institucion">Nombre de institucion</label></div><div class="col-md-4"><input  class="form-control" type="text" name="nombre_institucion_'+bt_count+'" placeholder="ingrese nombre de la institucion" required></div></div><br><div class="row "><div class="col-md-2"><label  class="" for="carrera">Carrera/Especialidad/Area</label></div><div class="col-md-4"><input  class="form-control" type="text" name="carrera_'+bt_count+'" placeholder="ingrese carrera/especialidad/area de estudio" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="fecha_ingreso_estudies">fecha de Ingreso</label></div><div class="col-md-4"><input  class="form-control" type="date" name="fecha_ingreso_estudies'+bt_count+'" id="fecha_ingreso_estudies'+bt_count+'" placeholder="ingrese Fecha de ingreso" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="">Estudias aqui Actualmente?</label></div><div class="col-md-4"><input type="checkbox" value="1" id="checkbox_estudies_'+bt_count+'"></div></div><div class="row"><div class="col-md-2"><label  class="" for="Fecha_egreso_institucion">fecha de egreso de la institucion</label></div><div class="col-md-4"><input id="Fecha_egreso_institucion_'+bt_count+'" class="form-control" type="date" name="Fecha_egreso_institucion'+bt_count+'" placeholder="ingrese Email" ></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div><div class="col-md-4"><input  class="form-control" type="text" id="direccion_institucion_'+bt_count+'" name="direccion_institucion_'+bt_count+'" placeholder="ingrese Direccion" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Observaciones</label></div> <div class="col-md-4"><input  class="form-control" type="text" name="observaciones_'+bt_count+'" id="observaciones_'+bt_count+'" placeholder="ingrese alguna observacion" required></div></div><br></div><div class="col-md-offset-5"><button class="btn btn-primary center" id="guardarestudies"> Guardar </button></div></div>');
        bt_count ++;
        console.log(bt_count);


       });

       $("#jobs_plus").on("click", function(){
           $(".jobs_new").append('<kbd>trabajo adicional '+bt_count2+'</kbd><div class="panel-body"><div class="panel-body"> <div class="row"><div class="col-md-2"><label  class="" for="nombre">Nombre de empresa</label></div><div class="col-md-4"><input  class="form-control" type="text" name="nombre_empresa_'+bt_count2+'"  id="nombre_empresa_'+bt_count2+'" placeholder="ingrese nombre" required></div></div><br><div class="row "><div class="col-md-2"><label  class="" for="apellido">Cargo</label></div><div class="col-md-4"><input  class="form-control" type="text" name="cargo_'+bt_count2+'"  id="cargo_'+bt_count2+'" placeholder="ingrese Apellido" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="cedula">fecha entrada</label></div><div class="col-md-4"><input  class="form-control" type="date" name="fecha_entrada_'+bt_count2+'  id="fecha_entrada_'+bt_count2+'" placeholder="ingrese Cedula" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Trabajas aqui Actualmente?</label></div><div class="col-md-4"><input type="checkbox" value="1" id="checkbox_jobs_'+bt_count2+'"></div></div><div class="row"><div class="col-md-2"><label  class="" for="email">fecha salida</label></div><div class="col-md-4"><input id="fecha_salida_jobs'+bt_count2+'" class="form-control" type="date" name="fecha_Salida_'+bt_count2+'" placeholder="" ></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div><div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa_'+bt_count2+'" id="direccion_empresa_'+bt_count2+'" placeholder="ingrese Direccion" required></div></div><br><div class="row"><div class="col-md-2"><label  class="" for="direccion">Observaciones</label></div> <div class="col-md-4"><input  class="form-control" type="text" name="observaciones_'+bt_count2+'" id="observaciones_'+bt_count2+'" placeholder="ingrese alguna observacion" required></div></div><br></div><div class="col-md-offset-5"><button id="guardarjobs" class="btn btn-primary center"> Guardar</button></div></div>'); 

        bt_count2 ++;
        console.log(bt_count);

                });

       $('#seguirdatos').on("click",function () {
           $('#collapse1').collapse();
           $('#collapse2').collapse();

       });
       $('#seguirtrabajo').on("click",function () {
           $('#collapse2').hide();
           $('#collapse3').collapse();

       });


       $('#guardardatos').on("click",function(){
        var nombre= $('#nombre').val();
        var apellido= $('#apellido').val();
        var email= $('#email').val();
        var cedula= $('#cedula').val();
        var direccion= $('#direccion').val();        
        var telefono= $('#telefono').val();

        if (nombre=='' || nombre==null  ) {
            alert('Por favor ingrese su nombre');
        }
        else if (apellido=='' || apellido==null  ) {
            alert('Por favor ingrese su apellido');
        }
        else  if (cedula=='' || cedula==null  ) {
            alert('Por favor ingrese su cedula');
        }
        else  if (email=='' || email==null  ) {
            alert('Por favor ingrese su email');
        }
        else if (direccion=='' || direccion==null  ) {
            alert('Por favor ingrese su direccion');
        }

        else if (telefono=='' || telefono==null  ) {
            alert('Por favor ingrese su telefono');
        }
        else{
            alert('Registro guardado con exito');

            $('#collapse1').collapse();
            $('#collapse2').collapse();
        }

       });

       $('#checkbox_jobs_0').on('change',function () {
         $('#fecha_salida_0').attr('disabled','disabled');
         $('#fecha_salida_0').val('');
       });

$('#experiencia_laboral').on("click",function () {
     var nombre= $('#nombre').val();
        var apellido= $('#apellido').val();
        var email= $('#email').val();
        var cedula= $('#cedula').val();
        var direccion= $('#direccion').val();        
        var telefono= $('#telefono').val();

        if (nombre=='' || nombre==null  ) {
            alert('Por favor ingrese su nombre');
        }
        else if (apellido=='' || apellido==null  ) {
            alert('Por favor ingrese su apellido');
        }
        else  if (cedula=='' || cedula==null  ) {
            alert('Por favor ingrese su cedula');
        }
        else  if (email=='' || email==null  ) {
            alert('Por favor ingrese su email');
        }
        else if (direccion=='' || direccion==null  ) {
            alert('Por favor ingrese su direccion');
        }

        else if (telefono=='' || telefono==null  ) {
            alert('Por favor ingrese su telefono');
        }
        else{

            $('#collapse1').collapse();
            $('#collapse2').collapse();
        }
    // body...
})
    </script>


@endsection