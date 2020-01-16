@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
	<div class="card-body">

		@if(!empty($mensagemSucesso))
		<div class="alert alert-success"> {{ $mensagemSucesso }}</div>
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

		<form method="post" action="{{url('/livros/cadastrar')}}">
			<div class="form-group">

				@csrf

				<label for="title">ID: #{{ $maxid }}</label><br>

				<label for="titulo">Nome do livro:</label>
				<input type="text" class="form-control" name="titulo"/ placeholder="Insira o nome do livro">
			</div>

			<div class="form-row">
				
				<div class="form-group col-md-6">
					<label for="escritor">Nome do escritor:</label>
					<input type="text" name="escritor" class="form-control" id="inputEmail4" placeholder="Insira o nome do escritor">
				</div>

				<div class="form-group col-md-6">
					<label for="status">Status:</label>
					<select class="custom-select" name="status" id="inlineFormCustomSelectPref">
						<option selected value="Eu já li">Eu já li</option>
						<option value="Li parcialmente">Li parcialmente</option>
						<option value="Ainda não li">Ainda não li</option>
					</select>
				</div>

			</div>

			<div class="form-group">
				<label for="descricao">Descrição do livro:</label>
				<textarea cols="5" rows="5" class="form-control" name="descricao" placeholder="Descreva sobre o livro que você está cadastrando"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>

	</div>
</div>

@endsection
