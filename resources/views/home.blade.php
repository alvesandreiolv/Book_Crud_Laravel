@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
    <div class="card-body">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        Olá, bem-vindo ao sistema.<br><br>

        Há <b>X</b> itens cadastrados no sistema.<br>
        Você já cadastrou <b>X</b> itens.</div>

    </div>
</div>

@endsection
