@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
	<div class="card-body">

		<label for="tabela"><h5>Todos os itens cadastrados:</h5></label>

		<table name="tabela" class="table table-sm" style="margin-bottom: 0px">
			<thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Description</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($objetos as $objetos)
            <tr>
                <td>{{$objetos->id}}</td>
                <td>{{$objetos->title}}</td>
                <td>{{$objetos->description}}</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @endforeach
        </tbody>
		</table>

	</div>
</div>

@endsection
