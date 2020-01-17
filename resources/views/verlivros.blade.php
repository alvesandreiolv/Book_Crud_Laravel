@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
	<div class="card-body">

		@if (session('mensagemDeletadoSucesso'))
		<div class="alert alert-warning">
			{{ session('mensagemDeletadoSucesso') }}
		</div>
		@endif

		@if (session('mensagemDeletadoErro'))
		<div class="alert alert-danger">
			{{ session('mensagemDeletadoErro') }}
		</div>
		@endif

		@if(!empty($mensagem))
		<div class="alert alert-success"> {{ $mensagem }}</div>
		@endif

		<form class="mb-3" method="get" action="{{url('/livros/pesquisar')}}">

			<?php if (empty($resultadospor)) { $resultadospor = 'titulo'; } ?>

			Pesquisar por:
			<div class="input-group mb-1">
				<div class="form-check mr-2">
					<input class="form-check-input" type="radio" name="por" id="pesquisarid" value="id" <?php if ($resultadospor =='id') { echo 'checked'; } ?> >
					<label class="form-check-label" for="pesquisarid">
						ID
					</label>
				</div>
				<div class="form-check mr-2">
					<input class="form-check-input" type="radio" name="por" id="pesquisartitulo" value="titulo" <?php if ($resultadospor =='titulo') { echo 'checked'; } ?> >
					<label class="form-check-label" for="pesquisartitulo">
						Titulo
					</label>
				</div>
				<div class="form-check mr-2">
					<input class="form-check-input" type="radio" name="por" id="pesquisarescritor" value="escritor" <?php if ($resultadospor =='escritor') { echo 'checked'; } ?> >
					<label class="form-check-label" for="pesquisarescritor">
						Escritor
					</label>
				</div>
				<div class="form-check mr-2">
					<input class="form-check-input" type="radio" name="por" id="pesquisarstatus" value="status" <?php if ($resultadospor =='status') { echo 'checked'; } ?> >
					<label class="form-check-label" for="pesquisarstatus">
						Status
					</label>
				</div>
			</div>


			<div class="input-group">
				<input id="barrapesquisa" class="form-control" type="text" name="input" placeholder="Pesquisar por <?php echo strtoupper($resultadospor); ?>" aria-label="Search" value="{{$inputvalor ?? ''}}" autofocus>
				<span class="input-group-btn" >
					<button class="btn btn-default" type="submit" style="border: 1px solid rgb(206, 212, 218); border-left: 0px;">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>

		</form>

		<label for="tabela"><h5>
			
			@if (!empty($inputvalor)) 
			Resultados: ({{strtoupper($resultadospor)}})
			@else
			Todos os livros cadastrados:
			@endif

		</h5></label>
		
		{{ $livro->links() }}

		<table name="tabela" class="table table-sm" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Título</th>
					<th scope="col">Escritor</th>
					<th scope="col">Status</th>
					<th scope="col">Editar/Deletar</th>
				</tr>
			</thead>
			<tbody>

				
				@if(count($livro) > 0)

				@foreach($livro as $livros)
				<tr>
					<th scope="row">#{{$livros->id}}</th>
					<td>{{$livros->titulo}}</td>
					<td>{{$livros->escritor}}</td>
					<td>{{$livros->status}}</td>
					<td>
						<a class="btn btn-primary btn-sm  " href="{{ url('livros/editar/'.$livros->id) }}" ><i class="fa fa-pencil" aria-hidden="true"></i></a>

						<a class="btn btn-danger btn-sm" href="{{ url('livros/apagar/'.$livros->id) }}" onclick="return confirm('Tem certeza de que deseja apagar o livro &quot;{{$livros->titulo}}&quot;?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</td>
				</tr>
				@endforeach


				@else
				<tr>
					<th scope="row"></th>
					<td>Sem resultados para mostrar</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				@endif

			</tbody>

		</table>
	</div>
</div>

@endsection
