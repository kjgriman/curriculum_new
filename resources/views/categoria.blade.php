@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Gestion de categorias</h2></div>

					<div class="panel-body " >
						<a data-toggle="modal" data-target="#myModal"><div class="btn btn-success col-md-3 col-md-offset-1"><i class="fa fa-save fa-3x" aria-hidden="true"></i><h3>Crear categorias</h3></div>
						</a>
						<a data-toggle="modal" data-target="#myModal2"><div class="btn btn-primary col-md-3 col-md-offset-1"><i class="fa fa-list fa-3x" aria-hidden="true"></i><h3> Visualizar categorias</h3></div>
						</a>

						<a data-toggle="modal" data-target="#myModal3"><div class="btn btn-danger col-md-3 col-md-offset-1"><i class="fa fa-trash fa-3x" aria-hidden="true"></i><h3>Eliminar categorias</h3></div>
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
				<form id="category">
					<input type="text" name="_token" id="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<input name="createcategory" id="createcategory" type="text" placeholder="Ingrese nombre de categoria" required class="form-control" minlength="3">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success"  id="create_category" >Guardar</button>
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
					<ul>
						<li>


						</li><li>
							categoria2
						</li>

					</ul>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" >Close</button>

				</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Modal editar categorias-->
	<div id="myModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Eiminar Categoria</h4>
				</div>
				<form >
				<div class="modal-body">
					<ul>
						<div class="checkbox">
							<label><input type="checkbox" value="">Categoria 1</label>
						</div>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-warning" data-dismiss="modal">Eliminar</button>

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
	</script>

@endsection

