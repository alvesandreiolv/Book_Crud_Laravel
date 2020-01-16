@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
	<div class="card-body">

		@if (Session::has('mensagemSucesso'))
		<div class="alert alert-success" role="alert">
			{{Session::get('mensagemSucesso')}}
		</div>
		@endif

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul style="margin-bottom: 0px;">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form method="post" action="{{url('/livros/editar/'.$id)}}">
			<div class="form-group">

				@csrf

				<label for="title">ID: #{{$id}}</label><br>

				<label for="titulo">Nome do livro:</label>
				<input type="text" class="form-control" name="titulo"/ placeholder="Insira o nome do livro" value="{{$livro['nome']}}">
			</div>

			<div class="form-row">
				
				<div class="form-group col-md-6">
					<label for="escritor">Nome do escritor:</label>
					<input type="text" name="escritor" class="form-control" id="inputEmail4" placeholder="Insira o nome do escritor" value="{{$livro['escritor']}}">
				</div>

				<div class="form-group col-md-6">
					<label for="status">Status:</label>
					<select class="custom-select" name="status" id="inlineFormCustomSelectPref">
						<option <?php if ($livro['status']=='Eu já li') { echo 'selected'; } ?> value="Eu já li">Eu já li</option>
						<option <?php  if ($livro['status']=='Li parcialmente') { echo 'selected'; } ?> value="Li parcialmente">Li parcialmente</option>
						<option <?php  if ($livro['status']=='Ainda não li') { echo 'selected'; } ?> value="Ainda não li">Ainda não li</option>
					</select>
				</div>

			</div>

			<div class="form-group">
				<label for="descricao">Descrição do livro:</label>
				<textarea cols="5" rows="5" class="form-control" name="descricao" placeholder="Descreva sobre o livro que você está cadastrando" >{{$livro['descricao']}}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Salvar informações</button>
		</form>

	</div>
</div>

@endsection
