@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	@if (session('status'))
		<div class="alert alert-success" id="showmessage">
			<h4 align="center">{{ session('status') }}</h4>
		</div>
	@endif

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Gestion de categorias</h2></div>

					<div class="panel-body " >
						<a data-toggle="modal" data-target="#myModal"><div class="btn btn-success col-md-4 col-md-offset-1"><i class="fa fa-save fa-3x" aria-hidden="true"></i><h3>Crear Categorias</h3></div>
						</a>
						<a data-toggle="modal" data-target="#myModal2"><div class="btn btn-primary col-md-4 col-md-offset-2"><i class="fa fa-list fa-3x" aria-hidden="true"></i><h3> Visualizar Categorias</h3></div>
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
					<div class="panel-heading"><h2>Gestion de cursos</h2></div>

					<div class="panel-body " >
						<a data-toggle="modal" data-target="#myModal3"><div class="btn btn-success col-md-4 col-md-offset-1"><i class="fa fa-book fa-3x" aria-hidden="true"></i><h3>Crear Cursos</h3></div>
						</a>
						<a data-toggle="modal" data-target="#myModal4"><div class="btn btn-primary col-md-4 col-md-offset-2"><i class="fa fa-list fa-3x" aria-hidden="true"></i><h3> Visualizar Cursos</h3></div>
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
				<form id="course" action="create_category" method="POST">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<label>Nombre  de categoria</label><input name="createcategory" id="createcategory" type="text" placeholder="Ingrese nombre de categoria" required class="form-control" minlength="3">
				</div>
				<div class="modal-body">
					<label>Descripcion de categoria</label><textarea name="descriptioncategory" id="descriptioncategory" class="form-control" placeholder="Ingrese la Descripcion de la categoria"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success"  id="create_category" >Guardar</button>
				</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Modal visualizar categorias-->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Visualizar Categorias</h4>
				</div>
				<form >
				<div class="modal-body">
					<div class="tab">
					<table class="table  table-hover">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Nombre de Categoria</th>
        <th>Descripcion de categoria</th>
        <th></th> <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $value)
  		 <tr>
      <td class="mdl-data-table__cell--non-numeric">{{$value['id_category']}}</td>
      <td>{{$value['name_category']}}</td>
      <td>{{$value['description_category']}}</td>
      <td><button class="btn btn-primary">editar</button></td>
      <td><button class="btn btn-danger">eliminar</button></td>
    </tr>
  	@endforeach
   
    </tbody>
  </table>
  </div>
   
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" >Close</button>

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
				<form id="category" action="create_course" method="POST">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
					<div class="modal-body">
						<label>Nombre del curso </label><input name="createcourse" id="createcourse" type="text" placeholder="Ingrese nombre de categoria" required class="form-control" minlength="3">
					</div>

					<div class="modal-body">
						<label>Categoria</label>
						<select class="form-control" name="category_asoc" id="category_asoc">
							<option >Seleccione...</option>
							@foreach ($data as $key => $value)
								<option value="{{$value['id_category']}}">{{$value['name_category']}}</option>
							@endforeach

						</select>
					</div>
					<div class="modal-body">
						<label>Descripcion del curso</label><textarea name="descriptioncourse" id="descriptioncourse" class="form-control" placeholder="Ingrese la Descripcion de la categoria"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success"  id="create_course" >Guardar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Modal visualizar courses-->
	<div id="myModal4" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Visualizar cursos</h4>
				</div>
				<form >
				<div class="modal-body">
					<table class="table  table-hover">
						<thead>
						<tr>
							<th>Id</th>
							<th>Nombre de Curso</th>
							<th>Categoria de Curso</th>
							<th>Descripcion de curso</th>
							<th></th> <th></th>
						</tr>
						</thead>
						<tbody>
						@foreach ($getCourses as $key => $getCourse)
							<tr>
								<td class="mdl-data-table__cell--non-numeric">{{ $key +1 }}</td>
								<td>{{ $getCourse->name_courses}}</td>
								<td>{{ $getCourse->name_category }}</td>
								<td>{{ $getCourse->description_courses }}</td>
								<td><button class="btn btn-primary">editar</button></td>
								<td><button class="btn btn-danger">eliminar</button></td>
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

		</div>
	</div>


	<script>
		$("#create_category").on('click',function () {
            var createcategory = $('#createcategory').val();
            var token= $('#_token').val();
            var myArray = [ createcategory, token ];
			var url = '/create_category';
            if (createcategory == ''){
                alert('Debe ingregar algun nombre para la categoria');
			}
            $.ajax({
                type: 'POST',
                url: url,
                async: false,
                data: myArray,
                dataType: 'json',
                success: (function () {
                    console.log('exito');

                })
            });

        });
        $("#showmessage").delay(3000).hide(600);
	</script>

@endsection

