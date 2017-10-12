
@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection
<?php
$jobs ='';

$estudies =' ';
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
                <div class="col-md-offset-5"><a class="btn btn-primary center" onclick="edituser({{Auth::user()->id}})" id="guardardatos"><span class="fa fa-save"></span> Guardar y Continuar</a>&nbsp;&nbsp;<a class="btn btn-default center" id="seguirdatos"><span class="fa fa-arrow-down"></span> Continuar sin guardar</a></div></div>
</form>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
            <div id="message1" class="hidden"></div>
          <a data-toggle="collapse" id="experiencia_laboral" data-parent="#accordion" href="#collapse2">Experiencias laborales</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            
        <form action="create_jobs" method="POST">  

                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                <div class="jobs_new">
                     <table class="table table-hover">
                        <thead>
                          <tr>
                            <th class="bg bg-danger">Empresa</th>
                            <th class="bg bg-danger">Cargo</th>
                            <th class="bg bg-danger"></th>
                            
                          </tr>
                        </thead>
                        <tbody id="row1">
                            
                            @if (count($data2)==0)
                                <h5 id="message3" class="alert alert-danger">Aun no ha registrado ninguna experiencia laboral</h5>
                            @endif
                            @foreach($data2 as $key => $value)
                          <tr id="row2_{{$key}}">
                            <td>{{$value->name_company}}</td>
                            <td>{{$value->cargo}}</td>
                            <td align="right"><a onclick="deleteJob({{ $value->id_jobs }},'{{ $key }}')" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar</a>
                            </td>
                                     
                          </tr>
                          @endforeach
                         
                        </tbody>
                      </table> <a data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-plus"></span> Agregar</a>
                              
                    <div class="container">
  
                          
                                
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
            <!-- estudios  -->

             <form >  

                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                <div class="jobs_new">
                     <table class="table table-hover">
                        <thead>
                          <tr>
                            <th class="bg bg-danger">Universidad/Instituto</th>
                            <th class="bg bg-danger">Carrera/Especialidad/Area</th>
                            <th class="bg bg-danger">Estatus</th>
                            <th class="bg bg-danger">Pomedio de notas</th>
                            <th class="bg bg-danger"></th>
                            
                          </tr>
                        </thead>
                        <tbody id="row3">
                            
                            @if (count($data4)==0)
                                <h5 id="message3" class="alert alert-danger">Aun no ha registrado ninguna experiencia laboralingun estudio realizado</h5>
                            @endif
                            @foreach($data4 as $key2 => $value2)
                          <tr id="row3_{{$key2}}">
                            <td>{{$value2->name_institute}}</td>
                            <td>{{$value2->career}}</td>
                            <td>{{$value2->status_studies}}</td>
                            <td>{{$value2->note_average}}</td>
                            <td align="right"><a onclick="deleteStudies({{ $value2->id_studies }},'{{ $key2 }}')" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar</a>
                               </td>
                                     
                          </tr>
                          @endforeach
                         
                        </tbody>
                      </table> <a data-toggle="modal" data-target="#myModal2" class="btn btn-success"><span class="fa fa-plus"></span> Agregar</a>
                              
                    <div class="container">
  
                          
                                
                    </div>
                </div>


       </form>
            



            

                
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
            <div class="modal-content"><div id="message" class="hidden"></div>
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
                            <div class="col-md-4"><label  class="" for="direccion">Descripción de responsabilidades
</label></div>
                            <div class="col-md-8"><input  id="observaciones" class="form-control" type="text" name="observation" id="observaciones_0" placeholder="ingrese alguna observacion" required></div>
                        </div>
                        <br>


                        </div>
                         <div class="col-md-4 col-md-offset-8"><a class="btn btn-primary center" onclick="create_jobs()" id="guardardatos"><span class="fa fa-save"></span> Guardar y Continuar</a></div>

                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal de estudios realizados -->

    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content"><div id="messagestudies" class="hidden"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar estudios realizados</h4>
                </div>
                        <form id="formdata_studies" action="create_studies" method="post">

                   
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="panel-body"><div class="panel-body">
                             <div class="row">
                                <div class="col-md-4"><label  class="" for="type_studies">Tipo de estudio</label></div>
                                
                                <div class="col-md-8">
                                    <select class="form-control" placeholder="seleccione" name="type_studies" id="type_studies" required>
                                            <option value="0">Seleccione...</option>                                   
                                            <option value="primario">Primario</option>
                                            <option value="secundario">Secundario</option>
                                            <option value="terciario">Terciario</option>
                                            <option value="universitario">Universitario</option>
                                            <option value="postgrado">Postgrado</option>
                                            <option value="maestria">Maestria</option>
                                            <option value="doctorado">Doctorado</option>
                                       

                                     </select>
                                </div> 
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="status_studies">Estatus</label></div>
                                
                                <div class="col-md-8">
                                    <select class="form-control" name="status_studies" id="status_studies" required>
                                            <option value="0">Seleccione...</option>                                   
                                            <option value="en curso">En curso</option>
                                            <option value="culminado">Culminado</option>
                                            <option value="abandonado">Abandonado</option>
                                     </select>
                                </div> 
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="career">Carrera/Especialidad/area</label></div>
                                
                                <div class="col-md-8">
                                    <input type="career" class="form-control" name="career" id="career" type="text" placeholder="ingrese nombre de carrera especialidad o area de estudio" required>
                                </div> 
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="name_institute">Nombre Institucion academica</label></div>
                                
                                <div class="col-md-8">
                                    <input type="career" class="form-control" name="name_institute" id="name_institute" type="text" placeholder="ingrese nombre de la institucion" required>
                                </div> 
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="date_in_studies">Fecha Ingreso</label></div>
                                <div class="col-md-8"><input  class="form-control" type="date" name="date_in_studies" id="date_in_studies"  required></div>
                            </div>
                            <br>                            
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="date_out_studies">Fecha Egreso</label></div>
                                <div class="col-md-8"><input id="date_out_studies" class="form-control" type="date" name="date_out_studies" required>
                                </div>
                            </div>
                            <br>                            
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="ubication_institute">Ubicacion de institucion</label></div>
                                <div class="col-md-8"><input id="ubication_institute" class="form-control" type="text" name="ubication_institute" placeholder="Ingrese la ubicacion de la institucion" required>
                                </div>
                            </div>
                            <br>                            
                            <div class="row">
                                <div class="col-md-4"><label  class="" for="note_average">Promedio de Notas</label></div>
                                <div class="col-md-8"><input id="note_average" placeholder="Ingresesu promedio de notas" class="form-control" type="text" name="note_average" required>
                                </div>
                            </div>

                            <br>
                            </div>
                            <div class="col-md-4 col-md-offset-8"><a class="btn btn-primary center" onclick="create_estudies()" id="guardardatos"><span class="fa fa-save"></span> Guardar y Continuar</a></div>
<input type="submit" name="enviar">
                            </div>


<div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                        </div>
                         </form>
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



if( $('#checkbox_jobs_0').is(':checked') ){
    console.log('boton chequeado');
        // Hacer algo si el checkbox ha sido seleccionado
var date_out='2099-12-31';
console.log(date_out);
        
    } else {
          console.log('boton deseleccionado');
        // Hacer algo si el checkbox ha sido deseleccionado
        var date_out=$('#fecha_salida_0').val();
        console.log(date_out);
    }
      
            var date_in=$('#fecha_entrada_0').val();

           var date_epoch_in = new Date(date_in).getTime() / 1000;
           var date_epoch_out = new Date(date_out).getTime() / 1000;

            console.log(date_in);
            console.log(date_epoch_in);
            console.log(date_epoch_out);

            if(date_epoch_out>date_epoch_in){
                $.ajax({
                url:"create_jobs",
                method:'POST',

                data: data1,
                
                success: function( result, statusText ) {
                   console.log('exitoso');
                   $('#row1').load('show_jobs','valuerefresh');
                   // console.log(result);
                   $('#messagestudies').delay(100).show(100)
                   $('#messagestudies').attr('class','alert alert-success');
                   $('#messagestudies').html('Registro Exitoso....!');
                   console.log('ok1');
                   $('#messagestudies').delay(2000).hide(600);
                    console.log('ok2');
                   $('#myModal').hide(700);
                   $('#message3').hide(1000);
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
}else{
    alert('la fecha de salida no puedo ser menor a la de entrada');
}
        

       };
       
 function create_estudies(){
       
            var formdata_studies=$('#formdata_studies').serialize();




            var date_in=$('#date_in_studies').val();
            var date_out=$('#date_out_studies').val();

           var date_epoch_in = new Date(date_in).getTime() / 1000;
           var date_epoch_out = new Date(date_out).getTime() / 1000;


            if(date_epoch_out>date_epoch_in){
                $.ajax({
                url:"create_studies",
                method:'POST',

                data: formdata_studies,
                
                success: function( result, statusText ) {
                   console.log('exitoso');
                   $('#row3').load('show_studies','valuerefresh');
                   // console.log(result);
                   $('#message').delay(100).show(100)
                   $('#message').attr('class','alert alert-success');
                   $('#message').html('Registro Exitoso....!');
                   console.log('ok1');
                   $('#message').delay(2000).hide(600);
                    console.log('ok2');
                   $('#myModal2').hide(700);
                   $('#message3').hide(1000);
                },
                complete: function(){

                    // Handle the complete event
                },
                error: function(xhr,statusText){
                   console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                  
                }
            });
            }else{
                alert('la fecha de egreso no puedo ser menor a la de ingreso');
            }
        

       };
 function deleteStudies(id_studies,key){

            $.ajax({
                url:"deletestudies/"+id_studies+"",

                data: id_studies,
                beforeSend:function () {
                },
                success: function( result ) {
                   console.log('exitoso');

                    $('#row3_'+key+'').remove();
                    $('#messag1e').delay(100).show(100)
                   $('#message1').attr('class','alert alert-success');
                   $('#message1').html('Registro eliminado correctamente....!');
                   console.log('ok1');
                   $('#message1').delay(2000).hide(600);
//                 
                },
                complete: function(){

                    // Handle the complete event
                },
                error: function(xhr,statusText){
                   
                  console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                    // Handle the complete event
                }
            });


        }
       
    


       function deleteJob(id_job,key){

            $.ajax({
                url:"deletejob/"+id_job+"",

                data: id_job,
                beforeSend:function () {
                },
                success: function( result ) {
                   console.log('exitoso');

                    $('#row2_'+key+'').remove();
 $('#messag1e').delay(100).show(100)
                   $('#message1').attr('class','alert alert-success');
                   $('#message1').html('Registro eliminado correctamente....!');
                   console.log('ok1');
                   $('#message1').delay(2000).hide(600);
//                 
                },
                complete: function(){

                    // Handle the complete event
                },
                error: function(xhr,statusText){
                   
                  console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                    // Handle the complete event
                }
            });


        }




       $('#checkbox_jobs_0').on('change',function () {
        if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado

         $('#fecha_salida_0').attr('disabled','disabled');
         $('#fecha_salida_0').val('');
        
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
       
         $('#fecha_salida_0').attr('disabled',false);
         $('#fecha_salida_0').val('');
    }
        // console.log('sss');
        //  $('#fecha_salida_0').attr('disabled','disabled');
        //  $('#fecha_salida_0').val('');
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