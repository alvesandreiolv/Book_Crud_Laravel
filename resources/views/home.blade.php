@extends('layouts.app')

@section('content')

<div class="card" style="border-top:0px;">
    <div class="card-body">

        @if(!empty($mensagemSucesso))
        <div class="alert alert-success"> {{ $mensagemSucesso }}</div>
        @endif

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        Olá, bem-vindo ao sistema.<br><br>

        Há <b><?php echo $numberx; ?></b> itens cadastrados no sistema.<br>
        Você já cadastrou <b><?php echo $numbery; ?></b> itens.

        <br><br>Teste: <?php echo $testando1; ?>

    </div>



</div>
</div>

@endsection
