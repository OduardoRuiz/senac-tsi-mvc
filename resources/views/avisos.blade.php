@extends('layout.externo')
@section('title', 'Quadro de Avisos da Empresa')
@section('sidebar')
@parent
<p>^ ^ Barra superior adicionada do layout pai/mãe ^ ^ </p>
@endsection
@section('content')
<p>Quadro de Avisos da Empresa</p>

<br><br>


<p>Olá {{$nome}} Essas são as novidades</p>

@if ($mostrar)

@foreach ($avisos as $aviso)
<p>Aviso #{{$aviso['id']}}: {{$aviso['texto']}}</p>
@endforeach


@else
o aviso não sera exibido

<?php
$var_eduardo = "olá mundo";

foreach ($avisos as $aviso) {
    echo "<p>Aviso #{{$aviso['id']}}: {{$aviso['texto']}}</p>";
}
?>
@endif

@endsection
