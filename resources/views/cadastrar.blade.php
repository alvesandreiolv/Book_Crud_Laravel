@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
	<div class="card-body">

		<form method="post" action="{{url('/create/ticket')}}">
			<div class="form-group">
				<input type="hidden" value="{{csrf_token()}}" name="_token" />
				<label for="title">Nome:</label>
				<input type="text" class="form-control" name="title"/ placeholder="Insira o nome deste cadastro">
			</div>

			<div class="form-row">
				
				<div class="form-group col-md-6">
					<label for="inputEmail4">Detalhe:</label>
					<input type="email" class="form-control" id="inputEmail4" placeholder="Insira um detalhe importante">
				</div>

				<div class="form-group col-md-6">
					<label for="inputEmail4">Escolha:</label>
					<select class="custom-select" id="inlineFormCustomSelectPref">
						<option selected>Escolha uma opção</option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
					</select>
				</div>

			</div>

			<div class="form-group">
				<label for="description">Descrição completa:</label>
				<textarea cols="5" rows="5" class="form-control" name="description" placeholder="Faça uma descrição completa do que está sendo cadastrado"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>

	</div>
</div>

@endsection
