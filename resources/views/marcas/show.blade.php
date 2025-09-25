{{-- Heredamos la estructura del archivo app.blade.php--}}
@extends('layout.dashboard')

{{-- Definimos el título de la página --}}
@section('title', 'Detalle de Marca')

{{-- Definimos el contenido de la página --}}
@section('content')
<h1>Marcas</h1>
<h5>Detalle de la Marca</h5>
<hr>
<!-- Imprimir el nombre de la marca -->
Marca: <b>{{ $marca}}</b> <br>
@endsection