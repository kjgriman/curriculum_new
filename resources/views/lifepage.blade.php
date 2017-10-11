
@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection
<?php
$jobs ='';

$estudies =' <div class="panel-body"><div class="panel-body"> <div class="row">
                            <div class="col-md-2"><label  class="" for="nombre">Nombre de institucion</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="nombre_institucion[]" placeholder="ingrese nombre de la institucion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="apellido">Carrera/Especialidad/Area</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="carrera[]" placeholder="ingrese Carrera/Especialidad/Area<" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="cedula">fecha entrada</label></div>
                            <div class="col-md-4"><input  class="form-control" type="date" name="fecha_entrada[]" placeholder="fecha de ingreso" required></div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-2"><label  class="" for="direccion">Estudia aqui Actualmente?</label></div>
                            <div class="col-md-4"><input type="checkbox" value="1" id="checkbox_studies" name="checkbox_studies[]" ></div>
                         </div>
                         <div class="row " id="estudies">
                            <div class="col-md-2"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-4"><input id="fecha_salida_estudies" class="form-control" type="date" name="fecha_Salida[]" placeholder="ingrese fecha de egreso" ></div>
</div>


                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="direccion_empresa[]" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><label  class="" for="direccion">Titulo Obtenido</label></div>
                            <div class="col-md-4"><input  class="form-control" type="text" name="observaciones[]" placeholder="ingrese titulo obtenido" required></div>
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
    <div id="mensaje" class="hidden"></div>
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Datos Personales</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
            <form id="formdata"  >
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-body"> <div class="row">
                        <div class="col-md-1"><label  class="" for="nombre">Nombre</label></div>
                        <div class="col-md-4"><input id="nombre"  class="form-control" type="text" name="name" placeholder="ingrese nombre" value="{{ strtoupper( Auth::user()->name) }}"  required></div>
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
                        <div class="col-md-4"><input id="telefono"  class="form-control" type="number" name="telefono" placeholder="ingrese Telefono" value="{{ Auth::user()->telefono }}"  required></div>
                    </div>
                <div class="col-md-offset-5"><a class="btn btn-primary center" onclick="edituser({{Auth::user()->id}})" id="guardardatos"> Guardar y Continuar</a>&nbsp;&nbsp;<a class="btn btn-default center" id="seguirdatos">Continuar sin guardar</a></div></div>
</form>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" id="experiencia_laboral" data-parent="#accordion" href="#collapse2">Experiencia laboral</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            
        <form action="create_jobs" method="POST">  

                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
               
                <div class="jobs_new">
                    <div class="container">
  
          
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="bg bg-danger">Empresa</th>
        <th class="bg bg-danger">Cargo</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody id="row1">
        @if (count($data2)==0)
        <h5 class="alert alert-danger">Aun no ha registrado ninguna experiencia laboral</h5>
        @endif
        @foreach($data2 as $key => $value)
      <tr id="row2">
        <td>{{$value->name_company}}</td>
        <td>{{$value->cargo}}</td>
        <th><button class="btn btn-danger">Eliminar</button></th>
                 
      </tr>
      @endforeach
     
    </tbody>
  </table> <a data-toggle="modal" data-target="#myModal" class="btn btn-success">Agregar</a>
               
</div>              

                </div>


       </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Estudios Realizados</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
           <div class="panel-body">
            <div class=""><kbd>Estudios</kbd></div> 

            

                
        </div>
      </div>
      </div>
    </div>
  </div> 
</div>

</div>



<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content"><div id="eliminado2" class="hidden"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Nueva Experiencia Laboral</h4>
                </div>
                <form id="form_crearjob" action="create_jobs" method="post" >
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="panel-body"><div class="panel-body"> <div class="row">
                            <div class="col-md-4"><label  class="" for="nombre_empresa_0">Nombre de empresa</label></div>
                            <div class="col-md-8"><input  class="form-control" type="text" name="name_company"  id="nombre_empresa_0" placeholder="ingrese nombre" required></div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-4"><label  class="" for="cargo_0">Cargo</label></div>
                            <div class="col-md-8"><input  class="form-control" type="text" name="cargo" id="cargo_0" placeholder="ingrese Apellido" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4"><label  class="" for="fecha_entrada_0">fecha entrada</label></div>
                            <div class="col-md-8"><input  class="form-control" type="date" name="date_in" id="fecha_entrada_0" placeholder="ingrese Cedula" required></div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-4"><label  class="" for="checkbox_jobs_0">Trabajas aqui Actualmente?</label></div>
                            <div class="col-md-8"><input type="checkbox" value="1" id="checkbox_jobs_0" name="checkbox_jobs"></div>
                         </div>
                        <div class="row">
                            <div class="col-md-4"><label  class="" for="email">fecha salida</label></div>
                            <div class="col-md-8"><input id="fecha_salida_0" class="form-control" type="date" name="date_out" placeholder="ingrese Email" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"><label  class="" for="direccion">Direccion de empresa</label></div>
                            <div class="col-md-8"><input  class="form-control" type="text" name="ubication_company" id="direccion_empresa" placeholder="ingrese Direccion" required></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"><label  class="" for="direccion">Observaciones</label></div>
                            <div class="col-md-8"><input  id="observaciones" class="form-control" type="text" name="observation" id="observaciones_0" placeholder="ingrese alguna observacion" required></div>
                        </div>
                        <br>


                        </div>
                         <div class="col-md-4 col-md-offset-8"><a class="btn btn-primary center" onclick="create_jobs()" id="guardardatos"> Guardar y Continuar</a></div>

                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
                </form>
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

    

       $('#seguirdatos').on("click",function () {
           $('#collapse1').collapse();
           $('#collapse2').collapse();

       });
       $('#seguirtrabajo').on("click",function () {
           $('#collapse2').hide();
           $('#collapse3').collapse();

       });

function edituser(id_user){
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
            var data=$('#formdata').serialize();
            console.log(data);
                $.ajax({
                url:"edituser/"+id_user+"",
                method:'POST',

                data: data,
                
                success: function( result, statusText ) {
                   console.log('exitoso');
                    $('#mensaje').append('<h3>'+statusText+' los datos se guardaron exitosamente<h3>').attr('class','alert alert-success');
                    $("#mensaje").delay(2000).hide(100);
//                    $("#mensaje").attr('class','hidden');

            $('#collapse1').collapse();
            $('#collapse2').collapse();

                   
                },
                complete: function(){

                    // Handle the complete event
                },
                error: function(xhr,statusText){
                   console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                    $('#mensaje').append('<h3>'+statusText+' <h3>').attr('class','alert alert-danger');
                    $("#mensaje").delay(2000).hide(100);
                    // Handle the complete event
                }
            });

        }

       };

       function create_jobs(){
       
            var data1=$('#form_crearjob').serialize();
            console.log(data1);
                $.ajax({
                url:"create_jobs",
                method:'POST',

                data: data1,
                
                success: function( result, statusText ) {
                   console.log('exitoso');
                   $('#row1').load('show_jobs','data4');
                   console.log(result)
//                     $('#mensaje').append('<h3>'+statusText+' los datos se guardaron exitosamente<h3>').attr('class','alert alert-success');
//                     $("#mensaje").delay(2000).hide(100);
// //                    $("#mensaje").attr('class','hidden');

           

                   
                },
                complete: function(){

                    // Handle the complete event
                },
                error: function(xhr,statusText){
                   console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                  
                }
            });

        

       };
       




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