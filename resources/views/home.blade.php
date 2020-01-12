@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

Olá, bem-vindo ao sistema.<br>O que deseja fazer?
</div>

@endsection
