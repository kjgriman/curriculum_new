@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection




@section('main-content')

	<form id="course" action="create_course" method="POST">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
					<div class="modal-body">
						<label>Nombre del curso </label><input name="createcourse" id="createcourse" type="text" placeholder="Ingrese nombre de categoria" required class="form-control" minlength="3">
					</div>

					<div class="modal-body">
						<label>Categoria</label>
						<select class="form-control" name="category_asoc" id="category_asoc">
							<option >Seleccione...</option>
								@foreach ($data as $key => $value)
									<option value="{{$value['id_category']}}">{{strtoupper($value['name_category'])}}</option>
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
	

	

@endsection

