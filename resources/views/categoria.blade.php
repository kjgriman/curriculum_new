@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection




@section('main-content')

	@if (Session::has('status'))
		<div class="alert alert-success" id="showmessage">
			<h4 align="center">Proceso Exitoso...!</h4>
		</div>
		{{ Session::forget('status') }}
	@endif
	

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Gestion de categorias</h3></div>

					<div class="panel-body " >
						<a data-toggle="modal" data-target="#myModal"><div class="btn btn-success col-md-4 col-md-offset-1"><i class="fa fa-save fa-3x" aria-hidden="true"></i><h4>Crear Categorias</h4><small>Create New Category</small></div>
						</a>
						<a data-toggle="modal" data-target="#myModal2"><div class="btn btn-primary col-md-4 col-md-offset-2"><i class="fa fa-list fa-3x" aria-hidden="true"></i><h4> Visualizar Categorias</h4><small>View Category</small></div>
						</a>

					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Gestion de cursos</h3></div>

					<div class="panel-body " >
						<a data-toggle="modal" data-target="#myModal3"><div class="btn btn-success col-md-4 col-md-offset-1"><i class="fa fa-book fa-3x" aria-hidden="true"></i><h4>Crear Cursos</h4><small>Create New Course</small></div>
						</a>
						<a data-toggle="modal" data-target="#myModal4"><div class="btn btn-primary col-md-4 col-md-offset-2"><i class="fa fa-list fa-3x" aria-hidden="true"></i><h4> Visualizar Cursos</h4><small>View Course</small></div>
						</a>

					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Gestion de Usuarios</h3></div>

					<div class="panel-body " >
						
						<a data-toggle="modal" data-target="#myModal5"><div class="btn btn-primary col-md-4 col-md-offset-4"><i class="fa fa-list fa-3x" aria-hidden="true"></i><h4> Visualizar Usuarios</h4><small>View Usuarios</small></div>
						</a>

					</div>

				</div>
			</div>
		</div>
	</div>


	<!-- Modal crear categorias-->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Crear Nueva Categoria</h4>
				</div>
				<form id="category" action="create_category" method="POST">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<label>Nombre  de categoria</label><input name="createcategory" id="createcategory" type="text" placeholder="Ingrese nombre de categoria" required class="form-control" minlength="3">
				</div>
				<div class="modal-body">
					<label>Descripcion de categoria</label><textarea name="descriptioncategory" id="descriptioncategory" class="form-control" required minlength="5" placeholder="Ingrese la Descripcion de la categoria"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button class="btn btn-success"  id="create_category" >Guardar</button>
				</div>
				</form>
			</div>

		</div>
	</div>

		<!-- Modal visualizar usuarios-->
	<div id="myModal5" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Visualizar Usuarios</h4><div class="hidden" id="mensajeusercourse">ddd</div>
				</div>
				
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<div class="tab">
					<table class="table  table-hover">
					    <thead>
					      <tr>
					      	<th>#</th>
					        <th>Nombre de usuario</th>
					        <th>Cedula</th>
					        <th>Correo</th> <th>Cursos Disponibles</th>
					      </tr>
					    </thead>
					    <tbody>
					    	
					    	<?php
								$i=1;
					    	?>
					      @foreach ($data2 as $key2 => $value2)
					  		 <tr id="content{{$key2}}">
					  		 	<td>{{$i}}</td>
					      <td class="mdl-data-table__cell--non-numeric">{{ $value2['name'] }}</td>
					      <td>{{$value2['cedula']}}<input type="hidden" name="id_user" value="{{ $value2['id'] }}"></td>
					      <td>{{$value2['email']}}</td>
					<td>	
						<input type="hidden" name="id_course" value="1111">
						<select class="form-control" name="category_asoc{{$key2}}" id="category_asoc{{$key2}}">
							<option value="0">Seleccione...</option>
								@foreach ($data1 as $key4 => $value4)
									<option value="{{$value4['id_courses']}}">{{strtoupper($value4['name_courses'])}}</option>
								@endforeach

						</select>

					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<td>
					<button onclick="createusercourse({{$value2['id']}},{{$key2}});" class="btn btn-success">Asignar curso aprobado</a>
</td></td>
					    <!--  @foreach ($data1 as $key4 => $value4)
					     	<td style="background:#f2f2f2" align="center">{{$value4['name_courses']}} <br><input type="checkbox" name=""></td>
					     @endforeach -->
								</tr>
								<?php
								$i++;
					    	?>
					  
					  	@endforeach
					   
					    </tbody>
					  </table>
					  </div>
   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>

				</div>
				
			</div>

		</div>
	</div>
	<!-- Modal visualizar categorias-->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content"><div id="eliminado1" class="hidden"><h3> Categoria Eliminada Exitosamente.!!!</h3></div>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Visualizar Categorias</h4>
				</div>
				<form >
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<div class="tab">
					<table class="table  table-hover">
					    <thead>
					      <tr>
					      	<th>#</th>
					        <th>Nombre de Categoria</th>
					        <th>Descripcion de categoria</th>
					        <th></th> <th></th>
					      </tr>
					    </thead>
					    <tbody>
					      @foreach ($data as $key1 => $value)
					  		 <tr id="content{{$key1}}">
					      <td class="mdl-data-table__cell--non-numeric">{{ $value['id_category'] }}</td>
					      <td>{{$value['name_category']}}</td>
					      <td>{{$value['description_category']}}</td>
					      <td><a onclick="deleteCategory({{ $value['id_category'] }},'{{ $key1 }}')" class="btn btn-danger">Eliminar</a>
								 </td>
								</tr>
					  
					  	@endforeach
					   
					    </tbody>
					  </table>
					  </div>
   
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>

				</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Modal crear courses-->
	<div id="myModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Crear cursos</h4>
				</div>
				<form id="course" action="create_course" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
					<div class="modal-body">
						<label>Nombre del curso </label><input name="createcourse" id="createcourse" type="text" placeholder="Ingrese nombre de categoria" required class="form-control" minlength="3">
					</div>

					<div class="modal-body">
						<label>Categoria</label>
						<select class="form-control" name="category_asoc" id="category_asoc">
							<option value="0">Seleccione...</option>
								@foreach ($data as $key => $value)
									<option value="{{$value['id_category']}}">{{strtoupper($value['name_category'])}}</option>
								@endforeach

						</select>
					</div>
					<div class="modal-body">
						<label>Descripcion del curso</label><textarea name="descriptioncourse" id="descriptioncourse"   required class="form-control" minlength="5" placeholder="Ingrese la Descripcion de la categoria"></textarea>
					</div>
				
					<div class="modal-body">
						<label for="imgmedalla">Cargar imagen de Medalla</label><input name="imgmedalla" id="imgmedalla"   required class="form-control" type="file" accept=".jpg, .png, .jpeg, .pdf"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button class="btn btn-success"  id="create_course" >Guardar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Modal visualizar courses-->
	<div id="myModal4" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content"><div id="eliminado2" class="hidden"><h3> Curso Eliminado Exitosamente.!!!</h3></div>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Visualizar cursos</h4>
				</div>
				<form >
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<table class="table  table-hover">
						<thead>
						<tr>
							<th>#</th>
							<th>Nombre de Curso</th>
							<th>Categoria de Curso</th>
							<th>Descripcion de curso</th>
							<th>medalla</th>
							<th></th> <th></th>
						</tr>
						</thead>
						<tbody>
						@foreach ($getCourses as $key => $getCourse)
							<tr id="conten{{$key}}" class="">
								<td class="mdl-data-table__cell--non-numeric">{{ $key +1 }}</td>
								<td>{{ $getCourse->name_courses}}</td>
								<td>{{ $getCourse->name_category }}</td>
								<td>{{ $getCourse->description_courses }}</td>
								<td><img width="50px" height="50px" src="img/imgmedalla/{{$getCourse->imgmedalla }}"></td>
							
								<td><a onclick="deleteCourse({{ $getCourse->id_courses }},'{{$key}}')" class="btn btn-danger">Eliminar</a></td>
							</tr>
						@endforeach

						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
				</form>
			</div>
<div id="resultado"></div>
		</div>
	</div>


    


	<script>

		$("#create_category").on('click',function () {
			var txtarcategory = $('#descriptioncategory').val();
			var txtcategory = $('#createcategory').val();
			if (txtarcategory==null || txtarcategory=='' || txtarcategory==' ') {
				alert('debe introducir una descripcion para la categoria');
			}
			if (txtcategory==null || txtcategory=='' || txtcategory==' ') {
				alert('debe introducir un Nombre para la categoria');
			}
				else{
				$('#create_course').attr('type','submit');
			}
         
        });

        $("#create_course").on('click',function () {
			var txtcourse = $('#createcourse').val();
			var sltcategory = $('#category_asoc').val();
			var txtdesccourse = $('#descriptioncourse').val();
			console.log(sltcategory);
		
			if (txtcourse==null || txtcourse=='' || txtcourse==' ') {
				alert('debe introducir un nombre para el curso');
			}
			else if (sltcategory==0) {
				alert('debe seleccionar una categoria para el curso');
			}
			else if (txtdesccourse==null || txtdesccourse=='' || txtdesccourse==' ') {
				alert('debe introducir una descripcion para el curso');
			}
			else{
				$('#create_course').attr('type','submit');
			}
         
        });

        $("#showmessage").delay(3000).hide(400);

      

		function deleteCourse(id_course,key){
//            var parent = $("#conten"+conten+"");
            console.log(key);
            console.log(id_course);
            $.ajax({
                url:"deletecourse/"+id_course+"",

                data: id_course,
                beforeSend:function () {
                    $('#conten'+key).attr('class','alert alert-danger');
                },
                success: function( result ) {
                   console.log('exitoso');
                    $('#conten'+key).remove();
                     $('#eliminado2').attr('class','alert alert-danger');
                    $("#eliminado2").delay(2000).hide(100);
                    

                },
                complete: function(){
                   // Handle the complete event
                }
            });


		}

		function createusercourse(id_user,key2){
			if($('#category_asoc'+key2+'').val()!=0){
var id_course=$('#category_asoc'+key2+'').val();
var token = $('#_token').val();

console.log(id_course);
console.log(key2);
console.log(id_user);
var date_asignation= new Date().getTime()/1000;
console.log(date_asignation);

 $.ajax({
                url:"createusercourse",
                method:'POST',

                data:  {id_user: id_user, id_course: id_course, date_asignation: date_asignation,_token:token},
                
                success: function( result, statusText ) {
                   console.log(result);
                   console.log(statusText);
                   // $('#row3').load('show_studies','valuerefresh');
                   // // console.log(result);
                   $('#mensajeusercourse').delay(100).show(100);

                   $('#mensajeusercourse').attr('class','text');
                   $('#mensajeusercourse').html(result);
                   console.log('ok1');
                   $('#mensajeusercourse').delay(2000).hide(600);
                     },
               
                error: function(xhr,statusText){
                   console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                   $('#mensajeusercourse').delay(100).show(100);
                   $('#mensajeusercourse').attr('class','alert alert-danger');
                   $('#mensajeusercourse').html('Hubo un error no se pudo realizar el proceso');
                   console.log('ok1');
                   $('#mensajeusercourse').delay(2000).hide(600);
                  
                }
            });
}
else{
	alert('debe seleccionar un curso');
}

		}

		function deleteCategory(id_category,key1){

            $.ajax({
                url:"deletecategory/"+id_category+"",

                data: id_category,
                beforeSend:function () {
                    $('#content'+key1).attr('class','alert alert-danger');
                },
                success: function( result ) {
                   console.log('exitoso');

                    $('#content'+key1).remove();

                    $('#eliminado1').attr('class','alert alert-success');
                    $("#eliminado1").delay(2000).hide(100);

                      $('#category_asoc').find('option[value="'+id_category+'"]').remove();

                },
                complete: function(){

                    // Handle the complete event
                },
                error: function(xhr,statusText){
                    $('#eliminado1').html('<h3>'+statusText+'<h3>').attr('class','alert alert-danger');
                    $("#eliminado1").delay(2000).hide(100);
                  console.log(xhr.overrideMimeType( "text/plain; charset=x-user-defined" ));
                  console.log(statusText);
                    // Handle the complete event
                }
            });


		}
	</script>

@endsection

