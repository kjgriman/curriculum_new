<!DOCTYPE html>
<html lang="en">
<script src="https://use.fontawesome.com/38db6bd91f.js"></script>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV -{{Auth::user()->name}} {{Auth::user()->apellido}}</title>
    <style type="text/css">
      body{
        font-size: 16px;
        text-align: left;
      }
      #contenido{
        background: #BDBDBD;
        text-align: left;
      }
      table{
        text-align: center;
      }


      
    </style>
  </head>
  <body background="img/arrow1.png" >
 
    <main>
      <div id="" class="">
       <div id="">
        <table style="width:100%">
          <tr>
            <td  >
              <img width="120px" src="img/user.jpg" >
            </td>
            <td  align="left">
               <h1>{{Auth::user()->name}} {{Auth::user()->apellido}}</h1><br>
         
          <?php 
          $countstudy=count($data['study']);
          $countjob=count($data['jobs']);
          $countusercourse=count($data['getUserCourses']);

          ?>
       
          <small>  Su id del sistema es:: {{$data['study'][0]['id_studies']}}</small><br>
          <small><span class="fa fa-id"> <img width="17px" src="img/cedula.png"></span> Cedula: {{Auth::user()->cedula}}</small><br>
          <small><span class="fa fa-home"> <img width="17px" src="img/home.svg"></span> Direccion: {{Auth::user()->direccion}}</small><br>
          <small><span class="fa fa-phone"> <img width="15px" src="img/phone.png"></span> Telefono: {{Auth::user()->telefono}}</small><br>
          <small><span class="fa fa-email"> <img width="17px" src="img/email.png"></span> Email: {{Auth::user()->email}}</small><br>
          
            </td>
          </tr>
        </table>
        
        </div>
      </div><br><hr>
      <br><br>
                     <div  >
                       <table>
                        <thead>
                          <tr>
                            <th colspan="9" style="font-size: 25px; background: white;" align="left"><span class="fa fa-id"> <img width="30px" src="img/study.png"></span> Estudios Realizados</th>
                          </tr>
                          <tr style="background: #f2f2f2;">
                            
                            <th class="">promedio de notas</th>
                            <th class="">status</th>
                            <th class="">Nombre de la institucion</th>
                            <th class="">Ubicacion de la institucion</th>
                            <th class="">fecha de egreso</th>
                            <th class="">fecha de ingreso</th>
                            <th class="">Carrera</th>
                            <th class="">Tipo de estudio</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         @for($i=0;$i<$countstudy;$i++)
                          <tr style="background: #f5f5f5;">
                            <td> {{$data['study'][$i]['note_average']}}</td>  
                            <td> {{$data['study'][$i]['status_studies']}}</td>
                            <td> {{$data['study'][$i]['name_institute']}}</td>
                            <td> {{$data['study'][$i]['ubication_institute']}}</td>
                            <td> <small>{{$data['study'][$i]['date_out_studies']}}</small></td>
                            <td><small> {{$data['study'][$i]['date_in_studies']}}</small></td>
                            <td> {{$data['study'][$i]['career']}}</td>
                            <td> {{$data['study'][$i]['type_studies']}}</td>
                          </tr>
                         @endfor
                    
                            
                            
                       
                         
                        </tbody>
                      </table>
                    </div>
<br><br><hr><br>
                     <div >
                       <table>
                        <thead>
                         <tr>
                            <th colspan="9" style="font-size: 25px; background: white;" align="left"><span class="fa fa-id"> <img width="30px" src="img/work.png"></span> Experiencia Laboral </th>
                          </tr>
                          <tr style="background: #f2f2f2;">
                            
                            <th class="">Fecha de Egreso</th>
                            <th class="">Fecha de Ingreso</th>
                            <th class="">Ubicacion de la empresa</th>
                            <th class="">Responsabilidades del cargo</th>        
                            <th class="">Cargo</th>                    
                            <th class="">Nombre de Empresa</th>
                          </tr>
                        </thead>
                        <tbody >
                            @for($i=0;$i<$countjob;$i++)
                          <tr style="background: #f5f5f5;" >
                            @if($data['jobs'][$i]['date_out']!=0)
                            <td><small> {{$data['jobs'][$i]['date_out']}}</small></td>
                           @else
                           <td>Actualmente</td> 
                           @endif
                            <td><small> {{$data['jobs'][$i]['date_in']}}</small></td>
                            <td> {{$data['jobs'][$i]['ubication_company']}}</td>
                            <td> {{$data['jobs'][$i]['observation']}}</td>
                            <td> {{$data['jobs'][$i]['cargo']}}</td>
                            <td> {{$data['jobs'][$i]['name_company']}}</td>
                          </tr>
                         @endfor
                    
                          
                            
                        </tbody>
                      </table>
                    </div>
                    <br><br><hr><br> <div >
                       <table>
                        <thead>
                         <tr>
                            <th colspan="9" style="font-size: 25px; background: white;" align="left"><span class="fa fa-id"> <img width="30px" src="img/libros.png"></span> Cursos aprobados </th>
                          </tr>
                          <tr style="background: #f2f2f2;">
                                  <th>Medalla</th>
                                  <th>Fecha de Aprobacion</th>
                            
                            <th class="">descripcion del curso</th>
                      <th class="">nombre del curso</th>
                           
                          </tr>
                        </thead>
                        <tbody >
                          <?php
$epoch=$data['getUserCourses'][$i]->date_asignation;
$fecha=date('Y-M-d',$epoch);

                          ?>

                            @for($i=0;$i<$countusercourse;$i++)
                          <tr style="background: #f5f5f5;" >
                           <td><img width="30px" height="30px" src="img/imgmedalla/{{$data['getUserCourses'][$i]->imgmedalla}}"></td>

                           
                            <td><small> {{$fecha}}</small></td>
                            <td><small> {{$data['getUserCourses'][$i]->description_courses}}</small></td>
                            <td><small> {{$data['getUserCourses'][$i]->name_courses}}</small></td>

                          </tr>
                         @endfor
                          
                            
                        </tbody>
                      </table>
                    </div>
  </body>
</html>