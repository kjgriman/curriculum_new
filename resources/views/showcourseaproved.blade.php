@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')


<div class="main-content col-md-6 col-md-offset-3">
	<h4 style="text-align: center" class=" col-md-6 col-md-offset-3">Cursos Aprobados</h4>
<table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Nombre del Curso</th>
      <th class="mdl-data-table__cell--non-numeric">Descripcion del Curso</th>
      <th class="mdl-data-table__cell--non-numeric">Fecha de Aprobacion</th>
      <th class="mdl-data-table__cell--non-numeric">Generar Certificado</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($getUserCourses as $key => $value)
  	<?php
$epoch=$value->date_asignation;
$fecha=date('Y-M-d',$epoch);?>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">{{$value->name_courses}}</td>
      <td class="mdl-data-table__cell--non-numeric">{{$value->description_courses}}</td>
      <td class="mdl-data-table__cell--non-numeric">{{$fecha}}</td>
      
      <td >{{link_to_action('CourseController@invoice','Imprimir Certifiado del curso',['id_usercourse'=>$value->id_usercourse],['class'=>'btn btn-primary'])}}</td>
</div>
    </tr>
   @endforeach
  </tbody>
</table></div>
@endsection